<?php include('connection.php') ?>
<?php include('commentsserver.php') ?>
<?php $j=0; ?>
<html>
<head>
	<link rel="stylesheet" href="comments.css">
	<title>Comments</title>
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
		<br>
		<form action="comments.php" method="post">
		<textarea style="position:absolute;left:10%;top:110%;" name="words" rows="7" cols="140" placeholder="Enter the comments"></textarea>
		<button name="cmntpost" value="<?php echo $postid; ?>" style="position:absolute;left:80%;top:180%;">Comment</button>
		</form>
	</div>
	<form action="comments.php" method="post">
	<br><br><br><br><br><br>
	<center><h2 style="color:purple;position:relative;"><b><i><u>Comments</b></u></i></h2></center>
		<?php
		if($i==0)
		{}
		else
		{
			while($j<$i)
			{
				echo 
				'<div class="cmnts">';
				if($cmnt[$j]['img']){echo '<img style="" src="data:image/jpeg;base64,'.base64_encode( $cmnt[$j]['img'] ).'"width="10%" height="10%"/>';}
				else {echo '<img src="profile.png" width="10%" height="10%">';}
				echo "<div class='profile-name' style='position:absolute;left:11%;top:10%;'>
				<h4><b><u><i>";
				if($i==$j){echo "No more friends"; break;} 
				else
				{
				echo $cmnt[$j]['name'];
				}
				echo "</div>
				<h2><b><i></b>".$cmnt[$j]['comments']."</i></h2><br><br>
				</div><br><br>
				";$j++;
			}
		}
			
		
		?>
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