<?php

namespace Database\Seeders;

use App\Models\pagination;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class paginationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        for ($i=0; $i <=20 ; $i++) {
            # code...
            pagination::create(
                [
                    'name'=>fake()->name(),
                    'description'=>fake()->text(),
                    'email'=>fake()->email()
                ]
            );
        }
    }
}
