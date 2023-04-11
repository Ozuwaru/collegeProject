<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CourseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $courses = [
            ['course'=> 'Matematica', 'seccion'=> '3D1', 'cupos'=>40],
            ['course'=> 'Matematica', 'seccion'=> '3D2', 'cupos'=>40],
            ['course'=> 'Programacion', 'seccion'=> '3D1', 'cupos'=>40],
            ['course'=> 'Programacion', 'seccion'=> '3D2', 'cupos'=>40],
            ['course'=> 'Fisica', 'seccion'=> '3D1', 'cupos'=>40],
            ['course'=> 'Fisica', 'seccion'=> '3D2', 'cupos'=>40]
        ];
        DB::table('courses')->insert($courses);
    }
}
