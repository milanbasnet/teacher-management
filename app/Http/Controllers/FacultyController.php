<?php

namespace App\Http\Controllers;

use App\Http\Requests\FacultyRequest;
use App\Http\Repository\FacultyRepository;

class FacultyController extends Controller
{
    private $facultyRepository;
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct()
    {
        $this->facultyRepository = new FacultyRepository;
    }

    public function index()
    {
        $faculties = $this->facultyRepository->getFacultyPaginate(20);
        return view('backend.faculty.index', compact('faculties'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backend.faculty.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(FacultyRequest $request)
    {
        try {
            $this->facultyRepository->store($request);
        } catch (\Throwable $th) {
            return back()->with('error_message', $th->getMessage());
        }
        return redirect()->route('faculty.index')->with('success_message', 'Faculty Created Sussessfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
       
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $faculty = $this->facultyRepository->findById($id);
        return view('backend.faculty.edit', compact('faculty'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(FacultyRequest $request, $id)
    {
        try {
            $this->facultyRepository->update($request, $id);
        } catch (\Throwable $th) {
            return back()->with('error_message', $th->getMessage());
        }
        return redirect()->route('faculty.index')->with('success_message', 'Faculty Updated Sussessfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        try {
            $this->facultyRepository->destroy( $id);
        } catch (\Throwable $th) {
            return back()->with('error_message', $th->getMessage());
        }
        return redirect()->route('faculty.index')->with('success_message', 'Faculty Deleted Sussessfully');
    }
}
