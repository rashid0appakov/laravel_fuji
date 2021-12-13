<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Codenixsv\CoinGeckoApi\CoinGeckoClient;
class CalculatorController extends Controller
{
    public function calc(Request $request){
        $request->validate([
            'currency' => 'required',
            'amount'    => 'required|numeric|min:0'
        ]);
        $cc = $request->currency;
        $amount = $request->amount;
        $c = 'usd';
        $client = new CoinGeckoClient();
        $data = $client->simple()->getPrice($cc, $c);
        $val = $data[$cc][$c];
        if($amount > 0 && $amount <= 3000) $k = 0.5;
        elseif($amount >= 3001 && $amount <= 10000) $k = 0.35;
        elseif($amount >= 10001) $k = 0.25;
        $res = $amount * $val / $k;
        return number_format($res, 2, ',', '');
    }
}
