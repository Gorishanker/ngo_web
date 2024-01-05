@extends('admin.layouts.base')
@section('content')
    @include('admin.layouts.components.header', [
        'title' => __('messages.list', [
            'name' => trans_choice('content.gallery', 1),
        ]),
        'breadcrumbs' => Breadcrumbs::render('admin.galleries.index'),
        'create_modal' => [
            'status' => true,
            'id' => 'addNewMediaModal',
            'name' => 'Media',
        ],
    ])
    @include('admin.layouts.components.manager_modal.details', [
        'modal_id' => 'viewDataModal',
    ])
    @php
        $add_data = view('admin.gallery.create', compact('categories'));
    @endphp
    @include('admin.layouts.components.manager_modal.create_form', [
        'modal_form_html' => $add_data,
        'modal_id' => 'addNewMediaModal',
    ])

    {!! Form::open([
        'route' => 'admin.galleries.index',
        'method' => 'GET',
        'class' => 'mt-3 formBackground py-3 px-4',
    ]) !!}
    <div class="grid grid-cols-12 gap-5 mt-5">
        <div class="col-span-12 xl:col-span-3">
            <label>Categories</label>
            {!! Form::select('category_f', $categories, isset(request()->category_f) ? request()->category_f : null, [
                'placeholder' => 'Select',
                'class' => 'input w-full border bg-gray-10 mt-2',
            ]) !!}
        </div>

        {{-- <div class="col-span-12 xl:col-span-3">
            <label>Date range</label>
            {!! Form::text('date_range', isset(request()->date_range) ? request()->date_range : null, [
                'placeholder' => 'Date range',
                'class' => 'input w-full datepicker border bg-gray-10 mt-2',
            ]) !!}
        </div> --}}

        <div class="col-span-12 text-right">
            <label> </label><span class="text-theme-6"></span>
            <button class="button w-24 bg-theme-6 text-white" type="reset" id="searchReset">Reset</button>
            <button class="button w-24 bg-theme-43 text-white" id="customerExportListForm" type="submit">Submit</button>
        </div>
    </div>
    {!! Form::close() !!}

    <div class="intro-y grid grid-cols-12 gap-3 sm:gap-6 mt-5">
        @if (isset($galleries) && $galleries->total() > 0)
            @foreach ($galleries as $gallery)
                <div class="intro-y col-span-6 sm:col-span-4 md:col-span-3 2xl:col-span-2">
                    <div class="file box rounded-md px-5 pt-8 pb-5 px-3 sm:px-5 relative zoom-in">
                        <svg data-id="{{ $gallery->id }}" class="clsdelete" xmlns="http://www.w3.org/2000/svg"
                            width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                            stroke-width="2" stroke-linecap="round" stroke-linejoin="round" icon-name="trash"
                            data-lucide="trash" class="lucide lucide-trash w-4 h-4 mr-2">
                            <polyline points="3 6 5 6 21 6"></polyline>
                            <path d="M19 6v14a2 2 0 01-2 2H7a2 2 0 01-2-2V6m3 0V4a2 2 0 012-2h4a2 2 0 012 2v2"></path>
                        </svg>
                        {{ isset($gallery->category->category_name) ? $gallery->category->category_name : '' }}
                        <a href="{{ isset($gallery->file) ? $gallery->file : '' }}" target="_blank" class="w-3/5">
                            <div class="image-fit">
                                <img alt="{{ isset($gallery->category->category_name) ? $gallery->category->category_name : '' }}"
                                    src="{{ isset($gallery->file) ? $gallery->file : '' }}">
                            </div>
                        </a>
                    </div>
                </div>
            @endforeach
        @else
        <div class="intro-y col-span-6 sm:col-span-4 md:col-span-3 2xl:col-span-2">
            
            No data available.
        </div>
        @endif

    </div>
    {{ $galleries->links() }}
@endsection

@push('scripts')
    <script>
        $('.datepicker').daterangepicker();
        $('.datepicker').val('');
    </script>
    <script>
        $('#MediaForm').submit(function(e) {
            e.preventDefault();
            let formData = new FormData(this);
            $.ajax({
                type: 'POST',
                url: "{{ route('admin.galleries.store') }}",
                data: formData,
                contentType: false,
                processData: false,
                beforeSend: function() {
                    $('#submit_form').html('Loading...');
                    $('#submit_form').addClass('disabled');
                    $('#submit_form').attr('disabled', true);
                },
                success: (response) => {
                    if (response.status == 1) {
                        Swal.fire('Created!', 'Form submit successfull.', 'success');
                        setTimeout(function() {
                            location.reload();
                        }, 2000);
                    } else {
                        Swal.fire('Oops...', 'Something went wrong with ajax !',
                            'error');
                        $('#submit_form').html('Save');
                        $('#submit_form').removeClass('disabled');
                        $('#submit_form').attr('disabled', false);
                    }
                },
                error: function() {
                    $('#submit_form').html('Save');
                    $('#submit_form').removeClass('disabled');
                    $('#submit_form').attr('disabled', false);
                },
            });
        });
    </script>
    <script>
         $("#btnClosePopupAdd").click(function() {
            $("#MediaForm").trigger("reset");
            $("#addNewMediaModal").modal("hide");
        });
        $('#media_image').on('change', function() {
            multipleImagesPreview(this, 'div.MediaImgPreview');
        });
        // Multiple images preview with JavaScript
        function multipleImagesPreview(input, placeToInsertImagePreview) {
            if (input.files) {
                $(placeToInsertImagePreview).html('');
                var filesAmount = input.files.length;
                for (i = 0; i < filesAmount; i++) {
                    var reader = new FileReader();
                    reader.onload = function(e) {
                        $($.parseHTML('<img>'))
                            .attr('src', e.target.result)
                            .attr('width', 'auto')
                            .attr('height', 80)
                            .attr('class', 'img-img-responsive m-2')
                            .appendTo(placeToInsertImagePreview);
                    }
                    reader.readAsDataURL(input.files[i]);
                }
            }
        };
        $(document).on('click', '.clsdelete', function() {
            var id = $(this).attr('data-id');
            var url = `{{ url('/') }}/admin/galleries/` + id;
            Swal.fire({
                title: 'Are you sure?',
                text: "You won't be able to revert this!",
                type: 'info',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Yes, delete it!',
                showLoaderOnConfirm: true,
                preConfirm: function() {
                    return new Promise(function(resolve) {
                        $.ajax({
                                headers: {
                                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr(
                                        'content')
                                },
                                url: url,
                                type: 'DELETE',
                                dataType: 'json'
                            })
                            .done(function(response) {
                                Swal.fire('Deleted!', response.message, 'success');
                                setTimeout(function() {
                                    location.reload();
                                }, 2000);
                            })
                            .fail(function() {
                                Swal.fire('Oops...', 'Something went wrong with ajax !',
                                    'error');
                            });
                    });
                },
                allowOutsideClick: false
            });
        });
    </script>
@endpush
