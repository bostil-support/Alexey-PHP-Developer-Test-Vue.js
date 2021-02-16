<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class OfferListRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'name' => 'sometimes|required|string',
            'price' => 'sometimes|required|array|size:2',
            'bedrooms' => 'sometimes|required|array',
            'bathrooms' => 'sometimes|required|array',
            'storeys' => 'sometimes|required|array',
            'garages' => 'sometimes|required|array',
        ];
    }

    public function authorize(): bool
    {
        return true;
    }
}
