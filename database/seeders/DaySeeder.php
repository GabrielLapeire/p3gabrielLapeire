<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DaySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('days') -> insert ([
            'name' => 'Lunes',
        ]);

        DB::table('days') -> insert ([
            'name' => 'Martes',
        ]);

        DB::table('days') -> insert ([
            'name' => 'Miercoles',
        ]);

        DB::table('days') -> insert ([
            'name' => 'Jueves',
        ]);

        DB::table('days') -> insert ([
            'name' => 'Viernes',
        ]);
    }
}
