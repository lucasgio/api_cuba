<?php

namespace Tests\Feature\Models;


use App\Models\Municipality;
use App\Models\Provincie;
use Illuminate\Foundation\Testing\RefreshDatabase;

use Tests\TestCase;

class MunicipalityTest extends TestCase
{
    use RefreshDatabase;

    protected array $municipalitie;
    protected array $provincie;


    protected function setUp(): void
    {
        parent::setUp();
        $this->provincie = Provincie::factory()->create()->toArray();
        $this->municipalitie = [
            'provincie_id' => $this->provincie['id'],
            'name' => [
                'Plaza de la Revolucion',
                'Playa',
                'Habana Vieja'
            ]
        ];
    }


    public function test_get_all_municipalities_successfully()
    {
        $response = $this->getJson('/api/v1/municipalities');
        $response->assertStatus(200)
            ->assertJsonStructure();
    }

    public function test_store_massive_data()
    {
        $response = $this->postJson('/api/v1/post-municipalities',$this->municipalitie);
        $this->assertDatabaseHas('municipalities',[
            'name' => 'Habana Vieja'
        ]);
        $response->assertStatus(201)
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
