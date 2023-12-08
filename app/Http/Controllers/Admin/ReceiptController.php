<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Dichvu;
use App\Models\Nhanvien;
use App\Models\Phieu;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Spatie\Permission\Models\Role;

class ReceiptController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $receipts = Phieu::all();

        return view('admin.pages.Receipts.main', [
            'receipts' => $receipts
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $receipts = Dichvu::all();
        $services = Dichvu::all();

        return view('admin.pages.Receipts.create', [
            'receipts' => $receipts,
            'services' => $services
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => ['required', 'max:50'],
            'phone' => ['required'],
        ], [
            'name' => [
                'required' => __('The name field is required.'),
                'max' => __('max 50')
            ]
        ]);

        if ($validator->fails()) {
            return back()->with('toast_error', $validator->messages()->all()[0])->withInput();
        }
//        dd($request->all());

        try {
            DB::beginTransaction();

            $conditions = [
                'Screen' => $request->screen,
                'Glass / Touch' => $request->glass,
                'Wifi / Bluetooth / NFC / GPS' => $request->connection,
                'Signal 2G / 3G' => $request->signal,
                'Rom / SDCard' => $request->rom,
                'Camera / Flash' => $request->camera,
                'Speaker / Micro / Viration' => $request->sound,
                'Proximity sensor' => $request->sensor,
                'Fingerprint Sensor' => $request->fingerprint,
                'Physical button' => $request->button,
                'Appearance' => $request->appearance,
                'Other' => $request->other,
                'Icloud (Apple)' => $request->icloud,
                'Password (PIN)' => $request->pin,
            ];

            $receipt = new Phieu([
                'tenkhachhang' => $request->name,
                'sdtkhachhang' => $request->phone,
                'diachi' => $request->address,
                'loaimay' => $request->phonetype,
                'imei' => $request->imei,
                'ghichu' => $request->note,
                'tinhtrangmay' => json_encode($conditions),
                'thoigianhentra' => $request->returntime,
            ]);

            $receipt->save();
            $services = Dichvu::find($request->services);
            $user = Auth::guard('admin')->user();
            $receipt->dichvu()->attach($services);
            $receipt->nhanvien()->attach($user, ['trangthai' => 0, 'updated_at' => date('Y-m-d H:i:s')]);


            DB::commit();
        } catch (\Exception $e) {
            DB::rollBack();
            return redirect()->back()->with('error', 'Create receipt fail' . $e->getMessage());
        }

        return redirect()->route('admin.receipts')->with('toast_success', 'Created receipt success');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $receipt = Phieu::find($id);
        return view('admin.pages.Receipts.process.steps', [
            'receipt' => $receipt
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $receipt = Phieu::find($id);
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
        $receipt = Phieu::find($id);

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

    public function step(string $id)
    {
        $receipt = Phieu::find($id);
        return view('admin.pages.Receipts.process.steps', [
            'receipt' => $receipt
        ]);
    }

    public function repairStart(string $id)
    {
        $receipt = Phieu::find($id);
        $user = Auth::guard('admin')->user();
        $receipt->nhanvien()->attach($user, ['trangthai' => 1, 'updated_at' => date('Y-m-d H:i:s')]);

        return redirect()->back();
    }

    public function repairCompleted(string $id)
    {
        $receipt = Phieu::find($id);
        $user = Auth::guard('admin')->user();
        $receipt->nhanvien()->attach($user, ['trangthai' => 2, 'updated_at' => date('Y-m-d H:i:s')]);

        return redirect()->back();
    }

    public function issueInvoice(string $id)
    {
        $receipt = Phieu::find($id);
        $user = Auth::guard('admin')->user();
        $receipt->nhanvien()->attach($user, ['trangthai' => 3, 'updated_at' => date('Y-m-d H:i:s')]);

        return redirect()->back();
    }
}
