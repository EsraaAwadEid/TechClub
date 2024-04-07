<?php
	include ("connection.php");

	if(isset($_POST['submit'])){
		$username = mysqli_real_escape_string($conn,$_POST['user']);
		$email     = mysqli_real_escape_string($conn,$_POST['email']);
		$password  = mysqli_real_escape_string($conn,$_POST['pass']);
		$cpassword = mysqli_real_escape_string($conn,$_POST['cpass']);

		$sql="select * from signup where username='$username'";
		$result=mysqli_query($conn,$sql);
		$count_user=mysqli_num_rows($result);

		$sql="select * from signup where email='$email'";
		$result=mysqli_query($conn,$sql);
		$count_email=mysqli_num_rows($result);

		if($count_user==0 & $count_email==0){
			if($password==$cpassword){
				$hash=password_hash($password, PASSWORD_DEFAULT);
				$sql="INSERT INTO signup(username,email,password) VALUES('$username','$email','$hash')";
				$result = mysql_query($conn,$sql);
				if($result){
					header("location:welcome.php");
				}
			}
			else{
				echo '<script>
					alert("Password do not match");
					window.location.href="register.php";
					</script>';
			}
		}
		else {
			if($count_user>0){
				echo '<script
				window.location.href="register.php";
				alert ("Username already exists!")
				</script>';
			}
			if($count_email>0){
				echo '<script
				window.location.href="register.php";
				alert ("Email already exists!")
				</script>';
			}
		}

	}

?>
