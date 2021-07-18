<?php
	include("../../../database.php");
	if ($_SERVER["REQUEST_METHOD"] == "POST") {
		$ob=new class_database("localhost","root","","human_resources_4");
		if(isset($_POST["id"]) && isset($_POST["type"])){		
		    header('Content-Type: application/json');//labo henanauae data ba json bakardet
			$id=$_POST["id"];
		   $sql = "SELECT * FROM employee,department,certificate,information,user WHERE\n".
				  "employee.employee_id=information.employee_id_for and \n".
				  "employee.employee_id=department.employee_id_for and \n".
				  "employee.employee_id=certificate.employee_id_for and \n".
				  "employee.employee_id=user.emp_id and \n".
				  "employee.employee_id='$id';";
		  $result =$ob->return_data($sql);
		  if(count($result)==1){//agar result 1 bu aua data eakae ba json bgarenaua
		  
			  if($result[0]["first_time"]==1){
				 $result[0]["password"] ="**********";
			  }
			  echo json_encode($result);
		  }
		}else if(isset($_POST["employee"]) && isset($_POST["department"]) && isset($_POST["information"]) && isset($_POST["id"])){	
			$emp = json_decode($_POST["employee"]);
			$dep = json_decode($_POST["department"]);
			$inf = json_decode($_POST["information"]);
			$id  = $_POST["id"];				
				$sql1= "UPDATE employee SET full_name=\"$emp->name\",email=\"$emp->email\",phone_number=\"$emp->phone\",gender=\"$emp->gender\",blood_group=\"$emp->blood\"\n".
				",birthday=\"$emp->birthday\",born_place=\"$emp->born_place\",Social_Status=\"$emp->social\",Number_Of_Children=\"$emp->child\",current_address=\"$emp->address\"\n".
				",current_city=\"$emp->current_city\",current_country=\"$emp->current_country\" where employee_id='$id';";
				$ob->update_data($sql1);		
				$sql2= "UPDATE department SET  
				university_name=\"$dep->university\",
				college_name=\"$dep->college\",
				employment_date=\"$dep->employment\",
				start_work_date=\"$dep->wrd\",
				work_resume_date=\"$dep->swa\",
				employment_status=\"$dep->Status\",
				post=\"$dep->post\",
				department_name=\"$dep->department\",
				place_work=\"$dep->pow\",
				leave_work_balance=\"$dep->lwb\",
				approval_ministry=\"$dep->issueno\",
				issue_number=\"$dep->ministry\",
				expert=\"$dep->expert\"
				where employee_id_for='$id';";
				$ob->update_data($sql2);

				$sql3= "UPDATE information SET  
				S_date=\"$inf->doaa\",
				salary=\"$inf->salary\",
				rank=\"$inf->rank\",
				grade=\"$inf->grade\",
				title=\"$inf->title\",
				zh_qdam=\"$inf->zh_qdam\",
				barzkrdnaua=\"$inf->barzkrdnaua\",
				sarmucha=\"$inf->sarmucha\",
				taebat=\"$inf->taebat\",
				sza=\"$inf->sza\"
				where employee_id_for='$id';";		
				$ob->update_data($sql3);		
		}else if(isset($_POST["id"]) && isset($_POST["remove"])){
			$id=$_POST["id"];
			$sql="DELETE FROM employee WHERE employee_id='$id';";
			$result=$ob->delete_data($sql);
			if($result=true)
				echo 1;
		}
	}
?>