<?php
require_once('db/student_db.php');
require_once('db/editStudent_db.php');
$user_email= $_GET['email'];
$student = get_student_by_email($user_email);

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://unpkg.com/bootstrap@5.3.2/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://unpkg.com/bs-brain@2.0.3/components/logins/login-9/assets/css/login-9.css">
    <link rel="stylesheet" href="style.css">
    <title>Edit Students</title>
</head>

<body>
    <section class="vh-100 bg-primary" style="background-color: #1f1fc7;">

                        <div class="card" style="border-radius: 15px;">
                            <div class="card-body p-5">
                                <h2 class="text-uppercase text-center mb-5">Edit student</h2>
                                <form method="post" action="" novalidate>
                                    
                                    <div class="form-outline mb-4">
                                        <?php foreach ($student as $std): ?>
                                            <input  name="first" type="text" id="firstname" class="form-control form-control-lg" autocomplete="off" value="<?php echo $std['FirstName']; ?>">
                                        
                                        <label class="form-label" for="firstname">First name</label>
                                    </div>

                                    <div class="form-outline mb-4">
                                        <input  name="last" required type="text" id="lastname" class="form-control form-control-lg" autocomplete="off" value="<?php echo $std['LastName']; ?>">
                                        <label class="form-label" for="lastname">Last Name</label>
                                    </div>

                                    <div class="form-outline mb-4">
                                        <input  name="email" required type="email" id="email" class="form-control form-control-lg" autocomplete="off" value="<?php echo $std['email']; ?>" readonly>
                                        <label class="form-label" for="email">Your Email</label>
                                    </div>


                                    <div class="form-outline mb-4">
                                        <input  name="pass" required type="text" id="password" class="form-control form-control-lg" autocomplete="off" value="<?php echo $std['password']; ?>">
                                        <label class="form-label" for="password">Password</label>
                                    </div>

                                    <div class="form-outline mb-4">
                                        <input  name="isAdmin" required type="text" id="isAdMin" class="form-control form-control-lg" autocomplete="off" value="<?php echo $std['isAdmin']; ?>">
                                        <label class="form-label" for="isAdmin">isAdmin</label>
                                    </div>

                                    <div class="form-outline mb-4">
                                        <input  name="isActive" required type="text" id="isActive" class="form-control form-control-lg" autocomplete="off" value="<?php echo $std['isActive']; ?>">
                                        <label class="form-label" for="isActive">isActive</label>
                                    </div>

                                    <?php endforeach; ?>
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
                                        <button type="submit" name="save_btn" class="btn btn-primary btn-lg">Save</button>
                                    </div>


                                </form>
                            </div>
                        </div>
    </section>
</body>

</html>
