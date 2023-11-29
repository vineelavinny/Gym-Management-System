
<?php 

session_start(); 
$con = mysqli_connect("localhost:3307","root","","gym_management_system");
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $id=$_POST["empid"];
    $name = $_POST["name"];
    $location = $_POST["location"];
    $capacity = $_POST["capacity"];
    $schedule = $_POST["schedule"];
    $var=mysqli_query($con,"insert into `class_schedule` (`name`,`location`,`capacity`,`schedule_time`,`employee_id`) values ('{$name}','{$location}','{$capacity}','{$schedule}','{$id}')");
    header("Location: empclasses.php");
}
?>