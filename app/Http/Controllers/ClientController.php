<?php

namespace App\Http\Controllers;

use Illuminate\Contracts\View\View;
use Illuminate\Support\Facades\DB;

class ClientController extends Controller
{
    public function __invoke(): View
    {
        $filter = config('filter');
        $filter['min_price'] = DB::table('offers')->min('price');
        $filter['max_price'] = DB::table('offers')->max('price');
        return view('welcome', compact('filter'));
    }
}
