<?php
$postid=$_SESSION['postid'];
if(isset($_POST['cmntpost']))
{
	$commentword=$_POST['words'];
	$insertcmntq="insert into comments (post_id,user_id,name,comments) values('$postid','$id','$fullname','$commentword')";
	$insertcommentconn=mysqli_query($db,$insertcmntq) or die("cannot add the comment");
	$attribute="Comments";
	$namequery="select * from post where postid='$postid'";
	$nameconn=mysqli_query($db,$namequery);
	$namerow=mysqli_fetch_array($nameconn);
	$tempfr=$namerow['userid'];
	$notif="insert into notification (userid,friendid,friendname,attribute,caption,postid) values('$tempfr','$id','$fullname','$attribute','$commentword','$postid')";
	$notifconn=mysqli_query($db,$notif) or die("hii");
}
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