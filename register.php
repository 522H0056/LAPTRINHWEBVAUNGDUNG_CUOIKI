<?php
include('db/register_db.php');



?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://unpkg.com/bootstrap@5.3.2/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://unpkg.com/bs-brain@2.0.3/components/logins/login-9/assets/css/login-9.css">
    <title>Create an Account</title>
</head>

<body>
    <section class="vh-100 bg-primary" style="background-color: #1f1fc7;">
        <div class="mask d-flex align-items-center h-100 gradient-custom-3">
            <div class="container h-100">
                <div class="row d-flex justify-content-center align-items-center h-100">
                    <div class="col-12 col-md-9 col-lg-7 col-xl-6">
                        <div class="card" style="border-radius: 15px;">
                            <div class="card-body p-5">
                                <h2 class="text-uppercase text-center mb-5">Create an account</h2>
                                <form method="post" action="" novalidate>
                                    
                                    <div class="form-outline mb-4">
                                        <input  name="first" type="text" id="firstname" class="form-control form-control-lg" autocomplete="off">
                                        <label class="form-label" for="firstname">First name</label>
                                    </div>

                                    <div class="form-outline mb-4">
                                        <input  name="last" required type="text" id="lastname" class="form-control form-control-lg" autocomplete="off">
                                        <label class="form-label" for="lastname">Last Name</label>
                                    </div>

                                    <div class="form-outline mb-4">
                                        <input  name="email" required type="email" id="email" class="form-control form-control-lg" autocomplete="off">
                                        <label class="form-label" for="email">Your Email</label>
                                    </div>

                                    <div class="form-outline mb-4">
                                        <input  name="pass" required type="password" id="password" class="form-control form-control-lg" autocomplete="off">
                                        <label class="form-label" for="password">Password</label>
                                    </div>
                                    
                                    <?php
                                        if(isset($_SESSION['status'])) {
                                            echo "<h4>" .$_SESSION['status']. "</h4>";
                                            unset($_SESSION['status']);
                                        }                                        
                                    ?>

                                    
                                    <div class="d-flex justify-content-center">
                                        <button type="submit" name="register_btn" class="btn btn-primary btn-lg">Register</button>
                                    </div>

                                    <p class="text-center text-muted mt-5 mb-0">Already have an account? <a href="login.php" class="fw-bold text-body"><u>Login here</u></a></p>

                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</body>

</html>
