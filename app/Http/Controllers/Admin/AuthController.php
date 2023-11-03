<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Nhanvien;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function postSignin(Request $request) {
        $credentials = $request->validate([
            'email' => ['required', 'max:100', 'email'],
            'password' => ['required'],
        ], [
            'email' => [
                'required' => __('This field is required.'),
            ],
            'password' => [
                'required' => __('This field is required.'),
            ]
        ]);
        
        if (Auth::guard('admin')->attempt(['email' => $request->email , 'password' => $request->password])) {
            return redirect()->route('admin.home');
        }
        
        return back()->withErrors([
            'email' => __('The provided credentials do not match our records.'),
        ])->onlyInput('email');
    }

    public function postSignup(Request $request) {
        $request->validate([
            'name' => ['required', 'max:50'],
            'email' => ['required', 'max:100', 'email', 'unique:users'],
            'phone' => ['required', 'regex:/(84|0[3|5|7|8|9])+([0-9]{8,9})\b/'],
            'password' => ['required', 'min:8', 'max:60'],
            'repassword' => ['required', 'same:password']
        ], [
            'name' => [
                'required' => __('The name field is required.'),
            ]
        ]);

        $user = Nhanvien::create([
            'name' => $request->name,
            'email' => $request->email,
            'phone' => $request->phone,
            'password' => Hash::make($request->password),
        ]);

        $user->assignRole('Customer');    

        if (!$user) {
            return redirect()->route('admin.signup')->with('danger', 'It have error when sign up!');
        }

        
        return redirect()->route('admin.signin');
    }

    public function signout() {
        Auth::guard('admin')->logout();

        return redirect()->route('admin.signin');
    }
}
