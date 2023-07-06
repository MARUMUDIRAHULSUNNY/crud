<!DOCTTYPE html>
<html>
<head>
</head>
<body>
<table border="1">
<tr>
<th>
s.no
</th>
<th>
user name
</th>
<th>
email
</th>
<th>
password
</th>
<th>
view details
</th>
</tr>
<?php
include_once('db.php');
$rahul="select * from table1";
if($sunny=mysqli_query($pandu,$rahul)){
	if(mysqli_num_rows($sunny)>0){
		while($row=mysqli_fetch_array($sunny)){
			echo "<tr>";
			echo "<td>".$row['sno']."</td>";
			echo "<td>".$row['uname']."</td>";
			echo "<td>".$row['email']."</td>";
			echo "<td>".$row['password']."</td>";
			echo '<td><a href="view.php?id='.$row['sno'].'">view</a></td>';
			echo '<td><a href="update.php?id='.$row['sno'].'">Update</a></td>';
			echo "</tr>";
		}
	}
	else {
		echo "no data";
	}
}else {
	echo "no table";
}
?>
</table>

</body>
</html>
