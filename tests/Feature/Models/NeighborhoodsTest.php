<?php

namespace Tests\Feature\Models;

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
        $response = $this->getJson('/api/neighborhoods');
        $response->assertStatus(200)
            ->assertJsonStructure();
    }


    public function test_update_neighborhood()
    {
        $response = $this->postJson('/api/neighborhoods',$this->neighborhood);
        $response->assertStatus(201)
            ->assertJsonStructure();
    }

    public function test_delete_neighborhood()
    {
        $id = $this->neighborhood['id'];
        $response = $this->deleteJson('/api/neighborhoods'.$id,['id' => $id]);
        $response->assertStatus(200)
            ->assertJsonStructure();
    }

    public function test_validation_request_neighborhood()
    {
        $response = $this->postJson('/api/neighborhoods',[]);
        $response->assertStatus(422)
            ->assertJsonStructure();
    }
}
