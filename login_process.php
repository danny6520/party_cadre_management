<?php
session_start(); 
include('village_panchayat_db_connect/complaint_db_connect.php'); 
if(isset($_POST['submit']))
{

    $user_name=$_POST['user_name'];
	$user_password=$_POST['user_password'];
	//$only_admin_access = "Admin";

	//$result=mysqli_query($conn, 'SELECT * from election_users where election_user_name="'.$user_name.'" AND election_user_password="'.$user_password.'" AND election_user_role="Admin" AND election_user_status="A"');
	
	
	$result=mysqli_query($conn, 'SELECT * from election_users where election_user_name="'.$user_name.'" AND election_user_password="'.$user_password.'" AND election_user_status="C"');
	if(mysqli_num_rows($result)==1)
	{
			echo "<h3>Redirecting.. Please wait.. </h3>";
			$row = mysqli_fetch_assoc($result);
			$_SESSION['login_user_name']="$user_name";
			$_SESSION['login_user_email'] = $row['election_user_email'];
			$_SESSION['login_user_role'] = $row['election_user_role'];
			
				header("Location: village_panchayat.php");
			
			

	}
	else {
		echo "<script>alert('Username or password is incorrect!')</script>";
		echo "<script>location.href='index.php'</script>";

	}
		

		
	
}
	
?>
