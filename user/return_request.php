<?php
require('dbconn.php');

$id=$_GET['id'];

$Email=$_SESSION['Email'];

$sql="insert into LMS.return (Email,BookId) values ('$Email','$id')";

if($conn->query($sql) === TRUE)
{
echo "<script type='text/javascript'>alert('Request Sent to Admin.')</script>";
header( "Refresh:0.01; url=current.php", true, 303);
}
else
{
	echo "<script type='text/javascript'>alert('Request Already Sent.')</script>";
    header( "Refresh:0.01; url=current.php", true, 303);

}




?>