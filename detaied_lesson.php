<?php
    // Include necessary files
    require_once('db/lesson_user.php');
    require_once('db/seen_lesson.php');
    require_once('db/name_in_header_db.php');

    // Start session if not already started
    if (session_status() == PHP_SESSION_NONE) {
        session_start();
    }

    // Logout if requested
    if (isset($_GET['logout'])) {
        $_SESSION = array();
        session_destroy();
        header("Location: login.php");
        exit;
    }

    // Redirect to login page if user is not logged in
    if (!isset($_SESSION['email'])) {
        header('Location: login.php');
        die();
    }

    // Get lesson ID from URL parameter
    $id_lesson = $_GET['id_lesson'];

    // Get lesson information
    $lesson = get_lesson_by_id($id_lesson);

    // Function to get lesson information by ID
    function get_lesson_by_id($id_lesson)
    {
        // Connect to the database
        $conn = create_connection();

        // Query to get lesson information with corresponding ID
        $sql = "SELECT * FROM lesson WHERE lesson_id = $id_lesson";
        $result = $conn->query($sql);

        // Check and process the returned result
        $data = array();
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                $data[] = $row;
            }
        }
        // Close the connection
        $conn->close();
        
        // Return the data
        return $data;
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
    <link rel="stylesheet" href="style.css">
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
        .container {
        position: relative;
        width: 100%;
        overflow: hidden;
        padding-top: 56.25%; /* 16:9 Aspect Ratio */
        }

        .responsive-iframe {
        position: absolute;
        top: 0;
        left: 0;
        bottom: 0;
        right: 0;
        width: 100%;
        height: 100%;
        border: none;
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

    <?php foreach ($lesson as $l) { ?>
    <!-- HTML to display lesson information -->
    <form id="lesson_form_<?= $l['lesson_id'] ?>" action="db/seen_lesson.php" method="post">
    <input type="hidden" name="lesson_id" value="<?= $l['lesson_id'] ?>">
    <input type="hidden" name="email" value="<?= $_SESSION['email'] ?>">
    <div class="col-md-12 mb-4 mt-5">
        <div class="card">
            <div class="card-body">
                <h5 class="card-title"><?= $l['Title'] ?></h5>
                <p class="card-text"><?= $l['Description'] ?></p>
                <div class="container"> 
                    <iframe  class="responsive-iframe mb-2" src="<?= $l['video'] ?>" ></iframe>
                </div>
                <div class="form-check">
                    <button type="button" class="btn btn-success" onclick="markLessonAsSeen(<?= $l['lesson_id'] ?>, '<?= $_SESSION['email'] ?>')">Mark as Seen</button>
                </div>
            </div>
        </div>
    </div>
</form> 
    <?php } ?>

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
    function markLessonAsSeen(lessonId, userEmail) {
        // Create a new XMLHttpRequest object
        var xhr = new XMLHttpRequest();
        
        // Specify the request method and URL
        xhr.open("POST", "db/seen_lesson.php", true);
        
        // Set the request header
        xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
        
        // Define the callback function to handle the response
        xhr.onreadystatechange = function() {
            if (xhr.readyState === 4 && xhr.status === 200) {
                // Log the response to the console (for debugging)
                console.log(xhr.responseText);
                
                // Optionally, you can perform additional actions based on the response
                // For example, you can display a notification to the user
                alert("Data saved");
                
                // Reload the page to reflect the updated status
                location.reload();
            }
        };
        
        // Prepare the data to be sent in the request body
        var formData = "lesson_id=" + lessonId + "&email=" + userEmail;
        
        // Send the request with the data
        xhr.send(formData);
    }
</script>


</body>
</html>
