<?php
require_once('db/account_db.php');

$error = '';
$first_name = '';
$last_name = '';
$email = '';
$user = '';
$pass = '';
$pass_confirm = '';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST['first']) && isset($_POST['last']) && isset($_POST['email'])
        && isset($_POST['user']) && isset($_POST['pass']) && isset($_POST['pass-confirm'])) {
        // Xử lý đăng ký người dùng
        $first_name = $_POST['first'];
        $last_name = $_POST['last'];
        $email = $_POST['email'];
        $user = $_POST['user'];
        $pass = $_POST['pass'];
        $pass_confirm = $_POST['pass-confirm'];
        
        // Tiếp tục với xử lý đăng ký người dùng ở đây
    } else {
        $error = 'Please fill in all required fields.';
    }
}
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
                                        <input value="<?= htmlspecialchars($first_name) ?>" name="first" required type="text" id="firstname" class="form-control form-control-lg" autocomplete="off">
                                        <label class="form-label" for="firstname">First name</label>
                                    </div>

                                    <div class="form-outline mb-4">
                                        <input value="<?= htmlspecialchars($last_name) ?>" name="last" required type="text" id="lastname" class="form-control form-control-lg" autocomplete="off">
                                        <label class="form-label" for="lastname">Last Name</label>
                                    </div>

                                    <div class="form-outline mb-4">
                                        <input value="<?= htmlspecialchars($email) ?>" name="email" required type="email" id="email" class="form-control form-control-lg" autocomplete="off">
                                        <label class="form-label" for="email">Your Email</label>
                                    </div>

                                    <div class="form-outline mb-4">
                                        <input value="<?= htmlspecialchars($pass) ?>" name="pass" required type="password" id="password" class="form-control form-control-lg" autocomplete="off">
                                        <label class="form-label" for="password">Password</label>
                                    </div>

                                    <div class="form-outline mb-4">
                                        <input value="<?= htmlspecialchars($pass_confirm) ?>" name="pass-confirm" required type="password" id="pass-confirm" class="form-control form-control-lg" autocomplete="off">
                                        <label class="form-label" for="pass-confirm">Repeat your password</label>
                                    </div>
                                    <div class="col-12">
                                        <!-- Hiển thị thông báo lỗi -->
                                        <?php if ($error !== ''): ?>
                                          <div class="alert alert-danger" role="alert">
                                            <?php echo $error; ?>
                                          </div>
                                        <?php endif; ?>
                                      </div>  

                                    <div class="form-check d-flex justify-content-center mb-5">
                                        <input class="form-check-input me-2" type="checkbox" value="" id="agree" required>
                                        <label class="form-check-label" for="agree">
                                            I agree all statements in <a href="#!" class="text-body"><u>Terms of service</u></a>
                                        </label>
                                    </div>

                                    <div class="d-flex justify-content-center">
                                        <button type="submit" class="btn btn-primary btn-lg">Register</button>
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
