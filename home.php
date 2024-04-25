<?php
  require_once('db/course_db.php');
  require_once('db/name_in_header_db.php');
  
  if (session_status() == PHP_SESSION_NONE) {
    session_start();
  }
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
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Course Detail</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.3.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css" integrity="sha512-SnH5WK+bZxgPHs44uWIX+LLJAJ9/2PkPKZ5QiAj6Ta86w+fsb2TkcmfRyVX3pBnMFcV7oQPJkl9QevSCWr3W6A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="style.css">
    <style>
        
    </style>

</head>
<body class="bg-primary">
    
    <?php
      $courses = get_courses();
      $name_of_user = get_name_in_header();
    ?>




    <header class=" border-bottom " id="header">
      <div class="navbar">
        <div class="logo"><a href="#">Free Courses</a></div>
        <ul class="links">
          <li><a href="home.php">Home</a></li>
          <li><a href="about_us.php">About</a></li>
          <li><a href="mycourse.php">My course</a></li>
          <li><a href="faq.php">FAQ</a></li>
        </ul>
        <?php
          foreach ($name_of_user as $s) {
              $first = $s['FirstName'];
              $last = $s['LastName'];
              echo '<a href="?logout"><b>' . $first . ' ' . $last . '</b></a>';
          }
          ?>

        
        <a href="?logout"><b>Log out</b></a>
        <div class="toggle_btn">
          <i class="fa-solid fa-bars"></i>
        </div>

        <div class="dropdown_menu">
  <ul> <!-- Start unordered list -->
    <li><a href="home.php">Home</a></li>
    <li><a href="about_us.php">About</a></li>
    <li><a href="hero">My course</a></li>
    <li><a href="faq.php">FAQ</a></li>
  </ul> <!-- End unordered list -->
</div>

    </header>

    <!-- Search bar -->
    <div class="searchbar-container">
    <!-- Search bar -->
      <input type="text" name="" id="searchbar" placeholder="Search courses here" style="border: none; padding: 5px;">
    </div>

    <div class="container mt-5 bg-white p-5">
        <div class="row row-cols-1 row-cols-md-2 row-cols-lg-3">
            

              <?php
                 foreach ($courses as $c)
                 {
                  $title = $c['Title'];
                  $description = $c['Description'];
                  $id_course = $c['course_id'];
                  $category = $c['Type'];
                  $releaseyear = $c ['ReleaseYear'];
                  $image = $c['images'];
                  ?>
                    <div class="col mb-4">
                        <div class="card">
                            <img src=<?=$image?> class="card-img-top" alt="Course Image">
                            <div class="card-body">
                                <h5 class="card-title"><?=$title?></h5>
                                <p class="card-text"><?=$description?></p>
                                <p class="card-text">Id course:<?=$id_course?> </p>
                                <p class="card-text">Category: <?=$category?>  </p>
                                <p class="card-text">Release: <?=$releaseyear?>  </p>
                                <form action="enrollment.php" method="post">
                                    <input type="hidden" name="id_course" value="<?= $id_course ?>">
                                    <button type="submit" class="btn btn-primary">Enroll</button>
                                </form>
                            </div>
                        </div>
                    </div>
                  <?php
                 }
              ?>
        </div>
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

<script>
    const enrollButtons = document.querySelectorAll('.btn-primary'); // Select all buttons with class 'btn-primary'

    enrollButtons.forEach(button => {
        button.addEventListener('click', function(event) {
            event.preventDefault(); // Prevent the default form submission
            const courseId = this.parentNode.querySelector('input[name="id_course"]').value; // Get the course ID from the hidden input
            window.location.href = "detailed_course.php?id_course=" + courseId; // Redirect to detailed_course.php with the course ID
        });
    });

    const courseCards = document.querySelectorAll('.card');

    // Gắn sự kiện 'input' vào search bar
    document.getElementById('searchbar').addEventListener('input', function() {
        const searchText = this.value.toLowerCase(); // Lấy giá trị nhập vào và chuyển thành chữ thường

        // Lặp qua mỗi thẻ khóa học
        courseCards.forEach(card => {
            const courseTitle = card.querySelector('.card-title').innerText.toLowerCase(); // Lấy tiêu đề khóa học và chuyển thành chữ thường

            // Kiểm tra xem tiêu đề khóa học có chứa từ khóa tìm kiếm không
            if (courseTitle.includes(searchText)) {
                card.style.display = 'block'; // Hiển thị thẻ nếu tiêu đề khớp với từ khóa tìm kiếm
            } else {
                card.style.display = 'none'; // Ẩn thẻ nếu không khớp
            }
        });
    });
</script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.0/js/bootstrap.bundle.min.js"></script>
</body>
</html>
