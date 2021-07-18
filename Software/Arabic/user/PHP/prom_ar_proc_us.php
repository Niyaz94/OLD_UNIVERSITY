<?php
	include("../../../database.php");
	if ($_SERVER["REQUEST_METHOD"] == "POST") {
		if(isset($_POST["id"])){		
		    header('Content-Type: application/json');//labo henanauae data ba json bakardet
			$id=$_POST["id"];
		   $ob=new class_database("localhost","root","","human_resources_4");
		   $sql = "SELECT old_title,old_salary,old_rank,old_grade\n"
                . "FROM service,promotion\n"
                . "WHERE promotion.ser_id_for=service.service_id and service_id='$id';";
		  $result =$ob->return_data($sql);
		  if(count($result)==1)//agar result 1 bu aua data eakae ba json bgarenaua
			  echo json_encode($result);
		}
	}
?>