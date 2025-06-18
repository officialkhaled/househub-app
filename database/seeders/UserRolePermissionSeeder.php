<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Models\Permission;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class UserRolePermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $this->createPermissions();

        // Create Roles
        $superAdminRole = Role::create(['name' => 'super-admin']);
        $adminRole = Role::create(['name' => 'admin']);
        $staffRole = Role::create(['name' => 'staff']);
        $userRole = Role::create(['name' => 'user']);

        $allPermissionNames = Permission::pluck('name')->toArray();

        $superAdminRole->givePermissionTo($allPermissionNames);

        $adminRole->givePermissionTo(['create role', 'view role', 'update role']);
        $adminRole->givePermissionTo(['create permission', 'view permission']);
        $adminRole->givePermissionTo(['create user', 'view user', 'update user']);


        $superAdminUser = User::firstOrCreate([
            'email' => 'admin@gmail.com',
        ], [
            'name' => 'Super Admin',
            'email' => 'admin@gmail.com',
            'password' => Hash::make('123456'),
        ]);

        $superAdminUser->assignRole($superAdminRole);


        $adminUser = User::firstOrCreate([
            'email' => 'admin@mail.com'
        ], [
            'name' => 'Admin',
            'email' => 'admin@mail.com',
            'password' => Hash::make('123456'),
        ]);

        $adminUser->assignRole($adminRole);


        $staffUser = User::firstOrCreate([
            'email' => 'staff@gmail.com',
        ], [
            'name' => 'Staff',
            'email' => 'staff@gmail.com',
            'password' => Hash::make('123456'),
        ]);

        $staffUser->assignRole($staffRole);
    }

    private function createPermissions(): void
    {
        $permissions = [
            // Permission
            'view permission', 'create permission', 'update permission', 'delete permission',

            // Role
            'view role', 'create role', 'update role', 'delete role', 'add-edit permission',

            // User
            'view user', 'create user', 'update user', 'delete user',

            // Building
            'view building', 'create building', 'update building', 'delete building', 'update status building',

            // Floor
            'view floor', 'create floor', 'update floor', 'delete floor',

            // Flat
            'view flat', 'create flat', 'update flat', 'delete flat', 'update status flat',

            // Utility
            'view utility', 'create utility', 'update utility', 'delete utility', 'update status utility',

            // Report
            'view month-wise-report', 'create month-wise-report', 'update month-wise-report', 'delete month-wise-report',
        ];

        foreach ($permissions as $permissionName) {
            Permission::firstOrCreate(['name' => $permissionName]);
        }
    }
}
