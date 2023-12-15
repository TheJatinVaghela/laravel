<?php

namespace Database\Seeders;

use App\Models\joinstudent;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class joinstudentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        for ($i=1; $i <=20 ; $i++) {
            joinstudent::create(
                [
                    'name'=> fake()->name(),
                    'email'=> fake()->email(),
                    'c_id'=> rand(1,20)
                ]
                );
        }
    }
}
