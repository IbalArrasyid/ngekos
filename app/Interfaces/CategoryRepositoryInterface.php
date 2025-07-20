<?php

namespace App\Interfaces;

interface CategoryRepositoryInterface
{
    /**
     * Get all categories.
     *
     * @return \Illuminate\Database\Eloquent\Collection
     */
    public function getAllCategories();

    /**
     * Find a category by its ID.
     *
     * @param int $id
     * @return \App\Models\Category|null
     */
    public function findCategoryById(int $id);

    /**
     * Create a new category.
     *
     * @param array $data
     * @return \App\Models\Category
     */
    public function createCategory(array $data);

    /**
     * Update an existing category.
     *
     * @param int $id
     * @param array $data
     * @return \App\Models\Category
     */
    public function updateCategory(int $id, array $data);

    /**
     * Delete a category by its ID.
     *
     * @param int $id
     * @return bool
     */
    public function deleteCategory(int $id);
}