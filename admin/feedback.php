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
    $("#doctorlist").load("doctorlist.php");
    $("#servicelist").load("servicelist.php");   
  }); 
  </script>

</head>
<body>

<?php //PHP CODE ==================================================>
include 'db_connection.php';
$conn = OpenCon();
//echo "Connected Successfully";
?> <!--//PHP CODE END ==================================================-->
<!-- Content Wrapper -->
<div id="wrapper">
    <!---------------------------------- NAVBAR -------------------------------------->
    <div id="navbar"></div>
    <!---------------------------------- FEEDBACK -------------------------------------->
    <!-- Content Wrapper -->
    <div id="content-wrapper" class="d-flex flex-column">
      <!-- DataTales Example -->
      <div class="card shadow mb-4">
        <div class="card-header py-3">
          <h6 class="m-0 font-weight-bold text-primary">DataTables Example</h6>
        </div>
        <div class="card-body">
          <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
              <thead>
                <tr>
                  <th>Name</th>
                  <th>Email</th>
                  <th>Subject</th>
                  <th>Text</th>
                  <th>Actions</th>                           
                </tr>
              </thead>
              <tfoot>
                <tr>
                  <th>Name</th>
                  <th>Email</th>
                  <th>Subject</th>
                  <th>Text</th>
                  <th>Actions</th>
                </tr>
              </tfoot>
              <tbody>
              <?php // PHP CODE FOR FEEDBACK =====================================>
                $sql = "SELECT * FROM feedback";
                $result = $conn->query($sql);

                if ($result->num_rows > 0) {
                  // output data of each row
                  while ($row = $result->fetch_assoc()) {
                    $id = $row["id"];
                    $name = $row["name"];
                    $email = $row["email"];
                    $subject = $row["subject"];
                    $text = $row["feedback"];                                                       
                    // <!-- Printing Table -->
                    echo "
                    <tr>
                      <td>$name</td>
                      <td>$email</td>
                      <td> $subject</td>
                      <td>$text</td>
                      <td class='text-center'>                                           
                        <a type='submit' class='btn btn-outline-primary' data-mdb-ripple-init data-mdb-ripple-color='dark' name='edit'
                        href='/hospital/admin/edit.php?id=$row[id]' data-bs-toggle='modal' data-bs-target='#myModal'>Edit</a>
                                                
                        <a type='submit' class='btn btn-outline-danger' data-mdb-ripple-init data-mdb-ripple-color='dark' name='delete'
                        href='/hospital/admin/delete.php?user_id=$row[id]'>Delete
                        </a>                                               
                      </td>
                    </tr>
              " ;} } ?>
              </tbody>
            </table>
          </div>
        </div>
      </div>

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