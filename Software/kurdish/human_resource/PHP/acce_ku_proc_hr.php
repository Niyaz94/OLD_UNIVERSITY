<?php
	include("../../../process/peshxstn.php");
	include("../../../database.php");

	if ($_SERVER["REQUEST_METHOD"] == "POST") {
		$database=new class_database("localhost","root","","human_resources_4");
		if(isset($_POST['id'])){
			header('Content-Type: application/json');
			$ids = join("','",$_POST['id']); //ئه‌رێی ده‌كه‌ینه‌ سترینگ
			$sql = "select employee_id,full_name,S_date,zh_qdam,molat,sza from employee,information\n"
				  ."where employee_id In('$ids') and employee_id_for=employee_id;";	  
			$result =$database->return_data($sql);//ناوی ئه‌و كه‌سانه‌ی تێده‌یه‌ كه‌ قدم یان وه‌رگرتیه‌		
			$acceleration=new class_peshxstn_supas($result);
			$result=$acceleration->return_data();//ئه‌و به‌رواری نوێی سه‌رمووچه‌ی ساڵانه‌ی تێدایه‌		
			echo json_encode($result); 
		}
		else if(isset($_POST['info']) && isset($_POST['order']) && isset($_POST['check'])){
			$value=$_POST["info"];
			$employee_id=$value["employee_id"];
			$new_S_date=$value["new_S_date"];
			$new_zh_qdam=$value["new_zh_qdam"];
			
			if($_POST['check']=="true"){
				$sql = "UPDATE information,employee SET S_date='$new_S_date',zh_qdam='$new_zh_qdam'\n"
					 . "WHERE employee_id_for=employee_id and employee_id_for=$employee_id;";
				$database->update_data($sql);
			}	
			$orders=json_decode($_POST["order"], true);
			if(count($orders)>0){	
				$sql="INSERT INTO service(service_type,employee_id_for) VALUES ('thanks','$employee_id');";
				$service_id=$database->insert_data($sql);
				
				$sql="INSERT INTO orders(orderd_by,order_number,order_type,document_type,date_en,date_ku,ser_id_for,ser_type_for) VALUES (?,?,?,?,?,?,?,?);";	
				for($i=0;$i<count($orders);$i++)
					$database->insert_prepare($sql,$orders[$i][0],$orders[$i][1],$orders[$i][2],$orders[$i][3],$orders[$i][4],$orders[$i][5],$service_id,"thanks");
			}
		}
	}
				
?>