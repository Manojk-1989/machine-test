$(document).ready(function() {

    initialPagelLoad();
});

$(document).on('click', '.delete-company', function() {
    var deleteUrl = $(this).data('url');

    alert(deleteUrl);
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


function initialPagelLoad() {
    var table = $('#company-table').DataTable({
        processing: true,
        serverSide: true,
        ajax: BASE_URL +'/admin/company-lists',
        columns: [
            { data: 'id', name: 'id' },
            // Add columns for each attribute you want to display
            { data: 'company_name'},
            { data: 'company_description'},
            { 
                data: 'image', 
                name: 'image', 
                orderable: false, 
                searchable: false, 
                render: function(data) {
                    return '<img src="' + data + '" alt="Employee Image" style="max-width: 100px; max-height: 100px;">';
                }
            },
            { data: 'company_contact_number'},
            { data: 'annual_turnover'},
            { 
                data: null,
                render: function(data, type, full, meta) {
                    return '<div class="btn-group" role="group" aria-label="Company Actions">' +
                               '<a href="' + BASE_URL + '/admin/company/' + full.id + '/edit" class="btn btn-primary btn-sm edit-btn">Edit</a>' +
                               '<button class="btn btn-danger btn-sm delete-btn delete-company" data-url="' + BASE_URL + '/admin/delete-company/' + full.id + '" data-id="' + full.id + '">Delete</button>' +
                           '</div>';
                }
            }
            
        ]
    });
}