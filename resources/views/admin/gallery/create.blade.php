<div class="grid grid-cols-12 gap-6">

    <div class="col-span-12 lg:col-span-12 xxl:col-span-12">

        <div class="grid grid-cols-12 gap-5">

            <div class="col-span-12">

                <div class="box">

                    <div class="p-5">
                        {!! Form::open([
                            'route' => 'admin.galleries.store',
                            'id' => 'MediaForm',
                            'method' => 'POST',
                            'class' => 'form',
                            'enctype' => 'multipart/form-data',
                        ]) !!}

                        <div class="grid grid-cols-12 gap-5 mt-5">
                            <div class="col-span-12 form-group xl:col-span-6">
                                <label class="required">Categories</label>
                                {{ Form::select('category', $categories, null, [
                                    'class' => 'input select w-full border bg-gray-100 mt-2',
                                    'placeholder' => trans_choice('content.please_select', 1),
                                ]) }}
                            </div>
                            <div class="col-span-12 form-group xl:col-span-6">
                                <label class="required">Upload File</label>
                                {!! Form::file('files[]', [
                                    'class' => 'input w-full border bg-gray-100 mt-2',
                                    'accept' => 'image/*',
                                    'id' => 'media_image',
                                    'multiple' => true,
                                    'onchange' => 'readURL(this, image);',
                                    'placeholder' => __('Upload File '),
                                ]) !!}
                            </div>
                        </div>
                        <div class="col-span-12  xl:col-span-2 mt-4 MediaImgPreview" style="margin-left: 100px"></div>

                        <div class="text-right mt-6">
                            <div class="mr-6"><button type="button" id="btnClosePopupAdd"
                                    class="button mr-2 bg-theme-1 text-white">
                                    Close</button>

                                <button id="submit_form" type="submit"
                                    class="button w-24 bg-theme-1 text-white">Save</button>
                            </div>
                        </div>
                        {!! Form::close() !!}
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@push('scripts')
    <script type="text/javascript" src="{{ asset('vendor/jsvalidation/js/jsvalidation.js') }}"></script>
    {!! JsValidator::formRequest('App\Http\Requests\Admin\GalleryRequest', 'form') !!}
  
@endpush
