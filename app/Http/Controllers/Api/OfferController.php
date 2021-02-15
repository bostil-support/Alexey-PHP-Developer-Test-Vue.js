<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\Api\OfferResource;
use App\Models\Offer;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;

class OfferController extends Controller
{
    public function index(): AnonymousResourceCollection
    {
        return OfferResource::collection(Offer::all());
    }
}
