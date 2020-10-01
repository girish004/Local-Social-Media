<?php include('connection.php')?>
<?php include('profileserver.php')?>
<?php $j=0; ?>
<html>
<head>
	<link rel="stylesheet" href="profile.css">
	<title>Profile</title>
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
			<form action="firstpagefeed.php"><button class="logo"><img src="feeds.png" width="10%" height="60%" align="center" style="bottom:0;" ></button></form>
			<button class="logo"><img src="profile.png" width="10%" height="60%" align="center" ></button>
			<button class="slide-menu" onclick="menuvis();"><img src="purplemenu.jpg" width="50%" height="60%" align="center"></button>
		</center>
	</div>
	<div class="profile">
	<br>
		<?php //if($cover!=""){ 
		//echo '<img src="data:image/jpeg;base64,'.base64_encode($cover).'" style="position:relative;left:12%;" width="70%"  height="300px"/>';}
		//else { echo '<img src="profile.png" width="90%" height="300px"/>'; } ?>
		<div class="prof-pics">
		<?php //if($profpic!=""){ echo '<img src="data:image/jpeg;base64,'.base64_encode($profpic).'" width="20%" height="130px"/>';}
		//else { echo '<img src="profile.png" width="20%" height="150px"/>'; } ?>
		</div>
		<?php if($cover!=""){echo '<img style="position:relative;left:5%;" src="data:image/jpeg;base64,'.base64_encode( $cover ).'" width="90%" height="300px"/>';}
		else {echo '<img src="profile.png" width="90%" height="300px"/>';} ?>
		<?php if($profpic!=""){ echo '<img src="data:image/jpeg;base64,'.base64_encode( $profpic ).'" width="20%" height="150px"/>';}
		else { echo '<img src="profile.png" width="20%" height="150px">';} ?>
		<div class="profile-name"><!--<style="width:20%;height:25%;"style="width:60%;height:10%;">-->
		<h4><b><u><i><?php echo $name; ?></b></u></i></h4>
		<h4><b><u><i><?php if($admin=='Yes'){echo 'Admin user';}
		else{echo 'General user';} ?></b></u></i></h4>
		</div>
		<div class="about">
		<form action="settings.php"><button style="position:absolutete;border:none; width:60%;">About</button><br><br></form>
		<form action="friends.php"><button style="position:absolute;border:none;width:60%;" href="friends.html">Friends</button><br><br></form>	
		</div>
	</div>
	<div class="newsfeed">
		<form action="profile.php" method="post">
		<br><br>
		<?php 
		if($i==0){echo '<center><h1 style="color:purple;">No posts from you</h1></center>';}
		else{
			while($j<$i)
			{echo '<div class="news" id="news">
			<br>
			<table border="0">
			<tr><td width="5%"><img src="data:image/jpeg;base64,'.base64_encode( $profpic ).'" width="100%" height="10%"/></td>
			<td><h3><b><i><a href="">'.$name.'</a></b></i></h3></td></tr>
			<tr><td colspan="2">'.$mypost[$j]['caption'].'</td></tr>
			<tr><td colspan="2"><img src="data:image/jpeg;base64,'.base64_encode( $mypost[$j]['post_image'] ).'" width="60%" height="100%"/></td></tr>
			<tr><td><button>like</button></td><td><button>comment</button></td></tr>
			</table>
			</div><br><br><br>';
			$j++;
			}
		}?>
	</div>
	</form>
	<div class="settings" id="settings">
		<table>
		<tr><td><form action="settings.php"><button class="settings-b" href="settings.php">Settings</button></form></td></tr>
		<tr><td><form action="login.html"><button class="settings-b" href="login.php">Logout</button></form></td></tr>
		</table>
	<div>
</body>
<html>
