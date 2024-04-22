<?php
  require_once('db/product_db.php');
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
    <style>
        #searchbar {
            width: 80%; /* Đặt độ rộng là 80% */
            margin: 20px auto;
            display: flex;
            outline: none; /* Loại bỏ viền khi input được chọn */
            flex-wrap: wrap; /* Cho phép các phần tử xuống dòng khi không còn không gian */
            justify-content: space-between; /* Phân chia không gian ngang một cách đều giữa các phần tử */
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
        .container {
            display: flex; /* Sử dụng mô hình flexbox */
            flex-wrap: wrap; /* Cho phép các phần tử xuống dòng khi không còn không gian */
            justify-content: space-between; /* Phân chia không gian ngang một cách đều giữa các phần tử */
        }
        #enroll_button {
            display: inline-block;
            padding: 0.5rem 1rem;
            background-color: #007bff; /* Màu chính (primary) của Bootstrap */
            color: #fff; /* Màu chữ trắng */
            text-decoration: none; /* Loại bỏ gạch chân mặc định */
            border-radius: 0.25rem; /* Bo tròn góc */
            border: none; /* Loại bỏ viền */
        }

        /* CSS khi hover */
        #enroll_button:hover {
            background-color: #0056b3; /* Màu hover của Bootstrap */
        }
    </style>

</head>
<body class="bg-primary">
    
    <?php
      $courses = get_products();
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
