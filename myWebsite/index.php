<?php
    require_once "database/attendance_system.php";

    if (isset($_POST["loginBtn"])){
       login($_POST);
       header("Location: Dashboard/index.php");
    }
?>
    <!DOCTYPE html>
    <html lang="en">

   <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title> BNCC Project| Login</title>
        <!-- Bootstrap Link-->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous">
    </script>
    </head>

    <body>
        <div class="app bg-dark">
            <div class="container d-flex justify-content-center align-items-center vh-100">
            <div
                class="card p-4 shadow-sm p-3 mb-5 bg-body-tertiary rounded w-50 d-flex flex-row justify-content-evenly">
            <!-- Login Title -->
                <div class="title d-flex align-items-center">
                    <h1 class="fw-medium lh-base"><span class="fst-italic fw=semibold text-primary">Login</span>
                        <br>Page
                    </h1>
                </div>
                
                <!-- Login Form -->
                <form action="" method="POST" enctype="multipart/form-data">
                    <!-- Email -->
                    <div class="form floating my-3">
                        <input type="text" class="form-control" id="email" placeholder="Email ..." name="email">
                        <span class="text-danger"><?php if (isset($cpassword_error)) echo $cpassword_error; ?></span>
                    </div>

                    <!-- Password -->
                    <div class="form floating my-3">
                        <input type="password" class="form-control" id="password" placeholder="Password..."
                            name="password">
                            <span class="text-danger"><?php if (isset($password_error)) echo $password_error; ?></span>
                    </div>

                    <!-- Login Button -->
                   <div class="d-flex justify-content-center">
                        <button class="btn btn-primary my-3 w-100" name="loginBtn">
                            Login
                        </button>
                    </div>
                    
                    <!-- Link to Register Page -->
                    <p class="text-center">Don't have an account yet?<br><a href="register.php"
                            class="link-offset-2 link-offset-3-hover link-underline link-underline-opacity-0 link-underline-opacity-75-hover">Register</a>
                        here</p>
                </form>
            </div>
        </div>
    </div>
</body>

</html>