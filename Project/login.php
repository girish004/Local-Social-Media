<?php include('loginserver.php')?>
<html>
	<head>
	<title>Log-in page</title>
	<link rel="stylesheet" href="login.css">
	<!--<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">-->
	<!--<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>-->
	<script>
	function Visible()
	{
		document.getElementById("medialogo").height=200;
		document.getElementById("medialogo").width=200;
		document.getElementById("ba").innerHTML="";
		document.getElementById("details").style.visibility="visible";
		document.getElementById("picture").style.backgroundColor="#DA70D6";
		document.getElementById("logo").style.backgroundColor="#E39FF6";
	}
	</script>
	</head>
	<body bgcolor="#F4ECF7">
		<div class="first-line">
			<!---<img src="logo.jpg" width="10%" height="40%">--->
			<h1 class="first-line-h1">Let's Media</h1>
			<div class="first-line-right">
				<button class="first-line-button">Author's info</button>
			</div>
		</div>
		<br>
		<div class="total-pic">
		<div class="picture" id="picture">
			<center><img src="networking.jpg"  width="80%" height="80%" style="margin-left: auto; margin-right: auto;"></center><br>
			<center><h2 class="p-picture">Hello there Neighbor..Wanna know What's up.? Click here to 
			<button class="log-in-v" onclick="Visible()">login</button></h2></center>
		</div>
		<div class="logo" id="logo">
		<br><br><br><br>
			<center><img src="letsmedia.png" width="70%" height="50%" id="medialogo"></center> 
			<center><h1 class="first-line-h1" id="ba">The ultimate destination to know your local news</h1></center>
			<center><table id="details" width="90%" class="form" border="0" style="visibility:hidden">
			<form action="login.php" method="post"><tr><td ><input class="box" type="text" placeholder="Enter your username" name="userid"/></td></tr>
			<tr><td><input class="box" type="password" placeholder="Enter your password" name="password"/></td></tr>
			<center><tr><td align="center">
			<button class="submit" id="details" href="firstpagefeed.html" name="submit">Submit</button></form></td></tr></center>
			</table></center>
		</div>
		</div>
</html>