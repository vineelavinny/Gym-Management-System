<?php 
session_start(); 
$con = mysqli_connect("localhost:3307","root","","gym_management_system");
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $day = $_POST["day"];
    $meal = $_POST["meal"];
    $member = $_POST["member"];
    $desc = $_POST["desc"];
    $insid = $_POST["insid"];
    $var=mysqli_query($con,"insert into `diet_plan` (`day`,`meal_type`,`description`,`member_id`,`instructor_id`) values ('{$day}','{$meal}','{$desc}','{$member}','{$insid}')");
    header("Location: empdietplan.php");
}
?>