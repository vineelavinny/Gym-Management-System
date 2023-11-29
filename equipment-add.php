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
            <li class="nav-item" >
                <a class="nav-link" href="admin-employee.php">Employee</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="admin-membershiplist.php">Membership Plans</a>
            </li>
            <li class="nav-item active">
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
                <h2>Add Equipment</h2>
                <form action="addequipment.php" method="POST">
  <div class="form-group">
    <label for="name">Equipment Name:</label>
    <input type="text" class="form-control" id="name" name="name" required>
  </div>
  <div class="form-group">
    <label for="maintenace">Maintenace Days:</label>
    <input type="text" class="form-control" id="maintenace" name="maintenace" required>
  </div>
  <div class="form-group">
    <label for="date">Purchase Date:</label>
    <input type="date" class="form-control" id="purchase" name="purchase" required>
  </div>
  <div class="form-group">
  <label for="date">Status:</label>
    <select id="status" name="status" class="form-control" required>
            <option value="" disabled selected>Select Status</option>
            <option value="Available">Available</option>
            <option value="In-use">In-use</option>
            <option value="out-of-order">out-of-order</option>
            <option value="maintainance">maintainance</option>
          </select>
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
 
  <button type="submit" class="btn btn-dark">Add Equipment</button>
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
