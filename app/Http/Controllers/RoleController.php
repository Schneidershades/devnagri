<?php

namespace App\Http\Controllers;

use App\Http\Requests\RoleCreateFormRequest;
use App\Http\Requests\RoleUpdateFormRequest;
use App\Models\Role;
use App\Models\Permission;
use Session;

class RoleController extends Controller
{
    public function index()
    {
        $roles = Role::all();
        return view('pages.roles.index')->with('roles', $roles);
    }

    public function create()
    {
        return view('pages.roles.create')
            ->with('permissions', Permission::all());
    }

    public function store(RoleCreateFormRequest $request)
    {
        $role = Role::create($request->validated());
        $role->permissions()->sync($request->permissions);
        Session::flash('success', 'role was sucessfully created');
        return redirect()->route('roles.index');
    }

    public function show($id)
    {
        $role =  Role::findOrFail($id);
        return view('pages.roles.show')->with('role', $role);
    }

    public function edit($id)
    {
        $role =  Role::findOrFail($id);
        return view('pages.roles.edit')->with('role', $role);
    }

    public function update(RoleUpdateFormRequest $request, $id)
    {
        $role =  Role::findOrFail($id);
        $role->name = $request->name;
        $role->save();
        $role->permissions()->sync($request->permissions);
        Session::flash('success', 'role was sucessfully updated');
        return redirect()->route('roles.index');
    }

    public function destroy($id)
    {
        $role =  role::findOrFail($id);
        $role->delete();
        Session::flash('success', 'role was sucessfully deleted');
        return redirect()->route('roles.index');
    }
}
