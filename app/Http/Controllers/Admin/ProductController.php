<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\ProductRequest;
use App\Models\Product;
use App\Models\ProductImage;
use App\Services\ProductService;
use App\Services\FileService;
use App\Services\ManagerLanguageService;
use App\Services\WebUtilityService;
use Illuminate\Support\Arr;

class ProductController extends Controller
{
    protected $mls, $image_directory;
    protected $index_view, $create_view, $edit_view, $detail_view;
    protected $index_route_name, $create_route_name, $edit_route_name;
    protected $productService, $webUtilityService;

    public function __construct()
    {

        //route
        $this->index_route_name = 'admin.products.index';
        $this->create_route_name = 'admin.products.create';
        $this->edit_route_name = 'admin.products.edit';

        //view files
        $this->index_view = 'admin.product.index';
        $this->create_view = 'admin.product.create';
        $this->detail_view = 'admin.product.details';
        $this->edit_view = 'admin.product.edit';
        $this->image_directory = 'files/products';

        //product files
        $this->productService = new ProductService();
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
            $items = ProductService::datatable();
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
    public function store(ProductRequest $request)
    {
        $input = $request->except('side_images');

        $image = FileService::imageUploader($request, 'image', $this->image_directory);
        if ($image != null) {
            $input['image'] = $image;
        }
        $product = $this->productService->create($input);


        $side_images = [];

        if ($request->hasFile('side_images')) {
            $images = FileService::multipleImageUploader($request, 'side_images', $this->image_directory);

            for ($i = 0; $i < count($images); $i++) {
                $side_images[$i]['product_id'] = $product->id;
                $side_images[$i]['image'] = $images[$i];
            }
            ProductImage::insert($side_images);
        }

        return redirect()->route($this->index_route_name)
            ->with('success', $this->mls->messageLanguage('created', 'product', 1));
    }
    /**
     * Display the specified resource.
     *
     * @param product $product
     * @return \Illuminate\Http\Response
     */
    public function show(Product $product)
    {
        return  view($this->detail_view, compact('product'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Product $product)
    {
        return view($this->edit_view, compact('product'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(ProductRequest $request, Product $product)
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
        $product->update($input);

        if ($request->hasFile('side_images')) {
            $side_images = [];
            $old_images = ProductImage::where(['product_id' => $product->id])->delete();
            $images = FileService::multipleImageUploader($request, 'side_images', $this->image_directory);

            for ($i = 0; $i < count($images); $i++) {
                $side_images[$i]['product_id'] = $product->id;
                $side_images[$i]['image'] = $images[$i];
            }
            ProductImage::insert($side_images);
        }

        return redirect()->route($this->index_route_name)
            ->with('success', $this->mls->messageLanguage('updated', 'product', 1));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Product $product)
    {
        $result = $product->delete();
        return $this->webUtilityService->swalWithTitleResponse($result, 'deleted', 'product');
    }

    public function status($id, $status)
    {
        $status = ($status == 1) ? 0 : 1;
        $result = $this->productService->updateById(['is_active' => $status], $id);
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
