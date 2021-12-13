<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
use Storage;
class PostController extends Controller
{
    public function index(){
        $posts = Post::withCount('comments')->latest()->paginate(50);
        return view('admin.posts.index', compact('posts'));
    }
    public function create(){
        return view('admin.posts.create');
    }
    public function edit(Post $post){
        return view('admin.posts.edit', compact('post'));
    }
    public function frontIndex(){
        $posts = Post::withCount('comments')->latest()->paginate(20);
        return view('posts.index', compact('posts'));
    }
    public function frontShow(Post $post){
        $post->load('comments');
        $posts = Post::where('id', '!=', $post->id)->inRandomOrder()->limit(2)->get();
        return view('posts.show', compact('post', 'posts'));
    }
    public function store(Request $request){
        dd($request->all());
        $request->validate([
            'name_en' => 'required|string|max:255',
            'text_en' => 'required',
            'preview_en' => 'required',
            'image' => 'nullable|image|max:9000'
        ]);
        $data = $request->except('image');
        if($request->hasFile('image')){
            $data['image'] = $request->file('image')->store('posts');
        }
        $post = Post::create($data);
        foreach(config('translatable.available_locale') as $locale){
            $post->setTranslation('name', $locale, $request->get("name_$locale"));
            $post->setTranslation('preview', $locale, $request->get("preview_$locale"));
            $post->setTranslation('text', $locale, $request->get("text_$locale"));
        }
        $post->save();
        session()->flash('success', 'Новая запись успешно добавлена');
        return redirect()->route('admin.posts.index');
    }
    public function update(Request $request, Post $post){
        $request->validate([
            'name_en' => 'required|string|max:255',
            'text_en' => 'required',
            'preview_en' => 'required',
            'image' => 'nullable|image'
        ]);
        if($request->hasFile('image')){
            if($post->image) Storage::delete($post->image);
            $data['image'] = $request->file('image')->store('posts');
        }
        foreach(config('translatable.available_locale') as $locale){
            $post->setTranslation('name', $locale, $request->get("name_$locale"));
            $post->setTranslation('preview', $locale, $request->get("preview_$locale"));
            $post->setTranslation('text', $locale, $request->get("text_$locale"));
        }
        $post->save();
        session()->flash('success', 'Запись успешно изменена');
        return redirect()->route('admin.posts.index');
    }
    public function destroy(Post $post){
        if($post->image) Storage::delete($post->image);
        $post->delete();
        session()->flash('success', 'Запись успешно удалена');
        return redirect()->route('admin.posts.index');
    }
    public function comment(Request $request, Post $post){
        $request->validate([
            'text' => 'required'
        ]);
        $data = $request->only('text');
        $data['user_id'] = auth()->id();
        $post->comments()->create($data);
        return back();
    }
}
