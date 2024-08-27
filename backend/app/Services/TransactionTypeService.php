<?php

namespace App\Services;

use App\Repositories\TransactionType\TransactionTypeRepositoryInterface;

class TransactionTypeService
{
    private $transactionTypeRepository;

    public function __construct(TransactionTypeRepositoryInterface $transactionTypeRepository)
    {
        $this->transactionTypeRepository = $transactionTypeRepository;
    }

    public function getAllTransactionTypes()
    {
        return $this->transactionTypeRepository->getAll();
    }

    public function getTransactionTypeById($id)
    {
        return $this->transactionTypeRepository->find($id);
    }

    public function createTransactionType(array $data)
    {
        return $this->transactionTypeRepository->create($data);
    }

    public function updateTransactionType($id, array $data)
    {
        $transactionType = $this->transactionTypeRepository->find($id);
        return $this->transactionTypeRepository->update($transactionType, $data);
    }

    public function deleteTransactionType($id)
    {
        $this->transactionTypeRepository->delete($id);
    }
}
