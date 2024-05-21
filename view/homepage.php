<html>
<head>
  <title>home</title>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<link href="../view/css/admin.css" rel="stylesheet">
</head>
 
 <body>
    <link href="../view/css/homepage.css" rel="stylesheet">
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <div class="container-fluid">
          <a class="navbar-brand" href="#"> travarse</a>
          <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>
          <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
              <li class="nav-item">
                <a class="nav-link active" aria-current="page" href="home">Home</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="#video">videos</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="#city">City</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="#catgory">catgory</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="#faq">FAQ</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="#contact">Contact us</a>
              </li>
            </ul>
              <button class="btn btn-outline-success" onclick="sign()">Sign up</button>
          </div>
        </div>
      </nav>
      <br>
      <section id="home">
        <div id="intro" class="bg-image shadow-2-strong">
            <div class="mask" style="background-color: rgba(0, 0, 0, 0.8);">
              <div class="container d-flex align-items-center justify-content-center text-center h-100">
                <div class="text-white" data-mdb-theme="dark" id="start">
                  <h4 class="mb-3"><strong> Discover New Place</strong> </h4>
                  <p class="mb-4">Plan  your perfect trip with expert,travel tips, destination</p><p> information and inspiration from us.</p>
                  <center> 
                    <div class="card" style="width:300px; display:none;" id="sign">
                      <img class="card-img-top" src="../view/city/login.jpg" alt="Card image">
                      <div class="card-img-overlay">
                        <h4 class="card-title">Sign Up</h4>
                        <form method="post"> 
                        <input class="card-text" type="text" placeholder="Enter name" style="color:white;" name="username">
                        <br>
                        <input class="card-text" type="email" placeholder="Enter email" style="color:white;" name="email">
                        <br>
                        <input class="card-text" type="text" placeholder="Enter password" style="color:white;" name="password">
                        <br>
                        <br>
                        <input type="submit" class="btn btn-outline-success" name="submit" value="Sign UP">
                        <button  onclick="close()" class="btn btn-outline-danger">cancel</button>
                      </form>
                      </div>
                    </div>
                    <div class="card" style="width:300px; display:none;" id="login">
                      <img class="card-img-top" src="../view/city/login.jpg" alt="Card image">
                      <div class="card-img-overlay">
                        <h4 class="card-title">Sign In</h4>
                        <form method="post"> 
                        <input class="card-text" type="email" placeholder="Enter email" style="color:white;" name="emails">
                        <br>
                        <input class="card-text" type="text" placeholder="Enter password" style="color:white;" name="passwords">
                        <br>
                        <br>
                        <input type="submit" class="btn btn-outline-success" name="submit" value="Sign in">  
                        <button  onclick="closee()" class="btn btn-outline-danger">cancel</button>
                      </form>
                      </div>
                    </div>
                  </center>
                  <button class="btn btn-outline-success btn-lg m-2"  onclick="login()"data-target="#signup" id="startcampain" >Sign In</button>
                </div>
              </div>
            </div>
          </div>  
      </section>
       <?php require("C:/xampp/htdocs/touriset/control/control.php");?>
      <br>
      <section id="city">
       <center>  <h5 style="color:blue;">Amazing places to enjoy your travel</h5>
        <hr style="width:25%;height:2px;color:white"></center>
        <div class="row"> 
          <?php 
          require("C:/xampp/htdocs/touriset/control/db-conn.php");
          $s="SELECT   `city`,`place_img` FROM `places` WHERE 1;";
          $r = mysqli_query($conn, $s);
          if ($r) { // Check if query was successful
            while ($row = mysqli_fetch_assoc($r))
          { ?>
        <div class="col-sm-2"> 
        <figure>
            <img src="../view/city/<?php echo $row['place_img']; ?>" class="rounded" alt="egypt" style="width: 200px; height:200px; margin:2%;">
            <center> <figcaption style="margin: 2%;"><a class="btn btn-outline-primary"href="searching.php?place=<?php echo $row['city']; ?>"><?php echo $row['city']; ?></a></figcaption></center>
            </figure>
        </div>
<?php }}?>
        </div>
       
      </section>
      <br>
      <br>
      <section id="video">
    <center>
        <h4 style="color:blue;">video representation</h4>
        <hr style="width:25%;height:2px;color:white">
    </center>
    <div id="carouselExampleIndicators" class="carousel slide" data-bs-ride="carousel">
        <div class="carousel-inner">
            <?php
            require("C:/xampp/htdocs/touriset/control/db-conn.php");
            $s = "SELECT `video` FROM `places` WHERE 1;";
            $r = mysqli_query($conn, $s);
            if ($r) { // Check if query was successful
                $active = true; // Variable to mark the first item as active
                while ($row = mysqli_fetch_assoc($r)) {
            ?>
                <div class="carousel-item <?php if ($active) { echo 'active'; $active = false; } ?>">
                    <center>
                        <video controls autoplay>
                            <source src="../view/video/<?php echo $row['video']; ?>" type="video/mp4" style="width: 100%; height:25%;">
                        </video>
                    </center>
                </div>
            <?php
                }
            }
            ?>
        </div>
        <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Previous</span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Next</span>
        </button>
    </div>
</section>

     <br>
     <br>
     <section id="catgory">
        <center><h5 style="color:blue;">travel categories</h5>
        <hr style="width:25%;height:2px;color:white;">
        <p>Maecenas et eros non quam ultricies interdum. Proin ac dolor vel neque ullamcorper blandit vitae et felis.</p><p> Morbi ante urna,imperdiet vel neque vitae, porta ullamcorper metus. Quisque bibendum venenatis eros sed commodo.</p><p> Nullam ultrices tortor non diam ullamcorper auctor In urna tellus, auctor sit amet est ut, scelerisque volutpat diam.</p></center>
        <div class="row"> 
          <?php
           $s="SELECT DISTINCT `catgory`, `catgory_img` FROM `places` WHERE 1";
           $r = mysqli_query($conn, $s);
           if ($r) { // Check if query was successful
             while ($row = mysqli_fetch_assoc($r))
           { 
          ?>
        <div class="col-sm-2"> 
        <figure>
            <img src="../view/catgory/<?php echo $row['catgory_img']; ?>" class="rounded" alt="egypt" style="width: 200px; height:200px; margin:2%;">
            <center> <figcaption style="margin: 2%;"><a class="btn btn-outline-primary"href="searching.php?catgory=<?php echo $row["catgory"];?>"><?php echo $row["catgory"];?></a></figcaption></center>
            </figure>
        </div>
        <?php }}?>
         </div>
     </section>
     <br>
     <br>
     <section id="faq">
        <div class="container">
            <h3 class="text-center text mb-4">Frequently Asked Questions</h3>
            <div class="row justify-content-center">
                <div class="col-md-6">
                    <div class="input-group mb-3">
                        <input type="text" class="form-control" placeholder="Ask a question..." id="userQuestion">
                        <div class="input-group-append">
                            <button class="btn btn-primary" type="button" onclick="askQuestion()">Submit</button>
                        </div>
                    </div>
                </div>
            </div>
            <div id="answers" style="color:white;"></div>
        </div>
    </section>
    <script src="script/homepage.js"></script>
    <br>
    <br>
    <section id="contact">
        <div class="text-center py-4 align-items-center" id="contactus">
            <p>Contact travarse on social media</p>
            <a href="#" class="btn btn-primary m-1" role="button" data-mdb-ripple-init
               rel="nofollow" target="_blank">
               <i class="fa fa-telegram"></i>
            </a>
            <a href="#" class="btn btn-primary m-1" role="button" rel="nofollow" data-mdb-ripple-init
               target="_blank">
               <i class="fa fa-facebook"></i>
            </a>
            <a href="#" class="btn btn-primary m-1" role="button" rel="nofollow" data-mdb-ripple-init
               target="_blank">
               <i class="fa fa-whatsapp"></i>
            </a>
            <a href="#" class="btn btn-primary m-1" role="button" rel="nofollow" data-mdb-ripple-init
               target="_blank">
               <i class="fa fa-instagram"></i>
            </a>
          </div>
   </section>
</body>
</html>