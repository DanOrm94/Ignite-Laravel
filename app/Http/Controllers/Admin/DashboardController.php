<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\ContactMessage;
use App\Models\Testimonial;
use Illuminate\View\View;

class DashboardController extends Controller
{
    public function __invoke(): View
    {
        return view('admin.dashboard', [
            'pendingTestimonials' => Testimonial::pending()->count(),
            'approvedTestimonials' => Testimonial::approved()->count(),
            'unhandledMessages' => ContactMessage::whereNull('handled_at')->count(),
            'totalMessages' => ContactMessage::count(),
        ]);
    }
}
