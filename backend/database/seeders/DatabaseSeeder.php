<?php

namespace Database\Seeders;
use Illuminate\Support\Str;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        User::factory(5)->create();

        User::factory()->create([
            'firstname' => 'lysa',
            'lastname' => 'julie',
            'middlename' => 'janine',
            'birthday' => fake()->date(),
            'address' => fake()->word(),
            'phone' => fake()->phoneNumber(),
            'role' => 'admin',
            'course' => fake()->randomElement(['BSIT', 'BSHM', 'BEED', 'BSED']),
            'email' => 'admin@email.com',
            'email_verified_at' => now(),
            'password' => Hash::make('asdasd'),
            'remember_token' => Str::random(10),
        ]);
    }
}
