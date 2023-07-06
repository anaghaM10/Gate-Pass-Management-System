<?php
require 'DBConnection.php';
?>
<?php
if(isset($_POST['update'])){
	//$location=mysqli_real_escape_string($con,$_POST['location']);
	//$name=mysqli_real_escape_string($con,$_POST['name']);
	$id = $_POST['id'];
    $fullname = mysqli_real_escape_string($conn,$_POST['fullname']);
    $name =mysqli_real_escape_string($conn,$_POST['name']);
    $email=mysqli_real_escape_string($conn,$_POST['email']);
    $gender =mysqli_real_escape_string($conn,$_POST['gender']);
    $department =mysqli_real_escape_string($conn,$_POST['department']);
    $year =mysqli_real_escape_string($conn,$_POST['year']);
    $phone =mysqli_real_escape_string($conn,$_POST['phone']);
    $gnmail =mysqli_real_escape_string($conn,$_POST['gnmail']);

	//$attendant=mysqli_real_escape_string($con,$_POST['attendant']);


	  // if($fullname=='' && $name==''){
	//	echo"<script>alert('please fill all field')</script>";
	//	echo"<script>window.open('edit.php','_self')</script>";
	//	exit();
	 //}
        $update="UPDATE `users` SET `fullname` = '$fullname', `name` = '$name', `email` = '$email', `gender` = '$gender',`department` = '$department',`year` = '$year',`phone` = '$phone', `gnmail` = '$gnmail' WHERE `id`='$id';";
        $run_update=mysqli_query($conn,$update);
		//$update="UPDATE `parkings` SET `price` = '$price', `slot` = '$slot' where `street` = '$street';";
		//$run_update=mysqli_query($con,$update);
		if($run_update){
			echo"<script>alert('Successful added!')</script>";
			echo"<script>window.open('registeredstudents.php','_self')</script>";

		}
		else{
			echo"<script>alert('Error please try again')</script>";
			echo"<script>window.open('edit.php','_self')</script>";
		}
}

?>
