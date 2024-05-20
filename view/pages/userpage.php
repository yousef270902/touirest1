<html>
  <title>Filter</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css"> 
    <link href="../view/css/admin.css" rel="stylesheet">
<body>
    <section> 
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <div class="container-fluid">
          <a class="navbar-brand" href="#"> travarse</a>
          <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>
          <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
              <li class="nav-item">
                <a class="nav-link active" aria-current="page" href="homepage.php">Home</a>
              </li>
              <li class="nav-item">
                <button class="nav-link active" aria-current="page"  onclick="history()">history</a>
              </li>
              <li class="nav-item">
                <button class="nav-link" onclick="saved()">REQUEST</button>
              </li>
            </ul>
            <div id="catgory"> 
            <input type="text" onkeyup="filterTable()" id="searchInput" placeholder="Enter the place name">
            </div>
          </div>
        </div>
      </nav>
    </section>
    <br>
    <br>
       
<center> 
<?php
require("C:/xampp/htdocs/touriset/control/db-conn.php");

$s = ''; // Initialize the query string

{
    $s = "SELECT p.id, p.place, p.catgory, p.link_destination, pd.description, pd.price
          FROM places p
          JOIN place_details pd ON p.id = pd.id
          ORDER BY place ASC";
}  

$result = null;
if (!empty($s)) {
    $result = mysqli_query($conn, $s);
}
if (isset($_GET['email'])) {
    $email = $_GET['email'];
?>
<section id="viewbycategory" style="display:none;">
    <center>
        <p>Welcome: <input type="text" style="background:none;border:none; color:white; width:60%;" name="user" value="<?php echo $email;} ?>" readonly></p>
        <h5 style="color:blue;">Filter</h5>
        <input type="text" id="searchInput" onkeyup="filterTable()" placeholder="Search for places.." style="margin-bottom: 20px;">
        <hr style="width:25%;height:2px;color:white;">
        <table class="table table-striped" style="width:55%;" id="placesTable">
            <thead>
                <tr>
                    <th scope="col">id</th>
                    <th scope="col">place</th>
                    <th scope="col">save</th>
                    <th scope="col">category</th>
                    <th scope="col">more information</th>
                    <th scope="col">Location</th>
                </tr>
            </thead>
            <tbody>
            <?php 
            if (isset($_GET['email'])) {
                $email = $_GET['email'];
                if ($result) {
                    while ($row = mysqli_fetch_assoc($result)) { ?>
                       <form method="post">
                       <tr>
                             
                        <input type="text" style="background:none;border:none; color:white; width:60%; display:none;" name="user" value="<?php echo $email; ?>" readonly></p>
                            <td><input type="text" value="<?php echo $row['id']; ?>"style="background:none;border:none;"></td>
                            <td><input type="text" value="<?php echo $row['place']; ?>" style="background:none;border:none;" name="place_name"></td>
                            <td><input name="submit" type ="submit" class="btn btn-outline-primary" value="save"></td>
                            </form>
                            <td><?php echo $row['catgory']; ?></td>
                            <td>
                                <button class="btn btn-outline-primary" 
                                        onclick="showInfo('<?php echo $row['description']; ?>', '<?php echo $row['price']; ?>')">More Info</button>
                            </td>
                             
                            <td><a class="btn btn-outline-primary" href="<?php echo $row['link_destination']; ?>">GO</a></td>
                        </tr>
                         
                    <?php } }
                } else { ?>
                    <tr>
                        <td colspan="6">No results found</td>
                    </tr>
                <?php } ?>
                 
            </tbody>
        </table>
        <div class="card" style="width:400px; display:none; background-color: white;" id="information">
            <h4 class="card-title">More Info</h4>
            <h5 id="infoContent" style="color:blue;"></h5>
            <button onclick="closeInfo()" class="btn btn-danger">Cancel</button>
        </div>      
    </center>
</section>
<section id="history" style="display:none;">

<table class="table table-striped" style="width:55%;" id="placesTable">
            <thead>
                <tr>
                    <th scope="col">id</th>
                    <th scope="col">place</th>
                </tr>
            </thead>
            <tbody>
            <?php 
            if (isset($_GET['email'])) {
                $email = $_GET['email'];
                $s="SELECT `id`, `place_name` FROM `comment_rate` WHERE `user_email`='$email'";
                $r = mysqli_query($conn, $s);

            }
                if ($r) {
                    while ($row = mysqli_fetch_assoc($r)) { ?>
                       <form method="post">
                       <tr>
                            <td><?php echo $row['id']; ?></td>
                            <td><?php echo $row['place_name'];?></td>
                        </tr>
                         
                    <?php } } else { ?>
                    <tr>
                        <td colspan="6">No results found</td>
                    </tr>
                <?php } ?>
                 
            </tbody>
        </table>
        <div class="card" style="width:400px; display:none; background-color: white;" id="information">
            <h4 class="card-title">More Info</h4>
            <h5 id="infoContent" style="color:blue;"></h5>
            <button onclick="closeInfo()" class="btn btn-danger">Cancel</button>
        </div>      
    </center>
</section>
<br>
<br>
<section id="contact">
    <div class="text-center py-4 align-items-center" id="contactus">
        <p>Contact travarse on social media</p>
        <a href="#" class="btn btn-primary m-1" role="button" data-mdb-ripple-init rel="nofollow" target="_blank">
           <i class="fa fa-telegram"></i>
        </a>
        <a href="#" class="btn btn-primary m-1" role="button" rel="nofollow" data-mdb-ripple-init target="_blank">
           <i class="fa fa-facebook"></i>
        </a>
        <a href="#" class="btn btn-primary m-1" role="button" rel="nofollow" data-mdb-ripple-init target="_blank">
           <i class="fa fa-whatsapp"></i>
        </a>
        <a href="#" class="btn btn-primary m-1" role="button" rel="nofollow" data-mdb-ripple-init target="_blank">
           <i class="fa fa-instagram"></i>
        </a>
    </div>
</section>

<script>
function filterTable() {
    var input, filter, table, tr, td, i, j, txtValue;
    input = document.getElementById('searchInput');
    filter = input.value.toUpperCase();
    table = document.getElementById('placesTable');
    tr = table.getElementsByTagName('tr');

    for (i = 1; i < tr.length; i++) {
        tr[i].style.display = 'none'; // Hide the row initially
        td = tr[i].getElementsByTagName('td');
        for (j = 0; j < td.length; j++) {
            if (td[j]) {
                txtValue = td[j].textContent || td[j].innerText;
                if (txtValue.toUpperCase().indexOf(filter) > -1) {
                    tr[i].style.display = ''; // Show the row if any cell matches
                    break;
                }
            }
        }
    }
}

function showInfo(description, price) {
    document.getElementById('infoContent').innerText = "Description: " + description + "\nPrice: " + price;
    document.getElementById('information').style.display = 'block';
}

function closeInfo() {
    document.getElementById('information').style.display = 'none';
}
function history()
{
    document.getElementById('history').style.display = 'block';  
    document.getElementById('viewbycategory').style.display = 'none'; 
}
function saved()
{
    document.getElementById('history').style.display = 'none';  
    document.getElementById('viewbycategory').style.display = 'block'; 
}
</script>

 
<?php require("C:/xampp/htdocs/touriset/control/control.php"); ?>
</body>
</html>
