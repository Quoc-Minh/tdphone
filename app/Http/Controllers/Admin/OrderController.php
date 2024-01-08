<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Hoadon;
use App\Models\Linhkien;
use App\Models\Phieunhan;
use App\Models\Phieusua;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $orders_unpaid = Hoadon::where('trangthai', 0)->get();
        $orders_paid = Hoadon::where('trangthai', 1)->get();

        return view('admin.pages.Orders.main', [
            'orders_unpaid' => $orders_unpaid,
            'orders_paid' => $orders_paid
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        try {
            $receive = Phieunhan::find($request->receiveid);
            DB::beginTransaction();

            $order = new Hoadon([
                'tenkhachhang' => $receive->tenkhachhang,
                'sdtkhachhang' => $receive->sdtkhachhang,
                'diachi' => $receive->diachi,
                'loaimay' => $receive->loaimay,
                'imei' => $receive->imei,
                'maps' => $receive->phieusua->id,
                'manv' => Auth::guard('admin')->id(),
                'created_at' => date('y-m-d H:i:s')
            ]);

            $order->dichvu = json_encode($receive->dichvu);

            $order->save();

            DB::commit();
        } catch (\Exception $e) {
            DB::rollBack();
            return redirect()->back()->with('error', 'Issue invoice fail' . $e->getMessage());
        }

        return redirect()->route('admin.orders')->with('toast_success', __('Issue invoice success'));
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $order = Hoadon::find($id);
        return view('admin.pages.Orders.detail', [
            'order' => $order,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }

    public function status(string $id)
    {
        $order = Hoadon::find($id);
        if ($order->trangthai == 0) {
            $order->trangthai = 1;
        } else {
            $order->trangthai = 0;
        }
        $order->save();

        return redirect()->back()->with('toast_success', 'change status success');
    }
}
