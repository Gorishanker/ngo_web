<?php

namespace App\Services;

use App\Models\Service;
use Illuminate\Http\Request;

class ServiceService
{
    /**
     * Create the specified resource.
     *
     * @param Request $request
     * @return Service
     */
    public static function create(array $data)
    {
        $data = Service::create($data);
        return $data;
    }

    /**
     * Insert the specified resource.
     *
     * @param Request $request
     * @return Service
     */
    public static function insert(array $data)
    {
        $data = Service::insert($data);
        return $data;
    }

    /**
     * Update the specified resource in storage.
     *
     * @param Request $request
     * @return bool
     */
    public static function update(array $data, Service $service)
    {
        $data = $service->update($data);
        return $data;
    }

    /**
     * Get the specified resource in storage.
     *
     * @param int $id
     * @return  App\Models\Service $service
     */
    public static function getById($id)
    {
        $data = Service::find($id);
        return $data;
    }

    /**
     * Update Data By Id in storage.
     *
     * @param  Int $id
     * @return Service
     */
    public static function updateById(array $data, $id)
    {
        $data = Service::where('id', $id)->update($data);
        return $data;
    }

    /**
     * Delete data by id.
     *
     * @param Service $service
     * @return bool
     */
    public static function delete(Service $service)
    {
        $data = $service->delete();
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
        $data = Service::query();
        return $data;   
    }

}