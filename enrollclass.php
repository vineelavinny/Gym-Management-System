<?php
// Create connection
$con = mysqli_connect("localhost:3307","root","","gym_management_system");

// Get the record ID from the request
if (isset($_GET['id'])) {
    $classId = $_GET['id'];
    $memid=$_GET['memid'];
    // SQL to delete a record based on its ID (modify according to your table structure)
    $var=mysqli_query($con,"insert into `class_enroll` (`class_id`,`member_id`) values ('{$classId}','{$memid}')");
    mysqli_close($con);
    header("Location: classes.php");
} else {
    echo "No record ID provided";
}

?>
