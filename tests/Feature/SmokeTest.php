<?php

namespace Tests\Feature;

use Tests\TestCase;

class SmokeTest extends TestCase
{
    public function test_public_landing_and_sector_routes_load(): void
    {
        $this->artisan('migrate:fresh', ['--force' => true]);

        foreach (['/', '/group', '/construction', '/engineering', '/tech', '/legal', '/sales'] as $path) {
            $response = $this->get($path);

            $response->assertOk();
        }
    }

    public function test_public_assets_are_not_routed_to_html_pages(): void
    {
        foreach ([
            '/styles.css' => 'text/css',
        ] as $path => $expectedType) {
            $response = $this->get($path);

            $response->assertOk();

            $contentType = $response->headers->get('content-type', '');
            $this->assertStringContainsString($expectedType, $contentType, $path.' returned '.$contentType);
            $this->assertStringNotContainsString('<!doctype html', strtolower($response->getContent()), $path.' returned HTML');
        }
    }

    public function test_legal_page_uses_shared_root_asset_urls(): void
    {
        $this->artisan('migrate:fresh', ['--force' => true]);

        $response = $this->get('/legal');

        $response->assertOk();
        $response->assertSee('href="'.asset('styles.css').'"', false);
        $response->assertSee('src="'.asset('js/site.js').'"', false);
        $response->assertDontSee('/legal/styles.css', false);
        $response->assertDontSee('/legal/app.js', false);
    }
}
