<?php

namespace Database\Seeders;

use App\Models\ajax;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class AjaxSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        ajax::create([
            'name'=>fake()->name(),
            'email'=>fake()->unique()->email(),
        ]);
    }
}
