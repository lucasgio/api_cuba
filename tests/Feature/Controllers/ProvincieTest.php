<?php

namespace Controllers;

use App\Models\Provincie;
use Database\Factories\ProvincieFactory;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class ProvincieTest extends TestCase
{
    use RefreshDatabase;

    protected array $provincie;

    protected array $dataStructured;

    protected function setUp(): void
    {
        parent::setUp();

        $this->provincie = [
            'name' => ['La Habana'],
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
        $response->assertStatus(201)
                 ->assertJsonStructure();
    }

    public function test_pagination_optional_off()
    {
        $response = $this->getJson('/api/v1/provincies?pagination=off');
        $response->assertStatus(200)
                 ->assertJsonStructure();
    }
}
