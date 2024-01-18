<?php

namespace Database\Seeders;

use App\Models\api;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ApiSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        api::create([
            "name" => fake()->name(),
            "email" => fake()->unique()->email(),
            "password" => fake()->password()
        ]);
    }
}
