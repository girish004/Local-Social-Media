<?php
	session_start();
	$db = mysqli_connect('localhost','root','','social_network') or die("Could not connect to tables");
	$userid=$_SESSION['id'];
	$query="select * from users where user_id='$userid'";
	$con=mysqli_query($db,$query);
	$row=mysqli_fetch_array($con);
	$name=$row['user_name'];
	$id=$row['user_id'];
	$fullname=$row['user_fullname'];
	$gender=$row['user_gender'];
	$mail=$row['user_email'];
	$profpic=$row['user_image'];
	$cover=$row['user_cover'];
	$postid=$row['user_posts'];
	$hobby=$row['hobby'];
	$grad=$row['yeargrad'];
	$skills=$row['skills'];
	$interest=$row['interests'];;
	$bio=$row['bio'];
	$dob=$row['dob'];
	$privacy=$row['privacy'];
	$admin=$row['admin'];
	
?>