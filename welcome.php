<?php 
session_start();
if(!isset($_SESSION['loggined']) || $_SESSION['loggined']!=true){
    header('location:login.php');
    exit;
}
?>

<!DOCTYPE html>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<title>login</title>
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
<div class="container">
<div class="alert alert-success" role="alert">
  <h4 class="alert-heading">welcome-<?php  echo $_SESSION['email']?></h4>
  <p>hey how are you doing?welcome to iSecure.you are loginned as welcome-<?php  echo $_SESSION['email']?>
  Aww yeah, you successfully read this important alert message. This example text is going to run a bit longer so that you can see how spacing within an alert works with this kind of content.</p>
  <hr>
  <p class="mb-0">Whenever you need to, be sure to logout <a href="logout.php">using this link</a>.</p>
</div>
</div>

</body>
</html>