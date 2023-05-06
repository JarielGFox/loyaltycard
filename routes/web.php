<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AccountController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\PageController;
use App\Http\Controllers\ProductController;

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

Route::get('/', [PageController::class, 'homePage'])->name('home');


Route::middleware('auth')->group(function () {
    Route::get('/card', [AccountController::class, 'card'])->name('card-manager');
    Route::post('/card/reward{product}', [AccountController::class, 'reward'])->name('card.reward');
    Route::post('/card/reward{product}/destroy', [AccountController::class, 'rewardUndo'])->name('card.reward.undo');

    // Points manager page
    Route::get('/admin/card/points/', [AdminController::class, 'pointsManager'])->name('points-manager');

    // Account page
    Route::get('/account', [PageController::class, 'myAccount'])->name('my-account');

    Route::post('/admin/card/points/update', [AdminController::class, 'givePoints'])->name('cards.points.update');
    Route::post('/admin/card/points/check', [AdminController::class, 'checkPoints'])->name('cards.points.check');


    Route::resource('catalogue', ProductController::class)->parameters([
        'catalogue' => 'product' // tocca far così perchè la tabella nel DB si chiama products
    ]);;
});
