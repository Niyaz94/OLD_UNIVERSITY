<?php 
	include("../../../database.php");
?><?php
	if ($_SERVER["REQUEST_METHOD"] == "POST") {
		$ob=new class_database("localhost","root","root","HR");
		if(isset($_POST["employee"]) && isset($_POST["department"]) && isset($_POST["information"]) && isset($_POST["certificate"])){	
			$emp = json_decode($_POST["employee"]);
			$dep = json_decode($_POST["department"]);
			$inf = json_decode($_POST["information"]);
			$cer = json_decode($_POST["certificate"]);	
				$sql1= "INSERT INTO  employee(full_name,email,phone_number,gender,blood_group,birthday,born_place,Social_Status,Number_Of_Children,
				current_address,current_city,current_country)Values(\"$emp->name\",\"$emp->email\",\"$emp->phone\",\"$emp->gender\",\"$emp->blood\",
				\"$emp->birthday\",\"$emp->born_place\",\"$emp->social\",\"$emp->child\",\"$emp->address\",\"$emp->current_city\",\"$emp->current_country\")";
				$foreign=$ob->insert_data($sql1);
	
				$sql2= "INSERT INTO  department(employee_id_for,university_name,college_name,employment_date,start_work_date,work_resume_date,
				employment_status,post,department_name,place_work,leave_work_balance,approval_ministry,issue_number,expert)\n".
				"Values('$foreign',\"$dep->university\",\"$dep->college\",\"$dep->employment\",\"$dep->wrd\",\"$dep->swa\",\"$dep->Status\",
				\"$dep->post\",\"$dep->department\",\"$dep->pow\",\"$dep->lwb\",\"$dep->issueno\",\"$dep->ministry\",\"$cer->expert\")";
				$ob->insert_data($sql2);
				
				$sql3= "INSERT INTO  information(employee_id_for,S_date,salary,rank,grade,title)
				Values('$foreign',\"$inf->doaa\",\"$inf->salary\",\"$inf->rank\",\"$inf->grade\",\"$inf->title\")";
				$ob->insert_data($sql3);
				
				$sql4= "INSERT INTO  certificate(employee_id_for,cert_name,date_of_issue,place_of_issue)
				Values('$foreign',\"$cer->cer_name\",\"$cer->yoi\",\"$cer->place_iss\")";
				$ob->insert_data($sql4);
				
				$sql5= "INSERT INTO  user(emp_id,user_name,password)Values('$foreign',\"$emp->username\",\"$emp->password\")";
				$ob->insert_data($sql5);	
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

