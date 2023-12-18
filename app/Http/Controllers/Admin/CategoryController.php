<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\CategoryRequest;
use App\Models\Category;
use App\Services\CategoryService;
use App\Services\ManagerLanguageService;
use App\Services\UtilityService;

class CategoryController extends Controller
{
    protected $mls;
    protected $index_view, $create_view, $edit_view, $detail_view;
    protected $index_route_name, $create_route_name, $detail_route_name, $edit_route_name;
    protected $categoryService, $utilityService;

    public function __construct()
    {
        //route
        $this->index_route_name = 'admin.categories.index';
        $this->detail_route_name = 'admin.categories.show';
        $this->edit_route_name = 'admin.categories.edit';

        //view files
        $this->index_view = 'admin.category.index';
        $this->detail_view = 'admin.category.details';
        $this->edit_view = 'admin.category.edit';

        //service files
        $this->categoryService = new CategoryService();
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
        
        $items = $this->categoryService->dataTable();
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
    public function store(CategoryRequest $request)
    {
        $input = $request->validated();
        $category = Category::create($input);
        if (isset($category)) {
            return response()->json([
                'status' => true,
                'message' => 'Category created successfully.',
            ], 200);
        } else {
            return response()->json([
                'status' => false,
                'message' => 'Error! while creating categories.',
            ], 422);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Category $category)
    {
        $html = view($this->detail_view, compact('category'))->render();
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
    public function edit(Category $category)
    {
        $html = view($this->edit_view, compact('category'))->render();
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
    public function update(CategoryRequest $request, Category $category)
    {
        $input = $request->validated();
        if ($category->language == 'hi') {
            $input = [
                'category_name' => $request->category_name_h,
                'is_active' => $request->is_active_h,
                'language' => 'hi', 
            ];
        }

        $data = $category->update($input);
        if (isset($data)) {
            return response()->json([
                'status' => true,
                'message' => 'Category created successfully.',
            ], 200);
        } else {
            return response()->json([
                'status' => false,
                'message' => 'Error! while creating category.',
            ], 422);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Category $category)
    {
        $result = $category->delete();
        if ($result) {
            return response()->json([
                'status' => 1,
                'title' => $this->mls->onlyNameLanguage('deleted_title'),
                'message' => $this->mls->onlyNameLanguage('category'),
                'status_name' => 'success'
            ]);
        } else {
            return response()->json([
                'status' => 0,
                'title' => $this->mls->onlyNameLanguage('deleted_title'),
                'message' => $this->mls->onlyNameLanguage('category'),
                'status_name' => 'error'
            ]);
        }
    }

    public function status($id, $status)
    {
        $status = ($status ==1) ? 0 : 1;
        $result = CategoryService::status(['is_active' => $status], $id);
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
