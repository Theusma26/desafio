<?php

namespace App\Repositories\TransactionType;

use App\Models\TransactionType;
use App\Repositories\TransactionType\TransactionTypeRepositoryInterface;

class TransactionTypeRepository implements TransactionTypeRepositoryInterface
{
    public function getAll()
    {
        return TransactionType::all();
    }

    public function find($id)
    {
        return TransactionType::find($id);
    }

    public function create(array $data)
    {
        return TransactionType::create($data);
    }

    public function update(TransactionType $transactionType, array $data)
    {
        $transactionType->update($data);
        return $transactionType;
    }

    public function delete($id)
    {
        $transactionType = $this->find($id);
        return $transactionType->delete();
    }

}
