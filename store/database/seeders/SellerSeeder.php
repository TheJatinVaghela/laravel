<?php

namespace Database\Seeders;

use App\Models\seller;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class SellerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        seller::create([
            's_name'    =>fake()->name(),
            's_email'   =>fake()->unique()->email(),
            's_password'=>fake()->password(),
            's_address' =>fake()->address(),
            's_country' =>fake()->country(),
            's_phone'   =>fake()->phoneNumber()
        ]);
    }
}
