<?php include('connection.php') ?>
<?php
$pid=$_GET['pid'];
$queryf="select * from likes where postid='$pid'";
$conn=mysqli_query($db,$queryf);
$i=0;
while($rowf=mysqli_fetch_array($conn))
{
	$friend[$i]['name']=$rowf['username'];
	//$friend[$i]['prof_pic']=$rowf['friend_profile'];
	$friend[$i]['id']=$rowf['userid'];
	$temp=$rowf['userid'];
	$friendspicq="select * from users where user_id='$temp'";
	$friendspicconn=mysqli_query($db,$friendspicq) or die("Cannot connect to the tables '$userid'");
	$friendspicrow=mysqli_fetch_array($friendspicconn);
	$friend[$i]['prof_pic']=$friendspicrow['user_image'];
	$i++;
}
if(isset($_POST['button']))
{
	$_SESSION['friend']=$_POST['button'];
	if($_POST['button']==$id)
	{echo "<script>window.open('profile.php','_self')</script>";}
	else
	{echo "<script>window.open('friendprofile.php','_self')</script>";}
}

?>
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
	<form action="friends.php" method="post">
	<h2 style="color:purple;position:absolute;top:10%;left:45%;"><b><i><u>Friends who liked</b></u></i></h2>
	<br><br>
	<br><br>
	<?php 
		while($i>$j)
		{
		$fid=$friend[$j]['id'];
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
		
		</div><br><br>";
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