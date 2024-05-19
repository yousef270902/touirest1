<?php
$servername = "localhost";
$usernamee = "root";
$passworde = "";
$dbname = "touirest";

$conn = mysqli_connect($servername,$usernamee,$passworde,$dbname);

if(!$conn){
    die("Connection Failed".mysqli_connect_error());
}
?>