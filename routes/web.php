<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PushController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/refresh', function(){
    return view('refresh');
})->name('refresh');
Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::post('/push', [PushController::class, 'push'])->name('push');
	Route::post('/push_store', [PushController::class, 'store']);

