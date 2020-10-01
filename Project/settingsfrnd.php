<?php include('connection.php')?>
<?php include('settingsfrndserver.php')?>
<html>
<head>
	<title>Settings</title>
	<link rel="stylesheet" href="settings.css">
	<script>
	function menuvis()
	{
		document.getElementById("settings").style.visibility="visible";
	}
	function edit()
	{
		//document.getElementById("details").style.visibility="visible";
		//document.getElementById("save").style.visibility="visible";
		
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
		<table align="center">
			<tr>
			<td >How your name should visible to others/Your name:  </td>
			<td ><?php echo $fname ?></td></tr>
			<tr><td >Your Hobby</td>
			<td ><?php echo $fhobby ?></td>
			</tr>
			<tr>
			<td >Year of graduation</td>
			<td ><?php echo $fgrad ?></td></tr>
			<tr><td >Date of Birth</td>
			<td ><?php echo $fdob ?></td>
			<tr>
			<td >Skills</td>
			<td ><?php echo $fskills ?></td></tr>
			<tr><td >Area of interest</td>
			<td ><?php echo $finterest ?></td></tr>
			<tr>
			<td >Bio</td>
			<td ><?php echo $fbio ?></td></tr>
			<tr><td >Privacy View</td>
			<td ><?php echo $fprivacy ?></td>
			</tr>
		</table>
	</div>
	<div class="settings" id="settings">
		<table>
		<tr><td style="height:auto;"><form action="settings.php"><button class="settings-b" href="settings.html">Settings</button></form></td></tr>
		<tr><td style="height:auto;"><form action="login.php"><button class="settings-b" href="login.html">Logout</button></form></td></tr>
		</table>
	<div>
</body>
</html>