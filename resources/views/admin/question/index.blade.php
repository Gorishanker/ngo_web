@extends('admin.layouts.base')
@section('content')
    @include('admin.layouts.components.header', [
        'title' => __('messages.list', [
            'name' => trans_choice('content.questation', 2),
        ]),
        'breadcrumbs' => Breadcrumbs::render('admin.questions.index'),
        'create_modal' => [
            'status' => true,
            'id' => 'addNewModal',
            'name' => trans_choice('content.questation', 1),
        ],
    ])
    @php
        $add_data = view('admin.question.create');
    @endphp
    @include('admin.layouts.components.manager_modal.create_form', [
        'modal_form_html' => $add_data,
        'modal_id' => 'addNewModal',
    ])
    @include('admin.layouts.components.manager_modal.edit_form', [
        'modal_id' => 'editDataModal',
        'edit_form_blade' => 'admin.questation.edit',
    ])
    @include('admin.layouts.components.manager_modal.details', [
        'modal_id' => 'viewDataModal',
    ])

    @include('admin.layouts.components.datatable_header', [
        'data' => [
            ['classname' => 'fs-5 uppercase', 'title' => trans_choice('content.id_title', 1)],
            ['classname' => 'min-w-125px uppercase fs-5', 'title' => trans_choice('content.questation', 2)],  
            ['classname' => 'min-w-125px uppercase fs-5', 'title' => trans_choice('content.language', 1)],
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
                    "url": "{{ route('admin.questions.index') }}",
                    data: function(d) {},
                },
                dom: `<'row datatable_header'<'col-sm-12 col-md-6'l><'col-sm-12 col-md-6'f>>" +
                      "<'row'<'col-sm-12'tr>>" +
                      "<'row datatable_footer'<'col-sm-12 col-md-5'i><'col-sm-12 col-md-7'p>>`,
                columnDefs: [{
                    targets: [5],
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
                        data: 'question',
                        name: 'question',
                        render: function(data, type, row, meta) {
                            if (data) {
                                return `<div class="text-dark text-hover-primary fs-6">${setStringLength(data,25)}</div>`;
                            } else {
                                return `<div class="font-normal whitespace-no-wrap">{{ __('content.no_data_available') }}</div>`;
                            }
                        }
                    },
                   {
                        data: 'language',
                        name: 'language',
                        render: function(data, type, row, meta) {
                            if (data) {
                                if (data == 'en')
                                    return `<div class="font-normal whitespace-no-wrap">English</div>`;
                                else if (data == 'hi')
                                    return `<div class="font-normal whitespace-no-wrap">Hindi</div>`;
                                else
                                    return `<div class="font-normal whitespace-no-wrap capitalize">${data}</div>`;
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
                             ${show_data} ${edit_data} ${del_data}</div>`;

                        }
                    },
                ],
            });
        });

        $(document).on('click', '.clsdelete', function() {
            var id = $(this).attr('data-id');
            var e = $(this).parent().parent();
            var url = `{{ url('/') }}/admin/questions/` + id;
            tableDeleteRow(url, oTable);
        });

        $(document).on('click', '.clsstatus', function() {
            var id = $(this).attr('data-id');
            var status = $(this).attr('data-status');
            console.log(status);
            var url = `{{ url('/') }}/admin/questions/status/` + id + `/` + status;
            tableChnageStatus(url, oTable);
        });

        $(document).on('click', '.clsEditModal', function() {
            var id = $(this).attr('data-id');
            var url = `{{ url('/') }}/admin/questions/` + id + `/edit`;
            getModalEditData(id, url);
        });
        $(document).on('click', '.clsShowModal', function() {
            var id = $(this).attr('data-id');
            var url = `{{ url('/') }}/admin/questions/` + id + `?tab=details`;
            getModalShowData(id, url);
        });
    </script>
    <script>
        $('#QuestationForm').submit(function(e) {
            e.preventDefault();
            let formData = new FormData(this);
            $.ajax({
                type: 'POST',
                url: "{{ route('admin.questions.store') }}",
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
                 error:function() {
                             $('#submit_form').html('Save');
                            $('#submit_form').removeClass('disabled');
                            $('#submit_form').attr('disabled', false);
                    },
            });
        });
    </script>
    <script>
        $(document).on('submit', '#QuestationFormUpdate', function(e) {
            e.preventDefault();
            var id = $('#modal_id').val();
            let formData = new FormData(this);
            $.ajax({
                type: 'POST',
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                url: `{{ url('/') }}/admin/questions/` + id,
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
                        var form = $("#QuestationFormUpdate");
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
            $("#QuestationForm").trigger("reset");
            $("#addNewModal").modal("hide");
        });
    </script>
@endpush
