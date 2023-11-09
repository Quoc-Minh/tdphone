<?php

namespace Database\Seeders;

use App\Models\NhanVien;
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
        $role = Role::create(['guard_name' => 'admin', 'name' => 'Super Admin', 'short_name' => 'SA']);

        $user = NhanVien::create([
            'manv' => 'superadmin',
            'ten' => 'SuperAdmin',
            'email' => 'superadmin@gmail.com',
            'sodienthoai' => '0123456789',
            'diachi' => '180 Cao Lo',
            'avatar' => fake()->imageUrl(),
            'password' => Hash::make('admin123'),
        ]);

        $user->assignRole($role);
    }
}
