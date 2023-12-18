<?php

namespace App\Services;

use App\Models\News;
use Illuminate\Http\Request;

class NewsService
{
    /**
     * Create the specified resource.
     *
     * @param Request $request
     * @return News
     */
    public static function create(array $data)
    {
        $data = News::create($data);
        return $data;
    }

    /**
     * Insert the specified resource.
     *
     * @param Request $request
     * @return News
     */
    public static function insert(array $data)
    {
        $data = News::insert($data);
        return $data;
    }

    /**
     * Update the specified resource in storage.
     *
     * @param Request $request
     * @return bool
     */
    public static function update(array $data, News $new)
    {
        $data = $new->update($data);
        return $data;
    }

    /**
     * Get the specified resource in storage.
     *
     * @param int $id
     * @return  App\Models\News $new
     */
    public static function getById($id)
    {
        $data = News::find($id);
        return $data;
    }

    /**
     * Update Data By Id in storage.
     *
     * @param  Int $id
     * @return News
     */
    public static function updateById(array $data, $id)
    {
        $data = News::where('id', $id)->update($data);
        return $data;
    }

    /**
     * Delete data by id.
     *
     * @param News $new
     * @return bool
     */
    public static function delete(News $new)
    {
        $data = $new->delete();
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
        $data = News::query();
        return $data;   
    }

}