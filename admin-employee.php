<?php
// Start or resume the session
session_start();

// Check if the 'username' session variable exists
if (!isset($_SESSION['admin'])) {
    // Redirect the user to the login page or perform any other action (e.g., show an error message)
    header("Location: login.php");
    exit();
}
// Continue with the rest of your PHP code for the page
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Admin Portal</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
</head>
<body>

<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <a class="navbar-brand" href="#">Admin Portal</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNav">
        <ul class="navbar-nav ml-auto">
            <li class="nav-item">
                <a class="nav-link" href="admindashboard.php">Home</a>
            </li>
            <li class="nav-item active" >
                <a class="nav-link" href="admin-employee.php">Employee</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="admin-membershiplist.php">Membership Plans</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="admin-equipmentlist.php">Equipment</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="logout.php">Logout</a>
            </li>
            <!-- Add more menu items as needed -->
        </ul>
    </div>
</nav>

<div class="container mt-4">
    <div class="row">
        <div class="col-md-3">
            <div class="list-group">
            <a href="admindashboard.php" class="list-group-item list-group-item-action">Dashboard</a>
                <a href="admin-employee.php" class="list-group-item list-group-item-action">Employee</a>
                <a href="admin-membershiplist.php" class="list-group-item list-group-item-action">Membership Plans</a>
                <a href="admin-equipmentlist.php" class="list-group-item list-group-item-action">Equipment</a>
               
                <!-- Add more menu items as needed -->
            </div>
        </div>

        <div class="col-md-9">
                <!-- Content for Employee goes here -->
                <h2>Employee Content</h2>
                <a href='employee-add.php'>Add Employee</a>
                <?php
   
$con = mysqli_connect("localhost:3307","root","","gym_management_system");
if(!$con)
{ 
die("could not connect".mysql_error());
}
$var=mysqli_query($con,"select * from employee");
echo "<table class='table'>";
echo "<tr>
<th>S.No</th>
<th>Name</th>
<th>Email</th>
<th>Mobile</th>
<th>Username</th>
<th>Branch</th>
<th>Action</th>
</tr>";
if(mysqli_num_rows($var)>0){
    $i=1;
    while($arr=mysqli_fetch_row($var))
    { 
        $branch=mysqli_query($con,"select * from branch where branchid=$arr[4]");
        $brancharr=mysqli_fetch_row($branch);
        $ins=mysqli_query($con,"select * from instructor where employee_id=$arr[0]");
        $desc="";
        if(mysqli_num_rows($ins)>0){
            $myCheckbox='on';
            $insarr=mysqli_fetch_row($ins);
            $desc=$insarr[1];
        }
        else{
            $myCheckbox='off';
        }
        echo "<tr>
    <td>$i</td>
    <td>$arr[3]</td>
    <td>$arr[1]</td>
    <td>$arr[2]</td>
    <td>$arr[6]</td>
    <td>$brancharr[1]</td>
    <td>";
        echo"<a href='employee-edit.php?id=$arr[0]&name=$arr[3]&email=$arr[1]&mobile=$arr[2]&uname=$arr[6]&branch=$brancharr[0]&ins=$myCheckbox&desc=$desc'>Edit</a>";
    echo"</td>
    </tr>";
    $i+=1;
}
    echo "</table>";
    mysqli_free_result($var);
}

mysqli_close($con);
    
    
?>
            <!-- Add more content sections as needed -->
        </div>
    </div>
</div>




<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>

</body>
</html>
