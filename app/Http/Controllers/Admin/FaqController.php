<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\FaqRequest;
use App\Models\Faq;
use App\Services\FaqService;
use App\Services\ManagerLanguageService;
use App\Services\UtilityService;

class FaqController extends Controller
{
    protected $mls;
    protected $index_view, $create_view, $edit_view, $detail_view;
    protected $index_route_name, $create_route_name, $detail_route_name, $edit_route_name;
    protected $categoryService, $utilityService;

    public function __construct()
    {
        //route
        $this->index_route_name = 'admin.faqs.index';
        $this->detail_route_name = 'admin.faqs.show';
        $this->edit_route_name = 'admin.faqs.edit';

        //view files
        $this->index_view = 'admin.faq.index';
        $this->detail_view = 'admin.faq.details';
        $this->edit_view = 'admin.faq.edit';

        //service files
        $this->categoryService = new FaqService();
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
    public function store(FaqRequest $request)
    {
        $input = $request->validated();
        $faq =$this->categoryService->create($input);
        if (isset($faq)) {
            return response()->json([
                'status' => true,
                'message' => 'Faq created successfully.',
            ], 200);
        } else {
            return response()->json([
                'status' => false,
                'message' => 'Error! while creating Faq.',
            ], 422);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Faq $faq)
    {
        $html = view($this->detail_view, compact('faq'))->render();
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
    public function edit(Faq $faq)
    {
        $html = view($this->edit_view, compact('faq'))->render();
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
    public function update(FaqRequest $request, Faq $faq)
    {
        $input = $request->validated();
        $data = $faq->update($input);
        if (isset($data)) {
            return response()->json([
                'status' => true,
                'message' => 'Faq created successfully.',
            ], 200);
        } else {
            return response()->json([
                'status' => false,
                'message' => 'Error! while creating faq.',
            ], 422);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Faq $faq)
    {
        $result = $faq->delete();
        if ($result) {
            return response()->json([
                'status' => 1,
                'title' => $this->mls->onlyNameLanguage('deleted_title'),
                'message' => $this->mls->onlyNameLanguage('faq'),
                'status_name' => 'success'
            ]);
        } else {
            return response()->json([
                'status' => 0,
                'title' => $this->mls->onlyNameLanguage('deleted_title'),
                'message' => $this->mls->onlyNameLanguage('faq'),
                'status_name' => 'error'
            ]);
        }
    }

    public function status($id, $status)
    {
        $status = ($status == 1) ? 0 : 1;
        $result = FaqService::status(['is_active' => $status], $id);
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
