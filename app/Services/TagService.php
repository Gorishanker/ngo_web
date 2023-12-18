<?php

namespace App\Services;

use App\Models\Tag;
use Illuminate\Http\Request;

class TagService
{
    /**
     * Create the specified resource.
     *
     * @param Request $request
     * @return Tag
     */
    public static function create(array $data)
    {
        $data = Tag::create($data);
        return $data;
    }

    /**
     * Update the specified resource in storage.
     *
     * @param Request $request
     * @return bool
     */
    public static function update(array $data, $tag_id)
    {
        $data = Tag::where('id', $tag_id)->update($data);
        return $data;
    }

    /**
     * Update the specified resource in storage.
     *
     * @param Array $data
     * @param  App\Models\Tag  $tag
     * @return bool
     */
    public static function updateProfile(array $data, Tag $tag)
    {
        $data = $tag->update($data);
        return $data;
    }

    /**
     * Get the specified resource in storage.
     *
     * @param int $id
     * @return  App\Models\Tag  $tag
     */
    public static function getById($id)
    {
        $data = Tag::find($id);
        return $data;
    }
    /**
     * Delete data by Tag.
     *
     * @param Tag $tag
     * @return bool
     */
    public static function delete(Tag $tag)
    {
        $data = $tag->delete();
        return $data;
    }

    /**
     * Fetch records for datatables
     */
    public static function datatable()
    {
        $data = Tag::query();
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
        $data = Tag::where('id', $id)->update($data);
        return $data;
    }

    /**
     * Delete the old Tag image
     */
    public static function deleteOldImage(Tag $tag)
    {
        FileService::removeImage($tag, 'image', 'files/Gems');
        $result = $tag->delete();
        return $result;
    }
}
