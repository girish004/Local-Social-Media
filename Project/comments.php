<?php include('connection.php') ?>
<?php include('commentsserver.php') ?>
<?php $j=0; ?>
<html>
<head>
	<link rel="stylesheet" href="comments.css">
	<title>Friends</title>
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
	</div>
	<form action="comments.php" method="post">
	<h2 style="color:purple;position:absolute;top:10%;left:45%;"><b><i><u>Comments</b></u></i></h2>
		<?php
		if($i==0)
		{}
		else
		{
			while($j<$i)
			{
				echo 
				'<div class="cmnts">';
				if($cmnt[$j]['img']){echo '<img src="data:image/jpeg;base64,'.base64_encode( $cmnt[$j]['img'] ).'"width="10%" height="10%"/>';}
				else {echo '<img src="profile.png" width="10%" height="70%">';}
				echo "<div class='profile-name'>
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
		</table>
	<div>
</body>
</html>