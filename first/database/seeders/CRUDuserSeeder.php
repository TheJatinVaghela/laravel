<?php

namespace Database\Seeders;

use App\Models\CRUDuser;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CRUDuserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        CRUDuser::factory()->count(10)->create();
    }
}
