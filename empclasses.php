<?php
// Start or resume the session
session_start();

// Check if the 'username' session variable exists
if (!isset($_SESSION['employee'])) {
    // Redirect the user to the login page or perform any other action (e.g., show an error message)
    header("Location: index.php");

    exit();
}
$role=$_SESSION['employee'];
$empid=$_SESSION['empid'];
$con = mysqli_connect("localhost:3307","root","","gym_management_system");
if($role=="manager"){
    $mems=mysqli_query($con,"select * from member m");
}
else{
    $classes=mysqli_query($con,"select * from class_schedule where employee_id=$empid");
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Gym Management System</title>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <style>
        /* Add your custom styles here */
        body {
            padding-top: 56px; /* Adjust the height of the navbar */
        }

        .navbar {
            background-color: #000; /* Black background color */
        }

        .navbar-dark .navbar-nav .nav-link {
            color: #fff; /* White text color for navbar links */
        }
    </style>
</head>

<body>

    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg navbar-dark fixed-top">
        <a class="navbar-brand" href="#">Gym Management</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav"
            aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
        <ul class="navbar-nav ml-auto">
            <li class="nav-item active">
                <a class="nav-link" href="empdashboard.php">Home</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="empmembers.php">Members</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="empclasses.php">Schedule</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="empdietplan.php">Diet Plan</a>
            </li>
            <?php
            if($role=="manager"){
                echo "<li class='nav-item'>
                <a class='nav-link' href='instructormem.php'>Instructor</a>
            </li>";
            }
            ?>
            <li class="nav-item">
                <a class="nav-link" href="logout.php">Logout</a>
            </li>
            <!-- Add more menu items as needed -->
        </ul>
    </div>
    </nav>

    <!-- Content -->
    <div class="container mt-5">
    <h2>Classes</h2>
                <a href='empclass-add.php'>Add Class</a>
    <?php
   
   if($role!="manager")
   { 
    echo "<table class='table'>";
   echo "<tr>
   <th>S.No</th>
   <th>Name</th>
   <th>Location</th>
   <th>Capacity</th>
   <th>Schedule</th>
   <th>Action</th>
   <th>More</th>
   </tr>";
   if(mysqli_num_rows($classes)>0){
    $i=1;
       while($arr=mysqli_fetch_row($classes))
       { 
        $date=substr($arr[1],0,10);
       echo "<tr>
       <td>$i</td>
       <td>$arr[4]</td>
       <td>$arr[3]</td>
       <td>$arr[2]</td>
       <td>$arr[1]</td>
       <td>";
        echo"<a href='classes-edit.php?id=$arr[0]&name=$arr[4]&location=$arr[3]&capacity=$arr[2]&schedule=$date'>Edit</a>";
        echo"</td>
        <td>";
        echo"<a href='viewattendance.php?id=$arr[0]&name=$arr[4]'>Attendance</a>";
        echo"</td>
       </tr>";
    $i+=1;
    }
       echo "</table>";
   }
   
}
else{

}

       
   ?>
        <!-- You can add other content or sections here -->

    </div>

<div class="modal fade" id="attendance" tabindex="-1" role="dialog" aria-labelledby="registerModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="registerModalLabel">Attendance and Feedback</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>

      <div class="modal-body">
      <?php
   
   $con = mysqli_connect("localhost:3307","root","","gym_management_system");
   if(!$con)
   { 
   die("could not connect".mysql_error());
   }
   $var=mysqli_query($con,"SELECT feedback.comment,feedback.rating,member.name FROM `attendance`,`feedback`,`member` WHERE attendance.class_id=feedback.class_id and attendance.class_id=2 AND attendance.memberid=feedback.memberid and attendance.class_id=feedback.class_id and member.member_id=feedback.memberid;");
   echo "<table class='table'>";
   echo "<tr>
   <th>Name</th>
   <th>Rating</th>
   <th>Comment</th>
   </tr>";
   if(mysqli_num_rows($var)>0){
       while($arr=mysqli_fetch_row($var))
       { 
       echo "<tr>
       <td>$arr[2]</td>
       <td>$arr[1]</td>
       <td>$arr[0]</td>
       </tr>";}
       echo "</table>";
       mysqli_free_result($var);
   }
   
   mysqli_close($con);
       
       
   ?>
       
      </div>
    </div>
  </div>
</div>

    <!-- Bootstrap JS and dependencies -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>

</body>

</html>