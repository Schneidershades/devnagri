<?php

namespace App\Http\Controllers;

use App\Http\Requests\UserCreateFormRequest;
use App\Http\Requests\UserUpdateFormRequest;
use Session;
use App\Models\User;
use App\Models\Role;
use App\Models\Permission;
use App\Models\UserPermission;

class UserController extends Controller
{
    public function index()
    {
        $users = User::all();
        return view('pages.users.index')
            ->with('users', $users);
    }

    public function create()
    {
        return view('pages.users.create')
            ->with('roles', Role::all())
            ->with('permissions', Permission::all());
    }

    public function store(UserCreateFormRequest $request)
    { 
        $user = User::create($request->validated());
        $user->roles()->sync($request->roles);
        $user->givePermissionTo($request->permissions);
        Session::flash('success', 'User was sucessfully created');
        return redirect()->route('users.index');
    }

    public function show($id)
    {
      $user = User::findOrFail($id);
      $currentPermissions = UserPermission::where('user_id', $user->id)->pluck('permission_id')->toArray();
      if($currentPermissions == null){
        $filterCurrentPermissions = Permission::all();
      }else{
        $filterCurrentPermissions = Permission::whereNotIn('id', $currentPermissions)->get();
      }
        return view('pages.users.show')
        ->with('permissions', $filterCurrentPermissions)
        ->with('user', $user);
    }

    public function update(UserUpdateFormRequest $request, $id)
    {
        $user = User::update($request->validated());
        $user->roles()->sync($request->roles);
        $user->permissions()->attach($request->permissions);
        Session::flash('success', 'Permission was sucessfully added');
        return redirect()->back();
    }

    public function destroy($user, $permission)
    {
        $user = UserPermission::where('permission_id', $permission)->where('user_id', $user)->first();
        $user->delete();
        Session::flash('success', 'Permission was sucessfully deleted');
        return redirect()->back();
    }
}
