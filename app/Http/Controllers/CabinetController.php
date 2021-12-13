<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Hash;
use Storage;
use Codenixsv\CoinGeckoApi\CoinGeckoClient;
use App\Models\Currency;
use IEXBase\TronAPI\Tron;
class CabinetController extends Controller
{
    public function index(){
        $client = new CoinGeckoClient();
        $currencies = Currency::all();
        $cc = '';
        $c = 'usd';
        $values = [];
        foreach($currencies as $key => $item){
            $z = $key ? ',' : '';
            $cc .= $z . $item->fullname;
            $values[$item->fullname] = [
                'item' => $item
            ];
        }
        $data = $client->simple()->getPrice($cc, $c);
        foreach($data as $key => $item){
            $values[$key]['price'] = number_format($item[$c], 2, ',', '');
        }
        return view('cabinet.index', compact('values'));
    }
    public function calculator(){
        return view('cabinet.calculator');
    }
    public function account(){
        return view('cabinet.account');
    }
    public function accountUpdate(Request $request){
        $request->validate([
            'name'      => 'required|string|max:255',
            'password'  => 'nullable|confirmed'
        ]);
        $data = $request->except(['photo', 'password']);
        if($request->password) $data['password'] = bcrypt($request->password);
        if($request->password && (!$request->old_password || !Hash::check(auth()->user()->password, $request->old_password) )) 
            return back()->withErrors([
                'old_password' => 'Old password incorrect'
            ]);
        if($request->hasFile('photo')){
            if(auth()->user()->photo) Storage::delete(auth()->user()->photo);
            $data['photo'] = $request->file('photo')->store('photos');
        }
        auth()->user()->update($data);
        return back();
    }
    public function TronAddressUpdate(Request $request){
        $request->validate([
            'address' => "nullable|string|max:255"
        ]);
        $address = $request->address;
        $contract = 'TFK4A56JsMWy1N4kt39jVncdaSRVBVBEgg';
        $user = auth()->user();
        if($address){
            try {
                $fullNode = new \IEXBase\TronAPI\Provider\HttpProvider('https://api.trongrid.io');
                $solidityNode = new \IEXBase\TronAPI\Provider\HttpProvider('https://api.trongrid.io');
                $eventServer = new \IEXBase\TronAPI\Provider\HttpProvider('https://api.trongrid.io');

                $tron = new Tron($fullNode, $solidityNode, $eventServer);
                $tron->setAddress($address);
                $contract = $tron->contract($contract);
            
                $balance = floor($contract->balanceOf());
                $user->tron_address = $address;
                $user->balance = $balance;
                session()->flash('success', 'wallet_connect');
            } catch (\IEXBase\TronAPI\Exception\TronException $e) {
                session()->flash('error', $e->getMessage());
            }
        }else{
            $user->tron_address = '';
            $user->balance = 0;
            session()->flash('success', 'wallet_disconnect');
        }
        $user->save();
        return back();        
    }
}