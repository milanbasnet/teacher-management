<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\ModuleRequest;
use App\Http\Repository\ModuleRepository;
use App\Http\Repository\FacultyRepository;

class ModuleController extends Controller
{
    private $moduleRepository;
    private $facultyRepository;
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct()
    {
        $this->moduleRepository = new ModuleRepository;
        $this->facultyRepository = new FacultyRepository;
    }
 
    public function index()
    {
        $modules = $this->moduleRepository->getFacultyPaginate(20);
        return view('backend.module.index', compact('modules'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $faculties = $this->facultyRepository->getAll();
        return view('backend.module.create', compact('faculties'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ModuleRequest $request)
    {
        try {
            $this->moduleRepository->store($request);
        } catch (\Throwable $th) {
            return back()->with('error_message', $th->getMessage());
        }
        return redirect()->route('module.index')->with('success_message', 'Module Created Sussessfully');
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
        $faculties = $this->facultyRepository->getAll();
        $module = $this->moduleRepository->findById($id);
        return view('backend.module.edit', compact('module', 'faculties'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(ModuleRequest $request, $id)
    {
        try {
            $this->moduleRepository->update($request, $id);
        } catch (\Throwable $th) {
            return back()->with('error_message', $th->getMessage());
        }
        return redirect()->route('module.index')->with('success_message', 'Module Updated Sussessfully');
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
            $this->moduleRepository->destroy( $id);
        } catch (\Throwable $th) {
            return back()->with('error_message', $th->getMessage());
        }
        return redirect()->route('module.index')->with('success_message', 'Module Deleted Sussessfully');
    }

    public function getmodule()
    {
        return response($this->moduleRepository->getmoduleByFacultyId());
    }
}
