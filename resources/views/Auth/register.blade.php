<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Register Page</title>

        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css">

        <style>
            html, body {
                width: 100%;
                margin: 0;
                overflow: hidden;
            }
        </style>

    </head>
    <body style="background: url('background_image.jpg') no-repeat center center/cover ;">
        <div class="row justify-content-center mt-3">
            <div class="col-lg-4">
                <div class="card bg-light">
                    <div class="card-header mt-2 ">
                        <h2 class="card-title d-flex justify-content-center" style="color: black;">Register</h2>
                    </div>
                    <div class="card-body bg-dark" >
                        @if(Session::has('success'))
                            <div class="alert alert-success" role="alert">
                                {{Session::get('success')}}
                            </div>
                        @endif
                        <form action="{{route('register')}}" method="post">
                            @csrf
                            <div class="mb-3 ">
                                <label for="name" class="form-label fw-bold" style="color: White;">Name</label>
                                <input type="text" name="name" class="form-control" id="name" placeholder="John Doe" required>
                            </div>
                            <div class="mb-3">
                                <label for="email" class="form-label fw-bold" style="color: White;">Email address</label>
                                <input type="email" name="email" class="form-control" id="email" placeholder="name@example.com" required>
                            </div>
                            <div class="mb-3">
                                <label for="password" class="form-label fw-bold" style="color: White;">Password</label>
                                <div class="input-group">
                                    <input type="password" class="form-control" id="password" name="password" 
                                        minlength="8" maxlength="20" 
                                        pattern="^(?=.*[A-Za-z])(?=.*\d)(?=.*[@$!%*?&])[A-Za-z\d@$!%*?&]{8,20}$"
                                        required>
                                    <button class="btn btn-outline-secondary" type="button" id="togglePassword">
                                        <i class="bi bi-eye-slash"></i> 
                                    </button>
                            </div>
                                <small class="text-warning">Your password must be 8-20 characters long and contain at least one letter, one number, and one special character.</small>
                            </div>
                            <div class="mt-3 d-flex justify-content-center">
                                <button type="submit" class="btn btn-outline-success">Register</button>
                            </div>
                            <div class="text-center mt-3">
                                <p style="color: White;">Don't have an account?<a href="{{route('login')}}" style="color: White;">Register</a></p>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
        <script>
            document.getElementById("togglePassword").addEventListener("click", function() {
                const passwordInput = document.getElementById("password");
                const icon = this.querySelector("i");

                if (passwordInput.type === "password") {
                    passwordInput.type = "text";
                    icon.classList.remove("bi-eye-slash");
                    icon.classList.add("bi-eye");
                } else {
                    passwordInput.type = "password";
                    icon.classList.remove("bi-eye");
                    icon.classList.add("bi-eye-slash");
                }
            });
        </script>
    </body>
</html>
