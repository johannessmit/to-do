<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Domain\Todo\Todo;
use Domain\User\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        User::factory(10)->create();

        User::factory()
            ->has(Todo::factory()->count(30))
            ->create([
                'name' => 'Test User',
                'email' => 'test@example.com',
            ]);
    }
}
