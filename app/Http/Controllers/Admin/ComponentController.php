<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Linhkien;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class ComponentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $components = Linhkien::all();
        return view('admin.pages.components.main', [
            'components' => $components
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.pages.components.create');
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

        $component = Linhkien::create([
            'ten' => $request->name,
            'gia' => $request->price,
            'soluong' => $request->quantity,
            'mota' => $request->description,
            'trangthai' => 1
        ]);

        if (!$component) {
            return redirect()->route('admin.components')->with('toast_error', __('Create component fail'));
        }

        return redirect()->route('admin.components')->with('success', __('Create component success'));
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
        $component = Linhkien::find($id);
        return view('admin.pages.components.edit', [
            'component' => $component
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

        $component = Linhkien::find($id);

        if (!$component) {
            return redirect()->back()->with('toast_error', __('Not found component.'));
        }

        $result = $component->update([
            'ten' => $request->name,
            'gia' => $request->price,
            'soluong' => $request->quantity,
            'mota' => $request->description
        ]);

        if (!$result) {
            return redirect()->route('admin.components')->with('toast_error', __('Update component fail.'));
        }

        return redirect()->route('admin.components')->with('success', __('Update component success.'));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $component = Linhkien::find($id);

        if (!$component) {
            return redirect()->back()->with('toast_error', __('Not found component.'));
        }

        $result = $component->delete();

        if (!$result) {
            return redirect()->back()->with('toast_error', __('Delete component fail.'));
        }

        return redirect()->back()->with('success', __('Delete component success.'));
    }
}
