<?php

$friends="select * from friends where user_id='$userid'";
$fquery=mysqli_query($db,$friends) or die("Cannot connect to the tables '$userid'");
$i=0;
$limit=4;
while($frow=mysqli_fetch_array($fquery))
{
	$fnd=$frow['friend_id'];
	$fndq="select count(*) as total from friends where user_id='$fnd' and friend_id='$userid'";
	$fndconn=mysqli_query($db,$fndq);
	$fndrow=mysqli_fetch_assoc($fndconn);
	if($fndrow['total']!=0){
	$friend[$i]['name']=$frow['friend_name'];
	$friend[$i]['id']=$frow['friend_id'];
	$temp=$frow['friend_id'];
	$friendspicq="select * from users where user_id='$temp'";
	$friendspicconn=mysqli_query($db,$friendspicq) or die("Cannot connect to the tables '$userid'");
	$friendspicrow=mysqli_fetch_array($friendspicconn);
	$friend[$i]['pic']=$friendspicrow['user_image'];
	$i++;}
	if($i==$limit) break;
}
if($i==0)
{
	$friend[0]['name']="No friends";$friend[0]['pic']="";$friend[0]['id']="";
	$friend[1]['name']="No friends";$friend[1]['pic']="";$friend[1]['id']="";
	$friend[2]['name']="No friends";$friend[2]['pic']="";$friend[2]['id']="";
	$friend[3]['name']="No friends";$friend[3]['pic']="";$friend[3]['id']="";
}
else if($i==1)
{
	$friend[1]['name']="No friends";$friend[1]['pic']="";$friend[1]['id']="";
	$friend[2]['name']="No friends";$friend[2]['pic']="";$friend[2]['id']="";
	$friend[3]['name']="No friends";$friend[3]['pic']="";$friend[3]['id']="";
}
else if($i==2)
{
	$friend[2]['name']="No friends";$friend[2]['pic']="";$friend[2]['id']="";
	$friend[3]['name']="No friends";$friend[3]['pic']="";$friend[3]['id']="";
}
else if($i==3)
{
	$friend[3]['name']="No friends";$friend[3]['pic']="";$friend[3]['id']="";
}

if(isset($_POST['post']))
{
	$caption=$_POST['caption'];
	if($_FILES["upload"]['tmp_name']){
	$picture = addslashes(file_get_contents($_FILES["upload"]['tmp_name']));}
	else{
		$picture="";
	}
	$picquery="insert into post (userid,caption,post_image,username) values ('$id','$caption','$picture','$name')";
	$picconn=mysqli_query($db,$picquery) or die("cannot add the post '$caption'");
}
$k=0;

$friends="select * from post order by postid desc";
$friendsconn=mysqli_query($db,$friends);
while($friendsrow=mysqli_fetch_array($friendsconn))
{
	$fndpos=$friendsrow['userid'];
	$fndposq="select count(*) as total from friends where friend_id='$fndpos' and user_id='$userid'";
	$fndposconn=mysqli_query($db,$fndposq);
	$fndposrow=mysqli_fetch_assoc($fndposconn);
	if($fndposrow['total']==1){
		$post[$k]['id']=$friendsrow['postid'];
		$pid[$k]=$post[$k]['id'];
		$v=$post[$k]['id'];
		$lykq=mysqli_query($db,"select count(*) as total from likes where postid='$v' and userid='$id'");
		$lyk=mysqli_fetch_array($lykq);
		$post[$k]['like']=$lyk['total'];
		$post[$k]['caption']=$friendsrow['caption'];
		$post[$k]['image']=$friendsrow['post_image'];
		$post[$k]['name']=$friendsrow['username'];
		$tempid=$friendsrow['userid'];
		$post[$k]['userid']=$friendsrow['userid'];
		$tempquery="select * from users where user_id='$tempid'";
		$tempconn=mysqli_query($db,$tempquery);	
		$temprow=mysqli_fetch_array($tempconn);
		$post[$k]['user_image']=$temprow['user_image'];
		$k++;
	}
	
}
	if(isset($_POST['find']))
	{
		$find=$_POST['search'];
		$findq="select * from users where user_id='$find'";
		$findrows=mysqli_query($db,$findq);
		$findrowsnum=mysqli_num_rows($findrows);
		if($findrowsnum==1)
		{
			if($id!=$find){
			$_SESSION['friend']=$find;
			echo "<script>window.open('friendprofile.php','_self')</script>";
			}
			else{
			$_SESSION['friend']=$id;
			echo "<script>window.open('profile.php','_self')</script>";				
			}
		}
		else
		{
			echo '<script>alert("Enter a valid ID")</script>';
		}
	}
 
?>