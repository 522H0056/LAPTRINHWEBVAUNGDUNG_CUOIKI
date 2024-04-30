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
    <style>
  header {
    margin-top: 0px;
    position: relative;
  }

  footer {
    background-color: rgba(255, 255, 255,0.5);
    margin-bottom: 0px;
    width: 100%;
    color: rgb(61, 60, 60);
    padding-top: 10px;
  }

  nav {
    background-color: rgba(255, 255, 255, 0.1);
    padding: 15px;
  }
 
  .listHeader {
    display: inline;
    margin: 0 30px;
    font-size: 25px;
    color: white; 
  }
  .tableFooter {
    margin-right: auto;
    margin-left: auto;
  }
  
  .listFooter {
    list-style: none;
    margin: 20px;
    display: center;
  }
  .listFooter img {
    margin-right: 10px;
  }

  #logo1,#logo2 {
    font-size: 25px;
    margin: 0 5px;
  }

  body {
    background-image: url('/images/headerbg.jpg');
    background-size: cover;
    background-repeat: no-repeat;
  }

  a {
    text-decoration: none;
    color: rgb(252, 249, 249);
    transition: all 0.9s ease;
  }

  a:hover {
    font-size: 25px;
    background-color: rgba(255, 255, 255, 0.2);
    padding: 15px;
    border-radius: 5px;
    text-decoration: none;
    color: white;
  }


  h3 {
    margin-bottom: 20px;
  }

  
#navmoblie,.frameMoblie{
    display: none;
  }
#navmoblie:hover {
  cursor: pointer;
}
  .frameMoblie ul {
    list-style: none;
  }
  #navmoblie {
  width: 32px; /* Đặt kích thước của hình ảnh là 32px */
  height: 32px; /* Đặt kích thước của hình ảnh là 32px */
}

  .frameMoblie {
    margin-top: 20px;
  }
@media (max-width: 800px) {

    a:hover {
      font-size: inherit; /* Override font size change on hover */
      background-color: rgba(255, 255, 255, 0.2);
      padding: 15px;
      border-radius: 5px;
      text-decoration: none;
      color: white;
    }
    .mainsection {
      width: 90%;
    }
    #picMain {
      width: 80%;
    }
    
    .frame {
      display: none;
    }
    #navmoblie {
      display: block;
    }
  }
</style>
</head>
<body class="bg-primary">
<header>
      <nav>
        <div class="frame">
          <ul>
            <li class="listHeader" ><b></b>FreeCourse</li>
            <li class="listHeader"><a id="index" href="administration.php"><b>Home</b></a></li>
            <li class="listHeader" >
            <li class="listHeader" ><b>_________________________________________</b></li>
             
            <li class="listHeader" ><a href="?logout"><b>Log out</b></a></li>
            
          </ul>
          <script>
            document.getElementById("index").addEventListener("click", function(event){
                var confirmation = confirm("Are you sure you want to leave this page?"); 
                if (!confirmation) {
                    event.preventDefault(); 
                }
            });
            function toggleContent() {
                const content = document.querySelector(".frameMoblie");
                content.style.display = content.style.display === "block" ? "none" : "block";
}
            </script>
        </div>
        <img id="navmoblie" src="img/nav.png" onclick="toggleContent()" alt="">
        <div class="frameMoblie">
          <ul>
            
            <li><p style="color: white">______________</p></li>
            
            <li style="margin-bottom: 10px;"><a href="administration.php" ><b>Home</b></a></li>
            <li><p style="color: white">______________</p></li>
            <li style="margin: 10px;"><a href="?logout"><b>Log out</b></a></li>
          </ul>
        </div>
      </nav>
</header>    
<div class="container mt-5 bg-white p-5">
<a class="mb-3" href="addStudent.php" style="display: inline-block; background-color: #007bff; color: #ffffff; text-decoration: none; padding: 10px 20px; border-radius: 5px; ">Add student</a>
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
