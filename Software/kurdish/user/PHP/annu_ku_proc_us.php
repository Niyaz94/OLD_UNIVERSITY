<?php
	include("../../../database.php");
	if ($_SERVER["REQUEST_METHOD"] == "POST") {
		if(isset($_POST["id"])){		
		    header('Content-Type: application/json');//labo henanauae data ba json bakardet
			$id=$_POST["id"];
		   $ob=new class_database("localhost","root","root","HR");
		   $sql = "SELECT new_salary,old_salary,title,qdam\n"
                . "FROM service,annual_allowance\n"
                . "WHERE annual_allowance.ser_id_for=service.service_id and service_type='annual' and service_id='$id'";
		  $result =$ob->return_data($sql);
		  if(count($result)==1)//agar result 1 bu aua data eakae ba json bgarenaua
			  echo json_encode($result);
		}
	}
?>