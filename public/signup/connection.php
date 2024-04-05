<?php

	 $host = "sql212.infinityfree.com";
	 $username = "if0_35679654";
	 $password = "ZD45o4bHwfXNl";
	 $db_name = "if0_35679654_cspsyco";
		
	 $conn=new mysqli($host,$username,$password,$db_name,3306);
	
	 if($conn ->connect_error){
		 die("Connection failed:.$connect_error");
	 }

	 echo "Connection successful!";
	 
	 ?>
