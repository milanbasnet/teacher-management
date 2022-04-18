<?php

namespace App\Http\Repository;

use App\Models\Module;

class ModuleRepository
{
    public function findById($id)
    {
        return Module::find($id);
    }
    public function getFacultyPaginate($paginate)
    {
        return Module::with('faculty')->orderBy('created_at', 'desc')->paginate($paginate);
    }

    public function store($request)
    {
        return Module::Create([ 
            'faculty_id' => $request->faculty_id,
            'name' => $request->name,
        ]);
    }
    public function update($request, $id)
    {
        $data = Module::findOrFail($id);
        $data->faculty_id = $request->faculty_id;
        $data->name = $request->name;
        return $data->update();
    }

    public function destroy($id)
    {
        return Module::findOrFail($id)->delete();
    }

    public function getmoduleByFacultyId()
    {
        return Module::where('faculty_id', request()->faculty)->get();    
    }
}
