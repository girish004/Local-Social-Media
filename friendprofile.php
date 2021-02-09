<?php include('connection.php')?>
<?php 
$tempfr=$_SESSION['friend'];
if(isset($_POST['makeadmin']))
{
	$var="Yes";
	$adminq="UPDATE users SET admin='$var' WHERE user_id='$tempfr'";
	$adminconn=mysqli_query($db,$adminq);
}
if(isset($_POST['makeuser']))
{
	$var="No";
	$adminq="UPDATE users SET admin='$var' WHERE user_id='$tempfr'";
	$adminconn=mysqli_query($db,$adminq);
}
if(isset($_POST['comment']))
{
	$_SESSION['postid']=$_POST['comment'];
	echo "<script>window.open('comments.php','_self')</script>";
}
$tempfrquery="select * from users where user_id='$tempfr'";
$tempfrconn=mysqli_query($db,$tempfrquery);
$rowtempfr=mysqli_fetch_array($tempfrconn);
?>
<?php $j=0; ?>
<?php include('friendprofileserver.php') ?>
<html>
<head>
	<link rel="stylesheet" href="profile.css">
	<title>Profile</title>
	<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
	<script>
	function like(id)
	{
		var pid=id;
		if(document.getElementById(id).innerHTML=="liked")
		{
			document.getElementById(id).innerHTML="like";
		}
		else{
			document.getElementById(id).innerHTML="liked";
		}
		
$.ajax({ // added {
    url: "/IWPProject/like.php",
    type: "POST",
    data: {
        'postid': pid,
        //'fid':frndid,
		//'fname':fname
    },
    success: function (data) { 
    }
});
	}
	</script>
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
			<form action="firstpagefeed.php"><button class="logo"><img src="feeds.png" width="10%" height="60%" align="center" style="bottom:0;" ></button></form>
			<form action="profile.php"><button class="logo"><img src="profile.png" width="10%" height="60%" align="center" ></button></form>
			<button class="slide-menu" onclick="menuvis();"><img src="purplemenu.jpg" width="50%" height="60%" align="center"></button>
		</center>
	</div>
	<div class="profile">
		<?php //if($rowtempfr['user_cover']!=""){echo '<img style="position:relative;left:8%;" src="data:image/jpeg;base64,'.base64_encode($rowtempfr['user_cover'] ).'" width="80%" height="300px"/>';}
		//else {echo '<img src="profile.png" width="90%" height="60%"/>';} ?>
		<div class="prof-pics">
		<?php //if($rowtempfr['user_image']!=""){ echo '<img src="data:image/jpeg;base64,'.base64_encode($rowtempfr['user_image'] ).'" width="20%" height="150"/>';}
		//else { echo '<img src="profile.png" width="20%" height="150px">';}?>
		</div>
		<?php if($rowtempfr['user_cover']!=""){echo '<img style="position:relative;left:5%;" src="data:image/jpeg;base64,'.base64_encode( $rowtempfr['user_cover'] ).'" width="90%" height="300px"/>';}
		else {echo '<img src="profile.png" width="90%" height="300px"/>';} ?>
		<?php if($rowtempfr['user_image']!=""){ echo '<img src="data:image/jpeg;base64,'.base64_encode( $rowtempfr['user_image'] ).'" width="20%" height="150px"/>';}
		else { echo '<img src="profile.png" width="20%" height="150px">';} ?>
		<div class="profile-name">
		<h4><b><u><i><?php echo $rowtempfr['user_name'] ?></b></u></i></h4>
		<h4><b><u><i><?php if($rowtempfr['admin']=='Yes'){echo 'Admin user';}
		else{echo 'General user';} ?></b></u></i></h4>
		</div>
		<div class="about">
		<form action="friendprofile.php" method="post">
		<?php if($rowtempfr['privacy']=='Yes'){
			if($res['total']==0){echo '<button name="set" style="position:absolutete;border:none; width:60%;" disabled>About</button><br><br>';}
		else{echo '<button name="set" style="position:absolutete;border:none; width:60%;">About</button><br><br>';}}
		else
		{echo '<button name="set" style="position:absolutete;border:none; width:60%;">About</button><br><br>';}?>
		<?php if($rowtempfr['privacy']=='Yes'){
			if($res['total']==0){echo '<button style="position:absolute;border:none;width:60%;" value='.$tempfr.' href="friends.html" name="button" disabled>Friends</button><br><br>';}
			else{echo '<button style="position:absolute;border:none;width:60%;" value='.$tempfr.' href="friends.html" name="button">Friends</button><br><br>';}
		}
		else{echo '<button style="position:absolute;border:none;width:60%;" href="friends.html" value='.$tempfr.' name="button">Friends</button><br><br>';}?>
		<!---<form action="friends.php"><button style="position:absolute;border:none;width:60%;cursor:not-allowed;" href="friends.html">Friends</button><br><br></form>--->
		<?php if($admin=="Yes") {;
		if($rowtempfr['admin']=="Yes"){echo '<button style="position:absolute;border:none;width:60%;" href="friends.html" value='.$tempfr.' name="makeuser">Demote to user</button><br><br>';}
		else{echo '<button style="position:absolute;border:none;width:60%;" href="friends.html" value='.$tempfr.' name="makeadmin">Promote to admin</button><br><br>';}}?>
		<?php if($one['total1']==0 && $two['total2']==0)
		{echo '<button style="position:absolute;border:none;width:60%;visibility:" name="addfrnd" value='.$tempfr.'>Add friend</Button>';}
		else if($one['total1']==1 && $two['total2']==0)
		{echo '<button style="position:absolute;border:none;width:60%;visibility:" name="delfrnd" value='.$tempfr.'>Requested/Remove friend</Button>';}
		else if($one['total1']==0 && $two['total2']==1)
		{echo '<button style="position:absolute;border:none;width:60%;visibility:" name="addfrnd" value='.$tempfr.'>Accept Request</Button>';}
		else if($one['total1']==1 && $two['total2']==1)
		{echo '<button style="position:absolute;border:none;width:60%;visibility:" name="delfrnd" value='.$tempfr.'>Remove friend</Button>';}
		?>	
		</form>
		</div>
		<br><br>
		</div>
		<div class="newsfeed">
		<center><h3 style="color:purple;"><b><u><i>Your Wall</b></u></i></h3></center>
		
		<?php 
		if($i==0){echo '<h1>No posts from the user</h1>';}
		else{
			while($j<$i)
			{echo '<div class="news" id="news">
			<br>
			<table border="0">
			<tr><td width="5%">';if($rowtempfr['user_image']){echo '<img src="data:image/jpeg;base64,'.base64_encode($rowtempfr['user_image'] ).'" width="100%" height="10%"/>';}
			else{echo '<img src="profile.png" width="100%" height="10%">';}echo '
			<td><h3><b><i><a href="">'.$frndpost[$j]['username'].'</a></b></i></h3></td></tr>';
			if($frndpost[$j]['caption']){echo '<tr><td colspan="2">'.$frndpost[$j]['caption'].'</td></tr>';}
			if($frndpost[$j]['post_image']){echo '<tr><td colspan="2"><img src="data:image/jpeg;base64,'.base64_encode( $frndpost[$j]['post_image'] ).'" width="60%" height="100%"/></td></tr>';}echo '
			<tr><td><a href="likesview.php?pid='.$frndpost[$j]['postid'].'">likes</a></td></tr><tr><td>';
			if($frndpost[$j]['like']==0){echo '<button id="'.$frndpost[$j]['postid'].'" onclick="javascript:like('.$frndpost[$j]['postid'].');" >like</button>';}
			else{ echo '<button id="'.$frndpost[$j]['postid'].'" onclick="javascript:like('.$frndpost[$j]['postid'].');" >liked</button>'; } echo '</td><td><form method="post" action="friendprofile.php"><br><button name="comment" value="'.$frndpost[$j]['postid'].'" >comment</button></form></td></tr>
			</table>
			</div>';
			$j++;
			}
		}?>
		
	</div>
	<div class="settings" id="settings">
			<table>
			<tr><td><form action="settings.php"><button class="settings-b" href="settings.html">Settings</button></form></td></tr>
			<tr><td><form action="login.php"><button class="settings-b" href="login.html">Logout</button></form></td></tr>
			<tr><td><form action="fisrtpagefeed.php" method="post"><button class="settings-b" name="notif">Notification</button></form></td></tr>
			</table>
	<div>
</body>
<html>
