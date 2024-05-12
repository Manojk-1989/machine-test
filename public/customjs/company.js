$(document).ready(function() {

    $('#company_logo').change(function() {
        var file = this.files[0];
        var reader = new FileReader();
        reader.onload = function(e) {
            $('#previewImage').attr('src', e.target.result);
            $('#imagePreview').css('display', 'block');
            $('#imagePreviewAlreadyExist').hide();
        };
        reader.readAsDataURL(file);
    });

    $('#annual_turnover').on('keypress', function(event) {
        var charCode = (event.which) ? event.which : event.keyCode;
        if (charCode != 46 && charCode > 31 && (charCode < 48 || charCode > 57)) {
            event.preventDefault();
        } else {
            var input = $(this).val();
            if (charCode == 46 && input.indexOf('.') !== -1) {
                event.preventDefault();
            }
        }
    });

    $('#company_contact_number').on('input', function() {
        var maxLength = 10;
        if ($(this).val().length > maxLength) {
            $(this).val($(this).val().slice(0, maxLength));
        }
    });

    
    
    $('#company_form').submit(function(event) {
        event.preventDefault();
        var timezoneOffset = new Date().getTimezoneOffset();
        var formData = new FormData($(this)[0]);
        formData.append('timezone_offset', timezoneOffset);
        var url = $(this).data('url');
        var companyId = $('#company_id').val();
        if (companyId) {
            url = BASE_URL + '/admin/company/' + companyId;
            formData.append('_method', 'PUT');
        }

        $.ajax({
            url: url,
            type: 'POST',
            data: formData,
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            success: function(response) {
                Swal.fire({
                    icon: 'success',
                    title: 'Success!',
                    text: response.message,
                    showConfirmButton: false,
                    timer: 1500
                }).then(function() {
                    location.reload();
                });
            },
            error: function(xhr, status, error) {
                console.error('Error:', error);
                $('.text-red-500').remove();
                var errors = xhr.responseJSON.errors;
                $.each(errors, function(field, messages) {
                    if (field == 'company_logo') {
                        $('#company_logo').closest('.form-group').append('<span class="text-red-500 text-danger">' + messages[0] + '</span>');
                    } else {
                        $.each(messages, function(index, message) {
                            $('#' + field).closest('.form-group').append('<span class="text-red-500 text-danger">' + message + '</span>');
                        });
                    }
                });
            },
            cache: false,
            contentType: false,
            processData: false
        });
    });
});


