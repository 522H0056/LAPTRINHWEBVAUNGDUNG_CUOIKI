<?php
    // Include necessary files
    require_once('db/lesson_user.php');
    require_once('db/seen_lesson.php');

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
        /* CSS styles */
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

<div class="container mt-5 bg-white p-5">
    <?php foreach ($lesson as $l) { ?>
    <!-- HTML to display lesson information -->
    <form id="lesson_form_<?= $l['lesson_id'] ?>" action="db/seen_lesson.php" method="post">
    <input type="hidden" name="lesson_id" value="<?= $l['lesson_id'] ?>">
    <input type="hidden" name="email" value="<?= $_SESSION['email'] ?>">
    <div class="col-md-12 mb-">
        <div class="card">
            <div class="card-body">
                <h5 class="card-title"><?= $l['Title'] ?></h5>
                <p class="card-text"><?= $l['Description'] ?></p>
                <div class="embed-responsive embed-responsive-16by9">
                    <iframe class="embed-responsive-item" src="<?= $l['video'] ?>" allowfullscreen></iframe>
                </div>
                <div class="form-check">
                    <button type="button" class="btn btn-success" onclick="markLessonAsSeen(<?= $l['lesson_id'] ?>, '<?= $_SESSION['email'] ?>')">Mark as Seen</button>
                </div>
            </div>
        </div>
    </div>
</form>
    <?php } ?>
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
