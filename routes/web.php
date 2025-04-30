<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\CollectionController;
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
    return redirect()->route('home');
});


Auth::routes();

// Route::get('/home', [CollectionController::class, 'index'])->name('home');


// Route::middleware(['auth'])->group(function () {
//     Route::resource('collections', CollectionController::class)->only(['index', 'create', 'store']);
// });
// Route::post('/collections', [CollectionController::class, 'store'])->name('collections.store');

Route::middleware(['auth'])->group(function () {
    Route::get('/home', [CollectionController::class, 'index'])->name('home');
    Route::post('/collections', [CollectionController::class, 'store'])->name('collections.store');
});