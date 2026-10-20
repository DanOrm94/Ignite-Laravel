<?php

namespace Tests\Feature;

use Tests\TestCase;

class SmokeTest extends TestCase
{
    public function test_public_landing_and_sector_routes_load(): void
    {
        $this->artisan('migrate:fresh', ['--force' => true]);

        foreach (['/', '/group', '/construction', '/engineering', '/tech', '/legal', '/sales', '/sales/fintech-payments-digital-assets/'] as $path) {
            $response = $this->get($path);

            $response->assertOk();
        }
    }

    public function test_legal_page_uses_shared_root_asset_urls(): void
    {
        $this->artisan('migrate:fresh', ['--force' => true]);

        $response = $this->get('/legal');

        $response->assertOk();
        $response->assertSee('href="'.asset('styles.css').'"', false);
        $response->assertSee('<link rel="stylesheet" href="'.asset('styles.css').'"', false);
        $response->assertSee('<script src="'.asset('js/site.js').'" defer></script>', false);
        $response->assertDontSee('/legal/styles.css', false);
        $response->assertDontSee('/legal/app.js', false);
        $this->assertStringContainsString('FinTech, Payments &amp; Digital Assets', $this->get('/sales/fintech-payments-digital-assets/')->getContent());
    }
}
