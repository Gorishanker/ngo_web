@extends('admin.layouts.base')
@section('content')
    @include('admin.layouts.components.header', [
        'title' => __('messages.detail', ['name' => trans_choice('content.blog', 1)]),
        'breadcrumbs' => Breadcrumbs::render('admin.blogs.show'),
    ])
    <div class="grid grid-cols-12 gap-6 mt-5">
        <div class="intro-y col-span-12 lg:col-span-6">
            <div class="intro-y box p-5">
                <div>
                    <label class="text-gray-500 font-medium leading-none mt-3">{{ trans_choice('content.title', 1) }}
                        : </label>
                    {{ isset($blog->title) ? $blog->title : 'Na' }}
                </div>
            </div>
        </div>
        <div class="intro-y col-span-12 lg:col-span-6">
            <div class="intro-y box p-5">
                <div>
                    <label class="text-gray-500 font-medium leading-none mt-3">{{ trans_choice('content.meta_title', 1) }}
                        : </label>
                    {{ isset($blog->meta_title) ? $blog->meta_title : 'Na' }}
                </div>
            </div>
        </div>
        <div class="intro-y col-span-12 lg:col-span-6">
            <div class="intro-y box p-5">
                <div>
                    <label class="text-gray-500 font-medium leading-none mt-3">{{ trans_choice('content.author', 1) }}
                        : </label>
                    {{ isset($blog->author) ? $blog->author : 'Na' }}
                </div>
            </div>
        </div>
        <div class="intro-y col-span-12 lg:col-span-6">
            <div class="intro-y box p-5">
                <div>
                    <label class="text-gray-500 font-medium leading-none mt-3">{{ trans_choice('content.is_active', 1) }}
                        : </label>
                    @if ($blog->is_active == 1)
                        Active
                    @else
                        Inactive
                    @endif
                </div>
            </div>
        </div>
        @if (isset($blog->schedule_datetime))
            <div class="intro-y col-span-12 lg:col-span-6">
                <div class="intro-y box p-5">
                    <div>
                        <label
                            class="text-gray-500 font-medium leading-none mt-3">{{ trans_choice('content.schedule_datetime', 1) }}
                            : </label>
                        {{ get_default_format($blog->schedule_datetime) }}
                    </div>
                </div>
            </div>
        @endif
        <div class="intro-y col-span-12 lg:col-span-6">
            <div class="intro-y box p-5">
                <div>
                    <label
                        class="text-gray-500 font-medium leading-none mt-3">{{ trans_choice('content.schedule_datetime', 1) }}
                        : </label>
                    {{ isset($campaign->created_at) ? get_default_format($campaign->created_at) : 'Na' }}
                </div>
            </div>
        </div>

        <div class="intro-y col-span-12 lg:col-span-12">
            <div class="intro-y box p-5">
                <div>
                    <label
                        class="text-gray-500 font-medium leading-none mt-3">{{ trans_choice('content.meta_description', 1) }}
                        : </label>
                    {{ isset($blog->meta_description) ? $blog->meta_description : 'Na' }}
                </div>
            </div>
        </div>
        <div class="intro-y col-span-12 lg:col-span-12">
            <div class="intro-y box p-5">
                <div>
                    <label class="text-gray-500 font-medium leading-none mt-3">{{ trans_choice('content.content', 1) }}
                        : </label>
                    {!! isset($blog->content) ? $blog->content : 'Na' !!}
                </div>
            </div>
        </div>
    </div>
    <div class="text-right mt-6">
        <div class="mr-6">
            <a href="{{ route('admin.blogs.index') }}">
                <button type="button" class="button mr-2 bg-theme-1 text-white">
                    Back</button></a>
        </div>
    </div>
    <div class="intro-y col-span-12 lg:col-span-6">
        <div class="intro-y box p-5">
            <div>
                <label class="text-gray-500 font-medium leading-none mt-3">{{ trans_choice('content.image', 1) }}
                    : </label>
                <a href="{{ $blog->image }}" target="_blank">
                    <div class="font-medium whitespace-no-wrap">
                        <img src="{{ $blog->image }}" alt="Banner image">
                    </div>
                </a>
            </div>
        </div>
    </div>
    <!--begin::Post-->
    <div class="intro-y datatable-wrapper box p-5 mt-3">
        <h1>Comments List</h1>
        <table id="kt_table_1" class="table table-report table-report--bordered display w-full_datatable">
            <thead>
                <tr>
                    <th class="border-b-2 whitespace-no-wrap"> {{ trans_choice('content.id_title', 1) }}</th>
                    <th class="border-b-2 whitespace-no-wrap min-w-125px"> {{ trans_choice('content.name', 1) }}</th>
                    <th class="border-b-2 whitespace-no-wrap min-w-125px"> {{ trans_choice('content.email', 1) }}</th>
                    <th class="border-b-2 whitespace-no-wrap min-w-125px"> {{ trans_choice('content.website', 1) }}</th>
                    <th class="border-b-2 whitespace-no-wrap min-w-125px"> Comment</th>
                    <th class="border-b-2 whitespace-no-wrap min-w-125px"> {{ trans_choice('content.status_title', 1) }} </th>
                    <th class="border-b-2 whitespace-no-wrap min-w-125px"> {{ trans_choice('content.created_at', 1) }}</th>
                    </th>
                </tr>
            </thead>
            <tbody></tbody>
        </table>
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
                        "url": "{{ route('admin.blog.comments') }}",
                        data: function(d) {
                            d.blog_id = {{ $blog->id }};
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
                                    return `<span class="badge badge-primary">${setStringLength(data)}</span>`;
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
                                    return `<span class="badge badge-primary">${setStringLength(data)}</span>`;
                                } else {
                                    return `<div class="font-medium whitespace-no-wrap">Na</div>`;
                                }
                            }
                        },
                        {
                            data: 'website',
                            name: 'website',
                            render: function(data, type, row, meta) {
                                if (data) {
                                    return `<a target="_balnk" cursor="pointer" href="${data}"><span class="badge badge-primary">${setStringLength(data)}</span></a>`;
                                } else {
                                    return `<div class="font-medium whitespace-no-wrap">Na</div>`;
                                }
                            }
                        },
                        {
                            data: 'comment',
                            name: 'comment',
                            render: function(data, type, row, meta) {
                                if (data) {
                                    return `<span class="badge badge-primary" title="${data}">${setStringLength(data)}</span>`;
                                } else {
                                    return `<div class="font-medium whitespace-no-wrap">Na</div>`;
                                }
                            }
                        },
                        {
                            data: 'is_active',
                            name: 'is_active',
                            render: function(data, type, row, meta) {
                                var attr = `data-id="${ row['id'] }" data-status="${ data }"`;
                                var avtive_data = actionActiveButton(data, attr);
                                return avtive_data;
                            }
                        },
                        {
                            data: 'created_at',
                            name: 'created_at',
                            render: function(data, type, row, meta) {
                                return getDateTimeByFormat(data);
                            }
                        },
                    ],
                });

            });
            $(document).on('click', '.clsstatus', function() {
                var id = $(this).attr('data-id');
                var status = $(this).attr('data-status');
                var url = `{{ url('/') }}/admin/blog/comment/status/` + id + `/` + status;
                tableChnageStatus(url, oTable);
            });
        </script>
    @endpush
@endsection
