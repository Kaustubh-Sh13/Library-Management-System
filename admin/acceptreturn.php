<?php
require('dbconn.php');

$bookid=$_GET['id1'];
$Email=$_GET['id2'];




$sql1="update LMS.record set Date_of_Return= curdate() where BookId='$bookid' and Email='$Email'";
 
if($conn->query($sql1) === TRUE)
{$sql3="update LMS.book set Availability=Availability+1 where BookId='$bookid'";
 $result=$conn->query($sql3);
 $sql4="delete from LMS.return where BookId='$bookid' and Email='$Email'";
 $result=$conn->query($sql4);
 echo "<script type='text/javascript'>alert('Success')</script>";
header( "Refresh:0.01; url=return_requests.php", true, 303);
}
else
{
	echo "<script type='text/javascript'>alert('Error')</script>";
    header( "Refresh:1; url=return_requests.php", true, 303);

}





?>