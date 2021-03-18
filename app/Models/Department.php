<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Department extends Model
{
    use HasFactory;
    public function relUser()
    {
        return $this->hasMany(User::class,'department_id','id');
    }
    public function relDesignation()
    {
        return $this->hasMany(Designation::class,'department_id','id');
    }
}
