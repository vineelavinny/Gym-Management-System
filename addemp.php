
<?php 

session_start(); 
$con = mysqli_connect("localhost:3307","root","","gym_management_system");
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST["name"];
    $username = $_POST["username"];
    $createPassword = $_POST["createPassword"];
    $confirmPassword = $_POST["confirmPassword"];
    $email = $_POST["email"];
    $mobile=$_POST["mobile"];
    $branch=$_POST["branch"];
    $role=$_POST["role"];
    if($createPassword==$confirmPassword){
      $var=mysqli_query($con,"insert into `employee` (`name`,`email`,`mobile`,`password`,`username`,`branch_id`,`role_id`) values ('{$name}','{$email}','{$mobile}','{$createPassword}','{$username}','{$branch}','{$role}')");
      header("Location: admin-employee.php");
    }
    else{
        echo 'no match';
    }
}
?>