<?php

namespace App\Services\Contracts;


use App\Http\Requests\PasteRequest;
use App\Http\Requests\RegistrationRequest;
use Illuminate\View\View;

interface PasteService
{
    public function myPastes();
    public function newPaste();
    public function newPastePost(PasteRequest $request);
    public function showPaste($slug, $id);
}
