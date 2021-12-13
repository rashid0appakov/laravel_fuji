<?php

use Illuminate\Support\Facades\Route;
Auth::routes();
Route::get('/lang/{lang}', [App\Http\Controllers\HomeController::class, 'lang'])->where('lang', 'us|es|cn')->name('lang');
Route::post('/calc', [App\Http\Controllers\CalculatorController::class, 'calc']);
Route::get('/currencies', [App\Http\Controllers\CurrencyController::class, 'index']);
Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
//Route::get('/startups', [App\Http\Controllers\StartupController::class, 'frontIndex'])->name('startups.index');
Route::get('/startups/{startup}', [App\Http\Controllers\StartupController::class, 'frontShow'])->name('startups.show');
Route::get('/about', [App\Http\Controllers\HomeController::class, 'about'])->name('about');
Route::get('/posts', [App\Http\Controllers\PostController::class, 'frontIndex'])->name('posts.index');
Route::get('/posts/{post}', [App\Http\Controllers\PostController::class, 'frontShow'])->name('posts.show');
Route::post('/posts/{post}/comment', [App\Http\Controllers\PostController::class, 'comment'])->name('posts.comment');
Route::group([
    'prefix'        => '/cabinet',
    'middleware'    => ['auth'],
    'as'            => 'cabinet.'
], function(){
    Route::get('/', [App\Http\Controllers\CabinetController::class, 'index'])->name('index');
    Route::get('/account', [App\Http\Controllers\CabinetController::class, 'account'])->name('account');
    Route::post('/account', [App\Http\Controllers\CabinetController::class, 'accountUpdate'])->name('account.update');
    Route::view('calculator', 'cabinet.calculator')->name('calculator');
    Route::view('course', 'cabinet.cource')->name('course');
    Route::post('/connect', [App\Http\Controllers\CabinetController::class, 'TronAddressUpdate'])->name('tron.update');
});
Route::group([
    'prefix' => '/user',
    'middleware' => ['auth'],
    'as' => 'user.'
], function(){
    Route::get('/profile', [App\Http\Controllers\UserController::class, 'profile'])->name('profile.show');
    Route::post('/profile', [App\Http\Controllers\UserController::class, 'profileUpdate'])->name('profile.update');
});
Route::group([
    'prefix' => '/admin',
    'middleware' => ['auth', 'admin'],
    'as' => 'admin.'
], function(){
    Route::view('/', 'admin.index')->name('index');
    Route::resources([
        'users' => App\Http\Controllers\UserController::class,
        'posts' => App\Http\Controllers\PostController::class,
        'startups' => App\Http\Controllers\StartupController::class,
        'slides' => App\Http\Controllers\SlideController::class
    ]);
});