<?php include('connection.php') ?>
<?php include('friend0friendserver.php') ?>
<?php $j=0; ?>
<html>
<head>
	<link rel="stylesheet" href="friends.css">
	<title>Friends</title>
	<script>
		var counter=1
		function menuvis()
		{
			if(counter==1){
			document.getElementById("settings").style.visibility="visible";
			counter=0;}
			else{
				document.getElementById("settings").style.visibility="hidden";
				counter=1;
			}
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
	</div>
	<form action="friendofriend.php" method="post">
	<h2 style="color:purple;position:absolute;top:10%;left:45%;"><b><i><u>Your friends</b></u></i></h2>
	<br><br>
	<br><br>
	<?php 
		while($i>$j)
		{
		$fid=$friend[$j]['id'];
		$fquery="select count(*) as total from friends where user_id='$fid' and friend_id='$tempfr'";
		$fconn=mysqli_query($db,$fquery);
		$fnum=mysqli_fetch_assoc($fconn);
		$num=$fnum['total'];
		if($num!=0){
		echo "<div class='friends'>";
		if($friend[$j]['prof_pic']){echo '<img src="data:image/jpeg;base64,'.base64_encode( $friend[$j]['prof_pic'] ).'"width="10%" height="70%"/>';}
		else {echo '<img src="profile.png" width="10%" height="70%">';}
		echo "<div class='profile-name'>
		<h4><b><u><i>";
		if($i==$j){echo "No more friends"; break;} 
		else
		{
			echo $friend[$j]['name'];
		}
		echo "</b></u></i></h4>
		<h4><b><u><i>General User</b></u></i></h4>
		</div>
		<button style='position:absolute;left:80%;top:50%;z-index:1;' value=".$friend[$j]['id']." name='button'>View profile</button>
		
		</div><br><br>";}
		$j++;}?>
		</form>
	<div class="settings" id="settings">
			<table>
			<tr><td><form action="settings.php"><button class="settings-b" href="settings.html">Settings</button></form></td></tr>
			<tr><td><form action="login.php"><button class="settings-b" href="login.html">Logout</button></form></td></tr>
			<tr><td><form action="fisrtpagefeed.php" method="post"><button class="settings-b" name="notif">Notification</button></form></td></tr>
			</table>
	<div>
</body>
</html>