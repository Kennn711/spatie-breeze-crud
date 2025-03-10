<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $superAdmin = User::create(
            [
                'name' => 'super-admin',
                'email' => 'admin@gmail.com',
                'password' => bcrypt('1234')
            ]
        );
        $superAdmin->assignRole('super-admin');

        $teacher = User::create(
            [
                'name' => 'teacher',
                'email' => 'teacher@gmail.com',
                'password' => bcrypt('1234')
            ]
        );
        $teacher->assignRole('teacher');

        $student = User::create(
            [
                'name' => 'student',
                'email' => 'student@gmail.com',
                'password' => bcrypt('1234')
            ]
        );
        $student->assignRole('student');
    }
}
