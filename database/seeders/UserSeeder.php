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
        // Admin 
        $superAdmin = User::create(
            [
                'name' => 'super-admin',
                'email' => 'admin@gmail.com',
                'password' => bcrypt('1234')
            ]
        );
        $superAdmin->assignRole('super-admin');
        $superAdmin->givePermissionTo('add-teacher');
        $superAdmin->givePermissionTo('edit-teacher');
        $superAdmin->givePermissionTo('delete-teacher');
        $superAdmin->givePermissionTo('see-teacher');

        $superAdmin->givePermissionTo('add-subject');
        $superAdmin->givePermissionTo('edit-subject');
        $superAdmin->givePermissionTo('delete-subject');
        $superAdmin->givePermissionTo('see-subject');
        // Admin END


        // Teacher
        $teacher = User::create(
            [
                'name' => 'teacher',
                'email' => 'teacher@gmail.com',
                'password' => bcrypt('1234')
            ]
        );
        $teacher->assignRole('teacher');
        $teacher->givePermissionTo('see-subject');
        $teacher->givePermissionTo('see-teacher');
        // Teacher END
    }
}
