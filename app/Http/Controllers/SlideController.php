<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Slide;
use Storage;
class SlideController extends Controller
{
    public function index(){
        $slides = Slide::paginate(50);
        return view('admin.slides.index', compact('slides'));
    }
    public function create(){
        return view('admin.slides.create');
    }
    public function edit(Slide $slide){
        return view('admin.slides.update', compact('slide'));
    }
    public function store(Request $request){
        $request->validate([
            'name' => 'required|string|max:255',
            'text' => 'required',
            'image' => 'nullable|image'
        ]);
        $data = $request->except('image');
        if($request->hasFile('image')) $data['image'] = $request->file('image')->store('slides');
        Slide::create($data);
        session()->flash('message', 'Новый слайд успешно добавлен');
        return redirect()->route('admin.slides.index');
    }
    public function update(Request $request, Slide $slide){
        $request->validate([
            'name' => 'required|string|max:255',
            'text' => 'required',
            'image' => 'nullable|image'
        ]);
        $data = $request->except('image');
        if($request->hasFile('image')){
            if($slide->image) Storage::delete($slide->image);
            $data['image'] = $request->file('image')->store('slides');
        }
        $slide->update($data);
        session()->flash('message', 'Слайд успешно изменен');
        return redirect()->route('admin.slides.index');
    }
    public function destroy(Slide $slide){
        if($slide->image) Storage::delete($slide->image);
        $slide->delete();
        session()->flash('message', 'Слайд успешно удален');
        return redirect()->route('admin.slides.index');
    }
}
