<?php
    require_once('db/course_db.php');
    require_once('db/name_in_header_db.php');
    require_once('db/feedback_db.php'); // Thêm file xử lý feedback vào

    if (session_status() == PHP_SESSION_NONE) {
        session_start();
    }

    // Kiểm tra xem có tham số id_course được truyền vào không
    if (!isset($_GET['id_course'])) {
        header("Location: home.php");
        exit;
    }

    // Lấy id_course từ URL
    $id_course = $_GET['id_course'];

    if (isset($_GET['logout'])) {
        $_SESSION = array();
        session_destroy();
        header("Location: login.php");
        exit;
    }

    if (!isset($_SESSION['email'])) {
        header('Location: login.php');
        die();
    }

    // Hàm lấy thông tin về tiêu đề và hình ảnh của khóa học
    function get_title_and_img_for_feedback($id_course)
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

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Feedback Form</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.3.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css" integrity="sha512-SnH5WK+bZxgPHs44uWIX+LLJAJ9/2PkPKZ5QiAj6Ta86w+fsb2TkcmfRyVX3pBnMFcV7oQPJkl9QevSCWr3W6A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="style.css">
    <style>
        body, html {
            height: 100%;
        }
        .container {
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100%;
        }
        .card {
            width: 80%;
            max-width: 600px; /* Chỉnh kích thước tối đa của card */
        }
    </style>
</head>
<body class="bg-primary">
    <?php
      $courses = get_title_and_img_for_feedback($id_course);
      $name_of_user = get_name_in_header();
    ?>

<div class="container">
    <div class="card">
        <div class="card-header bg-primary">
            <h5 class="card-title text-white mt-2"><?php echo "Feedback for " . $courses[0]['Title']; ?></h5>
        </div>
        <div class="modal-body">
            <div class="text-center">
            <img src="<?php echo $courses[0]['images']; ?>" class="far fa-file-alt fa-4x mb-3 text-primary" alt="Course Image" style="width: 100px; height: auto;">

                <p>
                    <strong>Your opinion matters</strong>
                </p>
                <p>
                    Have some ideas how to improve our product?
                    <strong>Give us your feedback.</strong>
                </p>
            </div>
            <hr />
            <form class="px-4" method="post" action="">
                <p class="text-center"><strong>Your rating:</strong></p>
                <div class="form-check mb-2">
                    <input class="form-check-input" type="radio" name="rating" id="verygood" value="Very good" />
                    <label class="form-check-label" for="verygood">
                        Very good
                    </label>
                </div>
                <div class="form-check mb-2">
                    <input class="form-check-input" type="radio" name="rating" id="good" value="Good" />
                    <label class="form-check-label" for="good">
                        Good
                    </label>
                </div>
                <div class="form-check mb-2">
                    <input class="form-check-input" type="radio" name="rating" id="medicore" value="Medicore" />
                    <label class="form-check-label" for="medicore">
                        Medicore
                    </label>
                </div>
                <div class="form-check mb-2">
                    <input class="form-check-input" type="radio" name="rating" id="bad" value="Bad" />
                    <label class="form-check-label" for="bad">
                        Bad
                    </label>
                </div>
                <div class="form-check mb-2">
                    <input class="form-check-input" type="radio" name="rating" id="verybad" value="Very bad" />
                    <label class="form-check-label" for="verybad">
                        Very bad
                    </label>
                </div>
                <div data-mdb-input-init class="form-outline mb-4">
                    <textarea class="form-control" id="form4Example3" name="comment" rows="4"></textarea>
                    <label class="form-label" for="form4Example3">Your feedback</label>
                </div>
                <div class="card-footer text-end">
                    <button type="submit" class="btn btn-success" name="submit-btn" >Submit</button>
                </div>
                <div data-mdb-input-init class="form-outline mb-4">
                    <textarea class="form-control" id="form4Example3" name="comment" rows="4"></textarea>
                    <label class="form-label" for="form4Example3">You can send nothing</label>
                </div>
            </form>
        </div>
    </div>
</div>
</body>
</html>
