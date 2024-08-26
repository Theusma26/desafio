<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Transaction extends Model
{
    protected $fillable = [
        'description',
        'amount',
        'type',
        'categoria',
        'transaction_date'
    ];

    protected $table = 'transactions';
}
