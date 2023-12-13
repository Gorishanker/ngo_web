<?php

namespace App\Services;

use App\Models\PageContent;
use Illuminate\Http\Request;

class PageContentService
{
    /**
     * Create the specified resource.
     *
     * @param Request $request
     * @return PageContent
     */
    public static function create(array $data)
    {
        $data = PageContent::create($data);
        return $data;
    }

    /**
     * Update the specified resource in storage.
     *
     * @param Request $request
     * @return bool
     */
    public static function update(array $data, $page_content_id)
    {
        $data = PageContent::where('id', $page_content_id)->update($data);
        return $data;
    }

    /**
     * Update the specified resource in storage.
     *
     * @param Array $data
     * @param  App\Models\PageContent  $page_content
     * @return bool
     */
    public static function updateProfile(array $data, PageContent $page_content)
    {
        $data = $page_content->update($data);
        return $data;
    }

    /**
     * Get the specified resource in storage.
     *
     * @param int $id
     * @return  App\Models\PageContent  $page_content
     */
    public static function getById($id)
    {
        $data = PageContent::find($id);
        return $data;
    }
    /**
     * Delete data by PageContent.
     *
     * @param PageContent $page_content
     * @return bool
     */
    public static function delete(PageContent $page_content)
    {
        $data = $page_content->delete();
        return $data;
    }

    /**
     * Fetch records for datatables
     */
    public static function datatable()
    {
        $data = PageContent::query();
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
        $data = PageContent::where('id', $id)->update($data);
        return $data;
    }
}
