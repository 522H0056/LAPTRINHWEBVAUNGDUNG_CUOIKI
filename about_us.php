<?php
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
<title>About Us</title>
<link rel="stylesheet" type="text/css" href="about_us.css">
<link rel="stylesheet" href="style.css">
<style>
/* General styles */
body {
    font-family: Arial, sans-serif;
    margin: 0;
    padding: 0;
    box-sizing: border-box;
    background-color: rgb(50, 98, 243);
    color: black;
  }

  .hd{
    background-color:  rgb(64, 115, 234);
    text-align: center;
    padding: 50px;
    margin-bottom: 20px;
    color: white;
  }



  h2{
    color: white;
  }

  
  .row {
    display: flex;
    justify-content: center;
    align-items: center;
    flex-wrap: wrap;
    margin: 0 auto;
    max-width: 1200px;
  }
  
  .column {
    flex: 0 0 calc(33.33% - 20px);
    margin: 10px;
    text-align: center;
  }

  
  .card {
    box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2);
    max-width: 300px;
    margin: auto;
    text-align: center;
    background-color: #fff;
  }
  
  .container {
    padding: 20px 16px;
  }
  
  .card img {
    max-width: 100%;
    height: auto;
  }
  
  .button {
    background-color: #4CAF50;
    color: white;
    padding: 10px 20px;
    border: none;
    border-radius: 4px;
    cursor: pointer;
    text-decoration: none;
    font-size: 16px;
  }
  
  .button:hover {
    background-color: #45a049;
  }
</style>
</head>
<body class="bg-primary">
<?php
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
  <header class="hd">
    <div >
      <h1>About Our Free Course</h1>
      <p>Welcome to our free course page! Here, we offer valuable learning resources to help you enhance your skills and knowledge in various subjects.</p>
      <p>Our mission is to provide accessible education to everyone, regardless of their background or financial status.</p>
    </div>
  </header>

  <h2 style="text-align:center">Meet Our Team</h2>
  <div class="row">
    <div class="column">
      <div class="card">
        <img src="img/Phong.jpg" alt="Phong">
          <div class="container">
            <h3>Phong</h3>
            <p class="title">Course Creator & Instructor</p>
            <p>Phong is the visionary behind our free course. With years of experience in education and a passion for sharing knowledge, he's dedicated to making learning accessible to all.</p>
            <p>Contact: phong@example.com</p>
          </div>
      </div>
  </div>
  <div class="column">
    <div class="card">
      <img src="img/Duc.jpg" alt="Duc">
      <div class="container">
        <h3>Duc</h3>
        <p class="title">Content Developer</p>
        <p>Duc brings creativity and expertise to our course content. As an experienced educator and content creator, he ensures our materials are engaging and informative.</p>
        <p>Contact: duc@example.com</p>
      </div>
    </div>
  </div>
  <div class="column">
    <div class="card">
      <img src="img/Quan.jpg" alt="Quan" >
      <div class="container">
        <h3>Quan</h3>
        <p class="title">Graphic Designer</p>
        <p>Quan adds visual appeal to our course materials. With a keen eye for design and detail, he ensures our content is not only informative but also visually engaging.</p>
        <p>Contact: quan@example.com</p>
      </div>
    </div>
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
</body>
</html>






