<?php
class user{
    public function register($username,$email,$password)
    {
         
        require("C:/xampp/htdocs/touriset/control/db-conn.php");
        $sql ="SELECT * FROM `users` WHERE `email`='$email'";
        $result = mysqli_query($conn, $sql);
    
        if ($result && mysqli_num_rows($result) > 0)
         {
            echo "<script>alert('Login . user found');</script>";
            return;
         }
        else
         {
            $pass = hash('sha256', $password);
             
            $s="INSERT INTO `users`(`id`, `username`, `email`, `password`)VALUES (NULL,'$username','$email','$pass')";
            $r = mysqli_query($conn, $s);
            if($r)
            {
                echo"<script>
                alert('inserted successfully');
                window.location.replace('userpage.php?email=$email');
                </script>";

            }
         }
    }
public function login($emails, $password)
{

    $adminEmail = "admin@traverse.com";
    $adminPassword = "traverse";
    
    if (($emails == $adminEmail && $password == $adminPassword) || ($emails == "admin3@traverse.com" && $password == $adminPassword)) {
        $redirect = 'admin.php';
        echo "<script>window.location.replace('$redirect');</script>";
    } else {
        $hashedPassword = hash('sha256', $password);
    
        // Establish database connection
        require("C:/xampp/htdocs/touriset/control/db-conn.php");
        // Perform user authentication using database
        $sql = "SELECT * FROM `users` WHERE `email` = '$emails' AND `password` = '$hashedPassword'";
        $result = mysqli_query($conn, $sql);
    
        if ($result && mysqli_num_rows($result) > 0) {
            // If user found, redirect to history.php
        setcookie('isAuthenticated', 'true', time() + (86400 * 30), "/"); // 86400 = 1 day
        $_COOKIE['isAuthenticated'] = 'true';
            $redirect = "userpage.php?email=$emails";
            echo "<script>window.location.replace('$redirect');</script>";
        } else {
            // If user not found, display alert and redirect to homepage.php
            echo "<script>alert('Please sign up and login again.');</script>";
            echo "<script>window.location.replace('homepage.php');</script>";
        }
    
        // Close database connection
        mysqli_close($conn);
    }
}
public function saving($place,$userss)
{
    require("C:/xampp/htdocs/touriset/control/db-conn.php");
    $sql ="SELECT * FROM `comment_rate` WHERE `place_name`='$place' AND`user_email`='$userss'";
        $result = mysqli_query($conn, $sql);
    
        if ($result && mysqli_num_rows($result) > 0)
         {
            echo "<script>alert('place stored. not to save it one more ');</script>";
            return;
         }
    
    else
     {
        
         
        $s="INSERT INTO `comment_rate`(`id`, `user_email`, `place_name`) VALUES (NULL,'$userss','$place')";
        $r = mysqli_query($conn, $s);
        if($r)
        {
            echo"<script>
            alert('inserted successfully');
             
            </script>";

        }
     }
}
}

?>