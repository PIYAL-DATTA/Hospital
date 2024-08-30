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
$doctor_name = $about = $link = "";


// DB connection =======================================================>
include 'db_connection.php';
$conn = OpenCon();
// DB connection =======================================================>
?>

<!------------------------ Navbar ----------------------------->

<?php include 'navbar.php';?>

<!-------------------------- About Doctor ------------------------------------------>
<?php

$sql = "SELECT * FROM display WHERE id = 7";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
  while ($row = $result->fetch_assoc()) {
?>

<div class="container mt-5">
    <div class="row">
        <div class="col-xl-2"></div>
        <div class="col-xl-8">
          <img src="./../../admin/doctorimg/<?php echo $row['filename']; ?>" style="width: 100%">
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

<!---------------------------- Doctor List ----------------------------------->

<?php include 'doctorlist.php';?>

<!---------------------------------- FOOTER -------------------------------------->
<?php include 'footer.php';?>

<!--DATA connection close ===================================================-->
<?php CloseCon($conn); ?> 
<!--DATA connection close ===================================================-->

</body>
</html>
