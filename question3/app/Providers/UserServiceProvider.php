<?php

namespace App\Providers;

use App\Models\User;
use \App\Repositories\interface\UserRepositoryInterface;
use \App\Repositories\repository\UserRepository;
use Illuminate\Support\ServiceProvider;

class UserServiceProvider extends ServiceProvider
{
    public $bindings = [
        UserRepositoryInterface::class => UserRepository::class,
    ];
}
