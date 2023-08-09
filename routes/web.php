<?php

use App\Http\Controllers\AccueilController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\GerantController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

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

// Route::get('/', function () {
//     return view('welcome');
// });
Route::get('/',[AccueilController::class, 'accueil'])->name('home');
Route::get('login', [AuthController::class,'login'])->name('login');

Route::post('gerantStore', [GerantController::class, 'gerantStore'])->name('gerant.add');
Route::get('gerant', [GerantController::class, 'gerant'])->name('gerant.store');


Route::resource('products', ProductController::class)->middleware('auth');
Route::get('/search', [ProductController::class,'search'])->name('products.search');

Route::post('/logout', [AuthController::class,'logout'])->name('auth.logout');
Route::post('connexion', [AuthController::class,'connexion'])->name('connexion');

Route::resource('gerants', GerantController::class)->middleware('auth');

