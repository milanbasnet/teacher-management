<?php

namespace App\Http\Repository;

use App\Models\Faculty;


class FacultyRepository
{
    public function findById($id)
    {
        return Faculty::find($id);
    }
    public function getFacultyPaginate($paginate)
    {
        return Faculty::orderBy('created_at', 'desc')->paginate($paginate);
    }
    public function getAll()
    {
        return Faculty::orderBy('created_at', 'desc')->get();
    }

    public function store($request)
    {
        return Faculty::Create([ 
            'name' => $request->name,
        ]);
    }
    public function update($request, $id)
    {
        $data = Faculty::findOrFail($id);
        $data->name = $request->name;
        return $data->update();
    }

    public function destroy($id)
    {
        return Faculty::findOrFail($id)->delete();
    }
}
