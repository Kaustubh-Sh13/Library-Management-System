<?php
require('dbconn.php');
?>


<!DOCTYPE html>
<html>

<!-- Head -->
<head>

	<title>Library Management System </title>

	<!-- Meta-Tags -->
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
		<meta name="keywords" content="Library Member Login Form Widget Responsive, Login Form Web Template, Flat Pricing Tables, Flat Drop-Downs, Sign-Up Web Templates, Flat Web Templates, Login Sign-up Responsive Web Template, Smartphone Compatible Web Template, Free Web Designs for Nokia, Samsung, LG, Sony Ericsson, Motorola Web Design" />
		<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>
	<script>
		function validate(){
			var email=document.forms["form1"]["Email"].value;
			var mailformat = /^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/;
			var phone=document.forms["form1"]["PhoneNumber"].value;
			var mob = /^\d{10}$/;
			if(!email.match(mailformat)){
				alert("You have entered an invalid email address!");
				return false;		
			}	
			if(!phone.match(mob)){
				alert("Enter a valid mobile phone number")
				return false;
			}
			if(phone.length<10){
				alert("Enter a valid mobile phone number")
				return false;
			}	
		}

	</script>
		
	 <!-- Meta-Tags -->

	 <!-- Style --> 
	<link rel="stylesheet" href="css/style.css" type="text/css" media="all">

	<!-- Fonts -->
		<link href="//fonts.googleapis.com/css?family=Roboto:100,300,400,500,700,900" rel="stylesheet">
	 <!-- //Fonts -->
	
</head>
<!-- //Head -->

<!-- Body -->
<body>

	<h1>LIBRARY MANAGEMENT SYSTEM</h1>

	<div class="container">

		<div class="login">
			<h2>Sign In</h2>
			<form action="index.php" method="post" >
				<input type="text" Name="Email" placeholder="Email" required="">
				<input type="password" Name="Password" placeholder="Password" required="">
			
			
			<div class="send-button">
				<!--<form>-->
					<input type="submit" name="signin"; value="Sign In">
				</form>
			</div>
			
			<div class="clear"></div>
		</div>

		<div class="register">
			<h2>Sign Up</h2>
			<form name="form1" action="index.php" method="post" onsubmit="return validate()">
				<input type="text" Name="Name" placeholder="Name" required>
				<input type="text" Name="Email" placeholder="Email" required>
				<input type="password" Name="Password" placeholder="Password" required>
				<input type="text" Name="PhoneNumber" placeholder="Phone Number" required>
				
				</select>
				<br>
			
			<br>
			<div class="send-button">
			    <input type="submit" name="signup" value="Sign Up">
			    </form>
			</div>
			<div class="clear"></div>
		</div>

		<div class="clear"></div>

	</div>

<?php
if(isset($_POST['signin']))
{$u=$_POST['Email'];
 $p=$_POST['Password'];


 $sql="select * from LMS.user where Email='$u'";

 $result = $conn->query($sql);
$row = $result->fetch_assoc();
$x=$row['Password'];
$y=$row['Type'];
if(password_verify($p,$x))
  {//echo "Login Successful";
   $_SESSION['Email']=$u;
   

  if($y=='Admin')
   header('location:admin/index.php');
  else
  	header('location:user/index.php');
        
  }
else 
 { echo "<script type='text/javascript'>alert('Failed to Login! Incorrect RollNo or Password')</script>";
}
   

}

if(isset($_POST['signup']))
{
	$name=$_POST['Name'];
	$email=$_POST['Email'];
	$password=$_POST['Password'];
	$hash= password_hash($password, PASSWORD_DEFAULT);
	$mobno=$_POST['PhoneNumber'];
	$type='User';


	$sql="insert into LMS.user (Name,Type,Email,MobNo,Password) values ('$name','$type','$email','$mobno','$hash')";

	if ($conn->query($sql) === TRUE) {
echo "<script type='text/javascript'>alert('Registration Successful')</script>";
} else {
    
echo "<script type='text/javascript'>alert('User Exists')</script>";
}
}

?>

</body>


</html>
