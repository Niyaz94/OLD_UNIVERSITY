<?php
	include("../../../database.php");
	if ($_SERVER["REQUEST_METHOD"] == "POST") {
		if(isset($_POST["id"])){		
		    header('Content-Type: application/json');//labo henanauae data ba json bakardet
			$id=$_POST["id"];
		   $ob=new class_database("localhost","root","root","HR");
		   $sql = "SELECT old_title,old_salary,old_rank,old_grade,old_annual_date\n"
                . "FROM service,acceleration\n"
                . "WHERE acceleration.ser_id_for=service.service_id and service_id='$id';";
		  $result =$ob->return_data($sql);
		  if(count($result)==1)//agar result 1 bu aua data eakae ba json bgarenaua
			  echo json_encode($result);
		}
	}
?>