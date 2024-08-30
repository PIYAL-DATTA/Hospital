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


<div class="container mt-5">
  <h2 style="font-family: Times New Roman, Times, serif" class="text-center mb-5"> Doctors </h2>
  <div class="row">
  <?php

    $sql = "SELECT * FROM doctorlist";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
      while ($row = $result->fetch_assoc()) {
        /*$doctor_name = $row["name"];
        $about = $row["description"];
        $link = $row["link"];*/
  ?>
        <div class="col-lg-4 pb-4">
          <div class="card" style="width:100%">
              <img class="card-img-top" src="./../../admin/doctorimg/<?php echo $row['filename']; ?>" alt="Card image" style="width:100%">
              <div class="card-body">
                <h4 class="card-title"><?php echo $row["name"]; ?></h4>
                <p class="card-text" style="font-family: Times New Roman, Times, serif; text-align: justify; text-justify: inter-word">
                  <?php echo $row["description"]; ?>
                </p>
                <?php echo "<a href='$row[link]' class='btn btn-primary'> See Profile</a>"; ?> 
                
              </div>
          </div>
        </div>
  <?php
      }
    }
  ?>

  </div>
</div>


</body>
</html>