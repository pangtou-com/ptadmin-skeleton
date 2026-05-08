<?php

declare(strict_types=1);

namespace Tests\Feature;

use Tests\TestCase;

class HealthCheckTest extends TestCase
{
    public function test_health_endpoint_returns_ok(): void
    {
        $response = $this->getJson('/api/up');

        $response->assertOk()->assertJson([
            'status' => 'ok',
            'app' => config('app.name'),
        ]);
    }

    public function test_api_throttle_allows_multiple_requests_with_default_limiter(): void
    {
        $this->getJson('/api/up')->assertOk();
        $this->getJson('/api/up')->assertOk();
    }
}
