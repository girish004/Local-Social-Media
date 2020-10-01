<?php include('server.php') ?>

<!DOCTYPE HTML>
<html>
	<head>
	<Title>Sign-in Form </title>
	</head>
	<body>
		<center>
		<form method="post" action="registration.php">
		Userid:<input type="textbox" id="userid" name="userid"><br>
		emailid::<input type="textbox" id="regno" name="regno"><br>
		Password:<input type="password" id="password" name="password"><br>
		Confirm Password:<input type="password" id="password2" name="password2"><br>
		<button type="submit" id="sub" name="sub">Submit</button>
		</form>
		
	</body>
</html>