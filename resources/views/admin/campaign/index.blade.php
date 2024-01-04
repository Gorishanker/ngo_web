@extends('admin.layouts.base')
@section('content')
    @include('admin.layouts.components.header', [
        'title' => __('messages.list', [
            'name' => trans_choice('content.campaign', 2),
        ]),
        'breadcrumbs' => Breadcrumbs::render('admin.campaigns.index'),
        'create_btn' => [
            'status' => true,
            'route' => route('admin.campaigns.create'),
            'name' => __('messages.create', [
                'name' => trans_choice('content.campaign', 2),
            ]),
        ],
    ])

    @include('admin.layouts.components.datatable_header', [
        'data' => [
            ['classname' => '', 'title' => trans_choice('content.id_title', 1)],
            ['classname' => 'min-w-125px', 'title' => trans_choice('content.title', 1)],
            ['classname' => 'min-w-125px', 'title' => trans_choice('content.target_amount', 1)],
            ['classname' => 'min-w-125px', 'title' => trans_choice('content.raise_amount', 1)],
            ['classname' => 'min-w-125px', 'title' => trans_choice('content.image', 1)],
            ['classname' => 'min-w-125px', 'title' => trans_choice('content.status_title', 1)],
            ['classname' => 'min-w-125px', 'title' => trans_choice('content.created_at', 1)],
            ['classname' => 'min-w-100px', 'title' => trans_choice('content.action_title', 1)],
        ],
    ])
@endsection

@push('scripts')
    <script>
        var oTable;
        $(document).ready(function() {
            oTable = $('#kt_table_1').DataTable({
                responsive: true,
                searchDelay: 500,
                processing: true,
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
                    "url": "{{ route('admin.campaigns.index') }}",
                    data: function(d) {
                        // d.name = $('input[name=name]').val();
                    },
                },
                dom: `<'row datatable_header'<'col-sm-12 col-md-6'l><'col-sm-12 col-md-6'f>>" +
                      "<'row'<'col-sm-12'tr>>" +
                      "<'row datatable_footer'<'col-sm-12 col-md-5'i><'col-sm-12 col-md-7'p>>`,
                columnDefs: [{
                    targets: [0, 7],
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
                        data: 'title',
                        name: 'title',
                        render: function(data, type, row, meta) {
                            if (data) {
                                return `<span class="badge badge-primary">${setStringLength(data)}</span>`;
                            } else {
                                return `<div class="font-medium whitespace-no-wrap">Na</div>`;
                            }
                        }
                    },
                    {
                        data: 'target_amount',
                        name: 'target_amount',
                        render: function(data, type, row, meta) {
                            if (data) {
                                return `<span class="badge badge-primary">{{currencyIcon()}}${setStringLength(data)}</span>`;
                            } else {
                                return `<div class="font-medium whitespace-no-wrap">Na</div>`;
                            }
                        }
                    },
                    {
                        data: 'raise_amount',
                        name: 'raise_amount',
                        render: function(data, type, row, meta) {
                            if (data) {
                                return `<span class="badge badge-primary">{{currencyIcon()}}${setStringLength(data)}</span>`;
                            } else {
                                return `<div class="font-medium whitespace-no-wrap">Na</div>`;
                            }
                        }
                    },
                    {
                        data: 'image',
                        name: 'image',
                        render: function(data, type, row, meta) {
                            return `<a href="${data}" target="_blank"><div class="w-12 h-12 image-fit">
                                    <img alt="${row['title']}" class="rounded-full" src="${data}">
                                </div></a>`;
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
                        visible: false,
                        render: function(data, type, row, meta) {
                            return getDateTimeByFormat(data);
                        }
                    },
                    {
                        data: 'id',
                        name: 'id',
                        render: function(data, type, row, meta) {

                            var show_url = `{{ url('/') }}/admin/campaigns/` + row['id'] +
                                `?tab=details`;
                            var show_data = actionShowButton(show_url);
                            var edit_url = `{{ url('/') }}/admin/campaigns/` + row['id'] +
                                `/edit/?tab=edit`;
                            var del_data = actionDeleteButton(row['id']);
                            var edit_data = actionEditButton(edit_url, row['id']);

                            return `<div class="flex justify-left items-center">${show_data}${edit_data}  ${del_data}</div>`;

                        }
                    },
                ],
            });

        });

        $(document).on('click', '.clsdelete', function() {
            var id = $(this).attr('data-id');
            var e = $(this).parent().parent();
            var url = `{{ url('/') }}/admin/campaigns/` + id;
            tableDeleteRow(url, oTable);
        });

        $(document).on('click', '.clsstatus', function() {
            var id = $(this).attr('data-id');
            var status = $(this).attr('data-status');
            var url = `{{ url('/') }}/admin/campaigns/status/` + id + `/` + status;
            tableChnageStatus(url, oTable);
        });
    </script>
@endpush
