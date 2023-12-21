<?php

namespace App\Services;

use App\Models\Occasion;
use Illuminate\Http\Request;

class OccasionService
{
    /**
     * Create the specified resource.
     *
     * @param Request $request
     * @return Occasion
     */
    public static function create(array $data)
    {
        $data = Occasion::create($data);
        return $data;
    }

    /**
     * Update the specified resource in storage.
     *
     * @param Request $request
     * @return bool
     */
    public static function update(array $data, $occasion_id)
    {
        $data = Occasion::where('id', $occasion_id)->update($data);
        return $data;
    }

    /**
     * Update the specified resource in storage.
     *
     * @param Array $data
     * @param  App\Models\Occasion  $occasion
     * @return bool
     */
    public static function updateProfile(array $data, Occasion $occasion)
    {
        $data = $occasion->update($data);
        return $data;
    }

    /**
     * Get the specified resource in storage.
     *
     * @param int $id
     * @return  App\Models\Occasion  $occasion
     */
    public static function getById($id)
    {
        $data = Occasion::find($id);
        return $data;
    }
    /**
     * Delete data by Occasion.
     *
     * @param Occasion $occasion
     * @return bool
     */
    public static function delete(Occasion $occasion)
    {
        $data = $occasion->delete();
        return $data;
    }

    /**
     * Fetch records for datatables
     */
    public static function datatable()
    {
        $data = Occasion::query();
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
        $data = Occasion::where('id', $id)->update($data);
        return $data;
    }

    /**
     * Delete the old Occasion image
     */
    public static function deleteOldImage(Occasion $occasion)
    {
        FileService::removeImage($occasion, 'image', 'files/Gems');
        $result = $occasion->delete();
        return $result;
    }
}
