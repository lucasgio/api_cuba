<?php

namespace Controllers;

use App\Models\Neighborhoods;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class NeighborhoodsTest extends TestCase
{
    use RefreshDatabase;

    protected array $neighborhood;

    protected function setUp(): void
    {
        parent::setUp();

        $this->neighborhood = Neighborhoods::factory()->create()->toArray();
    }

    public function test_get_all_neighborhoods_successfully()
    {
        $response = $this->getJson('/api/v1/neighborhoods');
        $response->assertStatus(200)
            ->assertJsonStructure();
    }

}
