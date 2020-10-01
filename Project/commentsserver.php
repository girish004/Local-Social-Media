<?php
$postid=$_SESSION['postid'];
$commentsq="select * from comments where post_id='$postid'";
$commentsconn=mysqli_query($db,$commentsq);
$i=0;
while($commentsrow=mysqli_fetch_assoc($commentsconn))
{
	$cmnt[$i]['id']=$commentsrow['comment_id'];
	$cmnt[$i]['userid']=$commentsrow['user_id'];
	$cmnt[$i]['name']=$commentsrow['name'];
	$cmnt[$i]['comments']=$commentsrow['comments'];
	$cmntid=$cmnt[$i]['userid'];
	$cmntimgq="select * from users where user_id='$cmntid'";
	$cmntimgconn=mysqli_query($db,$cmntimgq);
	$cmntrow=mysqli_fetch_array($cmntimgconn);
	$cmnt[$i]['img']=$cmntrow['user_image'];
	$i++;
}

?>