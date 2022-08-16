<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Member\MemberController;
use App\Http\Controllers\Menthor\MenthorController;
use App\Http\Controllers\Auth\LoginController as LoginController;
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

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');


// Socialite Routes Google
Route::get('sign-in-google', [LoginController::class, 'google'])->name('user.login.google');
Route::get('auth/google/callback', [LoginController::class, 'handleProviderCallback'])->name('user.google.callback');

Auth::routes();

Route::get('/home', [HomeController::class, 'index'])->name('home');
Route::get('/admin', [AdminController::class, 'index'])->name('admin')->middleware('admin');
Route::get('/menthor', [MenthorController::class, 'index'])->name('menthor')->middleware('menthor');
Route::get('/member', [MemberController::class, 'index'])->name('member')->middleware('member');
