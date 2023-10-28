<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
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
        $roles = Role::all();
        $permissions = Permission::all();
        return view('admin.pages.StaffManagement.roles', [
            'roles' => $roles,
            'permissions' => $permissions
        ]);
    }

    public function employees() {
        $users = User::all();
        $roles = Role::all();
        return view('admin.pages.StaffManagement.employees', [
            'users' => $users,
            'roles' => $roles
        ]);
    }
}
