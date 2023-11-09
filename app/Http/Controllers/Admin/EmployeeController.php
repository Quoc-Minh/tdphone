<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Nhanvien;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Spatie\Permission\Models\Role;

class EmployeeController extends Controller
{
	/**
	 * Display a listing of the resource.
	 */
	public function index()
	{
		$users = Nhanvien::where('ten', '!=', 'SuperAdmin')->get();
		$roles = Role::where('name', '!=', 'Super Admin')->get();
		return view('admin.pages.Employees.main', [
			'users' => $users,
			'roles' => $roles
		]);
	}

	/**
	 * Show the form for creating a new resource.
	 */
	public function create()
	{
		$roles = Role::where('name', '!=', 'Super Admin')->get();
		return view('admin.pages.employees.create', [
			'roles' => $roles
		]);
	}

	/**
	 * Store a newly created resource in storage.
	 */
	public function store(Request $request)
	{
		$validator = Validator::make($request->all(), [
			'name' => ['required', 'max:50'],
			'email' => ['required', 'max:100', 'email', 'unique:nhanvien'],
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

		try {
			DB::beginTransaction();
			$user = new Nhanvien([
				'manv' => '#',
				'ten' => $request->name,
				'email' => $request->email,
				'sodienthoai' => $request->phone,
				'password' => Hash::make('#')
			]);
			$user->assignRole($request->role);
			$user->save();
			$manv = 'TD' . Role::findByName($request->role)->short_name . str_pad($user->id, 3, '0', STR_PAD_LEFT);
			$user->update([
				'manv' => $manv,
				'password' => Hash::make($manv)
			]);
			DB::commit();
		} catch (\Exception $e) {
			DB::rollBack();
			return redirect()->route('admin.employees')->with('toast_error', __('Create employee fail'));
		}

		return redirect()->route('admin.employees')->with('success', __('Create employee success'));
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
}
