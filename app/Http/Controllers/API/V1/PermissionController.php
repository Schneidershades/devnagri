<?php

namespace App\Http\Controllers\Api\v1;

use App\Http\Requests\PermissionCreateFormRequest;
use App\Http\Requests\PermissionUpdateFormRequest;
use App\Models\Permission;
use Session;

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

    public function store(PermissionCreateFormRequest $request)
    {
        $permission = Permission::create($request->validated());
        Session::flash('success', 'permission was sucessfully created');
        return redirect()->route('permissions.index', $permission->id);
    }

    public function show($id)
    {
        $permission =  Permission::findOrFail($id);
        return view('pages.permissions.show')->with('permission', $permission);
    }

    public function edit($id)
    {
        $permission =  Permission::findOrFail($id);
        return view('pages.permissions.edit')->with('permission', $permission);
    }

    public function update(PermissionUpdateFormRequest $request, $id)
    {
        $permission =  Permission::findOrFail($id);
        $permission->update($request->validated());
        Session::flash('success', 'permission was sucessfully updated');
        return redirect()->route('permissions.show', $permission->id);
    }

    public function destroy($id)
    {
        $permission =  permission::findOrFail($id);
        $permission->delete();
        Session::flash('success', 'permission was sucessfully deleted');
        return redirect()->route('permissions.index');
    }
}
