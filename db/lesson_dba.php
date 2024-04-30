<?php
function get_lesson_by_id($lesson_id)
    {
        $sql = "select * from lesson WHERE lesson_id = $lesson_id";
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