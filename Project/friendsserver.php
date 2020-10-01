<?php

$queryf="select * from friends where user_id='$userid'";
$conn=mysqli_query($db,$queryf);
$i=0;
while($rowf=mysqli_fetch_array($conn))
{
	$friend[$i]['name']=$rowf['friend_name'];
	//$friend[$i]['prof_pic']=$rowf['friend_profile'];
	$friend[$i]['id']=$rowf['friend_id'];
	$temp=$rowf['friend_id'];
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