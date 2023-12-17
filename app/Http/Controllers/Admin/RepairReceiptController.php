<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Dichvu;
use App\Models\Linhkien;
use App\Models\Phieusua;
use App\Models\PhieusuaLinhkien;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;

class RepairReceiptController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $repairing = Phieusua::where('nguoisua', Auth::guard('admin')->id())->where('trangthai', 0)->get();
        $repaired = Phieusua::where('nguoisua', Auth::guard('admin')->id())->where('trangthai', 1)->get();

        return view('admin.pages.Receipts.repair.main', [
            'repairing' => $repairing,
            'repaired' => $repaired
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $services = Dichvu::all();

        return view('admin.pages.Receipts.repair.create', [
            'services' => $services
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        try {
            DB::beginTransaction();

            $receipt = new Phieusua([
                'maphieunhan' => $request->receiveid,
                'trangthai' => 0,
                'thoigianbatdau' => date('y-m-d H:i:s'),
                'nguoisua' => Auth::guard('admin')->id(),
            ]);

            $receipt->save();

            $receipt->linhkien()->attach($receipt->phieunhan->dichvu->linhkien);

            DB::commit();
        } catch (\Exception $e) {
            DB::rollBack();
            return redirect()->back()->with('error', 'Assign repair fail' . $e->getMessage());
        }

        return redirect()->route('admin.repair-receipts')->with('toast_success', __('Assign receipt success'));
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $receipt = Phieusua::find($id);
        $components = Linhkien::all();
        return view('admin.pages.Receipts.repair.detail', [
            'receipt' => $receipt,
            'components' => $components
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $receipt = Phieusua::find($id);
        $conditions = json_decode($receipt->tinhtrangmay);
        $services = Dichvu::all();
        return view('admin.pages.receipts.edit', [
            'receipt' => $receipt,
            'services' => $services,
            'conditions' => $conditions
        ]);
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
        $receipt = Phieusua::find($id);

        if ($receipt->dichvu->count() > 0) {
            return redirect()->back()->with('toast_error', __("Service exist, can't delete"));
        }

        if (!$receipt) {
            return redirect()->back()->with('toast_error', __('Not found receipt.'));
        }

        $result = $receipt->delete();

        if (!$result) {
            return redirect()->back()->with('toast_error', __('Delete receipt fail.'));
        }

        return redirect()->back()->with('success', __('Delete receipt success.'));
    }

    public function repaired(string $id)
    {
        $receipt = Phieusua::find($id);

        $receipt->trangthai = 1;
        $receipt->save();
        return redirect()->back()->with('success', __('Repaired.'));
    }

    public function components(string $id, Request $request)
    {
        $receipt = PhieusuaLinhkien::where('maphieu', $id)->where('malk', $request->component)->first();

        $receipt->soluong++;

        $receipt->save();

        return redirect()->back()->with('toast_success', __('Add component success.'));
    }
}
