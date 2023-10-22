<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class StrandsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        
        \App\Models\Strands::factory(1)->create();

        \App\Models\Strands::factory()->create([
            "strands_name" => "STEM 11",
           "strands_name" => "STEM 12",
           "strands_name" => "ABM 11",
           "strands_name" => "ABM 12",
           "strands_name" => "HUMMS 11",
           "strands_name" => "HUMMS 12",
           "strands_name" => "Art and Design 11",
           "strands_name" => "Art and Design 12",
           "strands_name" => "TVL 11",
           "strands_name" => "TVL 12"
        ]);
    }
}
