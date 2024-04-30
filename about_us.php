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
            <li class="listHeader"><a id="about" href="about_us.php"><b>About</b></a></li>
            <li class="listHeader"><a id="about" href="faq.php"><b>FAQ</b></a></li>
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
            <li style="margin-bottom: 10px;"><a href="about_us.php" ><b>About</b></a></li>
            <li style="margin-bottom: 10px;"><a href="faq.html" ><b>FAQ</b></a></li>
            <li><p style="color: white">______________</p></li>
            <li style="margin: 10px;"><a href="?logout"><b>Log out</b></a></li>
          </ul>
        </div>
      </nav>
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






