
<?php 

session_start(); 
$con = mysqli_connect("localhost:3307","root","","gym_management_system");
if ($_SERVER["REQUEST_METHOD"] == "GET") {
    $classid=$_GET["classid"];
    $memid = $_GET["memid"];
    $schedule = $_GET["schedule"];
    $classname=$_GET["classname"];
    $var=mysqli_query($con,"insert into `attendance` (`class_id`,`memberid`,`attendated_date`) values ('{$classid}','{$memid}','{$schedule}')");
    header("Location: memberfeedback.php?classid=$classid&name=$classname&userid=$memid&schedule=$schedule");
}
?>