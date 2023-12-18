<?php

namespace App\Services;

use App\Models\Banner;
use Illuminate\Http\Request;

class BannerService
{
    /**
     * Create the specified resource.
     *
     * @param Request $request
     * @return Banner
     */
    public static function create(array $data)
    {
        $data = Banner::create($data);
        return $data;
    }

    /**
     * Insert the specified resource.
     *
     * @param Request $request
     * @return Banner
     */
    public static function insert(array $data)
    {
        $data = Banner::insert($data);
        return $data;
    }

    /**
     * Update the specified resource in storage.
     *
     * @param Request $request
     * @return bool
     */
    public static function update(array $data, Banner $banner)
    {
        $data = $banner->update($data);
        return $data;
    }

    /**
     * Get the specified resource in storage.
     *
     * @param int $id
     * @return  App\Models\Banner $banner
     */
    public static function getById($id)
    {
        $data = Banner::find($id);
        return $data;
    }

    /**
     * Update Data By Id in storage.
     *
     * @param  Int $id
     * @return Banner
     */
    public static function updateById(array $data, $id)
    {
        $data = Banner::where('id', $id)->update($data);
        return $data;
    }

    /**
     * Delete data by id.
     *
     * @param Banner $banner
     * @return bool
     */
    public static function delete(Banner $banner)
    {
        $data = $banner->delete();
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
        $data = Banner::query();
        return $data;   
    }

}