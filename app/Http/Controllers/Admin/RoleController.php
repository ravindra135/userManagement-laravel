<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class RoleController extends Controller
{
    public function index() {

        $roles = Role::whereNotIn('name', ['super admin'])->get();
        return view('admin.roles.index', compact('roles'));
    }

    public function store(Request $request) {

        \request()->validate([
            'name' => ['required']
        ]);

        Role::create([
            'name' => \request('name')
        ]);

        return back();
    }

    public function edit(Role $role) {
        $permissions = Permission::all();
        return view('admin.roles.edit', compact('role', 'permissions'));
    }

    public function update(Role $role) {

        \request()->validate([
            'name' => ['required']
        ]);
        $role->name = \request('name');

        $role->save();

        return redirect(route('admin.roles.index'));
    }

    public function destroy(Role $role) {
        $role->delete();
        return back();
    }

}
