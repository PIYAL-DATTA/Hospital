<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Admin Register</title>

    <!-- Custom fonts for this template-->
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="css/sb-admin-2.min.css" rel="stylesheet">

</head>

<body class="bg-gradient-primary">

<?php

// define variables and set to empty values
$emailErr = $passwordErr = $re_passwordErr = $firstnameErr = $lastnameErr = "";
$email = $password = $re_password = $firstname = $lastname = "";
$emailb = $nameb = $firstnameb = $lastnameb = "false";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
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

      if (empty($_POST["firstname"])) {
        $firstnameErr = "Name is required";
        $firstnameb = "false";
      } else {
        $firstname = $_POST["firstname"];
        $firstnameb = "true";
        // check if name only contains letters and whitespace
        if (!preg_match("/^[a-zA-Z-' ]*$/",$firstname)) {
          $firstnameErr = "Only letters and white space allowed";
          $firstnameb = "false";
        }
      }

      if (empty($_POST["lastname"])) {
        $lastnameErr = "Name is required";
        $lastnameb = "false";
      } else {
        $lastname = $_POST["lastname"];
        $lastnameb = "true";
        // check if name only contains letters and whitespace
        if (!preg_match("/^[a-zA-Z-' ]*$/",$lastname)) {
          $lastnameErr = "Only letters and white space allowed";
          $lastnameb = "false";
        }
      }

      if (empty($_POST["password"])) {
        $passwordErr = "Password is required";
      } 
      elseif(strlen($_POST["password"]) < 6) {
        $passwordErr = "Atleast 6 character needed";
      }
      else {
        $password = $_POST["password"];
      }

      if (empty($_POST["re_password"])) {
        $re_passwordErr = "Re-type password";
      } else {
        $re_password = $_POST["re_password"];
      }

    if (isset($_POST['create'])){
      if($emailb == "true" && $firstnameb == "true" && $lastnameb == "true") {
        if($password == $re_password) {
        $servername = "localhost";
        $username = "intern";
        $pass = "Int3rn@cc";
        $dbname = "hospital";

        // Create connection
        $conn = new mysqli($servername, $username, $pass, $dbname);
        try {
          $stmt = $conn->prepare("INSERT INTO persons ( email,	firstname,	lastname,	PASSWORD) VALUES ( ?, ?, ?, ?)");
          $stmt->bind_param("ssss", $email, $firstname, $lastname, $password);
          $stmt->execute();
        }catch(Exception $e) {
          $emailErr = "Email already in USE";
        }
        
        }
        else {
            echo "Password don't match";
        }
      }
      else {
        echo "Something wrong";
        $emailErr = $passwordErr = $re_passwordErr = $firstnameErr = $lastnameErr = "";
        $email = $password = $re_password = $firstname = $lastname = "";
        $emailb = $nameb = $firstnameb = $lastnameb = "false";
      }

    }
}
?>

<form method = "post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
    <div class="container">

        <div class="card o-hidden border-0 shadow-lg my-5">
            <div class="card-body p-0">
                <!-- Nested Row within Card Body -->
                <div class="row">
                    <div class="col-lg-5 d-none d-lg-block bg-register-image"></div>
                    <div class="col-lg-7">
                        <div class="p-5">
                            <div class="text-center">
                                <h1 class="h4 text-gray-900 mb-4">Create an Account!</h1>
                            </div>
                            <form class="user">
                                <div class="form-group row">
                                    <div class="col-sm-6 mb-3 mb-sm-0">
                                        <input type="text" class="form-control form-control-user" id="exampleFirstName"
                                        name="firstname" placeholder="First Name">
                                    </div>
                                    <div class="col-sm-6">
                                        <input type="text" class="form-control form-control-user" id="exampleLastName"
                                        name="lastname" placeholder="Last Name">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <input type="email" class="form-control form-control-user" id="exampleInputEmail"
                                    name="email" placeholder="Email Address">
                                </div>
                                <div class="form-group row">
                                    <div class="col-sm-6 mb-3 mb-sm-0">
                                        <input type="password" class="form-control form-control-user"
                                        name="password"  id="exampleInputPassword" placeholder="Password">
                                    </div>
                                    <div class="col-sm-6">
                                        <input type="password" class="form-control form-control-user"
                                        name="re_password"    id="exampleRepeatPassword" placeholder="Repeat Password">
                                    </div>
                                </div>
                                <input type="submit" href="#" class="btn btn-primary btn-user btn-block" name="create" value="Register Account">
                                </input>
                                <hr>
                                <a href="index.html" class="btn btn-google btn-user btn-block">
                                    <i class="fab fa-google fa-fw"></i> Register with Google
                                </a>
                                <a href="index.html" class="btn btn-facebook btn-user btn-block">
                                    <i class="fab fa-facebook-f fa-fw"></i> Register with Facebook
                                </a>
                            </form>
                            <hr>
                            <div class="text-center">
                                <a class="small" href="forgot-password.html">Forgot Password?</a>
                            </div>
                            <div class="text-center">
                                <a class="small" href="login.html">Already have an account? Login!</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>

    <!-- Bootstrap core JavaScript-->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="js/sb-admin-2.min.js"></script>
</form>
</body>

</html>