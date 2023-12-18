<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\TagRequest;
use App\Models\Tag;
use App\Services\TagService;
use App\Services\ManagerLanguageService;
use App\Services\UtilityService;

class TagController extends Controller
{
    protected $mls;
    protected $index_view, $create_view, $edit_view, $detail_view;
    protected $index_route_name, $create_route_name, $detail_route_name, $edit_route_name;
    protected $tagService, $utilityService;

    public function __construct()
    {
        //route
        $this->index_route_name = 'admin.tags.index';
        $this->detail_route_name = 'admin.tags.show';
        $this->edit_route_name = 'admin.tags.edit';

        //view files
        $this->index_view = 'admin.tag.index';
        $this->detail_view = 'admin.tag.details';
        $this->edit_view = 'admin.tag.edit';

        //service files
        $this->tagService = new TagService();
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
        
        $items = $this->tagService->dataTable();
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
    public function store(TagRequest $request)
    {
        $input = $request->validated();
        $tag = Tag::create($input);
        if (isset($tag)) {
            return response()->json([
                'status' => true,
                'message' => 'Tag created successfully.',
            ], 200);
        } else {
            return response()->json([
                'status' => false,
                'message' => 'Error! while creating tags.',
            ], 422);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Tag $tag)
    {
        $html = view($this->detail_view, compact('tag'))->render();
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
    public function edit(Tag $tag)
    {
        $html = view($this->edit_view, compact('tag'))->render();
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
    public function update(TagRequest $request, Tag $tag)
    {
        $input = $request->validated();
        if ($tag->language == 'hi') {
            $input = [
                'category_name' => $request->category_name_h,
                'is_active' => $request->is_active_h,
                'language' => 'hi', 
            ];
        }

        $data = $tag->update($input);
        if (isset($data)) {
            return response()->json([
                'status' => true,
                'message' => 'Tag created successfully.',
            ], 200);
        } else {
            return response()->json([
                'status' => false,
                'message' => 'Error! while creating tag.',
            ], 422);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Tag $tag)
    {
        $result = $tag->delete();
        if ($result) {
            return response()->json([
                'status' => 1,
                'title' => $this->mls->onlyNameLanguage('deleted_title'),
                'message' => $this->mls->onlyNameLanguage('tag'),
                'status_name' => 'success'
            ]);
        } else {
            return response()->json([
                'status' => 0,
                'title' => $this->mls->onlyNameLanguage('deleted_title'),
                'message' => $this->mls->onlyNameLanguage('tag'),
                'status_name' => 'error'
            ]);
        }
    }

    public function status($id, $status)
    {
        $status = ($status ==1) ? 0 : 1;
        $result = TagService::status(['is_active' => $status], $id);
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
