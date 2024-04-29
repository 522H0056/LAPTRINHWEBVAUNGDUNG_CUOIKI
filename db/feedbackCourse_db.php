<?php
    require_once('db.php');
    $id_course = $_GET['id_course'];
    function get_feedbacks()
    {
        global $id_course; 
        $sql = "select * from feedbacks WHERE course_id = $id_course";
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

    function get_match_course()
    {
        global $id_course; 
        $sql = "select * from courses WHERE course_id = $id_course";
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
