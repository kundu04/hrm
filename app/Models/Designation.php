<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Designation extends Model
{
    use HasFactory;
    public function relUser()
    {
        return $this->hasMany(User::class,'designation_id','id');
    }
    public function relDepartment()
    {
        return $this->belongsTo(Department::class,'department_id','id');
    }
}
