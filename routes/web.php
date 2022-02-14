<?php

use App\Http\Controllers\Auth\RegisterController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\UsersController;
use App\Http\Controllers\LoginsController;
use App\Http\Controllers\RegistersController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\TestController;

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
Route::get('/locale/{locale}', function ($locale) {
    if (!in_array($locale, ['en', 'id'])) {
        abort(404);
    }

    \App::setLocale($locale);
    // Session
    session()->put('locale', $locale);

    return redirect()->back();
});

Route::get('/', [AdminController::class, 'index']);
Route::get('/profile', [AdminController::class, 'profile'])->name('profile');
Route::post('/profile', [AdminController::class, 'update'])->name('profile.update');
Route::post('/register1', [RegistersController::class, 'create'])->name('register.create.user');

Route::get('/login', [AuthController::class, 'index'])->name('login');
Route::get('/register', [RegistersController::class, 'index'])->name('register');

Route::post('proses_login', [AuthController::class, 'proses_login'])->name('proses_login');
Route::get('logout', [AuthController::class, 'logout'])->name('logout');

Route::get('/order', [OrderController::class, 'index'])->name('order');
Route::get('/order/{id}', [OrderController::class, 'detail'])->name('order.detail');
Route::post('/order', [OrderController::class, 'store'])->name('order.store');
Route::post('/order/remove', [OrderController::class, 'remove'])->name('order.remove');

Route::group(['middleware' => ['auth']], function () {

    Route::group(['middleware' => ['CekLogin:1']], function () {

        Route::get('/admin', [AdminController::class, 'index'])->name('admin');
        Route::get('/acc', [AdminController::class, 'accm'])->name('account_maintenance');
        Route::post('/register', [RegistersController::class, 'update'])->name('register.update');
        Route::post('/register/hapus', [RegistersController::class, 'delete'])->name('register.delete');

    });

    Route::group(['middleware' => ['CekLogin:2']], function () {
        Route::get('/users', [AdminController::class, 'index'])->name('users');
    });
});
