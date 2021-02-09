<?php
$id="3";
$db = mysqli_connect('localhost','root','','vit') or die("Could not connect to tables");
if(isset($_POST['submit']))
{
$name=$_POST['name'];
$password=$_POST['password'];
$phno=$_POST['phno'];
//$db = mysqli_connect('localhost','root','','vit') or die("Could not connect to tables");
//$name = mysqli_real_escape_string($db,$_POST["name"]);
//$password = mysqli_real_escape_string($db,$_POST["password"]);
$insert="update personal set password='$password' name='$name' phno='$phno' where id='$id'" or die("error");
$con=mysqli_query($db,$insert);
if($con)
{
echo "<h1>Row updated</h1>";
}
else
echo "<h1>Row cannot be updated</h1>";
}
$valq="select * from personal where id='$id'";
$valconn=mysqli_query($db,$valq);
$valr=mysqli_fetch_array($valconn);
$pass=$valr['password'];
$name=$valr['name'];
$phno=$valr['phno']
?>
<html>
<body>
<center><h1>Updation</h1></center>
<form action="updation.php" method="post">
Name<input type="text" name="name" value=<?php echo $name; ?>><br>
phno<input type="text" name="phno" value=<?php echo $phno; ?>><br>
password to be changed<input type="password" name="password" value=<?php echo $pass; ?>><br>
<button name="submit">Submit</button>
</form>

</body>
</html>

