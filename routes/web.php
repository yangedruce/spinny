<?php

use App\Http\Controllers\Admin\CodeController as AdminCodeController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\PrizeController as AdminPrizeController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Admin\WinnerController as AdminWinnerController;
use App\Http\Controllers\CodeController;
use App\Http\Controllers\PrizeController;
// use App\Http\Controllers\WinnerController;
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

Route::get('/', [CodeController::class, 'index'])->name('user.index');

Route::get('/dashboard', [DashboardController::class, 'index'])->middleware(['auth'])->name('dashboard');

Route::group([
    'prefix' => 'admin',
    'namespace' => 'Admin',
    'middleware' => ['auth']
], function () {
    Route::get('/code/index', [AdminCodeController::class, 'index'])->name('admin.code.index');
    Route::get('/prize/index', [AdminPrizeController::class, 'index'])->name('admin.prize.index');
    Route::get('/winner/index', [AdminWinnerController::class, 'index'])->name('admin.winner.index');
});

require __DIR__.'/auth.php';
