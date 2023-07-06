<!DOCTYPE html>
<html>
<head>
</head>
<body>
<?php
include_once('db.php');
if(isset($_GET['id'])){
$sno=$_GET['id'];
$ck="select * from table1 where sno='$sno'";
if($stmt=mysqli_prepare($pandu,$ck)){
if(mysqli_execute($stmt)){
$result=mysqli_stmt_get_result($stmt);
if(mysqli_num_rows($result)==1){
$row=mysqli_fetch_array($result,MYSQLI_ASSOC);
$nm=$row['uname'];
$em=$row['email'];
$pas=$row['password'];
}
}

}
}
?>
<table borer="1">
<tr>
<th>column</th>
<th>details</th>
</tr>
<tr>
<th>user name</th>
<td><?php echo $nm?></td>
</tr>
<tr>
<th>email</th>
<td><?php echo $em?></td>
</tr>
<tr>
<th>password</th>
<td><?php echo $pas?></td>
</tr>
</table>
</body>
</html>