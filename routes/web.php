<?php

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

Auth::routes(['verify' => true]);

Route::view('/', 'welcome');
Route::view('/profile', 'profile.show')->name('profile');
Route::view('{any}', 'app')
    ->where('any', '^(?!api).*$')
    ->middleware(['auth', 'verified'])
    ->name('home');
