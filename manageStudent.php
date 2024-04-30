<?php
  require_once('db/student_db.php');
  if (session_status() == PHP_SESSION_NONE) {
    session_start();
  }

  if (isset($_GET['logout'])) {
    $_SESSION = array();

    session_destroy();

    header("Location: loginAdmin.php");
    exit;
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
    <link rel="stylesheet" href="style.css">
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
                <th>Email</th>
                <th>First Name </th>
                <th>Last Name</th>
                <th>isActive</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            <?php
            $student = get_student();
            foreach ($student as $s) {
                $email = $s['email'];
                $first = $s['FirstName'];
                $last = $s['LastName'];
                $isActive = $s['isActive'];

                ?>
                <tr>
                    <td><?= $email ?></td>
                    <td><?= $first ?></td>
                    <td><?= $last ?></td>
                    <td><?= $isActive ?></td>
                    
                    
                    <td>
                        <form action="editStudent.php?email=<?= $email ?> " method="post" class="d-inline">
                            <input type="hidden" name="email" value="<?= $email ?>">
                            <button type="submit" class="btn btn-primary">Edit</button>
                        </form>
                        <form action="db/deleteStudent_db.php" method="post" class="d-inline">
                            <input type="hidden" name="email" value="<?= $email ?>">
                            <button type="submit" class="btn btn-danger" onclick="return confirm('Are you sure you want to delete this student?')">Delete</button>
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
