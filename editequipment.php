<?php 
session_start(); 
$con = mysqli_connect("localhost:3307","root","","gym_management_system");
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $id= $_POST["id"];
    $name = $_POST["name"];
    $maintenace = $_POST["maintenace"];
    $purchase = $_POST["purchase"];
    $status=$_POST["status"];
    $branch=$_POST["branch"];
    $var=mysqli_query($con,"update `equipment` SET `equipment_name`='{$name}',`maintenance_schedule`='{$maintenace}',`purchase_date`='{$purchase}',`status`='{$status}',`branch_id`='{$branch}' where equipmentid=$id");
    header("Location: admin-equipmentlist.php");
}
?>