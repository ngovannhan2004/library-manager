<?php

use App\Http\Controllers\AuthorController;
use App\Http\Controllers\BookBackController;
use App\Http\Controllers\BookController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\DausachController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\LoanSlipController;
use App\Http\Controllers\PaymentSlipController;
use App\Http\Controllers\PublishingCompanyController;
use App\Http\Controllers\ReadersController;
use App\Http\Controllers\ConditonController;
use App\Http\Controllers\StatisticController;
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
    return view('admin.pages.auth.login');
})->name('home');
Route::get('/admin/login', [HomeController::class,'login'])->name('admin.auth.login');
Route::post('/admin/login-post', [HomeController::class, 'loginPost'])->name('admin.auth.login-post');
Route::get('/admin/register', [HomeController::class,'register'])->name('admin.auth.register');
Route::post('/admin/register-post', [HomeController::class, 'registerPost'])->name('admin.auth.register-post');

Route::group(['prefix' => 'admin', 'middleware' => ['auth']], function () {
    Route::get('/logout', [HomeController::class, 'logout'])->name('admin.auth.logout');
    Route::group(['prefix' => 'user'], function () {
        Route::get('/', [UserController::class, 'index'])->name('admin.users.index');
        Route::get('/create', [UserController::class, 'create'])->name('admin.users.create');
        Route::post('/store', [UserController::class, 'store'])->name('admin.users.store');
        Route::get('/edit/{id}', [UserController::class, 'edit'])->name('admin.users.edit');
        Route::post('/update/{id}', [UserController::class, 'update'])->name('admin.users.update');
        Route::get('/delete/{id}', [UserController::class, 'destroy'])->name('admin.users.delete');
    });
    Route::group(['prefix' => 'category'], function () {
        Route::get('/', [CategoryController::class, 'index'])->name('admin.categories.index');
        Route::get('/create', [CategoryController::class, 'create'])->name('admin.categories.create');
        Route::post('/store', [CategoryController::class, 'store'])->name('admin.categories.store');
        Route::get('/edit/{id}', [CategoryController::class, 'edit'])->name('admin.categories.edit');
        Route::post('/update/{id}', [CategoryController::class, 'update'])->name('admin.categories.update');
        Route::get('/delete/{id}', [CategoryController::class, 'destroy'])->name('admin.categories.delete');
        Route::get('/restore/{id}', [CategoryController::class, 'restore'])->name('admin.categories.restore');
    });
    Route::group(['prefix' => 'publishing-company'], function () {
        Route::get('/', [PublishingCompanyController::class, 'index'])->name('admin.publishing_companies.index');
        Route::get('/create', [PublishingCompanyController::class, 'create'])->name('admin.publishing_companies.create');
        Route::post('/store', [PublishingCompanyController::class, 'store'])->name('admin.publishing_companies.store');
        Route::get('/edit/{id}', [PublishingCompanyController::class, 'edit'])->name('admin.publishing_companies.edit');
        Route::post('/update/{id}', [PublishingCompanyController::class, 'update'])->name('admin.publishing_companies.update');
        Route::get('/delete/{id}', [PublishingCompanyController::class, 'destroy'])->name('admin.publishing_companies.delete');
        Route::get('/restore/{id}', [PublishingCompanyController::class, 'restore'])->name('admin.publishing_companies.restore');
    });
    Route::group(['prefix' => 'author'], function () {
        Route::get('/', [AuthorController::class, 'index'])->name('admin.authors.index');
        Route::get('/create', [AuthorController::class, 'create'])->name('admin.authors.create');
        Route::post('/store', [AuthorController::class, 'store'])->name('admin.authors.store');
        Route::get('/edit/{id}', [AuthorController::class, 'edit'])->name('admin.authors.edit');
        Route::post('/update/{id}', [AuthorController::class, 'update'])->name('admin.authors.update');
        Route::get('/delete/{id}', [AuthorController::class, 'destroy'])->name('admin.authors.delete');
        Route::get('/restore/{id}', [AuthorController::class, 'restore'])->name('admin.authors.restore');
    });
    Route::group(['prefix' => 'condition'], function () {
        Route::get('/', [ConditonController::class, 'index'])->name('admin.conditions.index');
        Route::get('/create', [ConditonController::class, 'create'])->name('admin.conditions.create');
        Route::post('/store', [ConditonController::class, 'store'])->name('admin.conditions.store');
        Route::get('/edit/{id}', [ConditonController::class, 'edit'])->name('admin.conditions.edit');
        Route::post('/update/{id}', [ConditonController::class, 'update'])->name('admin.conditions.update');
        Route::get('/delete/{id}', [ConditonController::class, 'destroy'])->name('admin.conditions.delete');
        Route::get('/restore/{id}', [ConditonController::class, 'restore'])->name('admin.conditions.restore');
    });

    Route::group(['prefix' => 'readers'], function () {
        Route::get('/', [ReadersController::class, 'index'])->name('admin.readers.index');
        Route::get('/create', [ReadersController::class, 'create'])->name('admin.readers.create');
        Route::post('/store', [ReadersController::class, 'store'])->name('admin.readers.store');
        Route::get('/edit/{id}', [ReadersController::class, 'edit'])->name('admin.readers.edit');
        Route::post('/update/{id}', [ReadersController::class, 'update'])->name('admin.readers.update');
        Route::get('/delete/{id}', [ReadersController::class, 'destroy'])->name('admin.readers.delete');
        Route::get('/restore/{id}', [ReadersController::class, 'restore'])->name('admin.readers.restore');
    });
    Route::group(['prefix' => 'payment-slip'], function () {
        Route::get('/', [PaymentSlipController::class, 'index'])->name('admin.payment_slips.index');
        Route::get('/create', [PaymentSlipController::class, 'create'])->name('admin.payment_slips.create');
        Route::post('/store', [PaymentSlipController::class, 'store'])->name('admin.payment_slips.store');
        Route::get('/edit/{id}', [PaymentSlipController::class, 'edit'])->name('admin.payment_slips.edit');
        Route::post('/update/{id}', [PaymentSlipController::class, 'update'])->name('admin.payment_slips.update');
        Route::get('/delete/{id}', [PaymentSlipController::class, 'destroy'])->name('admin.payment_slips.delete');
        Route::get('/restore/{id}', [PaymentSlipController::class, 'restore'])->name('admin.payment_slips.restore');
    });
    Route::group(['prefix' => 'loan-slip'], function () {
        Route::get('/', [LoanSlipController::class, 'index'])->name('admin.loan_slips.index');
        Route::get('/create', [LoanSlipController::class, 'create'])->name('admin.loan_slips.create');
        Route::post('/store', [LoanSlipController::class, 'store'])->name('admin.loan_slips.store');
        Route::get('/edit/{id}', [LoanSlipController::class, 'edit'])->name('admin.loan_slips.edit');
        Route::post('/update/{id}', [LoanSlipController::class, 'update'])->name('admin.loan_slips.update');
        Route::get('/delete/{id}', [LoanSlipController::class, 'destroy'])->name('admin.loan_slips.delete');
        Route::get('/restore/{id}', [LoanSlipController::class, 'restore'])->name('admin.loan_slips.restore');
    });
     Route::group(['prefix' => 'book'], function () {
        Route::get('/', [BookController::class, 'index'])->name('admin.books.index');
        Route::get('/create', [BookController::class, 'create'])->name('admin.books.create');
        Route::post('/store', [BookController::class, 'store'])->name('admin.books.store');
        Route::get('/edit/{id}', [BookController::class, 'edit'])->name('admin.books.edit');
        Route::post('/update/{id}', [BookController::class, 'update'])->name('admin.books.update');
        Route::get('/delete/{id}', [BookController::class, 'destroy'])->name('admin.books.delete');
        Route::get('/restore/{id}', [BookController::class, 'restore'])->name('admin.books.restore');
    });

        Route::group(['prefix' => 'statistic'], function () {
        Route::get('/', [StatisticController::class, 'index'])->name('admin.statistics.index');
    });


});
