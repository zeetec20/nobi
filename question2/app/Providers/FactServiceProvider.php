<?php

namespace App\Providers;

use App\Repositories\interface\FactRepositoryInterface;
use App\Repositories\repository\FactRepository;
use Illuminate\Support\ServiceProvider;

class FactServiceProvider extends ServiceProvider
{
    public $bindings = [
        FactRepositoryInterface::class => FactRepository::class,
    ];
}
