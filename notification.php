<?php include('connection.php') ?>
<?php $j=0; ?>
<html>
<head>
	<link rel="stylesheet" href="comments.css">
	<title>Comments</title>
	<script>
	function menuvis()
	{
		document.getElementById("settings").style.visibility="visible";
	}
	</script>
</head>
<body bgcolor="#F4ECF7">
	<div class="options">
			<center>
			<form action="firstpagefeed.php"><button class="logo"><img src="feeds.png" width="10%" height="60%" align="center" ></button></form>
			<form action="profile.php"><button class="logo" href="profile.html"><img src="profile.png" width="10%" height="60%" align="center" ></button></form>
			<button class="slide-menu" onclick="menuvis();"><img src="purplemenu.jpg" width="50%" height="60%" align="center"></button>
		</center>
		<br>
	</div>
	
	<?php

	$notifi="select * from notification where userid='$id' order by id desc";
	$notifconn=mysqli_query($db,$notifi);
	while($notifrow=mysqli_fetch_array($notifconn))
	{
		echo '<div class="cmnts" style="height:20%;">';
	if($notifrow['attribute']=="Friends")
	{
		echo '<h3><u><i>'.$notifrow['friendname'].'</u></i> gave you a connection request. His/Her userID is <u><i>'.$notifrow['userid'].'</u></i>';
	}
	if($notifrow['attribute']=="Comments")
	{
		echo '<h3><u><i>'.$notifrow['friendname'].'</u></i> Commented on your post. Comment: <u><i>'.$notifrow['caption'].'</u></i>';
	}
	if($notifrow['attribute']=="Liked")
	{
		echo '<h3><u><i>'.$notifrow['friendname'].'</u></i> Liked your post.</u></i>';
	}
	echo '</div>';
	
	}
	
	
	?>
	
	
	<div class="settings" id="settings">
		<table>
		<tr><td><form action="settings.php"><button class="settings-b" href="settings.html">Settings</button></form></td></tr>
		<tr><td><form action="login.php"><button class="settings-b" href="login.html">Logout</button></form></td></tr>
		</table>
	<div>
</body>
</html>