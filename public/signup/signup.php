<?php
include ("connection.php");

	if(isset($_POST['submit'])){
		$user_name = mysqli_real_escape_string($connection,$_POST['user']);
		$email     = mysqli_real_escape_string($connection,$_POST['email']);
		$password  = mysqli_real_escape_string($connection,$_POST['pass']);
		$cpassword = mysqli_real_escape_string($connection,$_POST['cpass']);

		$sql="select * from users where user_name='$user_name'";
		$result=mysqli_query($connection,$sql);
		$count_user=mysqli_num_rows($result);

		$sql="select * from users where email='$email'";
		$result=mysqli_query($connection,$sql);
		$count_email=mysqli_num_rows($result);

		if($count_user==0 & $count_email==0){
			if($password==$cpassword){
				$hash=password_hash($password, PASSWORD_DEFAULT);
				$sql="INSERT INTO users(username,email,password) VALUES('$user_name','$email','$hash')";
				$result = mysql_query($connection,$sql);
				if($result){
					header("location: welcome.php");//return to video 33 min
				}
			}
			else{
				echo '<script>
					alert("Password do not match");
					window.location.href="index.php";
					</script>';
			}
		}
		else {
			if($count_user>0){
				echo '<script
				window.location.href="index.php";
				alert ("Username already exist !")
				</script>';
			}
			if($count_email>0){
				echo '<script
				window.location.href="index.php";
				alert ("Email already exist !")
				</script>';
			}
		}

	}

?>