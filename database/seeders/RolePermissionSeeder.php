<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class RolePermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Permission
        Permission::create(['name' => 'add-teacher']);
        Permission::create(['name' => 'edit-teacher']);
        Permission::create(['name' => 'delete-teacher']);
        Permission::create(['name' => 'see-teacher']);

        Permission::create(['name' => 'add-student']);
        Permission::create(['name' => 'edit-student']);
        Permission::create(['name' => 'delete-student']);
        Permission::create(['name' => 'see-student']);

        Permission::create(['name' => 'add-subject']);
        Permission::create(['name' => 'edit-subject']);
        Permission::create(['name' => 'delete-subject']);
        Permission::create(['name' => 'see-subject']);
        // Permission End


        // Role
        Role::create(['name' => 'super-admin']);
        Role::create(['name' => 'teacher']);
        Role::create(['name' => 'student']);
        // Role End


        $roleAdmin = Role::findByName('super-admin');
        $roleAdmin->givePermissionTo('add-teacher');
        $roleAdmin->givePermissionTo('edit-teacher');
        $roleAdmin->givePermissionTo('delete-teacher');
        $roleAdmin->givePermissionTo('see-teacher');


        $roleStudent = Role::findByName('student');
        $roleStudent->givePermissionTo('see-subject');
        $roleStudent->givePermissionTo('see-teacher');


        $roleTeacher = Role::findByName('teacher');
        $roleTeacher->givePermissionTo('add-student');
        $roleTeacher->givePermissionTo('edit-student');
        $roleTeacher->givePermissionTo('delete-student');
        $roleTeacher->givePermissionTo('see-student');

        $roleTeacher->givePermissionTo('add-subject');
        $roleTeacher->givePermissionTo('edit-subject');
        $roleTeacher->givePermissionTo('delete-subject');
        $roleTeacher->givePermissionTo('see-subject');
    }
}
