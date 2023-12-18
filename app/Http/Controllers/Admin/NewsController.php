<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\NewsRequest;
use App\Models\News;
use App\Services\NewsService;
use App\Services\FileService;
use App\Services\ManagerLanguageService;
use App\Services\WebUtilityService;
use Illuminate\Support\Arr;

class NewsController extends Controller
{
    protected $mls, $image_directory;
    protected $index_view, $create_view, $edit_view, $detail_view;
    protected $index_route_name, $create_route_name, $edit_route_name;
    protected $bannerService, $webUtilityService;

    public function __construct()
    {

        //route
        $this->index_route_name = 'admin.news.index';
        $this->create_route_name = 'admin.news.create';
        $this->edit_route_name = 'admin.news.edit';

        //view files
        $this->index_view = 'admin.news.index';
        $this->create_view = 'admin.news.create';
        $this->detail_view = 'admin.news.details';
        $this->edit_view = 'admin.news.edit';
        $this->image_directory = 'files/news';

        //new files
        $this->bannerService = new NewsService();
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
            $items = NewsService::datatable();
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
        return view($this->create_view);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(NewsRequest $request)
    {
        $input = $request->validated();

        $image = FileService::imageUploader($request, 'image', $this->image_directory);
        if ($image != null) {
            $input['image'] = $image;
        }
        $this->bannerService->create($input);

        return redirect()->route($this->index_route_name)
            ->with('success', $this->mls->messageLanguage('created', 'new', 1));
    }
    /**
    * Display the specified resource.
    *
    * @param new $new
    * @return \Illuminate\Http\Response
    */
    public function show(News $new)
    {
    
        return  view($this->detail_view, compact('new'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(News $new)
    {
        return view($this->edit_view, compact('new'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(NewsRequest $request, News $new)
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
        $new->update($input);

        return redirect()->route($this->index_route_name)
            ->with('success', $this->mls->messageLanguage('updated', 'new', 1));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(News $new)
    {
        $result = $new->delete();
        return $this->webUtilityService->swalWithTitleResponse($result, 'deleted', 'new');
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
