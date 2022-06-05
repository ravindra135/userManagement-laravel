<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class PermissionController extends Controller
{
    public function index() {
        $permissions = Permission::all();
        return view('admin.permissions.index', compact('permissions'));
    }

    public function store(Request $request) {

        \request()->validate([
            'name' => ['required']
        ]);

        Permission::create([
            'name' => \request('name')
        ]);

        return back();
    }

    public function destroy(Permission $permission) {
        $permission->delete();
        return back();
    }
}
