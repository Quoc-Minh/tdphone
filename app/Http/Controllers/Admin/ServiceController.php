<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Dichvu;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Spatie\Permission\Models\Role;

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
        return view('admin.pages.services.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
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

        $service = Dichvu::create([
            'ten' => $request->name,
            'giadv' => $request->servicePrice,
            'giacong' => $request->fixPrice,
            'baohanh' => $request->warranty,
            'mota' => $request->description
        ]);

        if (!$service) {
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
        ], [
            'name' => [
                'required' => __('The name field is required.'),
                'max' => __('max 50')
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
            'mota' => $request->description
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
