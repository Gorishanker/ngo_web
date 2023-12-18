<?php

namespace App\Services;

use App\Models\Event;
use Illuminate\Http\Request;

class EventService
{
    /**
     * Create the specified resource.
     *
     * @param Request $request
     * @return Event
     */
    public static function create(array $data)
    {
        $data = Event::create($data);
        return $data;
    }

    /**
     * Insert the specified resource.
     *
     * @param Request $request
     * @return Event
     */
    public static function insert(array $data)
    {
        $data = Event::insert($data);
        return $data;
    }

    /**
     * Update the specified resource in storage.
     *
     * @param Request $request
     * @return bool
     */
    public static function update(array $data, Event $event)
    {
        $data = $event->update($data);
        return $data;
    }

    /**
     * Get the specified resource in storage.
     *
     * @param int $id
     * @return  App\Models\Event $event
     */
    public static function getById($id)
    {
        $data = Event::find($id);
        return $data;
    }

    /**
     * Update Data By Id in storage.
     *
     * @param  Int $id
     * @return Event
     */
    public static function updateById(array $data, $id)
    {
        $data = Event::where('id', $id)->update($data);
        return $data;
    }

    /**
     * Delete data by id.
     *
     * @param Event $event
     * @return bool
     */
    public static function delete(Event $event)
    {
        $data = $event->delete();
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
        $data = Event::query();
        return $data;   
    }

}