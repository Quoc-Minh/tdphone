<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Nhanvien;
use Illuminate\Foundation\Auth\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class ProfileController extends Controller
{
    public function changePassword(Request $request)
    {
        $user = Nhanvien::find(Auth::guard('admin')->user()->id);
        if (!Hash::check($request->curPassword, $user->password)) {
            return redirect()->back()->with('toast_error', __('Current password is incorrect'));
        }

        $validator = Validator::make($request->all(), [
            'newPassword' => ['required', 'min:8'],
            'rePassword' => ['required', 'same:newPassword']
        ]);

        if ($validator->fails()) {
            return redirect()->back()->with('toast_error', $validator->messages()->all()[0])->withInput();
        }


        $user->password = Hash::make($request->newPassword);
        $user->save();
        return redirect()->back()->with('toast_success', __('Change password success'));
    }
}
