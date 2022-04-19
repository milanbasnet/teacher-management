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
    public function setModuleAttribute($value)
    {
        $this->attributes['module'] = json_encode($value);
    }
    public function getModuleAttribute($value)
    {
        $modules = json_decode($value, true);
        return Module::whereIn('id', $modules)->get()->toArray();
    }
    protected $casts = [
      'dob' => 'datetime:Y-m-d H:00',
    ];
    public function facultyName()
    {
      return  $this->belongsTo(Faculty::class, 'faculty');
    }

    public static function getProfiles()
    {
      $records = TeacherProfile::select('id', 'name', 'gender', 'phone', 'email', 'address', 'nation', 'dob', 'faculty', 'module')->get()->toArray();
      return $records;
    }
}
