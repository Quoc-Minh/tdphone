<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;

class RoleController extends Controller
{
    public function create(Request $request) {
        $request->validate([
            'name' => ['required', 'max:100']
        ], [
            'name' => [
                'required' => __('This field is required'),
                'max' => __('max character is 100')
            ]
        ]);
        
        $role =new Role([
            'name' => $request->name
        ]);

        if ($request->permissions) {
            for($i = 0; $i < count($request->permissions); $i++) {
                $role->givePermissionTo($request->permissions[$i]);
            }
        }
        
        $role->save();
        // toast('');
        return redirect()->back()->with('toast_success', __('Created role successfully'));
    }

    public function update($id, Request $request) {
        $role = Role::find($id);

        if($request->permissions) {
            $role->syncPermissions($request->permissions);
        }

        $role->save();
        
        return redirect()->route('admin.roles')->with('success', __('Updated role successfully'));
    }

    public function delete($id) {
        $role = Role::find($id);

        $title = 'Delete User!';
        $text = "Are you sure you want to delete?";
        confirmDelete($title, $text);

        if ($role->users->count() > 0) {
            return redirect()->route('admin.roles')->with('danger', __('At least one user is assigning this role'));
        }

        $result = $role->delete();

        if (!$result) {
            return redirect()->route('admin.roles')->with('toast_danger', __('Deleted role failure'));
        }
        return redirect()->route('admin.roles')->with('toast_success', __('Deleted role successfully'));
    }
}
