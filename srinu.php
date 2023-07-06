<?php
include_once('db.php');
$nam=$_POST['text'];
$email=$_POST['email'];
$pass=$_POST['pswd'];
$china="insert into table1(uname,email,password) values ('$nam','$email','$pass')";
if(mysqli_query($pandu,$china)){
	echo "database";
}
else{
	echo "error";
}
?>