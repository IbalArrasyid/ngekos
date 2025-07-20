<?php

namespace App\Interfaces;

interface CityRepositoryInterface
{
    /**
     * Get all cities.
     *
     * @return \Illuminate\Database\Eloquent\Collection
     */
    public function getAllCities();

    /**
     * Find a city by its ID.
     *
     * @param int $id
     * @return \App\Models\City|null
     */
    public function findCityById(int $id);
}

