<?php

namespace App\Http\Controllers;

use App\Http\Requests\PasteRequest;
use App\Models\Lang;
use App\Models\Paste;
use App\Services\PasteService;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Routing\Redirector;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;

class PasteController extends Controller
{
    //
    /** @return  View */

    public function __construct(
        private readonly PasteService $service,
    )
    {
    }

    public function myPastes(): View
    {
        return $this->service->myPastes();
    }

    public function newPaste(): View
    {
        return $this->service->newPaste();
    }

    /** @return   Application|RedirectResponse|Redirector */
    public function newPastePost(PasteRequest $request): Application|RedirectResponse|Redirector
    {
        return $this->service->newPastePost($request);
    }

    public function showPaste($slug, $id): View
    {
       return $this->service->showPaste($slug, $id);
    }

}
