<?php

namespace App\Domain\Transaction;

class Transaction
{
    public $id;
    public $description;
    public $amount;
    public $type;
    public $categoria;
    public $transaction_date;

    public function __construct($id, $description, $amount, $type, $categoria, $transaction_date)
    {
        $this->id = $id;
        $this->description = $description;
        $this->amount = $amount;
        $this->type = $type;
        $this->categoria = $categoria;
        $this->transaction_date = $transaction_date;
    }
}
