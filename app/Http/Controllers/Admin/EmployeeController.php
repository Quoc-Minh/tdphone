<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Nhanvien;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class EmployeeController extends Controller
{
    public function create(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => ['required', 'max:50'],
            'email' => ['required', 'max:100', 'email', 'unique:nhanvien'],
            'phone' => ['required'],
            'password' => ['required', 'min:8', 'max:60']
        ], [
            'name' => [
                'required' => __('The name field is required.'),
            ]
        ]);

        if ($validator->fails()) {
            return back()->with('toast_error', $validator->messages()->all()[0])->withInput();
        }


        $user = new Nhanvien([
            'ten' => $request->name,
            'email' => $request->email,
            'sodienthoai' => $request->phone,
            'password' => Hash::make($request->password),
        ]);

        $user->assignRole($request->role);

        $user->save();

        if (!$user) {
            return redirect()->route('admin.employees')->with('toast_error', __('Create employee fail'));
        }


        return redirect()->route('admin.employees')->with('toast_success', __('Create employee success'));
    }

    public function delete()
    {
    }
}
