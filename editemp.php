<?php 
session_start(); 
$con = mysqli_connect("localhost:3307","root","","gym_management_system");
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $id= $_POST["id"];
    $name = $_POST["name"];
    $username = $_POST["username"];
    $email = $_POST["email"];
    $mobile=$_POST["mobile"];
    $branch=$_POST["branch"];
    $ins=$_POST["myCheckbox"];
    $desc=$_POST["desc"];
    $var=mysqli_query($con,"update `employee` SET `name`='{$name}',`email`='{$email}',`mobile`='{$mobile}',`username`='{$username}',`branch_id`='{$branch}' where employee_id=$id");
    if($ins == 'on') {
        $var=mysqli_query($con,"select * from instructor where employee_id='{$id}'");
        if(mysqli_num_rows($var)==0){
        $var=mysqli_query($con,"insert into `instructor` (`employee_id`,`description`) values ('{$id}','{$desc}')");
        }
        else{
            $var=mysqli_query($con,"update `instructor` SET `description`='{$desc}' where employee_id=$id");
        }
        header("Location: admin-employee.php");
    }
    else{
        $var=mysqli_query($con,"select * from instructor where employee_id='{$id}'");
        if(mysqli_num_rows($var)>0){
            $var=mysqli_query($con,"delete from `instructor` where `employee_id`='{$id}'");
        }
        header("Location: admin-employee.php");
    }
}
?>