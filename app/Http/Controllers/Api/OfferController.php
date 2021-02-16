<?php

namespace App\Http\Controllers\Api;

use App\Filters\OfferFilter;
use App\Http\Controllers\Controller;
use App\Http\Requests\OfferListRequest;
use App\Http\Resources\Api\OfferResource;
use App\Imports\OffersImport;
use App\Models\Offer;
use Excel;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;
use Illuminate\Http\Response;

class OfferController extends Controller
{
    public function index(OfferListRequest $request): AnonymousResourceCollection
    {
        return OfferResource::collection(
            Offer::filter(new OfferFilter($request))
                ->paginate(25)
        );
    }

    public function import(Request $request): Response
    {
        Excel::import(new OffersImport, $request->file('file'));

        return response()->noContent();
    }
}
