<?php
$servername="localhost";
$username="root";
$pass="";
$db="database";
// creat connectrion
$pandu=mysqli_connect($servername,$username,$pass,$db);
//check connection
if(!$pandu){
echo("conection failed");
}
echo "connected successfully:";
?>