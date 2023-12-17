<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Danhmuc;
use App\Models\Dichvu;
use App\Models\Linhkien;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;

class ServiceController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $services = Dichvu::all();
        return view('admin.pages.services.main', [
            'services' => $services
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categories = Danhmuc::all();
        $components = Linhkien::all();
        return view('admin.pages.services.create', [
            'categories' => $categories,
            'components' => $components
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
//        dd($request->all());
        $validator = Validator::make($request->all(), [
            'name' => ['required', 'max:50'],
        ], [
            'name' => [
                'required' => __('The name field is required.'),
                'max' => __('max 50')
            ]
        ]);

        if ($validator->fails()) {
            return back()->with('toast_error', $validator->messages()->all()[0])->withInput();
        }

        try {
            DB::beginTransaction();

            $service = new Dichvu([
                'ten' => $request->name,
                'giadv' => $request->servicePrice,
                'giacong' => $request->fixPrice,
                'baohanh' => $request->warranty,
                'mota' => $request->description,
                'madanhmuc' => $request->category
            ]);

            $components = Dichvu::find($request->components);
            $service->linhkien()->attach($components);

            $service->save();
//        dd(!$request->hasFile('thumbnail'));
            if ($request->hasFile('thumbnail')) {
                $path = Storage::putFileAs(
                    '/assets/admin/images/services', $request->file('thumbnail'), $service->id . '10.webp'
                );
                $service->update(['hinh' => $path]);
            }

            DB::commit();
        } catch (\Exception $e) {
            DB::rollBack();
            return redirect()->route('admin.services')->with('toast_error', __('Create service fail'));
        }

        return redirect()->route('admin.services')->with('success', __('Create service success'));
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $service = Dichvu::find($id);
        return view('admin.pages.services.edit', [
            'service' => $service
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {

        $validator = Validator::make($request->all(), [
            'name' => ['required', 'max:50'],
            'image' => ['image', 'mimes:jpg,png,jpeg']
        ], [
            'name' => [
                'required' => __('The name field is required.'),
                'max' => __('max 50')
            ],
            'image' => [
                'image' => __('Please choose file image'),
                'mimes' => __('Incorrect image format (only jpg, png, jpeg)')
            ]
        ]);

        if ($validator->fails()) {
            return back()->with('toast_error', $validator->messages()->all()[0])->withInput();
        }

        $service = Dichvu::find($id);

        if (!$service) {
            return redirect()->back()->with('toast_error', __('Not found service.'));
        }

        $result = $service->update([
            'ten' => $request->name,
            'giadv' => $request->servicePrice,
            'giacong' => $request->fixPrice,
            'baohanh' => $request->warranty,
            'mota' => $request->description,
            'madanhmuc' => $request->category
        ]);

        if (!$result) {
            return redirect()->route('admin.services')->with('toast_error', __('Update service fail.'));
        }

        return redirect()->route('admin.services')->with('success', __('Update service success.'));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $service = Dichvu::find($id);

        if ($service->phieu->count() > 0) {
            return redirect()->back()->with('toast_error', __("Receipt exist, can't delete"));
        }

        if (!$service) {
            return redirect()->back()->with('toast_error', __('Not found service.'));
        }

        $result = $service->delete();

        if (!$result) {
            return redirect()->back()->with('toast_error', __('Delete service fail.'));
        }

        return redirect()->back()->with('success', __('Delete service success.'));
    }
}
