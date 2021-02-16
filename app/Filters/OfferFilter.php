<?php


namespace App\Filters;


class OfferFilter extends QueryFilter
{
    public function name(string $name)
    {
        $this->builder->where('name', 'like', "%$name%");
    }

    public function bedrooms(array $bedrooms)
    {
        $this->builder->whereIn('bedrooms', $bedrooms);
    }

    public function bathrooms(array $bathrooms)
    {
        $this->builder->whereIn('bathrooms', $bathrooms);
    }

    public function storeys(array $storeys)
    {
        $this->builder->whereIn('storeys', $storeys);
    }

    public function garages(array $garages)
    {
        $this->builder->whereIn('garages', $garages);
    }

    public function price(array $price)
    {
        $this->builder->whereBetween('price', $price);
    }
}
