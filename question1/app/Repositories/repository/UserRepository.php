<?php

namespace App\Repositories\repository;

use App\Models\User;
use App\Repositories\interface\UserRepositoryInterface;

class UserRepository implements UserRepositoryInterface
{
    /**
     * @var User $model
     */
    protected $model;

    public function __construct(User $user) {
        $this->model = $user;
    }

    public function findWithEmail($email)
    {
        return $this->model->where('email', $email)->get();
    }

    public function create($name, $email, $password)
    {
        return $this->model->create([
            'name'=> $name,
            'email'=> $email,
            'password'=> $password
        ]);
    }
}
