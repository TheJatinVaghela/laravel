<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

// use App\Models\factoryStudent;
use Database\Seeders\FactoryStudentSeeder;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);

        //for seeder
        // $this->call([
        //     StudentSeeder::class
        // ]);

        //for factory
        // factoryStudent::factory()->count(5)->create();
         $this->call([
             FactoryStudentSeeder::class,
             CRUDuserSeeder::class
         ]);
    }
}
