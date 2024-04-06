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
    
?>

