$(document).ready(function() {
    initialPagelLoad();
});

$(document).on('click', '.delete-employ', function() {
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

function initialPagelLoad() {
    var table = $('#employ-table').DataTable({
        processing: true,
        serverSide: true,
        ajax: BASE_URL +'/admin/employ-lists',
        columns: [
            { data: 'id'},
            { data: 'name'},
            { data: 'email'},
            { data: 'company.company_name'},
            { data: 'mobile_number'},
            { 
                data: 'image', 
                name: 'image', 
                orderable: false, 
                searchable: false, 
                render: function(data) {
                    return '<img src="' + data + '" alt="Employee Image" style="max-width: 100px; max-height: 100px;">';
                }
            },
            { data: 'joining_date'},
            { data: 'created_at'},
            { data: 'updated_at'},
            { 
                data: null,
                render: function(data, type, full, meta) {
                    return '<div class="btn-group" role="group" aria-label="Company Actions">' +
                               '<a href="' + BASE_URL + '/admin/employ/' + full.encriptedId + '/edit" class="btn btn-primary btn-sm edit-btn">Edit</a>' +
                               '<button class="btn btn-danger btn-sm delete-btn delete-employ" data-url="' + BASE_URL + '/admin/delete-employ/' + full.id + '" data-id="' + full.id + '">Delete</button>' +
                           '</div>';
                }
            }
            
        ]
    });
}
