<?php

use App\Http\Controllers\MenuItemsController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\VisitorController;


/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/


Route::resource('visitors', VisitorController::class);



Route::get('/menus', [MenuItemsController::class, 'index']);
Route::post('/menus', [MenuItemsController::class, 'store']);






