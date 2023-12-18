<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\BannerRequest;
use App\Models\Banner;
use App\Services\BannerService;
use App\Services\FileService;
use App\Services\ManagerLanguageService;
use App\Services\WebUtilityService;
use Illuminate\Support\Arr;

class BannerController extends Controller
{
    protected $mls, $image_directory;
    protected $index_view, $create_view, $edit_view, $detail_view;
    protected $index_route_name, $create_route_name, $edit_route_name;
    protected $bannerService, $webUtilityService;

    public function __construct()
    {

        //route
        $this->index_route_name = 'admin.banners.index';
        $this->create_route_name = 'admin.banners.create';
        $this->edit_route_name = 'admin.banners.edit';

        //view files
        $this->index_view = 'admin.banner.index';
        $this->create_view = 'admin.banner.create';
        $this->detail_view = 'admin.banner.details';
        $this->edit_view = 'admin.banner.edit';
        $this->image_directory = 'files/banners';

        //banner files
        $this->bannerService = new BannerService();
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
            $items = BannerService::datatable();
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
    public function store(BannerRequest $request)
    {
        $input = $request->validated();

        $image = FileService::imageUploader($request, 'image', $this->image_directory);
        if ($image != null) {
            $input['image'] = $image;
        }
        $this->bannerService->create($input);

        return redirect()->route($this->index_route_name)
            ->with('success', $this->mls->messageLanguage('created', 'banner', 1));
    }
    /**
    * Display the specified resource.
    *
    * @param banner $banner
    * @return \Illuminate\Http\Response
    */
    public function show(Banner $banner)
    {
    
        return  view($this->detail_view, compact('banner'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Banner $banner)
    {
        return view($this->edit_view, compact('banner'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(BannerRequest $request, Banner $banner)
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
        $banner->update($input);

        return redirect()->route($this->index_route_name)
            ->with('success', $this->mls->messageLanguage('updated', 'banner', 1));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Banner $banner)
    {
        $result = $banner->delete();
        return $this->webUtilityService->swalWithTitleResponse($result, 'deleted', 'banner');
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
