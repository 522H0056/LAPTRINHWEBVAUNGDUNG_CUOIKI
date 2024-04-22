<?php
    require_once('db.php');
    $id_course = $_GET['id_course'];
    function get_lesson()
    {
        global $id_course; 
        $sql = "select * from lesson WHERE course_id = $id_course";
        $conn = create_connection();

         $result = $conn->query($sql);
         $data = array();
         for ($i = 1; $i <= $result->num_rows; $i++)
         {
            $row = $result->fetch_assoc();
            $data[] = $row;
         }
         return $data;
    }
?>
