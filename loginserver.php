<?php 
	session_start();
	session_destroy();
	session_start();
	if(isset($_POST["submit"])){
	$userid="";
	$password="";
	$db = mysqli_connect('localhost','root','','social_networks') or die("Could not connect to tables");
	$userid=mysqli_real_escape_string($db,$_POST["userid"]);
	$password=mysqli_real_escape_string($db,$_POST["password"]);
	if(empty($userid)) echo "<script>window.open('login.php','_self');alert('Enter the username');</script>";
	if(empty($password)) echo "<script>alert('Enter the password');</script>";
	$query="select * from users where user_id='$userid' and user_password='$password'";
	$conrows=mysqli_query($db,$query);
	$rows=mysqli_num_rows($conrows);
	if($rows==1)
	{	
		$_SESSION['id']=$userid;
		echo "<script>window.open('firstpagefeed.php','_self')</script>";
	}
	else
	{
		echo "<script>alert('Invalid user credentials')</script>";
	}
	}
	//session_destroy();
?>