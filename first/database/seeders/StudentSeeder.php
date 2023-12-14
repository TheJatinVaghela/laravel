<?php

namespace Database\Seeders;

use App\Models\student;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\File;

class StudentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //with array
        // $student_arr = collect(
        //     [
        //         [
        //             'name' => 'Student_1',
        //             'email' => 'student_1@example.com'
        //         ],
        //         [
        //             'name' => 'Student_2',
        //             'email' => 'student_2@example.com'
        //         ],
        //         [
        //             'name' => 'Student_3',
        //             'email' => 'student_3@example.com'
        //         ]
        //     ]
        //
        // );
        // $student_arr->each(function($value){
        //     student::insert($value);
        // });

        //with jsonfile
        // $json = File::get(path:'database\json\students.json');
        // $student_arr=collect(json_decode($json));
        // $student_arr->each(function($value){
        //     student::create([
        //        'name' => $value->name,
        //        'email' => $value->email
        //    ]);
        // });


        //for fake data
         student::create([
             'name' => fake()->name(),
             'email' => fake()->unique()->email()
         ]);

    }
}
