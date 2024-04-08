<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>FAQ</title>
<link rel="stylesheet" href="styles.css">
<!-- Bootstrap CSS -->
<link href="https://stackpath.bootstrapcdn.com/bootstrap/5.1.3/css/bootstrap.min.css" rel="stylesheet">

<style>
  /* General styles */
body {
    font-family: Arial, sans-serif;
    margin: 0;
    padding: 0;
    box-sizing: border-box;
}

.container {
    padding: 20px;
}

/* Accordion styles */
.accordion-item {
    margin-bottom: 10px;
}

.accordion-button {
    background-color: #007bff;
    color: #fff;
    border: none;
    border-radius: 5px;
    padding: 10px 20px;
    width: 100%;
    text-align: left;
    transition: background-color 0.3s ease;
}

.accordion-button:hover {
    background-color: #0056b3;
}

.accordion-body {
    background-color: #f8f9fa;
    padding: 10px 20px;
    border: 1px solid #ced4da;
    border-top: none;
    border-radius: 0 0 5px 5px;
}

.accordion-body strong {
    color: #007bff;
}


  .hd{
    background-color:  rgb(64, 115, 234);
    text-align: center;
    padding: 50px;
    margin-bottom: 20px;
    color: white;
  }


</style>
</head>
<body>

<header class="hd"  class="faq-header">
    <div class="container">
        <h1>Frequently Asked Questions</h1>
        <p>Here are some common questions and answers. If you don't find what you're looking for, feel free to contact us.</p>
    </div>
</header>

<div class="container">
  <div class="accordion" id="accordionExample">
    <div class="accordion-item">
      <h2 class="accordion-header" id="headingOne">
        <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
        Does the website provide free courses? #1
        </button>
      </h2>
      <div id="collapseOne" class="accordion-collapse collapse show" aria-labelledby="headingOne" data-bs-parent="#accordionExample">
        <div class="accordion-body">
          <strong>Absolutely! Our website offers a wide range of free courses in various fields, from technology to arts, business, languages, and much more. We believe that everyone should have access to quality education without the need for payment.
        </div>
      </div>
    </div>
    <div class="accordion-item">
      <h2 class="accordion-header" id="headingTwo">
        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
        How can I enroll in a free course? #2
        </button>
      </h2>
      <div id="collapseTwo" class="accordion-collapse collapse" aria-labelledby="headingTwo" data-bs-parent="#accordionExample">
        <div class="accordion-body">
          <strong>Enrolling in our free courses is completely free and straightforward. Simply create a new account, choose the course you're interested in, and start learning right away. There are no registration fees or tuition fees.
        </div>
      </div>
    </div>
    <div class="accordion-item">
      <h2 class="accordion-header" id="headingThree">
        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
        How is the quality of the free courses? #3
        </button>
      </h2>
      <div id="collapseThree" class="accordion-collapse collapse" aria-labelledby="headingThree" data-bs-parent="#accordionExample">
        <div class="accordion-body">
          <strong> All our free courses are designed and developed by top experts in the field. They are delivered in the form of videos, lectures, quizzes, and other study materials to ensure that you receive quality knowledge that you can apply in real life.
        </div>
      </div>
    </div>
  </div>
</div>

</body>
</html>

  