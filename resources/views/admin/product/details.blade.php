@extends('admin.layouts.base')
@section('content')
    @include('admin.layouts.components.header', [
        'title' => __('messages.detail', ['name' => trans_choice('content.product', 1)]),
        'breadcrumbs' => Breadcrumbs::render('admin.products.show'),
    ])
    <div class="grid grid-cols-12 gap-6 mt-5">
        <div class="intro-y col-span-12 lg:col-span-6">
            <div class="intro-y box p-5">
                <div>
                    <label class="text-gray-500 font-medium leading-none mt-3">{{ trans_choice('content.title', 1) }}
                        : </label>
                    {{ isset($product->title) ? $product->title : 'Na' }}
                </div>
            </div>
        </div>
        <div class="intro-y col-span-12 lg:col-span-6">
            <div class="intro-y box p-5">
                <div>
                    <label class="text-gray-500 font-medium leading-none mt-3">{{ trans_choice('content.amount', 1) }}
                        : </label>
                    {{ isset($product->amount) ? currencyIcon().$product->amount : 'Na' }}
                </div>
            </div>
        </div>
        <div class="intro-y col-span-12 lg:col-span-6">
            <div class="intro-y box p-5">
                <div>
                    <label class="text-gray-500 font-medium leading-none mt-3">{{ trans_choice('content.total_rating', 1) }}
                        : </label>
                    {{ isset($product->total_rating) ? $product->total_rating  : 'Na' }}
                </div>
            </div>
        </div>
        <div class="intro-y col-span-12 lg:col-span-6">
            <div class="intro-y box p-5">
                <div>
                    <label class="text-gray-500 font-medium leading-none mt-3">{{ trans_choice('content.avg_rating', 1) }}
                        : </label>
                    {{ isset($product->avg_rating) ? $product->avg_rating . ' Star' : 'Na' }}
                </div>
            </div>
        </div>
        <div class="intro-y col-span-12 lg:col-span-6">
            <div class="intro-y box p-5">
                <div>
                    <label class="text-gray-500 font-medium leading-none mt-3">{{ trans_choice('content.is_active', 1) }}
                        : </label>
                    @if ($product->is_active == 1)
                        Active
                    @else
                        Inactive
                    @endif
                </div>
            </div>
        </div>
        <div class="intro-y col-span-12 lg:col-span-6">
            <div class="intro-y box p-5">
                <div>
                    <label class="text-gray-500 font-medium leading-none mt-3">{{ trans_choice('content.created_at', 1) }}
                        : </label>
                    {{ isset($product->created_at) ? get_default_format($product->created_at) : 'Na' }}
                </div>
            </div>
        </div>
        <div class="intro-y col-span-12 lg:col-span-6">
            <div class="intro-y box p-5">
                <div>
                    <label class="text-gray-500 font-medium leading-none mt-3">{{ trans_choice('content.image', 1) }}
                        : </label>
                    <a href="{{ $product->image }}" target="_blank">
                        <div class="font-medium whitespace-no-wrap">
                            <img style="width: 80px; height: 80px;" src="{{ $product->image }}" alt="Banner image">
                        </div>
                    </a>
                </div>
            </div>
        </div>
        <div class="intro-y col-span-12 lg:col-span-6">
            <div class="intro-y box p-5">
                <label class="text-gray-500 font-medium leading-none mt-3">Side Images: </label>
                    <div style="display: flex;">
                    @if (!empty($product->product_images))
                        @foreach ($product->product_images as $images)
                            <a href="{{ $images->image }}" target="_blank">
                                <img style="margin: 5px;" data-id="{{ $images->id }}" width="80px" height="80px"
                                    src="{{ $images->image }}" title="Image"></a>
                        @endforeach
                    @endif
                  
                </div>
            </div>
        </div>
        <div class="intro-y col-span-12 lg:col-span-12">
            <div class="intro-y box p-5">
                <div>
                    <label class="text-gray-500 font-medium leading-none mt-3">{{ trans_choice('content.summery', 1) }}
                        : </label>
                    {!! isset($product->summery) ? $product->summery : 'Na' !!}
                </div>
            </div>
        </div>
        <div class="intro-y col-span-12 lg:col-span-12">
            <div class="intro-y box p-5">
                <div>
                    <label class="text-gray-500 font-medium leading-none mt-3">{{ trans_choice('content.description', 1) }}
                        : </label>
                    {!! isset($product->description) ? $product->description : 'Na' !!}
                </div>
            </div>
        </div>
    </div>
    <div class="modal" id="changeVerifyStatus">
        <div class="modal__content">
            <div class="flex items-center px-5 py-5 sm:py-3 border-b border-gray-200">
                <h2 class="font-medium text-base mr-auto">Update status</h2>
            </div>
            <form id="changeVerifyStatusForm" class="form m-5" method="PATCH">
                <div class="col-span-12 xl:col-span-3">
                    <input type="hidden" name="verify_id" value="">
                    <label>Status</label>
                    {!! Form::select('update_Verify_status', [0 => 'Pending', 1 => 'Approved', 2 => 'Reject'], null, [
                        // 'placeholder' => 'Select',
                        'class' => 'input w-full border bg-gray-10 mt-2',
                    ]) !!}
                </div>
            </form>
            <div class="px-5 py-3 text-right border-t border-gray-200"> <button type="button"
                    class="button w-20 border closeModal text-gray-700 mr-1">Cancel</button> <button type="button"
                    class="updateStatus button w-20 bg-theme-1 text-white">Send</button> </div>
        </div>
    </div>
    @include('admin.layouts.components.datatable_header', [
        'data' => [
            ['classname' => '', 'title' => trans_choice('content.id_title', 1)],
            ['classname' => 'min-w-125px', 'title' => trans_choice('content.name', 1)],
            ['classname' => 'min-w-125px', 'title' => trans_choice('content.email', 1)],
            ['classname' => 'min-w-125px', 'title' => trans_choice('content.rating', 1)],
            ['classname' => 'min-w-125px', 'title' => trans_choice('content.review', 1)],
            ['classname' => 'min-w-125px', 'title' => trans_choice('content.status_title', 1)],
            ['classname' => 'min-w-125px', 'title' => trans_choice('content.created_at', 1)],
        ],
    ])
    <div class="text-right mt-6">
        <div class="mr-6">
            <a href="{{ route('admin.products.index') }}">
                <button type="button" class="button mr-2 bg-theme-1 text-white">
                    Back</button></a>
        </div>
    </div>
    @push('scripts')
        <script>
            var oTable;
            $(document).ready(function() {
                oTable = $('#kt_table_1').DataTable({
                    responsive: true,
                    searchDelay: 500,
                    processing: true,
                    bFilter: false,
                    serverSide: true,
                    order: [
                        [6, 'desc']
                    ],
                    language: {
                        search: "_INPUT_",
                        searchPlaceholder: "Search...",
                    },
                    oLanguage: {
                        sLengthMenu: "Show _MENU_",
                        sEmptyTable: "No Records Found.",
                        infoEmpty: "No entries to show.",
                    },
                    createdRow: function(row, data, dataIndex) {
                        // Set the data-status attribute, and add a class
                        $(row).attr('role', 'row');
                        $(row).find("td").last().addClass('text-danger');
                    },
                    ajax: {
                        "url": "{{ route('admin.productReview.list') }}",
                        data: function(d) {
                            d.product_id = `{{ $product->id }}`;
                        },
                    },
                    dom: `<'row'<'col-sm-12 col-md-6'l><'col-sm-12 col-md-6'f>>" +
                      "<'row'<'col-sm-12'tr>>" +
                      "<'row'<'col-sm-12 col-md-5'i><'col-sm-12 col-md-7'p>>`,
                    columnDefs: [{
                        targets: [0],
                        orderable: false,
                        searchable: false,
                        // className: 'mdl-data-table__cell--non-numeric'
                    }],
                    columns: [{
                            data: 'id',
                            name: 'id',
                            render: function(data, type, row, meta) {
                                return "#" + serialNumberShow(meta);
                            }
                        },
                        {
                            data: 'name',
                            name: 'name',
                            render: function(data, type, row, meta) {
                                if (data) {
                                    return `<span class="badge badge-primary" title="${data}">${setStringLength(data)}</span>`;
                                } else {
                                    return `<div class="font-medium whitespace-no-wrap">Na</div>`;
                                }
                            }
                        },
                        {
                            data: 'email',
                            name: 'email',
                            render: function(data, type, row, meta) {
                                if (data) {
                                    return `<span class="badge badge-primary" title="${data}">${setStringLength(data)}</span>`;
                                } else {
                                    return `<div class="font-medium whitespace-no-wrap">Na</div>`;
                                }
                            }
                        },
                        {
                            data: 'rating',
                            name: 'rating',
                            render: function(data, type, row, meta) {
                                if (data) {
                                    return `<span class="badge badge-primary">${data} Star</span>`;
                                } else {
                                    return `<div class="font-medium whitespace-no-wrap">Na</div>`;
                                }
                            }
                        },
                        {
                            data: 'review',
                            name: 'review',
                            render: function(data, type, row, meta) {
                                if (data) {
                                    return `<span class="badge badge-primary" title="${data}">${setStringLength(data)}</span>`;
                                } else {
                                    return `<div class="font-medium whitespace-no-wrap">Na</div>`;
                                }
                            }
                        },
                        {
                            data: 'status',
                            name: 'status',
                            render: function(data, type, row, meta) {
                                status = null;
                                cls = 'bg-blue-100 text-blue-800';
                                if (data == 0 || data == null) {
                                    status = 'Pending';
                                    cls = 'bg-blue-100 text-blue-800';
                                }
                                if (data == 1) {
                                    status = 'Approved';
                                    cls = 'bg-green-100 text-green-800';
                                }
                                if (data == 2) {
                                    status = 'Reject';
                                    cls = 'bg-red-100 text-red-800';
                                }
                                return ` <div class="text-left"> <a href="javascript:;" data-id="${row['id']}" data-status="${row['status']}" data-toggle="modal" data-target="#changeVerifyStatus" class="changeVerifyStatus button inline-block ${cls}  text-white">${status}</a> </div>`;
                            }
                        },
                        {
                            data: 'created_at',
                            name: 'created_at',
                            visible: true,
                            render: function(data, type, row, meta) {
                                return getDateTimeByFormat(data);
                            }
                        },
                    ],
                });



                $(document).on('click', '.closeModal', function(e) {
                    $('#changeVerifyStatus').modal('hide');
                });

                $(document).on('click', '.changeVerifyStatus', function() {
                    var data_id = $(this).attr('data-id');
                    var data_status = $(this).attr('data-status');
                    var status = null;
                    if (data_status == 0 || data_status == null) {
                        status = 'Pending';
                    }
                    if (data_status == 1) {
                        status = 'Confirm';
                    }
                    if (data_status == 2) {
                        status = 'Reject';
                    }
                    $('#changeVerifyStatusForm').trigger("reset");
                    $('select[name=update_Verify_status]').val(data_status);
                    $('input[name=verify_id]').val(data_id);
                });
                $(document).on('click', '.updateStatus', function() {
                    var status = $('select[name=update_Verify_status]').children("option:selected").val();
                    var id = $('input[name=verify_id]').val();
                    var url = `{{ url('/') }}/admin/products/review-verify-status/` + id + `/` + status;
                    tableChnageStatusWithReason(url, oTable);
                    $('#changeVerifyStatus').modal('hide');
                });
            });
        </script>
    @endpush
@endsection
