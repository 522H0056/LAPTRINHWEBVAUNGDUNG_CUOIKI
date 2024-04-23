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

    // Kiểm tra mật khẩu và trường isAdmin
    if ($password === $data['password'] && $data['isAdmin'] == 1) {
        return true; // Đăng nhập thành công và là admin
    } else {
        return false; // Sai mật khẩu hoặc không phải là admin
    }
}
?>
