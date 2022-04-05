<?php

namespace App\Services;

use App\Helper\UserServiceResult;
use App\Repositories\interface\UserRepositoryInterface;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthService
{
    protected $userRepository;

    public function __construct(UserRepositoryInterface $userRepository)
    {
        $this->userRepository = $userRepository;
    }

    /**
     * @param string $email
     * @param string $password
     *
     * @return UserServiceResult
     */
    public function login($email, $password)
    {
        $token = Auth::attempt(['email' => $email, 'password' => $password]);
        if ($token) return (new UserServiceResult(true, null, [
            'token' => $token,
            'token_type' => 'bearer',
            'expires_in' => auth()->factory()->getTTL() * 60
        ]));
        return (new UserServiceResult(false, 'Email and password incorrect'));
    }

    /**
     * @param string $name
     * @param string $email
     * @param string $password
     *
     * @return UserServiceResult
     */
    public function register($name, $email, $password)
    {
        if ($this->userRepository->findWithEmail($email)->count() == 0) {
            $this->userRepository->create($name, $email, Hash::make($password));
            return (new UserServiceResult(true));
        }
        return (new UserServiceResult(false, 'User with input email already exist'));
    }

    public function profile()
    {
        return Auth::user();
    }
}
