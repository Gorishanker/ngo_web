@extends('admin.layouts.base')
@section('content')
    @include('admin.layouts.components.header', [
        'title' => __('messages.edit', ['name' => trans_choice('content.product', 1)]),
        'breadcrumbs' => Breadcrumbs::render('admin.products.edit'),
    ])
    <div class="grid grid-cols-12 gap-6">
        <div class="col-span-12 lg:col-span-12 xxl:col-span-12">
            <div class="grid grid-cols-12 gap-5">
                <div class="col-span-12">
                    <div class="box">
                        <div class="p-5">
                            {!! Form::model($product, [
                                'route' => ['admin.products.update', $product->id],
                                'method' => 'PATCH',
                                'class' => 'form',
                                'enctype' => 'multipart/form-data',
                            ]) !!}
                               <input type="hidden" name="id" value="{{ $product->id }}">
                            @include('admin.product.form')
                            {!! Form::close() !!}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @endsection
