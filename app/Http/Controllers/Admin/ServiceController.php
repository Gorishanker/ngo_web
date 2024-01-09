<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\ServiceRequest;
use App\Models\Service;
use App\Models\ServiceDoc;
use App\Services\ServiceService;
use App\Services\FileService;
use App\Services\ManagerLanguageService;
use App\Services\WebUtilityService;
use Illuminate\Support\Arr;

class ServiceController extends Controller
{
    protected $mls, $image_directory;
    protected $index_view, $create_view, $edit_view, $detail_view;
    protected $index_route_name, $create_route_name, $edit_route_name;
    protected $serviceService, $webUtilityService;

    public function __construct()
    {

        //route
        $this->index_route_name = 'admin.services.index';
        $this->create_route_name = 'admin.services.create';
        $this->edit_route_name = 'admin.services.edit';

        //view files
        $this->index_view = 'admin.service.index';
        $this->create_view = 'admin.service.create';
        $this->detail_view = 'admin.service.details';
        $this->edit_view = 'admin.service.edit';
        $this->image_directory = 'files/services';

        //service files
        $this->serviceService = new ServiceService();
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
            $items = ServiceService::datatable();
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
    public function store(ServiceRequest $request)
    {
        $input = $request->except('brochure_pdf','brochure_doc');

        $image = FileService::imageUploader($request, 'image', $this->image_directory);
        if ($image != null) {
            $input['image'] = $image;
        }
        $icon = FileService::imageUploader($request, 'icon', $this->image_directory);
        if ($icon != null) {
            $input['icon'] = $icon;
        }
        $service =  $this->serviceService->create($input);
        $brochure_pdf = FileService::imageUploader($request, 'brochure_pdf', $this->image_directory);
        if ($brochure_pdf != null) {
            ServiceDoc::create(['type' => 1,'file' => $brochure_pdf, 'service_id' => $service->id]);
        }
        $brochure_doc = FileService::imageUploader($request, 'brochure_doc', $this->image_directory);
        if ($brochure_doc != null) {
            ServiceDoc::create(['type' => 2,'file' => $brochure_doc, 'service_id' => $service->id]);
        }

        return redirect()->route($this->index_route_name)
            ->with('success', $this->mls->messageLanguage('created', 'service', 1));
    }
    /**
    * Display the specified resource.
    *
    * @param service $service
    * @return \Illuminate\Http\Response
    */
    public function show(Service $service)
    {
    
        return  view($this->detail_view, compact('service'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Service $service)
    {
        return view($this->edit_view, compact('service'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(ServiceRequest $request, Service $service)
    {
        $input = $request->except('brochure_pdf','brochure_doc');
        if (!empty($input['image'])) {
            $image = FileService::imageUploader($request, 'image', $this->image_directory);
            if ($image != null) {
                $input['image'] = $image;
            }
        } else {
            $input = Arr::except($input, array('image'));
        }
        if (!empty($input['icon'])) {
            $icon = FileService::imageUploader($request, 'icon', $this->image_directory);
            if ($icon != null) {
                $input['icon'] = $icon;
            }
        } else {
            $input = Arr::except($input, array('icon'));
        }
        $service->update($input);

        if (isset($request->brochure_pdf)) {
            $old_pdf = ServiceDoc::where(['service_id' => $service->id, 'type' => 1])->first();
            $brochure_pdf = FileService::imageUploader($request, 'brochure_pdf', $this->image_directory);
            if ($brochure_pdf != null) {
                if(isset($old_pdf)){
                    $old_pdf->update(['file' => $brochure_pdf]);
                }else{
                    ServiceDoc::create(['type' => 1,'file' => $brochure_pdf, 'service_id' => $service->id]);
                }
            }
        }

        if (isset($request->brochure_doc)) {
            $old_doc = ServiceDoc::where(['service_id' => $service->id, 'type' => 2])->first();
            $brochure_doc = FileService::imageUploader($request, 'brochure_doc', $this->image_directory);
            if ($brochure_doc != null) {
                if(isset($old_doc)){
                    $old_doc->update(['file' => $brochure_doc]);
                }else{
                    ServiceDoc::create(['type' => 2,'file' => $brochure_doc, 'service_id' => $service->id]);
                }
            }
        }

        return redirect()->route($this->index_route_name)
            ->with('success', $this->mls->messageLanguage('updated', 'service', 1));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Service $service)
    {
        $result = $service->delete();
        return $this->webUtilityService->swalWithTitleResponse($result, 'deleted', 'service');
    }

    public function status($id, $status)
    {
        $status = ($status == 1) ? 0 : 1;
        $result = $this->serviceService->updateById(['is_active' => $status], $id);
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
