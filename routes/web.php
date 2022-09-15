<?php

use App\Http\Controllers\Admin\UserCodeController as AdminUserCodeController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\PrizeController as AdminPrizeController;
use App\Http\Controllers\Admin\GrandPrizeWinnerController as AdminGrandPrizeWinnerController;
use App\Http\Controllers\Admin\PrizeWinnerController as AdminPrizeWinnerController;
use App\Http\Controllers\Admin\UsersCodeExportController as AdminUsersCodeExportController;
use App\Http\Controllers\Admin\PrizesCodeExportController as AdminPrizesCodeExportController;
use App\Http\Controllers\Admin\PrizeWinnersExportController as AdminPrizeWinnersExportController;
use App\Http\Controllers\Admin\GrandPrizeWinnersExportController as AdminGrandPrizeWinnersExportController;
use App\Http\Controllers\Admin\UsersCodeImportController as AdminUsersCodeImportController;
use App\Http\Controllers\Admin\PrizesCodeImportController as AdminPrizesCodeImportController;
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
Route::get('/leaderboard', [HomeController::class, 'showLeaderboard'])->name('home.leaderboard');

Route::get('/get/prize', [HomeController::class, 'getPrize'])->name('home.get.prize');
Route::get('/get/message/win', [HomeController::class, 'getMessageWin'])->name('home.get.message.win');
Route::get('/get/message/error', [HomeController::class, 'getMessageError'])->name('home.get.message.error');
Route::get('/get/spinner', [HomeController::class, 'getSpinnerStatus'])->name('home.get.spinner');

Route::post('/post/form', [HomeController::class, 'postForm'])->name('home.post.form');
Route::post('/post/currentPrizeWinner', [HomeController::class, 'postCurrentPrizeWinner'])->name('home.update.postCurrentPrizeWinner');

Route::get('/dashboard', [DashboardController::class, 'index'])->middleware(['auth'])->name('dashboard');
Route::get('/dashboard/get/message/error', [DashboardController::class, 'getMessageError'])->name('dashboard.get.message.error');
Route::post('/dashboard/post/checkSelectedMonth', [DashboardController::class, 'checkSelectedMonth'])->middleware(['auth'])->name('dashboard.post.checkCurrentMonth');
Route::post('/dashboard/post/setGrandPrizeWinner', [DashboardController::class, 'setGrandPrizeWinner'])->middleware(['auth'])->name('dashboard.post.setGrandPrizeWinner');

Route::group([
    'prefix' => 'admin',
    'namespace' => 'Admin',
    'middleware' => ['auth']
], function () {
    Route::get('/usercode/index', [AdminUserCodeController::class, 'index'])->name('admin.usercode.index');
    Route::post('/usercode/export', [AdminUsersCodeExportController::class, 'export'])->name('admin.usercode.export');
    Route::get('/usercode/import/show', [AdminUsersCodeImportController::class, 'show'])->name('admin.usercode.import.show');
    Route::post('/usercode/import/store', [AdminUsersCodeImportController::class, 'store'])->name('admin.usercode.import.store');

    Route::get('/prize/index', [AdminPrizeController::class, 'index'])->name('admin.prize.index');
    Route::post('/prize/export', [AdminPrizesCodeExportController::class, 'export'])->name('admin.prize.export');
    Route::get('/prize/import/show', [AdminPrizesCodeImportController::class, 'show'])->name('admin.prize.import.show');
    Route::post('/prize/import/store', [AdminPrizesCodeImportController::class, 'store'])->name('admin.prize.import.store');

    Route::get('/prize-winner/index', [AdminPrizeWinnerController::class, 'index'])->name('admin.prize.winner.index');
    Route::post('/prize-winner/export', [AdminPrizeWinnersExportController::class, 'export'])->name('admin.prize.winner.export');

    Route::get('/grand-prize-winner/index', [AdminGrandPrizeWinnerController::class, 'index'])->name('admin.grand.prize.winner.index');
    Route::post('/grand-prize-winner/export', [AdminGrandPrizeWinnersExportController::class, 'export'])->name('admin.grand.prize.winner.export');
});

require __DIR__.'/auth.php';
