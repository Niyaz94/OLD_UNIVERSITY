<?php
	include("../../../database.php");
	if ($_SERVER["REQUEST_METHOD"] == "POST") {
		if(isset($_POST["id"])){		
		    header('Content-Type: application/json');//labo henanauae data ba json bakardet
			$id=$_POST["id"];
		   $ob=new class_database("localhost","root","root","HR");
		  $sql = "SELECT new_rank,old_rank,new_grade,old_grade,new_salary,old_salary,new_title,old_title,new_annual_date,\n"
			   . "old_annual_date\n"
               . "FROM service_calculation WHERE ser_cal_id='$id';";
		  $result =$ob->return_data($sql);
		  if(count($result)==1)//agar result 1 bu aua data eakae ba json bgarenaua
			  echo json_encode($result);
		}
	}
?>