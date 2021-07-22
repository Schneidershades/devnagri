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
        $levels = Level::all();
        return view('pages.levels.index')->with('levels', $levels);
    }

    public function create()
    {
        return view('pages.levels.create');
    }

    public function store(LevelCreateFormRequest $request)
    {
        $role =  new Level;
        $role->name = $request->name;
        $role->rank = $request->rank;
        $role->save();
        Session::flash('success', 'role was sucessfully created');
        return redirect()->route('levels.index');
    }

    public function show($id)
    {
        $role =  Level::findOrFail($id);
        return view('pages.levels.show')->with('role', $role);
    }

    public function edit($id)
    {
        $role =  Level::findOrFail($id);
        return view('pages.levels.edit')->with('role', $role);
    }

    public function update(LevelUpdateFormRequest $request, $id)
    {
        $role =  Level::findOrFail($id);
        $role->name = $request->name;
        $role->rank = $request->rank;
        $role->save();
        Session::flash('success', 'role was sucessfully updated');
        return redirect()->route('levels.index');
    }

    public function destroy($id)
    {
        $role =  role::findOrFail($id);
        $role->delete();
        Session::flash('success', 'role was sucessfully deleted');
        return redirect()->route('levels.index');
    }
}
