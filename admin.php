<?php
require_once("DBConnection.php");
session_start();
if (!isset($_SESSION["sess_user"])) {
    header("Location: index.php");
} else {
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
        </style>

    </head>

    <body>
        <nav class="navbar header-nav navbar-expand-lg navbar-light bg-light">
            <div class="container-fluid">

                <a class="navbar-brand" href="#">Gate Pass Application</a>
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

        <h1>Pass Requests</h1>

        <div class="mycontainer">

            <table class="table table-bordered table-hover table-striped">
                <thead>
                    <th>#</th>
                    <th>Student Name</th>
                    <th>Branch</th>
                    <th>Year</th>
                    <th>Pass Application</th>
                    <th>Date</th>
                    <th>Time</th>
                    <th>Status</th>
                    <th>Actions</th>
                    <!-- <th>Action</th> -->
                </thead>
                <tbody>
                    <!-- loading all leave applications from database -->
                    <?php
                    global $row;
                    $leaves = mysqli_query($conn, 
                    "SELECT l.ename,u.department,u.year,l.descr,l.fromdate,l.exittime,l.eid,l.status FROM `users` u inner join `leaves` l on u.id = l.eid 
                    where l.status != 'Accepted' and l.status != 'Rejected'");
                    //$users = mysqli_query($conn, "SELECT * FROM users");
                    $numrow = mysqli_num_rows($leaves);

                    if ($leaves) {

                        if ($numrow != 0) {
                            $cnt = 1;

                            while (($row1 = mysqli_fetch_array($leaves))) {
                                echo "<tr>
                                            <td>$cnt</td>
                                            <td>{$row1['ename']}</td>
                                            <td>{$row1['department']}</td>
                                            <td>{$row1['year']}</td>
                                            <td>{$row1['descr']}</td>
                                            <td>{$row1['fromdate']}</td>
                                            <td>{$row1['exittime']}</td>
                                            <td>{$row1['status']}</td>
                                            <td><a href=\"updateStatusAccept.php?eid={$row1['eid']}&descr={$row1['descr']}\"><button class='btn-success btn-sm' >Accept</button></a>
                                            <a href=\"updateStatusReject.php?eid={$row1['eid']}&descr={$row1['descr']}\"><button class='btn-danger btn-sm' >Reject</button></a></td>
                                            </tr>";
                                $cnt++;
                            }
                        }
                    } else {
                        echo "Query Error : " . "SELECT * FROM leaves WHERE status='Pending'" . "<br>" . mysqli_error($conn);
                    }
                    ?>

                </tbody>
            </table>
        </div>

        <footer class="footer" style="color:white;background-color:#da202a">
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