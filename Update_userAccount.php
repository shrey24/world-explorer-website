<?php
session_start();
if(!isset($_SESSION["usr"])){
	echo '<script type="text/javascript"> window.location = "http://localhost/World%20Explorer/signin.php";</script>';
}
?>
<html>
<head>
	<title>UserAccount-Update</title>
<link rel="stylesheet" type="text/css" href="./css/bootstrap.min.css" />
	<style type="text/css">
	.form_div{
		background-color: #eeeeee;
		height: 460px;
		width: 600px;
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
	<h4>Update user profile</h4>
	<br>
<form method="POST" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" onsubmit="return validateForm()"
	name="mainForm">

	Name: <input type="text" name="uname" id="uname"> <span id="nameErr" class="error"></span><br><br>
	Contact:<input type="text" name="phone" id="phone"><span id="phoneErr" class="error"></span> <br><br>
	E-mail: <input type="text" name="mail" id="mail"> <br><br>
	DoB: &nbsp;&nbsp; <input type="text" name="dob" id="dob"> <br><br>
	Country: <select name="country">
				<option value="india" selected>India </option>
				<option value="usa">USA </option>
				<option value="france">France </option>
				<option value="germany">Germany </option>
			 </select> <br><br>

	Password: <input type="Password" name="password" id="pwd" >
	Re-enter: <input type="Password" id="rpwd"><br><br>
	<input type="checkbox" value="checked"> I want to recieve emails and notifications from World Explorer
  	<br><br>

  	<input type="submit" id="submit" value="Update">


</form>

</div>
<?php

	$conn=mysqli_connect("localhost","root","");
		   mysqli_select_db($conn,"WorldExplorer");

	function CheckNameExist($name){

		 		$statement="SELECT * FROM registration WHERE name='".$name."'";
		 		$result=mysqli_query($GLOBALS['conn'],$statement);

			 	if(mysqli_num_rows($result) > 0 ){			 		
			 		 //echo "name exist";	
			 		return true;
				 }
				 else{
			 	    return false;
			 	 }
			 }	 

	 	#show older values
			 // $statement="SELECT * FROM registration WHERE name='".$name."'";
		 	//  $result=mysqli_query($GLOBALS['conn'],$statement);

		#Update to new values

		if($_SERVER["REQUEST_METHOD"]=="POST") //exicutes after submit button pressed
		{  
			
			//get input fields
			$name=$_POST['uname'];
			$phone=$_POST['phone'];
			$mail=$_POST['mail'];
			$country=$_POST['country'];
			$dob=$_POST['dob'];
		    $password=$_POST['password'];	
			
			$user=$_SESSION["usr"];	
			 // if(CheckNameExist($name)){
			 // 	// $nameErr="User name already exist";
			 // 	echo '<script type="text/javascript">document.getElementById("nameErr").innerHTML="User name already exist"; </script>';
			 //}else
			 
			 	//new entry in database
			 	// echo "OK";
			 	// echo "<br>$name $phone $mail $country $dob $password ";
			 	$sql="UPDATE `registration` SET `contact`='".$phone."',`name`='".$name."',
			 	`E-mail`='".$mail."',`DOB`='".$dob."',`country`='".$country."',
			 	`password`='".$password."' WHERE name='".$user."'";
			 	if(mysqli_query($conn,$sql)){
			 	$_SESSION["usr"].session_unset();	
			 	echo '<script type="text/javascript"> window.location = "http://localhost/World%20Explorer/updation_summary.php";</script>';	
			 	}else{
			 		echo"ERROR: ".mysqli_error($conn);
			 	}			 	
			 
		 
			mysqli_close($conn);	
			//$_SERVER["REQUEST_METHOD"]="NULL";
		} 

		
?>

<!--Form validation-->
<script type="text/javascript">
function validateForm() {
    var x = document.forms["mainForm"]["phone"].value;
    if (x == null || x == "") {
        alert("phone must be filled out");
        return false;
    }
}






</script>


<script src="./js/jquery-2.2.0.min.js"></script>
<script src="./js/bootstrap.min.js"></script>
</body>
</html>