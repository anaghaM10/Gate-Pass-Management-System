<?php

require_once("DBConnection.php");

if(!$conn){
    die("Connection Failed");
}

$sql = "SELECT * FROM leaves WHERE status != 'Accepted' and status != 'Rejected'";
                $query = $conn->query($sql);

                echo "$query->num_rows";
?>