<?php

namespace Tests\Feature\Models;

use App\Models\Municipality;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class MunicipalityTest extends TestCase
{
    use RefreshDatabase;

    protected array $municipalitie;

    protected function setUp(): void
    {
        parent::setUp();

        $this->municipalitie = Municipality::factory()->create()->toArray();
    }

    public function test_get_all_municipalities_successfully()
    {
        $response = $this->getJson('/api/v1/municipalities');
        $response->assertStatus(200)
            ->assertJsonStructure();
    }

    /*public function test_update_municipalitie()
    {
        $id = $this->municipalitie['id'];

        $response = $this->putJson('/api/v1/municipalities/'.$id,[
            'name' => 'La Habana',
            'id' => $id
        ]);
        $response->assertStatus(201)
            ->assertJsonStructure();
    }

    public function test_delete_municipalitie()
    {
        $id = $this->municipalitie['id'];
        $response = $this->deleteJson('/api/v1/municipalities/'.$id,['id' => $id]);
        $response->assertStatus(200)
            ->assertJsonStructure();
    }

    public function test_validation_request_municipalitie()
    {
        $response = $this->postJson('/api/v1/municipalities',[]);
        $response->assertStatus(422)
            ->assertJsonStructure();
    }*/
}
