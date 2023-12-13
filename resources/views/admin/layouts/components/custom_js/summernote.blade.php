<!-- include summernote css/js -->
<link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.css" rel="stylesheet">
<script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.js"></script>

<script type="text/javascript">
    var KTSummernoteDemo = function() {
        // Private functions
        var demos = function() {
            $('.summernote_editor').summernote({
                height: 200,
                tabsize: 2,

                toolbar: [
                    ['style', ['style']],
                    ['font', ['bold', 'italic', 'underline', 'strikethrough', 'superscript',
                        'subscript', 'clear'
                    ]],
                    ['fontname', ['fontname']],
                    ['fontsize', ['fontsize']],
                    ['color', ['color']],
                    ['para', ['ol', 'ul', 'paragraph', 'height']],
                    ['table', ['table']],
                    // ['insert', ['link','picture']],
                    // ['insert', ['link']],
                    ['view', ['undo', 'redo', 'codeview', 'help']]
                ],

                tableClassName: function() {

                    $(this).addClass('table table-bordered')
                        .attr('cellpadding', 12)
                        .attr('cellspacing', 0)
                        .attr('border', 1)
                        .css('border-collapse', 'collapse')
                        .css('font-family', 'arial, sans-serif')
                        .css('width', '100%');
                    $(this).find('td')
                        .css('border', '1px solid # dddddd ')
                        .css('text-align', 'left')
                        .css('padding', '8px');

                },

                // callbacks: {
                //     onImageUpload: function(files, editor, welEditable) {
                //         sendFile(files[0], editor, welEditable);
                //     }
                // }
            });
            $('.note-editable').css('font-size', '11px');
        }

        return {
            // public functions
            init: function() {
                demos();
            }
        };
    }();
</script>

<script>
    // Initialization
    $(document).ready(function() {
        KTSummernoteDemo.init();
        $(".summernote_editor").on("summernote_editor.change", function(e) { // callback as jquery custom event
            // console.log('it is changed');
            summernoteTextValidate();
            summernoteExerciseValidation();
            summernoteExercise2Validation();
        });
    });


    function summernoteTextValidate() {
        // console.log('summer');
        var val = $('#editor_description').val();
        document.getElementById('summernote_content').innerHTML = val;
        var summernote_content = document.getElementById('summernote_content').innerText;
        // console.log('summernote_content = ' + summernote_content);
        console.log(summernote_content);
        if (summernote_content == '') {
            $('#error_message').show();
            return false;
        } else {
            $('#error_message').hide();
            return true;
        }

    }

    function summernotePageContentTextValidate() {
        // console.log('summer');
        var val = $('#editor_description').val();
        document.getElementById('summernote_content').innerHTML = val;
        var summernote_content = document.getElementById('summernote_content').innerText;
        // console.log('summernote_content = ' + summernote_content);
        console.log(summernote_content);
        if (summernote_content == '') {
            $('#error_message').show();
            return false;
        } else {
            $('#error_message').hide();
            return true;
        }

    }

    function summernoteExerciseValidation() {
        var exercise_description_1 = $('#editor_description_1').val();
        document.getElementById('exercise_content_1').innerHTML = exercise_description_1;

        var exercise_1 = document.getElementById('exercise_content_1').innerText;
        console.log(exercise_1.length);
        if (exercise_1 == '') {
            $('#short_description_1-error').html('Short Description Firth field is required.');
            $('#short_description_1-error').show();
            return false;
        } else if (exercise_1.length > 500) {
            // $('#short_description_1-error').html('');
            $('#short_description_1-error').html('The Short Description Firth must not be greater than 500 characters');
            $('#short_description_1-error').show();
            return false;
        } else {
            // $('#short_description_1-error').html('');
            $('#short_description_1-error').hide();
            return true;
        }
    }

    function summernoteExercise2Validation() {
        var exercise_description_2 = $('#editor_description_2').val();
        document.getElementById('exercise_content_2').innerHTML = exercise_description_2;

        var exercise_2 = document.getElementById('exercise_content_2').innerText;

        if (exercise_2.length > 500) {
            $('#short_description_2-error').show();
            return false;
        } else {
            $('#short_description_2-error').hide();
            return true;
        }
    }

    function summernoteExercise3Validation() {
        var exercise_description_3 = $('#editor_description_3').val();
        document.getElementById('exercise_content_3').innerHTML = exercise_description_3;

        var exercise_3 = document.getElementById('exercise_content_3').innerText;

        if (exercise_3.length > 500) {
            $('#short_description_3-error').show();
            return false;
        } else {
            $('#short_description_3-error').hide();
            return true;
        }
    }

    function summernoteExercise4Validation() {
        var exercise_description_4 = $('#editor_description_4').val();
        document.getElementById('exercise_content_4').innerHTML = exercise_description_4;

        var exercise_4 = document.getElementById('exercise_content_4').innerText;

        if (exercise_4.length > 500) {
            $('#short_description_4-error').show();
            return false;
        } else {
            $('#short_description_4-error').hide();
            return true;
        }
    }

    function summernoteExercise5Validation() {
        var exercise_description_5 = $('#editor_description_5').val();
        document.getElementById('exercise_content_5').innerHTML = exercise_description_5;

        var exercise_5 = document.getElementById('exercise_content_5').innerText;
        // console.log(exercise_5);
        if (exercise_5.length > 500) {
            $('#short_description_5-error').show();
            return false;
        } else {
            $('#short_description_5-error').hide();
            return true;
        }
    }
</script>

{{-- <script>
    function sendFile(file, editor, welEditable) {
        var data = new FormData();
        // console.log("asdasdda", file);
        data.append("file", file);
        // console.log(data);
        $.ajax({
            url: `{{ route('admin.summernote.file_upload') }}`,
            type: "POST",
            data: data,
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            // dataType: 'json',
            cache: false,
            contentType: false,
            processData: false,
            success: function(url) {
                // console.log(url);
                $('.summernote').summernote('editor.insertImage', url);
                // editor.insertImage(welEditable, url);
            }
        });
    }
</script> --}}
