<?php

use App\Http\Controllers\Admin\AdminCheckoutController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\DiscountController;
use App\Http\Controllers\Member\MemberController;
use App\Http\Controllers\Menthor\MenthorController;
use App\Http\Controllers\Auth\LoginController as LoginController;
use App\Http\Controllers\Member\CheckoutController;
use Illuminate\Support\Facades\Auth;

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
    return view('welcome');
})->name('welcome');

// Route::get('/dashboard', function () {
//     return view('dashboard');
// })->middleware(['auth'])->name('dashboard');


// Socialite Routes Google
Route::get('sign-in-google', [LoginController::class, 'google'])->name('user.login.google');
Route::get('auth/google/callback', [LoginController::class, 'handleProviderCallback'])->name('user.google.callback');
// Midtrans Route
// Membutuhkan  Instant Payment seperti BCA
Route::get('payment/success', [CheckoutController::class, 'midtransCallback']);
// Membutuhkan  waktu validation seperti payment indomaret maka membutuhkan route post
Route::post('payment/success', [CheckoutController::class, 'midtransCallback']);
Auth::routes();

// Route::get('/home', [HomeController::class, 'index'])->name('home');

// Routes Admin
Route::prefix('/admin')->name('admin.')->group(function () {
    Route::middleware(['admin'])->group(function () {
        Route::get('/dashboard', [AdminController::class, 'index'])->name('index');
        Route::post('/checkout/{checkout}', [AdminCheckoutController::class, 'update'])->name('checkout.update');
        Route::resource('/discount', DiscountController::class);
    });
});
// Routes Menthor
Route::prefix('/menthor')->name('menthor.')->group(function () {
    Route::middleware(['menthor'])->group(function () {
        Route::get('/dashboard', [MenthorController::class, 'index'])->name('index');
    });
});
// Routes Member
Route::prefix('/member')->name('member.')->group(function () {
    Route::middleware(['member'])->group(function () {
        Route::get('/dashboard', [MemberController::class, 'index'])->name('index');
        Route::get('/dashboard/checkout/invoice/{checkout}', [CheckoutController::class, 'invoice'])->name('checkout.invoice');
        // Checkout
        Route::get('/checkout/success', [CheckoutController::class, 'success'])->name('checkout.success');
        Route::get('/checkout/{camp:slug}', [CheckoutController::class, 'create'])->name('checkout');
        Route::post('/checkout/{camp}', [CheckoutController::class, 'store'])->name('checkout.store');
        // Update [Profile]
        Route::get('/profile', [MemberController::class, 'profile'])->name('profile');
        Route::post('/profile', [MemberController::class, 'profileUpdate'])->name('profile.update');
        // Update password
        Route::get('/chagepassword', [MemberController::class, 'changePassword'])->name('password');
        Route::post('/chagepassword', [MemberController::class, 'changePasswordUpdate'])->name('password.update');
    });
});
