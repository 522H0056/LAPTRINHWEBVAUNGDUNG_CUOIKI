<?php
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}
// Include the database connection file
require_once('db.php');

// Check if the 'id_course' parameter is set in the URL
if(isset($_GET['id_course'])) {
    $id_course = $_GET['id_course'];
} else {
    // Handle the case when 'id_course' parameter is not provided in the URL
    echo "Error: Course ID is missing.";
    exit;
}

// Check if the user is logged in by checking the 'email' session variable
$userEmail = $_SESSION['email'];

// Function to check if all lessons in the course are completed
// Connect to the database
$conn = create_connection();

// Query to fetch completed lessons for the user in the specified course
$sql = "SELECT cl.*
        FROM completed_lesson cl
        INNER JOIN lesson l ON cl.lesson_id = l.lesson_id
        WHERE cl.email = '$userEmail' AND l.course_id = '$id_course'";

$result = $conn->query($sql);

if ($result->num_rows > 0) {
    $allCompleted = true;
    // Loop through the result set
    while($row = $result->fetch_assoc()) {
        // Check if the lesson status is "You have seen the video"
        if ($row["status"] != "You have seen the video") {
            // If any lesson is not completed, set the flag to false
            $allCompleted = false;
            break;
        }
    }
    // Output the result
    if ($allCompleted) {
        echo 'true';
    } else {
        echo 'false';
    }
} else {
    echo 'false';
}
?>
