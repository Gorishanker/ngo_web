@extends('admin.layouts.base')
@section('content')
    @include('admin.layouts.components.header', [
        'title' => __('messages.create', ['name' => trans_choice('content.banner', 1)]),
        'breadcrumbs' => Breadcrumbs::render('admin.banners.create'),
    ])
    <div class="grid grid-cols-12 gap-6">

        <div class="col-span-12 lg:col-span-12 xxl:col-span-12">
    
            <div class="grid grid-cols-12 gap-5">
    
                <div class="col-span-12">
    
                    <div class="box">
    
                        <div class="p-5">
                            {!! Form::open([
                                'route' => 'admin.banners.store',
                                'method' => 'POST',
                                'class' => 'form',
                                'enctype' => 'multipart/form-data',
                            ]) !!}
    
                            @include('admin.banner.form')
                            {!! Form::close() !!}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
