<!DOCTYPE html>
<html lang="en">
<head>
  <title>Hospital</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
  <!----------------------   logo   ---------------------->
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.0/css/all.css" integrity="sha384-lZN37f5QGtY3VHgisS14W3ExzMWZxybE1SJSEsQp9S+oqd12jhcu+A56Ebc1zFSJ" crossorigin="anonymous">
  <script src="https://kit.fontawesome.com/b5c2cc2edf.js" crossorigin="anonymous"></script>
  <!--------------------------- Google Map --------------------------------------->
  <script src="https://polyfill.io/v3/polyfill.min.js?features=default"></script>

</head>
<body>
<?php 
// DB connection =======================================================>
//include 'db_connection.php';
//$conn = OpenCon();
// DB connection =======================================================> 
?>
    <!-- Remove the container if you want to extend the Footer to full width. -->
<div>

  <!-- Footer -->
  <footer
          class="text-center text-lg-start text-primary"
          style="background-color: #ADD8E6"
          >
    <!-- Section: Social media -->
    <section
             class="d-flex justify-content-between p-4"
             style="background-color: #89CFF0"
             >
      <!-- Left -->
      <div class="me-5">
        <span>Get connected with us on social networks:</span>
      </div>
      <!-- Left -->

      <!-- Right -->
      <div>
        <a href="" class="text-primary me-4">
          <i class="fab fa-facebook-f"></i>
        </a>
        <a href="" class="text-primary me-4">
          <i class="fab fa-twitter"></i>
        </a>
        <a href="" class="text-primary me-4">
          <i class="fab fa-google"></i>
        </a>
        <a href="" class="text-primary me-4">
          <i class="fab fa-instagram"></i>
        </a>
        <a href="" class="text-primary me-4">
          <i class="fab fa-linkedin"></i>
        </a>
        <a href="" class="text-primary me-4">
          <i class="fab fa-github"></i>
        </a>
      </div>
      <!-- Right -->
    </section>
    
    <!-- Section: Social media -->

    <!-- Section: Links  -->
    <section class="">
      <div class="container text-center text-md-start mt-5">
        <!-- Grid row -->
        <div class="row mt-3">
          <!-- Grid column -->
          <div class="col-md-3 col-lg-4 col-xl-3 mx-auto mb-4">
            <!-- Content -->
            <h6 class="text-uppercase fw-bold">Hospital name</h6>
            <hr
                class="mb-4 mt-0 d-inline-block mx-auto"
                style="width: 60px; background-color: #1c2331; height: 2px"
                />
            <p>
              Here you can use rows and columns to organize your footer
              content. Lorem ipsum dolor sit amet, consectetur adipisicing
              elit.
            </p>
          </div>
          <!-- Grid column -->

          <!-- Grid column -->
          <div class="col-md-2 col-lg-2 col-xl-2 mx-auto mb-4">
            <!-- Links -->
            <h6 class="text-uppercase fw-bold">Services</h6>
            <hr
                class="mb-4 mt-0 d-inline-block mx-auto"
                style="width: 60px; background-color: #1c2331; height: 2px"
                />

            <?php // PHP CODE ============================================>

            $sql = "SELECT * FROM servicelist";
            $result = $conn->query($sql);

            if ($result->num_rows > 0) {
              while ($row = $result->fetch_assoc()) {                                    

            ?>

            <p>
              <!--<a href="" class="text-primary">MDBootstrap</a> -->
              <?php echo "<a href='$row[link]' class='text-primary'> $row[name] </a>"; ?>
            </p>
            <?php
              }
            }
            ?>
          </div>
          <!-- Grid column -->

          <!-- Grid column -->
          <div class="col-md-3 col-lg-2 col-xl-2 mx-auto mb-4">
            <!-- Links -->
            <h6 class="text-uppercase fw-bold">Useful links</h6>
            <hr
                class="mb-4 mt-0 d-inline-block mx-auto"
                style="width: 60px; background-color: #7c4dff; height: 2px"
                />
            <p>
              <a href="#!" class="text-primary">Your Account</a>
            </p>
            <p>
              <a href="#!" class="text-primary">Become an Affiliate</a>
            </p>
            <p>
              <a href="#!" class="text-primary">Shipping Rates</a>
            </p>
            <p>
              <a href="#!" class="text-primary">Help</a>
            </p>
          </div>
          <!-- Grid column -->

          <!-- Grid column -->
          <div class="col-md-4 col-lg-3 col-xl-3 mx-auto mb-md-0 mb-4">
            <!-- Links -->
            <h6 class="text-uppercase fw-bold">Contact</h6>
            <hr
                class="mb-4 mt-0 d-inline-block mx-auto"
                style="width: 60px; background-color: #7c4dff; height: 2px"
                />
            <?php 
                $sql = "SELECT * FROM contact_address";
                $result = $conn->query($sql);
                if ($result->num_rows > 0) {
                    while ($row = $result->fetch_assoc()) { 
            ?>
            <p><i class="fas fa-home mr-3"></i> <?php echo $row["address"];?></p>
            <?php } } ?>
            <?php
                $sql = "SELECT * FROM contact_email";
                $result = $conn->query($sql);
                if ($result->num_rows > 0) {
                    while ($row = $result->fetch_assoc()) { 
            ?>
            <p><i class="fas fa-envelope mr-3"></i> <?php echo $row["email"];?></p>
            <?php } } ?>
            <?php 
                $sql = "SELECT * FROM contact_mbl";
                $result = $conn->query($sql);
                if ($result->num_rows > 0) {
                    while ($row = $result->fetch_assoc()) { 
            ?>
            <p><i class="fas fa-phone mr-3"></i> <?php echo $row["mbl"];?></p>
            <?php } } ?>
          </div>
          <!-- Grid column -->
        </div>
        <!-- Grid row -->
      </div>
    </section>
    <!-- Section: Links  -->

<!--=================== Google Map =============================-->
<section class="col-md-12">
  <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3652.0248836446576!2d90.3811918723849!3d23.74649204181401!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3755b8ba40ce18c1%3A0xc6222d1acf3135f1!2sGreen%20Life%20Medical%20College%20Hospital!5e0!3m2!1sen!2sbd!4v1716799681026!5m2!1sen!2sbd" width="100%" height="300px" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
</section>

    <!-- Copyright -->
    <div
         class="text-center p-3"
         style="background-color: rgba(240, 255, 255, 0.2)"
         >
      © 2022 Copyright:
      <a class="text-primary" href="#"
         >hospital.com</a
        >
    </div>
    <!-- Copyright -->
  </footer>
  <!-- Footer -->

</div>
<!-- End of .container -->

<!--DATA connection close ===================================================-->
<?//php CloseCon($conn); ?> 
<!--DATA connection close ===================================================-->
</body>
</html>