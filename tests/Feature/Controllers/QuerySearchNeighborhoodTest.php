<?php

namespace Tests\Feature\Controllers;

use App\Models\Municipality;
use App\Models\Neighborhoods;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class QuerySearchNeighborhoodTest extends TestCase
{
    use RefreshDatabase, WithFaker;

    protected string $url;

    protected string $query;

    protected array $filter;

    protected function setUp(): void
    {
        parent::setUp();
        $municipalities = Neighborhoods::factory()
            ->count(3)
            ->for(Municipality::factory()->state([
                'name' => 'Habana Vieja',
            ]))
            ->create();
        $this->filter = ['$name' => 'municipality.name'];
        $this->query = '/api/v1/search/neighborhoods-by-municipality?filter[$name]=';
        $this->url = strtr($this->query, $this->filter);
    }

    public function test_get_query_by_params_successfully()
    {
        $municipality = 'Habana Vieja';
        $response = $this->getJson($this->url.$municipality);
        $response->assertJsonStructure()
            ->assertStatus(200);
    }
}
