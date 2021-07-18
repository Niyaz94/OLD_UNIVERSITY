<?php
	include("../../../database.php");

	if ($_SERVER["REQUEST_METHOD"] == "POST") {
		$database=new class_database("localhost","root","root","HR");
		if(isset($_POST['id'])){
			header('Content-Type: application/json');
			$id=$_POST['id'];
			$sql ="SELECT full_name,service_type,service_id FROM employee,service\n".
				  "WHERE employee.employee_id=service.employee_id_for and employee_id='$id';";	  
			$result =$database->return_data($sql);	
			echo json_encode($result); 
		}else if(isset($_POST['annual']) && isset($_POST['service_id'])){
			header('Content-Type: application/json');
			$id=$_POST['service_id'];
			$sql="SELECT rank,title,old_grade,new_grade,old_salary,new_salary,annual_date,qdam\n".
				 "FROM annual_allowance WHERE ser_id_for='$id';";
			$result =$database->return_data($sql);	
			echo json_encode($result); 
		}else if(isset($_POST['thanks']) && isset($_POST['service_id'])){
			header('Content-Type: application/json');
			$id=$_POST['service_id'];
			$sql="SELECT date_en FROM orders WHERE  ser_type_for='thanks' and ser_id_for='$id' group by ser_id_for";
			$result =$database->return_data($sql);	
			echo json_encode($result); 	
		}else if(isset($_POST['promotion']) && isset($_POST['service_id'])){
			header('Content-Type: application/json');
			$id=$_POST['service_id'];
			$sql="SELECT new_rank,old_rank,new_grade,old_grade,old_title,new_title,new_salary,old_salary,period_service\n".
				 "FROM promotion WHERE ser_id_for='$id';";
			$result =$database->return_data($sql);	
			echo json_encode($result);
		}else if(isset($_POST['certificate']) && isset($_POST['service_id'])){
			header('Content-Type: application/json');
			$id=$_POST['service_id'];
			$sql="SELECT new_rank,old_rank,new_grade,old_grade,new_title,old_title,new_salary,old_salary,new_annual_date,old_annual_date,".
			"acceleration_period FROM acceleration WHERE ser_id_for='$id';";
			$result =$database->return_data($sql);	
			echo json_encode($result);
			
			
		}else if(isset($_POST['service_calculation']) && isset($_POST['service_id'])){
			header('Content-Type: application/json');
			$id=$_POST['service_id'];
			$sql="SELECT service_cal_period,service_cal_type,increasing_period,from_date,to_date,new_rank,old_rank,new_grade ,old_grade".
			",new_salary,old_salary,new_title,old_title,new_annual_date,old_annual_date FROM service_calculation WHERE ser_id_for='$id';";
			$result =$database->return_data($sql);	
			echo json_encode($result);
		
		}
	}
				
?>