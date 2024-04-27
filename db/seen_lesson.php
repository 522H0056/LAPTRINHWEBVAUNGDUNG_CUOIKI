<?php
// Start the session
if (session_status() == PHP_SESSION_NONE) {
    session_start();
  }

// Include the database connection
require_once('db.php');

// Check if the user is logged in
if (!isset($_SESSION['email'])) {
    header('Location: login.php');
    exit;
}

// Check if the request method is POST
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Get the lesson ID and email from the POST data
    if(isset($_POST['lesson_id']) && isset($_POST['email'])){
        $lesson_id = $_POST['lesson_id'];
        $user_email = $_POST['email'];
    } else {
        echo "Error: Lesson ID or email not received!";
        exit;
    }
    
    // Escape variables to prevent SQL injection
    $lesson_id = mysqli_real_escape_string($conn, $lesson_id);
    $user_email = mysqli_real_escape_string($conn, $user_email);

    // Query to check if the lesson has already been marked as seen
    $sql_check = "SELECT * FROM completed_lesson WHERE email = '$user_email' AND lesson_id = '$lesson_id' AND status = 'You have seen the video'";
    $result_check = mysqli_query($conn, $sql_check);

    if ($result_check && mysqli_num_rows($result_check) > 0) {

    } else {
        // If the lesson has not been marked as seen yet, insert a new record
        $sql_update = "UPDATE completed_lesson SET status = 'You have seen the video' WHERE email = '$user_email' AND lesson_id = '$lesson_id'";
        $result_update = mysqli_query($conn, $sql_update);

        if ($result_update) {
            // Success message
            echo "Lesson marked as watched!";
        } else {
            // Error updating record
            echo "Error updating lesson status: " . mysqli_error($conn);
        }
    }
} 
?>
