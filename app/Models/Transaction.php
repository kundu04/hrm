<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Transaction extends Model
{
    use HasFactory;
    public function relTransactionHead()
    {
        return $this->belongsTo(TransactionHead::class,'transaction_head_id','id');
    }
    public function relUser()
    {
        return $this->belongsTo(User::class,'client','id');
    }
}
