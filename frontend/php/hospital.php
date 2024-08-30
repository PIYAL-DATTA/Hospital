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

  <script src="//code.jquery.com/jquery-1.10.2.js"></script> 
  <script>  
  $(function(){ 
    $("#navbar").load("navbar.php");
    $("#footer").load("footer.php");
    $("#doctorlist").load("doctorlist.php");
    $("#servicelist").load("servicelist.php");   
  }); 
  </script>  

</head>
<body style="background: url(/hospital/frontend/assets/bg.jpg) center fixed;display:table;height:100%;width:100%;position: relative;background-size:cover;">

<?php
$count = 0;
// define variables and set to empty values
$nameErr = $emailErr = $subjectErr = $textErr = "";
$name = $email = $contact = $subject = $text = "";
$nameb = $emailb = $contactb = $subjectb = $textb = "false";

// DB connection =======================================================>
include 'db_connection.php';
$conn = OpenCon();
// DB connection =======================================================>

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  //----------------------------- NAME -----------------------------------
  if (empty($_POST["name"])) {
    $nameErr = "Name is required";
    $nameb = "false";
  } else {
    $name = $_POST["name"];
    $nameb = "true";
    // check if name only contains letters and whitespace
    if (!preg_match("/^[a-zA-Z-' ]*$/",$name)) {
      $nameErr = "Only letters and white space allowed";
      $nameb = "false";
    }
  }
  //----------------------------- Email -----------------------------
  if (empty($_POST["email"])) {
    $emailErr = "Email is required";
    $emailb = "false";
  } else {
    $email = $_POST["email"];
    $emailb = "true";
    // check if e-mail address is well-formed
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
      $emailErr = "Invalid email format";
      $emailb = "false";
    }
  }
  //----------------------------- NAME -----------------------------------
  if (empty($_POST["subject"])) {
    $subjectErr = "Subject is required";
    $subjectb = "false";
  } else {
    $subject = $_POST["subject"];
    $subjectb = "true";
    // check if name only contains letters and whitespace
    if (!preg_match("/^[a-zA-Z-' ]*$/",$subject)) {
      $subjectErr = "Only letters and white space allowed";
      $subjectb = "false";
    }
  }
  if (empty($_POST["text"])) {
    $textErr = "Your message is required";
    $textb = "false";
  } else {
    $text = $_POST["text"];
    $textb = "true";
  }
  //========================== RESET =======================

  if (isset($_POST['reset'])){
    $nameErr = $emailErr = $subjectErr = $textErr = "";
    $name = $email = $contact = $subject = $text = "";
    $nameb = $emailb = $contactb = $subjectb = $textb = "false";
  }

  //======================== Submit =====================

  if (isset($_POST['submit'])){
    if($nameb == "true" && $emailb == "true" &&  $subjectb == "true" &&  $textb == "true"){

      $stmt = $conn->prepare("INSERT INTO feedback ( name,	email,	subject,	feedback) VALUES ( ?, ?, ?, ?)");
      $stmt->bind_param("ssss", $name, $email, $subject, $text);
      $stmt->execute();
      $stmt->close();

      $nameErr = $emailErr = $subjectErr = $textErr = "";
      $name = $email = $contact = $subject = $text = "";
      $nameb = $emailb = $contactb = $subjectb = $textb = "false";
    }
  }

}
?>

<!--------------------------- Navbar -------------------------------------->

<?php include 'navbar.php';?>

<!--================ Hospital Image =====================================-->
<div class="container">
        <?php
        $query = "SELECT * FROM display WHERE id = 6";
        $result = $conn->query($query);
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
        
        ?>
          <img class="rounded" src="./../../admin/homeimg/<?php echo $row['filename']; ?>" style="width: 100%">
        <?php
            }
          }
        ?>
    </div>

<!-------------------------- About Us ------------------------------------------>

<?php

$sql = "SELECT * FROM display WHERE id = 6";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
  while ($row = $result->fetch_assoc()) {
    $header = $row["title"];
    $paragraph = $row["description"];
  }
}                                    

?>
<div class="container">
    <div  class="row pt-5">
        <div class="col-xl-2"></div>
        <div class="col-xl-8">
            <h3 style="font-family: Times New Roman, Times, serif"><?php echo $header; ?></h3>
            <p style="font-family: Arial, Helvetica, sans-serif; font-size: 15px; text-align: justify; text-justify: inter-word">
              <?php echo $paragraph; ?>
            </p>
        </div>
        <div class="col-xl-2"></div>
    </div>
</div>

<!---------------------------==================== Carousel ==============-------------------------------------->
<div class="container pt-5">
<div id="demo" class="carousel slide" data-bs-ride="carousel">

  
  <!-- Indicators/dots -->
  <div class="carousel-indicators">
    <button type="button" data-bs-target="#demo" data-bs-slide-to="0" class="active"></button>
    <button type="button" data-bs-target="#demo" data-bs-slide-to="1"></button>
    <button type="button" data-bs-target="#demo" data-bs-slide-to="2"></button>
  </div>

  
  <!-- The slideshow/carousel -->
  <div class="carousel-inner">
  <?php
    $query = "SELECT * FROM carousel";
    $result = $conn->query($query);
    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {       
  ?>
    <div class="carousel-item active">
      <img src="./../../admin/homeimg/<?php echo $row['filename']; ?>" class="d-block rounded" style="width:100%; height: 600px">
      <div class="carousel-caption">
        <h3><?php echo $row['title']; ?></h3>
        <p><?php echo $row['description']; ?></p>
      </div> 
    </div>
    <?php
        }
      }  
    ?>
    <!-- Left and right controls/icons -->
    <button class="carousel-control-prev" type="button" data-bs-target="#demo" data-bs-slide="prev">
      <span class="carousel-control-prev-icon"></span>
    </button>
    <button class="carousel-control-next" type="button" data-bs-target="#demo" data-bs-slide="next">
      <span class="carousel-control-next-icon"></span>
    </button>
    </div>
  </div>
</div>

<!-------------------------- Services ------------------------------------------>

<?php include 'servicelist.php';?>

<!--------------<div id="doctorlist"></div>-------------- Doctors ----------------------------------->
<?php include 'doctorlist.php';?>

<!--------------------------- contact ------------------------------------------->

<div id="contact" class="container">
    <h2 style="font-family: Times New Roman, Times, serif" class="text-center pt-5 pb-5"> Contact </h2>
    <div class="row pb-5">
        <div class="col-xl-6">
            <div class="row">
                <div class="col-xl-12  pb-3">
                    <div class="card shadow-lg" style="background: linear-gradient(to right, rgb(255,255,255), rgb(173,216,230))">
                        <div class="card-body text-center">
                        <i class="fa-solid fa-location-dot text-secondary p-4" style="font-size:40px"></i>
                          <p style="font-family: Lucida Console, Courier New, monospace; font-size: 40px" class="text-center text-secondary"> Our Address </p>
                          <?php 
                          $sql = "SELECT * FROM contact_address";
                          $result = $conn->query($sql);
                          if ($result->num_rows > 0) {
                              while ($row = $result->fetch_assoc()) { 
                          ?>
                          <h5 style="font-family: Times New Roman, Times, serif" class="text-center pb-3"><?php echo $row["address"]; ?></h5>
                          <?php } } ?>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-xl-6">
                    <div class="card shadow-lg" style="background: linear-gradient(to right, rgb(173,216,230), rgb(255,255,255))">
                        <div class="card-body text-center">
                          <i class="fa-solid fa-envelope text-secondary p-4" style="font-size:30px"></i>
                          <p style="font-family: Lucida Console, Courier New, monospace; font-size: 25px" class="text-center text-secondary"> Email </p>
                          <?php 
                          $sql = "SELECT * FROM contact_email";
                          $result = $conn->query($sql);
                          if ($result->num_rows > 0) {
                              while ($row = $result->fetch_assoc()) { 
                          ?>
                          <h5 style="font-family: Times New Roman, Times, serif" class="text-center pb-3"><?php echo $row["email"]; ?></h5>
                          <?php } } ?>
                        </div>
                    </div>
                </div>
                <div class="col-xl-6">
                    <div class="card shadow-lg" style="background: linear-gradient(to right, rgb(173,216,230), rgb(255,255,255))">
                        <div class="card-body text-center">
                          <i class="fa-solid fa-phone-volume text-secondary p-4" style="font-size:30px"></i>
                          <p style="font-family: Lucida Console, Courier New, monospace; font-size: 25px" class="text-center text-secondary"> Call Us </p>
                          <?php 
                          $sql = "SELECT * FROM contact_mbl";
                          $result = $conn->query($sql);
                          if ($result->num_rows > 0) {
                              while ($row = $result->fetch_assoc()) { 
                          ?>
                          <h5 style="font-family: Times New Roman, Times, serif" class="text-center pb-3"><?php echo $row["mbl"]; ?></h5>
                          <?php } } ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!------------------------- FORM ------------------------------------------------------------------>
        <div class="col-xl-6">
          <div class="card shadow-lg" style="background: #ADD8E6">
            <div class="card-body">
              <p style="font-family: Lucida Console, Courier New, monospace; font-size: 40px" class="text-center text-secondary"><i class="fa-solid fa-message" style="font-size:30px"></i> Send Message </p>
              <form method = "post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
                <div class="mt-1">
                  <!----------------- Name & Email ----------->
                  <div class="row">
                    <div class="col-xl-6 pt-3">
                      <input type="text" class="form-control"  placeholder="Enter Full Name" name="name" value="<?php echo $name;?>">
                      <span class="error"> <?php echo $nameErr;?></span>
                    </div>
                    <div class="col-xl-6 pt-3">
                      <input type="text" class="form-control" placeholder="Enter email" name="email" value="<?php echo $email;?>">
                      <span class="error"> <?php echo $emailErr;?></span>
                    </div>
                  </div>
                  <!----------------- Message ----------->
                  <div class="row pt-3">
                    <div class="col-xl-12">
                      <input type="text" class="form-control"  placeholder="Enter Subject" name="subject">
                      <span class="error"> <?php echo $subjectErr;?></span>
                    </div>
                  </div>
                  <div class="row pt-3">
                    <div class="col-xxl-12">
                      <textarea class="form-control" rows="5" id="comment" placeholder="Text..." name="text"></textarea>
                      <span class="error"> <?php echo $textErr;?></span>
                    </div>
                  </div>
<!---------------------------------- Button------------------------------------------->
                  <div class="text-center pt-4">
                    <input type="submit" class="btn btn-secondary" name="reset" value="Reset"></input> 
                    <input type="submit" class="btn btn-secondary" data-bs-toggle="modal" data-bs-target="#myModal" name="submit" value="Submit"></input>
                  </div>
                </div>
              </form>
            </div>
          </div>
        </div>
    </div>
</div>

<!-------------<div id="footer"></div>--------------------- FOOTER -------------------------------------->
<?php include 'footer.php';?>


<!--DATA connection close ===================================================-->
<?php CloseCon($conn); ?> 
<!--DATA connection close ===================================================-->
</body>
</html>
