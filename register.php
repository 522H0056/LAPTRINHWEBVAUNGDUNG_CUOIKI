<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://unpkg.com/bootstrap@5.3.2/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://unpkg.com/bs-brain@2.0.3/components/logins/login-9/assets/css/login-9.css">
    <title>Document</title>

    <style>
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
<body>
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
    <section class="vh-100 bg-primary"
    style="background-color: #1f1fc7;">
  <div class="mask d-flex align-items-center h-100 gradient-custom-3">
    <div class="container h-100">
      <div class="row d-flex justify-content-center align-items-center h-100">
        <div class="col-12 col-md-9 col-lg-7 col-xl-6">
          <div class="card" style="border-radius: 15px;">
            <div class="card-body p-5">
              <h2 class="text-uppercase text-center mb-5">Create an account</h2>

              <form>

                <div class="form-outline mb-4">
                  <input type="text" id="form3Example1cg" class="form-control form-control-lg" />
                  <label class="form-label" for="form3Example1cg">Your Name</label>
                </div>

                <div class="form-outline mb-4">
                  <input type="email" id="form3Example3cg" class="form-control form-control-lg" />
                  <label class="form-label" for="form3Example3cg">Your Email</label>
                </div>

                <div class="form-outline mb-4">
                  <input type="password" id="form3Example4cg" class="form-control form-control-lg" />
                  <label class="form-label" for="form3Example4cg">Password</label>
                </div>

                <div class="form-outline mb-4">
                  <input type="password" id="form3Example4cdg" class="form-control form-control-lg" />
                  <label class="form-label" for="form3Example4cdg">Repeat your password</label>
                </div>

                <div class="form-check d-flex justify-content-center mb-5">
                  <input class="form-check-input me-2" type="checkbox" value="" id="form2Example3cg" />
                  <label class="form-check-label" for="form2Example3g">
                    I agree all statements in <a href="#!" class="text-body"><u>Terms of service</u></a>
                  </label>
                </div>

                <div class="d-flex justify-content-center">
                  <button type="button"
                    class="btn btn-primary btn-lg">Register</button>
                </div>

                <p class="text-center text-muted mt-5 mb-0">Have already an account? <a href="#!"
                    class="fw-bold text-body"><u>Login here</u></a></p>

              </form>

            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>
</body>
</html>