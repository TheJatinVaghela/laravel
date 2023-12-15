<?php

namespace Database\Seeders;

use App\Models\joincity;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class joincitySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $arr = [
			'Ahmedabad',
			'Amreli district',
			'Anand',
			'Banaskantha',
			'Bharuch',
			'Bhavnagar',
			'Dahod',
			'The Dangs',
			'Gandhinagar',
			'Jamnagar',
			'Junagadh',
			'Kutch',
			'Kheda',
			'Mehsana',
			'Narmada',
			'Navsari',
			'Patan',
			'Panchmahal',
			'Porbandar',
			'Rajkot'];
        foreach ($arr as $key => $value) {
            joincity::create(
                [
                    "cityname" => $value
                ]
            );
        }

    }
}
