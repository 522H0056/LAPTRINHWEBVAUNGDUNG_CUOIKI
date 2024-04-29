<?php
    if (session_status() == PHP_SESSION_NONE) {
        session_start();
    }
    require_once('db/lesson_db.php');
    require_once('db/course_user.php');
    require_once('db/load_coursename_to_detaied_course.php');
    require_once('db/status_lesson_of_user.php');
    require_once('db/complete_course_db.php');
    $id_course = $_GET['id_course'];
    $userEmail = $_SESSION['email'];
    $error = "";
    if (isset($_GET['logout'])) {
        $_SESSION = array();
        session_destroy();
        header("Location: login.php");
        exit;
    }

    if (!isset($_SESSION['email'])) {
        header('Location:login.php');
        die();
    }

    $lesson = get_lesson();
    $course = get_title_of_course($id_course);
    $status = get_completed_lessons();
   
    $complete_result = isComplete($id_course, $userEmail);
    if ($complete_result === false) {
        $error = 'Please view all the lessons in this course';
    }

    if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['complete_course'])) {
        if ($complete_result) {
            header("Location: feedback.php?id_course=$id_course");

            exit(); 
        } else {
            $error = 'Please view all the lessons in this course to make this button works.';
        }
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.3.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css" integrity="sha512-SnH5WK+bZxgPHs44uWIX+LLJAJ9/2PkPKZ5QiAj6Ta86w+fsb2TkcmfRyVX3pBnMFcV7oQPJkl9QevSCWr3W6A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <style>
        #searchbar {
            width: 80%;
            margin: 20px auto;
            display: block;
            outline: none;
        }
        *{
          margin: 0;
          padding: 0;
          box-sizing: border-box;
        }

        header{
          position: relative;
          padding: 0 2rem;
        }

        .navbar{
          width: 100%;
          height: 110px;
          max-width: 1200px;
          margin: 0 auto;
          display: flex;
          align-items: center;
          justify-content: space-between;
        }

        li{
          list-style: none;
        }
        a{
          text-decoration: none;
          color: white;
          font-size: 1rem;
        }
        a:hover{
          color: blue;
          font-size: 120%;
        }
        i{
          color: white;
        }

        .navbar .logo a{
          font-size: 1.5rem;
          font-weight: bold;
        }

        .navbar .links{
          display: flex;
          gap: 2rem;
        }

        .navbar .toggle_btn{
          color: white;
          font-size: 1.5rem;
          cursor: pointer;
          display: none;
        }

        @media(max-width: 992px){
          .navbar .links{
            display: none;
          }

          .navbar .toggle_btn{
            display: block;
          }

        }
        .dropdown_menu{
          position: absolute;
          right: 2rem;
          top: 60px;
          height: 0;
          width: 200px;
          background-color: rgba(255, 255, 255, 0.1);
          backdrop-filter: blur(75px);
          border-radius: 10px;
          overflow: hidden;
          transition: height .2s cubic-bezier(0.175, 0.885, 0.32, 1.275);
        }
        
        .dropdown_menu li{
          padding: 0.7rem;
          display: flex;
          align-items: center;
          justify-self: center;
        }

        .dropdown_menu.open{
          height: 200px;
        }

        body{
          height: 100vh;
          background-size: cover;
          background-position: center;
        }

        @media(max-width: 170px){
          .dropdown_menu{
            left: 2rem;
            width: unset;
          }
        }


        footer {
          background-color: #333;
          color: #fff;
          padding: 40px 0;
        }

        footer h4 {
        margin-bottom: 20px;
        }

        footer p {
            margin-bottom: 10px;
        }

        .social-icons {
            list-style: none;
            padding: 0;
            margin: 0;
        }

        .social-icons li {
            display: inline-block;
            margin-right: 10px;
        }

        .social-icons li:last-child {
            margin-right: 0;
        }

        .social-icons a {
            color: #fff;
            font-size: 20px;
        }

        @media (max-width: 576px) {
            footer .container {
                text-align: center;
            }
        }
        img {
          width:300px;
          height:300px;
        }
        #enroll_button {
            display: inline-block;
            padding: 0.5rem 1rem;
            background-color: #007bff;
            color: #fff;
            text-decoration: none;
            border-radius: 0.25rem;
            border: none;
        }

        #enroll_button:hover {
            background-color: #0056b3;
        }
    </style>
</head>
<body class="bg-primary">

<header class="border-bottom" id="header">
    <div class="navbar">
        <div class="logo"><a href="#">Free Courses</a></div>
        <ul class="links">
            <li><a href="home.php">Home</a></li>
            <li><a href="about_us.php">About</a></li>
            <li><a href="mycourse.php">My course</a></li>
            <li><a href="faq.php">FAQ</a></li>
        </ul>
        <a href="?logout"><b>Log out</b></a>
        <div class="toggle_btn">
            <i class="fa-solid fa-bars"></i>
        </div>

        <div class="dropdown_menu">
            <ul>
                <li><a href="home.php">Home</a></li>
                <li><a href="about_us.php">About</a></li>
                <li><a href="hero">My course</a></li>
                <li><a href="faq.php">FAQ</a></li>
            </ul>
        </div>
    </div>
</header>
<?php foreach ($course as $c) { ?>
    <div class="col mb-4 row-cols-1">
        <div class="card">
            <div class="card-body">
                <h2 class="card-title"><?= $c['Title'] ?></h2>
            </div>
        </div>
    </div>
<?php } ?>

<div class="container mt-5 bg-white p-5">
    <div class="row row-cols-1 row-cols-12">
        <?php foreach ($lesson as $l) { ?>
            <!-- Phần mã HTML hiển thị thông tin bài học -->
            <form id="lesson_form_<?= $l['lesson_id'] ?>" action="db/seen_lesson.php" method="post">
                <input type="hidden" name="lesson_id" value="<?= $l['lesson_id'] ?>">
                <div class="col mb-4 row-cols-1">
                    <div class="card">
                        <div class="card-body ">
                            <h5 class="card-title"><?= $l['Title'] ?></h5>
                            <p class="card-text"><?= $l['Description'] ?></p>
                            <a href="detaied_lesson.php?id_lesson=<?= $l['lesson_id'] ?>" class="" style="display: inline-block; padding: .375rem .75rem; font-size: 1rem; font-weight: 400; line-height: 1.5; text-align: center; white-space: nowrap; margin-bottom: 10px; vertical-align: middle; cursor: pointer; background-color: #007bff; border: 1px solid transparent; border-radius: .25rem; color: #fff; text-decoration: none;">View lesson</a>

                            <?php
                            $found = false; // Biến để kiểm tra xem có trạng thái nào tương ứng với lesson_id hiện tại không
                            foreach ($status as $s) {
                              if ($s['lesson_id'] === $l['lesson_id']) {
                                  echo '<div class="alert alert-primary" role="alert">';
                                  echo $s['status'];
                                  echo '</div>';
                                   // Thêm một dòng trống sau mỗi phần tử
                                  $found = true;
                                  break; // Kết thúc vòng lặp nếu đã tìm thấy trạng thái
                              }
                          }
                          
                            if (!$found) {
                                echo "<p>No status found.</p>"; // Thông báo nếu không tìm thấy trạng thái
                            }
                            ?>
                        </div>
                    </div>
                </div>
            </form>
        <?php } ?>
    </div>
    <form method="post" action="">
    <div class="row gy-3 overflow-hidden">
        <div class="col-12">
            <div class="d-grid">
                <button class="btn btn-success btn-lg" type="submit" name="complete_course">Complete the course</button>
            </div>
        </div>
    </div>
</form>


    <div class="alert alert-warning   mt-3" role="alert">
        Watch all the lesson before clicking this button
    </div>
    <div class="col-12 mt-3">
                                    <!-- Hiển thị thông báo lỗi -->
                                    <?php if ($error !== ''): ?>
                                    <div class="alert alert-danger" role="alert">
                                        <?php echo $error; ?>
                                    </div>
                                    <?php endif; ?>
                                </div>

</form>


</div>



<footer>
    <div class="container">
        <div class="row">
            <div class="col-md-6">
                <h4>Contact Information</h4>
                <p>Email: student@tdtu.edu.com</p>
                <p>Phone: +1234567890</p>
            </div>
            <div class="col-md-6">
                <h4>Follow Us</h4>
                <ul class="social-icons">
                    <li><a href="#"><i class="fab fa-facebook"></i></a></li>
                    <li><a href="#"><i class="fab fa-twitter"></i></a></li>
                    <li><a href="#"><i class="fab fa-instagram"></i></a></li>
                    <li><a href="#"><i class="fab fa-linkedin"></i></a></li>
                </ul>
            </div>
        </div>
    </div>
</footer>

</body>






</html>
