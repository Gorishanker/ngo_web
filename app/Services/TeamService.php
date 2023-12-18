<?php

namespace App\Services;

use App\Models\Team;
use Illuminate\Http\Request;

class TeamService
{
    /**
     * Create the specified resource.
     *
     * @param Request $request
     * @return Team
     */
    public static function create(array $data)
    {
        $data = Team::create($data);
        return $data;
    }

    /**
     * Insert the specified resource.
     *
     * @param Request $request
     * @return Team
     */
    public static function insert(array $data)
    {
        $data = Team::insert($data);
        return $data;
    }

    /**
     * Update the specified resource in storage.
     *
     * @param Request $request
     * @return bool
     */
    public static function update(array $data, Team $team)
    {
        $data = $team->update($data);
        return $data;
    }

    /**
     * Get the specified resource in storage.
     *
     * @param int $id
     * @return  App\Models\Team $team
     */
    public static function getById($id)
    {
        $data = Team::find($id);
        return $data;
    }

    /**
     * Update Data By Id in storage.
     *
     * @param  Int $id
     * @return Team
     */
    public static function updateById(array $data, $id)
    {
        $data = Team::where('id', $id)->update($data);
        return $data;
    }

    /**
     * Delete data by id.
     *
     * @param Team $team
     * @return bool
     */
    public static function delete(Team $team)
    {
        $data = $team->delete();
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
        $data = Team::query();
        return $data;   
    }

}