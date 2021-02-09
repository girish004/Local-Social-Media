
<?php include('connection.php') ?>
<?php include('firstpagefeedserver.php')?>
<?php $l=0; ?>
<?php if(isset($_POST['button']))
{
	$_SESSION['friend']=$_POST['button'];
	echo "<script>window.open('friendprofile.php','_self')</script>";
}
if(isset($_POST['comment']))
{
	$_SESSION['postid']=$_POST['comment'];
	echo "<script>window.open('comments.php','_self')</script>";
}?>
<html>
	<head>
	<style>
	
	</style>
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
	<title>News feeds</title>
	<link rel="stylesheet" href="firstpagefeed.css">
	</head>
	<body bgcolor="#F4ECF7">
		<div class="options">
			<center>
				<button class="logo"><img src="feeds.png" width="10%" height="60%" align="center" ></button>
				<form action="profile.php"><button class="logo" href="profile.html"><img src="profile.png" width="10%" height="60%" align="center" ></button></form>
				<button class="slide-menu" onclick="menuvis();"><img src="purplemenu.jpg" width="50%" height="60%" align="center"></button>
			</center>
		</div>
		<div class="recent-connection">
		<br><form action="firstpagefeed.php" method="post" enctype="multipart/form-data">
		<center><input type="text" name="search" placeholder="Enter friend id to search for friends"/><button name="find">Search</button></center></form>
		<form action="firstpagefeed.php" method="post" enctype="multipart/form-data">
		<center><h3><b><i>Recently Added Friends</b></i></h3></center>
			<table border="0">
				<tr><td width="20%"><?php if($friend[0]['pic']){echo '<img src="data:image/jpeg;base64,'.base64_encode($friend[0]['pic']).'" width="70%" height="6%"/>';}
			  else{ echo '<img src="profile.png" width="60%" height="10%">' ;} ?></td>
				<td align="left"><button style="width:80%;color:white;" value="<?php echo $friend[0]['id']; ?>" name="button"><h3><b><i><?php echo $friend[0]['name']; ?></b></i></h3></button></td></tr>
				<tr><td><?php if($friend[1]['pic']){echo '<img src="data:image/jpeg;base64,'.base64_encode($friend[1]['pic']).'" width="70%" height="6%"/>';}
			  else{ echo '<img src="profile.png" width="60%" height="10%">' ;} ?></td>
				<td align="left"><button style="width:80%;color:white;" value="<?php echo $friend[1]['id']; ?>" name="button"><h3><b><i><?php echo $friend[1]['name']; ?></b></i></h3></button></td></tr>
				<tr><td><?php if($friend[2]['pic']){echo '<img src="data:image/jpeg;base64,'.base64_encode($friend[2]['pic']).'" width="70%" height="6%"/>';}
			  else{ echo '<img src="profile.png" width="60%" height="10%">' ;} ?></td>
				<td align="left"><button style="width:80%;color:white;" value="<?php echo $friend[2]['id']; ?>" name="button"><h3><b><i><?php echo $friend[2]['name']; ?></b></i></h3></button></td></tr>
				<tr><td><?php if($friend[3]['pic']){echo '<img src="data:image/jpeg;base64,'.base64_encode($friend[3]['pic']).'" width="70%" height="6%"/>';}
			  else{ echo '<img src="profile.png" width="60%" height="10%">' ;} ?></td>
				<td align="left"><button style="width:80%;color:white;" value="<?php echo $friend[3]['id']; ?>" name="button"><h3><b><i><?php echo $friend[3]['name']; ?></b></i></h3></button></td></tr><!--</tr>-->
			</table>
			<img src="friends.png"/>
		</div>
		<div class="posts" id="posts" >
		<?php if($profpic){echo '<img src="data:image/jpeg;base64,'.base64_encode( $profpic ).'" width="10%" height="10%"/>';}
			  else{ echo '<img src="profile.png" width="10%" height="10%">' ;} ?>
		<!--<form action="firstpagefeed.php" method="post" enctype="multipart/form-data">-->
		<textarea id="post-t" name="caption" class="post-t" rows="7" cols="100" placeholder="What's interesting right now" style="border-color:purple;" ></textarea>
		<?php if($admin=='No'){ echo '<button class="store" id="store" disabled>Post</button>';}
		else{ echo '<button class="store" id="store" name="post" >Post</button>';}?>
		<input type="file" id="upload" name="upload" class="pic-upload" style="position:absolute;top:50%;left:85%">
		<!--</form>-->
		</div>
		</form>
		<?php 
		while($l<$k)
		{
		echo '
		<div class="news" style="position:relative;">
		<br>
			<table border="0">
			<tr><td width="5%">';if($post[$l]['user_image']){echo '<img src="data:image/jpeg;base64,'.base64_encode($post[$l]['user_image']).'" width="100%" height="10%"/>';}
			else{echo '<img src="profile.png" width="100%" height="10%">';}echo '</td>
			<td><h3><b><i><a href="">'.$post[$l]['name'].'</a></b></i></h3></td></tr>
			<tr><td colspan="2">'.$post[$l]['caption'].'</td></tr>';
			if($post[$l]['image']){echo '<tr><td colspan="2"><img src="data:image/jpeg;base64,'.base64_encode( $post[$l]['image'] ).'" width="60%" height="100%"/></td></tr>';}
			echo '<tr><td><a href="likesview.php?pid='.$post[$l]['id'].'">likes</a></td></tr><tr><td><br>';
			if($post[$l]['like']==0){echo '<button id="'.$post[$l]['id'].'" onclick="javascript:like('.$post[$l]['id'].');" >like</button>';}
			else{ echo '<button id="'.$post[$l]['id'].'" onclick="javascript:like('.$post[$l]['id'].');" >liked</button>
		'; }  /*'<button id="'.$post[$l]['id'].'" onclick="javascript:like('.$post[$l]['id'].');" >like</button>*/echo '</td><td><br><form method="post" action="firstpagefeed.php"><br><button name="comment" value="'.$post[$l]['id'].'" >comment</button></form></td></tr>
			</table>
		</div><br><br><br>';$l++;
		}?>
		
		<div class="settings" id="settings">
			<table>
			<tr><td><form action="settings.php"><button class="settings-b" href="settings.html">Settings</button></form></td></tr>
			<tr><td><form action="login.php"><button class="settings-b" href="login.html">Logout</button></form></td></tr>
			<tr><td><form action="notification.php" method="post"><button class="settings-b" name="notif">Notification</button></form></td></tr>
			</table>
		</div>
		

		
	</body>
</html>