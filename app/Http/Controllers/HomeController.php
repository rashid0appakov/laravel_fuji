<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\Startup;
use App\Models\Slide;
use App;
class HomeController extends Controller
{
    public function index(Request $request) {
        $posts = Post::latest()->limit(2)->get();
        $slides = Slide::all();
        $startups = Startup::latest()->limit(6)->get();
        return view('home', compact('posts', 'slides', 'startups'));
    }
    public function lang($locale){
        App::setlocale($locale);
        session()->put('lang', $locale);
        return redirect()->back();
    }
    public function about(){
        $posts = Post::latest()->limit(2)->get();
        return view('about', compact('posts'));
    }
}
