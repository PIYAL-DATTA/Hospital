<!DOCTYPE html>
<html lang="en">
<head>
  <title>Hospital</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>


</head>
<body>

<!------------------------ Navbar ----------------------------->

<nav class="navbar navbar-expand-sm bg-primary navbar-dark fixed-top">
  <div class="container-fluid">
    <a class="navbar-brand" href="#">
      <img src="\hospital\frontend\assets\logo\logo.png" alt="Logo" style="width:50px;" class="rounded-pill">
    </a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#collapsibleNavbar">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="collapsibleNavbar">
      <ul class="navbar-nav">
        <li class="nav-item">
          <a class="nav-link text-dark" href="#">Home</a>
        </li>
        <li class="nav-item">
          <a class="nav-link text-dark" href="#">About Us</a>
        </li>
        <li class="nav-item">
          <a class="nav-link text-dark" href="#">Services</a>
        </li>
        <li class="nav-item">
          <a class="nav-link text-dark" href="#">Doctors</a>
        </li> 
        <li class="nav-item">
          <a class="nav-link text-dark" href="#">Contact Us</a>
        </li>      
      </ul>
    </div>
  </div>
</nav>

<!--------------------------- Carousel -------------------------------------->
<div id="demo" class="carousel slide" data-bs-ride="carousel">

  <!-- Indicators/dots -->
  <div class="carousel-indicators">
    <button type="button" data-bs-target="#demo" data-bs-slide-to="0" class="active"></button>
    <button type="button" data-bs-target="#demo" data-bs-slide-to="1"></button>
    <button type="button" data-bs-target="#demo" data-bs-slide-to="2"></button>
  </div>
  
  <!-- The slideshow/carousel -->
  <div class="carousel-inner">
    <div class="carousel-item active">
      <img src="https://w0.peakpx.com/wallpaper/315/432/HD-wallpaper-medical-hospital.jpg" alt="Los Angeles" class="d-block" style="width:100%; height: 600px">
      <div class="carousel-caption">
        <h3>Los Angeles</h3>
        <p>We had such a great time in LA!</p>
      </div>
    </div>
    <div class="carousel-item">
      <img src="\hospital\frontend\assets\carousel\c1.jpg" alt="Chicago" class="d-block" style="width:100%; height: 600px">
      <div class="carousel-caption">
        <h3>Chicago</h3>
        <p>Thank you, Chicago!</p>
      </div> 
    </div>
    <div class="carousel-item">
      <img src="\hospital\frontend\assets\carousel\c2.jpg" alt="New York" class="d-block" style="width:100%; height: 600px">
      <div class="carousel-caption">
        <h3>New York</h3>
        <p>We love the Big Apple!</p>
      </div>  
    </div>
  </div>
  
  <!-- Left and right controls/icons -->
  <button class="carousel-control-prev" type="button" data-bs-target="#demo" data-bs-slide="prev">
    <span class="carousel-control-prev-icon"></span>
  </button>
  <button class="carousel-control-next" type="button" data-bs-target="#demo" data-bs-slide="next">
    <span class="carousel-control-next-icon"></span>
  </button>
</div>

<!-------------------------- About Us ------------------------------------------>

<div class="container">
    <div class="row pt-5">
        <div class="col-xl-6">
            <img src="\hospital\frontend\assets\carousel\c4.jpg" style="width: 80vh; border-radius: 10px">
        </div>
        <div class="col-xl-6">
            <h3 style="font-family: Times New Roman, Times, serif"> Header </h3>
            <p style="font-family: Arial, Helvetica, sans-serif; font-size: 15px">
            Improve Writing For writers looking for a way to get their creative writing juices flowing, using a random paragraph can be a great way to do this. One of the great benefits of this tool is that nobody knows what is going to appear in the paragraph. This can be leveraged in a few different ways to force the writer to use creativity. For example, the random paragraph can be used as the beginning paragraph of a story that the writer must finish. I can also be used as a paragraph somewhere inside a short story, or for a more difficult creative challenge, it can be used as the ending paragraph. In every case, the writer is forced to use creativity to incorporate the random paragraph into the story.
            </p>
            <a href="#" style="font-family: Arial, Helvetica, sans-serif; font-size: 15px">Readmore</a>
        </div>
    </div>
</div>

<!-------------------------- Services ------------------------------------------>

<div class="card mt-5 container bg-light shadow-lg">
    <div class="card-body">
        <h2 style="font-family: Times New Roman, Times, serif" class="text-center pt-3 pb-4"> Services </h2>
        <div class="row">
            <div class="col-xl-7 text-center pt-5 pb-5">
                <div class="d-flex justify-content-around">
                    <div>
                        <img src="\hospital\frontend\assets\logo\logo.png" style="height: 10vh">
                        <p><a href="#">Surgery</a></p>
                    </div>
                    <div>
                        <img src="\hospital\frontend\assets\logo\logo.png" style="height: 10vh">
                        <p><a href="#">Surgery</a></p>
                    </div>
                    <div>
                        <img src="\hospital\frontend\assets\logo\logo.png" style="height: 10vh">
                        <p><a href="#">Surgery</a></p>
                    </div>
                </div>
                <div class="d-flex justify-content-around">
                    <div>
                        <img src="\hospital\frontend\assets\logo\logo.png" style="height: 10vh">
                        <p><a href="#">Surgery</a></p>
                    </div>
                    <div>
                        <img src="\hospital\frontend\assets\logo\logo.png" style="height: 10vh">
                        <p><a href="#">Surgery</a></p>
                    </div>
                    <div>
                        <img src="\hospital\frontend\assets\logo\logo.png" style="height: 10vh">
                        <p><a href="#">Surgery</a></p>
                    </div>
                </div>
            </div>
            <div class="col-xl-5 text-center">
                <img src="\hospital\frontend\assets\carousel\c4.jpg" style="width:100%">
            </div>
        </div>
    </div>
</div>

<!---------------------------- Doctors ----------------------------------->

<div class="container mt-5">
<h2 style="font-family: Times New Roman, Times, serif" class="text-center mb-5"> Doctors </h2>
    <div class="row">
            <div class="col-lg-4 pb-4">
                <div class="card" style="width:100%">
                    <img class="card-img-top" src="\hospital\frontend\assets\doctor\doctor.jpg" alt="Card image" style="width:100%">
                    <div class="card-body">
                        <h4 class="card-title">John Doe</h4>
                        <p class="card-text">Some example text some example text. John Doe is an architect and engineer</p>
                        <a href="#" class="btn btn-primary">See Profile</a>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 pb-4">
                <div class="card" style="width:100%">
                    <img class="card-img-top" src="\hospital\frontend\assets\doctor\doctor.jpg" alt="Card image" style="width:100%">
                    <div class="card-body">
                        <h4 class="card-title">John Doe</h4>
                        <p class="card-text">Some example text some example text. John Doe is an architect and engineer</p>
                        <a href="#" class="btn btn-primary">See Profile</a>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 pb-4">
                <div class="card" style="width:100%">
                    <img class="card-img-top" src="\hospital\frontend\assets\doctor\doctor.jpg" alt="Card image" style="width:100%">
                    <div class="card-body">
                        <h4 class="card-title">John Doe</h4>
                        <p class="card-text">Some example text some example text. John Doe is an architect and engineer</p>
                        <a href="#" class="btn btn-primary">See Profile</a>
                    </div>
                </div>
            </div>
    </div>
</div>

<!--------------------------- contact ------------------------------------------->
<div class="container">
    <h2 style="font-family: Times New Roman, Times, serif" class="text-center mt-5 mb-3"> Contact </h2>
    <div class="row">
        <div class="col-xl-6">
            <div class="row">
                <div class="col-xl-12  pb-3">
                    <div class="card">
                        <div class="card-body text-center">
                            <p>Address</p>
                            <p>Address</p>
                            <p>Address</p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-xl-6">
                    <div class="card">
                        <div class="card-body text-center">
                            <p>Address</p>
                            <p>Address</p>
                        </div>
                    </div>
                </div>
                <div class="col-xl-6">
                    <div class="card">
                        <div class="card-body text-center">
                            <p>Address</p>
                            <p>Address</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-xl-6">
            <div class="card">
                <div class="card-body">
                </div>
            </div>
        </div>
    </div>
</div>

</body>
</html>
