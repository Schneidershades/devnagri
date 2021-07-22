<?php

namespace App\Http\Controllers\API\V1;

use App\Http\Requests\LevelCreateFormRequest;
use App\Http\Requests\LevelUpdateFormRequest;
use App\Models\Level;
use Session;

class LevelController extends Controller
{
    public function index()
    {
        return $this->showOne(Level::all());
    }

    public function store(LevelCreateFormRequest $request)
    {
        $level =  new Level;
        $level = Role::create($request->validated());
        return $this->showOne($role);
    }

    public function show($id)
    {
        return $this->showOne(Level::findOrFail($id));
    }

    public function update(LevelUpdateFormRequest $request, $id)
    {
        $role =  Level::findOrFail($id);
        return $this->showOne(Role::update($request->validated()));
    }

    public function destroy($id)
    {
        $role =  role::findOrFail($id);
        $role->delete();
        return $this->showMessage('deleted');
    }
}
