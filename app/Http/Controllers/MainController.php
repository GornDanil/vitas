<?php

namespace App\Http\Controllers;

use App\Services\MainService;


class MainController extends Controller
{
    public function __construct(
        private readonly MainService $service,
    )
    {
    }


    public function home()
    {
        return $this->service->home();
    }

}
