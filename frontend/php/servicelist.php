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

<div class="card mt-5 container bg-light shadow-lg">
    <div class="card-body">
        <h2 style="font-family: Times New Roman, Times, serif" class="text-center pt-3 pb-4"> Services </h2>
        <div class="row">
            <div class="col-xl-7 text-center pt-5 pb-5">
                <div class="d-flex justify-content-around">
                <div class="row">
                <?php

                $sql = "SELECT * FROM servicelist";
                $result = $conn->query($sql);
                //Number of row
                //$rowcount = $result->num_rows;
                $rowcount = mysqli_num_rows( $result );

                if ($result->num_rows > 0) {
                  while ($row = $result->fetch_assoc()) {
                    $name = $row["name"];
                    $link = $row["link"];
                ?>
                    
                      <div class="col-md-4 text-center">
                        <img src="./../../admin/serviceimg/<?php echo $row['filename']; ?>" style="height: 10vh">
                        <?php echo "<a href='$link'> $name </a>"; ?>
                      </div>
                    
                    
                    <?php
                    }
                  }                                    

                  ?>
                  </div>
                </div>
            </div>
            <div class="col-xl-5 text-center">
            <?php
              $query = "SELECT * FROM display WHERE id = 8";
              $result = $conn->query($query);
              if ($result->num_rows > 0) {
                  while ($row = $result->fetch_assoc()) {
              
            ?>
                <img class="rounded" src="./../../admin/serviceimg/<?php echo $row['filename']; ?>" style="width: 100%">
            <?php
                  }
                }
            ?>
            </div>
        </div>
    </div>
</div>

</body>
</html>