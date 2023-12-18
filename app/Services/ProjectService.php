<?php

namespace App\Services;

use App\Models\Project;
use Illuminate\Http\Request;

class ProjectService
{
    /**
     * Create the specified resource.
     *
     * @param Request $request
     * @return Project
     */
    public static function create(array $data)
    {
        $data = Project::create($data);
        return $data;
    }

    /**
     * Insert the specified resource.
     *
     * @param Request $request
     * @return Project
     */
    public static function insert(array $data)
    {
        $data = Project::insert($data);
        return $data;
    }

    /**
     * Update the specified resource in storage.
     *
     * @param Request $request
     * @return bool
     */
    public static function update(array $data, Project $project)
    {
        $data = $project->update($data);
        return $data;
    }

    /**
     * Get the specified resource in storage.
     *
     * @param int $id
     * @return  App\Models\Project $project
     */
    public static function getById($id)
    {
        $data = Project::find($id);
        return $data;
    }

    /**
     * Update Data By Id in storage.
     *
     * @param  Int $id
     * @return Project
     */
    public static function updateById(array $data, $id)
    {
        $data = Project::where('id', $id)->update($data);
        return $data;
    }

    /**
     * Delete data by id.
     *
     * @param Project $project
     * @return bool
     */
    public static function delete(Project $project)
    {
        $data = $project->delete();
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
        $data = Project::query();
        return $data;   
    }

}