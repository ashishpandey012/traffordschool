<?php include 'inc/connection.php'?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>About us</title>
    <?php include 'include/head.php'?>
  </head>
  <body>
  <?php include 'include/navbar.php';?>
    <section class="about-main-content">
      <div class="container-fluid">
        <div class="row align-items-center">
          <div class="col-lg-7 col-md-12 col-12">
            <h2 class="position-relative mb-4">About Trafford</h2>
            <p class="mb-2">
              We are committed to providing an exceptional learning environment
              for our students, fostering academic excellence, and nurturing
              individual growth. Explore our website to learn more about our
              programs, facilities, and how we engage with our community.
            </p>
            <p class="mb-2">
              At Trafford Public School, we take pride in our diverse and
              inclusive community of students, teachers, and staff. Our mission
              is to empower each student with knowledge and skills to succeed in
              a rapidly changing world. Learn about our history, values, and
              vision for the future.
            </p>
            <p>
              At Trafford Public School, we believe that learning extends beyond
              the classroom. Our students actively participate in a variety of
              extracurricular activities, sports, and clubs, promoting teamwork
              and leadership.
            </p>
            <div class="about-thaught mt-4">
              <h3 class="mb-0 text-center">
                "In school education, knowledge blossoms, nurturing the leaders
                of tomorrow."
              </h3>
            </div>
          </div>
          <div class="col-lg-5 col-md-12 col-12">
          <div class="contact-area-form mt-sm-4">
                <h3 class="text-center">Contact Form</h3>
                  <form action="" class="mt-3">
                    <div class="row">
                      <div class="col-md-12">
                        <label for="">Student Name*</label>
                        <input class="form-control" type="text" placeholder="Enter student name">
                      </div>
                      <div class="col-md-12">
                        <label for="">Email Address*</label>
                        <input class="form-control" type="email" placeholder="Enter email address">
                      </div>
                      <div class="col-md-6 col-12">
                        <label for="">Mobile Number*</label>
                        <input class="form-control" type="tel" placeholder="Enter mobile number">
                      </div>
                      <div class="col-md-6 col-12">
                        <label for="">Select your class*</label>
                        <select class="form-select" aria-label="Default select example">
                          <option selected>Select Class</option>
                          <option value="1">One</option>
                          <option value="2">Two</option>
                          <option value="3">Three</option>
                        </select>
                      </div>
                    </div>
                    <button class="tps-submit-btn">Submit</button>
                  </form>
              </div>
          </div>
        </div>
      </div>
    </section>

    

    <?php include 'include/footer.php';?>
  </body>
</html>
