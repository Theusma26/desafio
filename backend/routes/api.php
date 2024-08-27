<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TransactionController;
use App\Http\Controllers\TransactionTypeController;

// Transaction
Route::get('/transactions', [TransactionController::class, 'index']);
Route::get('/transactions/{id}', [TransactionController::class, 'show']);
Route::post('/transactions', [TransactionController::class, 'store']);
Route::put('/transactions/{id}', [TransactionController::class, 'update']);
Route::delete('/transactions/{id}', [TransactionController::class, 'destroy']);


// Transaction type
Route::get('/transaction-types', [TransactionTypeController::class, 'index']);
Route::get('/transaction-types/{id}', [TransactionTypeController::class, 'show']);
Route::post('/transaction-types', [TransactionTypeController::class, 'store']);
Route::put('/transaction-types/{id}', [TransactionTypeController::class, 'update']);
Route::delete('/transaction-types/{id}', [TransactionTypeController::class, 'destroy']);