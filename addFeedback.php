<?php 

session_start(); 
$con = mysqli_connect("localhost:3307","root","","gym_management_system");
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $classid = $_POST["classid"];
    $userid = $_POST["userid"];
    $rating = $_POST["rating"];
    $comment=$_POST["comment"];
    $date = $_POST["schedule"];
    $var=mysqli_query($con,"insert into `feedback` (`comment`,`date`,`rating`,`class_id`,`memberid`) values ('{$comment}','{$date}','{$rating}','{$classid}','{$userid}')");
    header("Location: classes.php");
}
?>