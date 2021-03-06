<?php

namespace Controllers;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class ProvincieTest extends TestCase
{
    use RefreshDatabase;

    protected array $provincie;

    protected function setUp(): void
    {
        parent::setUp();
        $this->provincie = [
            'name' => [
                'Pinar del Rio',
                'La Habana',
                'Matanzas',
            ],
        ];
    }

    public function test_get_all_provincies_successfully()
    {
        $response = $this->getJson('/api/v1/provincies');
        $response->assertStatus(200)
            ->assertJsonStructure();
    }

    public function test_store_massive_data()
    {
        $response = $this->postJson('/api/v1/post-provincies', $this->provincie);
        $this->assertDatabaseHas('provincies', [
            'name' => 'La Habana',
        ]);
        $response->assertStatus(201)
            ->assertJsonStructure();
    }

    /*      public function test_update_provincie()
          {
              $id = $this->provincie['id'];

              $response = $this->putJson('/api/v1/provincies/'.$id,[
                  'id' => $id,
                  'name' => 'La Habana'
              ]);
              $response->assertStatus(201)
                      ->assertJsonStructure();
          }

          public function test_delete_provincie()
          {
              $id = $this->provincie['id'];
              $response = $this->deleteJson('/api/v1/provincies/'.$id,['id' => $id]);
              $response->assertStatus(200)
              $this->provincie = Provincie::factory()->create()->toArray();
        }

        public function test_get_all_provincies_successfully()
        {
            $response = $this->getJson('/api/v1/provincies');
            $response->assertStatus(200)

                      ->assertJsonStructure();
        }

        /*      public function test_update_provincie()
              {
                  $id = $this->provincie['id'];

                  $response = $this->putJson('/api/v1/provincies/'.$id,[
                      'id' => $id,
                      'name' => 'La Habana'
                  ]);
                  $response->assertStatus(201)
                          ->assertJsonStructure();
              }

              public function test_delete_provincie()
              {
                  $id = $this->provincie['id'];
                  $response = $this->deleteJson('/api/v1/provincies/'.$id,['id' => $id]);
                  $response->assertStatus(200)
                          ->assertJsonStructure();
              }

              public function test_validation_request_provincie()
              {
                  $response = $this->postJson('/api/v1/provincies',[]);
                  $response->assertStatus(422)
                           ->assertJsonStructure();
              }*/
}
