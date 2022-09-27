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

Route::get('/', function () {
    return view('pages.homepage');
});

Route::get('/signup', function () {
    return view('pages.signup-signin');
});

Route::get('/profile', function () {
    return view('pages.profile');
});

Route::get('/add-climb', function () {
    return view('pages.add-climb');
});

Route::get('/all-climbs', function () {
    return view('pages.all-climbs');
});