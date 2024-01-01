<?php

namespace Database\Seeders;

use App\Models\curdapi;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CurdapiSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        for ($i=0; $i <= 9 ; $i++) {
            curdapi::create([
                'name'=>fake()->name(),
                'email'=>fake()->unique()->email(),
                'password'=>fake()->password()
            ]);
        }
    }
}
