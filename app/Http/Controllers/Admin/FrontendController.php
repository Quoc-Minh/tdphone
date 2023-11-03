<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\NhanVien;
use Illuminate\Support\Facades\Auth;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class FrontendController extends Controller
{
    public function home() {
        return view('admin.pages.home');
    }
    
    public function signin() {
        return view('authentication.signin');
    }

    public function signup() {
        return view('authentication.signup');
    }

    public function roles() {
        $roles = Role::where('name', '!=', 'Super Admin')->get();
        $permissions = Permission::all();
        $groups = Permission::select('group as name')->groupBy('group')->get();
        return view('admin.pages.Employees.roles', [
            'roles' => $roles,
            'permissions' => $permissions,
            'groups' => $groups
        ]);
    }

    public function employees() {
        $users = Nhanvien::where('ten', '!=', 'SuperAdmin')->get();
        $roles = Role::where('name', '!=', 'Super Admin')->get();
        return view('admin.pages.Employees.employees', [
            'users' => $users,
            'roles' => $roles
        ]);
    }

    public function profile() {
        return view ('admin.pages.profile', [
            'user' => Auth::user()
        ]);
    }
}
