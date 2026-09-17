<?php

namespace Tests\Feature;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class AnalyticsTest extends TestCase
{
    use RefreshDatabase;

    public function test_analytics_requires_a_valid_measurement_id_and_excludes_staff(): void
    {
        config(['analytics.measurement_id' => null]);
        $this->get('/')->assertDontSee('data-measurement-id', false);
        config(['analytics.measurement_id' => 'invalid']);
        $this->get('/')->assertDontSee('data-measurement-id', false);
        config(['analytics.measurement_id' => 'G-TEST12345']);
        $this->get('/')->assertSee('data-measurement-id="G-TEST12345"', false)->assertSee('Reject analytics')->assertSee('Accept analytics');
        $this->get('/login')->assertDontSee('data-measurement-id', false);
        $this->actingAs(User::factory()->create())->get('/')->assertDontSee('data-measurement-id', false);
    }

    public function test_analytics_configuration_excludes_query_data_and_policy_explains_google(): void
    {
        config(['analytics.measurement_id' => 'G-TEST12345']);
        $this->get('/contact?email=private@example.test')->assertSee('data-page-url="https://newwavemotorsport.com/contact"', false)
            ->assertDontSee('private@example.test');
        $this->get('/privacy-policy')->assertSee('Google Analytics')->assertSee('outside Zambia');
        $this->get('/cookie-policy')->assertSee('180 days')->assertSee('nw_ga');
    }
}
