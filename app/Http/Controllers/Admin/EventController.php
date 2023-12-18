<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\EventRequest;
use App\Models\Category;
use App\Models\Event;
use App\Services\EventService;
use App\Services\FileService;
use App\Services\ManagerLanguageService;
use App\Services\WebUtilityService;
use Illuminate\Support\Arr;

class EventController extends Controller
{
    protected $mls, $image_directory;
    protected $index_view, $create_view, $edit_view, $detail_view;
    protected $index_route_name, $create_route_name, $edit_route_name;
    protected $bannerService, $webUtilityService;

    public function __construct()
    {

        //route
        $this->index_route_name = 'admin.events.index';
        $this->create_route_name = 'admin.events.create';
        $this->edit_route_name = 'admin.events.edit';

        //view files
        $this->index_view = 'admin.event.index';
        $this->create_view = 'admin.event.create';
        $this->detail_view = 'admin.event.details';
        $this->edit_view = 'admin.event.edit';
        $this->image_directory = 'files/events';

        //event files
        $this->bannerService = new EventService();
        $this->webUtilityService = new WebUtilityService();

        //mls is used for manage language content based on keys in messages.php
        $this->mls = new ManagerLanguageService('messages');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if ($request->ajax()) {
            $items = EventService::datatable();
            return datatables()->eloquent($items)->toJson();
        } else {
            return view($this->index_view);
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::where('is_active', 1)->pluck('category_name', 'id');
        return view($this->create_view, compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(EventRequest $request)
    {
        $input = $request->validated();

        $image = FileService::imageUploader($request, 'image', $this->image_directory);
        if ($image != null) {
            $input['image'] = $image;
        }
        $this->bannerService->create($input);

        return redirect()->route($this->index_route_name)
            ->with('success', $this->mls->messageLanguage('created', 'event', 1));
    }
    /**
    * Display the specified resource.
    *
    * @param event $event
    * @return \Illuminate\Http\Response
    */
    public function show(Event $event)
    {
    
        return  view($this->detail_view, compact('event'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Event $event)
    {
        $categories = Category::where('is_active', 1)->pluck('category_name', 'id');
        return view($this->edit_view, compact('event','categories'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(EventRequest $request, Event $event)
    {
        $input = $request->validated();
        if (!empty($input['image'])) {
            $image = FileService::imageUploader($request, 'image', $this->image_directory);
            if ($image != null) {
                $input['image'] = $image;
            }
        } else {
            $input = Arr::except($input, array('image'));
        }
        $event->update($input);

        return redirect()->route($this->index_route_name)
            ->with('success', $this->mls->messageLanguage('updated', 'event', 1));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Event $event)
    {
        $result = $event->delete();
        return $this->webUtilityService->swalWithTitleResponse($result, 'deleted', 'event');
    }

    public function status($id, $status)
    {
        $status = ($status == 1) ? 0 : 1;
        $result = $this->bannerService->updateById(['is_active' => $status], $id);
        if ($result) {
            return response()->json([
                'status' => 1,
                'message' => $this->mls->messageLanguage('updated', 'status', 1),
                'status_name' => 'success'
            ]);
        } else {
            return response()->json([
                'status' => 0,
                'message' => $this->mls->messageLanguage('not_updated', 'status', 1),
                'status_name' => 'error'
            ]);
        }
    }
}
