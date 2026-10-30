<?php

use App\Http\Controllers\Admin\ContactMessageController as AdminContactMessageController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\TestimonialModerationController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\PageController;
use App\Http\Controllers\TestimonialController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Public site
|--------------------------------------------------------------------------
|
| The original static site rendered every page client-side from app.js.
| These routes render the same content server-side from config/ignite.php
| via the SiteContent helper, so the markup is identical but SEO-friendly.
|
*/

// Brand landing page (was index.html).
Route::get('/', [PageController::class, 'landing'])->name('landing');

// Group overview page (was group.html).
Route::get('/group', [PageController::class, 'group'])->name('group');

// Construction uses a canonical "clean" URL; legacy paths 301 to it.
Route::permanentRedirect('/construction.html', '/construction');
Route::permanentRedirect('/construction/index.html', '/construction');
Route::get('/construction', [PageController::class, 'sector'])
    ->defaults('sector', 'construction')
    ->name('sector.construction');

// Construction policy & compliance hub (was construction/policies.html).
Route::get('/construction/policies', [PageController::class, 'policies'])->name('policies');

// Dedicated Sales specialist page for FinTech, payments, crypto and digital assets.
Route::get('/sales/fintech-payments-digital-assets/', [PageController::class, 'fintech'])
    ->name('sales.fintech');

// Contact form submission (replaces the front-end mailto: workflow).
Route::post('/contact', [ContactController::class, 'store'])->name('contact.store');
Route::get('/contact/thank-you', [ContactController::class, 'thanks'])->name('contact.thanks');

// Per-sector testimonials (public, approved only) and review submission.
Route::get('/{sector}/testimonials', [TestimonialController::class, 'index'])
    ->whereIn('sector', ['construction', 'engineering', 'tech', 'legal', 'sales'])
    ->name('testimonials.index');
Route::get('/{sector}/review', [TestimonialController::class, 'create'])
    ->whereIn('sector', ['construction', 'engineering', 'tech', 'legal', 'sales'])
    ->name('testimonials.create');
Route::post('/{sector}/review', [TestimonialController::class, 'store'])
    ->whereIn('sector', ['construction', 'engineering', 'tech', 'legal', 'sales'])
    ->name('testimonials.store');

// Remaining sector landing pages (engineering, tech, legal, sales).
Route::get('/{sector}', [PageController::class, 'sector'])
    ->whereIn('sector', ['engineering', 'tech', 'legal', 'sales'])
    ->name('sector');

/*
|--------------------------------------------------------------------------
| Sector subdomains (optional)
|--------------------------------------------------------------------------
|
| When APP_DOMAIN is configured, serve each sector natively at its own
| subdomain (e.g. construction.ignitetalentgroup.co.uk) in addition to the
| path URLs above. Disabled automatically when APP_DOMAIN is empty, so
| local dev and Codespaces are unaffected.
|
*/

if ($baseDomain = config('ignite.base_domain')) {
    foreach ((array) config('ignite.subdomains', []) as $sector => $subdomain) {
        Route::domain($subdomain.'.'.$baseDomain)->group(function () use ($sector) {
            Route::get('/', [PageController::class, 'sector'])
                ->defaults('sector', $sector)
                ->name("subdomain.$sector");

            Route::get('/testimonials', [TestimonialController::class, 'index'])
                ->defaults('sector', $sector)
                ->name("subdomain.$sector.testimonials");

            Route::get('/review', [TestimonialController::class, 'create'])
                ->defaults('sector', $sector)
                ->name("subdomain.$sector.review");

            Route::post('/review', [TestimonialController::class, 'store'])
                ->defaults('sector', $sector);

            Route::post('/contact', [ContactController::class, 'store'])
                ->name("subdomain.$sector.contact");

            if ($sector === 'construction') {
                Route::get('/policies', [PageController::class, 'policies'])
                    ->name('subdomain.construction.policies');
            }
        });
    }
}

/*
|--------------------------------------------------------------------------
| Authentication (admin only)
|--------------------------------------------------------------------------
*/

Route::get('/login', [LoginController::class, 'show'])->name('login');
Route::post('/login', [LoginController::class, 'login'])->name('login.attempt');
Route::post('/logout', [LoginController::class, 'logout'])->name('logout');

/*
|--------------------------------------------------------------------------
| Admin area — testimonial moderation & contact messages
|--------------------------------------------------------------------------
*/

Route::middleware(['auth', 'admin'])->prefix('admin')->name('admin.')->group(function () {
    Route::get('/', DashboardController::class)->name('dashboard');

    Route::get('/testimonials', [TestimonialModerationController::class, 'index'])->name('testimonials.index');
    Route::patch('/testimonials/{testimonial}/approve', [TestimonialModerationController::class, 'approve'])->name('testimonials.approve');
    Route::patch('/testimonials/{testimonial}/reject', [TestimonialModerationController::class, 'reject'])->name('testimonials.reject');
    Route::delete('/testimonials/{testimonial}', [TestimonialModerationController::class, 'destroy'])->name('testimonials.destroy');

    Route::get('/messages', [AdminContactMessageController::class, 'index'])->name('messages.index');
    Route::patch('/messages/{message}/handled', [AdminContactMessageController::class, 'markHandled'])->name('messages.handled');
});
