<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        
        // create roles and assign existing permissions
        $role = Role::create(['name' => 'Super Admin']);

        Permission::create(['name' => 'sign in to admin']);

        $role->givePermissionTo('sign in to admin');

        $user = User::create([
            'name' => 'SuperAdmin',
            'email' => 'superadmin@gmail.com',
            'phone' => '0123456789',
            'password' => Hash::make('admin123'),
        ]);

        $user->assignRole($role);
    }
}
