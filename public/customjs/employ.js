$(document).ready(function() {
    $('.delete-employ').on('click', function() {
        var deleteUrl = $(this).data('url');
        Swal.fire({
            title: 'Are you sure?',
            text: "You won't be able to revert this!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#d33',
            cancelButtonColor: '#3085d6',
            confirmButtonText: 'Yes, delete it!'
        }).then((result) => {
            if (result.isConfirmed) {
                $.ajax({
                    url: deleteUrl,
                    type: 'DELETE',
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    success: function(response) {
                        Swal.fire(
                            'Deleted!',
                            response.message,
                            'success'
                        ).then(function() {
                            location.reload();
                        });
                    },
                    error: function(xhr) {
                        var errorMessage = xhr.responseJSON && xhr.responseJSON.message ? xhr.responseJSON.message : 'An error occurred while deleting the company.';
                        Swal.fire(
                            'Error!',
                            errorMessage,
                            'error'
                        );
                    }
                    
                });
            }
        });
    });
    $('#employee_form').submit(function(event) {
        event.preventDefault();
        var formData = new FormData($(this)[0]);
        var url = $(this).data('url');
        var employeeId = $('#employee_id').val();

        if (employeeId) {
            url = BASE_URL + '/admin/employ/' + employeeId;
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
                        $('#image').closest('.form-group').append('<span class="text-red-500 text-danger">' + messages[0] + '</span>');
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
