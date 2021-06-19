<?php

use App\Http\Controllers\CollectController;
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
Route::get('collect-route', function () {
    return 'Hello From Collection Route' ;
});

Route::get('collect',[CollectController::class ,'index'] ) ;
Route::get('offers-by-collect',[CollectController::class ,'collectOffers']) ;



