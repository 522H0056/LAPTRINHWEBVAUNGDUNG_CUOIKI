<?php
    require_once('db.php');
    function get_courses()
    {
        $sql = "select * from courses";
        $conn = create_connection();

         $result =$conn-> query($sql);
         $data = array();
         for ($i =1 ;$i <= $result ->num_rows;$i++)
         {
            $row = $result->fetch_assoc();
            $data[] = $row;
         }
         return $data;
    }
?>
