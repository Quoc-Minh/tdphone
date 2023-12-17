<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Dichvu;
use App\Models\Nhanvien;
use App\Models\Phieunhan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Spatie\Permission\Models\Role;

class ReceiveReceiptController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $receipts = Phieunhan::all();

        return view('admin.pages.Receipts.receive.main', [
            'receipts' => $receipts
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $services = Dichvu::all();

        return view('admin.pages.Receipts.receive.create', [
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

            $receipt = new Phieunhan([
                'tenkhachhang' => $request->name,
                'sdtkhachhang' => $request->phone,
                'diachi' => $request->address,
                'loaimay' => $request->phonetype,
                'imei' => $request->imei,
                'ghichu' => $request->note,
                'tinhtrangmay' => $request->conditions,
                'thoigianhentra' => $request->returntime,
                'nguoinhan' => Auth::guard('admin')->id()
            ]);

            $receipt->save();
            $services = Dichvu::find($request->services);
            $receipt->dichvu()->attach($services);


            DB::commit();
        } catch (\Exception $e) {
            DB::rollBack();
            return redirect()->back()->with('error', 'Create receipt fail' . $e->getMessage());
        }

        return redirect()->route('admin.receive-receipts')->with('toast_success', 'Created receipt success');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $receipt = Phieunhan::find($id);
        return view('admin.pages.Receipts.receive.detail', [
            'receipt' => $receipt
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $receipt = Phieunhan::find($id);
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
        $receipt = Phieunhan::find($id);

        if (!$receipt) {
            return redirect()->back()->with('toast_error', __('Not found receipt.'));
        }

        $result = $receipt->delete();

        if (!$result) {
            return redirect()->back()->with('toast_error', __('Delete receipt fail.'));
        }

        return redirect()->back()->with('success', __('Delete receipt success.'));
    }
}
