<?php

namespace App\Http\Controllers;

use App\Models\Testimonial;
use App\Support\SiteContent;
use Illuminate\Http\Request;
use Illuminate\View\View;

class PageController extends Controller
{
    /**
     * Brand landing page (was index.html) — the specialist chooser.
     */
    public function landing(): View
    {
        return view('landing', [
            'sites' => SiteContent::all(),
            'sectorOrder' => SiteContent::sectorOrder(),
            'group' => SiteContent::site('group'),
        ]);
    }

    /**
     * The group overview page (was group.html / data-site="group").
     */
    public function group(): View
    {
        return $this->renderSector('group');
    }

    /**
     * A specialist sector page. The sector key arrives from the route.
     */
    public function sector(Request $request, string $sector): View
    {
        return $this->renderSector($sector);
    }

    /**
     * Shared renderer for the group + sector marketing pages.
     */
    protected function renderSector(string $key): View
    {
        $site = SiteContent::site($key);

        abort_if($site === null, 404);

        return view('sector', [
            'key' => $key,
            'site' => $site,
            'sites' => SiteContent::all(),
            'sectorOrder' => SiteContent::sectorOrder(),
            'contact' => SiteContent::contact(),
            'heroImage' => SiteContent::heroImage($key),
            'policyLinks' => SiteContent::policyLinks($site),
            'contactHeadline' => SiteContent::contactHeadline($key),
            // A few approved testimonials to surface on sector pages (if any).
            'testimonials' => $key === 'group'
                ? collect()
                : Testimonial::approved()->forSector($key)->latest('moderated_at')->limit(3)->get(),
        ]);
    }

    /**
     * Specialist Sales landing page for FinTech, payments and digital assets.
     */
    public function fintech(): View
    {
        $site = SiteContent::site('sales');

        abort_if($site === null, 404);

        return view('fintech', [
            'key' => 'sales',
            'site' => $site,
            'contact' => SiteContent::contact(),
        ]);
    }

    /**
     * Construction policy & compliance hub (was construction/policies.html).
     */
    public function policies(): View
    {
        $site = SiteContent::site('construction');

        return view('policies', [
            'key' => 'construction',
            'site' => $site,
            'contact' => SiteContent::contact(),
            'policyLinks' => SiteContent::policyLinks($site),
        ]);
    }
}
