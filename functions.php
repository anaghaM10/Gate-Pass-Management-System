<?php
require_once("DBConnection.php");
?>

<?php

function encryption($password)
{
    $BlowFishFormate = "$2y$10$";
    $salt = generateSalt(22);
    $BlowFish_Plus_Salt = $BlowFishFormate . $salt;
    $Hash = crypt($password, $BlowFish_Plus_Salt);

    return $Hash;
}

function generateSalt($length)
{
    $uniqueRandomString = md5(uniqid(mt_rand(), true));
    $base64String = base64_encode($uniqueRandomString);
    $modifiedBase64String = str_replace('+', '.', $base64String);
    $salt = substr($modifiedBase64String, 0, $length);

    return $salt;
}

function passwordCheck($password, $existingHash)
{
    $Hash = crypt($password, $existingHash);
    if ($Hash === $existingHash)
        return true;
    else
        return false;
}
function verifyOTP($otp)
{
    if ($otp == $_SESSION['otp']) {
        header("Location: guardian.php");
    } else {
        return false;
    }
}
function generateOTP($gemail)
{
    $to = $gemail;
    $otp = (string)rand(100000, 999999);
    $_SESSION['otp'] = $otp;
    $subject = 'OTP for Gate Pass Application';
    $message = 'The OTP for logging into the Gate Pass Application is: ' . $otp;
    $headers = "From: anuanaghamenon@gmail.com";
    if(mail($to, $subject, $message, $headers)){
        return true;
    }
    else{
       return false;
    }
}
function login_parent($gemail, $conn)
{
    $query = mysqli_query($conn, "SELECT * FROM users WHERE gnmail='" . $gemail . "'");
    $numrows = mysqli_num_rows($query);
    if ($numrows != 0) {
        while ($row = mysqli_fetch_assoc($query)) {
            $dbusername = $row['name'];
            $id = $row['id'];
        }
        $_SESSION['sess_user'] = $dbusername;
        $_SESSION['sess_eid'] = $id;
        $x = generateOTP($gemail);
        if($x){
            header("Location: verify-otp.php");
        }
        else{
            header("Location: parent_login.php");
        }
        header("Location: verify-otp.php");
    } else {
        return false;
    }
}
function login($username, $password, $conn)
{
    $query = mysqli_query($conn, "SELECT * FROM users WHERE name='" . $username . "'");
    $numrows = mysqli_num_rows($query);
    if ($numrows != 0) {
        while ($row = mysqli_fetch_assoc($query)) {
            $dbusername = $row['name'];
            $dbpassword = $row['password'];
            $type = $row['type'];
            $id = $row['id'];
        }
        if ($username == $dbusername && passwordCheck($password, $dbpassword)) {

            $_SESSION['sess_user'] = $username;
            $_SESSION['sess_eid'] = $id;
            //Redirect Browser
            if ($type == "admin") {
                header("Location:admin.php");
            } elseif ($type == "security") {
                header("Location:security.php");
            } else {
                header("Location:leaveAplicationForm.php");
            }
            return true;
        }
    } else {
        //echo "Invalid Username or Password";
        return false;
    }
}

function signup($fullname, $name, $email, $password, $phone, $repassword, $gender, $yr, $dept, $type, $gemail, $conn)
{
    $hashedPassword = encryption($password);

    $query = mysqli_query($conn, "INSERT INTO users(fullname, name, email, phone, password, gender,year,  department, type,gnmail) VALUES('$fullname','$name','$email','$phone','$hashedPassword','$gender','$yr','$dept','$type','$gemail')");
    $query1 = mysqli_query($conn, "SELECT id from users WHERE name='" . $name . "'");
    $eid = mysqli_fetch_assoc($query1);

    if ($query) {


        echo 'Registration successful!!';

        $_SESSION['sess_user'] = $name;
        $_SESSION['sess_eid'] = $eid['id'];

        header("Location:leaveAplicationForm.php");
        exit;
    } else {
        echo "Query Error : " . "INSERT INTO users(fullname, name, email, phone, password, gender,department, type) VALUES('$fullname','$name','$email','$phone','$hashedPassword','$gender','$dept','$type')" . "<br>" . mysqli_error($conn);
        echo "<br>";
        echo "Query Error : " . "SELECT id from users WHERE name='" . $name . "'" . "<br>" . mysqli_error($conn);
    }
}

?>