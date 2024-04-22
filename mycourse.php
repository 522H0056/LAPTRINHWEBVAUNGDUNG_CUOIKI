<?php
require_once('db/mycourse_db.php');

if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

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
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.3.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css" integrity="sha512-SnH5WK+bZxgPHs44uWIX+LLJAJ9/2PkPKZ5QiAj6Ta86w+fsb2TkcmfRyVX3pBnMFcV7oQPJkl9QevSCWr3W6A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <title>My Courses</title>
</head>
<body>
    <div class="container mt-5 bg-white p-5">
        <div class="table-responsive">
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>Course Image</th>
                        <th>Course Title</th>
                        <th>Description</th>
                        <th>Category</th>
                        <th>Release Year</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $enrolled = get_mycourse();
                    foreach ($enrolled as $e) {
                        $title = $e['Title'];
                        $description = $e['Description'];
                        $category = $e['Type'];
                        $releaseyear = $e['ReleaseYear'];
                        $id_course = $e['course_id'];
                        $image = $e['images'];
                        ?>
                        <tr>
                            <td><img src="<?= $image ?>" alt="Course Image" style="width: 100px;"></td>
                            <td><?= $title ?></td>
                            <td><?= $description ?></td>
                            <td><?= $category ?></td>
                            <td><?= $releaseyear ?></td>
                            <td>
                                <form action="enrollment.php" method="post" class="d-inline">
                                    <input type="hidden" name="id_course" value="<?= $id_course ?>">
                                    <button type="submit" class="btn btn-primary">Enroll</button>
                                </form>
                                <form action="delete_course.php" method="post" class="d-inline">
                                    <input type="hidden" name="id_course" value="<?= $id_course ?>">
                                    <button type="submit" class="btn btn-danger">Delete</button>
                                </form>
                            </td>
                        </tr>
                    <?php
                    }
                    ?>
                </tbody>
            </table>
        </div>
    </div>
    <script>
    const enrollButtons = document.querySelectorAll('.btn-primary'); // Select all buttons with class 'btn-primary'

    enrollButtons.forEach(button => {
        button.addEventListener('click', function(event) {
            event.preventDefault(); // Prevent the default form submission
            const courseId = this.parentNode.querySelector('input[name="id_course"]').value; // Get the course ID from the hidden input
            window.location.href = "detailed_course.php?id_course=" + courseId; // Redirect to detailed_course.php with the course ID
        });
    });

</script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.0/js/bootstrap.bundle.min.js"></script>
</body>
</html>
