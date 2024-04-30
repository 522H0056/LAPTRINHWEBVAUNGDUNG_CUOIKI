<?php
require_once('db/student_db.php');
require_once('db/editStudent_db.php');
$user_email= $_GET['email'];
$student = get_student_by_email($user_email);

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://unpkg.com/bootstrap@5.3.2/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://unpkg.com/bs-brain@2.0.3/components/logins/login-9/assets/css/login-9.css">
    <link rel="stylesheet" href="style.css">
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
    <title>Edit Students</title>
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
    <section class="vh-100 bg-primary" style="background-color: #1f1fc7;">

                        <div class="card" style="border-radius: 15px;">
                            <div class="card-body p-5">
                                <h2 class="text-uppercase text-center mb-5">Edit student</h2>
                                <form method="post" action="" novalidate>
                                    
                                    <div class="form-outline mb-4">
                                        <?php foreach ($student as $std): ?>
                                            <input  name="first" type="text" id="firstname" class="form-control form-control-lg" autocomplete="off" value="<?php echo $std['FirstName']; ?>">
                                        
                                        <label class="form-label" for="firstname">First name</label>
                                    </div>

                                    <div class="form-outline mb-4">
                                        <input  name="last" required type="text" id="lastname" class="form-control form-control-lg" autocomplete="off" value="<?php echo $std['LastName']; ?>">
                                        <label class="form-label" for="lastname">Last Name</label>
                                    </div>

                                    <div class="form-outline mb-4">
                                        <input  name="email" required type="email" id="email" class="form-control form-control-lg" autocomplete="off" value="<?php echo $std['email']; ?>" readonly>
                                        <label class="form-label" for="email">Your Email</label>
                                    </div>


                                    <div class="form-outline mb-4">
                                        <input  name="pass" required type="text" id="password" class="form-control form-control-lg" autocomplete="off" value="<?php echo $std['password']; ?>">
                                        <label class="form-label" for="password">Password</label>
                                    </div>

                                    <div class="form-outline mb-4">
                                        <input  name="isAdmin" required type="text" id="isAdMin" class="form-control form-control-lg" autocomplete="off" value="<?php echo $std['isAdmin']; ?>">
                                        <label class="form-label" for="isAdmin">isAdmin</label>
                                    </div>

                                    <div class="form-outline mb-4">
                                        <input  name="isActive" required type="text" id="isActive" class="form-control form-control-lg" autocomplete="off" value="<?php echo $std['isActive']; ?>">
                                        <label class="form-label" for="isActive">isActive</label>
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
                                        <button type="submit" name="save_btn" class="btn btn-primary btn-lg">Save</button>
                                    </div>


                                </form>
                            </div>
                        </div>
    </section>
</body>

</html>
