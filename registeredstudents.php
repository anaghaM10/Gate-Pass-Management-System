<?php
require_once("DBConnection.php");
session_start();
if(!isset($_SESSION["sess_user"])){
  header("Location: index.php");
}
else{
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    
         
    <link rel="preconnect" href="https://fonts.googleapis.com">
<link href="https://fonts.googleapis.com/css2?family=Raleway&display=swap" rel="stylesheet">

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl" crossorigin="anonymous">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/axios/0.21.1/axios.min.js"></script>
    <link rel="stylesheet" href="css/style.css">
    <title>Admin Panel</title>

    <style> * {
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
            <a class="nav-link" href="admin.php" style="color:white;">Pass Requests <span class="badge badge-pill" style="background-color:#2196f3;"><?php include('count_req.php');?></span></a>
            </li>
            <li class="nav-item">
            <button id="logout" onclick="window.location.href='logout.php';">Logout</button> </div>
            </li>
            </ul>
            
    </nav>

    <h1>Admin Panel - Registered Students</h1>

    <div class="mycontainer">

        <h2>Branches</h2>  
                  <body>
                <!--  <ul>
  <li>Computer Science Engineering: <a href="cse1.php">1</a> <a href="cse2.php.php">2</a> <a href="cse3.php">3</a> <a href="cse4.php">4</a></li>
  <li>Computer Science (AI) Engineering:<a href="cseai1.php">1</a> <a href="cseai2.php">2</a> <a href="cseai3.php">3</a> <a href="cseai4.php">4</a></li>
  <li>Mechanical Engineering:<a href="mec1.php">1</a> <a href="mec2.php">2</a> <a href="mec3.php">3</a> <a href="mec4.php">4</a></li>
  <li>Electronics and Communication Engineering:<a href="ece1.php">1</a> <a href="ece2.php">2</a> <a href="ece3.php">3</a> <a href="ece4.php">4</a></li>
  <li>Electronics and Electrical Engineering:<a href="eee1.php">1</a> <a href="eee2.php">2</a> <a href="eee3.php">3</a> <a href="eee4.php">4</a></li>
  <li>Civil Engineering:<a href="ce1.php">1</a> <a href="ce2.php">2</a> <a href="ce3.php">3</a> <a href="ce4.php">4</a></li>
    </ul>-->
    <table class = "table table-bordered">
        <thead>
            <tr>
                <th>Department Name</th>
                <th colspan = "4">Year</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td>Computer Science Engineering</td>
                <td><a href="cse1.php">Year 1</a></td>
                <td><a href="cse2.php">Year 2</a></td>
                <td><a href="cse3.php">Year 3</a></td>
                <td><a href="cse4.php">Year 4</a></td>
            </tr>
            <tr>
                <td>Computer Science (AI) Engineering</td>
                <td><a href="cseai1.php">Year 1</a></td>
                <td><a href="cseai2.php">Year 2</a></td>
                <td><a href="cseai3.php">Year 3</a></td>
                <td><a href="cseai4.php">Year 4</a></td>
            </tr>
            <tr>
                <td>Mechanical Engineering</td>
                <td><a href="mec1.php">Year 1</a></td>
                <td><a href="mec2.php">Year 2</a></td>
                <td><a href="mec3.php">Year 3</a></td>
                <td><a href="mec4.php">Year 4</a></td>
            </tr>
            <tr>
                <td>Electronics and Communication Engineering</td>
                <td><a href="ece1.php">Year 1</a></td>
                <td><a href="ece2.php">Year 2</a></td>
                <td><a href="ece3.php">Year 3</a></td>
                <td><a href="ece4.php">Year 4</a></td>
            </tr>
            <tr>
                <td>Electronics and Electrical Engineering</td>
                <td><a href="eee1.php">Year 1</a></td>
                <td><a href="eee2.php">Year 2</a></td>
                <td><a href="eee3.php">Year 3</a></td>
                <td><a href="eee4.php">Year 4</a></td>
            </tr>
            <tr>
                <td>Civil Engineering</td>
                <td><a href="ce1.php">Year 1</a></td>
                <td><a href="ce2.php">Year 2</a></td>
                <td><a href="ce3.php">Year 3</a></td>
                <td><a href="ce4.php">Year 4</a></td>
            </tr>
        </tbody>
    </table>
                  </body>
             
    </div>

    <footer class="footer navbar navbar-expand-lg navbar-light bg-light" style="color:white;">
    <div>
    <p class="text-center">&copy; <?php echo date("Y"); ?> - Gate Pass Application</p>
       
    </div>
    </footer>
</body>

</html>

<?php
}

ini_set('display_errors', true);
error_reporting(E_ALL);
?>