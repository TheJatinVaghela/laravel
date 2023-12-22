<?php

namespace Database\Seeders;

use App\Models\thirduser;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ThirduserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        for ($i=0; $i <= 9 ; $i++) {
            # code...
            thirduser::create(
                [
                    'username'=>fake()->name(),
                    'useremail'=>fake()->unique()->email()
                    ]
                );
        }
    }
}
