
<?php 

session_start(); 
$con = mysqli_connect("localhost:3307","root","","gym_management_system");
include "config.php";
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST["username"];
    $password = $_POST["password"];
    $var=mysqli_query($con,"select * from member where username='{$username}' and password='{$password}'");
    
    if(mysqli_num_rows($var)>0){
        $arr=mysqli_fetch_row($var);
        $_SESSION['user']='user';
        $_SESSION['userid']=$arr[0];
        header("Location: user.php");
    }
    else{
        $var=mysqli_query($con,"select role_id,employee_id from employee where username='{$username}' and password='{$password}'");
        if(mysqli_num_rows($var)>0){
        $emparr=mysqli_fetch_row($var);
        $role=mysqli_query($con,"select role_name from role where role_id='{$emparr[0]}'");
        $arr=mysqli_fetch_row($role);
        $_SESSION['empid']=$emparr[1];
        if($arr[0]=='admin'){
            $_SESSION['admin']='admin';
            header("Location: admindashboard.php");
        }
        elseif($arr[0]=='employee'){
            $_SESSION['employee']='employee';
            header("Location: empdashboard.php");
        }
        elseif($arr[0]=='manager'){
            $_SESSION['employee']='manager';
            header("Location: empdashboard.php");
        }
    }
    else{
        header("Location: index.php");
    }


    }
}
?>