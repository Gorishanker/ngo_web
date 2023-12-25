<?php

namespace App\Services;

use App\Models\Sponsor;
use Illuminate\Http\Request;

class SponsorService
{
    /**
     * Create the specified resource.
     *
     * @param Request $request
     * @return Sponsor
     */
    public static function create(array $data)
    {
        $data = Sponsor::create($data);
        return $data;
    }

    /**
     * Insert the specified resource.
     *
     * @param Request $request
     * @return Sponsor
     */
    public static function insert(array $data)
    {
        $data = Sponsor::insert($data);
        return $data;
    }

    /**
     * Update the specified resource in storage.
     *
     * @param Request $request
     * @return bool
     */
    public static function update(array $data, Sponsor $sponsor)
    {
        $data = $sponsor->update($data);
        return $data;
    }

    /**
     * Get the specified resource in storage.
     *
     * @param int $id
     * @return  App\Models\Sponsor $sponsor
     */
    public static function getById($id)
    {
        $data = Sponsor::find($id);
        return $data;
    }

    /**
     * Update Data By Id in storage.
     *
     * @param  Int $id
     * @return Sponsor
     */
    public static function updateById(array $data, $id)
    {
        $data = Sponsor::where('id', $id)->update($data);
        return $data;
    }

    /**
     * Delete data by id.
     *
     * @param Sponsor $sponsor
     * @return bool
     */
    public static function delete(Sponsor $sponsor)
    {
        $data = $sponsor->delete();
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
        $data = Sponsor::query();
        return $data;   
    }

}