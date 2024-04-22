<?php
require_once('db.php');
if (session_status() == PHP_SESSION_NONE) {
    session_start();
  }
$userEmail = $_SESSION['email'];

function get_name_in_header()
{
    global $userEmail; // Sử dụng biến toàn cục $userEmail trong hàm
    $conn = create_connection();
    $sql = "SELECT * FROM students WHERE email = '$userEmail'"; // Sử dụng dấu nháy đơn để bao quanh giá trị của $userEmail
    $result = $conn->query($sql);
    $data = array();
    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            $data[] = $row;
        }
    }
    return $data;
}
?>
