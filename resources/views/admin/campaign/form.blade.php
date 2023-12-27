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
<div class="grid grid-cols-12 gap-5 mt-5">
    <div class="col-span-12 form-group xl:col-span-6">
        <label class="required">{{ trans_choice('content.title', 1) }}</label>
        {!! Form::text('title', null, [
            'class' => 'input w-full border bg-gray-100 mt-2',
            'placeholder' => trans_choice('content.title', 1),
        ]) !!}
    </div>
    <div class="col-span-12 form-group xl:col-span-6">
        <label class="required">{{ trans_choice('content.target_amount', 1) }}</label>
        {!! Form::text('target_amount', null, [
            'class' => 'input w-full border bg-gray-100 mt-2',
            'placeholder' => trans_choice('content.target_amount', 1),
        ]) !!}
    </div>
   
    <div class="col-span-12 form-group xl:col-span-6">
        <label class="required">{{ trans_choice('content.is_active', 1) }}</label>
        {!! Form::select('is_active', statusArray(), null, [
            'placeholder' => trans_choice('content.please_select', 1),
            'class' => 'input w-full border bg-gray-100 mt-2',
        ]) !!}
    </div>
</div>
<div class="inline-flex items-center justify-center w-full">
    <hr style="width: 100%" class="h-1 my-8 bg-gray-200 border-0 rounded dark:bg-gray-700">
    <div class="absolute px-4 -translate-x-1/2 bg-white left-1/2 dark:bg-gray-900">
        <span style="padding: 7px; cursor: cell;" id="addMoreInput" data-id="1"
            class="bg-blue-100 text-blue-800 text-xs font-medium me-2 px-2.5 py-0.5 rounded dark:bg-gray-700 dark:text-blue-400 border border-blue-400">Add
            More Combo</span>
    </div>
</div>
<div class="grid grid-cols-12 gap-5 mt-5" id="addMoreCertificateSections">
    @if (isset($combos) && $combos->count())
        @php
            $combo_count = 100;
        @endphp
        @foreach ($combos as $combo)
            <div class="col-span-12 form-group xl:col-span-6" id="addMoreCertificateSection0">
                <label>Combo name</label>
                {!! Form::text('combo[' . $combo_count . '][name]', $combo->name, [
                    'class' => 'input w-full border bg-gray-100 mt-2',
                    'placeholder' => 'Combo name',
                ]) !!}
            </div>
            <div class="col-span-12 form-group xl:col-span-6" id="addMoreCertificateSection0">
                <label>Combo price </label>
                {!! Form::text('combo[' . $combo_count . '][price]', $combo->price, [
                    'class' => 'input w-full only_number border bg-gray-100 mt-2',
                    'placeholder' => 'Combo price',
                ]) !!}
            </div>
            @php
                $combo_count++;
            @endphp
        @endforeach
    @else
        <div class="col-span-12 form-group xl:col-span-6" id="addMoreCertificateSection0">
            <label>Combo name</label>
            {!! Form::text('combo[0][name]', null, [
                'class' => 'input w-full border bg-gray-100 mt-2',
                'placeholder' => 'Combo name',
            ]) !!}
        </div>
        <div class="col-span-12 form-group xl:col-span-6" id="addMoreCertificateSection0">
            <label>Combo price </label>
            {!! Form::text('combo[0][price]', null, [
                'class' => 'input w-full only_number border bg-gray-100 mt-2',
                'placeholder' => 'Combo price',
            ]) !!}
        </div>
    @endif
</div>
<div id="toast-danger"
    class="flex hidden degree-tostar items-center w-full max-w-xs p-4 mb-4 text-gray-500 bg-white rounded-lg shadow dark:text-gray-400 dark:bg-gray-800"
    role="alert">
    <div
        class="inline-flex items-center justify-center flex-shrink-0 w-8 h-8 text-red-500 bg-red-100 rounded-lg dark:bg-red-800 dark:text-red-200">
        <svg class="w-5 h-5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor"
            viewBox="0 0 20 20">
            <path
                d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5Zm3.707 11.793a1 1 0 1 1-1.414 1.414L10 11.414l-2.293 2.293a1 1 0 0 1-1.414-1.414L8.586 10 6.293 7.707a1 1 0 0 1 1.414-1.414L10 8.586l2.293-2.293a1 1 0 0 1 1.414 1.414L11.414 10l2.293 2.293Z" />
        </svg>
        <span class="sr-only">Error icon</span>
    </div>
    <div class="ms-3 text-sm font-normal">You can not add more then 10 inputs.</div>
    <button type="button"
        class="ms-auto -mx-1.5 -my-1.5 bg-white text-gray-400 hover:text-gray-900 rounded-lg focus:ring-2 focus:ring-gray-300 p-1.5 hover:bg-gray-100 inline-flex items-center justify-center h-8 w-8 dark:text-gray-500 dark:hover:text-white dark:bg-gray-800 dark:hover:bg-gray-700"
        data-dismiss-target="#toast-danger" aria-label="Close">
        <span class="sr-only">Close</span>
        <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
        </svg>
    </button>
</div>

<div class="grid grid-cols-12 gap-5 mt-5">
    <div class="col-span-12 form-group xl:col-span-6">
        <label class="required">{{ trans_choice('content.image', 1) }}</label>
        {!! Form::file('image', [
            'class' => 'input w-full border bg-gray-100 mt-2',
            'id' => 'image',
            'onchange' => 'readURL(this, image);',
            'accept' => 'image/x-png,image/jpg,image/jpeg,image/png',
            'placeholder' => __('Upload Image '),
        ]) !!}
    </div>
    <div class="col-span-12 xl:col-span-6 mt-4">
        @if (isset($campaign->image))
            <img id="backImage_image" width="80px" height="80px" src="{{ $campaign->image }}" title="Image">
        @else
            <img id="backImage_image" src="{{ blankImageUrl() }}" width="80px" height="80px" title="Image">
        @endif
    </div>
    <div class="col-span-12 form-group xl:col-span-6">
        <label class="">Hint</label>
        {!! Form::textarea('hint', null, [
            'class' => 'input summernote w-full border bg-gray-100 mt-2',
            'rows' => 9,
            'placeholder' => 'Hint',
        ]) !!}
    </div>
    <div class="col-span-12 form-group xl:col-span-6">
        <label class="">Benefit</label>
        {!! Form::textarea('benefit', null, [
            'class' => 'input w-full summernote border bg-gray-100 mt-2',
            'placeholder' => 'Benefit',
        ]) !!}
    </div>
    <div class="col-span-12 form-group xl:col-span-6">
        <label class="">Short description</label>
        {!! Form::textarea('short_description', null, [
            'class' => 'input w-full summernote border bg-gray-100 mt-2',
            'placeholder' => 'Short description',
        ]) !!}
    </div>
    <div class="col-span-12 form-group xl:col-span-6">
        <label class="">Primary description</label>
        {!! Form::textarea('primary_description', null, [
            'class' => 'input w-full summernote border bg-gray-100 mt-2',
            'placeholder' => 'Primary description',
        ]) !!}
    </div>
    <div class="col-span-12 form-group xl:col-span-6">
        <label class="">Secondary description</label>
        {!! Form::textarea('secondary_description', null, [
            'class' => 'input w-full summernote border bg-gray-100 mt-2',
            'placeholder' => 'Secondary description',
        ]) !!}
    </div>
</div>
<div class="text-right mt-6">
    <div class="mr-6">
        <a href="{{ route('admin.campaigns.index') }}">
            <button type="button" class="button mr-2 bg-theme-1 text-white">
                Back</button></a>

        <button type="submit" class="button w-24 bg-theme-1 text-white">Save</button>
    </div>
</div>

@push('scripts')
    <script type="text/javascript" src="{{ asset('vendor/jsvalidation/js/jsvalidation.js') }}"></script>
    {!! JsValidator::formRequest('App\Http\Requests\Admin\CampaignRequest', 'form') !!}
    <script>
        $(document).on('click', '#addMoreInput', function() {
            var data_id = $(this).attr('data-id');
            if (data_id == '11' || data_id == 11) {
                $('#toast-danger').removeClass('hidden');
                return false;
            }
            $(this).attr('data-id', parseInt(data_id, 10) + 1);
            $('#addMoreCertificateSections').append(`<div class="col-span-12 form-group xl:col-span-5 position: relative addMoreCertificateSection${data_id}">
                <label>Combo name</label>
                {!! Form::text('combo[${data_id}][name]', null, [
                    'class' => 'input w-full rounded-full border bg-gray-100 mt-2',
                    'placeholder' => 'Combo name',
                ]) !!}
            </div>
            <div class="col-span-12 form-group xl:col-span-5 position: relative addMoreCertificateSection${data_id}">
                <label>Combo price </label>
                {!! Form::text('combo[${data_id}][price]', null, [
                    'class' => 'input w-full only_number rounded-full border bg-gray-100 mt-2',
                    'placeholder' => 'Combo name',
                ]) !!}
            </div>
            <div class="col-span-12 addMoreCertificateSection addMoreCertificateSection${data_id} form-group xl:col-span-1 position: relative" style="margin-top: 28px;"
                id="${data_id}">
                <div
                    class="bg-transparent hover:bg-red-500 text-red-700 font-semibold hover:text-white py-2 px-4 border border-red-500 hover:border-transparent rounded">
                    Remove
                </div>
            </div>`);
        });
        $(document).on('click', '.remove_exists_certificate', function() {
            var id = $(this).data('id');
            var elem = $('.exists_certificate' + id);
            var url = `{{ url('/') }}/admin/gurujis/delete-certificates/` + id;
            $.ajax({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    url: url,
                    type: 'DELETE',
                    dataType: 'json'
                })
                .done(function(response) {
                    if (response.status == 1) {
                        elem.remove();
                        Swal.fire('Deleted!', response.message, 'success');
                    } else {
                        Swal.fire('Info!', response.message, 'info');
                    }
                })
                .fail(function() {
                    Swal.fire('Oops...', 'Something went wrong!', 'error');
                });
        });

        $(document).on('click', '.addMoreCertificateSection', function() {
            var data_id = $(this).attr('id');
            $('.addMoreCertificateSection' + data_id).remove();
        });
    </script>
@endpush
