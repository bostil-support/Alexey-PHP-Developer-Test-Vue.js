<?php

namespace App\Http\Controllers;

use Illuminate\Contracts\View\View;

class ClientController extends Controller
{
    public function __invoke(): View
    {
        return view('welcome', ['filter' => config('filter')]);
    }
}
