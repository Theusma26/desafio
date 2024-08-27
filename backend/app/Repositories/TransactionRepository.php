<?php

namespace App\Repositories;

use App\Models\Transaction;
use App\Models\TransactionType;
use App\Repositories\TransactionRepositoryInterface;

class TransactionRepository implements TransactionRepositoryInterface
{
    public function getAll()
    {
        return Transaction::with('transactionType')->get();
    }

    public function find($id)
    {
        return Transaction::with('transactionType')->findOrFail($id);
    }

    public function create(array $data)
    {
        $this->validateTransactionType($data['transaction_type_id']);
        return Transaction::create($data);
    }

    public function update(Transaction $transaction, array $data)
    {
        $this->validateTransactionType($data['transaction_type_id']);
        $transaction->update($data);
        return $transaction;
    }

    public function delete($id)
    {
        $transaction = $this->find($id);
        return $transaction->delete();
    }

    private function validateTransactionType($transactionTypeId)
    {
        if (!TransactionType::find($transactionTypeId)) {
            throw new \Exception('Invalid transaction type ID');
        }
    }
}
