<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Database\Seeders\StudentSeeder;
use Database\Seeders\UserSeeder;
use Database\Seeders\SubjectSeeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
        $this -> call([StudentSeeder::class]);
        \App\Models\Student::factory(100)->create();

        $this -> call([UserSeeder::class]);
        \App\Models\User::factory(10)->create();

        $this -> call([CareerSeeder::class]);

        $this -> call([SubjectSeeder::class]);

        $this -> call([DaySeeder::class]);
    }
}