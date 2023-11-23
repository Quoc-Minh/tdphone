<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Danhmuc;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $categories = Danhmuc::all();
        return view('admin.pages.Services.Categories.main', [
            'categories' => $categories
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.pages.Services.Categories.create');
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

        $category = Danhmuc::create([
            'ten' => $request->name,
            'danhmuccha' => $request->parent_id,
        ]);

        if (!$category) {
            return redirect()->route('admin.categories')->with('toast_error', __('Create category fail'));
        }

        return redirect()->route('admin.categories')->with('success', __('Create category success'));
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
        $category = Linhkien::find($id);
        return view('admin.pages.Services.Categories.edit', [
            'category' => $category
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

        $category = Danhmuc::find($id);

        if (!$category) {
            return redirect()->back()->with('toast_error', __('Not found category.'));
        }

        $result = $category->update([
            'ten' => $request->name,
            'danhmuccha' => $request->price,
            'updated_at' => date('H:i Y-m-d')
        ]);

        if (!$result) {
            return redirect()->route('admin.categories')->with('toast_error', __('Update category fail.'));
        }

        return redirect()->route('admin.categories')->with('success', __('Update category success.'));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $category = Danhmuc::find($id);

        if (!$category) {
            return redirect()->back()->with('toast_error', __('Not found category.'));
        }

        $result = $category->delete();

        if (!$result) {
            return redirect()->back()->with('toast_error', __('Delete category fail.'));
        }

        return redirect()->back()->with('success', __('Delete category success.'));
    }
}
