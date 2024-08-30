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
                    <h2 style="font-family: Times New Roman, Times, serif" class="text-center pt-3 pb-3"> Navigation </h2>
                    <div class="row">
                    <div class="col-xl-6">
                                <!---------------------------- Nav Quotes ------------------------------------------------------------------>
                                <div class="pb-2">
                                    <div class="card shadow-lg bg-light">
                                        <div class="card-body">
                                            <form method = "post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" enctype="multipart/form-data">
                                                <!------------------------------- Nav Item ---------------------------------------->
                                                <h4 style="font-family: Times New Roman, Times, serif" class="text-center pt-1 pb-1">Nav Quotes</h4>
                                                <div class="row">
                                                    <div class="col-md-12 pb-3">
                                                        <input type="text" class="form-control"  placeholder="Enter title..." name="title" value="">
                                                        <span><?php echo $headerErr; ?></span> 
                                                    </div>
                                                    <div class="col-md-12 pb-3">
                                                        <input type="text" class="form-control"  placeholder="Enter Quota..." name="quotes" value="">
                                                        <span><?php echo $paragraphErr; ?></span> 
                                                    </div>
                                                    <!---------------------------------- Button------------------------------------------->
                                                    <div class="text-center">
                                                        <input type="submit" class="btn btn-secondary" name="insert" value="insert"></input>
                                                    </div>
                                                    <?php // ================ Nav Quotes Insert ========================================>
                                                    if (isset($_POST['insert'])){
                                                        $header = $_POST["title"];
                                                        $paragraph = $_POST["quotes"];

                                                        if(empty($header) && empty($paragraph)) {
                                                            $headerErr = "Title required";
                                                            $paragraphErr = "QUOTES required";
                                                        } else {
                                                            $sql = "UPDATE display SET title = '$header', description = '$paragraph' WHERE id = 9";
                                                            // Execute query
                                                            mysqli_query($conn, $sql);
                                                        }
                                                    }
                                                    ?>
                                                </div>    
                                            </form>
                                        </div>
                                    </div>
                                </div>
                        </div>
                        
                        <div class="col-xl-6">
                            <!---------------------------- Nav Items ------------------------------------------------------------------>
                            <div class="pb-2">
                                    <div class="card shadow-lg bg-light">
                                        <div class="card-body">
                                            <form method = "post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" enctype="multipart/form-data">
                                                <!------------------------------- Nav Item ---------------------------------------->
                                                <h4 style="font-family: Times New Roman, Times, serif" class="text-center pt-1 pb-1">Nav Items</h4>
                                                <div class="row">
                                                    <div class="col-md-12 pb-3">
                                                        <input type="text" class="form-control"  placeholder="Enter Nav items..." name="navitem" value="">
                                                        <span><?php echo $navitemErr; ?></span> 
                                                    </div>
                                                    <div class="col-md-12 pb-3">
                                                        <input type="text" class="form-control"  placeholder="Enter link..." name="link" value="">
                                                        <span><?php echo $linkErr; ?></span> 
                                                    </div>
                                                    <!---------------------------------- Button------------------------------------------->
                                                    <div class="text-center">
                                                        <input type="submit" class="btn btn-secondary" name="navinsert" value="insert"></input>
                                                    </div>
                                                    <?php // ================ Nav Item Insert ========================================>
                                                    if (isset($_POST['navinsert'])){
                                                        $navitem = $_POST["navitem"];
                                                        $link = $_POST["link"];

                                                        if(empty($navitem) && empty($link)) {
                                                            $navitemErr = "Nav item name required";
                                                            $linkErr = "Link required";
                                                        } else {
                                                            $sql = "SELECT * FROM navbar";
                                                            $result = $conn->query($sql);
                                                            if ($result->num_rows > 0) {
                                                                while ($row = $result->fetch_assoc()) {
                                                                //$prev_name = $row["navitem"];
                                                                    if($row["navitem"] == $navitem) {
                                                                        $use = "true";
                                                                        $navitemErr = "Already exist";
                                                                    }                           
                                                                }
                                                            }
                                                            if ($use != "true") {
                                                                $stmt = $conn->prepare("INSERT INTO navbar (navitem, link) VALUES (?, ?)");
                                                                $stmt->bind_param("ss", $navitem, $link);
                                                                $stmt->execute();
                                                                $stmt->close();
                                                            }
                                                        }
                                                    }
                                                    ?>
                                                </div>    
                                            </form>
                                        </div>
                                    </div>
                            </div>
                        </div>
                         <!----------------- Div ROW END --------------------------> 
                    </div>
                    <div class="row">
                        <div class="col-xl-3"></div>
                            <!------------------------- FORM ------------------------------------------------------------------>
                        <div class="col-xl-6">
                            <!----------------------------- Navbar Logo ------------------------------------------------------->
                            <div class="pb-2">
                                <div class="card shadow-lg bg-light">
                                    <div class="card-body">
                                        <form method = "post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" enctype="multipart/form-data">
                                            <div class="row">
                                                <h4 style="font-family: Times New Roman, Times, serif" class="text-center pt-1 pb-1">Navbar Logo</h4>
                                                <div class="col-md-9 pb-2">
                                                    <input class="form-control" type="file" name="logouploadfile" value="" />
                                                </div>
                                                <?php //=========== PHP CODE for Logo upload ==========================>
                                                // If upload button is clicked ...
                                                if (isset($_POST['logoupload'])) {

                                                    $filename = $_FILES["logouploadfile"]["name"];
                                                    $tempname = $_FILES["logouploadfile"]["tmp_name"];
                                                    $folder = "./navimg/".$filename;
                                                    //Setting file new destination
                                                    // Get all the submitted data from the form
                                                    $sql = "UPDATE display SET filename = '$filename' WHERE id = 9";

                                                    // Execute query
                                                    mysqli_query($conn, $sql);
                                                }
                                                ?> <!--=========== PHP CODE END ==========================-->
                                                <!---------------------------------- Button------------------------------------------->
                                                <div class="col-md-3">
                                                    <input class="btn btn-secondary" type="submit" name="logoupload" value="Upload"></input>
                                                </div>
                                            </div>    
                                        </form>
                                    </div>
                                </div>
                            </div>
                            <!------------------ Delete Nav item ---------------------------------------------------------->
                            <div class="pb-2">
                                <div class="card shadow-lg bg-light">
                                    <div class="card-body">
                                        <form method = "post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" enctype="multipart/form-data">
                                            <div class="row">
                                                <h4 style="font-family: Times New Roman, Times, serif" class="text-center pt-1 pb-1">Delete Nav item</h4>
                                                <div class="row">
                                                    <div class="col-md-10 pb-2">
                                                        <input type="text" class="form-control"  placeholder="Enter Nav item name" name="d_navitem">
                                                        <span><?php echo $d_navitemErr ?></span> 
                                                    </div>
                                                    <!---------------------------------- Button------------------------------------------->
                                                    <div class="col-md-2">
                                                        <input type="submit" class="btn btn-secondary" name="delete" value="Delete"></input>
                                                    </div>
                                                    <?php
                                                    //=============== PHP CODE for Delete ====================
                                                    if (isset($_POST['delete'])) {
                                                        if(empty($_POST["d_navitem"])) {
                                                            $d_navitemErr = "Value required...";
                                                        } else { 
                                                            $d_navitem = $_POST["d_navitem"];
                                                    
                                                                $sql = "DELETE FROM navbar WHERE navitem = ?";
                                                                $stmt = $conn->prepare($sql);
                                                                $stmt->bind_param("s", $d_navitem);
                                                                $stmt->execute(); 
                                                                $stmt->close(); 
                                                        }   
                                                    }
                                                    ?>
                                                </div>
                                            </div>    
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