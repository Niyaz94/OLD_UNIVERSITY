<?php 
	session_start();
		if(!isset($_SESSION["username"]) && !isset($_SESSION["password"])) {
				header("Location: ../../../login.php");
	}
	include("../../../process/bruanama.php");
?>
<?php 
		if ($_SERVER["REQUEST_METHOD"] == "POST") {
			
			$ob=new class_database("localhost","root","root","HR");
			
			if(isset($_POST["id"]) && isset($_POST["cert"])){
				header('Content-Type: application/json');

				$id=$_POST["id"];
				$certificate=$_POST["cert"];
				//class e database call dakaen
				//zaneareakan dagarenenaua 
				$sql ="SELECT employee_id,full_name,cert_name,S_date,rank,grade,salary,title,barzkrdnaua,sarmucha,molat FROM information,employee,certificate\n"
					 ."where employee_id=information.employee_id_for and employee_id=certificate.employee_id_for and  employee_id='$id'; ";
				$result_info=$ob->return_data($sql);
				//agar chand certifiacate ke habu axer qle bgarenaua
				if(count($result_info)>1){
					$result_info=$result_info[count($result_info)-1];
				}
				$result_info[0]["new_certificate"]=$certificate;
				// user aesta ch brua namake haea
				$user_cert=$result_info[0]["cert_name"];
				// zaneareakane brua namae kon
				$sql="SELECT start_rank,start_grade,end_rank,end_grade,month_period,year_period FROM certificate_rule WHERE cer_name='$user_cert';";
				$old_cert=$ob->return_data($sql);
				// zaneareakane brua namae nwe
				$sql="SELECT start_rank,start_grade,end_rank,end_grade,month_period,year_period FROM certificate_rule WHERE cer_name='$certificate';";
				$new_cert=$ob->return_data($sql);	
				
				$result_info[0]["month"]=$new_cert[0]["month_period"];
				$result_info[0]["year"]=$new_cert[0]["year_period"];

				$bruanama=new class_bruanama($result_info[0],$old_cert[0],$new_cert[0]);
				$result=$bruanama->return_data();
				echo  json_encode($result);
			}else if(isset($_POST['info']) && isset($_POST['order'])){
				//$value=$_POST['info'];
				$value=json_decode($_POST["info"], true);
				
				$employee_id=$value["employee_id"];
				$salary=$value["salary"];
				$new_salary=$value["new_salary"];
				$rank=$value["rank"];
				$new_rank=$value["new_rank"];
				$grade=$value["grade"];
				$new_grade=$value["new_grade"];
				$S_date=$value["S_date"];
				$new_S_date=$value["new_doaa"];
				$title=$value["title"];
				$new_title=$value["new_title"];
				$new_barz=$value["barzkrdnaua"];
				$new_sarm=$value["sarmucha"];
				
				$ser="";
				if($value["year"]>0 && $value["month"]>0)
					$ser=$value["year"]." year  ".$value["month"]."  month ";
				else if($value["year"]>0)
					$ser=$value["year"]." year ";
				else if($value["month"]>0)
					$ser=$value["month"]."  month";
				
				$sql = "UPDATE information,employee SET S_date='$new_S_date',salary='$new_salary',title='$new_title',rank='$new_rank',grade='$new_grade',barzkrdnaua='$new_barz',sarmucha='$new_sarm'\n"
					 . "WHERE employee_id_for=employee_id and employee_id_for=$employee_id;";
				$check=$ob->update_data($sql);
				
				$sql="INSERT INTO service(service_type,employee_id_for) VALUES ('certificate','$employee_id');";
				$service_id=$ob->insert_data($sql);
				
				$sql="INSERT INTO acceleration(new_rank,old_rank,new_grade,old_grade,new_title,old_title,new_salary,old_salary, new_annual_date,old_annual_date,acceleration_period,ser_id_for)\n"
					." VALUES ('$new_rank','$rank','$new_grade','$grade','$new_title','$title','$new_salary','$salary','$new_S_date','$S_date','$ser','$service_id')";	
				$ob->insert_data($sql);
					
				$orders=json_decode($_POST["order"], true);
				if(count($orders)>0){
					$sql="INSERT INTO orders(orderd_by,order_number,order_type,document_type,date_en,date_ku,ser_id_for,ser_type_for) VALUES (?,?,?,?,?,?,?,?);";	
					for($i=0;$i<count($orders);$i++)
						$ob->insert_prepare($sql,$orders[$i][0],$orders[$i][1],$orders[$i][2],$orders[$i][3],$orders[$i][4],$orders[$i][5],$service_id,"certificate");
				}	
		}
	}
?>