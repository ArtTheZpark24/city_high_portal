<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class Stem11Seeder extends Seeder
{    
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $stem11Sub = [
            // Grade 11, 1st Semester
            [
                'name' => 'Oral Communication in Context',
                'grade_level' => 'Grade 11',
                'semester' => '1st Semester',
                'strand' => 'STEM Strand',
                'subject_type' => 'Core',
            ],
            [
                'name' => 'Komunikasyon at Pananaliksik sa
                Wika at Kulturang Pilipino',
                'grade_level' => 'Grade 11',
                'semester' => '1st Semester',
                'strand' => 'STEM Strand',
                'subject_type' => 'Core',
            ],
            [
                'name' => 'General Mathematics',
                'grade_level' => 'Grade 11',
                'semester' => '1st Semester',
                'strand' => 'STEM Strand',
                'subject_type' => 'Core',
            ],
            [
                'name' => 'Earth Science',
                'grade_level' => 'Grade 11',
                'semester' => '1st Semester',
                'strand' => 'STEM Strand',
                'subject_type' => 'Core',
            ],
            [
                'name' => 'Introduction to the Philosophy of
                the Human Person / Pambungad sa
                Pilosopiya ng Tao
                ',
                'grade_level' => 'Grade 11',
                'semester' => '1st Semester',
                'strand' => 'STEM Strand',
                'subject_type' => 'Core',
            ],
            [
                'name' => 'Empowerment Technologies (ETech): ICT for Professional Tracks
                ',
                'grade_level' => 'Grade 11',
                'semester' => '1st Semester',
                'strand' => 'STEM Strand',
                'subject_type' => 'Core',
            ],
            
            [
                'name' => 'Reading and Writing Skills',
                'grade_level' => 'Grade 11',
                'semester' => '1st Semester',
                'strand' => 'STEM Strand',
                'subject_type' => 'Core',
            ],
            // Add more subjects for Grade 11, 1st Semester...

            [
                'name' => '21st Century Literature from the Philippines and the World',
                'grade_level' => 'Grade 11',
                'semester' => '1st Semester',
                'strand' => 'STEM Strand',
                'subject_type' => 'Core',
            ],
            [
                'name' => 'Pre-Calculus',
                'grade_level' => 'Grade 11',
                'semester' => '1st Semester',
                'strand' => 'STEM Strand',
                'subject_type' => 'Core',
            ],
            [
                'name' => 'Reading and Writing Skills',
                'grade_level' => 'Grade 11',
                'semester' => '2nd Semester',
                'strand' => 'STEM Strand',
                'subject_type' => 'Core',
            ],
            [
                'name' => 'Statistics and Probability',
                'grade_level' => 'Grade 11',
                'semester' => '2nd Semester',
                'strand' => 'STEM Strand',
                'subject_type' => 'Core',
            ],
            [
                'name' => 'Disaster Readiness and Risk
                Reduction',
                'grade_level' => 'Grade 11',
                'semester' => '2nd Semester',
                'strand' => 'STEM Strand',
                'subject_type' => 'Core',
            ],
            
            
        ];
        DB::table('stem11s')->insert($stem11Sub);
    }
}
