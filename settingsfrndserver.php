
<?php
$tempfr=$_SESSION['friend'];
$settingq="select * from users where user_id='$tempfr'";
$settingconn=mysqli_query($db,$settingq);
$settingrow=mysqli_fetch_array($settingconn);
$fname=$settingrow['user_name'];
$fid=$settingrow['user_id'];
$ffullname=$settingrow['user_fullname'];
$fgender=$settingrow['user_gender'];
$fmail=$settingrow['user_email'];
$fprofpic=$settingrow['user_image'];
$fcover=$settingrow['user_cover'];
$fpostid=$settingrow['user_posts'];
$fhobby=$settingrow['hobby'];
$fgrad=$settingrow['yeargrad'];
$fskills=$settingrow['skills'];
$finterest=$settingrow['interests'];;
$fbio=$settingrow['bio'];
$fdob=$settingrow['dob'];
$fprivacy=$settingrow['privacy'];
$fadmin=$settingrow['admin'];
?>