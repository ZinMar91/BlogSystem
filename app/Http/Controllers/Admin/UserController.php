<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\User;
use Spatie\Permission\Models\Role;

class UserController extends Controller
{
    public function index()
    {
        $users = User::all();
        return view('admin.users.index', compact('users'));
    }

    public function edit($id)
    {
      $user = User::whereId($id)->firstOrFail();
      $roles = Role::all();
      $selected_roles = $user->roles()->pluck('name')->toArray();

      return view('admin.users.edit', compact('user', 'roles', 'selected_roles'));
    }

    public function update(Request $request, $id)
    {
      $user = User::whereId($id)->firstOrFail();
      $user->syncRoles($request->get('role'));
      return redirect(action('admin\UserController@edit', $id))->with('status', 'User\'s Roles Updated Successfully!');
    }
}
