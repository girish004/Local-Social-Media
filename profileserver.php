<?php
$mypostquerry="select * from post where userid='$id'";
$mypostconn=mysqli_query($db,$mypostquerry);
$i=0;
while($mypostrow=mysqli_fetch_array($mypostconn))
{
	$mypost[$i]['username']=$mypostrow['username'];
	$mypost[$i]['caption']=$mypostrow['caption'];
	$mypost[$i]['post_image']=$mypostrow['post_image'];
	$mypost[$i]['likes']=$mypostrow['likes'];
	$mypost[$i]['postid']=$mypostrow['postid'];
	$v=$mypostrow['postid'];
	$lykq=mysqli_query($db,"select count(*) as total from likes where postid='$v' and userid='$id'");
	$lyk=mysqli_fetch_array($lykq);
	$mypost[$i]['like']=$lyk['total'];
	$mypost[$i]['comments']=$mypostrow['comments'];
	$mypost[$i]['time']=$mypostrow['time'];
	$i++;
}


?>