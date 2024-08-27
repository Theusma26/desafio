<?php

namespace App\Services;

use App\Repositories\TransactionRepositoryInterface;

class TransactionService
{
    private $transactionRepository;

    public function __construct(TransactionRepositoryInterface $transactionRepository)
    {
        $this->transactionRepository = $transactionRepository;
    }

    public function getAllTransactions()
    {
        return $this->transactionRepository->getAll();
    }

    public function getTransactionById($id)
    {
        return $this->transactionRepository->find($id);
    }

    public function createTransaction(array $data)
    {
        return $this->transactionRepository->create($data);
    }

    public function updateTransaction($id, array $data)
    {
        $transaction = $this->transactionRepository->find($id);
        return $this->transactionRepository->update($transaction, $data);
    }

    public function deleteTransaction($id)
    {
        $this->transactionRepository->delete($id);
    }
}
