<!DOCTYPE html>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<title>Register</title>
<style>
	.error {color:red};
</style>
<link rel="stylesheet"
	href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css"
	integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm"
	crossorigin="anonymous">
<link rel="stylesheet"
	href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<link rel="stylesheet" href="css/style.css" />
</head>
<body>
	

<?php  require 'partials/_nav.php'?>


<?php 

$showAlert=false;
$showError=false;


if($_SERVER['REQUEST_METHOD']=='POST'){
    
	include 'partials/_dbconnect.php';


	if(isset($_POST['email'])&&isset($_POST['password'])&&isset($_POST['cpassword'])){
		
		$email=$_POST['email'];
		$password=$_POST['password'];
		$cpassword=$_POST['cpassword'];
		// $exists=false;

		//check whether this email exists or not 
		$exitSql="SELECT * FROM `users` WHERE email='$email'"; 
		// ALTER TABLE `users` ADD UNIQUE(`email`);
		$result=mysqli_query($conn,$exitSql);

		$numsExitRows=mysqli_num_rows($result);
		if($numsExitRows>0){
			// $exists=true;
			$showError="Email already taken!";
		}
		else{
			// $exists=false;
		if(($password==$cpassword)){
			$hash = password_hash($password, PASSWORD_DEFAULT);
			$sql="INSERT INTO `users` (`email`, `password`, `dt`) VALUES ('$email', '$hash', current_timestamp())";

			$result=mysqli_query($conn,$sql);
			if($result){
				$showAlert=true;
			}
		}
		else{
			$showError="password dosen't match!";
		}
	}

	}

}

?>

<?php 

if($showAlert){

echo '<div class="alert alert-success alert-warning alert-dismissible fade show" role="alert">
<strong>Success!</strong> Your account is created now you can login.
<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>';
}


if($showError){

	echo '<div class="alert alert-danger alert-warning alert-dismissible fade show" role="alert">
	<strong></strong> '.$showError.'
	<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
	</div>';
	}
	

?>

	<div class="loginform">
	<form method="post" action="register.php">

			<div class="icon text-white">
				<i class="fa fa-user"></i>
				<h5>Register form</h5>
			</div>
			<div class="form-group">
				<label for="exampleInputEmail1">Email address</label> <input
					type="text" class="form-control" id="exampleInputEmail1"
					aria-describedby="emailHelp" placeholder="Enter email" name="email" maxlength=30>
				<small id="emailHelp" class="form-text">We'll never share
					your email with anyone else.</small>
			</div>
			<div class="form-group">
				<label for="exampleInputPassword1">Password</label> <input
					type="password" class="form-control" id="exampleInputPassword1"
					placeholder="Password" name="password" maxlength=20>
            <div class="form-group">
				<label for="exampleInputPassword1">confirm-Password</label> <input
					type="password" class="form-control" id="exampleInputPassword1"
					placeholder="Password" name="cpassword">
			</div>
			<div class="form-check">
				<input type="checkbox" class="form-check-input" id="exampleCheck1">
				<label class="form-check-label" for="exampleCheck1">Check me
					out</label>
			</div>
			<button type="submit" class="btn btn-primary">Submit</button>
		</form>
	</div>
</body>
</html>