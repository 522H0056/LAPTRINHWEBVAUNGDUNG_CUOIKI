<?php
    require_once('db.php');
    function get_student()
    {
        $sql = "select * from students ";
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
    
    function get_student_by_email($email)
    {
        $sql = "SELECT * FROM students WHERE email = '$email'";
        $conn = create_connection();

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
