<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SubjectSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('subjects') -> insert ([
            'name' => 'Programación 1',
            'career_id' => '1',
        ]);

        DB::table('subjects') -> insert ([
            'name' => 'Seminario 1',
            'career_id' => '2',
        ]);

        DB::table('subjects') -> insert ([
            'name' => 'Seminario 1',
            'career_id' => '1',
        ]);

        DB::table('subjects') -> insert ([
            'name' => 'Matemática 1',
            'career_id' => '3',
        ]);
    }
}
