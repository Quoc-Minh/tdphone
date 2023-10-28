<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class PermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Roles
        Role::create(['name' => 'Admin']);
        Role::create(['name' => 'Managers']);
        Role::create(['name' => 'Customers']);
        Role::create(['name' => 'Technicians']);
        Role::create(['name' => 'Receptionists']);

        // Permissions
        Permission::create(['name' => 'Create role']);
        Permission::create(['name' => 'Edit role']);
        Permission::create(['name' => 'Delete role']);
        Permission::create(['name' => 'Create receipt']);
        Permission::create(['name' => 'Update receipt']);
        Permission::create(['name' => 'Delete receipt']);
        Permission::create(['name' => 'Transfer receipt']);
        Permission::create(['name' => 'Issue an invoice']);
        Permission::create(['name' => 'Create service']);
        Permission::create(['name' => 'Update service']);
        Permission::create(['name' => 'Delete service']);
        Permission::create(['name' => 'Receipt statistics']);
        Permission::create(['name' => 'Sale statistics']);
        Permission::create(['name' => 'Create employee']);
        Permission::create(['name' => 'Update employee']);
        Permission::create(['name' => 'Authorization']);
        Permission::create(['name' => 'Booking']);
        Permission::create(['name' => 'Update profile']);
    }
}
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
