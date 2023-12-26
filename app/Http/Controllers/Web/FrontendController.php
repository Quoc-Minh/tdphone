<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use App\Models\Danhmuc;
use App\Models\Dichvu;
use App\Models\NhanVien;
use App\Models\Phieunhan;
use App\Models\Phieusua;
use Illuminate\Http\Request;
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

    public function services(Request $request)
    {
        if (!$request->category) {
            $services = Dichvu::all();
        } else {
            $services = Dichvu::where('madanhmuc', $request->category)->get();
        }
        $categories = Danhmuc::all();
        return view('web.pages.services', [
            'services' => $services,
            'categories' => $categories
        ]);
    }

    public function blogs()
    {
        return view('web.pages.blogs');
    }

    public function about()
    {
        return view('web.pages.about');
    }

    public function warranty(Request $request)
    {
        $result = Phieusua::join('phieunhan', 'phieunhan.id', '=', 'phieusua.maphieunhan')
            ->select('phieunhan.loaimay', 'phieunhan.imei', 'phieunhan.thoigianhentra', 'phieusua.trangthai')
            ->where('sdtkhachhang', $request->phone)
            ->get();
        return view('web.pages.warranty', [
            'result' => $result
        ]);
    }

    public function contact()
    {
        return view('web.pages.contact');
    }
}
