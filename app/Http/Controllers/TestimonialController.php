<?php

namespace App\Http\Controllers;

use App\Models\Testimonial;
use App\Support\SiteContent;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class TestimonialController extends Controller
{
    /**
     * Public testimonials page for a sector — approved reviews only.
     */
    public function index(string $sector): View
    {
        $site = SiteContent::site($sector);

        abort_if($site === null, 404);

        return view('testimonials.index', [
            'key' => $sector,
            'site' => $site,
            'testimonials' => Testimonial::approved()
                ->forSector($sector)
                ->latest('moderated_at')
                ->get(),
        ]);
    }

    /**
     * Review submission form. In the original site this was "closed"; the
     * backend workflow is now live but submissions go to moderation first.
     */
    public function create(string $sector): View
    {
        $site = SiteContent::site($sector);

        abort_if($site === null, 404);

        return view('testimonials.create', [
            'key' => $sector,
            'site' => $site,
            'reviewsOpen' => (bool) config('ignite.reviews_open', false),
        ]);
    }

    /**
     * Store a submitted review as pending moderation.
     */
    public function store(Request $request, string $sector): RedirectResponse
    {
        $site = SiteContent::site($sector);

        abort_if($site === null, 404);

        abort_unless((bool) config('ignite.reviews_open', false), 403, 'Review submissions are currently closed.');

        $validated = $request->validate([
            'author_name' => ['required', 'string', 'max:120'],
            'author_role' => ['nullable', 'string', 'max:120'],
            'author_email' => ['nullable', 'email', 'max:190'],
            'rating' => ['nullable', 'integer', 'min:1', 'max:5'],
            'body' => ['required', 'string', 'max:3000'],
            'website' => ['prohibited'], // honeypot
        ]);

        Testimonial::create([
            'sector' => $sector,
            'author_name' => $validated['author_name'],
            'author_role' => $validated['author_role'] ?? null,
            'author_email' => $validated['author_email'] ?? null,
            'rating' => $validated['rating'] ?? null,
            'body' => $validated['body'],
            'status' => Testimonial::STATUS_PENDING,
        ]);

        return redirect()
            ->route('testimonials.create', $sector)
            ->with('status', 'Thank you — your review has been submitted for moderation.');
    }
}
