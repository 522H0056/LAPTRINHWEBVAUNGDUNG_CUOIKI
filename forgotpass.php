<?php
include('db/forgotpass_db.php');



?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://unpkg.com/bootstrap@5.3.2/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://unpkg.com/bs-brain@2.0.3/components/logins/login-9/assets/css/login-9.css">
    <link rel="stylesheet" href="style.css">
    <title>Forgot Password</title>
</head>

<body>
    <section class="vh-100 bg-primary" style="background-color: #1f1fc7;">
                <div class="row d-flex justify-content-center align-items-center h-100">
                    <div class="col-12 col-md-9 col-lg-7 col-xl-6">
                        <div class="card" style="border-radius: 15px;">
                            <div class="card-body p-5">
                                <h2 class="text-uppercase text-center mb-5">EMAIL FOR RESET PASSWORD</h2>
                                <form method="post" action="" novalidate>
                                    


                                    <div class="form-outline mb-4">
                                        <input  name="email" required type="email" id="email" class="form-control form-control-lg" autocomplete="off">
                                        <label class="form-label" for="email">Your Email</label>
                                    </div>
                                    
                                    <?php
                                        if(isset($_SESSION['status'])) {
                                            // Hiển thị mã JavaScript để hiển thị thông báo alert
                                            echo "<script>";
                                            echo "alert('{$_SESSION['status']}');"; // Hiển thị thông báo alert với nội dung từ session
                                            echo "</script>";
                                            unset($_SESSION['status']);
                                        }
                                    ?>

                                    
                                    <div class="d-flex justify-content-center">
                                        <button type="submit" name="forgot_btn" class="btn btn-primary btn-lg">Send</button>
                                    </div>

                                </form>
                            </div>
                        </div>
                    </div>
                </div>
    </section>
</body>

</html>
