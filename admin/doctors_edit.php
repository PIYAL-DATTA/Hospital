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
$header = $paragraph = $link = "";
$headerErr = $paragraphErr = "";
$headerb = $paragraphb = "false";
$d_headerErr = "";
$use = "false";

$navitem = $d_navitem =  "";
$navitemErr = $d_navitemErr = $linkErr = "";
$pre_name = "";
?> <!--//PHP CODE END ==================================================-->

<!-- Content Wrapper -->
<div id="wrapper">
    <!---------------------------------- NAVBAR -------------------------------------->
    <div id="navbar"></div>
    <!---------------------------------- FEEDBACK -------------------------------------->
    <!-- Content Wrapper -->
    <div id="content-wrapper" class="d-flex flex-column">
        <!---------------------- NAVBAR Modification -------------------------------->
            <!-- Begin Page Content -->
            <div class="container-fluid">

                <!-- Page Heading -->
                <!--------------------------- Home ------------------------------------------->
                <div class="container text-center">
                    <h2 style="font-family: Times New Roman, Times, serif" class="text-center pt-3 pb-3">About Doctors</h2>
                    <div class="row">
                        <!------------------------- FORM ------------------------------------------------------------------>
                            <div class="col-xl-3"></div>
                            <div class="col-xl-6">
                                <!----------------- Image ------------------------------------------------------->
                                <div class="pb-2">
                                    <div class="card shadow-lg bg-light">
                                        <div class="card-body">
                                            <form method = "post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" enctype="multipart/form-data">
                                                <div class="row">
                                                    <h4 style="font-family: Times New Roman, Times, serif" class="text-center pt-1 pb-1">Image</h4>
                                                    <div class="col-md-9 pb-2">
                                                        <input class="form-control" type="file" name="uploadfile" value="" />
                                                    </div>
                                                    <?php //====== PHP CODE for Uploading Image ========================>
                                                    if (isset($_POST['upload'])) {

                                                        $filename = $_FILES["uploadfile"]["name"];
                                                        $tempname = $_FILES["uploadfile"]["tmp_name"];
                                                        $folder = "./doctorimg/".$filename;
                                                        //Setting file new destination
                                                        // Get all the submitted data from the form
                                                        $sql = "UPDATE display SET filename = '$filename' WHERE id = 7";

                                                        // Execute query
                                                        mysqli_query($conn, $sql);
                                                        move_uploaded_file($tempname, $folder);
                                                    }
                                                    ?>
                                                    <!---------------------------------- Button------------------------------------------->
                                                    <div class="col-md-3">
                                                        <input class="btn btn-secondary" type="submit" name="upload" value="Upload"></input>
                                                    </div>
                                                </div>    
                                            </form>
                                        </div>
                                    </div>
                                </div>
                                <!------------------------------- About Hospital Doctors ---------------------------------------->
                                <div class="pb-2">
                                    <div class="card shadow-lg bg-light">
                                        <div class="card-body">
                                            <form method = "post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" enctype="multipart/form-data">
                                                
                                                <h4 style="font-family: Times New Roman, Times, serif" class="text-center pt-1 pb-1">About Info</h4>
                                                <div class="col-md-12 pb-3">
                                                    <input type="text" class="form-control"  placeholder="Enter header" name="header">
                                                    <span><?php echo $headerErr; ?></span> 
                                                </div>
                                                <div class="col-md-12 pb-3">
                                                    <input type="text" class="form-control" placeholder="Enter text..." name="paragraph">
                                                    <span><?php echo $paragraphErr; ?></span>
                                                </div>
                                                    <!---------------------------------- Button------------------------------------------->
                                                <div class="text-center pb-3"> 
                                                    <input type="submit" class="btn btn-secondary" name="insert" value="insert"></input>
                                                </div>

                                                <?php //=============== PHP CODE for About US ================>
                                                if (isset($_POST['insert'])){

                                                    if (empty($_POST["header"])) {
                                                        $headerErr = "Your message is required";
                                                        $headerb = "false";
                                                    } else {
                                                        $header = $_POST["header"];
                                                        $headerb = "true";
                                                    }
                                                    if (empty($_POST["paragraph"])) {
                                                        $paragraphErr = "Your message is required";
                                                        $paragraphb = "false";
                                                    } else {
                                                        $paragraph = $_POST["paragraph"];
                                                        $paragraphb = "true";
                                                    }

                                                    if($headerb == "true" && $paragraphb == "true"){
                                                        $sql = "UPDATE display SET title = '$header', description = '$paragraph' WHERE id = 7";
                                                        // Execute query
                                                        mysqli_query($conn, $sql);
                                                    }
                                                }  
                                                ?><!---------------------------- End PHP CODE ------------------------------------> 
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