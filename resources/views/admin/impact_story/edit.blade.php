@extends('admin.layouts.base')
@section('content')
    @include('admin.layouts.components.header', [
        'title' => __('messages.edit', ['name' => trans_choice('content.impact_story', 1)]),
        'breadcrumbs' => Breadcrumbs::render('admin.impact-stories.edit'),
    ])
    <div class="grid grid-cols-12 gap-6">
        <div class="col-span-12 lg:col-span-12 xxl:col-span-12">
            <div class="grid grid-cols-12 gap-5">
                <div class="col-span-12">
                    <div class="box">
                        <div class="p-5">
                            {!! Form::model($impact_story, [
                                'route' => ['admin.impact-stories.update', $impact_story->id],
                                'method' => 'PATCH',
                                'class' => 'form',
                                'enctype' => 'multipart/form-data',
                            ]) !!}
                               <input type="hidden" name="id" value="{{ $impact_story->id }}">
                            @include('admin.impact_story.form')
                            {!! Form::close() !!}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @endsection
