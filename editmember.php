<?php 
session_start(); 
$con = mysqli_connect("localhost:3307","root","","gym_management_system");
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $id= $_POST["id"];
    $name = $_POST["name"];
    $username = $_POST["username"];
    $email = $_POST["email"];
    $mobile=$_POST["mobile"];
    $var=mysqli_query($con,"update `member` SET `name`='{$name}',`email`='{$email}',`mobile`='{$mobile}',`username`='{$username}' where member_id=$id");
    header("Location: profile.php");
}
?>