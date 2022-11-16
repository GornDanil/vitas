<?php

namespace App\Services;


use App\Http\Requests\PasteRequest;
use App\Models\Lang;
use App\Models\Paste;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Routing\Redirector;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;

class PasteService implements Contracts\PasteService
{
    public function myPastes(): View
    {
        $userPastes = Paste::query()->orderByDesc('created_at')
            ->with('user')
            ->where('user_id', Auth::id())
            ->paginate(5);
        return view('my-pastes', ['userPastes'=>$userPastes]);
    }

    public function newPaste(): View
    {
        $langs = Lang::query()->orderBy('id')->get();
        return view('new-paste', ['langs' => $langs]);
    }

    /** @return   Application|RedirectResponse|Redirector */
    public function newPastePost(PasteRequest $request): Application|RedirectResponse|Redirector
    {
        $paste = new Paste();
        $slug = Str::slug($request['title']);
        $paste->create([
            'user_id' => Auth::id() !== null ? Auth::id() : null,
            'title' => $request['title'],
            'lang_id' => $request['lang'],
            'code' => $request['code'],
            'access_mode' => $request['access_mode'],
            'slug' => $slug,
            'expiration_time' => $request['expiration_time'],
        ]);




        return redirect('/');
    }

    public function showPaste($slug, $id): View
    {
        $paste = new Paste();
        return view('paste', ['paste'=>$paste->find($id)]);
    }
}
