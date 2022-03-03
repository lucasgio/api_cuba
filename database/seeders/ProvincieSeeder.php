<?php

namespace Database\Seeders;

use App\Models\Provincie;
use Illuminate\Database\Seeder;

class ProvincieSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Provincie::factory()->count(3)->create();
    }
}
