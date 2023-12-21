@extends('admin.layouts.base')
@section('content')
    @include('admin.layouts.components.header', [
        'title' => __('messages.list', [
            'name' => trans_choice('content.occasion', 2),
        ]),
        'breadcrumbs' => Breadcrumbs::render('admin.occasions.index'),
        'create_modal' => [
            'status' => true,
            'id' => 'addNewModal',
            'name' => 'Occasion',
        ],
    ])
    @php
        $add_data = view('admin.occasion.create');
    @endphp
    @include('admin.layouts.components.manager_modal.create_form', [
        'modal_form_html' => $add_data,
        'modal_id' => 'addNewModal',
    ])
    @include('admin.layouts.components.manager_modal.edit_form', [
        'modal_id' => 'editDataModal',
        'edit_form_blade' => 'admin.occasion.edit',
    ])
    @include('admin.layouts.components.manager_modal.details', [
        'modal_id' => 'viewDataModal',
    ])

    @include('admin.layouts.components.datatable_header', [
        'data' => [
            ['classname' => 'fs-5 uppercase', 'title' => trans_choice('content.id_title', 1)],
            ['classname' => 'min-w-125px uppercase fs-5', 'title' => trans_choice('content.name_title', 1)],  
            ['classname' => 'min-w-125px uppercase fs-5', 'title' => trans_choice('content.status', 1)],
            ['classname' => 'min-w-125px uppercase fs-5', 'title' => trans_choice('content.created_at', 1)],
            ['classname' => 'min-w-100px uppercase fs-5', 'title' => trans_choice('content.action_title', 1)],
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
                    [0, 'desc']
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
                    "url": "{{ route('admin.occasions.index') }}",
                    data: function(d) {},
                },
                dom: `<'row datatable_header'<'col-sm-12 col-md-6'l><'col-sm-12 col-md-6'f>>" +
                      "<'row'<'col-sm-12'tr>>" +
                      "<'row datatable_footer'<'col-sm-12 col-md-5'i><'col-sm-12 col-md-7'p>>`,
                columnDefs: [{
                    targets: [4],
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
                            if (data) {
                                return `<div class="text-dark text-hover-primary fs-6">${setStringLength(data,30)}</div>`;
                            } else {
                                return `<div class="font-normal whitespace-no-wrap">{{ __('content.no_data_available') }}</div>`;
                            }
                        }
                    },
                    {
                        data: 'is_active',
                        name: 'is_active',
                        render: function(data, type, row, meta) {
                            var attr =
                                `data-id="${ row['id'] }" data-status="${data}"`;
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
                    {
                        data: 'id',
                        name: 'id',
                        render: function(data, type, row, meta) {
                            let attr = `data-id="${ row['id'] }" `;
                            var edit_data = actionEditWithModal(attr);
                            var show_data = actionShowWithModal(attr);

                            var del_data = actionDeleteButton(row['id']);
                            return `<div class="flex items-center">
                             ${show_data} ${edit_data}</div>`;

                        }
                    },
                ],
            });
        });

        $(document).on('click', '.clsdelete', function() {
            var id = $(this).attr('data-id');
            var e = $(this).parent().parent();
            var url = `{{ url('/') }}/admin/occasions/` + id;
            tableDeleteRow(url, oTable);
        });

        $(document).on('click', '.clsstatus', function() {
            var id = $(this).attr('data-id');
            var status = $(this).attr('data-status');
            console.log(status);
            var url = `{{ url('/') }}/admin/occasions/status/` + id + `/` + status;
            tableChnageStatus(url, oTable);
        });

        $(document).on('click', '.clsEditModal', function() {
            var id = $(this).attr('data-id');
            var url = `{{ url('/') }}/admin/occasions/` + id + `/edit`;
            getModalEditData(id, url);
        });
        $(document).on('click', '.clsShowModal', function() {
            var id = $(this).attr('data-id');
            var url = `{{ url('/') }}/admin/occasions/` + id + `?tab=details`;
            getModalShowData(id, url);
        });
    </script>
    <script>
        $('#OccasionForm').submit(function(e) {
            e.preventDefault();
            let formData = new FormData(this);
            $.ajax({
                type: 'POST',
                url: "{{ route('admin.occasions.store') }}",
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
                        this.reset();
                        $('#addNewModal').modal("hide");
                        oTable.draw();
                        $('#submit_form').html('Save');
                            $('#submit_form').removeClass('disabled');
                            $('#submit_form').attr('disabled', false);
                        Swal.fire('Created!', 'Form submit successfull.', 'success');
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
        $(document).on('submit', '#OccasionFormUpdate', function(e) {
            e.preventDefault();
            var id = $('#modal_id').val();
            let formData = new FormData(this);
            $.ajax({
                type: 'POST',
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                url: `{{ url('/') }}/admin/occasions/` + id,
                data: formData,
                contentType: false,
                processData: false,
                beforeSend: function() {
                    $('#update_form').html('Loading...');
                    $('#update_form').addClass('disabled');
                    $('#update_form').attr('disabled', true);
                },
                success: (response) => {
                    if (response.status == 1) {
                        this.reset();
                        $('#editDataModal').modal("hide");
                        oTable.draw();
                        Swal.fire('Updated!', 'Form Update successfull.', 'success');
                    } else {
                        Swal.fire('Oops...', 'Something went wrong with ajax !',
                            'error');
                            $('#update_form').html('Update');
                            $('#update_form').removeClass('disabled');
                            $('#update_form').attr('disabled', false);
                    }
                },
                error:function(xhr, status, error) {
                        var form = $("#OccasionFormUpdate");
                        if (xhr.status == 422) {
                            var errors = JSON.parse(xhr.responseText).errors;
                            $('#update_form').html('Update');
                            $('#update_form').removeClass('disabled');
                            $('#update_form').attr('disabled', false);
                            customFnErrors(form, errors);
                        } else {
                            $('#update_form').html('Update');
                            $('#update_form').removeClass('disabled');
                            $('#update_form').attr('disabled', false);
                            Swal.fire('Oops...', 'Something went wrong with ajax !', 'error');
                        }
                    },       
            });
        });
    </script>
    <script>
        $("#btnClosePopupAdd").click(function() {
            $("#OccasionForm").trigger("reset");
            $("#addNewModal").modal("hide");
        });

        function actionEditWithModal(attr, statusclass = "clsEditModal") {

let html_data_retun =
    `<a class="button px-2 mr-1 mb-2 mt-2 bg-theme-1 text-white ml-3 ${statusclass}"  ${attr} title="Edit">
            <span class="w-5 h-5 flex items-center justify-center"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" class="feather feather-edit w-4 h-4"><path d="M11 4H4a2 2 0 0 0-2 2v14a2 2 0 0 0 2 2h14a2 2 0 0 0 2-2v-7"></path><path d="M18.5 2.5a2.121 2.121 0 0 1 3 3L12 15l-4 1 1-4 9.5-9.5z"></path></svg></span>
        </a>`;

return html_data_retun;
}

function actionShowWithModal(attr, statusclass = "clsShowModal") {

let html_data_retun =
    `<a class="button px-2 mr-1 mb-2 mt-2 bg-theme-5 text-purple-900 ml-3 ${statusclass}"  ${attr}" title="Show">
        <span class="w-5 h-5 flex items-center justify-center">
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" class="feather feather-eye w-4 h-4"><path d="M1 12s4-8 11-8 11 8 11 8-4 8-11 8-11-8-11-8z"></path><circle cx="12" cy="12" r="3"></circle></svg>
        </span>
    </a>`;

return html_data_retun;
}

function getModalShowData(id, url) {
        $.ajax({
            url: url,
            type: "GET",
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            // dataType: 'json',
            cache: false,
            contentType: false,
            processData: false,
            beforeSend: function() {
                $('.clsShowModal').css('pointer-events','none');
            },
            success: function(response) {
                $('#details_modal_body').html(response.data);
                $('#viewDataModal').modal('show');
                $('.clsShowModal').css('pointer-events','');
            },
            error:function() {
                    $('.clsShowModal').css('pointer-events','');
            },
        })
    }

    function getModalEditData(id, url) {
        $.ajax({
            url: url,
            type: "GET",
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            // dataType: 'json',
            cache: false,
            contentType: false,
            processData: false,
            beforeSend: function() {
                 $('.clsEditModal').css('pointer-events','none');
            },
            success: function(response) {
                $('#form_modal_body').html(response.data);
                $('#editDataModal').modal('show');
                  $('.clsEditModal').css('pointer-events','');
                  if ($('.select2').length > 0) {
                        $('.select2').select2();
                    } 
            },
            error:function() {
                    $('.clsEditModal').css('pointer-events','');
            },
        })
    }
    </script>
@endpush
