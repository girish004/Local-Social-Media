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
	$mypost[$i]['comments']=$mypostrow['comments'];
	$mypost[$i]['time']=$mypostrow['time'];
	$i++;
}


?>