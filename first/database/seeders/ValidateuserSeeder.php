<?php

namespace Database\Seeders;

use App\Models\validateuser;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ValidateuserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        for ($i=0; $i <=19 ; $i++) {
            validateuser::create([
                'username' => fake()->name(),
                'useremail' => fake()->unique()->email(),
                'usercity' => fake()->city(),
                'userage' => fake()->numberBetween(18,70)
            ]);
        }
    }
}
