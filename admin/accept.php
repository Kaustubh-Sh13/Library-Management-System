<?php
require('dbconn.php');

$bookid=$_GET['id1'];
$Email=$_GET['id2'];



$sql1="update LMS.record set Date_of_Issue=curdate(),Due_Date=date_add(curdate(),interval 60 day) where BookId='$bookid' and Email='$Email'";
 
if($conn->query($sql1) === TRUE)
{$sql3="update LMS.book set Availability=Availability-1 where BookId='$bookid'";
 $result=$conn->query($sql3);
 
echo "<script type='text/javascript'>alert('Success')</script>";
header( "Refresh:0.01; url=issue_requests.php", true, 303);
}
else
{
	echo "<script type='text/javascript'>alert('Error')</script>";
    header( "Refresh:1; url=issue_requests.php", true, 303);

}

?>