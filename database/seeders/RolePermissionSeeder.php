<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class RolePermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Create roles
        $adminRole = Role::create(['name' => 'admin']);
        $staffRole = Role::create(['name' => 'staff']);

        // Create permissions
        $permissions = [
            'dashboard-access',
            'user-management-access',
            'role-management-access',
            'permission-management-access',
            'product-management-access',
        ];

        foreach ($permissions as $permission) {
            Permission::create(['name' => $permission]);
        }

        // Grant all permissions to admin role
        $adminRole->givePermissionTo(Permission::all());

        // Grant some permissions to staff role
        $staffRole->givePermissionTo([
            'dashboard-access',
            'product-management-access',
        ]);
    }
}
