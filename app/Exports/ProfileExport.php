<?php

namespace App\Exports;

use App\Models\TeacherProfile;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;


class ProfileExport implements FromCollection, WithHeadings
{
    public function headings():array{
        return[
            'id',
            'name',
            'gender',
            'phone',
            'email',
            'address',
            'nation',
            'dob',
            'faculty',
            'module'
        ];
    }
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        // return TeacherProfile::all();
        return collect(TeacherProfile::getProfiles());
    }
}
