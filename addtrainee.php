<?php 

session_start(); 
$con = mysqli_connect("localhost:3307","root","","gym_management_system");
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $trainer = $_POST["trainer"];
    $member = $_POST["member"];
    $trainer=mysqli_query($con,"select * from instructor where employee_id=$trainer");
    $trainerarr=mysqli_fetch_row($trainer);
    $var=mysqli_query($con,"insert into `instructor_member` (`member_id`,`instructor_id`) values ('{$member}','{$trainerarr[0]}')");
    header("Location: instructormem.php");
}
?>