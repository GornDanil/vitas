<?php

namespace App\Services;



use App\Models\Paste;
use Illuminate\Support\Facades\Auth;

class MainService implements Contracts\MainService
{
    public function home() {
        $publicPastes = new Paste();


        $userPastes = Paste::query()->orderByDesc('created_at')
            ->with('user')
            ->where('user_id', Auth::id())
            ->take(10)
            ->get();



        return view('home', [
            'publicPastes'=>$publicPastes->orderByDesc('created_at')
                ->with('lang')
                ->where('access_mode', 'public')
                ->take(10)
                ->get(),
            'userPastes'=>$userPastes
        ]);
    }


}
