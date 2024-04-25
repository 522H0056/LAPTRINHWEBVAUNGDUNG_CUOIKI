<?php
  require_once('db/course_db.php');
  require_once('db/name_in_header_db.php');
  
  if (session_status() == PHP_SESSION_NONE) {
    session_start();
  }
  $id_course = $_GET['id_course'];

  if (isset($_GET['logout'])) {
    $_SESSION = array();
    session_destroy();
    header("Location: login.php");
    exit;
  }

  if (!isset($_SESSION['email'])) {
    header('Location:login.php');
    die();
  }

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
<body>
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
            <form class="px-4" action="">
                <p class="text-center"><strong>Your rating:</strong></p>
                <div class="form-check mb-2">
                    <input class="form-check-input" type="radio" name="exampleForm" id="radio3Example1" />
                    <label class="form-check-label" for="radio3Example1">
                        Very good
                    </label>
                </div>
                <div class="form-check mb-2">
                    <input class="form-check-input" type="radio" name="exampleForm" id="radio3Example2" />
                    <label class="form-check-label" for="radio3Example2">
                        Good
                    </label>
                </div>
                <div class="form-check mb-2">
                    <input class="form-check-input" type="radio" name="exampleForm" id="radio3Example3" />
                    <label class="form-check-label" for="radio3Example3">
                        Medicore
                    </label>
                </div>
                <div class="form-check mb-2">
                    <input class="form-check-input" type="radio" name="exampleForm" id="radio3Example4" />
                    <label class="form-check-label" for="radio3Example4">
                        Bad
                    </label>
                </div>
                <div class="form-check mb-2">
                    <input class="form-check-input" type="radio" name="exampleForm" id="radio3Example5" />
                    <label class="form-check-label" for="radio3Example5">
                        Very bad
                    </label>
                </div>
                <div data-mdb-input-init class="form-outline mb-4">
                    <textarea class="form-control" id="form4Example3" rows="4"></textarea>
                    <label class="form-label" for="form4Example3">Your feedback</label>
                </div>
            </form>
        </div>
        <div class="card-footer text-end">
            <button type="button" data-mdb-button-init data-mdb-ripple-init class="btn btn-primary">Submit</button>
        </div>
    </div>
</div>
</body>
</html>
