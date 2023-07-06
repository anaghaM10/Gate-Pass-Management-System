<?php 
require_once("DBConnection.php"); 
include("functions.php");
session_start();
?>
<?php

 	if (isset($_POST['login'])) {
	 	if (!empty($_POST['otp'])) {
	 		$otp = mysqli_real_escape_string($conn,$_POST['otp']);
            $login = verifyOTP($otp,$conn);          
	 	}
	 	else{
		 	echo "Required All fields!";
		} 	
 	}
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
        justify-content: center;
        align-items: center;
    }
    form{
        width: 50vw;
        margin-left:15vw;
    }
    input{
        width: 40vw;
        max-width: 500px;
        margin-bottom: 20px;
    }
    button{
        background-color: #da202a;
        margin-left: 180px;
    }
     #invalidMsg{
            display:none;
        }
</style>
<nav class="nav-bar">
        <div class="container-fluid">
            <p id='title'>Gate Pass Application</p>
        </div>
    </nav>
    <section class = "container">

<form method="POST" class="otpForm">
<div class="alert alert-danger" id="invalidMsg">
                    <?php      
                        if(isset($_POST['login'])){
                            if($login == false)
                                echo "<script type='text/javascript'>
                                document.getElementById('invalidMsg').style.display = 'block';
                                </script>";
                                echo "Invalid OTP!";
                        }
                        else
                            echo "";
                    ?>
                    </div>
    <input type="number" class="form-control" name = "otp" id="otp" placeholder="Enter OTP:">
    <button class = "btn btn-danger"id = "login-btn" type="submit" name="login"> Login</button>
</form>
    </section>



<footer>
    <div>
      <p>&copy; <?php echo date("Y"); ?> - Gate Pass Application</p>
       
    </div>
    </footer>