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
    // public function map($user)
    // {
    //     return [
    //         $user->gender == 1 ? 'Male' : 'Female',
    //     ];
    // }
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return collect(TeacherProfile::getProfiles());
    }
}
