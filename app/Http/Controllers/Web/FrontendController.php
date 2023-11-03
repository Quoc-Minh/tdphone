<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use App\Models\NhanVien;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class FrontendController extends Controller
{
    public function home() {
        return view('web.pages.home');
    }
    
    public function signin() {
        return view('authentication.signin');
    }

    public function signup() {
        return view('authentication.signup');
    }
}
