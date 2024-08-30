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

// define variables and set to empty values
$nameErr = $emailErr = $subjectErr = $textErr = "";
$name = $email = $contact = $subject = $text = "";
$nameb = $emailb = $contactb = $subjectb = $textb = "false";
$col_num = 0;

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
    $name = test_input($_POST["name"]);
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
    $email = test_input($_POST["email"]);
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
    $subject = test_input($_POST["subject"]);
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
    $text = test_input($_POST["text"]);
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

<!------------------------ Navbar ----------------------------->

<?php include 'navbar.php';?>

<!-------------------------- About Service ------------------------------------------>

<?php

$sql = "SELECT * FROM display WHERE id = 8";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
  while ($row = $result->fetch_assoc()) {                                    

?>
<div class="container mt-5">
    <div class="row">
        <div class="col-xl-2"></div>
        <div class="col-xl-8">
          <img src="./../../admin/serviceimg/<?php echo $row['filename']; ?>" style="width: 100%">
        </div>
        <div class="col-xl-2"></div>
    </div>
    <div  class="row pt-5">
        <div class="col-xl-2"></div>
        <div class="col-xl-8">
            <h3 style="font-family: Times New Roman, Times, serif"><?php echo $row["title"]; ?></h3>
            <p style="font-family: Arial, Helvetica, sans-serif; font-size: 15px; text-align: justify; text-justify: inter-word">
              <?php echo $row["description"]; ?>
            </p>
        </div>
        <div class="col-xl-2"></div>
    </div>
</div>
<?php // PHP CODE END =========================================>
  }
}
?> 
<!------------------------ About Our Service --------------------------------------->
<div class="container">
<div class="row">
  <div class="col-md-2"></div>
  <div class="col-md-8 text-center">
  <?php

  $sql = "SELECT * FROM servicelist";
  $result = $conn->query($sql);
  $rowcount = mysqli_num_rows( $result );
  if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
  ?>
      <h4 class="text-center pt-4"><?php echo $row["name"]; ?></h4>
      <div style="font-family: Times New Roman, Times, serif; font-size: 18px; text-align: justify; text-justify: inter-word">
        <p><?php echo $row["description"]; ?></p>
      </div>                   
  <?php
    }
  }                                    

  ?>
  </div>
  <div class="col-md-2"></div>
</div>
</div>
<!-------------------------- Service List ------------------------------------------>
<div class="pb-5">
  <?php include 'servicelist.php';?>
</div>

<!---------------------------------- FOOTER -------------------------------------->

<?php include 'footer.php';?>

<!--DATA connection close ===================================================-->
<?php CloseCon($conn); ?>
<!--DATA connection close ===================================================-->
</body>
</html>
