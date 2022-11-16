<?php

namespace App\Http\Controllers;

use App\Http\Requests\AuthRequest;
use App\Http\Requests\RegistrationRequest;
use App\Models\User;
use App\Services\Contracts\AuthService;
use http\Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthentificateController extends Controller
{


    public function __construct(
        private readonly AuthService $service,
    )
    {
    }
    //
    public function registration(RegistrationRequest $request){
        return $this->service->registration($request);
    }

    public function login(AuthRequest $request){
        return $this->service->login($request);
    }

    public function logout(){
        return $this->service->logout();
    }

}
