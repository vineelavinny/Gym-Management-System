<?php
// Start or resume the session
session_start();

// Check if the 'username' session variable exists
if (!isset($_SESSION['user'])) {
    // Redirect the user to the login page or perform any other action (e.g., show an error message)
    header("Location: index.php");

    exit();
}
// Continue with the rest of your PHP code for the page
$userid=$_SESSION['userid'];
$memid=$_POST['membership'];
$date = date('Y-m-d');
$con = mysqli_connect("localhost:3307","root","","gym_management_system");
$dur=mysqli_query($con,"select * from membership_list where membershipid=$memid");
$arr=mysqli_fetch_row($dur);
$expiry_date=date('Y-m-d', strtotime($date. " +$arr[2] months"));
$var=mysqli_query($con,"insert into `memberplan` (`memberid`, `membership_list_id`, `plan_start_date`,`plan_expiry_date`) values ('{$userid}','{$memid}','{$date}','{$expiry_date}')");

$var=mysqli_query($con,"insert into `payment` (`payment_amount`, `payment_date`, `payment_type`,`gym_id`,`member_id`) values ('{$arr[1]}','{$date}','online','1','{$userid}')");
header("Location: profile.php");
?>
