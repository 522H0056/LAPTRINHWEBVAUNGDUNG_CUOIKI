<?php
require_once('db/course_db.php');
require_once('db/manageCourse_db.php');

if (session_status() == PHP_SESSION_NONE) {
    session_start();
}
if (isset($_GET['logout'])) {
    $_SESSION = array();
    session_destroy();
    header("Location: login.php");
    exit;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Manage Course</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<?php
$courses = get_courses();
?>

<div class="container mt-5 bg-white p-5">
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>Title</th>
                <th>Description</th>
                <th>ID Course</th>
                <th>Category</th>
                <th>Release Year</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($courses as $c): ?>
                <tr>
                    <td><?= $c['Title'] ?></td>
                    <td><?= $c['Description'] ?></td>
                    <td><?= $c['course_id'] ?></td>
                    <td><?= $c['Type'] ?></td>
                    <td><?= $c['ReleaseYear'] ?></td>
                    <td>
                        <form action="db/manageCourse_db.php" method="post" class="d-inline">
                            <input type="hidden" name="id_course" value="<?= $c['course_id'] ?>">
                            <input type="hidden" name="action" value="edit">
                            <button type="submit" class="btn btn-primary">Edit</button>
                        </form>
                        <form action="db/manageCourse_db.php" method="post" class="d-inline">
                            <input type="hidden" name="id_course" value="<?= $c['course_id'] ?>">
                            <input type="hidden" name="action" value="delete">
                            <button type="submit" class="btn btn-danger" onclick="return confirm('Are you sure you want to delete this course?')">Delete</button>
                        </form>
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</div>

<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
