<?php

use App\Http\Controllers\Admin\SpinCodeController as AdminSpinCodeController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\PrizeController as AdminPrizeController;
use App\Http\Controllers\Admin\GrandPrizeWinnerController as AdminGrandPrizeWinnerController;
use App\Http\Controllers\Admin\PrizeWinnerController as AdminPrizeWinnerController;
use App\Http\Controllers\Admin\SpinCodesExportController as AdminSpinCodesExportController;
use App\Http\Controllers\Admin\PrizesExportController as AdminPrizesExportController;
use App\Http\Controllers\Admin\PrizeWinnersExportController as AdminPrizeWinnersExportController;
use App\Http\Controllers\Admin\GrandPrizeWinnersExportController as AdminGrandPrizeWinnersExportController;
use App\Http\Controllers\Admin\SpinCodesImportController as AdminSpinCodesImportController;
use App\Http\Controllers\Admin\PrizesImportController as AdminPrizesImportController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\Helper;
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

Route::get('/', [HomeController::class, 'index'])->name('home.index');

Route::get('/get/prize', [HomeController::class, 'getPrize'])->name('home.get.prize');
Route::get('/get/prize-winner', [HomeController::class, 'getPrizeWinner'])->name('home.get.prize.winner');
Route::get('/get/message/win', [HomeController::class, 'getMessageWin'])->name('home.get.message.win');
Route::get('/get/message/error', [HomeController::class, 'getMessageError'])->name('home.get.message.error');

Route::post('/post/form', [HomeController::class, 'postForm'])->name('home.post.form');
Route::post('/post/current-prize-winner', [HomeController::class, 'postCurrentPrizeWinner'])->name('home.update.postCurrentPrizeWinner');

Route::get('/dashboard', [DashboardController::class, 'index'])->middleware(['auth'])->name('dashboard');
Route::get('/dashboard/get/message/error', [DashboardController::class, 'getMessageError'])->name('dashboard.get.message.error');
Route::post('/dashboard/post/check-selected-month', [DashboardController::class, 'checkSelectedMonth'])->middleware(['auth'])->name('dashboard.post.checkCurrentMonth');
Route::post('/dashboard/post/set-grand-prize-winner', [DashboardController::class, 'setGrandPrizeWinner'])->middleware(['auth'])->name('dashboard.post.setGrandPrizeWinner');

Route::group([
    'prefix' => 'admin',
    'namespace' => 'Admin',
    'middleware' => ['auth']
], function () {
    Route::get('/spin-code/index', [AdminSpinCodeController::class, 'index'])->name('admin.spin.code.index');
    Route::post('/spin-code/export', [AdminSpinCodesExportController::class, 'export'])->name('admin.spin.code.export');
    Route::get('/spin-code/import/show', [AdminSpinCodesImportController::class, 'show'])->name('admin.spin.code.import.show');
    Route::post('/spin-code/import/store', [AdminSpinCodesImportController::class, 'store'])->name('admin.spin.code.import.store');

    Route::get('/prize/index', [AdminPrizeController::class, 'index'])->name('admin.prize.index');
    Route::post('/prize/export', [AdminPrizesExportController::class, 'export'])->name('admin.prize.export');
    Route::get('/prize/import/show', [AdminPrizesImportController::class, 'show'])->name('admin.prize.import.show');
    Route::post('/prize/import/store', [AdminPrizesImportController::class, 'store'])->name('admin.prize.import.store');

    Route::get('/prize-winner/index', [AdminPrizeWinnerController::class, 'index'])->name('admin.prize.winner.index');
    Route::post('/prize-winner/export', [AdminPrizeWinnersExportController::class, 'export'])->name('admin.prize.winner.export');

    Route::get('/grand-prize-winner/index', [AdminGrandPrizeWinnerController::class, 'index'])->name('admin.grand.prize.winner.index');
    Route::post('/grand-prize-winner/export', [AdminGrandPrizeWinnersExportController::class, 'export'])->name('admin.grand.prize.winner.export');
});

require __DIR__.'/auth.php';
