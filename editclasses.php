<?php 
session_start(); 
$con = mysqli_connect("localhost:3307","root","","gym_management_system");
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $id= $_POST["id"];
    $name = $_POST["name"];
    $location = $_POST["location"];
    $capacity = $_POST["capacity"];
    $schedule=$_POST["schedule"];
    $var=mysqli_query($con,"update `class_schedule` SET `capacity`='{$capacity}',`location`='{$location}',`name`='{$name}',`schedule_time`='{$schedule}' where class_id=$id");
    header("Location: empclasses.php");
}
?>