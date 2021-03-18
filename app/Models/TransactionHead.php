<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TransactionHead extends Model
{
    use HasFactory;
    public function relTransaction()
    {
        return $this->hasMany(Transaction::class,'transaction_head_id','id');
    }
}
