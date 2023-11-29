<?php 
session_start(); 
$con = mysqli_connect("localhost:3307","root","","gym_management_system");
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $id= $_POST["id"];
    $type = $_POST["type"];
    $duration = $_POST["duration"];
    $amount = $_POST["amount"];
    $var=mysqli_query($con,"update `membership_list` SET `membership_type`='{$type}',`membership_duration`='{$duration}',`amount`='{$amount}' where membershipid=$id");
    header("Location: admin-membershiplist.php");
}
?>