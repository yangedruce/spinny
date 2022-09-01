<?php

use App\Http\Controllers\Admin\CodeController as AdminCodeController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\PrizeController as AdminPrizeController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Admin\GrandPrizeWinnerController as AdminGrandPrizeWinnerController;
use App\Http\Controllers\Admin\PrizeWinnerController as AdminPrizeWinnerController;
use App\Http\Controllers\Admin\UsersCodeExportController as AdminUsersCodeExportController;
use App\Http\Controllers\Admin\PrizesCodeExportController as AdminPrizesCodeExportController;
use App\Http\Controllers\CodeController;
use App\Http\Controllers\PrizeController;
// use App\Http\Controllers\GrandPrizeWinnerController;
// use App\Http\Controllers\PrizeWinnerController;
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
    Route::post('/code/export', [AdminUsersCodeExportController::class, 'export'])->name('admin.code.export');

    Route::get('/prize/index', [AdminPrizeController::class, 'index'])->name('admin.prize.index');
    Route::post('/prize/export', [AdminPrizesCodeExportController::class, 'export'])->name('admin.prize.export');

    Route::get('/prize-winner/index', [AdminPrizeWinnerController::class, 'index'])->name('admin.prize.winner.index');

    Route::get('/grand-prize-winner/index', [AdminGrandPrizeWinnerController::class, 'index'])->name('admin.grand.prize.winner.index');
});

require __DIR__.'/auth.php';
