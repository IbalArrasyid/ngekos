<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Interfaces\BoardingHouseRepositoryInterface;
use App\Interfaces\CategoryRepositoryInterface;
use App\Interfaces\CityRepositoryInterface;

class BoardingHouseController extends Controller
{
    private BoardingHouseRepositoryInterface $boardingHouseRepository;
    private CategoryRepositoryInterface $categoryRepository;
    private CityRepositoryInterface $cityRepository;

    public function __construct(
        BoardingHouseRepositoryInterface $boardingHouseRepository,
        CategoryRepositoryInterface $categoryRepository,
        CityRepositoryInterface $cityRepository
    ) {
        $this->boardingHouseRepository = $boardingHouseRepository;
        $this->categoryRepository = $categoryRepository;
        $this->cityRepository = $cityRepository;
    }
    public function find()
    {

        $categories = $this->categoryRepository->getAllCategories();
        $cities = $this->cityRepository->getAllCities();
        $boardingHouses = $this->boardingHouseRepository->getAllBoardingHouses(); // Assuming you want to show all boarding houses
        // Logic to find boarding houses
        // This could involve fetching data from a repository or service
        return view('pages.boarding-house.find', compact('categories', 'cities')); // Assuming you have a view for finding boarding houses
    }

    public function findResults(Request $request)
    {
        // Logic to handle the search results
        // This could involve validating the request and fetching results from a repository or service
        $boardingHouses = $this->boardingHouseRepository->getAllBoardingHouses($request->search, $request->city, $request->category);

        return view('pages.boarding-house.index', compact('boardingHouses')); // Assuming you have a view for displaying search results
    }
}
