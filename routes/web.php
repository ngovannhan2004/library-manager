<?php

use App\Http\Controllers\DausachController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

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



Route::get('/', function () {
    return view('admin.layouts.main');
})->name('home');
Route::get('/admin/login', [HomeController::class,'login'])->name('admin.auth.login');
Route::post('/admin/login-post', [HomeController::class, 'loginPost'])->name('admin.auth.login-post');
Route::get('/admin/register', [HomeController::class,'register'])->name('admin.auth.register');
Route::post('/admin/register-post', [HomeController::class, 'registerPost'])->name('admin.auth.register-post');

Route::group(['prefix' => 'user'], function () {
    Route::get('/', [UserController::class, 'index'])->name('admin.users.index');
    Route::get('/create', [UserController::class, 'create'])->name('admin.users.create');
    Route::post('/store', [UserController::class, 'store'])->name('admin.users.store');
    Route::get('/edit/{id}', [UserController::class, 'edit'])->name('admin.users.edit');
    Route::post('/update/{id}', [UserController::class, 'update'])->name('admin.users.update');
    Route::get('/delete/{id}', [UserController::class, 'destroy'])->name('admin.users.delete');
});



