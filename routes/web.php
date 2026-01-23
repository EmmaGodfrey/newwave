<?php

use Illuminate\Support\Facades\Auth;
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

// Authentication Routes
Auth::routes();

// Frontend Routes (Public)
Route::get('/', [App\Http\Controllers\HomeController::class, 'root'])->name('home');
Route::get('/about', [App\Http\Controllers\HomeController::class, 'about'])->name('about');
Route::get('/services', [App\Http\Controllers\HomeController::class, 'services'])->name('services');
Route::get('/portfolio', [App\Http\Controllers\PortfolioController::class, 'index'])->name('portfolio');
Route::get('/portfolio/category/{slug}', [App\Http\Controllers\PortfolioController::class, 'category'])->name('portfolio.category');
Route::get('/portfolio/event/{slug}', [App\Http\Controllers\PortfolioController::class, 'show'])->name('portfolio.event');
Route::get('/blog', [App\Http\Controllers\HomeController::class, 'blog'])->name('blog');
Route::get('/contact', [App\Http\Controllers\HomeController::class, 'contact'])->name('contact');
Route::get('/pricing', [App\Http\Controllers\HomeController::class, 'pricing'])->name('pricing');
Route::get('/team', [App\Http\Controllers\HomeController::class, 'team'])->name('team');
Route::get('/faq', [App\Http\Controllers\HomeController::class, 'faq'])->name('faq');
Route::get('/testimonials', [App\Http\Controllers\HomeController::class, 'testimonials'])->name('testimonials');
Route::get('/blog-detail', [App\Http\Controllers\HomeController::class, 'blogDetail'])->name('blog-detail');

// Admin Routes
Route::prefix('admin')->middleware('auth')->group(function () {
    Route::get('/', [App\Http\Controllers\HomeController::class, 'admin'])->name('admin.dashboard');
    
    // Protected admin routes
    // Users Management
    Route::resource('users', App\Http\Controllers\UserController::class)->names([
        'index' => 'admin.users.index',
        'create' => 'admin.users.create',
        'store' => 'admin.users.store',
        'show' => 'admin.users.show',
        'edit' => 'admin.users.edit',
        'update' => 'admin.users.update',
        'destroy' => 'admin.users.destroy',
    ]);
        
    
    // Portfolio Management
    Route::prefix('portfolio')->name('admin.portfolio.')->group(function () {
            Route::resource('categories', App\Http\Controllers\Admin\PortfolioCategoryController::class)->names([
                'index' => 'categories.index',
                'create' => 'categories.create',
                'store' => 'categories.store',
                'show' => 'categories.show',
                'edit' => 'categories.edit',
                'update' => 'categories.update',
                'destroy' => 'categories.destroy',
            ]);
            
            Route::resource('events', App\Http\Controllers\Admin\PortfolioEventController::class)->names([
                'index' => 'events.index',
                'create' => 'events.create',
                'store' => 'events.store',
                'show' => 'events.show',
                'edit' => 'events.edit',
                'update' => 'events.update',
                'destroy' => 'events.destroy',
            ]);
            
            Route::resource('images', App\Http\Controllers\Admin\EventImageController::class)->names([
                'index' => 'images.index',
                'create' => 'images.create',
                'store' => 'images.store',
                'show' => 'images.show',
                'edit' => 'images.edit',
                'update' => 'images.update',
                'destroy' => 'images.destroy',
            ]);
    });
    
    // Catch-all route for admin
    Route::get('{any}', [App\Http\Controllers\HomeController::class, 'index']);
});

