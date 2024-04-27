
<!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Add Item</title>
        <!-- Include Bootstrap CSS -->
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    </head>
    <body>

    <!-- add form  -->
    <div class="modal" id="addItemModal" tabindex="-1" role="dialog" style="display: none;">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <form id='add-crud'>
                    <?php echo csrf_field(); ?>
                    <div class="modal-header">
                        <h5 class="modal-title">Add Item</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="form-group">
                            <label for="title">Title:</label>
                            <input type="text" class="form-control" name="title" required>
                        </div>

                        <div class="form-group">  
                            <label for="description">Description:</label>
                            <textarea class="form-control" name="description" required></textarea>
                        </div>

                        <!-- <div class="form-group">
                            <label for="image">Image:</label>
                            <input type="file" class="form-control-file" name="image" accept="image/*">
                        </div> -->

                        <div class="form-group">
                            <label for="created_date">Created Date:</label>
                            <input type="datetime-local" class="form-control" name="created_at" required>
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
    <button id="addItemButton" class="btn btn-primary">Add Item</button>
    <input type="text" id="livesearch" placeholder="Search anything">
    <a href="<?php echo e(route('import')); ?>" class="btn btn-success">Import</a>
    <a href="<?php echo e(route('export')); ?>" class="btn btn-info">Export</a>

    <br><br>

    
    <table class="table">
        <thead id="table-body22">
            <tr>
                <th>ID</th>
                <th>Title</th>
                <th>Description</th>
                <th>Status</th>
                <th>Created date</th>
                <th>Edit</th>
                <th>Delete</th>
            </tr>
        </thead>
        <tbody class="table-body2" id="table-body2">
            <?php $__currentLoopData = $data; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <tr>
                <td id="ids"><?php echo e($item->id); ?></td>
                <td><?php echo e($item->title); ?></td>
                <td><?php echo e($item->description); ?></td>
                <td><?php echo e($item->status); ?></td>
                <td><?php echo e($item->created_at); ?></td>
                <td><button type="button" class="btn btn-primary edit-btn" data-toggle="modal" data-target="#editmodel" data-itemm-idd="<?php echo e($item->id); ?>">Edit</button></td>
                
                <td><a href="<?php echo e(route('delete', $item->id)); ?>" class="btn btn-danger delete-btn" data-item-id="<?php echo e($item->id); ?>">Delete</a></td>

            </tr>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            <td><?php echo e($data->links()); ?></td>
        </tbody>
        <tbody class="table-body3" id="table-body3">
            <!-- Search results will be inserted here -->
        </tbody>
        <tbody class="table-body4" id="table-body4">
        </tbody>
    </table>
</div>




    <!-- edit model -->
    <div class="modal" id="editmodel" tabindex="-1" role="dialog" style="display: none;">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <form id='add-crud'>
                    <?php echo csrf_field(); ?>
                    <div class="modal-header">
                        <h5 class="modal-title">Add Item</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="form-group">
                            <label for="title">Title:</label>
                            <input type="text" class="form-control" name="title" required>
                        </div>

                        <div class="form-group">
                            <label for="description">Description:</label>
                            <textarea class="form-control" name="description" required></textarea>
                        </div>

                        <!-- <div class="form-group">
                            <label for="image">Image:</label>
                            <input type="file" class="form-control-file" name="image" accept="image/*">
                        </div> -->

                        <div class="form-group">
                            <label for="created_date">Created Date:</label>
                            <input type="datetime-local" class="form-control" name="created_at" required>
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

  
    <script>
    $(document).ready(function () {
        $('#addItemButton').click(function () {
            $('#addItemModal').modal('show');
        });

        $('#add-crud').submit(function (e) {
            e.preventDefault();
            // Serialize the form data
            var formData = $(this).serialize();

            $.ajax({
        type: 'POST',
        url: '<?php echo e(route("store")); ?>', // Use the correct route name
        data: formData,
        success: function (response) {
            $('#addItemModal').modal('hide');
            window.location.href = '<?php echo e(route("index")); ?>';

        },
       error: function (error) {
            // Handle errors, e.g., display an error message
            var errors = error.responseJSON.errors;

            // Clear previous error messages
            $('.modal-body .error-message').remove();

            // Loop through the errors and display them
            $.each(errors, function(field, messages) {
                var errorMessage = '<div class="error-message" style="color: red;">' + messages.join('<br>') + '</div>'; // Added inline style for red color
                $('[name="' + field + '"]').after(errorMessage);
            });
        }
    });
});
    });
    </script>
    <!-- edit script -->
    <script>
     $(document).ready(function () {
       // Use event delegation for dynamically generated elements
$(document).on('click', '.edit-btn', function () {
    var itemId = $(this).data('itemm-idd');
    $.ajax({
        type: 'GET',
        url: '<?php echo e(route("edit", ":id")); ?>'.replace(':id', itemId),
        dataType: 'json',
        success: function (response) {
            $('#editmodel').modal('show');
            // Update the modal content with the received data
            $('#editmodel').find('[name="title"]').val(response.itemm.title);
            $('#editmodel').find('[name="description"]').val(response.itemm.description);

            alert(response.itemm.datetime)
            $('#editmodel').find('[name="created_at"]').val(response.itemm.datetime);
            // If status is 'active', check the 'active' radio button, else check 'inactive'
            if (response.itemm.status === 'active') {
                $('#editmodel').find('#active').prop('checked', true);
            } else {
                $('#editmodel').find('#inactive').prop('checked', true);
            }
            // Set itemId data attribute here
            $('#editmodel').data('itemId', itemId);
        },
        error: function (error) {
            console.log(error);
        }
    });
});

$('#editmodel').on('submit', 'form', function(e) {
    e.preventDefault(); // Prevent default form submission
    var itemId = $('#editmodel').data('itemId'); // Retrieve itemId from data attribute
    e.preventDefault(); // Prevent the default form submission
    var formData = $(this).serialize(); // Serialize form data
    $.ajax({
        type: 'POST',
        url: '<?php echo e(route("update", ":id")); ?>'.replace(':id', itemId),            
        data: formData,
        success: function(response) {
            window.location.href = '<?php echo e(route("index")); ?>';
            console.log(response);
        },
        error: function(error) {
            console.log(error);
        }
    });
});
$(document).on('click', '.delete-btn', function (e) {
    e.preventDefault(); // Prevent the default action of the delete link
    var url = $(this).attr('href'); // Get the URL from the href attribute
    // Perform the delete operation using AJAX
    $.ajax({
        type: 'GET',
        url: url, // Use the URL directly
        success: function(response) {
            // Handle success, such as removing the deleted item from the DOM
            $(e.target).closest('tr').remove();
        },
        error: function(error) {
            console.log(error);
        }
    });
});


        

                    $('#livesearch').on('keyup', function(){
                        var query = $(this).val();
                        $.ajax({
                        type: 'POST',
                        url: '<?php echo e(route('livesearch')); ?>',
                        data: { query: query },
                        success: function(response){
                        $('#table-body2').hide();
                        $('#table-body4').empty(); // Clear previous data
                        $.each(response.data, function(index, item) {
                            var row = '<tr>' +
                            '<td>' + item.id + '</td>' +
                            '<td>' + item.title + '</td>' +
                            '<td>' + item.description + '</td>' +
                            '<td>' + item.status + '</td>' +
                            '<td>' + item.created_at + '</td>' +
                            '<td><button type="button" class="btn btn-primary edit-btn" data-toggle="modal" data-target="#editmodel" data-itemm-idd="' + item.id + '">Edit</button></td>' +
                            '<td><a href="<?php echo e(url('crud/delete/')); ?>/' + item.id + '" class="btn btn-danger delete-btn">Delete</a></td>'
                          '</tr>';
                $('#table-body4').append(row); // Append new row to table body
            });
        }
    });
});
               
    });
    </script>
    </body>
    </html>
  


<?php /**PATH /var/www/html/crud5/crud/resources/views/crud.blade.php ENDPATH**/ ?>