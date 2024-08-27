<?php

namespace App\Http\Controllers;

use App\Services\TransactionTypeService;
use Illuminate\Http\Request;

class TransactionTypeController
{
    private $transactionTypeService;

    public function __construct(TransactionTypeService $transactionTypeService)
    {
        $this->transactionTypeService = $transactionTypeService;
    }

    public function index()
    {
        try {
            $transactionTypes = $this->transactionTypeService->getAllTransactionTypes();
            return response()->json($transactionTypes, 200);
        } catch (\Exception $e) {
            return response()->json(['error' => $e->getMessage()], 500);
        }
    }

    public function show($id)
    {
        try {
            $transactionType = $this->transactionTypeService->getTransactionTypeById($id);
            return response()->json($transactionType, 200);
        } catch (\Exception $e) {
            return response()->json(['error' => $e->getMessage()], 500);
        }
    }

    public function store(Request $request)
    {
        try {
            $transactionType = $this->transactionTypeService->createTransactionType($request->all());
            return response()->json(['message' => 'TransactionType created successfully', 'transactionType' => $transactionType], 201);
        } catch (\Exception $e) {
            return response()->json(['error' => $e->getMessage()], 500);
        }
    }

    public function update(Request $request, $id)
    {
        try {
            $transactionType = $this->transactionTypeService->updateTransactionType($id, $request->all());
            return response()->json(['message' => 'TransactionType updated successfully', 'transactionType' => $transactionType], 200);
        } catch (\Exception $e) {
            return response()->json(['error' => $e->getMessage()], 500);
        }
    }

    public function destroy($id)
    {
        try {
            $this->transactionTypeService->deleteTransactionType($id);
            return response()->json(['message' => 'TransactionType deleted successfully'], 200);
        } catch (\Exception $e) {
            return response()->json(['error' => $e->getMessage()], 500);
        }
    }
}
