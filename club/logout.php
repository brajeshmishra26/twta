<?php 

	session_start();
	if(isset($_SESSION["user_id"],$_SESSION["user_name"])){
		
		unset($_SESSION["user_id"]);
		header("location:https://myvita.in/myvita3/login.html");
	}

?>