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
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::middleware('auth')->group(function () {
Route::middleware(['auth', 'employee'])->group(function () {
    // Client routes
    Route::resource('/clients','App\Http\Controllers\ClientsController');
});
Route::resource('/employees','App\Http\Controllers\EmployeeController');
Route::post('/employees/{employees}', 'App\Http\Controllers\EmployeeController@status');
});
Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
