<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\PageContentRequest;
use App\Models\PageContent;
use App\Services\PageContentService;
use App\Services\ManagerLanguageService;
use App\Services\UtilityService;

class PageContentController extends Controller
{
    protected $mls;
    protected $index_view, $create_view, $edit_view, $detail_view;
    protected $index_route_name, $create_route_name, $detail_route_name, $edit_route_name;
    protected $categoryService, $utilityService;

    public function __construct()
    {
        //route
        $this->index_route_name = 'admin.page_contents.index';
        $this->detail_route_name = 'admin.page_contents.show';
        $this->edit_route_name = 'admin.page_contents.edit';

        //view files
        $this->index_view = 'admin.page_content.index';
        $this->detail_view = 'admin.page_content.details';
        $this->edit_view = 'admin.page_content.edit';

        //service files
        $this->categoryService = new PageContentService();
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
        
        if ($request->ajax()) {
            $items = $this->categoryService->dataTable();
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
    public function store(PageContentRequest $request)
    {
        $input = $request->validated();
        $slug = generateSlug($request->title);
        $slug_exists = PageContent::where('key', $slug)->count();
        if($slug_exists > 0){
            $slug = $slug . '_'.rand(0,10);
            $slug_exists = PageContent::where('key', $slug)->count();
            if($slug_exists > 0){
                $slug = $slug . '_'.rand(0,10);
            }
        }
        $hi_input = [
            'title' => $request->title_h,
            'key' => $slug,
            'content' => $request->content_h,
            'is_active' => $request->is_active_h,
            'language' => 'hi',
        ];
        $en_input = [
            'title' => $request->title,
            'key' =>$slug,
            'content' => $request->content,
            'is_active' => $request->is_active,
            'language' => 'en',
        ];
        $en_data =$this->categoryService->create($en_input);
        $hi_data =$this->categoryService->create($hi_input);
        if (isset($en_data) && isset($hi_data)) {
            return response()->json([
                'status' => true,
                'message' => 'PageContent created successfully.',
            ], 200);
        } else {
            if (isset($en_data)) {
                $en_data->delete();
            }
            if (isset($hi_data)) {
                $hi_data->delete();
            }
            return response()->json([
                'status' => false,
                'message' => 'Error! while creating PageContent.',
            ], 422);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(PageContent $page_content)
    {
        $html = view($this->detail_view, compact('page_content'))->render();
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
    public function edit(PageContent $page_content)
    {
        $html = view($this->edit_view, compact('page_content'))->render();
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
    public function update(PageContentRequest $request, PageContent $page_content)
    {
        $input = $request->validated();
        if ($page_content->language == 'hi') {
            $input = [
                'title' => $request->title_h,
                'content' => $request->content_h,
                'is_active' => $request->is_active_h,
                'user_type' => $request->user_type_h,
                'language' => 'hi', 
            ];
        }

        $data = $page_content->update($input);
        if (isset($data)) {
            return response()->json([
                'status' => true,
                'message' => 'PageContent update successfully.',
            ], 200);
        } else {
            return response()->json([
                'status' => false,
                'message' => 'Error! while creating page_content.',
            ], 422);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(PageContent $page_content)
    {
        $result = $page_content->delete();
        if ($result) {
            return response()->json([
                'status' => 1,
                'title' => $this->mls->onlyNameLanguage('deleted_title'),
                'message' => $this->mls->onlyNameLanguage('page_content'),
                'status_name' => 'success'
            ]);
        } else {
            return response()->json([
                'status' => 0,
                'title' => $this->mls->onlyNameLanguage('deleted_title'),
                'message' => $this->mls->onlyNameLanguage('page_content'),
                'status_name' => 'error'
            ]);
        }
    }

    public function status($id, $status)
    {
        $status = ($status =="true") ? false : true;
        $result = PageContentService::status(['is_active' => $status], $id);
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
