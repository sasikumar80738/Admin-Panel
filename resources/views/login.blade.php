<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Admin Login</title>

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Montserrat:400,500&display=swap" rel="stylesheet">
    
    <style>
        body {
            font-family: 'Montserrat', Arial, Helvetica, sans-serif;
            background-color: #f7f7f7;
        }
        .container {
            padding: 20px;
            width: 500px;
            position: absolute;
            left: 50%;
            top: 50%;
            transform: translate(-50%, -50%);
            border: 1px solid #ccc;
            border-radius: 10px;
            background: white;
            box-shadow: 2px 1px 21px -9px rgba(0, 0, 0, 0.38);
        }
    </style>
</head>
<body>
<div class="container">
    <h3 style="text-align:center">Admin Login</h3>
    <form id="loginform" class="mt-4">
        @csrf

        <div class="mb-3">
            <label for="email" class="form-label">Email</label>
            <input id="email" type="email" name="email" class="form-control" required autofocus>
        </div>

        <div class="mb-3">
            <label for="password" class="form-label">Password</label>
            <input id="password" type="password" name="password" class="form-control" required>
        </div>

        <button type="submit" class="btn btn-primary">Login</button>
    </form>
</div>

<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>

<script>
$(document).ready(function() {
    $('#loginform').submit(function(e) {
        e.preventDefault();
        $.ajax({
            type: 'POST',
            url: '{{ route("login") }}',
            data: $(this).serialize(),
            success: function(response) {
                localStorage.setItem('authToken', response.token);
                    Swal.fire({
                        icon: 'success',
                        title: 'you logined!',
                        text: 'You redirected to admin panel',
                        showConfirmButton: false,
                        timer: 6000
                    });

                    window.location.href = '{{ route("index") }}';

                },

            error: function(xhr, status, error) {
                Swal.fire({
                    icon: 'error',
                    title: 'Error!',
                    text: 'Invalid credentials'
                });
            }
        });
    });
});
</script>


</body>
</html>
