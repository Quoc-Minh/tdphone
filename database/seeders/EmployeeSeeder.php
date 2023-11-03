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
            'email' => 'quanly@gmail.com',
            'sodienthoai' => '0123456701',
            'diachi' => '180 Cao Lo',
            'avatar' => fake()->imageUrl(),
            'password' => Hash::make('admin123'),
        ]);
        $user->assignRole('Quản Lý');

        $user = Nhanvien::create([
            'ten' => 'KyThuat',
            'email' => 'kythuat@gmail.com',
            'sodienthoai' => '0123456702',
            'diachi' => '180 Cao Lo',
            'avatar' => fake()->imageUrl(),
            'password' => Hash::make('admin123'),
        ]);
        $user->assignRole('Kỹ Thuật');

        $user = Nhanvien::create([
            'ten' => 'KyThuat2',
            'email' => 'kythuat2@gmail.com',
            'sodienthoai' => '0123456705',
            'diachi' => '180 Cao Lo',
            'avatar' => fake()->imageUrl(),
            'password' => Hash::make('admin123'),
        ]);
        $user->assignRole('Kỹ Thuật');

        $user = Nhanvien::create([
            'ten' => 'KyThuat3',
            'email' => 'kythuat3@gmail.com',
            'sodienthoai' => '0123456706',
            'diachi' => '180 Cao Lo',
            'avatar' => fake()->imageUrl(),
            'password' => Hash::make('admin123'),
        ]);
        $user->assignRole('Kỹ Thuật');

        $user = Nhanvien::create([
            'ten' => 'letan',
            'email' => 'letan@gmail.com',
            'sodienthoai' => '0123456703',
            'diachi' => '180 Cao Lo',
            'avatar' => fake()->imageUrl(),
            'password' => Hash::make('admin123'),
        ]);
        $user->assignRole('Lễ Tân');

        $user = Nhanvien::create([
            'ten' => 'letan2',
            'email' => 'letan2@gmail.com',
            'sodienthoai' => '0123456704',
            'diachi' => '180 Cao Lo',
            'avatar' => fake()->imageUrl(),
            'password' => Hash::make('admin123'),
        ]);
        $user->assignRole('Lễ Tân');
    }
}
