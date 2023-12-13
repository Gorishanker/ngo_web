<?php

namespace App\Services;

use App\Models\Faq;
use Illuminate\Http\Request;

class FaqService
{
    /**
     * Create the specified resource.
     *
     * @param Request $request
     * @return Faq
     */
    public static function create(array $data)
    {
        $data = Faq::create($data);
        return $data;
    }

    /**
     * Update the specified resource in storage.
     *
     * @param Request $request
     * @return bool
     */
    public static function update(array $data, $faq_id)
    {
        $data = Faq::where('id', $faq_id)->update($data);
        return $data;
    }

    /**
     * Update the specified resource in storage.
     *
     * @param Array $data
     * @param  App\Models\Faq  $faq
     * @return bool
     */
    public static function updateProfile(array $data, Faq $faq)
    {
        $data = $faq->update($data);
        return $data;
    }

    /**
     * Get the specified resource in storage.
     *
     * @param int $id
     * @return  App\Models\Faq  $faq
     */
    public static function getById($id)
    {
        $data = Faq::find($id);
        return $data;
    }
    /**
     * Delete data by Faq.
     *
     * @param Faq $faq
     * @return bool
     */
    public static function delete(Faq $faq)
    {
        $data = $faq->delete();
        return $data;
    }

    /**
     * Fetch records for datatables
     */
    public static function datatable()
    {
        $data = Faq::query();
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
        $data = Faq::where('id', $id)->update($data);
        return $data;
    }
}
