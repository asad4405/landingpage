<?php

use App\Http\Controllers\Backend\CategoryController;
use App\Http\Controllers\Backend\DashboardController;
use Illuminate\Support\Facades\Route;

Route::get('/dashboard', [DashboardController::class, 'dashboard'])->middleware('auth')->name('dashboard');
Route::group(['middleware' => 'auth', 'prefix' => '/admin'], function () {
    // Categories
    Route::resource('category', CategoryController::class, ['names' => 'admin.category']);
    // Route::get('subcategory/status/{id}', [SubcategoryController::class, 'statusUpdate']);
});
