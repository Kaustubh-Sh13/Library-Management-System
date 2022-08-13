<?php
require('dbconn.php');

$bookid=$_GET['id1'];

$Email=$_GET['id2'];

$sql="delete from LMS.return where Email='$Email' and BookId='$bookid'";

if($conn->query($sql) === TRUE)
{
echo "<script type='text/javascript'>alert('Request Rejected')</script>";
header( "Refresh:0.01; url=issue_requests.php", true, 303);
}
else
{
	echo "<script type='text/javascript'>alert('Error')</script>";
    header( "Refresh:0.01; url=issue_requests.php", true, 303);

}

?>