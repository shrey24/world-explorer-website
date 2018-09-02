<?php
session_start();
if(!isset($_SESSION["usr"])){
	echo '<script type="text/javascript"> window.location = "http://localhost/World%20Explorer/signin.php";</script>';
}
?>
<html>
<head>
	<title>ManageUserAccount</title>
	<link rel="stylesheet" type="text/css" href="./css/bootstrap.min.css" />
	<style type="text/css">
	.countryDock{
	height: 300px;
	width: 650px;
	margin: auto;
}

	.click_photo{
	display: block;
	width: 300px;
    height:200px;
    float: left;
    text-decoration: none;
    /*margin: 20px 0px 20px 20px;*/ /*top right bottom left*/
    background-size: 300px 300px;
    overflow: hidden;
    background-color: #dfe2df;
    text-align: center;
	vertical-align: middle;
	padding: 30px;
	margin: 3px;
    /*background-image: url('malesia.jpg');
    background-repeat: no-repeat;
    */
}

</style>
</head>
<body>
<div class="container">
	<div class="jumbotron" style="text-align: center;">
		<h3>Manage User Account settings</h3>

	</div>
</div>

<div class="container">
	<div class="countryDock">
	<a class="click_photo" href="http://localhost/World%20Explorer/update_userAccount.php"><h3>Update account</h3>	</a>
	<a class="click_photo" href="http://localhost/World%20Explorer/delete_userAccount.php" style="float: right;"><h3>Delete Account</h3>	</a>
	
	</div>
</div>	




<script src="./js/jquery-2.2.0.min.js"></script>
<script src="./js/bootstrap.min.js"></script>
</body>
</html>