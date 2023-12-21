@php
    $d_lang = 'both';
    $lng = null;
    if (isset($page_content)) {
        $d_lang = null;
        if ($page_content->language == 'hi') {
            $lng = 'hi';
        } else {
            $lng = 'en';
        }
    }
@endphp
@if (isset($page_content))
    <input type="hidden" id="modal_id" name="id" value="{{ $page_content->id }}">
    <input type="hidden" id="method" name="method" value="PUT">
    <input type="hidden" name="language" value="{{ $page_content->language }}">
@endif
@if ($lng == 'en' || $d_lang == 'both')
    <div class="mt-3">
        <h2 class="font-bold text-center text-lg">English Form</h2>
    </div>
    <div class="grid grid-cols-12 gap-5 mt-5">
        <div class="col-span-12 form-group xl:col-span-6">
            <label class="required">{{ trans_choice('content.title', 1) }}</label>
            {!! Form::text('title', isset($page_content->title) ? $page_content->title : null, [
                'placeholder' => trans_choice('content.title', 1),
                'class' => 'input w-full rounded-full border bg-gray-100 mt-2',
            ]) !!}
        </div>
        <div class="col-span-12 form-group xl:col-span-6">
            <label class="required">{{ trans_choice('content.status', 1) }}</label>
            {{ Form::select(
                'is_active',
                [0 => 'Inactive', 1 => 'Active'],
                isset($page_content->is_active) ? $page_content->is_active : null,
                [
                    'class' => 'input select w-full border bg-gray-100 mt-2',
                    'placeholder' => trans_choice('content.status', 1),
                ],
            ) }}
        </div>
    </div>
    <div class="grid grid-cols-12 gap-5 mt-5">
        <div class="col-span-12 form-group xl:col-span-6">
            <label class="required">User type</label>
            {{ Form::select(
                'user_type',
                [1 => 'Customer', 2 => 'Guruji'],
                isset($page_content->user_type) ? $page_content->user_type : null,
                [
                    'class' => 'input select w-full border bg-gray-100 mt-2',
                    'placeholder' => 'User type',
                ],
            ) }}
        </div>
    </div>
    <div class="col-span-12 form-group xl:col-span-6 mt-5">
        <label class="required">{{ trans_choice('content.content', 1) }}</label>
        {!! Form::textarea('content', isset($page_content->content) ? $page_content->content : null, [
            'class' => 'input w-full border bg-gray-100 mt-2 summernote',
            'placeholder' => trans_choice('content.content', 1),
        ]) !!}
         @if ($errors->has('content'))
         <span class="invalid-feedback" style="display: block;">{{ $errors->first('content') }}</span>
     @endif
    </div>
@endif
@if ($lng == 'hi' || $d_lang == 'both')
    <div class="mt-3">
        <h2 class="font-bold text-center text-lg">हिंदी फ़ार्म</h2>
    </div>
    <div class="grid grid-cols-12 gap-5 mt-5">
        <div class="col-span-12 form-group xl:col-span-6">
            <label class="required">{{ trans_choice('content.title', 1) }}</label>
            {!! Form::text('title_h', isset($page_content->title) ? $page_content->title : null, [
                'placeholder' => trans_choice('content.title', 1),
                'class' => 'input w-full rounded-full border bg-gray-100 mt-2',
            ]) !!}
        </div>
        <div class="col-span-12 form-group xl:col-span-6">
            <label class="required">{{ trans_choice('content.status', 1) }}</label>
            {{ Form::select(
                'is_active_h',
                [0 => 'Inactive', 1 => 'Active'],
                isset($page_content->is_active) ? $page_content->is_active : null,
                [
                    'class' => 'input select w-full border bg-gray-100 mt-2',
                    'placeholder' => trans_choice('content.status', 1),
                ],
            ) }}
        </div>
    </div>
    <div class="grid grid-cols-12 gap-5 mt-5">
        <div class="col-span-12 form-group xl:col-span-6">
            <label class="required">User type</label>
            {{ Form::select(
                'user_type_h',
                [1 => 'Customer', 2 => 'Guruji'],
                isset($page_content->user_type) ? $page_content->user_type : null,
                [
                    'class' => 'input select w-full border bg-gray-100 mt-2',
                    'placeholder' => 'User type',
                ],
            ) }}
        </div>
    </div>
    <div class="col-span-12 form-group xl:col-span-6 mt-5">
        <label class="required">{{ trans_choice('content.content', 1) }}</label>
        {!! Form::textarea('content_h', isset($page_content->content) ? $page_content->content : null, [
            'class' => 'input w-full border bg-gray-100 mt-2 summernote',
            'placeholder' => trans_choice('content.content', 1),
        ]) !!}
         @if ($errors->has('content'))
         <span class="invalid-feedback" style="display: block;">{{ $errors->first('content') }}</span>
     @endif
    </div>
@endif
@push('scripts')
    <script type="text/javascript" src="{{ asset('vendor/jsvalidation/js/jsvalidation.js') }}"></script>
    {!! JsValidator::formRequest('App\Http\Requests\Admin\PageContentRequest', 'form') !!}
@endpush
