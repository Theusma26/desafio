<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Transaction extends Model
{
    protected $fillable = ['amount', 'type', 'transaction_type_id'];

    public function transactionType()
    {
        return $this->belongsTo(TransactionType::class);
    }
}
