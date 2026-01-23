<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Session;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        // No middleware for frontend routes
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index(Request $request)
    {
        if (view()->exists($request->path())) {
            return view($request->path());
        }
        return abort(404);
    }

    public function root()
    {
        return view('frontend.pages.home');
    }

    public function about()
    {
        return view('frontend.pages.about');
    }

    public function services()
    {
        return view('frontend.pages.services');
    }

    public function blog()
    {
        return view('frontend.pages.blog');
    }

    public function contact()
    {
        return view('frontend.pages.contact');
    }

    public function pricing()
    {
        return view('frontend.pages.price');
    }

    public function team()
    {
        return view('frontend.pages.team');
    }

    public function faq()
    {
        return view('frontend.pages.faq');
    }

    public function testimonials()
    {
        return view('frontend.pages.testimonials');
    }

    public function blogDetail()
    {
        return view('frontend.pages.blog-detail');
    }

    public function admin()
    {
        if (auth()->check()) {
            return view('index');
        }
        return redirect()->route('login');
    }
}
