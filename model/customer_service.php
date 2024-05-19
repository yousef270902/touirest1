<?php
class customer_service
{
    public function add($place, $city, $cityimg, $catgory, $catgoryimg, $link, $video, $description, $price) {
        require("C:/xampp/htdocs/touriset/control/db-conn.php");
    
        // Check if the place already exists
        $sql = "SELECT * FROM `places` WHERE `place`='$place'";
        $result = mysqli_query($conn, $sql);
    
        if ($result && mysqli_num_rows($result) > 0) {
            echo "<script>alert('Place found. Not inserting it again');</script>";
            return;
        } else {
                $sql1 = "INSERT INTO `places`(`id`, `place`, `city`, `place_img`, `catgory`, `catgory_img`, `link_destination`, `video`) 
                         VALUES (NULL, '$place', '$city', '$cityimg', '$catgory', '$catgoryimg', '$link', '$video')";
                $result1 = mysqli_query($conn, $sql1);
                $last_id = mysqli_insert_id($conn);
                $sql2 = "INSERT INTO `place_details`(`id`, `description`, `price`) 
                         VALUES ($last_id, '$description', $price)";
                $result2 = mysqli_query($conn, $sql2);
                echo "<script>
                        alert('Inserted successfully');
                        window.location.replace('admin.php');
                      </script>";
            }  
        }
    
    
    public function edit($place, $city, $link)
{
    require("C:/xampp/htdocs/touriset/control/db-conn.php");
     
    $sql = "SELECT * FROM `places` WHERE `place`='$place'";
    $result = mysqli_query($conn, $sql);

    if ($result && mysqli_num_rows($result) > 0) {
         
        $s = "UPDATE `places` SET `place`='$city', `link_destination`='$link' WHERE `place`='$place'";
        $r = mysqli_query($conn, $s);

        if ($r) {
            echo "<script>
                alert('Updated successfully');
                window.location.replace('admin.php');
            </script>";
        }  
    } 
    else
     {
    
        echo "<script>alert('Place not found');</script>";
     }
}

    public function delete($place)
    {
        require("C:/xampp/htdocs/touriset/control/db-conn.php");
     
    $sql = "SELECT * FROM `places` WHERE `place`='$place'";
    $result = mysqli_query($conn, $sql);

    if ($result && mysqli_num_rows($result) > 0) {
         
        $s = "DELETE FROM `places` WHERE `place`='$place'";
        $r = mysqli_query($conn, $s);

        if ($r) {
            echo "<script>
                alert('place Deleted');
                window.location.replace('admin.php');
            </script>";
        }  
    } 
    else
     {
    
        echo "<script>alert('Place not found');</script>";
     }

    }
}
?>