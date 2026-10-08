<?php

namespace App\Providers;

use Illuminate\Support\Facades\URL;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        // When running behind an HTTPS-terminating proxy (GitHub Codespaces,
        // a load balancer, CloudFront, etc.), generate https:// asset and
        // route URLs so stylesheets and images are not blocked as insecure.
        // Controlled by APP_URL / the FORCE_HTTPS env flag.
        if (str_starts_with((string) config('app.url'), 'https://') || env('FORCE_HTTPS', false)) {
            URL::forceScheme('https');
        }
    }
}
