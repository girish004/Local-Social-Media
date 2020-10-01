<?php
if(isset($_POST['save']))
{
	$coverpic="";
	$profpic="";
	if($_FILES["coverpic"]["tmp_name"]){$coverpic = addslashes(file_get_contents($_FILES["coverpic"]["tmp_name"]));}
	if($_FILES["profpic"]["tmp_name"]){$profpic = addslashes(file_get_contents($_FILES["profpic"]["tmp_name"]));}
	if($coverpic)
	{
		$update="update users set user_cover='$coverpic' where user_id='$id'";
		$check=mysqli_query($db,$update) or die("Cannot upload cover picture");		
	}
	if($profpic)
	{
		$updatep="update users set user_image='$profpic' where user_id='$id'";
		$checkp=mysqli_query($db,$updatep) or die("Cannot upload profile picture");		
	}
	$namei=$_POST['name'];
	$hobbyi=$_POST['hobby'];
	$gradyeari=$_POST['gradyear'];
	$dobi=$_POST['dob'];
	$skillsi=$_POST['skills'];
	$interesti=$_POST['interest'];
	$bioi=$_POST['bio'];
	if(isset($_POST['privacy']))
	{
		$privacyi=$_POST['privacy'];
	}
	else{
	$privacyi=$privacy;}
	$insert="update users set
	user_name='$namei',
	hobby='$hobbyi',
	yeargrad='$gradyeari',
	skills='$skillsi',
	interests='$interesti',
	bio='$bioi',
	dob='$dobi',
	privacy='$privacyi' where user_id='$id'";
	$insertq=mysqli_query($db,$insert) or die("Connection Problem");
	
	
}

?>