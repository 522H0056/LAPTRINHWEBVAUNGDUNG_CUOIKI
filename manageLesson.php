<?php
require_once('db/db.php');

if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

if (isset($_GET['logout'])) {
    $_SESSION = array();
    session_destroy();
    header("Location: login.php");
    exit;
}

function get_lesson()
{
    $sql = "SELECT * FROM lesson";
    $conn = create_connection();
    $result = $conn->query($sql);
    $data = array();
    while ($row = $result->fetch_assoc()) {
        $data[] = $row;
    }
    return $data;
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <!-- Chèn CSS của Bootstrap -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <!-- Chèn các tệp JavaScript cần thiết -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</head>
<body>
    
<div class="container mt-5 bg-white p-5">
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>Description</th>
                <th>Title</th>
                <th>Course_id</th>
                <th>Video</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            <?php
            $lessons = get_lesson();
            foreach ($lessons as $lesson) {
                $description = $lesson['Description'];
                $title = $lesson['Title'];
                $course_id = $lesson['course_id'];
                $video = $lesson['video'];
                ?>
                <tr>
                    <td><?= $description ?></td>
                    <td><?= $title ?></td>
                    <td><?= $course_id ?></td>
                    <td><div class="embed-responsive embed-responsive-16by9">
                        <iframe class="embed-responsive-item" src="<?= $video?>" allowfullscreen></iframe>
                    </div></td>
                    
                    <td>
                        <form action="enrollment.php" method="post" class="d-inline">
                            <input type="hidden" name="id_course" value="<?= $course_id ?>">
                            <button type="submit" class="btn btn-primary">Edit</button>
                        </form>
                        <form action="db/delete_course.php" method="post" class="d-inline">
                            <input type="hidden" name="id_course" value="<?= $course_id ?>">
                            <button type="submit" class="btn btn-danger" onclick="return confirm('Are you sure you want to delete this course?')">Delete</button>
                        </form>
                    </td>
                </tr>
            <?php
            }
            ?>
        </tbody>
    </table>
</div>

</body>
</html>
