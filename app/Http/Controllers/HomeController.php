<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Excel;
use App\Exports\ProfileExport;
use App\Models\TeacherProfile;
use App\Http\Requests\ProfileRequest;
use App\Http\Repository\FacultyRepository;

class HomeController extends Controller
{
    private $facultyRepository;

    public function __construct()
    {
        $this->facultyRepository = new FacultyRepository;
    }
    public function index()
    {
        $profiles = TeacherProfile::with('facultyName')->orderBy('created_at', 'desc')->paginate(20);
        return view('home', compact('profiles'));
    }
    public function createProfile()
    {
        $faculties = $this->facultyRepository->getAll();
        return view('profile_create', compact('faculties'));
    }
    public function storeProfile(ProfileRequest $request)
    {
        TeacherProfile::create([
            'name' => $request->name,
            'gender' => $request->gender,
            'phone' => $request->phone,
            'email' => $request->email,
            'address' => $request->address,
            'nation' => $request->nation,
            'dob' => $request->dob,
            'faculty' => $request->faculty,
            'module' => $request->module,
        ]);
        return redirect()->route('home')->with('success_message', 'Profile Created Successfully');
    }

    public function exportToCsv()
    {
        return Excel::download(new ProfileExport, 'profiles.csv');
    }
}
