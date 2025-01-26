<?php

use App\Http\Controllers\AdminController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\ArticleController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\BureauController;
use App\Http\Controllers\SiegeController;
use App\Http\Controllers\StockController;
use App\Models\Admin;
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

Auth::routes();


// Admin Dashboard Route
Route::get('/admin/login', [AdminController::class, 'login'])->name('admin.login');
Route::post('/admin/login', [AdminController::class, 'check'])->name('admin.check');
Route::middleware(['admin'])->group(function () {
    Route::get('/admin/dashboard', [AdminController::class, 'index'])->name('admin.dashboard');
    Route::get('/admin', [AdminController::class, 'index'])->name('admin.index');
    Route::get('/admin/users', [AdminController::class, 'users'])->name('admin.users.index');
    Route::get('/admin/users/create', [RegisterController::class, 'showRegistrationForm'])->name('admin.users.create');
    Route::post('/admin/users/create', [AdminController::class, 'store_user'])->name('admin.users.store');
    Route::get('/admin/articles', [AdminController::class, 'articles'])->name('admin.articles.index');
    Route::get('/admin/bureaux', [AdminController::class, 'bureaux'])->name('admin.bureaux.index');
    Route::get('/admin/sieges', [AdminController::class, 'sieges'])->name('admin.sieges.index');
    // Add a new route for sieges
    Route::get('/admin/sieges', [SiegeController::class, 'index'])->name('admin.sieges.index');
    Route::get('/admin/sieges/create', [SiegeController::class, 'create'])->name('admin.sieges.create');
    Route::post('/admin/sieges/create', [SiegeController::class, 'store'])->name('admin.sieges.store');
    Route::get('/admin/sieges/{id}/edit', [SiegeController::class, 'edit'])->name('admin.sieges.edit');
    Route::put('/admin/sieges/{id}', [SiegeController::class, 'update'])->name('admin.sieges.update');
    Route::delete('/admin/sieges/{id}', [SiegeController::class, 'destroy'])->name('admin.sieges.destroy');
    
    // Route::get('/admin/user/{id}/edit', [RegisterController::class, 'edit_user'])->name('admin.user.edit');
    // Route::put('/admin/user/{id}', [RegisterController::class, 'update_user'])->middleware('web')->name('admin.user.update');
    Route::delete('/admin/user/{id}', [AdminController::class, 'destroy_user'])->name('admin.user.destroy');
    // Add more admin-specific routes as needed
     // stockes 
     Route::get('/admin/stockes', [AdminController::class, 'showstock'])->name('admin.stock');
    //  Route::get('/admin/changeStatus/{id}/{status}', [StockController::class, 'changeStatus'])->name('changeStatus');
    //  Route::patch('/admin/changeStatus/{id}', [StockController::class, 'changeStatus'])->name('changeStatus');
     
});
Route::middleware(['auth'])->group(function () {

    Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
    Route::get('/home', [App\Http\Controllers\HomeController::class, 'index']);
    // articles
    Route::get('/articles', [ArticleController::class, 'index'])->name('articles.index');
    Route::get('/articles/create', [ArticleController::class, 'create'])->name('articles.create');
    Route::post('/articles/create', [ArticleController::class, 'store'])->name('articles.store');
    Route::get('/articles/{id}/edit', [ArticleController::class, 'edit'])->name('articles.edit');
    Route::put('/articles/{id}', [ArticleController::class, 'update'])->name('articles.update');
    Route::delete('/articles/{id}', [ArticleController::class, 'destroy'])->name('articles.destroy');
    // bureau 
    Route::get('/bureaux', [BureauController::class, 'index'])->name('bureaux.index');
    Route::get('/bureaux/create', [BureauController::class, 'create'])->name('bureaux.create');
    Route::post('/bureaux/create', [BureauController::class, 'store'])->name('bureaux.store');
    Route::get('/bureaux/{id}/edit', [BureauController::class, 'edit'])->name('bureaux.edit');
    Route::put('/bureaux/{id}', [BureauController::class, 'update'])->name('bureaux.update');
    Route::delete('/bureaux/{id}', [BureauController::class, 'destroy'])->name('bureaux.destroy');
    // stockes 
    Route::get('/stockes', [StockController::class, 'index'])->name('stockes.index');
    Route::get('/changeStatus/{id}/{status}', [StockController::class, 'changeStatus'])->name('changeStatus');
    Route::patch('/changeStatus/{id}', [StockController::class, 'changeStatus'])->name('changeStatus');
    
    // Route::get('/stockes/create', [StockController::class, 'create'])->name('stockes.create');
    // Route::post('/stockes/create', [StockController::class, 'store'])->name('stockes.store');
    // Route::get('/stockes/{id}/edit', [StockController::class, 'edit'])->name('stockes.edit');
    // Route::put('/stockes/{id}', [StockController::class, 'update'])->name('stockes.update');
    // Route::delete('/stockes/{id}', [StockController::class, 'destroy'])->name('stockes.destroy');
});