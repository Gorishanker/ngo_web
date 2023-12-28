@extends('admin.layouts.base')
@section('content')
    @include('admin.layouts.components.header', [
        'title' => __('messages.list', [
            'name' => trans_choice('content.order', 2),
        ]),
        'breadcrumbs' => Breadcrumbs::render('admin.orders.index'),
    ])

    @include('admin.layouts.components.datatable_header', [
        'data' => [
            ['classname' => '', 'title' => trans_choice('content.id_title', 1)],
            ['classname' => 'min-w-125px', 'title' => trans_choice('content.total_price', 1)],
            ['classname' => 'min-w-125px', 'title' => trans_choice('content.payment_status', 1)],
            ['classname' => 'min-w-125px', 'title' => trans_choice('content.status', 1)],
            ['classname' => 'min-w-125px', 'title' => trans_choice('content.payment_date', 1)],
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
                bFilter: false,
                serverSide: true,
                order: [
                    [4, 'desc']
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
                    "url": "{{ route('admin.orders.index') }}",
                    data: function(d) {
                        // d.name = $('input[name=name]').val();
                    },
                },
                dom: `<'row'<'col-sm-12 col-md-6'l><'col-sm-12 col-md-6'f>>" +
                      "<'row'<'col-sm-12'tr>>" +
                      "<'row'<'col-sm-12 col-md-5'i><'col-sm-12 col-md-7'p>>`,
                columnDefs: [{
                    targets: [0, 5],
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
                        data: 'total_price',
                        name: 'total_price',
                        render: function(data, type, row, meta) {
                            if (data) {
                                return `<span class="badge badge-primary">{{currencyIcon()}}${setStringLength(data)}</span>`;
                            } else {
                                return `<div class="font-medium whitespace-no-wrap">Na</div>`;
                            }
                        }
                    },
                    {
                        data: 'payment_status',
                        name: 'payment_status',
                        render: function(data, type, row, meta) {
                            if (data) {
                                if(data == 1){
                                    data = 'Success';
                                    return `<span class="badge badge-primary">${data}</span>`;
                                }else if(data == 2){
                                    data = 'Failed';
                                    return `<span class="badge badge-danger">${data}</span>`;
                                }else{
                                    data = 'Pending';
                                    return `<span class="badge badge-primary">${data}</span>`;
                                }
                            } else {
                                return `<div class="font-medium whitespace-no-wrap">Na</div>`;
                            }
                        }
                    },
                    {
                        data: 'status',
                        name: 'status',
                        render: function(data, type, row, meta) {
                            if (data) {
                                if(data == 1){
                                    data = 'Compeletd';
                                    return `<span class="badge badge-success">${data}</span>`;
                                }else{
                                    data = 'In Cart';
                                    return `<span class="badge badge-primary">${data}</span>`;
                                }
                            } else {
                                return `<div class="font-medium whitespace-no-wrap">Na</div>`;
                            }
                        }
                    },
                    {
                        data: 'payment_date',
                        name: 'payment_date',
                        render: function(data, type, row, meta) {
                            return getDateTimeByFormat(data);
                        }
                    },
                    {
                        data: 'created_at',
                        name: 'created_at',
                        render: function(data, type, row, meta) {
                            return getDateTimeByFormat(data);
                        }
                    },
                    {
                        data: 'id',
                        name: 'id',
                        render: function(data, type, row, meta) {

                            var show_url = `{{ url('/') }}/admin/orders/` + row['id'] +
                                `?tab=details`;
                            var show_data = actionShowButton(show_url);

                            return `<div class="flex justify-left items-center">${show_data}</div>`;

                        }
                    },
                ],
            });

        });
    </script>
@endpush
