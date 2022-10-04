<?php

use App\Http\Controllers\ClimbController;
use App\Http\Controllers\UserController;
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
    session(['user_id' => 1]);
    return view('pages.homepage');
});

Route::get('/signup', function () {
    return view('pages.signup-signin');
});

// Route::get('/my-climbs', function () {
//     return view('pages.my-climbs');
// });

Route::get('/my-climbs/{user_id}', [UserController::class, 'show']);

Route::get('/add-climb', function () {
    return view('pages.add-climb');
});

Route::get('edit-climb/{climb_id}', [ClimbController::class, 'edit']);

// Route::get('/view-climbs', function () {
//     return view('pages.view-climbs');
// });

Route::get('/view-climbs', [ClimbController::class, 'index']);

Route::get('/single-climb/{climb_id}', [ClimbController::class, 'show']);

Route::post('/add-climb', [ClimbController::class, 'store']);

Route::put('/update-climb/{climb_id}', [ClimbController::class, 'update']);

Route::delete('/delete-climb/{climb_id}/{climb_name}', [ClimbController::class, 'destroy']);
