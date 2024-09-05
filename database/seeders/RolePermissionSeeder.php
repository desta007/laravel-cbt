<?php

namespace Database\Seeders;

use App\Models\User;
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
        //
        $permissions = [
            'view_courses',
            'create_courses',
            'edit_courses',
            'delete_courses',
        ];

        foreach ($permissions as $permission) {
            Permission::create([
                'name' => $permission
            ]);
        }

        $teacherRole = Role::create([
            'name' => 'teacher'
        ]);

        $teacherRole->givePermissionTo([
            'view_courses',
            'create_courses',
            'edit_courses',
            'delete_courses',
        ]);

        $studentRole = Role::create([
            'name' => 'student'
        ]);

        $studentRole->givePermissionTo([
            'view_courses',
        ]);

        // membuat data user super admin
        $user = User::create([
            'name' => 'Desta',
            'email' => 'desta@gmail.com',
            'password' => bcrypt('12345678')
        ]);

        $user->assignRole($teacherRole);
    }
}
