<?php

namespace App\Repositories\TransactionType;

use App\Models\TransactionType;

interface TransactionTypeRepositoryInterface
{
    public function getAll();
    public function find($id);
    public function create(array $data);
    public function update(TransactionType $transactionType, array $data);
    public function delete($id);
}
