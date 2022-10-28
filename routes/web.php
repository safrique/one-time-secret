<?php

use App\Http\Controllers\SecretController;
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

Route::get('', function () { return view('welcome'); });
Route::get('secret/{key}', [SecretController::class, 'read']);
Route::get('link', [SecretController::class, 'create']);
