<?php include('connection.php')?>
<?php include('settingsserver.php')?>
<?php
	$query="select * from users where user_id='$userid'";
	$con=mysqli_query($db,$query);
	$row=mysqli_fetch_array($con);
	$name=$row['user_name'];
	$id=$row['user_id'];
	$fullname=$row['user_fullname'];
	$gender=$row['user_gender'];
	$mail=$row['user_email'];
	$profpic=$row['user_image'];
	$cover=$row['user_cover'];
	$postid=$row['user_posts'];
	$hobby=$row['hobby'];
	$grad=$row['yeargrad'];
	$skills=$row['skills'];
	$interest=$row['interests'];;
	$bio=$row['bio'];
	$dob=$row['dob'];
	$privacy=$row['privacy'];
	$admin=$row['admin'];
?>	
<html>
<head>
	<title>Settings</title>
	<link rel="stylesheet" href="settings.css">
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
	function edit()
	{
		//document.getElementById("details").style.visibility="visible";
		document.getElementById("save").style.visibility="visible";
		
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
	<div class="settingsmain">
		<center><h2 style="color:purple;"><b><u><i>Details Updation</b></u></i></h2></center>
		<form method="POST" action="settingschange.php" enctype="multipart/form-data"><table align="center">
			<tr>
			<td>How your name should visible to others/Your name</td>
			<td><input type="text" name="name" id="name" value="<?php echo $name; ?>"></td></tr>
			<tr><td>Your hobby</td>
			<td><input type="text" id="hobby" name="hobby" value="<?php echo $hobby ?>"></td>
			</tr>
			<tr>
			<td >Year of graduation</td>
			<td ><input type="text" name="gradyear" id="gradyear" value="<?php echo $grad ?>"></td></tr>
			<tr><td >Date of Birth</td>
			<td ><input type="date" name="dob" id="dob" value="<?php echo $dob ?>"></td>
			</tr>
			<tr>
			<td >Profile Picture Upload(Image of size 512 * 512)</td>
			<td ><input type="file" id="profpic"name="profpic" name="profpic"></td></tr>
			<tr><td >Cover Photo Upload(Image of size 512 * 512)</td>
			<td ><input type="file" id="coverpic" id="coverpic" name="coverpic" ></td>
			</tr>
			<tr>
			<td >Skills</td>
			<td ><input type="text" id="skills" name="skills"value="<?php echo $skills ?>"></td></tr>
			<tr><td >Area Of interest</td>
			<td ><input type="text" id="interest" name="interest"value="<?php echo $interest ?>"></td>
			</tr>
			<tr>
			<td >Bio</td>
			<td ><input  type="textarea" height="30%" id="bio" value="<?php echo $bio ?>" name="bio"></td></tr>
			<tr><td >Privacy View</td>
			<td ><input type="radio" id="privacy" name="privacy" value="Yes">Yes
			<input type="radio" id="privacy" name="privacy" value="No">No</td>
			</tr>
		</table>
		
		<button style="position:absolute;color:white;top:95%;left:80%;" type="submit" name="save" id="save">Save Changes</button>
		</form>
	</div>
	<div class="settings" id="settings">
			<table>
			<tr><td><form action="settings.php"><button class="settings-b" href="settings.html">Settings</button></form></td></tr>
			<tr><td><form action="login.php"><button class="settings-b" href="login.html">Logout</button></form></td></tr>
			<tr><td><form action="fisrtpagefeed.php" method="post"><button class="settings-b" name="notif">Notification</button></form></td></tr>
			</table>
	<div>
</body>
</html>