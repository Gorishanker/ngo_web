<?php

namespace App\Services;

use App\Models\ImpactStory;
use Illuminate\Http\Request;

class ImpactStoryService
{
    /**
     * Create the specified resource.
     *
     * @param Request $request
     * @return ImpactStory
     */
    public static function create(array $data)
    {
        $data = ImpactStory::create($data);
        return $data;
    }

    /**
     * Insert the specified resource.
     *
     * @param Request $request
     * @return ImpactStory
     */
    public static function insert(array $data)
    {
        $data = ImpactStory::insert($data);
        return $data;
    }

    /**
     * Update the specified resource in storage.
     *
     * @param Request $request
     * @return bool
     */
    public static function update(array $data, ImpactStory $impact_story)
    {
        $data = $impact_story->update($data);
        return $data;
    }

    /**
     * Get the specified resource in storage.
     *
     * @param int $id
     * @return  App\Models\ImpactStory $impact_story
     */
    public static function getById($id)
    {
        $data = ImpactStory::find($id);
        return $data;
    }

    /**
     * Update Data By Id in storage.
     *
     * @param  Int $id
     * @return ImpactStory
     */
    public static function updateById(array $data, $id)
    {
        $data = ImpactStory::where('id', $id)->update($data);
        return $data;
    }

    /**
     * Delete data by id.
     *
     * @param ImpactStory $impact_story
     * @return bool
     */
    public static function delete(ImpactStory $impact_story)
    {
        $data = $impact_story->delete();
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
        $data = ImpactStory::query();
        return $data;   
    }

}