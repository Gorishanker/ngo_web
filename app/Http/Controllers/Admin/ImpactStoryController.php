<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\ImpactStoryRequest;
use App\Models\ImpactImage;
use App\Models\ImpactStory;
use App\Models\Project;
use App\Services\ImpactStoryService;
use App\Services\FileService;
use App\Services\ManagerLanguageService;
use App\Services\WebUtilityService;
use Illuminate\Support\Arr;

class ImpactStoryController extends Controller
{
    protected $mls, $image_directory;
    protected $index_view, $create_view, $edit_view, $detail_view;
    protected $index_route_name, $create_route_name, $edit_route_name;
    protected $impactStoryService, $webUtilityService;

    public function __construct()
    {

        //route
        $this->index_route_name = 'admin.impact-stories.index';
        $this->create_route_name = 'admin.impact-stories.create';
        $this->edit_route_name = 'admin.impact-stories.edit';

        //view files
        $this->index_view = 'admin.impact_story.index';
        $this->create_view = 'admin.impact_story.create';
        $this->detail_view = 'admin.impact_story.details';
        $this->edit_view = 'admin.impact_story.edit';
        $this->image_directory = 'files/impacts';

        //impact_story files
        $this->impactStoryService = new ImpactStoryService();
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
            $items = ImpactStoryService::datatable();
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
        $projects = Project::where('is_active', 1)->pluck('title', 'id');
        return view($this->create_view, compact('projects'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ImpactStoryRequest $request)
    {
        $input = $request->except('other_images');

        $image = FileService::imageUploader($request, 'image', $this->image_directory);
        if ($image != null) {
            $input['image'] = $image;
        }
        $impact_story = $this->impactStoryService->create($input);

        $other_images = [];

        if ($request->hasFile('other_images')) {
            $images = FileService::multipleImageUploader($request, 'other_images', $this->image_directory);

            for ($i = 0; $i < count($images); $i++) {
                $other_images[$i]['impact_id'] = $impact_story->id;
                $other_images[$i]['image'] = $images[$i];
            }
            ImpactImage::insert($other_images);
        }

        return redirect()->route($this->index_route_name)
            ->with('success', $this->mls->messageLanguage('created', 'impact_story', 1));
    }
    /**
     * Display the specified resource.
     *
     * @param impact_story $impact_story
     * @return \Illuminate\Http\Response
     */
    public function show(ImpactStory $impact_story)
    {
        return  view($this->detail_view, compact('impact_story'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(ImpactStory $impact_story)
    {
        $projects = Project::where('is_active', 1)->pluck('title', 'id');
        return view($this->edit_view, compact('impact_story','projects'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(ImpactStoryRequest $request, ImpactStory $impact_story)
    {
        $input = $request->except('side_images');
        if (!empty($input['image'])) {
            $image = FileService::imageUploader($request, 'image', $this->image_directory);
            if ($image != null) {
                $input['image'] = $image;
            }
        } else {
            $input = Arr::except($input, array('image'));
        }
        $impact_story->update($input);
        if ($request->hasFile('other_images')) {
            $other_images = [];
            $old_images = ImpactImage::where(['impact_id' => $impact_story->id])->delete();
            $images = FileService::multipleImageUploader($request, 'other_images', $this->image_directory);

            for ($i = 0; $i < count($images); $i++) {
                $other_images[$i]['impact_id'] = $impact_story->id;
                $other_images[$i]['image'] = $images[$i];
            }
            ImpactImage::insert($other_images);
        }

        return redirect()->route($this->index_route_name)
            ->with('success', $this->mls->messageLanguage('updated', 'impact_story', 1));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(ImpactStory $impact_story)
    {
        $result = $impact_story->delete();
        return $this->webUtilityService->swalWithTitleResponse($result, 'deleted', 'impact_story');
    }

    public function status($id, $status)
    {
        $status = ($status == 1) ? 0 : 1;
        $result = $this->impactStoryService->updateById(['is_active' => $status], $id);
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
