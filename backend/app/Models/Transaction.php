<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Transaction extends Model
{
    protected $fillable = ['description', 'amount', 'transaction_type_id', 'transaction_date'];

    public function transactionType()
    {
        return $this->belongsTo(TransactionType::class);
    }
}
