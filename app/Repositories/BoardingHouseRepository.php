<?php

namespace App\Repositories;
use App\Interfaces\BoardingHouseRepositoryInterface;
use App\Models\BoardingHouse;
use Illuminate\Database\Eloquent\Builder;

class BoardingHouseRepository implements BoardingHouseRepositoryInterface
{
    /**
     * Get all boarding houses.
     *
     * @return \Illuminate\Database\Eloquent\Collection
     */
    public function getAllBoardingHouses($search = null, $city = null, $category = null)
    {
        $query = BoardingHouse::query();

        // Ketika ada parameter pencarian, kota, atau kategori
        if ($search) {
            $query->where('name', 'like', '%' . $search . '%');
        }

        // Ketika ada parameter kota, maka akan mencari berdasarkan slug kota
        if ($city) {
            $query->whereHas('city', function (Builder $query) use ($city) {
                $query->where('slug', $city);
            });
        }

        // Ketika ada parameter kategori, maka akan mencari berdasarkan slug kategori
        if ($category) {
            $query->whereHas('category', function (Builder $query) use ($category) {
                $query->where('slug', $category);
            });
        }

        return $query->get();
    }

    public function getPopularBoardingHouses($limit = 5)
    {
        return BoardingHouse::withCount('transactions')
            ->orderBy('transactions_count', 'desc')
            ->take($limit)
            ->get();
    }

    public function getBoardingHouseByCitySlug($slug)
    {
        return BoardingHouse::whereHas('city', function ($query) use ($slug) {
            $query->where('slug', $slug);
        })->get();
    }

    public function getBoardingHouseByCategorySlug($slug)
    {
        return BoardingHouse::whereHas('category', function ($query) use ($slug) {
            $query->where('slug', $slug);
        })->get();
    }

    public function getBoardingHouseBySlug($slug)
    {
        return BoardingHouse::where('slug', $slug)->first();
    }

    public function findBoardingHouseById(int $id)
    {
        return BoardingHouse::find($id);
    }

    public function createBoardingHouse(array $data)
    {
        return BoardingHouse::create($data);
    }

    public function updateBoardingHouse(int $id, array $data)
    {
        $boardingHouse = $this->findBoardingHouseById($id);
        if ($boardingHouse) {
            $boardingHouse->update($data);
            return $boardingHouse;
        }
        return null;
    }

    public function deleteBoardingHouse(int $id)
    {
        $boardingHouse = $this->findBoardingHouseById($id);
        if ($boardingHouse) {
            return $boardingHouse->delete();
        }
        return false;
    }
}