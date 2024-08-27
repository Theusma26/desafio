<?php

namespace App\Repositories;

use App\Models\Transaction;

interface TransactionRepositoryInterface
{
    public function getAll();
    public function find($id);
    public function create(array $data);
    public function update(Transaction $transaction, array $data);
    public function delete($id);
}
