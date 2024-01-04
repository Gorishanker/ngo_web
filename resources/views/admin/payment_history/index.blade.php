@extends('admin.layouts.base')
@section('content')
    @include('admin.layouts.components.header', [
        'title' => __('messages.list', [
            'name' => trans_choice('content.payment_history', 2),
        ]),
        'breadcrumbs' => Breadcrumbs::render('admin.payment_histories.index'),
    ])

    @include('admin.layouts.components.datatable_header', [
        'data' => [
            ['classname' => '', 'title' => trans_choice('content.id_title', 1)],
            ['classname' => 'min-w-125px', 'title' => trans_choice('content.first_name', 1)],
            ['classname' => 'min-w-125px', 'title' => trans_choice('content.email', 1)],
            ['classname' => 'min-w-125px', 'title' => trans_choice('content.zipcode', 1)],
            ['classname' => 'min-w-125px', 'title' => trans_choice('content.payment_status', 1)],
            ['classname' => 'min-w-125px', 'title' => trans_choice('content.donation_amount', 1)],
            ['classname' => 'min-w-125px', 'title' => trans_choice('content.donation_type', 1)],
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
                    [7, 'desc']
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
                    "url": "{{ route('admin.payment_histories.index') }}",
                    data: function(d) {
                        // d.name = $('input[name=name]').val();
                    },
                },
                dom: `<'row datatable_header'<'col-sm-12 col-md-6'l><'col-sm-12 col-md-6'f>>" +
                      "<'row'<'col-sm-12'tr>>" +
                      "<'row datatable_footer'<'col-sm-12 col-md-5'i><'col-sm-12 col-md-7'p>>`,
                columnDefs: [{
                    targets: [0, 8],
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
                        data: 'first_name',
                        name: 'first_name',
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
                        data: 'zipcode',
                        name: 'zipcode',
                        render: function(data, type, row, meta) {
                            if (data) {
                                return `<span class="badge badge-primary">${setStringLength(data)}</span>`;
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
                                }else if(data == 2){
                                    data = 'Failed';
                                }else{
                                    data = 'Pending';
                                }
                                return `<span class="badge badge-primary">${data}</span>`;
                            } else {
                                return `<div class="font-medium whitespace-no-wrap">Na</div>`;
                            }
                        }
                    },
                    {
                        data: 'donation_amount',
                        name: 'donation_amount',
                        render: function(data, type, row, meta) {
                            if (data) {
                                return `<span class="badge badge-primary">{{currencyIcon()}}${setStringLength(data)}</span>`;
                            } else {
                                return `<div class="font-medium whitespace-no-wrap">Na</div>`;
                            }
                        }
                    },
                    {
                        data: 'donation_type',
                        name: 'donation_type',
                        render: function(data, type, row, meta) {
                            if (data) {
                                return `<span class="badge badge-primary">${setStringLength(data)}</span>`;
                            } else {
                                return `<div class="font-medium whitespace-no-wrap">Na</div>`;
                            }
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

                            var show_url = `{{ url('/') }}/admin/payment_histories/` + row['id'] +
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
