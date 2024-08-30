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

<div>
  <!------------------------- 1st Navbar ------------------------------->
  <nav class="navbar navbar-expand-sm bg-light navbar-dark">
    <div class="container-fluid">
      <a class="navbar-brand" href="#">
      <?php
        $query = "SELECT * FROM display WHERE id = 9";
        $result = $conn->query($query);
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
        ?>
          <img src="./../../admin/navimg/<?php echo $row['filename']; ?>" style="width:150px; height: 100px" class="">
        <?php
            }
        }
      ?>                  
      </a>
      <ul class="navbar-nav">
        <figure>
          <?php
          $query = "SELECT * FROM display WHERE id = 9";
          $result = $conn->query($query);
          if ($result->num_rows > 0) {
              while ($row = $result->fetch_assoc()) {
          ?>
          <blockquote class="blockquote pt-3">
            <p><?php echo $row["description"]; ?></p>
          </blockquote>
          <figcaption class="blockquote-footer">
            <cite title="Source Title"><?php echo $row["title"]; ?></cite>
          </figcaption>
          <?php
              }
          }
          ?>
        </figure>
      </ul> 
      <h3 class="d-flex pr-3" style="font-family: Courier, monospace;">
        <mark class="rounded">Hotline: 999</mark>
      </h3>
    </div>
  </nav>

  <!--========================= 2nd Navbar =================================-->
  <nav class="navbar navbar-expand-sm bg-info navbar-dark">
    <div class="container-fluid">
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#collapsibleNavbar">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse justify-content-center" id="collapsibleNavbar">
        <ul class="navbar-nav">
        <?php
          $query = "SELECT * FROM navbar";
          $result = $conn->query($query); 
          if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {

        ?>              

        <li class="nav-item" data-mdb-ripple-init data-mdb-ripple-color="dark">
          <?php echo "<a class='nav-link text-dark btn btn-light btn-lg' href='$row[link]'> $row[navitem] </a>"; ?>
        </li>         
        <?php
            }
          }
        ?>     
        </ul>
      </div>
    </div>
  </nav>   
</div>        

</body>
</html>