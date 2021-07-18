<?php
	include("../../../database.php");
	if ($_SERVER["REQUEST_METHOD"] == "POST") {
		if(isset($_POST["id"]) && isset($_POST["message"])){		
			$id=$_POST["id"];
			$subject=$_POST["subject"];
			$message=$_POST["message"];
			$date=date("Y-m-d");
			
		   $ob=new class_database("localhost","root","","human_resources_4");
		   $sql ="INSERT INTO message(subject,content,send_date,employee_id_for) VALUES ('$subject','$message','$date','$id');"; 
		   $result =$ob->insert_data($sql);
		   echo $result;
		  
		}
	}
?>