<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Repositories\Transaction\TransactionRepositoryInterface;
use App\Repositories\Transaction\TransactionRepository;
use App\Repositories\TransactionType\TransactionTypeRepositoryInterface;
use App\Repositories\TransactionType\TransactionTypeRepository;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        $this->app->bind(TransactionRepositoryInterface::class, TransactionRepository::class);
        $this->app->bind(TransactionTypeRepositoryInterface::class, TransactionTypeRepository::class);
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        //
    }
}
