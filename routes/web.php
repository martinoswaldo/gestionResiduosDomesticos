<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\CollectionController;
use App\Http\Controllers\ReportController;
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


Route::middleware(['auth'])->group(function () {
    Route::get('/home', [CollectionController::class, 'index'])->name('home');
    Route::post('/collections', [CollectionController::class, 'store'])->name('collections.store');
    Route::get('/reports/user', [ReportController::class, 'userReport'])->name('reports.user');
    Route::get('/reports/admin', [ReportController::class, 'adminReport'])->name('reports.admin');
    Route::get('/reports/user/pdf', [ReportController::class, 'downloadUserReportPdf'])->name('reports.user.pdf');
    Route::get('/reports/admin/pdf', [ReportController::class, 'downloadAdminReportPdf'])->name('reports.admin.pdf');
});