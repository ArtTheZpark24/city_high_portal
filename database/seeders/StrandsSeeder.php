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
           'list' => 'Accountancy, Business and Management Strand',
           'list' => 'Science, Technology, Engineering, and Mathematics (STEM) Strand',
           'list' => 'Science, Technology, Engineering, and Mathematics (STEM) Strand',
           'list' => 'General Academic Strand (GAS)',
           'list' => 'TVL Track: Agricultural-Fishery Arts (AFA) Strand',
           'list' => 'TVL Track: Home Economics (HE) Strand',
           'list' => 'TVL Track: Industrial Arts (IA) Strand',
           'list' => 'TVL Track: Information and Communications Technology (ICT) Strand',
        ]);
    }
}
