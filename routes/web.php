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
Route::get('/blog', [App\Http\Controllers\BlogController::class, 'index'])->name('blog');
Route::get('/blog/search', [App\Http\Controllers\BlogController::class, 'search'])->name('blog.search');
Route::get('/blog/category/{categorySlug}', [App\Http\Controllers\BlogController::class, 'category'])->name('blog.category');
Route::get('/blog/{slug}', [App\Http\Controllers\BlogController::class, 'show'])->name('blog.show');
Route::get('/contact', [App\Http\Controllers\ContactController::class, 'index'])->name('contact');
Route::post('/contact', [App\Http\Controllers\ContactController::class, 'submit'])->name('contact.submit');
Route::get('/pricing', [App\Http\Controllers\HomeController::class, 'pricing'])->name('pricing');
Route::get('/team', [App\Http\Controllers\HomeController::class, 'team'])->name('team');
Route::get('/faq', [App\Http\Controllers\HomeController::class, 'faq'])->name('faq');
Route::get('/testimonials', [App\Http\Controllers\HomeController::class, 'testimonials'])->name('testimonials');

// Admin Routes
Route::prefix('admin')->middleware('auth')->group(function () {
    Route::get('/', [App\Http\Controllers\Admin\DashboardController::class, 'index'])->name('admin.dashboard');
    
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
    
    // Blog Management
    Route::resource('blog-categories', App\Http\Controllers\Admin\BlogCategoryController::class)->names([
        'index' => 'admin.blog-categories.index',
        'create' => 'admin.blog-categories.create',
        'store' => 'admin.blog-categories.store',
        'show' => 'admin.blog-categories.show',
        'edit' => 'admin.blog-categories.edit',
        'update' => 'admin.blog-categories.update',
        'destroy' => 'admin.blog-categories.destroy',
    ]);
    
    Route::resource('blogs', App\Http\Controllers\Admin\BlogController::class)->names([
        'index' => 'admin.blogs.index',
        'create' => 'admin.blogs.create',
        'store' => 'admin.blogs.store',
        'show' => 'admin.blogs.show',
        'edit' => 'admin.blogs.edit',
        'update' => 'admin.blogs.update',
        'destroy' => 'admin.blogs.destroy',
    ]);
    
    // Team Members Management
    Route::resource('team-members', App\Http\Controllers\Admin\TeamMemberController::class)->names([
        'index' => 'admin.team-members.index',
        'create' => 'admin.team-members.create',
        'store' => 'admin.team-members.store',
        'show' => 'admin.team-members.show',
        'edit' => 'admin.team-members.edit',
        'update' => 'admin.team-members.update',
        'destroy' => 'admin.team-members.destroy',
    ]);
    
    // Testimonials Management
    Route::resource('testimonials', App\Http\Controllers\Admin\TestimonialController::class)->names([
        'index' => 'admin.testimonials.index',
        'create' => 'admin.testimonials.create',
        'store' => 'admin.testimonials.store',
        'show' => 'admin.testimonials.show',
        'edit' => 'admin.testimonials.edit',
        'update' => 'admin.testimonials.update',
        'destroy' => 'admin.testimonials.destroy',
    ]);
    
    // Service Pricing Management
    Route::resource('service-pricing', App\Http\Controllers\Admin\ServicePricingController::class)->names([
        'index' => 'admin.service-pricing.index',
        'create' => 'admin.service-pricing.create',
        'store' => 'admin.service-pricing.store',
        'show' => 'admin.service-pricing.show',
        'edit' => 'admin.service-pricing.edit',
        'update' => 'admin.service-pricing.update',
        'destroy' => 'admin.service-pricing.destroy',
    ]);
    
    // Contact Management
    Route::prefix('contact')->name('admin.contact.')->group(function () {
        Route::get('settings', [App\Http\Controllers\Admin\ContactSettingController::class, 'edit'])->name('settings.edit');
        Route::put('settings', [App\Http\Controllers\Admin\ContactSettingController::class, 'update'])->name('settings.update');
        
        Route::get('messages', [App\Http\Controllers\Admin\ContactMessageController::class, 'index'])->name('messages.index');
        Route::get('messages/{id}', [App\Http\Controllers\Admin\ContactMessageController::class, 'show'])->name('messages.show');
        Route::delete('messages/{id}', [App\Http\Controllers\Admin\ContactMessageController::class, 'destroy'])->name('messages.destroy');
    });
    
    // FAQ Management
    Route::resource('faqs', App\Http\Controllers\Admin\FaqController::class)->names([
        'index' => 'admin.faqs.index',
        'create' => 'admin.faqs.create',
        'store' => 'admin.faqs.store',
        'show' => 'admin.faqs.show',
        'edit' => 'admin.faqs.edit',
        'update' => 'admin.faqs.update',
        'destroy' => 'admin.faqs.destroy',
    ]);
    
    // Catch-all route for admin
    Route::get('{any}', [App\Http\Controllers\HomeController::class, 'index']);
});

