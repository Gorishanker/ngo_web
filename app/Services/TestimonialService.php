<?php

namespace App\Services;

use App\Models\Testimonial;
use Illuminate\Http\Request;

class TestimonialService
{
    /**
     * Create the specified resource.
     *
     * @param Request $request
     * @return Testimonial
     */
    public static function create(array $data)
    {
        $data = Testimonial::create($data);
        return $data;
    }

    /**
     * Insert the specified resource.
     *
     * @param Request $request
     * @return Testimonial
     */
    public static function insert(array $data)
    {
        $data = Testimonial::insert($data);
        return $data;
    }

    /**
     * Update the specified resource in storage.
     *
     * @param Request $request
     * @return bool
     */
    public static function update(array $data, Testimonial $testimonial)
    {
        $data = $testimonial->update($data);
        return $data;
    }

    /**
     * Get the specified resource in storage.
     *
     * @param int $id
     * @return  App\Models\Testimonial $testimonial
     */
    public static function getById($id)
    {
        $data = Testimonial::find($id);
        return $data;
    }

    /**
     * Update Data By Id in storage.
     *
     * @param  Int $id
     * @return Testimonial
     */
    public static function updateById(array $data, $id)
    {
        $data = Testimonial::where('id', $id)->update($data);
        return $data;
    }

    /**
     * Delete data by id.
     *
     * @param Testimonial $testimonial
     * @return bool
     */
    public static function delete(Testimonial $testimonial)
    {
        $data = $testimonial->delete();
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
        $data = Testimonial::query();
        return $data;   
    }

}