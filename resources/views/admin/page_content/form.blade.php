@if (isset($page_content))
    <input type="hidden" id="modal_id" name="id" value="{{ $page_content->id }}">
    <input type="hidden" id="method" name="method" value="PUT">
@endif

<div class="grid grid-cols-12 gap-5 mt-5">
    <div class="col-span-12 form-group xl:col-span-12">
        <label class="required">{{ trans_choice('content.title', 1) }}</label>
        {!! Form::text('title', isset($page_content->title) ? $page_content->title : null, [
            'placeholder' => trans_choice('content.title', 1),
            'class' => 'input w-full rounded-full border bg-gray-100 mt-2',
        ]) !!}
    </div>
    <div class="hidden col-span-12 form-group xl:col-span-6">
        <label class="required">{{ trans_choice('content.status', 1) }}</label>
        {{ Form::select(
            'is_active',
            [0 => 'Inactive', 1 => 'Active'],
            isset($page_content->is_active) ? $page_content->is_active : 1,
            [
                'class' => 'input select w-full border bg-gray-100 mt-2',
                'placeholder' => trans_choice('content.status', 1),
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
@push('scripts')
    <script type="text/javascript" src="{{ asset('vendor/jsvalidation/js/jsvalidation.js') }}"></script>
    {!! JsValidator::formRequest('App\Http\Requests\Admin\PageContentRequest', 'form') !!}
@endpush
