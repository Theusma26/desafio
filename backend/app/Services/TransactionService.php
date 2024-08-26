<?php

namespace App\Services;

use App\Repositories\TransactionRepositoryInterface;
use App\Domain\Transaction\Transaction;

class TransactionService
{
    private $transactionRepository;

    public function __construct(TransactionRepositoryInterface $transactionRepository)
    {
        $this->transactionRepository = $transactionRepository;
    }

    public function createTransaction($description, $amount, $type, $categoria, $transaction_date)
    {
        $transaction = new Transaction(null, $description, $amount, $type, $categoria, $transaction_date);
        $this->transactionRepository->save($transaction);
    }

    public function getAllTransactions()
    {
        return $this->transactionRepository->getAll();
    }
}
