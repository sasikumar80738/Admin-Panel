
<!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Add Item</title>
        <!-- Include Bootstrap CSS -->
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">

        <style>
        table {
            width: 100%;
            border-collapse: collapse;
            margin-left:100px;
            margin-right:100px;

        }

        th {
            background-color: #f2f2f2;
            color: #333;
            padding: 10px;
            text-align: left;
        }

        tr {
            border-bottom: 1px solid #ddd;
        }

        td {
            padding: 10px;
            vertical-align: top;
        }

        .btn {
            padding: 6px 12px;
            text-decoration: none;
            color: #fff;
            background-color: #007bff;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }

        .btn-primary {
            background-color: #007bff;
        }

        .btn-danger {
            background-color: #dc3545;
        }

        .btn:hover {
            opacity: 0.8;
        }
    </style>
    </head>
    <body>
    <h1 style="text-align: center; color: green;">Admin Panel</h1>

    <!-- add form  -->
    <div class="modal" id="addItemModal" tabindex="-1" role="dialog" style="display: none;">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <form id='add-crud'>
                    @csrf
                    <div class="modal-header">
                        <h5 class="modal-title">Add Item</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="form-group">
                            <label for="title">Customer name:</label>
                            <input type="text" class="form-control" name="title" required>
                        </div>

                        <div class="form-group">  
                            <label for="description">City:</label>
                            <textarea class="form-control" name="description" required></textarea>
                        </div>

                        

                        <div class="form-group">
                            <label for="created_date">Date Time:</label>
                            <input type="datetime-local" class="form-control" name="datetime" required>
                        </div>
                            
                        <div class="form-group">
                            <label for="status">Status</label>
                            <div class="form-check">
                                <input type="radio" id="active" name="status" value="active" class="form-check-input">
                                <label for="active" class="form-check-label">Active</label>
                            </div>
                            <div class="form-check">
                                <input type="radio" id="inactive" name="status" value="inactive" class="form-check-input">
                                <label for="inactive" class="form-check-label">Inactive</label>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-primary">Add</button>
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    </div>

                    </div>
                    
                </form>
            </div>
        </div>
    </div>
    <tbody id="content"></tbody>



    <!-- index view  -->


    <div class="container mt-5">
    <div class="row">
        <div class="col-md-4">
        <button id="addItemButton" class="btn btn-primary" style="width: 150px; height: 50px;">Add Customer</button><br><br>

            <input type="text" id="livesearch" placeholder="Search customer name or City" style="width: 400px; height: 60px;">

        </div>
        <div class="col-md-4">
        <!-- <a href="{{ route('export') }}" class="btn btn-success " style="width: 150px; height: 50px;">Export Data</a>            -->
        </div>
        <div class="col-md-4">
        <form id="importForm"  enctype="multipart/form-data">
                @csrf
                <div class="form-group">
                    <label for="import_file">Import Excel File:</label>
                    <input type="file" class="form-control-file" name="import_file" id="import_file" accept=".xls,.xlsx">
                </div>
                <button type="submit" class="btn btn-primary" style="width: 150px; height: 50px;">Import</button>
                <a href="{{ route('export') }}" class="btn btn-success " style="width: 150px; height: 50px;">Export Data</a>   
            </form>
          
        </div>
    </div>
</div>



    <br><br>

    <div class="row">
        <div class="col-md-10">

        <table class="table">
        <thead id="table-body22">
            <tr>
                <th>ID</th>
                <th>Customer name</th>
                <th>City</th>
                <th>Status</th>
                <th>Created date</th>
                <th>Edit</th>
                <th>Delete</th>
            </tr>
        </thead>
        <tbody class="table-body2" id="table-body2">
            @foreach($data as $item)
            <tr>
                <td id="ids">{{ $item->id }}</td>
                <td>{{ $item->title }}</td>
                <td>{{ $item->description }}</td>
                <td>{{ $item->status }}</td>
                <td>{{ $item->datetime }}</td>
                <td><button type="button" class="btn btn-primary edit-btn" data-toggle="modal" data-target="#editmodel" data-itemm-idd="{{ $item->id }}">Edit</button></td>
                
                <td><a href="{{ route('delete', $item->id) }}" class="btn btn-danger delete-btn" data-item-id="{{ $item->id }}">Delete</a></td>

            </tr>
            @endforeach
            <td>{{ $data->links() }}</td>
        </tbody>
        
        <tbody class="table-body4" id="table-body4">
        </tbody>
    </table>

        </div>
    </div>

   
</div>




    <!-- edit model -->
    <div class="modal" id="editmodel" tabindex="-1" role="dialog" style="display: none;">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <form id='add-crud'>
                    @csrf
                    <div class="modal-header">
                        <h5 class="modal-title">Add Item</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="form-group">
                            <label for="title">Customer Name:</label>
                            <input type="text" class="form-control" name="title" required>
                        </div>

                        <div class="form-group">
                            <label for="description">City:</label>
                            <textarea class="form-control" name="description" required></textarea>
                        </div>

                        <div class="form-group">
                            <label for="created_date">Created Date:</label>
                            <input type="datetime-local" class="form-control" name="datetime" required>
                        </div>
                            
                        <div class="form-group">
                            <label for="status">Status</label>
                            <div class="form-check">
                                <input type="radio" id="active" name="status" value="active" class="form-check-input">
                                <label for="active" class="form-check-label">Active</label>
                            </div>
                            <div class="form-check">
                                <input type="radio" id="inactive" name="status" value="inactive" class="form-check-input">
                                <label for="inactive" class="form-check-label">Inactive</label>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-primary">Update</button>
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    </div>

                    </div>
                    
                </form>
            </div>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>


<script>
    $(document).ready(function () {


        $('#addItemButton').click(function () {
            $('#addItemModal').modal('show');
        });

        $('#add-crud').submit(function (e) {
            e.preventDefault();
            var formData = $(this).serialize();
            var token = localStorage.getItem('authToken');

            $.ajax({
                type: 'POST',
                url: '{{ route("store") }}',
                data: formData,
                headers: {
                            Authorization: 'Bearer ' + token
                        },
                success: function (response) {
                    Swal.fire({
                        icon: 'success',
                        title: 'Added!',
                        text: 'The item has been Added successfully.',
                        showConfirmButton: false,
                        timer: 6000
                    });
                    $('#addItemModal').modal('hide');

                    window.location.href = '{{ route("index") }}';

                    
                },
                error: function (error) {

                    if (error.status === 401) {
                    Swal.fire({
                        icon: 'error',
                        title: 'Unauthorized!',
                        text: 'You are not authorized to perform this action.',
                        showConfirmButton: false,
                        timer: 6000
                    });
                }
              
                else{
                    var errors = error.responseJSON.errors;

                $('.modal-body .error-message').remove();

                $.each(errors, function(field, messages) {
                    var errorMessage = '<div class="error-message" style="color: red;">' + messages.join('<br>') + '</div>'; 
                    $('[name="' + field + '"]').after(errorMessage);
                });

                }
                  
                }
            });
        });

        $(document).on('click', '.edit-btn', function () {
            var itemId = $(this).data('itemm-idd');
            var token = localStorage.getItem('authToken');

            $.ajax({
                type: 'GET',
                url: '{{ route("edit", ":id") }}'.replace(':id', itemId),
                dataType: 'json',
                headers: {
                            Authorization: 'Bearer ' + token
                        },
                success: function (response) {
                    if(response.status=='success'){
                    $('#editmodel').find('[name="title"]').val(response.itemm.title);
                    $('#editmodel').find('[name="description"]').val(response.itemm.description);
                    $('#editmodel').find('[name="datetime"]').val(response.itemm.datetime);
                    
                    if (response.itemm.status === 'active') {
                        $('#editmodel').find('#active').prop('checked', true);
                    } else {
                        $('#editmodel').find('#inactive').prop('checked', true);
                    }
                    $('#editmodel').data('itemId', itemId);

                    }
                    $('#editmodel').modal('show');

                  
                },
                error: function (error) {
                    console.log(error);
                    $('#editmodel').modal('hide');
                    Swal.fire({
                    icon: 'error',
                    title: 'Unauthorized!',
                    text: 'You are not authorized to perform this action.',
                    showConfirmButton: false,
                    timer: 6000
                });

                }
            });
        });

        $('#editmodel').on('submit', 'form', function(e) {
            e.preventDefault();
            var itemId = $('#editmodel').data('itemId'); 
            e.preventDefault();
            var formData = $(this).serialize();
            var token = localStorage.getItem('authToken');

            $.ajax({
                type: 'POST',
                url: '{{ route("update", ":id") }}'.replace(':id', itemId),            
                data: formData,
                headers: {
                            Authorization: 'Bearer ' + token
                        },
                success: function(response) {
                    Swal.fire({
                        icon: 'success',
                        title: 'Updated!',
                        text: 'The item has been Updated successfully.',
                        showConfirmButton: false,
                        timer: 6000
                    });
                    window.location.href = '{{ route("index") }}';
                    console.log(response);
                },
                error: function(error) {
                    console.log(error);
                    Swal.fire({
                    icon: 'error',
                    title: 'Unauthorized!',
                    text: 'You are not authorized to perform this action.',
                    showConfirmButton: false,
                    timer: 6000
                });
                }
            });
        });

        $(document).on('click', '.delete-btn', function (e) {
            e.preventDefault(); 
            var token = localStorage.getItem('authToken');
            var url = $(this).attr('href'); 
            $.ajax({
                type: 'GET',
                url: url, 
                headers: {
                            Authorization: 'Bearer ' + token
                        },
                success: function(response) {
                    $(e.target).closest('tr').remove();
                    Swal.fire({
                        icon: 'success',
                        title: 'Deleted!',
                        text: 'The item has been deleted successfully.',
                        showConfirmButton: false,
                        timer: 1500
                    });
                },
                error: function(error) {
                    console.log(error);
                    Swal.fire({
                    icon: 'error',
                    title: 'Unauthorized!',
                    text: 'You are not authorized to perform this action.',
                    showConfirmButton: false,
                    timer: 6000
                });
                }
            });
        });

        $('#importForm').on('submit', function(e) {
            e.preventDefault();
            var importData = new FormData(); 
            var fileInput = $('#import_file')[0].files[0]; 
            importData.append('import_file', fileInput); 

            if (!fileInput) {
                Swal.fire({
                    icon: 'error',
                    title: 'Oops...',
                    text: 'Please select a file to import!',
                });
            } else {
                $.ajax({
                    type: "POST",
                    url: '{{ route("import") }}',
                    data: importData,
                    processData: false, 
                    contentType: false, 
                    success: function(response) {
                        Swal.fire({
                            icon: 'success',
                            title: 'Imported successfully!',
                            text: 'The item has been imported successfully.',
                            showConfirmButton: true,
                        }).then((result) => {
                            if (result.isConfirmed) {
                                window.location.href = '{{ route("index") }}';
                            }
                        });
                    },
                    error: function(xhr, status, error) {
                        console.error(xhr.responseText);
                    }
                });
            }
        });

        $('#livesearch').on('keyup', function(){
            var query = $(this).val();
            $.ajax({
                type: 'POST',
                url: '{{ route('livesearch') }}',
                data: { query: query },
                success: function(response){
                    $('#table-body2').hide();
                    $('#table-body4').empty();
                    $.each(response.data, function(index, item) {
                        var row = '<tr>' +
                        '<td>' + item.id + '</td>' +
                        '<td>' + item.title + '</td>' +
                        '<td>' + item.description + '</td>' +
                        '<td>' + item.status + '</td>' +
                        '<td>' + item.datetime + '</td>' +
                        '<td><button type="button" class="btn btn-primary edit-btn" data-toggle="modal" data-target="#editmodel" data-itemm-idd="' + item.id + '">Edit</button></td>' +
                        '<td><a href="{{ url('api/crud/delete/') }}/' + item.id + '" class="btn btn-danger delete-btn">Delete</a></td>' +
                        '</tr>';
                        $('#table-body4').append(row); 
                    });
                }
            });
        });
    });
</script>

    </body>
    </html>
  


