<?php

namespace App\Http\Controllers;

use App\Models\ContactSetting;
use App\Models\TeamMember;
use App\Models\Testimonial;
use App\Models\ServicePricing;
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
        $testimonials = Testimonial::active()->ordered()->take(2)->get();
        $pricing = ServicePricing::active()->ordered()->take(3)->get();
        $services = ServicePricing::active()->ordered()->get();
        $contactSettings = ContactSetting::first();
        return view('frontend.pages.home', compact('testimonials', 'pricing', 'services', 'contactSettings'));
    }

    public function about()
    {
        $teamMembers = TeamMember::active()->ordered()->get();
        $testimonials = Testimonial::active()->ordered()->take(2)->get();
        $contactSettings = ContactSetting::first();
        return view('frontend.pages.about', compact('teamMembers', 'testimonials', 'contactSettings'));
    }

    public function services()
    {
        $services = ServicePricing::active()->ordered()->get();
        $testimonials = Testimonial::active()->ordered()->take(2)->get();
        return view('frontend.pages.services', compact('services', 'testimonials'));
    }

    public function blog()
    {
        return view('frontend.pages.blog');
    }

    public function contact()
    {
        $testimonials = Testimonial::active()->ordered()->take(2)->get();
        return view('frontend.pages.contact', compact('testimonials'));
    }

    public function pricing()
    {
        $pricing = ServicePricing::active()->ordered()->get();
        $testimonials = Testimonial::active()->ordered()->take(2)->get();
        return view('frontend.pages.price', compact('pricing', 'testimonials'));
    }

    public function team()
    {
        $teamMembers = TeamMember::active()->ordered()->get();
        $testimonials = Testimonial::active()->ordered()->take(2)->get();
        return view('frontend.pages.team', compact('teamMembers', 'testimonials'));
    }

    public function faq()
    {
        $faqs = \App\Models\Faq::active()->ordered()->get();
        $testimonials = Testimonial::active()->ordered()->take(2)->get();
        return view('frontend.pages.faq', compact('faqs', 'testimonials'));
    }

    public function testimonials()
    {
        $testimonials = Testimonial::active()->ordered()->get();
        return view('frontend.pages.testimonials', compact('testimonials'));
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
