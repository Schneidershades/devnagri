<?php

namespace App\Http\Controllers;

use App\Http\Requests\PermissionCreateFormRequest;
use App\Http\Requests\PermissionUpdateFormRequest;
use App\Models\Permission;

class PermissionController extends Controller
{
    public function index()
    {
        $permissions = Permission::all();
        return view('pages.permissions.index')->with('permissions', $permissions);
    }

    public function create()
    {
        return view('pages.permissions.create');
    }

    public function store(Request $request)
    {
        $role =  new Permission;
        $role->name = $request->name;
        $role->save();
        Session::flash('success', 'role was sucessfully created');
        return redirect()->route('permissions.index', $role->id);
    }

    public function show($id)
    {
        $role =  Permission::findOrFail($id);
        return view('pages.permissions.show')->with('role', $role);
    }

    public function edit($id)
    {
        $role =  Permission::findOrFail($id);
        return view('pages.permissions.edit')->with('role', $role);
    }

    public function update(Request $request, $id)
    {
        $role =  Permission::findOrFail($id);
        $role->name = $request->name;
        $role->save();
        Session::flash('success', 'role was sucessfully updated');
        return redirect()->route('permissions.show', $role->id);
    }

    public function destroy($id)
    {
        $role =  role::findOrFail($id);
        $role->delete();
        Session::flash('success', 'role was sucessfully deleted');
        return redirect()->route('permissions.index');
    }
}
