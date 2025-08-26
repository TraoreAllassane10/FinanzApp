<?php

use App\Http\Controllers\Admin\AdminSubscriptionController;
use App\Http\Controllers\Admin\AdminTransactionController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\PlanController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\User\CardController;
use App\Http\Controllers\User\CheckoutController;
use App\Http\Controllers\User\DashboardController as UserDashboardController;
use App\Http\Controllers\User\PocketController;
use App\Http\Controllers\User\StatsController;
use App\Http\Controllers\User\SubscriptionController;
use App\Http\Controllers\User\TransactionController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

#ADMIN
Route::get('/admin/home', [DashboardController::class, 'index'])->middleware(['auth', 'verified'])->name('admin.home');
Route::resource('/admin/plan', PlanController::class)->middleware(['auth', 'verified']);

Route::get('/admin/subscription', [AdminSubscriptionController::class, "index"])->middleware(['auth', 'verified'])->name('admin.subscription');
Route::get('/admin/subscription/{subscription}', [AdminSubscriptionController::class, "show"])->middleware(['auth', 'verified'])->name('admin.subscription.show');
Route::get("/admin/subscription/disable/{subscription}", [AdminSubscriptionController::class, "disable"])->middleware(['auth', 'verified'])->name('admin.subscription.disable');
Route::get("/admin/subscription/enable/{subscription}", [AdminSubscriptionController::class, "enable"])->middleware(['auth', 'verified'])->name('admin.subscription.enable');

Route::get('/admin/users', [UserController::class, 'index'])->middleware(['auth', 'verified'])->name('admin.user');

Route::get('/admin/transaction', [AdminTransactionController::class, 'index'])->middleware(['auth', 'verified'])->name('admin.transaction');

# USER
Route::get('/home', [UserDashboardController::class, 'index'])->middleware(['auth', 'verified'])->name('user.home');

Route::resource('/card', CardController::class)->middleware(['auth', 'verified']);

Route::resource('/pocket', PocketController::class)->middleware(['auth', 'verified']);

Route::resource('/transaction', TransactionController::class)->middleware(['auth', 'verified']);

Route::get('/statistique', [StatsController::class, 'index'])->middleware(['auth', 'verified'])->name('stats.index');

Route::get('/subscription', [SubscriptionController::class, 'index'])->middleware(['auth', 'verified'])->name('subscription.index');

# CHECKOUT
Route::get("/checkout/plan/{plan}", [CheckoutController::class, 'checkout'])->name('plan.checkout')->middleware(['auth', 'verified']);
Route::get("/checkout/success", [CheckoutController::class, 'success'])->name('plan.checkout.success')->middleware(['auth', 'verified']);
Route::get("/checkout/cancel", [CheckoutController::class, 'cancel'])->name('plan.checkout.cancel')->middleware(['auth', 'verified']);

require __DIR__ . '/auth.php';