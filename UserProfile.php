<?php
session_start();
if(!isset($_SESSION["usr"])){
	echo '<script type="text/javascript"> window.location = "http://localhost/World%20Explorer/signin.php";</script>';
}
?>
<html>
<head>
	<title><?php echo"$_SESSION[usr]";?> - Profile</title>
	<link rel="stylesheet" type="text/css" href="./css/bootstrap.min.css" />
	<style type="text/css">
	#page{
		width: 1200px;
		height: 2000px;
		background-color: #f6f6f6;
		position: relative;
		margin-left: 25px;
		box-shadow: 0px 3px 3px;

	}
/*--horizontal nav----------------------*/	
	ul.h_nav {
    list-style-type: none;
    margin: 0;
    padding: 0;
    overflow: hidden;
    background-color: #333;
    position: fixed;
    top: 0px;
    width: 1200px;
}

	li.h_nav {
	    float: left;
	    border-right:1px solid #bbb;
	}

	li.h_nav:last-child {
	    border-right: none;
	}

	li a.h_nav {
	    display: block;
	    color: white;
	    text-align: center;
	    padding: 14px 16px;
	    text-decoration: none;
	    font-family:  Arial;
	}

	li a.h_nav:hover:not(.active) {
	    background-color: #111;
	}

	.active {
	    background-color: #4CAF50;
	}
/*----------------------------------*/

	.welcome{
		font-size: 40px;
		margin: auto;
		text-align: right;
		padding-top: 100px;
	}
	.subhead{
		font-size: 25px;
		background-color: #ffffff;
		padding: 4px;

	}

	.myPlacesCard{
		width:1050px;
		border-radius: 5px;
		margin: auto;
		margin-top: 5px;
		padding-left: 5px;
		font-family: "Helvetica Neue", Helvetica, sans-serif;
		font-size: 20px;
		background-color:#ffffff;
	}

	</style>
</head>
<body>

	<div id="page">

		<div class="container">
		<div class="jumbotron welcome">
			Welcome <?php echo $_SESSION["usr"];?>

		</div>
		</div>


		<div class="h_nav">
		<ul class="h_nav">
		  <li class="h_nav"><a class="h_nav" href="index.html">Home</a></li>
		  <li class="h_nav"><a class="h_nav" href="#news">services</a></li>
		  <li class="h_nav"><a class="h_nav" href="#contact">packages</a></li>
		  <li class="h_nav"><a class="h_nav" href="#contact">countries</a></li>
		  <li class="h_nav"><a class="h_nav" href="#contact">contact</a></li>
		  <li class="h_nav"><a class="active h_nav" href="http://localhost/World%20Explorer/UserProfile.php">My Dashboard</a></li>
		  <li class="h_nav"><a class="h_nav" href="http://localhost/World%20Explorer/manage_accounts.php">profile settings</a></li>
		  <li class="h_nav" style="float:right"><a class="h_nav" 
		  	href="http://localhost/World%20Explorer/signin.php?logout=true">Sign out</a></li>
		</ul>
		</div>

		<div class="container">
		<div class="subhead">
			Your Interest:			
		</div>	
		</div>
		<div class="myPlacesCard" style="background-color:#c6c9f5"> Dubai </div>
		<div class="myPlacesCard"> singapore </div>
		<div class="myPlacesCard" style="background-color:#c6c9f5"> thiland </div>
		<div class="myPlacesCard"> malaysia </div>








	</div>
<?php
	echo $_SERVER["HTTP_USER_AGENT"];
	echo "Welcome".$_SESSION["usr"];

	print_r($_SESSION);
	//session_unset();
?>


<script src="./js/jquery-2.2.0.min.js"></script>
<script src="./js/bootstrap.min.js"></script>
</body>
</html>