<?php

namespace App\Services;



use App\Http\Requests\AuthRequest;
use App\Http\Requests\RegistrationRequest;
use App\Models\User;
use App\Repositories\Contracts\UserRepository;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthService implements Contracts\AuthService
{
    public function __construct(
        private readonly UserRepository $repository,
    )
    {
    }

    public function registration(RegistrationRequest $request) {
        $user = new User();
        $errors = [];
        if($user->where('name', $request['name'])->first()){
            $errors['name'] = 'Пользователь с таким именем существует';
        }
        if($user->where('email', $request['email'])->first()){
            $errors['email'] = 'Пользователь с таким email существует';
        }
        if($request['password'] != $request['password_confirmation']){
            $errors['password'] = 'Пароли не совпадают';
        }
        if(count($errors) > 0){
            return view('registration', ['errors'=>$errors]);
        }

        $request['password'] = Hash::make($request['password']);

        $createUser = $user->create([
            'name' => $request['name'],
            'email' => $request['email'],
            'password' => $request['password'],
        ]);


        Auth::login($createUser);

        return redirect('/');
    }

    public function login(AuthRequest $request){
        $user = new User();
        $user = $user->where('name', $request['name'])->get()->first();
        if($user){
            if(Hash::check($request['password'], $user->password)){
                Auth::login($user);
                return redirect('/');
            }
        }
    }

    public function logout(){
        Auth::logout();
        return redirect('/');
    }
}
