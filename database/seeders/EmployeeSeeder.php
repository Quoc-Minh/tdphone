<?php

namespace Database\Seeders;

use App\Models\Nhanvien;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Models\Role;

class EmployeeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $user = Nhanvien::create([
            'ten' => 'QuanLy',
            'manv' => 'NVQL001',
            'email' => 'quanly@gmail.com',
            'sodienthoai' => '0123456701',
            'diachi' => '180 Cao Lo',
            'avatar' => fake()->imageUrl(),
            'password' => Hash::make('admin123'),
        ]);
        $user->assignRole('Quản Lý');

        $user = Nhanvien::create([
            'ten' => 'KyThuat',
            'manv' => 'NVKT001',
            'email' => 'kythuat@gmail.com',
            'sodienthoai' => '0123456702',
            'diachi' => '180 Cao Lo',
            'avatar' => fake()->imageUrl(),
            'password' => Hash::make('admin123'),
        ]);
        $user->assignRole('Kỹ Thuật');

        $user = Nhanvien::create([
            'ten' => 'KyThuat2',
            'manv' => 'NVKT002',
            'email' => 'kythuat2@gmail.com',
            'sodienthoai' => '0123456705',
            'diachi' => '180 Cao Lo',
            'avatar' => fake()->imageUrl(),
            'password' => Hash::make('admin123'),
        ]);
        $user->assignRole('Kỹ Thuật');

        $user = Nhanvien::create([
            'ten' => 'KyThuat3',
            'manv' => 'NVKT003',
            'email' => 'kythuat3@gmail.com',
            'sodienthoai' => '0123456706',
            'diachi' => '180 Cao Lo',
            'avatar' => fake()->imageUrl(),
            'password' => Hash::make('admin123'),
        ]);
        $user->assignRole('Kỹ Thuật');

        $user = Nhanvien::create([
            'ten' => 'TiepTan',
            'manv' => 'NVTT001',
            'email' => 'tieptan@gmail.com',
            'sodienthoai' => '0123456703',
            'diachi' => '180 Cao Lo',
            'avatar' => fake()->imageUrl(),
            'password' => Hash::make('admin123'),
        ]);
        $user->assignRole('Tiếp Tân');

        $user = Nhanvien::create([
            'ten' => 'TiepTan2',
            'manv' => 'NVTT002',
            'email' => 'tieptan2@gmail.com',
            'sodienthoai' => '0123456704',
            'diachi' => '180 Cao Lo',
            'avatar' => fake()->imageUrl(),
            'password' => Hash::make('admin123'),
        ]);
        $user->assignRole('Tiếp Tân');
    }
}
