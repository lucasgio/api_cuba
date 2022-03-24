<?php

namespace Tests\Feature\Controllers;

use App\Models\Municipality;
use App\Models\Provincie;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class QuerySearchMunicipalityTest extends TestCase
{
    use RefreshDatabase, WithFaker;

    protected string $url;

    protected string $query;

    protected array $filter;

    protected function setUp(): void
    {
        parent::setUp();
        $municipalities = Municipality::factory()
            ->count(3)
            ->for(Provincie::factory()->state([
                'name' => 'La Habana',
            ]))
            ->create();
        $this->filter = ['$name' => 'provincie.name'];
        $this->query = '/api/v1/search/municipalities-by-provinces?filter[$name]=';
        $this->url = strtr($this->query, $this->filter);
    }

    public function test_get_query_by_params_successfully()
    {
        $province = 'La Habana';
        $response = $this->getJson($this->url.$province);
        $response->assertJsonStructure()
                 ->assertStatus(200);
    }
}
