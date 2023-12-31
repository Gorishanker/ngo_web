@if ($errors->any())
    <div class="alert alert-danger">
        <p><strong>Opps Something went wrong</strong></p>
        {{-- <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul> --}}
    </div>
@endif
@php
    $pdf_url = null;
    $doc_url = null;
    if (isset($service->service_docs)) {
        if ($service->service_docs->count() > 0) {
            foreach ($service->service_docs as $doc) {
                if ($doc->type == 1) {
                    $pdf_url = $doc->file;
                } elseif ($doc->type == 2) {
                    $doc_url = $doc->file;
                }
            }
        }
    }
@endphp
<div class="grid grid-cols-12 gap-5 mt-5">
    <div class="col-span-12 form-group xl:col-span-6">
        <label class="required">{{ trans_choice('content.title', 1) }}</label>
        {!! Form::text('title', null, [
            'class' => 'input w-full border bg-gray-100 mt-2',
            'placeholder' => trans_choice('content.title', 1),
        ]) !!}
    </div>
    <div class="col-span-12 form-group xl:col-span-6">
        <label class="required">{{ trans_choice('content.is_active', 1) }}</label>
        {!! Form::select('is_active', statusArray(), null, [
            'placeholder' => trans_choice('content.please_select', 1),
            'class' => 'input w-full border bg-gray-100 mt-2',
        ]) !!}
    </div>

    <div class="col-span-12 form-group xl:col-span-{{ isset($doc_url) ? 4 : 6 }}">
        <label class="required">{{ trans_choice('content.brochure_doc', 1) }}</label>
        {!! Form::file('brochure_doc', [
            'class' => 'input w-full border bg-gray-100 mt-2',
            'id' => 'brochure_doc',
            'placeholder' => __('Upload Document '),
        ]) !!}
    </div>
    @if (isset($doc_url))
        <div class="col-span-12 xl:col-span-2 mt-2" style="padding-top:30px;">
            <a href="{{ $doc_url }}" target="_blank">
                <button type="button"
                    class="text-white bg-gradient-to-r from-blue-500 via-blue-600 to-blue-700 hover:bg-gradient-to-br focus:ring-4 focus:outline-none focus:ring-blue-300 dark:focus:ring-blue-800 font-medium rounded-lg text-sm px-5 py-2.5 text-center me-2 mb-2">View
                    file</button>
            </a>
        </div>
    @endif
    <div class="col-span-12 form-group xl:col-span-{{ isset($pdf_url) ? 4 : 6 }}">
        <label class="required">{{ trans_choice('content.brochure_pdf', 1) }}</label>
        {!! Form::file('brochure_pdf', [
            'class' => 'input w-full border bg-gray-100 mt-2',
            'id' => 'brochure_pdf',
            'accept' => 'application/pdf',
            'placeholder' => __('Upload Pdf '),
        ]) !!}
    </div>
    @if (isset($pdf_url))
        <div class="col-span-12 xl:col-span-2 mt-2" style="padding-top:30px;">
            <a href="{{ $pdf_url }}" target="_blank">
                <button type="button"
                    class="text-white bg-gradient-to-r from-blue-500 via-blue-600 to-blue-700 hover:bg-gradient-to-br focus:ring-4 focus:outline-none focus:ring-blue-300 dark:focus:ring-blue-800 font-medium rounded-lg text-sm px-5 py-2.5 text-center me-2 mb-2">View
                    file</button>
            </a>
        </div>
    @endif
    <div class="col-span-12 form-group xl:col-span-4">
        <label class="required">{{ trans_choice('content.image', 1) }}</label>
        {!! Form::file('image', [
            'class' => 'input w-full border bg-gray-100 mt-2',
            'id' => 'image',
            'onchange' => 'readURL(this, image);',
            'accept' => 'image/x-png,image/jpg,image/jpeg,image/png',
            'placeholder' => __('Upload Image '),
        ]) !!}
    </div>
    <div class="col-span-12 xl:col-span-2 mt-4">
        @if (isset($service->image))
            <img id="backImage_image" width="80px" height="80px" src="{{ $service->image }}" title="Image">
        @else
            <img id="backImage_image" src="{{ blankImageUrl() }}" width="80px" height="80px" title="Image">
        @endif
    </div>
    <div class="col-span-12 form-group xl:col-span-4">
        <label class="required">{{ trans_choice('content.icon', 1) }}</label>
        {!! Form::file('icon', [
            'class' => 'input w-full border bg-gray-100 mt-2',
            'id' => 'icon',
            'onchange' => 'readURL(this, icon);',
            'accept' => 'image/x-png,image/jpg,image/jpeg,image/png',
            'placeholder' => __('Upload Icon '),
        ]) !!}
    </div>
    <div class="col-span-12 xl:col-span-2 mt-4">
        @if (isset($service->icon))
            <img id="backImage_icon" width="80px" height="80px" src="{{ $service->icon }}" title="Icon">
        @else
            <img id="backImage_icon" src="{{ blankImageUrl() }}" width="80px" height="80px" title="Icon">
        @endif
    </div>
    <div class="col-span-12 form-group xl:col-span-12">
        <label class="required">{{ trans_choice('content.content', 1) }}</label>
        {!! Form::textarea('content', null, [
            'class' => 'input w-full summernote border bg-gray-100 mt-2',
            'placeholder' => trans_choice('content.content', 1),
        ]) !!}
        @if ($errors->has('content'))
            <span class="invalid-feedback" style="display: block;">{{ $errors->first('content') }}</span>
        @endif
    </div>
</div>
<div class="text-right mt-6">
    <div class="mr-6">
        <a href="{{ route('admin.services.index') }}">
            <button type="button" class="button mr-2 bg-theme-1 text-white">
                Back</button></a>

        <button type="submit" class="button w-24 bg-theme-1 text-white">Save</button>
    </div>
</div>


@push('scripts')
    <script type="text/javascript" src="{{ asset('vendor/jsvalidation/js/jsvalidation.js') }}"></script>
    {!! JsValidator::formRequest('App\Http\Requests\Admin\ServiceRequest', 'form') !!}
@endpush
