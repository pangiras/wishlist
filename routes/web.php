<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SettingController; 



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



Route::middleware(['auth.shopify'])->group(function () {
    

    Route::get('/', function () {
        return view('dashboard');
    })->name('home');
    
    Route::view('/products','products');
    Route::view('/customers','customers');
    Route::view('/settings','settings');
    Route::post('configureTheme',[SettingController::class,'configureTheme']);


});
