<?php

namespace App\Repositories\interface;

use Illuminate\Database\Eloquent\Collection;

interface UserRepositoryInterface
{
    /**
     * @param string $email
     *
     * @return Collection
     */
    public function findWithEmail($email);

    /**
     * @param string $email
     *
     * @return void
     */
    public function create($name, $email, $password);
}
