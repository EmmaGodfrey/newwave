<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\Blog;
use App\Models\PortfolioEvent;
use App\Models\TeamMember;
use App\Models\Testimonial;
use App\Models\ContactMessage;
use App\Models\ServicePricing;
use Illuminate\Http\Request;
use Carbon\Carbon;

class DashboardController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        // Get counts
        $totalBlogs = Blog::count();
        $publishedBlogs = Blog::where('status', 'published')->count();
        $totalPortfolio = PortfolioEvent::count();
        $totalTeamMembers = TeamMember::count();
        $totalTestimonials = Testimonial::count();
        $totalContactMessages = ContactMessage::count();
        $unreadMessages = ContactMessage::where('is_read', false)->count();
        
        // Get blog posts by month for chart (last 6 months)
        $blogsByMonth = [];
        $months = [];
        for ($i = 5; $i >= 0; $i--) {
            $month = Carbon::now()->subMonths($i);
            $months[] = $month->format('M Y');
            $blogsByMonth[] = Blog::whereYear('created_at', $month->year)
                ->whereMonth('created_at', $month->month)
                ->count();
        }
        
        // Get portfolio items by month for chart (last 6 months)
        $portfolioByMonth = [];
        for ($i = 5; $i >= 0; $i--) {
            $month = Carbon::now()->subMonths($i);
            $portfolioByMonth[] = PortfolioEvent::whereYear('created_at', $month->year)
                ->whereMonth('created_at', $month->month)
                ->count();
        }
        
        // Get testimonials by month (last 6 months)
        $testimonialsByMonth = [];
        for ($i = 5; $i >= 0; $i--) {
            $month = Carbon::now()->subMonths($i);
            $testimonialsByMonth[] = Testimonial::whereYear('created_at', $month->year)
                ->whereMonth('created_at', $month->month)
                ->count();
        }
        
        // Recent activities
        $recentBlogs = Blog::latest()->take(5)->get();
        $recentPortfolio = PortfolioEvent::latest()->take(5)->get();
        $recentMessages = ContactMessage::latest()->take(5)->get();
        
        // Content status breakdown
        $blogsByStatus = [
            'published' => Blog::where('status', 'published')->count(),
            'draft' => Blog::where('status', 'draft')->count(),
        ];
        
        $portfolioByStatus = [
            'active' => PortfolioEvent::where('is_active', true)->count(),
            'inactive' => PortfolioEvent::where('is_active', false)->count(),
        ];

        return view('admin.dashboard', compact(
            'totalBlogs',
            'publishedBlogs',
            'totalPortfolio',
            'totalTeamMembers',
            'totalTestimonials',
            'totalContactMessages',
            'unreadMessages',
            'blogsByMonth',
            'portfolioByMonth',
            'testimonialsByMonth',
            'months',
            'recentBlogs',
            'recentPortfolio',
            'recentMessages',
            'blogsByStatus',
            'portfolioByStatus'
        ));
    }
}
