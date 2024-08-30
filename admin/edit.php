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

</head>
<body>

<?php

// define variables and set to empty values
$nameErr = $emailErr = $subjectErr = $textErr = "";
$name = $email = $subject = $text =  $id = "";
$nameb = $emailb = $contactb = $subjectb = $textb = "false";
// database connection
$servername = "localhost";
$username = "intern";
$password = "Int3rn@cc";
$dbname = "hospital";                                                      
$conn = new mysqli($servername, $username, $password, $dbname);  
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

if($_SERVER['REQUEST_METHOD'] == 'GET') {
  if(!empty($_GET['id'])) {
    $id = $_GET['id'];
    //SQL for Showing value
    $sql = "SELECT * FROM message WHERE id = $id";
    $result = $conn->query($sql);
    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            $name = $row["name"];
            $email = $row["email"];
            $subject = $row["subject"];
            $text = $row["text"];                     
      }
    }
  }
} else {

  $id = $_POST["id"];

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
    //----------------------------- Subject -----------------------------------
  if (empty($_POST["subject"])) {
    $subjectErr = "Subject is required";
    $subjectb = "false";
  } else {
    $subject = $_POST["subject"];
    $subjectb = "true";
  }    
  //----------------------------- Text -----------------------------------
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
    $name = $email = $subject = $text = "";
    $nameb = $emailb = $subjectb = $textb = "false";
  }
  
  //======================== Edit =====================
  if (isset($_POST['edit'])){
    if($nameb == "true" && $emailb == "true" &&  $subjectb == "true" &&  $textb == "true"){
      $sql = "UPDATE message SET name='$name', email='$email', subject='$subject', text='$text' WHERE id= $id";
      $result = $conn->query($sql);        
      $conn->close();
      header("location: /hospital/admin/tables.php");
      exit;
    }
  }  
}   

?>

<!--------------------------- contact ------------------------------------------->
<div class="container text-center">
    <h2 style="font-family: Times New Roman, Times, serif" class="text-center pt-5 pb-5"> EDIT </h2>
    <div class="row pb-5">
        <div class="col-xl-2"></div>
        <!------------------------- FORM ------------------------------------------------------------------>
        <div class="col-xl-8">
          <div class="card shadow-lg" style="background: linear-gradient(to right, rgb(192,192,192), rgb(255,255,255))">
            <div class="card-body">
              <p style="font-family: Lucida Console, Courier New, monospace; font-size: 40px" class="text-center text-secondary"><i class="fa-solid fa-message" style="font-size:30px"></i> Edit Message </p>
              <form method = "post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
                <input type="hidden" name="id" value = <?php echo $id;?> ></input>
                <div class="mt-1">
                  <!----------------- Name & Email ----------->
                  <div class="row pt-3">
                    <div class="col-xl-6">
                      <input type="text" class="form-control"  placeholder="Enter Full Name" name="name" value="<?php echo $name;?>">
                      <span class="error">* <?php echo $nameErr;?></span>
                    </div>
                    <div class="col-xl-6">
                      <input type="text" class="form-control" placeholder="Enter email" name="email" value="<?php echo $email;?>">
                      <span class="error">* <?php echo $emailErr;?></span>
                    </div>
                  </div>
                  <!----------------- Message ----------->
                  <div class="row pt-3">
                    <div class="col-xl-12">
                      <input type="text" class="form-control"  placeholder="Enter Subject" name="subject" value="<?php echo $subject;?>">
                      <span class="error">* <?php echo $subjectErr;?></span>
                    </div>
                  </div>
                  <div class="row pt-3">
                    <div class="col-xxl-12">
                      <input class="form-control" id="text" placeholder="Text..." name="text" value="<?php echo $text;?>"></input>
                      <span class="error">* <?php echo $textErr;?></span>
                    </div>
                  </div>
<!---------------------------------- Button------------------------------------------->
                  <div class="text-center">
                    <input type="submit" class="btn btn-secondary" name="reset" value="Reset"></input> 
                    <input type="submit" class="btn btn-secondary" name="edit" value="Edit"></input>
                  </div>
                </div>
              </form>
            </div>
          </div>
        </div>
        <div class="col-xl-2"></div>
    </div>
</div>

</body>
</html>