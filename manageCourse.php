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
    <link rel="stylesheet" href="style.css">
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
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
            <li class="listHeader"><a id="index" href="home.php"><b>Home</b></a></li>
            <li class="listHeader"><a id="about" href="mycourse.php"> <b>My Course</b></a></li>
            <li class="listHeader"><a id="about" href="about_us.php"><b>About</b></a></li>
            <li class="listHeader"><a id="about" href="faq.php"><b>FAQ</b></a></li>
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
            
            <li style="margin-bottom: 10px;"><a href="home.php" ><b>Home</b></a></li>
            <li style="margin-bottom: 10px;"><a href="mycourse.php" ><b>My Course</b></a></li>
            <li style="margin-bottom: 10px;"><a href="about_us.php" ><b>About</b></a></li>
            <li style="margin-bottom: 10px;"><a href="faq.html" ><b>FAQ</b></a></li>
            <li><p style="color: white">______________</p></li>
            <li style="margin: 10px;"><a href="?logout"><b>Log out</b></a></li>
          </ul>
        </div>
      </nav>
</header>
<?php
$courses = get_courses();
?>

<div class="searchbar-container">
    <!-- Search bar -->
      <input type="text" name="" id="searchbar" placeholder="Search courses here" style="border: none; padding: 5px;">
    </div>

    <div class="container mt-5 bg-white p-5">
        <div class="row row-cols-1 row-cols-md-2 row-cols-lg-3">
            

              <?php
                 foreach ($courses as $c)
                 {
                  $title = $c['Title'];
                  $description = $c['Description'];
                  $id_course = $c['course_id'];
                  $category = $c['Type'];
                  $releaseyear = $c ['ReleaseYear'];
                  $image = $c['images'];
                  ?>
                    <div class="col mb-4">
                        <div class="card">
                            <img src=<?=$image?> class="card-img-top" alt="Course Image">
                            <div class="card-body">
                                <h5 class="card-title"><?=$title?></h5>
                                <p class="card-text"><?=$description?></p>
                                <p class="card-text">Id course:<?=$id_course?> </p>
                                <p class="card-text">Category: <?=$category?>  </p>
                                <p class="card-text">Release: <?=$releaseyear?>  </p>
                                <form action="enrollment.php" method="post">
                                    <input type="hidden" name="id_course" value="<?= $id_course ?>">
                                    <button type="submit" class="btn btn-primary">Visit</button>
                                    
                                </form>
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
                                <a class="card-text" href="feedbackCourse.php?id_course=<?php echo $id_course; ?>" style="color: blue; text-decoration: underline;">See feedback</a>
                            </div>
                        </div>
                    </div>
                  <?php
                 }
              ?>
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

    const courseCards = document.querySelectorAll('.card');

    // Gắn sự kiện 'input' vào search bar
    document.getElementById('searchbar').addEventListener('input', function() {
        const searchText = this.value.toLowerCase(); // Lấy giá trị nhập vào và chuyển thành chữ thường

        // Lặp qua mỗi thẻ khóa học
        courseCards.forEach(card => {
            const courseTitle = card.querySelector('.card-title').innerText.toLowerCase(); // Lấy tiêu đề khóa học và chuyển thành chữ thường

            // Kiểm tra xem tiêu đề khóa học có chứa từ khóa tìm kiếm không
            if (courseTitle.includes(searchText)) {
                card.style.display = 'block'; // Hiển thị thẻ nếu tiêu đề khớp với từ khóa tìm kiếm
            } else {
                card.style.display = 'none'; // Ẩn thẻ nếu không khớp
            }
        });
    });
</script>
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
