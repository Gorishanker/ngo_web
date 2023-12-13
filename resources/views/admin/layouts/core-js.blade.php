<!-- BEGIN: JS Assets-->
<script src="https://developers.google.com/maps/documentation/javascript/examples/markerclusterer/markerclusterer.js">
</script>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"
    integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>

<script src="https://cdn.jsdelivr.net/npm/sweetalert2@10.16.6/dist/sweetalert2.min.js"></script>
<script src="{{ asset('admin/dist/js/app.js') }}"></script>

<script>
    $(document).on('keypress', '.only_number', function(e) {
        // Only ASCII charactar in that range allowed
        var ASCIICode = (e.which) ? e.which : e.keyCode;
        $("#onlynumber_error").html("");
        // console.log(ASCIICode);
        if (ASCIICode > 31 && (ASCIICode < 48 || ASCIICode > 57) && (ASCIICode != 46)) {
            $("#onlynumber_error").html("Only Numbers allowed.");
            return false;
        }
        return true;
    });

    function setStringLength(string_value, length = 20) {
        if (string_value == null || string_value == undefined) {
            return "Na";
        } else {
            return string_value.length > length ? string_value.substring(0, length) + "..." : string_value;
        }
    }

    function getDateByFormat(date) {
        const d = new Date(date);
        const ye = new Intl.DateTimeFormat('en', {
            year: 'numeric'
        }).format(d);
        const mo = new Intl.DateTimeFormat('en', {
            month: 'short'
        }).format(d);
        const da = new Intl.DateTimeFormat('en', {
            day: '2-digit'
        }).format(d);
        return `${da} ${mo} ${ye}`;
    }

    function getDateTimeByFormat(date) {
        const d = new Date(date);
        const ye = new Intl.DateTimeFormat('en', {
            year: 'numeric'
        }).format(d);
        const mo = new Intl.DateTimeFormat('en', {
            month: 'short'
        }).format(d);
        const da = new Intl.DateTimeFormat('en', {
            day: '2-digit'
        }).format(d);
        const h = new Intl.DateTimeFormat('en', {
            hour: '2-digit',
            minute: '2-digit',
            hour12: true,
        }).format(d);
        return `${da} ${mo} ${ye} ${h}`;
    }

    function getDurationByDate(date) {
        const createDate = new Date(date);
        const nowDate = new Date();
        const diffTime = Math.abs(nowDate - createDate);
        const diffDays = Math.ceil(diffTime / (1000 * 60 * 60 * 24));
        return diffDays;

    }

    function serialNumberShow(meta) {
        return (parseInt(meta.row) + parseInt(meta.settings._iDisplayStart + 1));
    }

    function actionEditButton(url, id) {
        // return `<a class="btn btn-sm btn-clean btn-icon btn-icon-md" target="_blank" href="`+url+`" data-id="` + id + `" title="Edit"><i class="fa fa-edit text-success" ></i></a>`;
        return `<a class="button px-2 mr-1 mb-2 mt-2 bg-theme-1 text-white ml-3" href="` + url + `" data-id="` + id + `" title="Edit">
                    <span class="w-5 h-5 flex items-center justify-center"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" class="feather feather-edit w-4 h-4"><path d="M11 4H4a2 2 0 0 0-2 2v14a2 2 0 0 0 2 2h14a2 2 0 0 0 2-2v-7"></path><path d="M18.5 2.5a2.121 2.121 0 0 1 3 3L12 15l-4 1 1-4 9.5-9.5z"></path></svg></span>
                </a>`;
    }

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

    function actionShowButton(url) {
        // return `<a class="btn btn-sm btn-clean btn-icon btn-icon-md" target="_blank" href="`+url+`" title="Show"><i class="si si-eye text-primary"  ></i></a>`;
        return `<a class="button px-2 mr-1 mb-2 mt-2 bg-theme-5 text-purple-900" href="` + url + `" title="Show">
                <span class="w-5 h-5 flex items-center justify-center">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" class="feather feather-eye w-4 h-4"><path d="M1 12s4-8 11-8 11 8 11 8-4 8-11 8-11-8-11-8z"></path><circle cx="12" cy="12" r="3"></circle></svg>
                </span>
            </a>`;
    }

    function actionReplayButton(id) {
        return `<a href="javascript:;" title="Reply" class="button px-2 mr-1 mb-2 mt-2 bg-theme-5 text-purple-900 ml-3 replay" data-id="${id}">
                <span class="w-5 h-5 flex items-center justify-center">
                    <i class="fa-solid fa-reply"></i>
                </span>
            </a>`;
    }

    function actionDownloadButton(url) {
        // return `<a class="btn btn-sm btn-clean btn-icon btn-icon-md" target="_blank" href="`+url+`" title="Show"><i class="si si-eye text-primary"  ></i></a>`;
        return `<a class="button px-2 mr-1 mb-2 mt-2 bg-theme-5 text-purple-900 ml-3" href="` + url + `" title="Download" download>
                <span class="w-5 h-5 flex items-center justify-center">
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-download" viewBox="0 0 16 16">
                        <path d="M.5 9.9a.5.5 0 0 1 .5.5v2.5a1 1 0 0 0 1 1h12a1 1 0 0 0 1-1v-2.5a.5.5 0 0 1 1 0v2.5a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2v-2.5a.5.5 0 0 1 .5-.5z"/>
                        <path d="M7.646 11.854a.5.5 0 0 0 .708 0l3-3a.5.5 0 0 0-.708-.708L8.5 10.293V1.5a.5.5 0 0 0-1 0v8.793L5.354 8.146a.5.5 0 1 0-.708.708l3 3z"/>
                    </svg>  
                </span>
            </a>`;
    }

    function actionMailButton(url) {
        // return `<a class="btn btn-sm btn-clean btn-icon btn-icon-md" target="_blank" href="`+url+`" title="Show"><i class="si si-eye text-primary"  ></i></a>`;
        return `<a class="button px-2 mr-1 mb-2 mt-2 bg-theme-2 text-purple-900 mr-3" target="_blank" href="` + url + `" title="Show">
            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" class="feather feather-mail mx-auto"><path d="M4 4h16c1.1 0 2 .9 2 2v12c0 1.1-.9 2-2 2H4c-1.1 0-2-.9-2-2V6c0-1.1.9-2 2-2z"></path><polyline points="22,6 12,13 2,6"></polyline></svg>
            </a>`;
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

    $(document).on('click', '#btnClosePopupEdit', function(e) {
        $("#editDataModal").modal('hide');
    });

    // function createModalData(url, form_id) {
    //     $.ajaxSetup({
    //         headers: {
    //             'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    //         }
    //     });

    //     $(form_id).submit(function(e) {
    //         e.preventDefault();
    //         let formData = new FormData(this);
    //         $.ajax({
    //             type: 'POST',
    //             url: url,
    //             data: formData,
    //             contentType: false,
    //             processData: false,
    //             success: (response) => {
    //                 if (response.status == 1) {
    //                     this.reset();
    //                     $('#addNewModal').modal("hide");
    //                     oTable.draw();
    //                     Swal.fire('Created!', 'Form submit successfull.', 'success');
    //                 } else {
    //                     Swal.fire('Oops...', 'Something went wrong with ajax !',
    //                         'error');
    //                 }
    //             },
    //         });
    //     });
    // }

    function actionShowTitle(url, stringTitle) {
        return `<a class="btn btn-sm btn-clean" href="` + url + `" title="` + stringTitle + `">` + stringTitle + `</a>`;
    }

    function actionDeleteButton(id, deleteclass = "clsdelete") {
        return `<a class="button px-2 mr-1 mb-2 mt-2 bg-theme-6 text-white ml-3 ${deleteclass}" data-id="${id}" href="javascript:;" >
                    <span class="w-5 h-5 flex items-center justify-center"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" class="feather feather-trash-2 w-4 h-4"><polyline points="3 6 5 6 21 6"></polyline><path d="M19 6v14a2 2 0 0 1-2 2H7a2 2 0 0 1-2-2V6m3 0V4a2 2 0 0 1 2-2h4a2 2 0 0 1 2 2v2"></path><line x1="10" y1="11" x2="10" y2="17"></line><line x1="14" y1="11" x2="14" y2="17"></line></svg></span>
                </a>`
    }

    function doc_status_dropdown(data, attr, drclass, reason = null) {
        var approve = null;
        var pending = null;
        var decline = null;
        if (data == 0 || data == null) {
            pending = 'selected';
        }
        if (data == 1) {
            approve = 'selected';
        }
        if (data == 2) {
            decline = 'selected';
        }
        if (reason) {
            return `<div style="position: relative;margin: 0 -8px 0 0;">
                                    <select class='${drclass}' ${attr} style="padding: 3px 10px;border-radius: 8px;">
                                        <option value='0' ${pending}>Pending</option>
                                            <option value='1' ${approve}>Approve</option>
                                            <option value='2' ${decline}>Decline</option>
                                    </select> 
                                    <span class="ml-2" title="${reason}"><svg style="float: right;margin: -5px 3px 1px -19px;" xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-question-circle" viewBox="0 0 16 16">
                                    <path d="M8 15A7 7 0 1 1 8 1a7 7 0 0 1 0 14zm0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16z"/>
                                    <path d="M5.255 5.786a.237.237 0 0 0 .241.247h.825c.138 0 .248-.113.266-.25.09-.656.54-1.134 1.342-1.134.686 0 1.314.343 1.314 1.168 0 .635-.374.927-.965 1.371-.673.489-1.206 1.06-1.168 1.987l.003.217a.25.25 0 0 0 .25.246h.811a.25.25 0 0 0 .25-.25v-.105c0-.718.273-.927 1.01-1.486.609-.463 1.244-.977 1.244-2.056 0-1.511-1.276-2.241-2.673-2.241-1.267 0-2.655.59-2.75 2.286zm1.557 5.763c0 .533.425.927 1.01.927.609 0 1.028-.394 1.028-.927 0-.552-.42-.94-1.029-.94-.584 0-1.009.388-1.009.94z"/>
                                    </svg></span>
                                </div>`;
        }
        return `<div style="position: relative;">
                                    <select class='${drclass}' ${attr} style="padding: 3px 10px;border-radius: 8px;">
                                        <option value='0' ${pending}>Pending</option>
                                            <option value='1' ${approve}>Approve</option>
                                            <option value='2' ${decline}>Decline</option>
                                    </select>
                                </div>`;
    }

    function contact_status_dropdown(data, id) {
        var pending = null;
        var processing = null;
        var complete = null;
        if (data == 'pending' || data == null) {
            pending = 'selected';
        }
        if (data == 'processing') {
            processing = 'selected';
        }
        if (data == 'complete') {
            complete = 'selected';
        }
        return `<div class="flex items-center sm:justify-center">
                                    <select class='clsstatus' contact_id='${id}'>
                                        <option value='processing' ${processing}>Pending</option>
                                            <option value='pending' ${pending}>Processing</option>
                                            <option value='complete' ${complete}>Complete</option>
                                    </select>
                                </div>`;
    }

    function actionActiveButton(data, attr, statusclass = "clsstatus") {
        if (data) {
            return `<div class="flex text-theme-9">
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                    viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5"
                    stroke-linecap="round" stroke-linejoin="round" class="feather feather-check-square w-4 h-4 mr-2">
                    <polyline points="9 11 12 14 22 4"></polyline>
                    <path d="M21 12v7a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h11"></path>
                </svg>
                <span class="cursor-pointer ${statusclass}"  ${attr} >Active </span>
            </div>`;
        } else {
            return `<div class="flex text-theme-6">
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                    viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5"
                    stroke-linecap="round" stroke-linejoin="round" class="feather feather-check-square w-4 h-4 mr-2">
                    <polyline points="9 11 12 14 22 4"></polyline>
                    <path d="M21 12v7a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h11"></path>
                </svg>
                <span  class="cursor-pointer ${statusclass}"  ${attr} >Inactive </span>
            </div>`;
        }
    }

    function actionOnlineButton(data) {
        if (data) {
            return `<div class="flex items-center sm:justify-center text-theme-9">
                <span class="cursor-pointer">Online</span>
            </div>`;
        } else {
            return `<div class="flex items-center sm:justify-center text-theme-6">
                <span  class="cursor-pointer">Offline </span>
            </div>`;
        }
    }

    function actionHomeButton(data, attr, statusclass = "clshome") {
        var html_data_retun = '';
        if (data) {
            html_data_retun = `
            <a class="button px-2 mr-1 mb-2 mt-2 text-white mr-3 bg-theme-9 ${statusclass}"  ${attr}">
                     <span class="w-5 h-5 flex items-center justify-center">
                         <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" class="feather feather-home w-4 h-4"><path d="M3 9l9-7 9 7v11a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2z"></path><polyline points="9 22 9 12 15 12 15 22"></polyline></svg></span>
                 </a>`;
        } else {
            html_data_retun = `
            <a class="button px-2 mr-1 mb-2 mt-2 text-white mr-3 bg-theme-12 ${statusclass}"  ${attr}">
                     <span class="w-5 h-5 flex items-center justify-center">
                         <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" class="feather feather-home w-4 h-4"><path d="M3 9l9-7 9 7v11a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2z"></path><polyline points="9 22 9 12 15 12 15 22"></polyline></svg></span>
                 </a>`;
        }
        return html_data_retun;
    }

    function actionDetailsModalButton(data, attr, statusclass = "clsdetails") {
        let html_data_retun = `<a class="button ${statusclass}"  ${attr}">
                     <span class="w-5 h-5 flex items-center justify-center"> ${data} </a>`;
        return html_data_retun;
    }

    function imagesPreview(input, image_id) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();
            reader.onload = function(e) {
                $('#' + image_id).attr('src', e.target.result);
            }
            reader.readAsDataURL(input.files[0]); // convert to base64 string
        }
    }

    function updateWithReason(url, id, status, oTable) {
        Swal.fire({
            title: 'Submit your reason',
            input: 'text',
            inputAttributes: {
                autocapitalize: 'off'
            },
            showCancelButton: true,
            confirmButtonText: 'Submit',
            showLoaderOnConfirm: true,
            preConfirm: function() {
                var reason = $('.swal2-input').val();
                if (reason) {
                    return new Promise(function(resolve) {
                        $.ajax({
                                headers: {
                                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                                },
                                url: url,
                                type: 'GET',
                                dataType: 'json',
                                data: 'reason=' + reason,
                            })
                            .done(function(response) {
                                oTable.draw();
                                Swal.fire('Updated!', response.message, 'success');
                            })
                            .fail(function() {
                                Swal.fire('Oops...', 'Something went wrong with ajax !',
                                    'error');
                            });
                    });
                } else {
                    oTable.draw();
                    return false;
                }
            },
            allowOutsideClick: false
        })
    }

    function replayModal(url) {
        Swal.fire({
            title: 'Submit your reply',
            input: 'text',
            inputAttributes: {
                autocapitalize: 'off'
            },
            showCancelButton: true,
            confirmButtonText: 'Submit',
            showLoaderOnConfirm: true,
            preConfirm: function() {
                var replay = $('.swal2-input').val();
                if (replay) {
                    return new Promise(function(resolve) {
                        $.ajax({
                                headers: {
                                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                                },
                                url: url,
                                type: 'POST',
                                dataType: 'json',
                                data: 'replay=' + replay,
                            })
                            .done(function(response) {
                                Swal.fire('Updated!', response.message, 'success');
                            })
                            .fail(function() {
                                Swal.fire('Oops...', 'Something went wrong with ajax !',
                                    'error');
                            });
                    });
                } else {
                    return false;
                }
            },
            allowOutsideClick: false
        })
    }

    function tableDeleteRow(url, oTable) {
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
                                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                            },
                            url: url,
                            type: 'DELETE',
                            dataType: 'json'
                        })
                        .done(function(response) {
                            oTable.draw();
                            Swal.fire('Deleted!', response.message, 'success');
                        })
                        .fail(function() {
                            Swal.fire('Oops...', 'Something went wrong with ajax !', 'error');
                        });
                });
            },
            allowOutsideClick: false
        });
    }

    function customFnErrors(form, element_errors) {
        form.find('.invalid-feedback').remove();
        $.each(element_errors, function(key, element_error) {
            var html = `<div class="invalid-feedback" style="display: block;color: red;">`;
            $.each(element_error, function(index, error) {
                html = html + error;
            });
            html = html + `</div>`;
            if (key.indexOf(".") != -1) {
                var arr = key.split(".");
                var selector = "[name='" + arr[0];
                for (var i = 1; i < arr.length; i++) {
                    selector = selector + "[" + arr[i] + "]";
                }
                selector = selector + "']";
                form.find(selector).closest('.form-group').append(html);
            } else {
                if (form.find('[name="' + key + '"]').length) {
                    form.find('[name="' + key + '"]').closest(' .form-group').append(html);
                } else if (form.find('[name="' + key + '[]"]').length) {
                    form.find('[name="' + key + '[]"]').closest('.form-group').append(html);
                }
            }
        });
    }

    function tableDeleteRowWithoutDatatable(url) {
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
                                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                            },
                            url: url,
                            type: 'DELETE',
                            dataType: 'json'
                        })
                        .done(function(response) {
                            $('.divStatus').load(' .divStatus');
                            Swal.fire('Deleted!', response.message, 'success');
                        })
                        .fail(function() {
                            $('.divStatus').load(' .divStatus');
                            Swal.fire('Oops...', 'Something went wrong with ajax !', 'error');
                        });
                });
            },
            allowOutsideClick: false
        });
    }

    function tableChnageStatus(url, oTable) {
        Swal.fire({
            title: 'Are you sure?',
            text: "You will be able to revert this.",
            type: 'info',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Yes',
            showLoaderOnConfirm: true,
            preConfirm: function() {
                return new Promise(function(resolve) {
                    $.ajax({
                            headers: {
                                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr(
                                    'content')
                            },
                            url: url,
                            type: 'GET',
                            dataType: 'json'
                        })
                        .done(function(response) {
                            if (response.status == 1) {
                                oTable.draw();
                                Swal.fire('Updated!', response.message, 'success');
                            } else {
                                Swal.fire('Info!', response.message, 'info');
                            }
                        })
                        .fail(function() {
                            Swal.fire('Oops...', 'Something went wrong with ajax !',
                                'error');
                        });
                });
            },
            allowOutsideClick: false
        });
    }

    function tableChnageStatusWithReason(url, oTable, reason = null) {
        Swal.fire({
            title: 'Are you sure?',
            text: "You will be able to revert this.",
            type: 'info',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Yes',
            showLoaderOnConfirm: true,
            preConfirm: function() {
                return new Promise(function(resolve) {
                    $.ajax({
                            headers: {
                                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr(
                                    'content')
                            },
                            url: url,
                            type: 'GET',
                            dataType: 'json',
                            data: 'reason=' + reason,
                        })
                        .done(function(response) {
                            if (response.status == 1) {
                                oTable.draw();
                                Swal.fire('Updated!', response.message, 'success');
                            } else {
                                Swal.fire('Info!', response.message, 'info');
                            }
                        })
                        .fail(function() {
                            Swal.fire('Oops...', 'Something went wrong with ajax !',
                                'error');
                        });
                });
            },
            allowOutsideClick: false
        });
    }


    function tableChnageStatusWithoutDataTable(url, status) {
        Swal.fire({
            title: 'Are you sure?',
            text: "You will be able to revert this.",
            type: 'info',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Yes',
            showLoaderOnConfirm: true,
            preConfirm: function() {
                return new Promise(function(resolve) {
                    $.ajax({
                            headers: {
                                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr(
                                    'content')
                            },
                            url: url,
                            type: 'GET',
                            dataType: 'json'
                        })
                        .done(function(response) {
                            if (response.status == 1) {
                                $('.divStatus').load(' .divStatus');
                                Swal.fire('Updated!', response.message, 'success');
                            } else {
                                $('.divStatus').load(' .divStatus');
                                Swal.fire('Info!', response.message, 'info');
                            }
                        })
                        .fail(function() {
                            Swal.fire('Oops...', 'Something went wrong with ajax !',
                                'error');
                        });
                });
            },
            allowOutsideClick: false
        });
    }

    // Show Details on modal
    function showDetailsModal(url) {
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
            success: function(response) {
                $('#details_modal_body').html(response.data);
                $('#details_modal').modal('show');
            }
        })
    }

    function checkForm(form) // Submit button clicked
    {
        if ($(form).valid()) {
            console.log('valid');
            var btn = document.getElementById("submit_btn");
            btn.innerHTML = "<i class='fa fa-spinner fa-spin'></i> Please wait...";
            form.submit_btn.disabled = true;
            return true;
        }
        // console.log('invalid');
        return false;
    }

    function checkFormSummernote(form) // Submit button clicked
    {
        console.log('in');
        if (summernoteTextValidate()) {
            return checkForm(form);
        } else if (summernoteExerciseValidation()) {
            return checkForm(form);
        } else if (summernoteExercise2Validation()) {
            return checkForm(form);
        }
        // console.log('invalid');
        return false;
    }

    $(document).ready(function() {
        setTimeout(function() {
            if ($('#ns').length > 0) {
                $('#ns').remove();
            }
        }, 5000)
    });


    function readURL(input, attr_id = "") {
        var attrId = $(attr_id).attr('id');
        if (input.files && input.files[0]) {
            var reader = new FileReader();
            reader.onload = function(e) {
                if (attrId) {
                    $('#backImage_' + attrId).attr('src', e.target.result);
                } else {
                    $('#backImage_').attr('src', e.target.result);
                }
            };
            reader.readAsDataURL(input.files[0]);
        }
    }
    // toastr.options = {
    //     timeOut: 0,
    //     extendedTimeOut: 0,
    //     tapToDismiss: false
    // };

    // toastr.options = {
    //     "closeButton": true,
    //     "debug": true,
    //     "newestOnTop": true,
    //     "progressBar": true,
    //     "positionClass": "toast-top-right",
    //     "preventDuplicates": false,
    //     "onclick": null,
    //     "showDuration": "300",
    //     "hideDuration": "1000",
    //     "timeOut": "4000",
    //     "extendedTimeOut": "1000",
    //     "showEasing": "swing",
    //     "hideEasing": "linear",
    //     "showMethod": "fadeIn",
    //     "hideMethod": "fadeOut"
    // };
</script>
