<?php
    require_once('db.php');
    function login($username, $password) {
        $conn = create_connection();
        $sql = "SELECT * FROM students WHERE email = ?";
        
        $stm = $conn->prepare($sql);
        $stm->bind_param('s', $username);
        
        if (!$stm->execute())  
            return false;
    
        $result = $stm->get_result();
        if ($result->num_rows !== 1) 
            return false;
    
        $data = $result->fetch_assoc();
    
        // Kiểm tra mật khẩu
        if ($password === $data['password']) {
            return true; // Đăng nhập thành công
        } else {
            return false; // Sai mật khẩu
        }
    }

    function register($email, $firstname, $lastname, $password, $isActive) {
        $sql = "SELECT COUNT(*) FROM students WHERE email = ?";
        $conn = create_connection();

        $stm = $conn->prepare($sql);
        $stm->bind_param('s', $email);
        $stm->execute();

        $result = $stm->get_result();
        $exists = $result->fetch_array()[0] === 1;

        if($exists) {
            return "Can not register because email exists";
        }

        $isActive = 0; // Assigning the value to a variable

        $sql = "INSERT INTO students(email, password, FirstName, LastName, isActive) VALUES (?, ?, ?, ?, ?)";
        
        $stm = $conn->prepare($sql);
        $stm->bind_param('ssssi', $email, $password, $firstname, $lastname, $isActive); // Pass the variable as reference

        if ($stm->execute()) {
            return true;
        }
        return $stm->error;
    }

?>


