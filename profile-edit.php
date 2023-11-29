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

if ($_SERVER["REQUEST_METHOD"] == "GET") {
    $id= $_GET["id"];
    $name = $_GET["name"];
    $username = $_GET["username"];
    $email = $_GET["email"];
    $mobile=$_GET["mobile"];
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>User Profile</title>
  <!-- Bootstrap CSS -->
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <style>
    /* Some additional styles */
    .profile-info {
      margin-top: 20px;
    }
  </style>
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
            <li class="nav-item">
                <a class="nav-link" href="memberviewdietplan.php">Diet Plan</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="classes.php">Classes</a>
            </li>
            <li class="nav-item active">
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
                <!-- Add more menu items as needed -->
            </div>
        </div>
        <div class="col-md-6">
        <h2>Edit Profile</h2>
    <form action="editmember.php" method="POST">
  <div class="form-group">
    <input type="hidden" name="id" value="<?php echo $id?>">
    <label for="name">Name:</label>
    <input type="text" class="form-control" value="<?php echo $name?>" id="name" name="name" required>
  </div>
  <div class="form-group">
    <label for="mobile">Mobile:</label>
    <input type="tel" class="form-control" value="<?php echo $mobile?>"id="mobile" name="mobile" required>
  </div>
  <div class="form-group">
    <label for="email">Email:</label>
    <input type="email" class="form-control" id="email" value="<?php echo $email?>" name="email" required>
  </div>
  <div class="form-group">
    <label for="username">Username:</label>
    <input type="text" class="form-control" id="username" value='<?php echo $username?>' name="username" required>
  </div>
   <button type="submit" class="btn btn-dark">Save</button>
</form>
        </div>


    </div>
</div>

  <!-- Bootstrap JS and dependencies -->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
