<?php
require_once('db/lesson_dba.php');
require_once('db/editLesson_db.php');
$temp = $_GET['lesson_id'];

$lesson = get_lesson_by_id($temp);

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://unpkg.com/bootstrap@5.3.2/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://unpkg.com/bs-brain@2.0.3/components/logins/login-9/assets/css/login-9.css">
    <link rel="stylesheet" href="style.css">
    <title>Edit Students</title>
</head>

<body>
    <section class="vh-100 bg-primary" style="background-color: #1f1fc7;">

        <div class="card" style="border-radius: 15px;">
            <div class="card-body p-5">
                <h2 class="text-uppercase text-center mb-5">Edit student</h2>
                <form method="post" action="" novalidate>

                    <?php foreach ($lesson as $l): ?>

                    <div class="form-outline mb-4">
                        <input name="lesson_id" type="text" id="lesson_id" class="form-control form-control-lg" autocomplete="off" value="<?php echo $l['lesson_id']; ?>" readonly>
                        <label class="form-label" for="lesson_id">Lesson ID</label>
                    </div>

                    <div class="form-outline mb-4">
                        <input name="Description" type="text" id="Description" class="form-control form-control-lg" autocomplete="off" value="<?php echo $l['Description']; ?>">
                        <label class="form-label" for="Description">Description</label>
                    </div>

                    <div class="form-outline mb-4">
                        <input name="Title" type="text" id="Title" class="form-control form-control-lg" autocomplete="off" value="<?php echo $l['Title']; ?>">
                        <label class="form-label" for="Title">Title</label>
                    </div>

                    <div class="form-outline mb-4">
                        <input name="course_id" type="text" id="course_id" class="form-control form-control-lg" autocomplete="off" value="<?php echo $l['course_id']; ?>" readonly>
                        <label class="form-label" for="course_id">Course ID</label>
                    </div>

                    <div class="form-outline mb-4">
                        <input name="video" type="text" id="video" class="form-control form-control-lg" autocomplete="off" value="<?php echo $l['video']; ?>">
                        <label class="form-label" for="video">Video</label>
                    </div>

                    <?php endforeach; ?>

                    <?php
                    if(isset($_SESSION['status'])) {
                        // Hiển thị mã JavaScript để hiển thị thông báo alert
                        echo "<script>";
                        echo "alert('{$_SESSION['status']}');"; // Hiển thị thông báo alert với nội dung từ session
                        echo "</script>";
                        unset($_SESSION['status']);
                    }
                    ?>

                    <div class="d-flex justify-content-center">
                        <button type="submit" name="save1_btn" class="btn btn-primary btn-lg">Save</button>
                    </div>

                </form>
            </div>
        </div>
    </section>
</body>

</html>
