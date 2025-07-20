<?php

namespace App\Interfaces;

interface BoardingHouseRepositoryInterface
{
    /**
     * Get all boarding houses.
     *
     * @return \Illuminate\Database\Eloquent\Collection
     */
    public function getAllBoardingHouses($search = null, $city = null, $category = null);

    public function getPopularBoardingHouses($limit = 5);

    public function getBoardingHouseByCitySlug($slug);

    public function getBoardingHouseByCategorySlug($slug);

    public function getBoardingHouseBySlug($slug);

    /**
     * Find a boarding house by its ID.
     *
     * @param int $id
     * @return \App\Models\BoardingHouse|null
     */
    public function findBoardingHouseById(int $id);

    /**
     * Create a new boarding house.
     *
     * @param array $data
     * @return \App\Models\BoardingHouse
     */
    public function createBoardingHouse(array $data);

    /**
     * Update an existing boarding house.
     *
     * @param int $id
     * @param array $data
     * @return \App\Models\BoardingHouse
     */
    public function updateBoardingHouse(int $id, array $data);

    /**
     * Delete a boarding house by its ID.
     *
     * @param int $id
     * @return bool
     */
    public function deleteBoardingHouse(int $id);
}