<?php

namespace App\Http\Controllers;

use App\Services\TransactionService;
use Illuminate\Http\Request;

class TransactionController
{
    private $transactionService;

    public function __construct(TransactionService $transactionService)
    {
        $this->transactionService = $transactionService;
    }

    public function store(Request $request)
    {
        $this->transactionService->createTransaction(
            $request->description,
            $request->amount,
            $request->type,
            $request->categoria,
            $request->transaction_date
        );
        return response()->json(['message' => 'Transaction created successfully']);
    }

    public function index()
    {
        return response()->json($this->transactionService->getAllTransactions());
    }
}
