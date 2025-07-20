<?php

namespace App\Repositories;

use App\Interfaces\CityRepositoryInterface;
use App\Models\City;

class CityRepository implements CityRepositoryInterface
{
    /**
     * Get all cities.
     *
     * @return \Illuminate\Database\Eloquent\Collection
     */
    public function getAllCities()
    {
        return City::all();
    }

    /**
     * Find a city by its ID.
     *
     * @param int $id
     * @return City|null
     */
    public function findCityById(int $id)
    {
        return City::find($id);
    }
}