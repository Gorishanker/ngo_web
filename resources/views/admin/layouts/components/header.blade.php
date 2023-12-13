@php
    $title = isset($title) ? $title : '';
    $filter = isset($filter) ? $filter : false;
    
    $export['status'] = isset($export['status']) ? $export['status'] : false;
    $export['route'] = isset($export['route']) ? $export['route'] : '#';
    $export['classname'] = isset($export['classname']) ? $export['classname'] : 'btn-primary';
    $export['name'] = isset($export['name']) ? $export['name'] : 'Export';
    
    $create_btn['status'] = isset($create_btn['status']) ? $create_btn['status'] : false;
    $create_btn['btn_permission'] = isset($create_btn['btn_permission']) ? $create_btn['btn_permission'] : false;
    
    $create_modal['status'] = isset($create_modal['status']) ? $create_modal['status'] : false;
    $create_modal['btn_permission'] = isset($create_modal['btn_permission']) ? $create_modal['btn_permission'] : false;
    
    $edit_modal['status'] = isset($edit_modal['status']) ? $edit_modal['status'] : false;
    $edit_modal['btn_permission'] = isset($edit_modal['btn_permission']) ? $edit_modal['btn_permission'] : false;
    
    $btn['status'] = isset($btn['status']) ? $btn['status'] : false;
    $btn['classname'] = isset($btn['classname']) ? $btn['classname'] : 'btn-primary';
    $btn['route'] = isset($btn['route']) ? $btn['route'] : '#';
    $btn['name'] = isset($btn['name']) ? $btn['name'] : 'Button';
    
    $import['status'] = isset($import['status']) ? $import['status'] : false;
    $import['route'] = isset($import['route']) ? $import['route'] : false;
    $import['name'] = isset($import['name']) ? $import['name'] : 'Import';
    
    $back['status'] = isset($back['status']) ? $back['status'] : false;
    $back['route'] = isset($back['route']) ? $back['route'] : false;
    $back['name'] = isset($back['name']) ? $back['name'] : 'Back';
    
@endphp
@push('breadcrumbs')
    @if (isset($breadcrumbs))
        {!! $breadcrumbs !!}
    @endif
@endpush


<!--begin::Custom Page Header Toolbar-->
{{-- @dd(Route::currentRouteName()) --}}
<div class="intro-y flex flex-col sm:flex-row items-center mt-2">
    @if (Route::currentRouteName() == 'admin.dashboard' || Route::currentRouteName() == 'admin.change_password')
    @else
        <h2 class="text-lg font-medium mr-auto mt-3 mb-4">{{ $title }}</h2>
    @endif


    @if ($export['status'] == true)
        @if (isset($export['route']) && isset($export['name']))
            <!--begin::Add button-->
            <div class="w-full sm:w-auto flex mt-4 sm:mt-0">
                <a type="button" href="{{ $export['route'] }}" class="button px-2 text-gray-700"> <button
                        class="button text-white bg-theme-12 shadow-md mr-1">{{ $export['name'] }}</button></a>
            </div>
        @endif
    @endif
    @if ($import['status'] == true)
        @if (isset($import['route']) && isset($import['format_file_route']))
            @if (isset($import['route']))
                <!--begin::Wrapper-->
                <div class="w-full sm:w-auto flex mt-4 sm:mt-0">
                    <!--begin::Menu-->

                    <button data-modal-target="staticModal" data-modal-toggle="staticModal" id="impBtn"
                        class="button text-white bg-theme-13 shadow-md mr-1 px-2" type="button">
                        {{ $import['name'] }}
                    </button>

                    <!-- Modal -->
                    <div class="modal fade removeModal" id="customerModal" tabindex="-1" role="dialog"
                        aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="relative w-full max-w-2xl max-h-full"
                            style="margin: 0 auto;margin-right: 0px;position: absolute;right: 45px;top: 150px;">
                            <!-- Modal content -->
                            <div class="relative bg-white rounded-lg shadow dark:bg-gray-700 warna">
                                <!-- Modal header -->
                                <div
                                    class="flex items-start justify-between p-4 border-b rounded-t dark:border-gray-600">
                                    <h3 class="text-xl font-semibold text-gray-900 dark:text-white">
                                        Select File
                                    </h3>

                                </div>
                                <!-- Modal body -->
                                <form action="{{ $import['route'] }} " method="post" id='import_data' class="form p-4"
                                    enctype="multipart/form-data">
                                    @csrf
                                    <div class="px-7 py-5">
                                        <!--begin::Input group-->
                                        <div class="mb-5">
                                            <label
                                                class="form-label fw-bold">{{ trans_choice('content.import', 1) }}:</label>
                                            <div>
                                                <input type="file" name="file"
                                                    class="input w-full border bg-gray-100 mt-2"
                                                    accept="application/vnd.openxmlformats-officedocument.spreadsheetml.sheet"
                                                    required>
                                            </div>
                                        </div>
                                        <!--end::Input group-->
                                    </div>
                                    <div class="text-right mt-3">
                                        <div class="">
                                            <a href="{{ $import['format_file_route'] }}" target="_blank"> <button
                                                    type="button" class="button mr-2 bg-theme-9 text-white">
                                                    {{ __('content.download_format_title') }}</button>
                                            </a>

                                            <button type="submit"
                                                class="button w-24 bg-theme-1 text-white">{{ __('content.import_title') }}</button>
                                        </div>
                                    </div>
                                </form>
                                <!-- Modal footer -->
                                {{-- <div
                                    class="flex items-center p-6 space-x-2 border-t border-gray-200 rounded-b dark:border-gray-600">
                                    <button data-modal-hide="staticModal" type="button"
                                        class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">I
                                        accept</button>
                                    <button data-modal-hide="staticModal" type="button"
                                        class="text-gray-500 bg-white hover:bg-gray-100 focus:ring-4 focus:outline-none focus:ring-blue-300 rounded-lg border border-gray-200 text-sm font-medium px-5 py-2.5 hover:text-gray-900 focus:z-10 dark:bg-gray-700 dark:text-gray-300 dark:border-gray-500 dark:hover:text-white dark:hover:bg-gray-600 dark:focus:ring-gray-600">Decline</button>

                                </div> --}}
                                {{-- <div class="grid grid-cols-12 gap-5 mt-6">
                                </div> --}}

                                {{-- <div class="d-flex justify-content-end">

                                    <button type="button" class="btn btn-primary me-2">
                                        <a href="{{ $import['format_file_route'] }}" target="_blank"
                                            class="text-white">{{ __('content.download_format_title') }}</a>
                                    </button>

                                    <button type="submit"
                                        class="btn btn-sm btn-info me-2">{{ __('content.import_title') }}</button>
                                </div> --}}
                            </div>
                        </div>
                    </div>

                    <!-- Main modal -->
                </div>
                <!--end::Wrapper-->
            @endif
        @endif
    @endif

    @if ($create_btn['btn_permission'] == true)
        @can($create_btn['btn_permission'])
            @if (isset($create_btn['route']) && isset($create_btn['name']))
                <!--begin::Add button-->
                <div class="w-full sm:w-auto flex mt-4 sm:mt-0">
                    <a type="button" href="{{ $create_btn['route'] }}" class="button px-2 text-gray-700"> <button
                            class="button text-white bg-theme-1 shadow-md">{{ $create_btn['name'] }}</button></a>
                </div>
                <!--end::Add button-->
            @endif
        @endcan
    @else
        @if ($create_btn['status'] == true)
            @if (isset($create_btn['route']) && isset($create_btn['name']))
                <!--begin::Add button-->
                <div class="w-full sm:w-auto flex mt-4 sm:mt-0">
                    <a type="button" href="{{ $create_btn['route'] }}" class="button px-2 text-gray-700"> <button
                            class="button text-white bg-theme-1 shadow-md mr-1">{{ $create_btn['name'] }}</button></a>
                </div>
                <!--end::Add button-->
            @endif
        @endif
    @endif

    @if ($create_modal['btn_permission'] == true)
        @can($create_modal['btn_permission'])
            @if (isset($create_modal['id']) && isset($create_modal['name']))
                <!--begin::Add button-->
                <div class="text-center text-sm-left {{ $create_modal['id'] }}"> <a href="javascript:;" data-toggle="modal"
                        data-target="#{{ $create_modal['id'] }}"
                        class="button mr-1 mb-2 inline-block bg-theme-1 text-white">Add
                        New {{ $create_modal['name'] }}</a> </div>
                <!--end::Add button-->
            @endif
        @endcan
    @else
        @if ($create_modal['status'] == true)
            @if (isset($create_modal['id']) && isset($create_modal['name']))
                <!--begin::Add button-->
                <div class="text-center text-sm-left {{ $create_modal['id'] }}"> <a href="javascript:;" data-toggle="modal"
                        data-target="#{{ $create_modal['id'] }}"
                        class="button mr-1 mb-2 inline-block bg-theme-1 text-white">Add
                        New {{ $create_modal['name'] }}</a> </div>
                <!--end::Add button-->
            @endif
        @endif
    @endif

    @if ($edit_modal['btn_permission'] == true)
        @can($edit_modal['btn_permission'])
            @if (isset($edit_modal['id']))
                <!--begin::Add button-->
                <div class="text-center text-sm-left"> <a href="javascript:;" data-toggle="modal"
                        data-target="#{{ $edit_modal['id'] }}"
                        class="button mr-1 mb-2 inline-block bg-theme-1 text-white">Edit</a> </div>
                <!--end::Add button-->
            @endif
        @endcan
    @else
        @if ($edit_modal['status'] == true)
            @if (isset($edit_modal['id']))
                <!--begin::Add button-->
                <div class="text-center text-sm-left"> <a href="javascript:;" data-toggle="modal"
                        data-target="#{{ $edit_modal['id'] }}"
                        class="button mr-1 mb-2 hidden inline-block bg-theme-1 text-white">Edit</a>
                </div>
                <!--end::Add button-->
            @endif
        @endif
    @endif



    @if ($btn['status'] == true)
        @if (isset($btn['route']) && isset($btn['name']))
            <!--begin::Add button-->
            <div class="text-right">
                <a href="{{ $btn['route'] }}"
                    class="button text-white bg-theme-9 shadow-md mr-2">{{ $btn['name'] }}</a>
            </div>
            <!--end::Add button-->
        @endif
    @endif

    @if ($back['status'] == true)
        @if (isset($back['route']) && isset($back['name']))
            <div class="text-right">
                <a href="{{ $back['route'] }}"
                    class="button text-white bg-theme-1 shadow-md mr-2">{{ $back['name'] }}</a>
            </div>
        @endif
    @endif

</div>
<!--end::Custom Page Header Toolbar-->
