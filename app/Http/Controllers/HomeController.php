<?php

namespace App\Http\Controllers;

use App\Interfaces\BoardingHouseRepositoryInterface;
use App\Interfaces\CategoryRepositoryInterface;
use App\Interfaces\CityRepositoryInterface;
use App\Models\Category;
use App\Models\City;
use App\Models\BoardingHouse;
use Illuminate\Http\Request;

class HomeController extends Controller
{

    private CityRepositoryInterface $cityRepository;
    private CategoryRepositoryInterface $categoryRepository;
    private BoardingHouseRepositoryInterface $boardingHouseRepository;

    public function __construct(
        CityRepositoryInterface $cityRepository,
        CategoryRepositoryInterface $categoryRepository,
        BoardingHouseRepositoryInterface $boardingHouseRepository
    )
    {
        $this->cityRepository = $cityRepository;
        $this->categoryRepository = $categoryRepository;
        $this->boardingHouseRepository = $boardingHouseRepository;
    }

    public function index()
    {
        $categories = $this->categoryRepository->getAllCategories();
        $popularBoardingHouses = $this->boardingHouseRepository->getPopularBoardingHouses(); // Assuming you want to show 5 popular boarding houses
        $cities = $this->cityRepository->getAllCities();
        $boardingHouses = $this->boardingHouseRepository->getAllBoardingHouses(); // Assuming you want to show all boarding houses

        return view('pages.home', compact('categories', 'popularBoardingHouses', 'cities', 'boardingHouses'));
    }

    /**
     * Handle a request to search for boarding houses.
     *
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function searchBoardingHouses(Request $request)
    {
        // Logic to handle search requests
        // This could involve calling a repository method to fetch results based on the request parameters
        return response()->json(['message' => 'Search results']);
    }
}
