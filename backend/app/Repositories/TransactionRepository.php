<?php

namespace App\Repositories;

use App\Models\Transaction;
use App\Repositories\TransactionRepositoryInterface;

class TransactionRepository implements TransactionRepositoryInterface
{
    public function getAll()
    {
        return Transaction::all();
    }

    public function find($id)
    {
        return Transaction::findOrFail($id);
    }

    public function create(array $data)
    {
        return Transaction::create($data);
    }

    public function update(Transaction $transaction, array $data)
    {
        $transaction->update($data);
        return $transaction;
    }

    public function delete($id)
    {
        $transaction = $this->find($id);
        return $transaction->delete();
    }
}
