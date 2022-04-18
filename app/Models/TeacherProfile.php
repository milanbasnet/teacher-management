<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TeacherProfile extends Model
{
    use HasFactory;

    protected $fillable = [
        'name', 'gender', 'phone', 'email', 'address', 'nation', 'dob', 'faculty', 'module'
    ];

    protected $casts = [
      'dob' => 'datetime:Y-m-d H:00',
    ];
    public function facultyName()
    {
      return  $this->belongsTo(Faculty::class, 'faculty');
    }
    public function moduleName()
    {
      return  $this->belongsTo(Module::class, 'module');
    }

    public static function getProfiles()
    {
      $records = TeacherProfile::select('id', 'name', 'gender', 'phone', 'email', 'address', 'nation', 'dob', 'faculty', 'module')->get()->toArray();
      return $records;
    }
}
