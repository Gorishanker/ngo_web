@extends('admin.layouts.base')
@section('content')
    @include('admin.layouts.components.header', [
        'title' => __('messages.list', [
            'name' => trans_choice('content.contact_us', 2),
        ]),
        'breadcrumbs' => Breadcrumbs::render('admin.contact_us.index'),
    ])
    @include('admin.layouts.components.manager_modal.details', [
        'modal_id' => 'viewDataModal',
    ])

    {!! Form::open([
        'route' => 'admin.contact_us.download',
        'method' => 'POST',
        'class' => 'mt-3 formBackground py-3 px-4',
        'id' => 'exportDataForm',
    ]) !!}
    <div class="grid grid-cols-12 gap-5 mt-5">
        <div class="col-span-12 xl:col-span-3">
            <label>Status</label>
            {!! Form::select('status',  [0 => 'Pending', 1 => 'Completed', 2=> 'Rejected'], null, [
                'placeholder' => 'Select',
                'class' => 'input w-full border bg-gray-10 mt-2',
            ]) !!}
        </div>

        <div class="col-span-12 xl:col-span-3">
            <label>Date range</label>
            {!! Form::text('date_range', null, [
                'placeholder' => 'Date range',
                'class' => 'input w-full datepicker border bg-gray-10 mt-2',
            ]) !!}
        </div>

        <div class="col-span-12 text-right">
            <label> </label><span class="text-theme-6"></span>
            <button class="button w-24 bg-theme-6 text-white" type="reset" id="searchReset">Reset</button>
            {{-- <button class="button w-24 bg-theme-43 text-white" id="customerExportListForm" type="submit">Download</button> --}}
            <button type="button" class="button w-24 bg-theme-42 text-white" id="extraSearch">Search</button>
        </div>
    </div>
    {!! Form::close() !!}

    @include('admin.layouts.components.datatable_header', [
        'data' => [
            ['classname' => 'fs-5 uppercase', 'title' => trans_choice('content.id_title', 1)],
            ['classname' => 'min-w-125px uppercase fs-5', 'title' => trans_choice('content.name_title', 1)],
            ['classname' => 'min-w-125px uppercase fs-5', 'title' => trans_choice('content.email', 1)],
            ['classname' => 'min-w-125px uppercase fs-5', 'title' => trans_choice('content.subject', 1)],
            ['classname' => 'min-w-125px uppercase fs-5', 'title' => trans_choice('content.status', 1)],
            ['classname' => 'min-w-125px uppercase fs-5', 'title' => trans_choice('content.created_at', 1)],
            ['classname' => 'min-w-100px uppercase fs-5', 'title' => trans_choice('content.action_title', 1)],
        ],
    ])
@endsection
<div class="modal" id="changeWithdrawalStatus">
    <div class="modal__content">
        <div class="flex items-center px-5 py-5 sm:py-3 border-b border-gray-200">
            <h2 class="font-medium text-base mr-auto">Update status</h2>
        </div>
        <form id="changeWithdrawalStatusForm" class="form m-5" method="PATCH">
            <div class="col-span-12 xl:col-span-3">
                <input type="hidden" name="withdraw_id" value="">
                <label>Status</label>
                {!! Form::select(
                    'update_withdrawal_status',
                    [0 => 'Pending', 1 => 'Completed', 2=> 'Rejected'],
                    null,
                    [
                        'class' => 'input w-full border bg-gray-10 mt-2',
                    ],
                ) !!}
            </div>
        </form>
        <div class="px-5 py-3 text-right border-t border-gray-200"> <button type="button"
                class="button w-20 border closeModal text-gray-700 mr-1">Cancel</button> <button type="button"
                class="updateStatus button w-20 bg-theme-1 text-white">Send</button> </div>
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
                serverSide: true,
                order: [
                    [5, 'desc']
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
                    $(row).find("td").last().addClass('table-report__action w-56');
                },
                ajax: {
                    "url": "{{ route('admin.contact_us.index') }}",
                    data: function(d) {
                        d.status_f = $('select[name=status]').val();
                        d.date_range = $('input[name="date_range"]').val();
                    },
                },
                dom: `<'row datatable_header'<'col-sm-12 col-md-6'l><'col-sm-12 col-md-6'f>>" +
                      "<'row'<'col-sm-12'tr>>" +
                      "<'row datatable_footer'<'col-sm-12 col-md-5'i><'col-sm-12 col-md-7'p>>`,
                columnDefs: [{
                    targets: [6],
                    orderable: false,
                    searchable: false,
                    // className: 'mdl-data-table__cell--non-numeric'
                }],
                columns: [{
                        data: 'id',
                        name: 'id',
                        render: function(data, type, row, meta) {
                            // return data;
                            return "#" + serialNumberShow(meta);
                        }
                    },
                    {
                        data: 'name',
                        name: 'name',
                        render: function(data, type, row, meta) {
                            if (data)
                                return `<div class="font-normal whitespace-no-wrap" title="${data}">${setStringLength(data)}</div>`;
                            else
                                return 'Na';
                        }
                    },
                    {
                        data: 'email',
                        name: 'email',
                        render: function(data, type, row, meta) {
                            if (data)
                                return `<div class="font-normal whitespace-no-wrap" title="${data}">${setStringLength(data)}</div>`;
                            else
                                return 'Na';
                        }
                    },
                    {
                        data: 'subject',
                        name: 'subject',
                        render: function(data, type, row, meta) {
                            if (data)
                                return `<div class="font-normal whitespace-no-wrap"  title="${data}">${setStringLength(data, 30)}</div>`;
                            else
                                return `<div class="font-normal whitespace-no-wrap">Na</div>`;
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
                                status = 'Completed';
                                cls = 'bg-indigo-100 text-indigo-800';
                            }
                            if (data == 2) {
                                status = 'Rejected';
                                cls = 'bg-red-100 text-red-800';
                            }
                            return ` <div class=""> <a href="javascript:;" data-id="${row['id']}" data-status="${row['status']}" data-toggle="modal" data-target="#changeWithdrawalStatus" class="changeWithdrawalStatus button inline-block ${cls}  text-white">${status}</a> </div>`;
                        }
                    },
                    {
                        data: 'created_at',
                        name: 'created_at',
                        render: function(data, type, row, meta) {
                            if (data)
                                return getDateTimeByFormat(data);
                            else
                                return 'Na';
                        }
                    },
                    {
                        data: 'id',
                        name: 'id',
                        render: function(data, type, row, meta) {
                            let attr = `data-id="${ row['id'] }" `;
                            var show_data = actionShowWithModal(attr);
                            var replay = actionReplayButton(row['id']);
                            return `<div class="flex items-center">
                              ${show_data}</div>`;

                        }
                    },
                ],
            });
        });

        $('#extraSearch').on('click', function() {
            oTable.draw();
        });

        $(document).on('click', '#searchReset', function(e) {
            $('#exportDataForm').trigger("reset");
            e.preventDefault();
            oTable.draw();
        });

        $('.datepicker').daterangepicker();
        $('.datepicker').val('');

        $(document).ready(function() {
            $('#exportDataForm').trigger("reset");
            oTable.draw();
        });

        $(document).on('click', '.closeModal', function(e) {
            $('#changeWithdrawalStatus').modal('hide');
        });

        $(document).on('click', '.changeWithdrawalStatus', function() {
            var data_id = $(this).attr('data-id');
            var data_status = $(this).attr('data-status');
            var status = null;
            if (data_status == 0 || data_status == null) {
                status = 'Pending';
            }
            if (data_status == 1) {
                status = 'Completed';
            }
            if (data_status == 2) {
                status = 'Rejected';
            }
            $('#changeWithdrawalStatusForm').trigger("reset");
            $('select[name=update_withdrawal_status]').val(data_status);
            $('input[name=withdraw_id]').val(data_id);
        });

        $(document).on('click', '.updateStatus', function() {
            var status = $('select[name=update_withdrawal_status]').children("option:selected").val();
            var id = $('input[name=withdraw_id]').val();
            var url = `{{ url('/') }}/admin/contact_us/status/` + id + `/` + status;
            tableChnageStatusWithReason(url, oTable);
            $('#changeWithdrawalStatus').modal('hide');
        });

        $(document).on('click', '.replay', function() {
            var id = $(this).attr('data-id');
            var url = `{{ url('/') }}/admin/contact_us/` + id + `/replay`;
            replayModal(url);
        });

        $(document).on('click', '.clsShowModal', function() {
            var id = $(this).attr('data-id');
            var url = `{{ url('/') }}/admin/contact_us/` + id + `?tab=details`;
            getModalShowData(id, url);
        });

        function actionShowWithModal(attr, statusclass = "clsShowModal") {

let html_data_retun =
    `<a class="button px-2 mr-1 mb-2 mt-2 bg-theme-5 text-purple-900 ml-3 ${statusclass}"  ${attr}" title="Show">
        <span class="w-5 h-5 flex items-center justify-center">
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" class="feather feather-eye w-4 h-4"><path d="M1 12s4-8 11-8 11 8 11 8-4 8-11 8-11-8-11-8z"></path><circle cx="12" cy="12" r="3"></circle></svg>
        </span>
    </a>`;

return html_data_retun;
}

    </script>
@endpush
