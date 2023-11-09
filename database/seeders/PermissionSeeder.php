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
        $roleQL = Role::create(['guard_name' => 'admin', 'name' => 'Quản Lý', 'short_name' => 'QL']);
        $roleKT = Role::create(['guard_name' => 'admin', 'name' => 'Kỹ Thuật', 'short_name' => 'KT']);
        $roleTT = Role::create(['guard_name' => 'admin', 'name' => 'Tiếp Tân', 'short_name' => 'TT']);

        // Permissions
        Permission::create(['guard_name' => 'admin', 'name' => 'Thêm loại nhân viên', 'group' => 'Quản lý loại nhân viên']);
        Permission::create(['guard_name' => 'admin', 'name' => 'Cập nhật loại nhân viên', 'group' => 'Quản lý loại nhân viên']);
        Permission::create(['guard_name' => 'admin', 'name' => 'Xóa loại nhân viên', 'group' => 'Quản lý loại nhân viên']);

        Permission::create(['guard_name' => 'admin', 'name' => 'Phân quyền', 'group' => 'Quản lý nhân viên']);
        Permission::create(['guard_name' => 'admin', 'name' => 'Thêm nhân viên', 'group' => 'Quản lý nhân viên']);
        Permission::create(['guard_name' => 'admin', 'name' => 'Xóa nhân viên', 'group' => 'Quản lý nhân viên']);
        Permission::create(['guard_name' => 'admin', 'name' => 'Cập nhật nhân viên', 'group' => 'Quản lý nhân viên']);

        Permission::create(['guard_name' => 'admin', 'name' => 'Tạo phiếu', 'group' => 'Quản lý phiếu']);
        Permission::create(['guard_name' => 'admin', 'name' => 'Chuyển phiếu', 'group' => 'Quản lý phiếu']);
        Permission::create(['guard_name' => 'admin', 'name' => 'Cập nhật phiếu', 'group' => 'Quản lý phiếu']);
        Permission::create(['guard_name' => 'admin', 'name' => 'Xóa phiếu', 'group' => 'Quản lý phiếu']);

        Permission::create(['guard_name' => 'admin', 'name' => 'Tạo dịch vụ', 'group' => 'Quản lý dịch vụ']);
        Permission::create(['guard_name' => 'admin', 'name' => 'Cập nhật dịch vụ', 'group' => 'Quản lý dịch vụ']);
        Permission::create(['guard_name' => 'admin', 'name' => 'Xóa dịch vụ', 'group' => 'Quản lý dịch vụ']);

        Permission::create(['guard_name' => 'admin', 'name' => 'Tạo linh kiện', 'group' => 'Quản lý linh kiện']);
        Permission::create(['guard_name' => 'admin', 'name' => 'Cập nhật linh kiện', 'group' => 'Quản lý linh kiện']);
        Permission::create(['guard_name' => 'admin', 'name' => 'Xóa linh kiện', 'group' => 'Quản lý linh kiện']);

        // Assign role
        $roleQL->syncPermissions(Permission::all());
        $roleKT->syncPermissions(['Cập nhật nhân viên', 'Tạo phiếu', 'Chuyển phiếu', 'Cập nhật phiếu']);
        $roleTT->syncPermissions(['Cập nhật nhân viên', 'Tạo phiếu', 'Cập nhật phiếu']);
    }
}
