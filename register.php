
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
    if($createPassword==$confirmPassword){
      $var=mysqli_query($con,"insert into `member` (`name`,`email`,`mobile`,`password`,`username`,`gym_id`) values ('{$name}','{$email}','{$mobile}','{$createPassword}','{$username}','1')");
      header("Location: index.php");
    }
    else{
        echo 'no match';
    }
}
?>