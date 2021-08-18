<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Attendance extends Model
{
    protected $fillable=[
        'user_id',
        'date',
        'in_time',
        'out_time',
        'status',
    ];
    use HasFactory;
    public function relUser()
    {
        return $this->belongsTo(User::class,'user_id','id');
    }
}
