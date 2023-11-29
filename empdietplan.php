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
$ins=mysqli_query($con,"select * from instructor where employee_id=$empid");
$insarr=mysqli_fetch_row($ins);
// $classes=mysqli_query($con,"select * from class_schedule where employee_id=$empid");
if (mysqli_num_rows($ins)>0) {
$mem_list=mysqli_query($con,"select m.member_id,m.name from member m,instructor_member i where i.member_id =m.member_id and i.instructor_id=$insarr[0]");
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
            <?php
            if($role!="manager"){
            echo "<li class='nav-item'>
                <a class='nav-link' href='empdietplan.php'>Diet Plan</a>
            </li>";
            }?>
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
    <h2 class="text-center mb-4">Diet Plan</h2>

    <form action="editdietplan.php" method="POST">
      <div class="form-row">
        <div class="form-group col-md-4">
            <input type="hidden" value="<?php echo $insarr[0]?>" name="insid">
          <label for="day">Select Day</label>
          <select id="day" name="day" class="form-control" required>
            <option value="" disabled selected>Select a day</option>
            <option value="monday">Monday</option>
            <option value="tuesday">Tuesday</option>
            <option value="wednesday">Wednesday</option>
            <option value="thursday">Thursday</option>
            <option value="friday">Friday</option>
            <option value="saturday">Saturday</option>
            <option value="sunday">Sunday</option>
          </select>
        </div>
        <div class="form-group col-md-4">
          <label for="mealType">Select Meal Type</label>
          <select id="mealType" name="meal" class="form-control" required>
            <option value="" disabled selected>Select a meal type</option>
            <option value="breakfast">Breakfast</option>
            <option value="lunch">Lunch</option>
            <option value="dinner">Dinner</option>
          </select>
        </div>

        <div class="form-group col-md-4">
        <label for="dropdown">Select Member:</label>
        <select class="form-control" id="dropdown" name="member">
            <?php
            // Display options fetched from the master table
            if (mysqli_num_rows($mem_list)>0) {
                while($arr=mysqli_fetch_row($mem_list)){
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

      <div class="form-row">
        <div class="form-group col-md-12">
          <label for="dietPlan">Enter Diet Plan</label>
          <textarea class="form-control" id="dietPlan" name="desc" rows="4" placeholder="Enter your diet plan for the selected day" required></textarea>
        </div>
      </div>

      <button type="submit" class="btn btn-dark">Save Diet Plan</button>
    </form>
  </div>


    <!-- Bootstrap JS and dependencies -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>

</body>

</html>