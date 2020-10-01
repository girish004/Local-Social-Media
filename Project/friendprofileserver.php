<?php
$friendpost="select * from post where userid='$tempfr'";
$friendpostconn=mysqli_query($db,$friendpost);
$i=0;
while($friendpostrow=mysqli_fetch_array($friendpostconn))
{
	$frndpost[$i]['username']=$friendpostrow['username'];
	$frndpost[$i]['caption']=$friendpostrow['caption'];
	$frndpost[$i]['post_image']=$friendpostrow['post_image'];
	$frndpost[$i]['likes']=$friendpostrow['likes'];
	$frndpost[$i]['comments']=$friendpostrow['comments'];
	$frndpost[$i]['time']=$friendpostrow['time'];
	$i++;
}
$mutual="select count(*) as total from friends where user_id='$tempfr' and friend_id='$id'";
$mutualconn=mysqli_query($db,$mutual);
$res=mysqli_fetch_assoc($mutualconn);
//echo $mutualconn;
if(isset($_POST['button']))
{
	$_SESSION['friend']=$_POST['button'];
	echo "<script>window.open('friendofriend.php','_self')</script>";
}
if(isset($_POST['set']))
{
	echo "<script>window.open('settingsfrnd.php','_self')</script>";
}
if(isset($_POST['addfrnd']))
{
	$frienddetails="select * from users where user_id='$tempfr'";
	$frienddetailsconn=mysqli_query($db,$frienddetails);
	$frienddetailsrow=mysqli_fetch_array($frienddetailsconn);
	$friendname=$frienddetailsrow['user_name'];
	$addfriend="insert into friends (user_id,friend_id,friend_name) values('$id','$tempfr','$friendname')";
	$addfriendconn=mysqli_query($db,$addfriend) or die("hii");
}
if(isset($_POST['delfrnd']))
{
	$delq="delete from friends where user_id='$id' and friend_id='$tempfr'";
	$delconn=mysqli_query($db,$delq);
	//$del=mysqli_fetch_array($delconn);
}
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
$oneq="select count(*) as total1 from friends where user_id='$id' and friend_id='$tempfr'";
$oneqconn=mysqli_query($db,$oneq);
$one=mysqli_fetch_assoc($oneqconn); 
$twoq="select count(*) as total2 from friends where user_id='$tempfr' and friend_id='$id'";
$twoqconn=mysqli_query($db,$twoq);
$two=mysqli_fetch_assoc($twoqconn);
?>