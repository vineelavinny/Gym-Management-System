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

if ($_SERVER["REQUEST_METHOD"] == "GET") {
    $id= $_GET["id"];
    $name=$_GET["name"];
    $location = $_GET["location"];
    $capacity = $_GET["capacity"];
    $schedule = $_GET["schedule"];
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
                <a class='nav-link' href='empdietplan.php'>Instructor</a>
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
    <h2>Edit Classes</h2>
    <div class="col-md-9">
                <!-- Content for Employee goes here -->
                <form action="editclasses.php" method="POST">
  <div class="form-group">
    <input type="hidden" name="id" value="<?php echo $id?>">
    <label for="name">Name:</label>
    <input type="text" class="form-control" value="<?php echo $name?>" id="name" name="name" required>
  </div>
  <div class="form-group">
    <label for="location">Location:</label>
    <input type="text" class="form-control" value="<?php echo $location?>"id="location" name="location" required>
  </div>
  <div class="form-group">
    <label for="capacity">Capacity:</label>
    <input type="text" class="form-control" id="capacity" value="<?php echo $capacity?>" name="capacity" required>
  </div>
  <div class="form-group">
    <label for="username">Schedule:</label>
    <input type="date" class="form-control" id="schedule" value='<?php echo $schedule?>' name="schedule" required>
  </div>
    
     <button type="submit" class="btn btn-dark">Save</button>
</form>
            <!-- Add more content sections as needed -->
        </div>

    </div>

    <!-- Bootstrap JS and dependencies -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>

</body>

</html>