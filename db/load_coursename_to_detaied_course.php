<?php
    require_once('db.php');
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

function get_title_of_course($id_course)
{
    $conn = create_connection();
    $sql = "SELECT * FROM courses WHERE course_id = '$id_course'"; 
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
