<?php 

session_start(); 
$con = mysqli_connect("localhost:3307","root","","gym_management_system");
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST["name"];
    $maintenace = $_POST["maintenace"];
    $purchase = $_POST["purchase"];
    $status=$_POST["status"];
    $branch=$_POST["branch"];
    $var=mysqli_query($con,"insert into `equipment` (`equipment_name`,`maintenance_schedule`,`purchase_date`,`status`,`branch_id`) values ('{$name}','{$maintenace}','{$purchase}','{$status}','{$branch}')");
    header("Location: admin-equipmentlist.php");
}
?>