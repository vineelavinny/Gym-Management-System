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
$emps=mysqli_query($con,"SELECT employee.employee_id,employee.name FROM `instructor`,`employee` WHERE instructor.employee_id=employee.employee_id");

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
        <h3>Assign Trainee</h3>

        <form action="addtrainee.php" method="POST">
      <div class="form-row">
        <div class="form-group col-md-4">
            <input type="hidden" value="<?php echo $insarr[0]?>" name="insid">
          <label for="trainer">Select Trainer</label>
          <select id="trainer" name="trainer" class="form-control" required>
          <?php
            // Display options fetched from the master table
            if (mysqli_num_rows($emps)>0) {
                while($arr=mysqli_fetch_row($emps)){
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
        <div class="form-group col-md-4">
          <label for="member">Select Member</label>
          <select id="member" name="member" class="form-control" required>
          <?php
            // Display options fetched from the master table
            $emps=mysqli_query($con,"SELECT member_id,name   FROM `member` WHERE member_id not in(select member_id from `instructor_member`);");
            if (mysqli_num_rows($emps)>0) {
                while($arr=mysqli_fetch_row($emps)){
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

      </div>


      <button type="submit" class="btn btn-dark">Assign Trainee</button>
    </form>
  </div>

            <!-- Add more content sections as needed -->
        </div>

        <!-- You can add other content or sections here -->
    <!-- Bootstrap JS and dependencies -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>

</body>

</html>