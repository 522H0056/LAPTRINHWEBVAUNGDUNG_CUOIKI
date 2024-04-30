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
        // Kiểm tra xem trường "activated" có tồn tại trong mảng dữ liệu hay không
        if (array_key_exists('isAdmin', $data) && $data['isAdmin'] == 1 ) {
            return 'not_user'; 
        } else if (array_key_exists('isActive', $data) && $data['isActive'] == 0 ) {
            return 'not_activated'; // Tài khoản chưa được kích hoạt
        }
        else {
            return true;
        }
    } else {
        return false; // Sai mật khẩu
    }
}
?>
