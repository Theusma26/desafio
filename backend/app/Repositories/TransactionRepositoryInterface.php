<?php

namespace App\Repositories;

use App\Domain\Transaction\Transaction;

interface TransactionRepositoryInterface
{
    public function save(Transaction $transaction);
    public function findById($id);
    public function delete($id);
    public function getAll();
}
