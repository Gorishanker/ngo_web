<?php

namespace App\Services;

use App\Models\Category;
use Illuminate\Http\Request;

class CategoryService
{
    /**
     * Create the specified resource.
     *
     * @param Request $request
     * @return Category
     */
    public static function create(array $data)
    {
        $data = Category::create($data);
        return $data;
    }

    /**
     * Update the specified resource in storage.
     *
     * @param Request $request
     * @return bool
     */
    public static function update(array $data, $category_id)
    {
        $data = Category::where('id', $category_id)->update($data);
        return $data;
    }

    /**
     * Update the specified resource in storage.
     *
     * @param Array $data
     * @param  App\Models\Category  $category
     * @return bool
     */
    public static function updateProfile(array $data, Category $category)
    {
        $data = $category->update($data);
        return $data;
    }

    /**
     * Get the specified resource in storage.
     *
     * @param int $id
     * @return  App\Models\Category  $category
     */
    public static function getById($id)
    {
        $data = Category::find($id);
        return $data;
    }
    /**
     * Delete data by Category.
     *
     * @param Category $category
     * @return bool
     */
    public static function delete(Category $category)
    {
        $data = $category->delete();
        return $data;
    }

    /**
     * Fetch records for datatables
     */
    public static function datatable()
    {
        $data = Category::query();
        return $data;
    }

    /**
     * update status.
     *
     * @param Array $data
     * @param int $id
     * @return bool
     */
    public static function status(array $data, $id)
    {
        $data = Category::where('id', $id)->update($data);
        return $data;
    }

    /**
     * Delete the old Category image
     */
    public static function deleteOldImage(Category $category)
    {
        FileService::removeImage($category, 'image', 'files/Gems');
        $result = $category->delete();
        return $result;
    }
}
