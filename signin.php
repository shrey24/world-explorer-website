<?php
session_start();
if(isset($_SESSION["usr"]) && isset($_GET["logout"])){
	if($_GET["logout"]=="true"){
		$_SESSION["usr"].session_unset();
		echo '<h3>you are now logged out..</h3>';
	}else{
		echo "not loged out";
	}
}
?>

<html>
<head>
	<title>Sign in to WorldExplorer</title>
	<link rel="stylesheet" type="text/css" href="./css/bootstrap.min.css" />
	<style type="text/css">
	.form_div{
		background-color: #eeeeee;
		height: 300px;
		width: 400px;
		text-align: center;
		margin: auto;
		box-shadow: 0px 1px 1px ;
		border-radius: 5px;
	}
	.error{
		color: #ff99fd;
	}
	</style>
</head>
<body>
<br><br>

<div class="form_div"><br>
	<h2>Sign in to World Explorer</h2>
	<br>
<form method="POST" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" onsubmit="return validateForm()"
	name="mainForm">

	Name: &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
	<input type="text" name="uname" id="uname"><br><br>
	Password: <input type="Password" name="password" id="pwd" >
  	<br><br>	

  	<input type="submit" id="submit" value="Sign in"><br>
    <span id="err" class="error"></span>

</form>

</div>
<?php

	$conn=mysqli_connect("localhost","root","");
		   mysqli_select_db($conn,"WorldExplorer");

	function Authenticate($name,$pwd){

		 		$statement="SELECT * FROM registration WHERE name='".$name."'";
		 		$result=mysqli_query($GLOBALS['conn'],$statement);

			 	if(mysqli_num_rows($result) > 0 ){	
			 		 //echo "name exist";				 		
			 		$user=mysqli_fetch_assoc($result);
			 		if($name==$user["name"] && $pwd == $user["password"]){
			 			return true;
			 		}
			 		return false;			 		
				 }
				 else{ //user name does not exist
			 	    return false;
			 	 }
			 }	 

	 

		if($_SERVER["REQUEST_METHOD"]=="POST") //exicutes after submit button pressed
		{  
			
			//get input fields
			$name=$_POST['uname'];			
		    $password=$_POST['password'];	
				
			 if(Authenticate($name,$password)){
			 	//aunthentication success
			 	$_SESSION["usr"]=$name;
			 	echo '<script type="text/javascript"> window.location = "http://localhost/World%20Explorer/UserProfile.php";</script>';

			 	
			 }else{
			 	// Authetication fail error
			 	echo '<script type="text/javascript">document.getElementById("err").innerHTML="User name or password incorrect"; </script>';
			 	/*
			 	if(mysqli_query($conn,$sql)){
			 	echo '<script type="text/javascript"> window.location = "http://localhost/World%20Explorer/registration_summary.html";</script>';	
			 	}else{
			 		echo"ERROR: ".mysqli_error($conn);
			 	}			 	
			 */
			 }
		 
			mysqli_close($conn);	
			//$_SERVER["REQUEST_METHOD"]="NULL";
		} 

		
?>

<!--Form validation-->
<script type="text/javascript">
function validateForm() {
    var x = document.forms["mainForm"]["uname"].value;
    if (x == null || x=="" ) {
        alert("user name is empty");
        return false;
    }
    x = document.forms["mainForm"]["password"].value;
    if (x == null || x=="" ) {
        alert("password is empty");
        return false;
    }
}

</script>


<script src="./js/jquery-2.2.0.min.js"></script>
<script src="./js/bootstrap.min.js"></script>
</body>
</html>