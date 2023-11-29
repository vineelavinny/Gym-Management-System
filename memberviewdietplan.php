<?php
// Start or resume the session
session_start();

// Check if the 'username' session variable exists
if (!isset($_SESSION['user'])) {
    // Redirect the user to the login page or perform any other action (e.g., show an error message)
    header("Location: index.php");
    exit();
}
$userid=$_SESSION['userid'];
// Continue with the rest of your PHP code for the pag
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>User Portal</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
</head>
<body>

<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <a class="navbar-brand" href="#">Gym Member Portal</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNav">
        <ul class="navbar-nav ml-auto">
            <li class="nav-item">
                <a class="nav-link" href="user.php">Home</a>
            </li>
            <li class="nav-item active">
                <a class="nav-link" href="memberviewdietplan.php">Diet Plan</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="classes.php">Classes</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="profile.php">Profile</a>
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
            <a href="user.php" class="list-group-item list-group-item-action">Dashboard</a>
                <a href="memberviewdietplan.php" class="list-group-item list-group-item-action">Diet Plan</a>
                <a href="classes.php" class="list-group-item list-group-item-action">View Classes</a>
                <a href="profile.php" class="list-group-item list-group-item-action">Profile</a>
            </div>
        </div>

        <div class="col-md-9">
            <div id="dashboardContent">
                <!-- Content for Dashboard goes here -->
                <h2>View Diet Plan</h2>
                <!-- Add your dashboard content here -->
                <?php
   
$con = mysqli_connect("localhost:3307","root","","gym_management_system");
if(!$con)
{ 
die("could not connect".mysql_error());
}
$var=mysqli_query($con,"select * from diet_plan where member_id=$userid");
echo "<table class='table'>";
echo "<tr>
<th>S.No</th>
<th>Day</th>
<th>Meal Type</th>
<th>Description</th>
</tr>";
if(mysqli_num_rows($var)>0){
    $i=1;
    while($arr=mysqli_fetch_row($var))
    { echo "<tr>
    <td>$i</td>
    <td>$arr[5]</td>
    <td>$arr[2]</td>
    <td>$arr[1]</td>
    </tr>";
$i+=1;
}
    echo "</table>";
    mysqli_free_result($var);
}

mysqli_close($con);
    
    
?>
            </div>
        </div>
    </div>
</div>


<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>

</body>
</html>
