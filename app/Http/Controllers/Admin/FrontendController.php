<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Hoadon;
use App\Models\Lichhen;
use App\Models\NhanVien;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class FrontendController extends Controller
{
    public function home(Request $request)
    {
        $orders = Hoadon::whereDate('created_at', today())->where('trangthai', 1)->get();
        $orders_inyear = Hoadon::whereBetween('created_at', array(date('Y-01-01 H:i:s'), date('Y-m-d H:i:s')))->where('trangthai', 1)->get();

        $apppoinments = Lichhen::whereDate('ngayhen', today())->get();

        if ($orders->count() > 0) {
            $revenue = $orders->map(function ($item) {
                $services = collect(json_decode($item->dichvu));
                $total = $services->sum('giacong') + $services->sum('giadv');
                return $total;
            });
            $revenue = $revenue->sum();
        } else {
            $revenue = 0;
        }

        if ($orders_inyear->count() > 0) {
            $revenue_inyear = $orders_inyear->map(function ($item) {
                $services = collect(json_decode($item->dichvu));
                $total = $services->sum('giacong') + $services->sum('giadv');
                return $total;
            });
            $revenue_inyear = $revenue_inyear->sum();
        } else {
            $revenue_inyear = 0;
        }

        if ($request->start && $request->end) {
            $orders_between = Hoadon::whereBetween('created_at', [$request->start, $request->end])->where('trangthai', 1)->orderBy('created_at', 'asc')->get();
            $sum = $orders_between->map(function ($item) {
                $services = collect(json_decode($item->dichvu));
                $total = $services->sum('giacong') + $services->sum('giadv');
                return $total;
            });
            $date = $orders_between->map(function ($item) {
                $services = collect(json_decode($item->dichvu));
                $total = $services->sum('giacong') + $services->sum('giadv');
                return $item->created_at;
            });
        } else {
            $sum = [];
            $date = [];
        }


        return view('admin.pages.home', [
            'revenue' => $revenue,
            'revenue_inyear' => $revenue_inyear,
            'orders_count' => $orders->count(),
            'apppoinments_count' => $apppoinments->count(),
            'sum' => $sum,
            'date' => $date
        ]);
    }

    public function signin()
    {
        return view('authentication.signin');
    }

    public function signup()
    {
        return view('authentication.signup');
    }

    public function roles()
    {
        $roles = Role::where('name', '!=', 'Super Admin')->get();
        $permissions = Permission::all();
        $groups = Permission::select('group as name')->groupBy('group')->get();
        return view('admin.pages.Employees.roles', [
            'roles' => $roles,
            'permissions' => $permissions,
            'groups' => $groups
        ]);
    }

    public function employees()
    {
        $users = Nhanvien::where('ten', '!=', 'SuperAdmin')->get();
        $roles = Role::where('name', '!=', 'Super Admin')->get();
        return view('admin.pages.Employees.main', [
            'users' => $users,
            'roles' => $roles
        ]);
    }

    public function profile()
    {
        return view('admin.pages.profile', [
            'user' => Auth::user()
        ]);
    }
}
