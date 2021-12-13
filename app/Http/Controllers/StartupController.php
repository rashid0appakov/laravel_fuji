<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Startup;
use Storage;
class StartupController extends Controller
{
    public function index(){
        $startups = Startup::latest()->paginate(50);
        return view('admin.startups.index', compact('startups'));
    }
    public function create(){
        return view('admin.startups.create');
    }
    public function edit(Startup $startup){
        return view('admin.startups.edit', compact('startup'));
    }
    public function frontIndex(){
        $startups = Startup::atest()->paginate(50);
        return view('startups.index', compact('startups'));
    }
    public function frontShow(Startup $startup){
        return view('startups.show', compact('startup'));
    }
    public function store(Request $request){
        $request->validate([
            'name_en' => 'required|string|max:255',
            'text_en' => 'required',
            'preview_en' => 'required',
            'image' => 'nullable|mimes:jpeg,png,svg,jpg'
        ]);
        $data = $request->only('price_real', 'price_of', 'finish');
        if($request->hasFile('image')){
            $data['image'] = $request->file('image')->store('startups');
        }
        $startup = Startup::create($data);
        foreach(config('translatable.available_locale') as $locale){
            $startup->setTranslation('name', $locale, $request->get("name_$locale"));
            $startup->setTranslation('preview', $locale, $request->get("preview_$locale"));
            $startup->setTranslation('text', $locale, $request->get("text_$locale"));
            $startup->setTranslation('city', $locale, $request->get("city_$locale"));
            $startup->setTranslation('user', $locale, $request->get("user_$locale"));
        }
        $startup->save();
        session()->flash('success', 'New startup create success');
        return redirect()->route('admin.startups.index');
    }
    public function update(Request $request, Startup $startup){
        $request->validate([
            'name_en' => 'required|string|max:255',
            'text_en' => 'required',
            'preview_en' => 'required',
            'image' => 'nullable|mimes:jpeg,png,svg,jpg'
        ]);
        $data = $request->only('price_real', 'price_of', 'finish');
        if($request->hasFile('image')){
            if($startup->image) Storage::delete($startup->image);
            $data['image'] = $request->file('image')->store('startups');
        }
        $startup->update($data);
        foreach(config('translatable.available_locale') as $locale){
            $startup->setTranslation('name', $locale, $request->get("name_$locale"));
            $startup->setTranslation('preview', $locale, $request->get("preview_$locale"));
            $startup->setTranslation('text', $locale, $request->get("text_$locale"));
            $startup->setTranslation('city', $locale, $request->get("city_$locale"));
            $startup->setTranslation('user', $locale, $request->get("user_$locale"));
        }
        session()->flash('success', 'Startup update success');
        return back();
    }
    public function destroy(Startup $startup){
        if($startup->image) Storage::delete($startup->image);
        $startup->delete();
        session()->flash('success', 'Startup delete success');
        return redirect()->route('admin.startups.index');
    }
}
