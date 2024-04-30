<?php
require_once('db/addStudent_db.php');
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://unpkg.com/bootstrap@5.3.2/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="style.css">
    <title>Create a Student Account</title>
</head>

<body>
    <section class="vh-100 bg-primary" style="background-color: #1f1fc7;">
        <div class="row d-flex justify-content-center align-items-center h-100">
            <div class="col-12 col-md-9 col-lg-7 col-xl-6">
                <div class="card" style="border-radius: 15px;">
                    <div class="card-body p-5">
                        <h2 class="text-uppercase text-center mb-5">Create a Student Account</h2>
                        <form method="post" action="" novalidate>
                            <div class="form-outline mb-4">
                                <input name="email" type="email" id="email" class="form-control form-control-lg"
                                    autocomplete="off" required>
                                <label class="form-label" for="email">Email</label>
                            </div>

                            <div class="form-outline mb-4">
                                <input name="password" type="password" id="password"
                                    class="form-control form-control-lg" autocomplete="off" required>
                                <label class="form-label" for="password">Password</label>
                            </div>

                            <div class="form-outline mb-4">
                                <input name="firstName" type="text" id="firstName"
                                    class="form-control form-control-lg" autocomplete="off" required>
                                <label class="form-label" for="firstName">First Name</label>
                            </div>

                            <div class="form-outline mb-4">
                                <input name="lastName" type="text" id="lastName"
                                    class="form-control form-control-lg" autocomplete="off" required>
                                <label class="form-label" for="lastName">Last Name</label>
                            </div>


                            <div class="form-check mb-4">
                                <input class="form-check-input" type="checkbox" value="1" id="isActive"
                                    name="isActive" checked>
                                <label class="form-check-label" for="isActive">
                                    Active
                                </label>
                            </div>

                            <input type="hidden" name="token" value="<?php echo bin2hex(random_bytes(16)); ?>">

                            <div class="d-flex justify-content-center">
                                <button type="submit" name="addStudent_btn"
                                    class="btn btn-primary btn-lg">ADD STUDENT</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
</body>

</html>
