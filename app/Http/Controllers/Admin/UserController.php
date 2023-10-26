<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Role;
use App\Models\User;

class UserController extends Controller
{
    public function index()
    {
        $users = User::with('roles')->paginate(10);
        return view('admin.users', [
            'users' => $users,
        ]);
    }

    public function edit(User $user)
    {
        $user = $user->load('roles');
        $allRoles = Role::all();
        return view('admin.userEdit', [
            'user' => $user,
            'roles' => $allRoles,
        ]);
    }

    public function update(User $user)
    {
        if (auth()->user()->id == $user->id) {
            return redirect()->route('admin.users');
        }
        $user->syncRoles(request()->roles);
        return redirect()->route('admin.users');
    }
}
