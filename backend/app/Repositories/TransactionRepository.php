<?php

namespace App\Repositories;

use App\Domain\Transaction\Transaction;
use App\Repositories\TransactionRepositoryInterface;
use App\Models\Transaction as EloquentTransaction;

class TransactionRepository implements TransactionRepositoryInterface
{
    public function save(Transaction $transaction)
    {
        $eloquentTransaction = new EloquentTransaction();
        $eloquentTransaction->description = $transaction->description;
        $eloquentTransaction->amount = $transaction->amount;
        $eloquentTransaction->type = $transaction->type;
        $eloquentTransaction->categoria = $transaction->categoria;
        $eloquentTransaction->transaction_date = $transaction->transaction_date;
        $eloquentTransaction->save();
    }

    public function findById($id)
    {
        return EloquentTransaction::find($id);
    }

    public function delete($id)
    {
        EloquentTransaction::destroy($id);
    }

    public function getAll()
    {
        return EloquentTransaction::all();
    }
}
