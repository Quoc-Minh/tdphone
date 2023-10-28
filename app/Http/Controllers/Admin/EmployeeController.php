<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class EmployeeController extends Controller
{
    public function create(Request $request) {
        $request->validate([
            'name' => ['required', 'max:50'],
            'email' => ['required', 'max:100', 'email', 'unique:users'],
            'phone' => ['required'],
            'password' => ['required', 'min:8', 'max:60']
        ], [
            'name' => [
                'required' => __('The name field is required.'),
            ]
        ]);

        $user = new User([
            'name' => $request->name,
            'email' => $request->email,
            'phone' => $request->phone,
            'password' => Hash::make($request->password),
        ]);

        $user->assignRole($request->role);    

        $user->save();

        if (!$user) {
            return redirect()->route('admin.employees')->with('danger', 'Create user fail');
        }

        
        return redirect()->route('admin.employees');
    }
}
