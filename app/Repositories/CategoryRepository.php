<?php

namespace App\Repositories;
use App\Interfaces\CategoryRepositoryInterface;
use App\Models\Category;

class CategoryRepository implements CategoryRepositoryInterface
{
    /**
     * Get all categories.
     *
     * @return \Illuminate\Database\Eloquent\Collection
     */
    public function getAllCategories()
    {
        return Category::all();
    }

    /**
     * Find a category by its ID.
     *
     * @param int $id
     * @return Category|null
     */
    public function findCategoryById(int $id)
    {
        return Category::find($id);
    }

    /**
     * Create a new category.
     *
     * @param array $data
     * @return Category
     */
    public function createCategory(array $data)
    {
        return Category::create($data);
    }

    /**
     * Update an existing category.
     *
     * @param int $id
     * @param array $data
     * @return Category
     */
    public function updateCategory(int $id, array $data)
    {
        $category = $this->findCategoryById($id);
        if ($category) {
            $category->update($data);
            return $category;
        }
        return null;
    }

    /**
     * Delete a category by its ID.
     *
     * @param int $id
     * @return bool
     */
    public function deleteCategory(int $id)
    {
        $category = $this->findCategoryById($id);
        if ($category) {
            return $category->delete();
        }
        return false;
    }
}