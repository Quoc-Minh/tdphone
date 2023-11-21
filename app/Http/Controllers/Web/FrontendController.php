<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use App\Models\NhanVien;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class FrontendController extends Controller
{
    public function home()
    {
        return view('web.pages.home');
    }

    public function signin()
    {
        return view('authentication.signin');
    }

    public function signup()
    {
        return view('authentication.signup');
    }

    public function booking()
    {
        return view('web.pages.booking');
    }

    public function services()
    {
        return view('web.pages.services');
    }

    public function blogs()
    {
        return view('web.pages.blogs');
    }

    public function about()
    {
        return view('web.pages.about');
    }

    public function warranty()
    {
        return view('web.pages.warranty');
    }

    public function contact()
    {
        return view('web.pages.contact');
    }
}
