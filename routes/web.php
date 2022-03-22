<?php

use App\Http\Controllers\SettingConttroller;
use App\Http\Controllers\Website\HomeController;
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

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/', [HomeController::class, 'index'])->name('website');
Route::get('lang/{lang}', [SettingConttroller::class, 'switchLang'])->name('lang.switch');
Route::get('mode/{mode}', [SettingConttroller::class, 'switchMode'])->name('mode.switch');

require __DIR__.'/auth.php';
require __DIR__.'/dashboard.php';
require __DIR__.'/website.php';
