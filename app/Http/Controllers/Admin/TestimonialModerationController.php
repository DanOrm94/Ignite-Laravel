<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Testimonial;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;

class TestimonialModerationController extends Controller
{
    public function index(): View
    {
        return view('admin.testimonials', [
            'pending' => Testimonial::pending()->latest()->get(),
            'approved' => Testimonial::approved()->latest('moderated_at')->get(),
            'rejected' => Testimonial::where('status', Testimonial::STATUS_REJECTED)->latest('moderated_at')->get(),
        ]);
    }

    public function approve(Testimonial $testimonial): RedirectResponse
    {
        $testimonial->update([
            'status' => Testimonial::STATUS_APPROVED,
            'moderated_at' => now(),
            'moderated_by' => Auth::id(),
        ]);

        return back()->with('status', 'Testimonial approved and published.');
    }

    public function reject(Testimonial $testimonial): RedirectResponse
    {
        $testimonial->update([
            'status' => Testimonial::STATUS_REJECTED,
            'moderated_at' => now(),
            'moderated_by' => Auth::id(),
        ]);

        return back()->with('status', 'Testimonial rejected.');
    }

    public function destroy(Testimonial $testimonial): RedirectResponse
    {
        $testimonial->delete();

        return back()->with('status', 'Testimonial deleted.');
    }
}
