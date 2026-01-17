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
Route::get('/about', function () { return view('frontend.pages.about'); })->name('about');
Route::get('/services', function () { return view('frontend.pages.services'); })->name('services');
Route::get('/portfolio', function () { return view('frontend.pages.portfolio'); })->name('portfolio');
Route::get('/blog', function () { return view('frontend.pages.blog'); })->name('blog');
Route::get('/contact', function () { return view('frontend.pages.contact'); })->name('contact');
Route::get('/pricing', function () { return view('frontend.pages.price'); })->name('pricing');
Route::get('/team', function () { return view('frontend.pages.team'); })->name('team');
Route::get('/faq', function () { return view('frontend.pages.faq'); })->name('faq');
Route::get('/testimonials', function () { return view('frontend.pages.testimonials'); })->name('testimonials');

// Admin Routes
Route::prefix('admin')->group(function () {
    Route::get('/', [App\Http\Controllers\HomeController::class, 'admin'])->name('admin.dashboard');
    
    // Protected admin routes
    Route::middleware('auth')->group(function () {
        Route::get('{any}', [App\Http\Controllers\HomeController::class, 'index']);
    });
});

// Language Translation
Route::get('index/{locale}', [App\Http\Controllers\HomeController::class, 'lang']);

// Form submission
Route::post('/formsubmit', [App\Http\Controllers\HomeController::class, 'FormSubmit'])->name('FormSubmit');
