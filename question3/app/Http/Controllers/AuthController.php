<?php

namespace App\Http\Controllers;

use App\Http\Requests\LoginRequest;
use App\Http\Requests\RegisterRequest;
use App\Services\AuthService;

class AuthController extends Controller
{
    protected $authService;

    public function __construct(AuthService $authService) {
        $this->authService = $authService;
    }

    public function login(LoginRequest $request)
    {
        $result = $this->authService->login(...$request->all(['email', 'password']));
        $json = [
            'success' => $result->success,
        ];
        if ($result->message != null) $json['message'] = $result->message;
        if ($result->data != null) $json['data'] = $result->data;
        return response()->json($json);
    }

    public function register(RegisterRequest $request)
    {
        $result = $this->authService->register(...$request->all(['name', 'email', 'password']));
        $json = [
            'success' => $result->success,
        ];
        if ($result->message != null) $json['message'] = $result->message;
        if ($result->data != null) $json['data'] = $result->data;
        return response()->json($json);
    }

    public function profile()
    {
        return response()->json($this->authService->profile());
    }
}
