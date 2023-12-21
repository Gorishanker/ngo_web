<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\OccasionRequest;
use App\Models\Occasion;
use App\Services\OccasionService;
use App\Services\ManagerLanguageService;
use App\Services\UtilityService;

class OccasionController extends Controller
{
    protected $mls;
    protected $index_view, $create_view, $edit_view, $detail_view;
    protected $index_route_name, $create_route_name, $detail_route_name, $edit_route_name;
    protected $occasionService, $utilityService;

    public function __construct()
    {
        //route
        $this->index_route_name = 'admin.occasions.index';
        $this->detail_route_name = 'admin.occasions.show';
        $this->edit_route_name = 'admin.occasions.edit';

        //view files
        $this->index_view = 'admin.occasion.index';
        $this->detail_view = 'admin.occasion.details';
        $this->edit_view = 'admin.occasion.edit';

        //service files
        $this->occasionService = new OccasionService();
        $this->utilityService = new UtilityService();

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
        
        $items = $this->occasionService->dataTable();
        if ($request->ajax()) {
            return dataTables()->eloquent($items)->toJson();
        } else {
            return view($this->index_view);
        }
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(OccasionRequest $request)
    {
        $input = $request->validated();
        $occasion = Occasion::create($input);
        if (isset($occasion)) {
            return response()->json([
                'status' => true,
                'message' => 'Occasion created successfully.',
            ], 200);
        } else {
            return response()->json([
                'status' => false,
                'message' => 'Error! while creating occasions.',
            ], 422);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Occasion $occasion)
    {
        $html = view($this->detail_view, compact('occasion'))->render();
        return response()->json([
            'status' => true,
            'data' => $html,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Occasion $occasion)
    {
        $html = view($this->edit_view, compact('occasion'))->render();
        return response()->json([
            'status' => true,
            'data' => $html,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(OccasionRequest $request, Occasion $occasion)
    {
        $input = $request->validated();
        if ($occasion->language == 'hi') {
            $input = [
                'category_name' => $request->category_name_h,
                'is_active' => $request->is_active_h,
                'language' => 'hi', 
            ];
        }

        $data = $occasion->update($input);
        if (isset($data)) {
            return response()->json([
                'status' => true,
                'message' => 'Occasion created successfully.',
            ], 200);
        } else {
            return response()->json([
                'status' => false,
                'message' => 'Error! while creating occasion.',
            ], 422);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Occasion $occasion)
    {
        $result = $occasion->delete();
        if ($result) {
            return response()->json([
                'status' => 1,
                'title' => $this->mls->onlyNameLanguage('deleted_title'),
                'message' => $this->mls->onlyNameLanguage('occasion'),
                'status_name' => 'success'
            ]);
        } else {
            return response()->json([
                'status' => 0,
                'title' => $this->mls->onlyNameLanguage('deleted_title'),
                'message' => $this->mls->onlyNameLanguage('occasion'),
                'status_name' => 'error'
            ]);
        }
    }

    public function status($id, $status)
    {
        $status = ($status ==1) ? 0 : 1;
        $result = OccasionService::status(['is_active' => $status], $id);
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
