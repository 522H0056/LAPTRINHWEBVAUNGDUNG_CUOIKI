<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Course Detail</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.3.0/css/bootstrap.min.css">
    <style>
        #searchbar {
            width: 80%; /* Đặt độ rộng là 80% */
            margin-top: 20px; /* Khoảng cách từ phía trên */
            margin-bottom: 20px; /* Khoảng cách từ phía dưới */
            margin-left: auto; /* Căn giữa theo chiều ngang */
            margin-right: auto; /* Căn giữa theo chiều ngang */
            outline: none; /* Loại bỏ viền khi input được chọn */
        }
        #header ul {
          list-style-type: none;
        }
        
        #header ul li {
          display: inline;
          margin-right: 40px;
        }
        .userHeader {
          float: right;
        }
        #header ul .listHeader {
          transition: color 0.2s ease, font-size 0.8s ease, background-color 0.8s ease;   /* Thêm hiệu ứng trễ 0.3s */
        }
        #header ul .listHeader:hover {
          font-size: 120%; /* Làm to chữ khi hover */
          color: white;
          background-color: #3382d6; /* Màu primary của Bootstrap */;
        }
        #header {
          position: relative;
        }
        #header ul .listHeader{
          padding: 10px;
          border-radius: 10px ;
        }
    </style>
</head>
<body class="bg-primary">
    <header class="p-3 mb-3 border-bottom bg-white" id="header">
        <ul>
          <li class="listHeader"><b></b>Home</li>
          <li class="listHeader">About</li>
          <li class="listHeader">My course</li>
          <li class="listHeader">FAQ</li>
          <li class="userHeader ">avatarhere</li>
          <li class="userHeader ">Log out</li>
        </ul>
    </header>

    <!-- Search bar -->
    <input type="text" name="" id="searchbar" placeholder="Search course here" style="border: none; padding: 5px;">
    <div class="container mt-5 bg-white p-5">
        <div class="row row-cols-1 row-cols-md-2 row-cols-lg-3">
            <div class="col mb-4">
                <div class="card">
                    <img src="https://via.placeholder.com/400" class="card-img-top" alt="Course Image">
                    <div class="card-body">
                        <h5 class="card-title">Course Title</h5>
                        <p class="card-text">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed eget nisi id urna pharetra tincidunt. Nulla facilisi.</p>
                        <p class="card-text">Id course:</p>
                        <p class="card-text">Category:   </p>
                        <p class="card-text">Release date:   </p>
                        <button class="btn btn-primary">Enroll Now</button>
                    </div>
                </div>
            </div>
            <div class="col mb-4">
                <div class="card">
                    <img src="https://via.placeholder.com/400" class="card-img-top" alt="Course Image">
                    <div class="card-body">
                        <h5 class="card-title">Course Title</h5>
                        <p class="card-text">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed eget nisi id urna pharetra tincidunt. Nulla facilisi.</p>
                        <p class="card-text">Id course:</p>
                        <p class="card-text">Category:   </p>
                        <p class="card-text">Release date:   </p>
                        <button class="btn btn-primary">Enroll Now</button>
                    </div>
                </div>
            </div>
            <div class="col mb-4">
                <div class="card">
                    <img src="https://via.placeholder.com/400" class="card-img-top" alt="Course Image">
                    <div class="card-body">
                        <h5 class="card-title">Course Title</h5>
                        <p class="card-text">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed eget nisi id urna pharetra tincidunt. Nulla facilisi.</p>
                        <p class="card-text">Id course:</p>
                        <p class="card-text">Category:   </p>
                        <p class="card-text">Release date:   </p>
                        <button class="btn btn-primary">Enroll Now</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
    

    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.0/js/bootstrap.bundle.min.js"></script>
</body>
</html>
