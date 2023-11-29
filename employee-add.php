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
                <h2>Add Employee</h2>
                <form action="addemp.php" method="POST">
  <div class="form-group">
    <label for="name">Name:</label>
    <input type="text" class="form-control" id="name" name="name" required>
  </div>
  <div class="form-group">
    <label for="mobile">Mobile:</label>
    <input type="tel" class="form-control" id="mobile" name="mobile" required>
  </div>
  <div class="form-group">
    <label for="email">Email:</label>
    <input type="email" class="form-control" id="email" name="email" required>
  </div>
  <div class="form-group">
    <label for="username">Username:</label>
    <input type="text" class="form-control" id="username" name="username" required>
  </div>
  <div class="form-group">
    <label for="createPassword">Create Password:</label>
    <input type="password" class="form-control" id="createPassword" name="createPassword" required>
  </div>
  <div class="form-group">
    <label for="confirmPassword">Confirm Password:</label>
    <input type="password" class="form-control" id="confirmPassword" name="confirmPassword" required>
  </div>
  <div class="form-group">
        <label for="dropdown">Branch:</label>
        <select class="form-control" id="dropdown" name="branch">
            <?php
            // Display options fetched from the master table
            $con = mysqli_connect("localhost:3307","root","","gym_management_system");
            if(!$con)
            {   
                die("could not connect".mysql_error());
            }
                $var=mysqli_query($con,"select * from branch");
            if (mysqli_num_rows($var)>0) {
                while($arr=mysqli_fetch_row($var)){
                    $id = $arr[0];
                    $value = $arr[1];
                    echo "<option value='$id'>$value</option>";
                }
            } else {
                echo "<option value=''>No values found</option>";
            }
            ?>
        </select>
    </div>
  <div class="form-group">
        <label for="dropdown">Role:</label>
        <select class="form-control" id="dropdown" name="role">
            <?php
            // Display options fetched from the master table
            $con = mysqli_connect("localhost:3307","root","","gym_management_system");
            if(!$con)
            {   
                die("could not connect".mysql_error());
            }
                $var=mysqli_query($con,"select * from role");
            if (mysqli_num_rows($var)>0) {
                while($arr=mysqli_fetch_row($var)){
                    $id = $arr[0];
                    $value = $arr[1];
                    echo "<option value='$id'>$value</option>";
                }
            } else {
                echo "<option value=''>No values found</option>";
            }
            ?>
        </select>
    </div>
  <button type="submit" class="btn btn-dark">Add Employee</button>
</form>
            <!-- Add more content sections as needed -->
        </div>
    </div>
</div>


<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>

</body>
</html>
