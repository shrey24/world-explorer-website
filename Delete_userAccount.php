<?php
session_start();
if(!isset($_SESSION["usr"])){
	echo '<script type="text/javascript"> window.location = "http://localhost/World%20Explorer/signin.php";</script>';
}
?>
<html>
<head>
	<title>UserAccount-delete</title>
</head>
<body>
<?php 

$conn=mysqli_connect("localhost","root","");
	mysqli_select_db($conn,"WorldExplorer");
$name=$_SESSION["usr"]; //To be replaced with logedin user

$sql="DELETE FROM registration WHERE name='".$name."'";

if(mysqli_query($conn,$sql)){
	$_SESSION["usr"].session_unset();
	echo "<h1>.$name. is deleted<h1>";
}else{
	echo "Error in deleting";
}

?>


</body>
</html>