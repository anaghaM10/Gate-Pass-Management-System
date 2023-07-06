<?php
require_once("DBConnection.php");
session_start();
if(!isset($_SESSION["sess_user"])){
  header("Location: index.php");
}
else{
?>


<link href="https://fonts.googleapis.com/css2?family=Source+Sans+Pro:wght@300&display=swap" rel="stylesheet">
         
    <link rel="preconnect" href="https://fonts.googleapis.com">
<link href="https://fonts.googleapis.com/css2?family=Raleway&display=swap" rel="stylesheet">

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet">
<style> * {
  font-family: 'Raleway', sans-serif;
}  

    *{
        margin: 0;
        box-sizing: border-box;
        font-family: 'Raleway', sans-serif;
    }
    .nav-bar {
        font-size: 1.5em;
        font-weight: 400;
        padding-top: 0.5em;
        padding-bottom: 0.3em;
        background-color: #da202a;

    }
    .nav-content{
        display:flex;
        flex-direction: row;
        justify-content: space-between;
    }
    #title{
        margin-left: 10px;
        color: white;
        text-decoration: none;
    }
    footer{
        position: fixed;
        width: 100%;
        display: flex;
        align-items: center;
        justify-content: center;
        width: 100%;
        padding: 10px;
        bottom: 0;
        background-color: #da202a !important;
        color:white;
        bottom: 0px;
    }
    p{
        margin-bottom: 1rem;
    }
    section{
        display: flex;
        flex-direction: column;
        height: 70dvh;
        width: 70vw;
        justify-content: center;
        align-items: center;
    }
    table{
        width: 50vw;
    }
     #invalidMsg{
            display:none;
        }
    #logout-btn{
        padding-left: 15px;
        padding-right:15px;
        background-color:#91151b; 
        color: white;
    }
    #logout-btn:hover{
        background-color:#d1e7dd;
        color: #0f5132;
    }
</style>
<nav class="nav-bar">
        <div class="container-fluid nav-content">
            <p id='title'>Gate Pass Application</p>
            <button class = "btn" id="logout-btn" onclick="window.location.href='logout.php';">Logout</button> </div>
        </div>
    </nav>
    <section class = "container">
        <?php 
        global $row;
        $leaves = mysqli_query($conn,"SELECT l.ename,u.department,u.year,l.descr,l.fromdate,l.exittime,l.eid,l.status FROM `users` u inner join `leaves` l on u.id = l.eid where l.ename = '".$_SESSION['sess_user']."' and l.status = 'Pending'");
        //$users = mysqli_query($conn, "SELECT * FROM users");
        $numrow = mysqli_num_rows($leaves);

        if($leaves){
            
            if($numrow!=0){
                    $cnt=1;
                    echo "
                    <table class='table table-bordered table-hover table-striped'>
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
                            <tbody>";
                    while (($row1 = mysqli_fetch_array($leaves))){
                    echo "<tr>
                    <td>$cnt</td>
                    <td>{$row1['ename']}</td>
                    <td>{$row1['department']}</td>
                    <td>{$row1['year']}</td>
                    <td>{$row1['descr']}</td>
                    <td>{$row1['fromdate']}</td>
                    <td>{$row1['exittime']}</td>
                    <td>{$row1['status']}</td>
                    <td><a href=\"updateStatusAccept.php?eid={$row1['eid']}&descr={$row1['descr']}&user='parent'\"><button class='btn-success btn-sm' >Accept</button></a>
                    <a href=\"updateStatusReject.php?eid={$row1['eid']}&descr={$row1['descr']}&user='parent'\"><button class='btn-danger btn-sm' >Reject</button></a></td>
                    </tr>";  
                    $cnt++; }       
            }
            else{
                echo "<div class = 'alert alert-success'>No active leave requests made by: " . $_SESSION["sess_user"] . ".<div>";
            }
        }
        else{
            echo "Query Error : " . "SELECT * FROM leaves WHERE status='Pending'" . "<br>" . mysqli_error($conn);
        }
        ?>
        </tbody>
    </table>
    </section>



<footer>
    <div>
      <p>&copy; <?php echo date("Y"); ?> - Gate Pass Application</p>
       
    </div>
    </footer>

    <?php
}

ini_set('display_errors', true);
error_reporting(E_ALL);
?>