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
	$friend[0]['name']="No friends";$friend[0]['pic']="";
	$friend[1]['name']="No friends";$friend[1]['pic']="";
	$friend[2]['name']="No friends";$friend[2]['pic']="";
	$friend[3]['name']="No friends";$friend[3]['pic']="";
}
else if($i==1)
{
	$friend[1]['name']="No friends";$friend[1]['pic']="";
	$friend[2]['name']="No friends";$friend[2]['pic']="";
	$friend[3]['name']="No friends";$friend[3]['pic']="";
}
else if($i==2)
{
	$friend[2]['name']="No friends";$friend[2]['pic']="";
	$friend[3]['name']="No friends";$friend[3]['pic']="";
}
else if($i==3)
{
	$friend[3]['name']="No friends";$friend[3]['pic']="";	
}

if(isset($_POST['post']))
{
	$caption=$_POST['caption'];
	$picture = addslashes(file_get_contents($_FILES["upload"]['tmp_name']));
	$picquery="insert into post (userid,caption,post_image,username) values ('$userid','$caption','$picture','$name')";
	$picconn=mysqli_query($db,$picquery) or die("cannot add the post");
}
$k=0;
$friends="select * from friends where user_id='$userid'";
$friendsconn=mysqli_query($db,$friends);
while($friendsrow=mysqli_fetch_array($friendsconn))
{
	$fndpos=$friendsrow['friend_id'];
	$fndposq="select count(*) as total from friends where user_id='$fndpos' and friend_id='$userid'";
	$fndposconn=mysqli_query($db,$fndposq);
	$fndposrow=mysqli_fetch_assoc($fndposconn);
	if($fndposrow['total']!=0){
	$friendid=$friendsrow['friend_id'];
	$postquery="select * from post where userid='$friendid'";
	$postconn=mysqli_query($db,$postquery);
	while($postrow=mysqli_fetch_array($postconn))
	{
		$post[$k]['id']=$postrow['postid'];
		$pid[$k]=$post[$k]['id'];
		$post[$k]['caption']=$postrow['caption'];
		$post[$k]['image']=$postrow['post_image'];
		$post[$k]['name']=$postrow['username'];
		$tempid=$postrow['userid'];
		$tempquery="select * from users where user_id='$tempid'";
		$tempconn=mysqli_query($db,$tempquery);	
		$temprow=mysqli_fetch_array($tempconn);
		$post[$k]['user_image']=$temprow['user_image'];
		$k++;
	}
	}
}
 
?>