<?php
    if (session_status() == PHP_SESSION_NONE) {
        session_start();
    }
    if (isset($_GET['logout'])) {
        $_SESSION = array();
        session_destroy();
        header("Location: login.php");
        exit;
    }
    require_once('db/name_in_header_db.php');
    require_once('db/lesson_db.php');
    require_once('db/course_user.php');
    require_once('db/load_coursename_to_detaied_course.php');
    require_once('db/status_lesson_of_user.php');
    require_once('db/complete_course_db.php');
    $id_course = $_GET['id_course'];
    $userEmail = $_SESSION['email'];
    $error = "";
    

    if (!isset($_SESSION['email'])) {
        header('Location:login.php');
        die();
    }
      if (isset($_GET['logout'])) {
        $_SESSION = array();
    
        session_destroy();
    
        header("Location: login.php");
        exit;
      }
    $lesson = get_lesson();
    $course = get_title_of_course($id_course);
    $status = get_completed_lessons();
   
    $complete_result = isComplete($id_course, $userEmail);
    $button_ressult =  isButtonWork ($id_course, $userEmail);
    if ($complete_result === false) {
        $error = 'Please view all the lessons in this course';
    }


    if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['complete_course'])) {
        if ($button_ressult === 'have_feedbacked') {
                echo '<script>';
            echo 'alert("You have completed this course");';
            echo '</script>';

            // Chuyển hướng người dùng đến trang chính sau khi gửi phản hồi thành công
            echo '<script>';
            echo "window.location.href = 'detailed_course.php?id_course=$id_course';";

            echo '</script>';
        }
        else if ($complete_result) {
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
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css" integrity="sha512-SnH5WK+bZxgPHs44uWIX+LLJAJ9/2PkPKZ5QiAj6Ta86w+fsb2TkcmfRyVX3pBnMFcV7oQPJkl9QevSCWr3W6A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <style>
  header {
    margin-top: 0px;
    position: relative;
  }

  footer {
    background-color: rgba(255, 255, 255,0.5);
    margin-bottom: 0px;
    width: 100%;
    color: rgb(61, 60, 60);
    padding-top: 10px;
  }

  nav {
    background-color: rgba(255, 255, 255, 0.1);
    padding: 15px;
  }
 
  .listHeader {
    display: inline;
    margin: 0 30px;
    font-size: 25px;
    color: white; 
  }
  .tableFooter {
    margin-right: auto;
    margin-left: auto;
  }
  
  .listFooter {
    list-style: none;
    margin: 20px;
    display: center;
  }
  .listFooter img {
    margin-right: 10px;
  }

  #logo1,#logo2 {
    font-size: 25px;
    margin: 0 5px;
  }

  body {
    background-image: url('/images/headerbg.jpg');
    background-size: cover;
    background-repeat: no-repeat;
  }

  a {
    text-decoration: none;
    color: rgb(252, 249, 249);
    transition: all 0.9s ease;
  }

  a:hover {
    font-size: 25px;
    background-color: rgba(255, 255, 255, 0.2);
    padding: 15px;
    border-radius: 5px;
    text-decoration: none;
    color: white;
  }


  h3 {
    margin-bottom: 20px;
  }

  
#navmoblie,.frameMoblie{
    display: none;
  }
#navmoblie:hover {
  cursor: pointer;
}
  .frameMoblie ul {
    list-style: none;
  }
  #navmoblie {
  width: 32px; /* Đặt kích thước của hình ảnh là 32px */
  height: 32px; /* Đặt kích thước của hình ảnh là 32px */
}

  .frameMoblie {
    margin-top: 20px;
  }
@media (max-width: 800px) {

    a:hover {
      font-size: inherit; /* Override font size change on hover */
      background-color: rgba(255, 255, 255, 0.2);
      padding: 15px;
      border-radius: 5px;
      text-decoration: none;
      color: white;
    }
    .mainsection {
      width: 90%;
    }
    #picMain {
      width: 80%;
    }
    
    .frame {
      display: none;
    }
    #navmoblie {
      display: block;
    }
  }
</style>
</head>
<body class="bg-primary">
<?php
      $name_of_user = get_name_in_header();
    ?>

<header>
      <nav>
        <div class="frame">
          <ul>
            <li class="listHeader" ><b></b>FreeCourse</li>
            <li class="listHeader"><a id="index" href="home.php"><b>Home</b></a></li>
            <li class="listHeader"><a id="about" href="mycourse.php"> <b>My Course</b></a></li>
            <li class="listHeader" >
            <li class="listHeader" ><b>_________________________________________</b></li>
              <?php
            foreach ($name_of_user as $s) {
                $first = $s['FirstName'];
                $last = $s['LastName'];
                echo '<a href="?logout"><b>' . $first . ' ' . $last . '</b></a>';
            }
          ?></li>
            <li class="listHeader" ><a href="?logout"><b>Log out</b></a></li>
            
          </ul>
          <script>
            document.getElementById("index").addEventListener("click", function(event){
                var confirmation = confirm("Are you sure you want to leave this page?"); 
                if (!confirmation) {
                    event.preventDefault(); 
                }
            });
            function toggleContent() {
                const content = document.querySelector(".frameMoblie");
                content.style.display = content.style.display === "block" ? "none" : "block";
}
            </script>
        </div>
        <img id="navmoblie" src="img/nav.png" onclick="toggleContent()" alt="">
        <div class="frameMoblie">
          <ul>
            <li><?php
            foreach ($name_of_user as $s) {
                $first = $s['FirstName'];
                $last = $s['LastName'];
                echo '<a href="?logout"><b>' . $first . ' ' . $last . '</b></a>';
            }
          ?></li>
            <li><p style="color: white">______________</p></li>
            
            <li style="margin-bottom: 10px;"><a href="home.php" ><b>Home</b></a></li>
            <li style="margin-bottom: 10px;"><a href="mycourse.php" ><b>My Course</b></a></li>
            <li><p style="color: white">______________</p></li>
            <li style="margin: 10px;"><a href="?logout"><b>Log out</b></a></li>
          </ul>
        </div>
      </nav>
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
