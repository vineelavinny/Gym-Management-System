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
$con = mysqli_connect("localhost:3307","root","","gym_management_system");
$var=mysqli_query($con,"select * from memberplan where memberid='{$userid}'");
$mem="none";
if(mysqli_num_rows($var)>0){
  $arr=mysqli_fetch_row($var);
  $var=mysqli_query($con,"select * from membership_list where membershipid='{$arr[4]}'");
  $memarr=mysqli_fetch_row($var);
  $mem=$memarr[3];
}

$var=mysqli_query($con,"select * from body_measurement where member_id='{$userid}' order by measure_date");
$measure="none";
if(mysqli_num_rows($var)>0){
  $measure="val";
  $measure_arr=mysqli_fetch_row($var);
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
        <div class="card">
          <div class="card-body">
            <h3 class="card-title text-center">User Profile</h3>
            <img src="assets/img/profile.jpg" style="height:100px" class="mx-auto d-block img-fluid rounded-circle" alt="Profile Picture">
            <div class="profile-info">
            <?php
            $con = mysqli_connect("localhost:3307","root","","gym_management_system");
            if(!$con){ 
                die("could not connect".mysql_error());
            }
            $var=mysqli_query($con,"select * from member where member_id=$userid");
            $arr=mysqli_fetch_row($var);
            ?>
              <h4 class="text-center"><?php echo $arr[3]?></h4>
              <ul class="list-group">
                <li class="list-group-item"><strong>Email:</strong> <?php echo $arr[1]?></li>
                <li class="list-group-item"><strong>Mobile:</strong> <?php echo $arr[2]?></li>
                <li class="list-group-item"><strong>Membership:</strong> <?php if($mem=='none'){echo"<a href='#registerModal' data-toggle='modal'>Buy Membership</a>";} 
                else{echo $mem;}?></li>
                <?php 
              if($measure=="val"){
                echo "<li class='list-group-item'>Measure Date:&nbsp;$measure_arr[1]</li>";
                echo"<li class='list-group-item'><strong>Weight:</strong>$measure_arr[2]</li>";  
                echo"<li class='list-group-item'><strong>Height:</strong>$measure_arr[4]</li>"; 
              }
              ?>
              </ul>
              <div class="text-center mt-3">
                <?php
              echo"<a href='profile-edit.php?id=$arr[0]&email=$arr[1]&mobile=$arr[2]&name=$arr[3]&username=$arr[5]' class='btn btn-primary'>Edit</a>";?>
              
              <a href='#bodyMeasurement' data-toggle='modal' class='btn btn-primary'>Add Body Measurement</a>
            
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
</div>


<div class="modal fade" id="registerModal" tabindex="-1" role="dialog" aria-labelledby="registerModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="registerModalLabel">Buy Membership</h5>
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
   $var=mysqli_query($con,"select * from membership_list");
   echo "<table class='table'>";
   echo "<tr>
   <th>Id</th>
   <th>Type</th>
   <th>Duration(Months)</th>
   <th>Amount</th>
   </tr>";
   if(mysqli_num_rows($var)>0){
       while($arr=mysqli_fetch_row($var))
       { 
       echo "<tr>
       <td>$arr[0]</td>
       <td>$arr[3]</td>
       <td>$arr[2]</td>
       <td>$arr[1]</td>
       </tr>";}
       echo "</table>";
       mysqli_free_result($var);
   }
   
   mysqli_close($con);
       
       
   ?>
        <form action="buyMembership.php" method="POST">
        <div class="form-group">
        <label for="dropdown">Select Membership:</label>
        <select class="form-control" id="dropdown" name="membership">
            <?php
            // Display options fetched from the master table
            $con = mysqli_connect("localhost:3307","root","","gym_management_system");
            if(!$con)
            {   
                die("could not connect".mysql_error());
            }
            $var=mysqli_query($con,"select * from membership_list");
            if (mysqli_num_rows($var)>0) {
                while($arr=mysqli_fetch_row($var)){
                    $id = $arr[0];
                    $value = $arr[3];
                    echo "<option value='$id'>$value</option>";
                }
            } else {
                echo "<option value=''>No values found</option>";
            }
            ?>
        </select>
    </div>

          <button type="submit" class="btn btn-dark">Buy</button>
        </form>
      </div>
    </div>
  </div>
</div>


<div class="modal fade" id="bodyMeasurement" tabindex="-1" role="dialog" aria-labelledby="registerModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="registerModalLabel">Add bodyMeasurement</h5>
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
   $var=mysqli_query($con,"select * from body_measurement where member_id=$userid");
   echo "<table class='table'>";
   echo "<tr>
   <th>Height</th>
   <th>Weight</th>
   <th>Measure Date</th>
   </tr>";
   if(mysqli_num_rows($var)>0){
       while($arr=mysqli_fetch_row($var))
       { 
       echo "<tr>
       <td>$arr[4]</td>
       <td>$arr[2]</td>
       <td>$arr[1]</td>
       </tr>";}
       echo "</table>";
       mysqli_free_result($var);
   }
   
   mysqli_close($con);
       ?>
        <form action="addMeasurement.php" method="POST">
          <input type="hidden" name="userid" value="<?php echo $userid?>">
        <div class="form-group">
          <label for="height">Height:</label>
          <input type="number" class="form-control" id="height" name="height" required>
        </div>
        <div class="form-group">
          <label for="weight">Weight:</label>
          <input type="number" class="form-control" id="weight" name="weight" required>
        </div>
        <div class="form-group">
          <label for="name">Date:</label>
          <input type="date" class="form-control" id="date" name="date" required>
        </div>
        <button type="submit" class="btn btn-dark">Save</button>
        </form>
      </div>
    </div>
  </div>
</div>


  <!-- Bootstrap JS and dependencies -->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
