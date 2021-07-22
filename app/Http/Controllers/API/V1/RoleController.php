<?php

namespace App\Http\Controllers\Api\v1;

use App\Http\Requests\RoleCreateFormRequest;
use App\Http\Requests\RoleUpdateFormRequest;
use App\Models\Role;
use App\Models\Permission;
use Session;

class RoleController extends Controller
{
    public function index()
    {
        return $this->showAll(Role::all());
    }

    public function store(RoleCreateFormRequest $request)
    {
        $role = Role::create($request->validated());
        $role->permissions()->sync($request->permissions);
        return $this->showOne($role);
    }

    public function show($id)
    {
        return $this->showOne(Role::findOrFail($id));
    }

    public function update(RoleUpdateFormRequest $request, $id)
    {
        $role =  Role::findOrFail($id);
        $role->name = $request->name;
        $role->save();
        $role->permissions()->sync($request->permissions);
        return $this->showOne($role);
    }

    public function destroy($id)
    {
        $role =  role::findOrFail($id);
        $role->delete();
        return $this->showMessage('deleted');
    }
}
