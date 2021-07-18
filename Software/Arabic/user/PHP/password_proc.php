<?php
	session_start();
	if(!isset($_SESSION["username"]) && !isset($_SESSION["password"])) {
			header("Location: ../../../login_A.php");
	}
	include("../../../database.php");
	if ($_SERVER["REQUEST_METHOD"] == "POST") {
		$ob=new class_database("localhost","root","","human_resources_4");
		if(isset($_POST["username"]) && isset($_POST["password"])){
			echo 1;
			$new_user=$_POST["username"];
			$new_pass=password_hash($_POST["password"],PASSWORD_DEFAULT);	
			$old_user=$_SESSION["username"];
			$old_pass=$_SESSION["password"];
			$sql = "UPDATE user set first_time=1,user_name='$new_user',password='$new_pass'\n"
				  ." where user_name='$old_user';";
			$result =$ob->update_data($sql);
			if($result==true){
				$_SESSION["username"]=$new_user;
				$_SESSION["password"]=$new_pass;
			}		
		}else if(isset($_POST["check"]) && isset($_POST["username"]) ){
				$id=$_POST["username"];
				$sql="SELECT user_name FROM user WHERE user_name in('$id');";
				$result=$ob->return_data($sql);
				if(count($result)>0){
					echo 0;
				}else{
					echo 1;
				}
		}
	}
?>