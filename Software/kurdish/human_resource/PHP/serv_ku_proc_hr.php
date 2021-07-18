<?php 
	session_start();
		if(!isset($_SESSION["username"]) && !isset($_SESSION["password"])) {
				header("Location: ../../../login.php");
	}
	include("../../../validation.php");
	include("../../../database.php");
?>
<?php 

	if ($_SERVER["REQUEST_METHOD"] == "POST") {
		if(isset($_POST["info"]) && isset($_POST["order"]) && isset($_POST["id"])){
			
			$orders=json_decode($_POST["order"], true);
			$info=json_decode($_POST["info"], true);
			$id=$_POST["id"];
			
			//henauae zanear eakane table e information
			$ob=new class_database("localhost","root","","human_resources_4");
			$sql = "SELECT S_date,salary,rank,grade,title,molat FROM information,employee \n"
				 . "WHERE employee_id_for=employee_id and employee_id_for=$id;";	 
			$result_info=$ob->return_data($sql);
			if($result_info[0]["molat"]==1){
				echo 1;
			}else{
				// update krdne table information
				$sql = "UPDATE information,employee SET S_date='$info[1]',salary='$info[0]',rank='$info[3]',grade='$info[4]',title='$info[2]' \n"
					 . "WHERE employee_id_for=employee_id and employee_id_for=$id;";
				$check=$ob->update_data($sql);
				//insert krd la table service
				$sql="INSERT INTO service(service_type,employee_id_for) VALUES ('service_calculation','$id');";
				$service_id=$ob->insert_data($sql);
				//insert krdn la table service_calculation
				$sa=$result_info[0]['salary'];
				$da=$result_info[0]['S_date'];
				$ti=$result_info[0]['title'];
				$ra=$result_info[0]['rank'];
				$gr=$result_info[0]['grade'];
				$sql="INSERT INTO service_calculation(new_salary,new_annual_date,new_title,new_rank,new_grade,increasing_period,service_cal_type\n"
					.",service_cal_period,from_date,to_date,old_salary,old_annual_date,old_title,old_rank,old_grade,ser_id_for)\n"
					." VALUES ('$info[0]','$info[1]','$info[2]','$info[3]','$info[4]','$info[5]','$info[6]','$info[7]','$info[8]','$info[9]'\n"
					.",'$sa','$da','$ti','$ra','$gr',$service_id);";
				$ob->insert_data($sql);
				//insert krdn la table orders
				$sql="INSERT INTO orders(orderd_by,order_number,order_type,document_type,date_en,date_ku,ser_id_for,ser_type_for) VALUES (?,?,?,?,?,?,?,?);";	
				for($i=0;$i<count($orders);$i++)
					$ob->insert_prepare($sql,$orders[$i][0],$orders[$i][1],$orders[$i][2],$orders[$i][3],$orders[$i][4],$orders[$i][5],$service_id,"service_calculation");
				echo json_encode($result_info[0]);
			}			
		}
	}		
?>