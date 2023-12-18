<?php

namespace App\Services;

use App\Models\Blog;
use Illuminate\Http\Request;

class BlogService
{
    /**
     * Create the specified resource.
     *
     * @param Request $request
     * @return Blog
     */
    public static function create(array $data)
    {
        $data = Blog::create($data);
        return $data;
    }

    /**
     * Insert the specified resource.
     *
     * @param Request $request
     * @return Blog
     */
    public static function insert(array $data)
    {
        $data = Blog::insert($data);
        return $data;
    }

    /**
     * Update the specified resource in storage.
     *
     * @param Request $request
     * @return bool
     */
    public static function update(array $data, Blog $blog)
    {
        $data = $blog->update($data);
        return $data;
    }

    /**
     * Get the specified resource in storage.
     *
     * @param int $id
     * @return  App\Models\Blog $blog
     */
    public static function getById($id)
    {
        $data = Blog::find($id);
        return $data;
    }

    /**
     * Update Data By Id in storage.
     *
     * @param  Int $id
     * @return Blog
     */
    public static function updateById(array $data, $id)
    {
        $data = Blog::where('id', $id)->update($data);
        return $data;
    }

    /**
     * Delete data by id.
     *
     * @param Blog $blog
     * @return bool
     */
    public static function delete(Blog $blog)
    {
        $data = $blog->delete();
        return $data;
    }

    /**
     * Remove the specified id from storage.
     *
     * @param  $id
     * @return bool
     */
    public static function deleteById($id)
    {
        $result = false;
        $data = self::getById($id);
        if($data){
            $result = $data->delete();
        }
        return $result;
    }

    /**
     * Fetch records for datatables
     */
    public static function datatable()
    {
        $data = Blog::query();
        return $data;   
    }

}