<?php

namespace App\Imports;

use App\Models\Offer;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class OffersImport implements ToModel, WithHeadingRow
{

    public function model(array $row): Offer
    {
        return new Offer(
            [
                'name' => $row['name'],
                'price' => $row['price'],
                'bedrooms' => $row['bedrooms'],
                'bathrooms' => $row['bathrooms'],
                'storeys' => $row['storeys'],
                'garages' => $row['garages'],
            ]
        );
    }
}
