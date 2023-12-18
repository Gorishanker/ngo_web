<?php

namespace App\Services;

use App\Models\Campaign;
use Illuminate\Http\Request;

class CampaignService
{
    /**
     * Create the specified resource.
     *
     * @param Request $request
     * @return Campaign
     */
    public static function create(array $data)
    {
        $data = Campaign::create($data);
        return $data;
    }

    /**
     * Insert the specified resource.
     *
     * @param Request $request
     * @return Campaign
     */
    public static function insert(array $data)
    {
        $data = Campaign::insert($data);
        return $data;
    }

    /**
     * Update the specified resource in storage.
     *
     * @param Request $request
     * @return bool
     */
    public static function update(array $data, Campaign $campaign)
    {
        $data = $campaign->update($data);
        return $data;
    }

    /**
     * Get the specified resource in storage.
     *
     * @param int $id
     * @return  App\Models\Campaign $campaign
     */
    public static function getById($id)
    {
        $data = Campaign::find($id);
        return $data;
    }

    /**
     * Update Data By Id in storage.
     *
     * @param  Int $id
     * @return Campaign
     */
    public static function updateById(array $data, $id)
    {
        $data = Campaign::where('id', $id)->update($data);
        return $data;
    }

    /**
     * Delete data by id.
     *
     * @param Campaign $campaign
     * @return bool
     */
    public static function delete(Campaign $campaign)
    {
        $data = $campaign->delete();
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
        $data = Campaign::query();
        return $data;   
    }

}