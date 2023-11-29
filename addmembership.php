<?php 

session_start(); 
$con = mysqli_connect("localhost:3307","root","","gym_management_system");
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $type = $_POST["type"];
    $duration = $_POST["duration"];
    $amount = $_POST["amount"];
    $var=mysqli_query($con,"insert into `membership_list` (`amount`, `membership_duration`, `membership_type`) values ('{$amount}','{$duration}','{$type}')");
    header("Location: admin-membershiplist.php");
}
?>