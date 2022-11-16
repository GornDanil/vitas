<?php

namespace App\Services\Contracts;


use App\Http\Requests\AuthRequest;
use App\Http\Requests\RegistrationRequest;
use Illuminate\View\View;

interface AuthService
{
    public function registration(RegistrationRequest $request);
    public function login(AuthRequest $request);
    public function logout();
}
