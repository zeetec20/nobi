<?php

namespace App\Providers;

use App\Repositories\interface\TransactionRepositoryInterface;
use App\Repositories\repository\TransactionRepository;
use Illuminate\Support\ServiceProvider;

class TransactionServiceProvider extends ServiceProvider
{
    public $bindings = [
        TransactionRepositoryInterface::class => TransactionRepository::class,
    ];
}
