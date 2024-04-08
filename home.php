<?php
  require_once('db/product_db.php');

  session_start();
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
            display: block;
            outline: none; /* Loại bỏ viền khi input được chọn */
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
    </style>

</head>
<body class="bg-primary">
    
    <?php
      $courses = get_products();
    ?>




    <header class=" border-bottom " id="header">
      <div class="navbar">
        <div class="logo"><a href="#">Free Courses</a></div>
        <ul class="links">
          <li><a href="hero">Home</a></li>
          <li><a href="hero">About</a></li>
          <li><a href="hero">My course</a></li>
          <li><a href="hero">FAQ</a></li>
        </ul>
        <a href="?logout"><b>Log out</b></a>
        <div class="toggle_btn">
          <i class="fa-solid fa-bars"></i>
        </div>

        <div class="dropdown_menu">
          <li><a href="hero">Home</a></li>
          <li><a href="hero">About</a></li>
          <li><a href="hero">My course</a></li>
          <li><a href="hero">FAQ</a></li>
        </div>
    </header>

    <!-- Search bar -->
    <input type="text" name="" id="searchbar" placeholder="Search course here" style="border: none; padding: 5px;">
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
                                <button class="btn btn-primary">Enroll Now</button>
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
      const toggle_Btn =document.querySelector('.toggle_btn')
      const toggle_BtnIcon =document.querySelector('.toggle_btn i')
      const dropDownMenu = document.querySelector('.dropdown_menu')

      toggle_Btn.onclick =function(){
        dropDownMenu.classList.toggle('open')
        const isOpen =dropDownMenu.classList.contains('open')
        toggle_BtnIcon.classList = isOpen
          ? 'fa-solid fa-xmark'
          :'fa-solid fa-bars'
      }
    </script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.0/js/bootstrap.bundle.min.js"></script>
</body>
</html>
