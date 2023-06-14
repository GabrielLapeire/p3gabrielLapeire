<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CareerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('careers') -> insert ([
            'name' => 'Análisis y desarrollo de software',
        ]);

        DB::table('careers') -> insert ([
            'name' => 'Profesorado de historia',
        ]);

        DB::table('careers') -> insert ([
            'name' => 'Contaduría',
        ]);
    }
}
