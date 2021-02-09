
<?php include('connection.php') ?>
<?php if(isset($_POST['postid']))
{
	$pid=$_POST['postid'];
	$data="select * from post where postid='$pid'";
	$dataq=mysqli_query($db,$data);
	$datar=mysqli_fetch_array($dataq);
	$fname=$datar['username'];
	$fid=$datar['userid'];
	$check="select count(*) as total from likes where postid='$pid' and userid='$id'";
	$num=mysqli_query($db,$check);
	$numc=mysqli_fetch_array($num);
	if($numc['total']==0){
	$like="insert into likes (userid,username,friendid,friendname,postid) values ('$id','$name','$fid','$fname','$pid')";
	$likecon=mysqli_query($db,$like);
	$attribute="Liked";
	$namequery="select * from post where postid='$pid'";
	$nameconn=mysqli_query($db,$namequery);
	$namerow=mysqli_fetch_array($nameconn);
	$tempfr=$namerow['userid'];
	$notif="insert into notification (userid,friendid,friendname,attribute,caption,postid) values('$tempfr','$id','$fullname','$attribute','$commentword','$postid')";
	$notifconn=mysqli_query($db,$notif) or die("hii");}
	else{
		mysqli_query($db,"delete from likes where postid='$pid' and userid='$id'");
	}
	
}

?>