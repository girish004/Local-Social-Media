<?php
session_start();

$userid="";
$regno="";
$password2="";
$password="";

$errors=array();
$db = mysqli_connect('localhost','root','','login') or die("Could not connect to tables");

$userid = mysqli_real_escape_string($db,$_POST["userid"]);
$regno = mysqli_real_escape_string($db,$_POST["regno"]);
$password=mysqli_real_escape_string($db,$_POST["password"]);
$password2=mysqli_real_escape_string($db,$_POST["password2"]);
if(empty($userid)) array_push($errors,"username is required");
if(empty($regno)) array_push($errors,"email is required");
if(empty($password)) array_push($errors,"password is required");

$user_check_query ="SELECT * FROM details WHERE userid = '$userid' or regno ='$regno'";

$results = mysqli_query($db,$user_check_query);
$user=mysqli_fetch_assoc($results);

if($user)
{
if($user['userid'] === $userid) array_push($errors,"User already exists");
}

if(count($errors)==0){
	$password=md5($password);
	$query="INSERT INTO details (userid,regno,password) VALUES ('$userid','$regno','$password')";
	mysqli_query($db,$query);
	$_SESSION['userid']=$userid;
	//$_SESSION['success']="you are logged in";
//header('location: index.php');
}
else
{
	die("poda");
}
?>