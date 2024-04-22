<?php
require_once('db.php');

if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

$userEmail = isset($_SESSION['email']) ? $_SESSION['email'] : "";

function get_mycourse()
{
    global $userEmail;
    $sql = "SELECT c.* FROM courses c JOIN enrollment e ON c.course_id = e.course_id WHERE e.email = '$userEmail'";
    $conn = create_connection();

    $result = $conn->query($sql);
    $data = array();
    while ($row = $result->fetch_assoc()) {
        $data[] = $row;
    }
    return $data;
}
?>
