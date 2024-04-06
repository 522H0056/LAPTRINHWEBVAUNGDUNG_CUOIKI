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
    <section class="vh-100 gradient-custom">
        <div class="container py-5 h-100">
          <div class="row justify-content-center align-items-center h-100">
            <div class="col-12 col-lg-9 col-xl-7">
              <div class="card shadow-2-strong card-registration" style="border-radius: 15px;">
                <div class="card-body p-4 p-md-5">
                  <h3 class="mb-4 pb-2 pb-md-0 mb-md-5">Personal information</h3>
                  <form>
      
                    <div class="row">
                      <div class="col-md-6 mb-4">
      
                        <div class="form-outline">
                          <input type="text" id="firstName" class="form-control form-control-lg" />
                          <label class="form-label" for="firstName">First Name</label>
                        </div>
      
                      </div>
                      <div class="col-md-6 mb-4">
      
                        <div class="form-outline">
                          <input type="text" id="lastName" class="form-control form-control-lg" />
                          <label class="form-label" for="lastName">Last Name</label>
                        </div>
      
                      </div>
                    </div>
      
                    <div class="row">
                      <div class="col-md-6 mb-4 d-flex align-items-center">
      
                        <div class="form-outline datepicker w-100">
                          <input type="calendar" class="form-control form-control-lg" id="birthdayDate" />
                          <label for="birthdayDate" class="form-label">Birthyear</label>
                        </div>
      
                      </div>
                      <div class="col-md-6 mb-4">
      
                        <h6 class="mb-2 pb-1">Gender: </h6>
      
                        <div class="form-check form-check-inline">
                          <input class="form-check-input" type="radio" name="inlineRadioOptions" id="femaleGender"
                            value="option1" checked />
                          <label class="form-check-label" for="femaleGender">Female</label>
                        </div>
      
                        <div class="form-check form-check-inline">
                          <input class="form-check-input" type="radio" name="inlineRadioOptions" id="maleGender"
                            value="option2" />
                          <label class="form-check-label" for="maleGender">Male</label>
                        </div>
      
                        <div class="form-check form-check-inline">
                          <input class="form-check-input" type="radio" name="inlineRadioOptions" id="otherGender"
                            value="option3" />
                          <label class="form-check-label" for="otherGender">Other</label>
                        </div>
      
                      </div>
                    </div>
      
                    <div class="row">
                      <div class="col-md-6 mb-4 pb-2">
      
                        <div class="form-outline">
                          <input type="email" id="emailAddress" class="form-control form-control-lg" />
                          <label class="form-label" for="emailAddress">Email</label>
                        </div>
      
                      </div>
                      <div class="col-md-6 mb-4 pb-2">
      
                        <div class="form-outline">
                          <input type="tel" id="phoneNumber" class="form-control form-control-lg" />
                          <label class="form-label" for="phoneNumber">Phone Number</label>
                        </div>
      
                      </div>
                    </div>
      
                    <div class="mt-4 pt-2">
                        <input class="btn btn-primary btn-lg" type="submit" value="Save" />
                    </div>
                    
      
                  </form>
                </div>
              </div>
            </div>
          </div>
        </div>
      </section>
</body>
</html>