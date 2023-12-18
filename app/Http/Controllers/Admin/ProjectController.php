<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\ProjectRequest;
use App\Models\Client;
use App\Models\Project;
use App\Models\ProjectDoc;
use App\Services\ProjectService;
use App\Services\FileService;
use App\Services\ManagerLanguageService;
use App\Services\WebUtilityService;
use Illuminate\Support\Arr;

class ProjectController extends Controller
{
    protected $mls, $image_directory;
    protected $index_view, $create_view, $edit_view, $detail_view;
    protected $index_route_name, $create_route_name, $edit_route_name;
    protected $bannerService, $webUtilityService;

    public function __construct()
    {

        //route
        $this->index_route_name = 'admin.projects.index';
        $this->create_route_name = 'admin.projects.create';
        $this->edit_route_name = 'admin.projects.edit';

        //view files
        $this->index_view = 'admin.project.index';
        $this->create_view = 'admin.project.create';
        $this->detail_view = 'admin.project.details';
        $this->edit_view = 'admin.project.edit';
        $this->image_directory = 'files/projects';

        //project files
        $this->bannerService = new ProjectService();
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
            $items = ProjectService::datatable();
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
        $clients = Client::where('is_active', 1)->pluck('name', 'id');
        return view($this->create_view, compact('clients'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ProjectRequest $request)
    {
        $input = $request->except('brochure_pdf', 'brochure_doc', 'side_images');

        $image = FileService::imageUploader($request, 'image', $this->image_directory);
        if ($image != null) {
            $input['image'] = $image;
        }
        $project = $this->bannerService->create($input);

        $brochure_pdf = FileService::imageUploader($request, 'brochure_pdf', $this->image_directory);
        if ($brochure_pdf != null) {
            ProjectDoc::create(['type' => 1, 'file' => $brochure_pdf, 'service_id' => $project->id]);
        }
        $brochure_doc = FileService::imageUploader($request, 'brochure_doc', $this->image_directory);
        if ($brochure_doc != null) {
            ProjectDoc::create(['type' => 2, 'file' => $brochure_doc, 'service_id' => $project->id]);
        }

        $side_images = [];

        if ($request->hasFile('side_images')) {
            $images = FileService::multipleImageUploader($request, 'side_images', $this->image_directory);

            for ($i = 0; $i < count($images); $i++) {
                $side_images[$i]['project_id'] = $project->id;
                $side_images[$i]['file'] = $images[$i];
                $side_images[$i]['type'] = 3;
            }
            ProjectDoc::insert($side_images);
        }

        return redirect()->route($this->index_route_name)
            ->with('success', $this->mls->messageLanguage('created', 'project', 1));
    }
    /**
     * Display the specified resource.
     *
     * @param project $project
     * @return \Illuminate\Http\Response
     */
    public function show(Project $project)
    {

        return  view($this->detail_view, compact('project'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Project $project)
    {
        $clients = Client::where('is_active', 1)->pluck('name', 'id');
        return view($this->edit_view, compact('project', 'clients'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(ProjectRequest $request, Project $project)
    {
        $input = $request->except('brochure_pdf', 'brochure_doc', 'side_images');
        if (!empty($input['image'])) {
            $image = FileService::imageUploader($request, 'image', $this->image_directory);
            if ($image != null) {
                $input['image'] = $image;
            }
        } else {
            $input = Arr::except($input, array('image'));
        }
        $project->update($input);


        if (isset($request->brochure_pdf)) {
            $old_pdf = ProjectDoc::where(['service_id' => $project->id, 'type' => 1])->first();
            $brochure_pdf = FileService::imageUploader($request, 'brochure_pdf', $this->image_directory);
            if ($brochure_pdf != null) {
                if (isset($old_pdf)) {
                    $old_pdf->update(['file' => $brochure_pdf]);
                } else {
                    ProjectDoc::create(['type' => 1, 'file' => $brochure_pdf, 'service_id' => $project->id]);
                }
            }
        }

        if (isset($request->brochure_doc)) {
            $old_doc = ProjectDoc::where(['service_id' => $project->id, 'type' => 2])->first();
            $brochure_doc = FileService::imageUploader($request, 'brochure_doc', $this->image_directory);
            if ($brochure_doc != null) {
                if (isset($old_doc)) {
                    $old_doc->update(['file' => $brochure_doc]);
                } else {
                    ProjectDoc::create(['type' => 2, 'file' => $brochure_doc, 'service_id' => $project->id]);
                }
            }
        }

        if ($request->hasFile('side_images')) {
            $side_images = [];
            $old_images = ProjectDoc::where(['project_id' => $project->id, 'type' => 3])->delete();
            $images = FileService::multipleImageUploader($request, 'side_images', $this->image_directory);

            for ($i = 0; $i < count($images); $i++) {
                $side_images[$i]['type'] = 3;
                $side_images[$i]['project_id'] = $project->id;
                $side_images[$i]['file'] = $images[$i];
            }
            ProjectDoc::insert($side_images);
        }

        return redirect()->route($this->index_route_name)
            ->with('success', $this->mls->messageLanguage('updated', 'project', 1));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Project $project)
    {
        $result = $project->delete();
        return $this->webUtilityService->swalWithTitleResponse($result, 'deleted', 'project');
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
