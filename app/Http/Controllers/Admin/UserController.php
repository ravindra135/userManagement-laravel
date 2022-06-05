<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Testing\Fluent\Concerns\Has;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Traits\HasRoles;

class UserController extends Controller
{
    use HasRoles;

    public function index() {

        $users = User::all();
        return view('admin.users.index', compact('users'));
    }

    public function create() {
        $roles = Role::whereNotIn('name', ['super admin'])->get();
        return view('admin.users.create', compact('roles'));
    }

    public function store(Request $request) {

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);

        if ($request->role == 0) {
            $user->assignRole('user');
        } else {
            $user->assignRole($request->role);
        }

        return redirect(route('admin.users.index'));
    }

}
