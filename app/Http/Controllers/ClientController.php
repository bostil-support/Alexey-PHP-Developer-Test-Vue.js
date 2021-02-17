<?php

namespace App\Http\Controllers;

use App\Models\Offer;
use Illuminate\Contracts\View\View;
use Illuminate\Support\Facades\DB;

class ClientController extends Controller
{
    public function __invoke(): View
    {
        $offersTable = app(Offer::class)->getTable();
        $filter = config('filter');
        $filter['min_price'] = DB::table($offersTable)->min('price');
        $filter['max_price'] = DB::table($offersTable)->max('price');
        return view('welcome', compact('filter'));
    }
}
