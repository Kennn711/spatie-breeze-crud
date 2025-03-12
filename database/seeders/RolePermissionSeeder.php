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

        Permission::create(['name' => 'add-subject']);
        Permission::create(['name' => 'edit-subject']);
        Permission::create(['name' => 'delete-subject']);
        Permission::create(['name' => 'see-subject']);
        // Permission End


        // Role
        Role::create(['name' => 'super-admin']);
        Role::create(['name' => 'teacher']);
        // Role End


        // Admin
        $roleAdmin = Role::findByName('super-admin');
        $roleAdmin->givePermissionTo('add-teacher');
        $roleAdmin->givePermissionTo('edit-teacher');
        $roleAdmin->givePermissionTo('delete-teacher');
        $roleAdmin->givePermissionTo('see-teacher');

        $roleAdmin->givePermissionTo('add-subject');
        $roleAdmin->givePermissionTo('edit-subject');
        $roleAdmin->givePermissionTo('delete-subject');
        $roleAdmin->givePermissionTo('see-subject');
        // Admin END


        // Teacher
        $roleTeacher = Role::findByName('teacher');
        $roleTeacher->givePermissionTo('see-subject');
        $roleTeacher->givePermissionTo('see-teacher');
        // Teacher END
    }
}
