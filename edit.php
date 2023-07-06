<?php
require_once("DBConnection.php");
session_start();
echo "<script>console.log('Debug Objects: " . $_GET['id'] . "' );</script>";

if (isset($_GET['id'])) {
  $edit_id = $_GET['id'];
  $sel = "select * from users where id=${edit_id}";
  $run = mysqli_query($conn, $sel);

  $row = mysqli_fetch_array($run);
  $fullname = $row['fullname'];
  $name = $row['name'];
  $email = $row['email'];
  $gender = $row['gender'];
  $department = $row['department'];
  $year = $row['year'];
  $phone = $row['phone'];
  $gnmail = $row['gnmail'];
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">



  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link href="https://fonts.googleapis.com/css2?family=Raleway&display=swap" rel="stylesheet">

  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl" crossorigin="anonymous">
  <script src="https://cdnjs.cloudflare.com/ajax/libs/axios/0.21.1/axios.min.js"></script>
  <link rel="stylesheet" href="css/style.css">
  <title>Admin Panel</title>

  <style>
    * {
      font-family: 'Raleway', sans-serif;
    }

    h1 {
      text-align: center;
      font-size: 2.5em;
      font-weight: bold;
      padding-top: 1em;
    }

    .mycontainer {
      width: 90%;
      margin: 1.5rem auto;
      min-height: 60vh;
    }

    .mycontainer table {
      margin: 1.5rem auto;
    }

    form {
      padding: 40px;
      width: 70vw;
    }

    input,
    textarea {
      margin: 5px;
      font-size: 1.1em !important;
      outline: none;
    }

    input {
      margin-top: 25px;
      margin-bottom: 25px;
    }

    input[type=radio] {
      width: max-content;
      padding: 5px;
      margin-top: 20px;
      margin-bottom: 20px;
      margin-left: 30px;
      margin-right: 5px;
    }

    select {
      margin-left: 7px;
    }

    .select-label {
      margin-left: 7px;
    }
  </style>

</head>

<body>
  <nav class="navbar header-nav navbar-expand-lg navbar-light bg-light">
    <div class="container-fluid">

      <a class="navbar-brand" href="admin.php">Gate Pass Application</a>
      <!-- <button class="btn-default" onclick="window.location.href='leavehist.php';">Leave History</button> </div> -->
      <!-- <nav class="nav navbar-right">
            <a class="nav-link active" href="#">Active</a>
            
            </nav>

            <button id="logout" onclick="window.location.href='logout.php';">Logout</button> </div> -->

      <ul class="nav justify-content-end">
        <li class="nav-item">
          <a class="nav-link" href="registeredstudents.php" style="color:white;">Student List</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="leave_history.php" style="color:white;">Pass History</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="admin.php" style="color:white;">Pass Requests <span class="badge badge-pill" style="background-color:#2196f3;"><?php include('count_req.php'); ?></span></a>
        </li>
        <li class="nav-item">
          <button id="logout" onclick="window.location.href='logout.php';">Logout</button>
    </div>
    </li>
    </ul>
  </nav>

  <h1>Computer Science - 1st Year Students List</h1>
  <!-- **********************************************************************************************************************************************************
      MAIN CONTENT
      *********************************************************************************************************************************************************** -->
  <!--main content start-->
  <section id="main-content">
    <section class="wrapper site-min-height">


      <div class="container">
        <form class="form-horizontal" action="saveedit.php" method="POST" enctype="multipart/form-data">
          <div class="form-content">
            <h3><i class="fa fa-angle-right"></i> Update users Details</h3>
            <div class="form-floating mb-3">
              <input type="text" class="form-control" name="fullname" id="fullname" value="<?php echo $fullname; ?>" placeholder="Fullname">
              <label for="Fullname">Fullname</label>
            </div>
            <div class="form-floating mb-3">
              <input type="text" class="form-control" name="name" id="name" value="<?php echo $name; ?>" placeholder="Username">
              <label for="username">Username</label>
            </div>
            <div class="form-floating mb-3">
              <input class="form-control" type="text" name="email" id="email" value="<?php echo $email; ?>" placeholder="Enter your email">
              <label for="email">Email address</label>
            </div>
            <label for="gender" class="select-label">Gender:</label>
            <input type="radio" id="gender" name="gender" <?php if (isset($gender) && $gender == "Male") echo "checked" ?> value="Male">Male
            <input type="radio" id="gender" name="gender" <?php if (isset($gender) && $gender == "Female") echo "checked" ?> value="Female">Female
            <input type="radio" id="gender" name="gender" <?php if (isset($gender) && $gender == "Prefer Not to say") echo "checked" ?> value="Prefer Not to say">Prefer Not to say
            <br>
            <div class="col-5">
              <label style="display:inline" class="select-label">Department : </label>
              <select class="form-select" name="department">
                <?php
                $theArray = array("CSE","ECE","EEE","MEC","CIVIL","CSE-AI");
                foreach ($theArray as $key => $value) {
                  if ($value == $department) {
                    echo ('<option selected="selected" value=' . $value . '>' . $value . '</option>');
                  } else {
                    echo ('<option value=' . $value . '>' . $value . '</option>');
                  }
                }
                ?>
              </select>
            </div>
            <div class="col-5">
              <label style="display:inline" class="select-label" for="year">Year:</label>
              <select class="form-select" id="year" name="year">
              <?php
                $theArray = array(1,2,3,4);
                foreach ($theArray as $key => $value) {
                  if ($value == $year) {
                    echo ('<option selected="selected" value=' . $value . '>' . $value . '</option>');
                  } else {
                    echo ('<option value=' . $value . '>' . $value . '</option>');
                  }
                }
                ?>
              </select>
            </div>

            <div class="form-floating mb-3">
              <input class="form-control" type="tel" name="phone" id="phone" value="<?php echo $phone; ?>" placeholder="Enter your Phone no.">
              <label for="phone">Phone No.</label>
            </div>
            <div class="form-floating mb-3">
              <input class="form-control" type="email" name="gnmail" id="gnmail" value="<?php echo $gnmail; ?>" placeholder="Enter your Guardian's email">
              <label for="gemail"> Guardian Email address</label>
            </div>
            <input type="hidden" class="form-control" name="id" value="<?php echo $edit_id; ?>" />
            <div class="form-group">
              <div class="col-sm-offset-6 col-sm-10">
                <button style="background-color:#da202a;color:white;margin:10px;" type="submit" class="btn btn-default" name="update">Update</button>
              </div>
            </div>

          </div>
        </form>
      </div>

    </section>
  </section><!-- /MAIN CONTENT -->

  <!--main content end-->
  <!--footer start-->
  <?php
  if (isset($_POST['update'])) {

    $fullname = mysqli_real_escape_string($con, $_POST['fullname']);
    $name = mysqli_real_escape_string($con, $_POST['name']);
    $email = mysqli_real_escape_string($con, $_POST['email']);
    $gender = mysqli_real_escape_string($con, $_POST['gender']);
    $department = mysqli_real_escape_string($con, $_POST['department']);
    $year = mysqli_real_escape_string($con, $_POST['year']);
    $phone = mysqli_real_escape_string($con, $_POST['phone']);
    $gnmail = mysqli_real_escape_string($con, $_POST['gnmail']);

    $update = "UPDATE `users` SET `fullname` = '$fullname', `name` = '$name', `email` = '$email', `gender` = '$gender',`department` = '$department',`year` = '$year',`phone` = '$phone', `gnmail` = '$gnmail' WHERE `users`.`id`='$edit_id';";
    $run_update = mysqli_query($con, $update);
    if ($run_update) {
      echo "<script>alert('Successful updated')</script>";
      echo "<script>window.open('basic_table.php','_self')</script>";
    } else {
      echo "<script>alert('Error please try again')</script>";
      echo "<script>window.open('basic_table.php','_self')</script>";
    }
  }

  ?> <footer class="footer navbar navbar-expand-lg navbar-light bg-light" style="color:white;">
    <div>
      <p class="text-center">&copy; <?php echo date("Y"); ?> - Gate Pass Application</p>

    </div>
  </footer>
</body>

</html>

<?php

ini_set('display_errors', true);
error_reporting(E_ALL);
?>