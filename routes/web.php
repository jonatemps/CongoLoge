<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', 'HomeController@index')->name('home');

Auth::routes();
Route::get('/home', 'HomeController@index')->name('home');
Route::get('auth/google', 'GoogleController@redirectToGoogle');
Route::get('auth/google/callback', 'GoogleController@handleGoogleCallback');

Route::get('auth/facebook', 'Auth\LoginController@redirectToFacebook');
Route::get('auth/facebook/callback', 'Auth\LoginController@handleFacebookCallback');


Route::get('/about', function () {
    return view('about');
})->name('about');


// Route::get('/chat', 'MessageController@index')->middleware('auth')->name('chat');
// Route::livewire('/chat/{id}', 'conversation')
//     ->section('content')
//     ->layout('layouts.master')->name('chat')->middleware('auth');


Route::get('index', function () {
    return view('biens.index');
})->name('biens.list');
Route::get('/show/{slug}', 'BienController@show')->name('bien.show');
Route::livewire('/favorite/{userId}', 'favorite')
        ->section('content')
        ->layout('layouts.master')->name('favorite')->middleware('auth');

Route::livewire('signalAdd','signal-add')
        ->section('content')
        ->layout('layouts.master')->name('biens.addForm');

Route::group(['prefix' => 'admin'], function () {
    Voyager::routes();
});


Route::livewire('/chat/{name?}', 'chat-team')
        ->section('content')
        ->layout('layouts.master')->name('appChat')->middleware('auth');

// Route::livewire('/chat/{name?}', 'chat-team')
//         ->section('content')
//         ->layout('layouts.master')->name('chat')->middleware('auth');
