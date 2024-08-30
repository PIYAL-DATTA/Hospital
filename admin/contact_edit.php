<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Admin Control Panel</title>

    <!-- Custom fonts for this template-->
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="css/sb-admin-2.min.css" rel="stylesheet">

    <!--================ For Bootstrap =====================-->
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
    $("#navbar").load("navbar.html");
    $("#footer").load("footer.html");   
  }); 
  </script>

</head>
<body>

<?php //PHP CODE ==================================================>
include 'db_connection.php';
$conn = OpenCon();
//Global Var============================
$header = $paragraph = $link = $d_name = "";
$headerErr = $paragraphErr = $linkErr = $imgErr = $d_nameErr = "";
$headerb = $paragraphb = $linkb = $imgb = "false";
$d_nameErr = "";
$use = "false";

$navitem = $d_navitem =  "";
$navitemErr = $d_navitemErr = $linkErr = "";
$pre_name = "";
?> <!--//PHP CODE END ==================================================-->

<!-- Content Wrapper -->
<div id="wrapper">
    <!---------------------------------- NAVBAR -------------------------------------->
    <div id="navbar"></div>
    <!---------------------------------- CONTACTS -------------------------------------->
    <!-- Content Wrapper -->
    <div id="content-wrapper" class="d-flex flex-column">
        <!---------------------- NAVBAR Modification -------------------------------->
            <!-- Begin Page Content -->
            <div class="container-fluid">

                <!-- Page Heading -->
                <!--------------------------- Contact INSERT ------------------------------------------->
                <div class="container text-center pb-5">
                    <h2 style="font-family: Times New Roman, Times, serif" class="text-center pt-3 pb-3"> Contact Info </h2>
                    <div class="row">
                        <!------------------------- FORM ------------------------------------------------------------------>
                        <div class="col-xl-3"></div>
                        <div class="col-xl-6">
                            <!---------------------------- Doctor List ------------------------------------------------------------------>
                            <div class="pb-2">
                                    <div class="card shadow-lg bg-light">
                                        <div class="card-body">
                                            <form method = "post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" enctype="multipart/form-data">
                                                <!------------------------------- Nav Item ---------------------------------------->
                                                <h4 style="font-family: Times New Roman, Times, serif" class="text-center pt-1 pb-1">Address</h4>
                                                <div class="row">
                                                    <div class="col-md-10 pb-2">
                                                        <input type="text" class="form-control"  placeholder="Enter Address" name="address">
                                                        <span><?php echo $headerErr; ?></span> 
                                                    </div>
                                                    <!---------------------------------- Button------------------------------------------->
                                                    <div class="col-md-2 text-center">
                                                        <input type="submit" class="btn btn-secondary" name="insert_address" value="Insert"></input>
                                                    </div>
                                                </div>
                                                    <?php //====== PHP CODE ===============================>
                                                        if (isset($_POST['insert_address'])){
        
                                                            if (empty($_POST["address"])) {
                                                                $headerErr = "Your message is required";
                                                                $headerb = "false";
                                                            } else {
                                                                $header = $_POST["address"];
                                                                $headerb = "true";

                                                                $sql = "SELECT * FROM contact_address";
                                                                $result = $conn->query($sql);
                                                                if ($result->num_rows > 0) {
                                                                    while ($row = $result->fetch_assoc()) {
                                                                        if($header == $row["address"]) {
                                                                            $headerb = "false";
                                                                            $headerErr = "Already exist";
                                                                        }                           
                                                                    }
                                                                }

                                                                if($headerb == "true"){ 
                                                                    $stmt = $conn->prepare("INSERT INTO contact_address (address) VALUES (?)");
                                                                    $stmt->bind_param("s", $header);
                                                                    $stmt->execute();
                                                                    $stmt->close();
                                                                }
                                                            }
                                                        }
                                                    ?> <!--================ END CODE ====================-->    
                                            </form>
                                        </div>
                                    </div>
                            </div>

                        </div>
                        <div class="col-xl-3"></div>
                    </div>
                    <!------------------------------------------------------------------------------------------------------>
                    <div class="row pt-2">
                        <!------------------------- FORM ------------------------------------------------------------------>
                        <div class="col-xl-3"></div>
                        <div class="col-xl-6">
                            <!---------------------------- Doctor List ------------------------------------------------------------------>
                            <div class="pb-2">
                                    <div class="card shadow-lg bg-light">
                                        <div class="card-body">
                                            <form method = "post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" enctype="multipart/form-data">
                                                <!------------------------------- Nav Item ---------------------------------------->
                                                <h4 style="font-family: Times New Roman, Times, serif" class="text-center pt-1 pb-1">Email Address</h4>
                                                <div class="row">
                                                    <div class="col-md-10 pb-2">
                                                        <input type="text" class="form-control"  placeholder="Enter Email Address" name="email">
                                                        <span><?php echo $headerErr; ?></span> 
                                                    </div>
                                                    <!---------------------------------- Button------------------------------------------->
                                                    <div class="col-md-2 text-center">
                                                        <input type="submit" class="btn btn-secondary" name="insert_email" value="Insert"></input>
                                                    </div>
                                                </div>
                                                    <?php //====== PHP CODE ===============================>
                                                        if (isset($_POST['insert_email'])){
        
                                                            if (empty($_POST["email"])) {
                                                                $headerErr = "Your message is required";
                                                                $headerb = "false";
                                                            } else {
                                                                $header = $_POST["email"];
                                                                $headerb = "true";

                                                                $sql = "SELECT * FROM contact_email";
                                                                $result = $conn->query($sql);
                                                                if ($result->num_rows > 0) {
                                                                    while ($row = $result->fetch_assoc()) {
                                                                        if($header == $row["email"]) {
                                                                            $headerb = "false";
                                                                            $headerErr = "Already exist";
                                                                        }                           
                                                                    }
                                                                }

                                                                if($headerb == "true"){ 
                                                                    $stmt = $conn->prepare("INSERT INTO contact_email (email) VALUES (?)");
                                                                    $stmt->bind_param("s", $header);
                                                                    $stmt->execute();
                                                                    $stmt->close();
                                                                }
                                                            }
                                                        }
                                                    ?> <!--================ END CODE ====================-->    
                                            </form>
                                        </div>
                                    </div>
                            </div>

                        </div>
                        <div class="col-xl-3"></div>

                    </div>
                    <!-------------------------------------------------------------------------------->
                    <div class="row pt-2">
                        <!------------------------- FORM ------------------------------------------------------------------>
                        <div class="col-xl-3"></div>
                        <div class="col-xl-6">
                            <!---------------------------- Doctor List ------------------------------------------------------------------>
                            <div class="pb-2">
                                    <div class="card shadow-lg bg-light">
                                        <div class="card-body">
                                            <form method = "post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" enctype="multipart/form-data">
                                                <!------------------------------- Nav Item ---------------------------------------->
                                                <h4 style="font-family: Times New Roman, Times, serif" class="text-center pt-1 pb-1">Mobile Number</h4>
                                                <div class="row">
                                                    <div class="col-md-10 pb-2">
                                                        <input type="text" class="form-control"  placeholder="Enter Mobile Number" name="mbl">
                                                        <span><?php echo $headerErr; ?></span> 
                                                    </div>
                                                    <!---------------------------------- Button------------------------------------------->
                                                    <div class="col-md-2">
                                                        <input type="submit" class="btn btn-secondary" name="insert_mbl" value="Insert"></input>
                                                    </div>
                                                </div>
                                                    <?php //====== PHP CODE ===============================>
                                                        if (isset($_POST['insert_mbl'])){
        
                                                            if (empty($_POST["mbl"])) {
                                                                $headerErr = "Your message is required";
                                                                $headerb = "false";
                                                            } else {
                                                                $header = $_POST["mbl"];
                                                                $headerb = "true";

                                                                $sql = "SELECT * FROM contact_mbl";
                                                                $result = $conn->query($sql);
                                                                if ($result->num_rows > 0) {
                                                                    while ($row = $result->fetch_assoc()) {
                                                                        if($header == $row["mbl"]) {
                                                                            $headerb = "false";
                                                                            $headerErr = "Already exist";
                                                                        }                           
                                                                    }
                                                                }

                                                                if($headerb == "true"){ 
                                                                    $stmt = $conn->prepare("INSERT INTO contact_mbl (mbl) VALUES (?)");
                                                                    $stmt->bind_param("s", $header);
                                                                    $stmt->execute();
                                                                    $stmt->close();
                                                                }
                                                            }
                                                        }
                                                    ?> <!--================ END CODE ====================-->    
                                            </form>
                                        </div>
                                    </div>
                            </div>

                        </div>
                        <div class="col-xl-3"></div>

                    </div>
                    
                </div>
                <!-- END -->

                <!---------------------------=========== Contact DELETE ============================------------------------------------------->
                <div class="container text-center pb-5">
                    <h2 style="font-family: Times New Roman, Times, serif" class="text-center pt-3 pb-3"> Contact Delete </h2>
                    <div class="row">
                        <!------------------------- FORM ------------------------------------------------------------------>
                        <div class="col-xl-3"></div>
                        <div class="col-xl-6">
                            <!---------------------------- Doctor List ------------------------------------------------------------------>
                            <div class="pb-2">
                                    <div class="card shadow-lg bg-light">
                                        <div class="card-body">
                                            <form method = "post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" enctype="multipart/form-data">
                                                <!------------------------------- Nav Item ---------------------------------------->
                                                <h4 style="font-family: Times New Roman, Times, serif" class="text-center pt-1 pb-1">Address</h4>
                                                <div class="row">
                                                    <div class="col-md-9 pb-2">
                                                        <input type="text" class="form-control"  placeholder="Enter Address" name="d_name">
                                                        <span><?php echo $d_nameErr; ?></span> 
                                                    </div>
                                                    <!---------------------------------- Button------------------------------------------->
                                                    <div class="col-md-3 text-center">
                                                        <input type="submit" class="btn btn-secondary" name="delete_address" value="Delete"></input>
                                                    </div>
                                                </div>
                                                    <?php //====== PHP CODE ===============================>
                                                        if (isset($_POST['delete_address'])){
        
                                                            if (empty($_POST["d_name"])) {
                                                                $d_nameErr = "Your message is required";
                                                                $d_nameb = "false";
                                                            } else {
                                                                $d_name = $_POST["d_name"];
                                                                $d_nameb = "true";

                                                                $sql = "DELETE FROM contact_address WHERE address = ?";
                                                                $stmt = $conn->prepare($sql);
                                                                $stmt->bind_param("s", $d_name);
                                                                $stmt->execute(); 
                                                                $stmt->close(); 
                                                            }
                                                        }
                                                    ?> <!--================ END CODE ====================-->    
                                            </form>
                                        </div>
                                    </div>
                            </div>

                        </div>
                        <div class="col-xl-3"></div>
                    </div>
                    <!------------------------------------------------------------------------------------------------------>
                    <div class="row pt-2">
                        <!------------------------- FORM ------------------------------------------------------------------>
                        <div class="col-xl-3"></div>
                        <div class="col-xl-6">
                            <!---------------------------- Contact List ------------------------------------------------------------------>
                            <div class="pb-2">
                                    <div class="card shadow-lg bg-light">
                                        <div class="card-body">
                                            <form method = "post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" enctype="multipart/form-data">
                                                <!------------------------------- Nav Item ---------------------------------------->
                                                <h4 style="font-family: Times New Roman, Times, serif" class="text-center pt-1 pb-1">Email Address</h4>
                                                <div class="row">
                                                    <div class="col-md-9 pb-2">
                                                        <input type="text" class="form-control"  placeholder="Enter Email Address" name="d_name">
                                                        <span><?php echo $d_nameErr; ?></span> 
                                                    </div>
                                                    <!---------------------------------- Button------------------------------------------->
                                                    <div class="col-md-3 text-center">
                                                        <input type="submit" class="btn btn-secondary" name="delete_email" value="Delete"></input>
                                                    </div>
                                                </div>
                                                    <?php //====== PHP CODE ===============================>
                                                        if (isset($_POST['delete_email'])){
        
                                                            if (empty($_POST["d_name"])) {
                                                                $d_nameErr = "Your message is required";
                                                                $d_nameb = "false";
                                                            } else {
                                                                $d_name = $_POST["d_name"];
                                                                $d_nameb = "true";

                                                                $sql = "DELETE FROM contact_email WHERE email = ?";
                                                                $stmt = $conn->prepare($sql);
                                                                $stmt->bind_param("s", $d_name);
                                                                $stmt->execute(); 
                                                                $stmt->close(); 
                                                            }
                                                        }
                                                    ?> <!--================ END CODE ====================-->    
                                            </form>
                                        </div>
                                    </div>
                            </div>

                        </div>
                        <div class="col-xl-3"></div>

                    </div>
                    <!-------------------------------------------------------------------------------->
                    <div class="row pt-2">
                        <!------------------------- FORM ------------------------------------------------------------------>
                        <div class="col-xl-3"></div>
                        <div class="col-xl-6">
                            <!---------------------------- Doctor List ------------------------------------------------------------------>
                            <div class="pb-2">
                                    <div class="card shadow-lg bg-light">
                                        <div class="card-body">
                                            <form method = "post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" enctype="multipart/form-data">
                                                <!------------------------------- Nav Item ---------------------------------------->
                                                <h4 style="font-family: Times New Roman, Times, serif" class="text-center pt-1 pb-1">Mobile Number</h4>
                                                <div class="row">
                                                    <div class="col-md-9 pb-2">
                                                        <input type="text" class="form-control"  placeholder="Enter Mobile Number" name="d_name">
                                                        <span><?php echo $d_nameErr; ?></span> 
                                                    </div>
                                                    <!---------------------------------- Button------------------------------------------->
                                                    <div class="col-md-3">
                                                        <input type="submit" class="btn btn-secondary" name="delete_mbl" value="Delete"></input>
                                                    </div>
                                                </div>
                                                    <?php //====== PHP CODE ===============================>
                                                        if (isset($_POST['delete_mbl'])){
        
                                                            if (empty($_POST["d_name"])) {
                                                                $d_nameErr = "Your message is required";
                                                                $d_nameb = "false";
                                                            } else {
                                                                $d_name = $_POST["d_name"];
                                                                $d_nameb = "true";

                                                                $sql = "DELETE FROM contact_mbl WHERE mbl = ?";
                                                                $stmt = $conn->prepare($sql);
                                                                $stmt->bind_param("s", $d_name);
                                                                $stmt->execute(); 
                                                                $stmt->close(); 
                                                            }
                                                        }
                                                    ?> <!--================ END CODE ====================-->    
                                            </form>
                                        </div>
                                    </div>
                            </div>

                        </div>
                        <div class="col-xl-3"></div>

                    </div>
                    
                </div>
                <!-- END -->

            </div>    
            <!-- /.container-fluid -->
        </div>
        <!------------------ Content Wrapper END ------------------------------------>
    </div>
                
</div>
<!---------------------------------- Footer -------------------------------------->
<div id="footer"></div>
</div>

<!--PHP CODE ===================================================-->
<?php CloseCon($conn); ?> 
<!--//PHP CODE END ==================================================-->
</body>
</html>