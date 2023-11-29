<?php 

session_start(); 
$con = mysqli_connect("localhost:3307","root","","gym_management_system");
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $height= $_POST["height"];
    $weight = $_POST["weight"];
    $date = $_POST["date"];
    $userid=$_POST["userid"];
    $var=mysqli_query($con,"insert into `body_measurement` (`height`,`weight`,`measure_date`,`member_id`) values ('{$height}','{$weight}','{$date}','{$userid}')");
    header("Location: profile.php");
}
?>