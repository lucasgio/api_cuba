<?php

namespace Database\Seeders;

use App\Models\Neighborhoods;
use Illuminate\Database\Seeder;

class NeighborhoodsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Neighborhoods::factory()->count(3)->create();
    }
}
