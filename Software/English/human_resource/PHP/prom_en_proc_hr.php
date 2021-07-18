<?php
		include("../../../process/barzkrdnaua.php");
?>
<?php
	if ($_SERVER["REQUEST_METHOD"] == "POST") {
		
		$ob=new class_database("localhost","root","root","HR");
		
		if(isset($_POST['manth'])){
			header('Content-Type: application/json');
			$date=date("Y-n-j");
			$m=$_POST['manth'];
			$y=date("Y");
			if($m==-1){//bakar det bo garanauae au employee na ka S_date ean ae sale peshua
				$sql ="SELECT employee_id,full_name,cert_name,S_date,title,rank,grade,salary,barzkrdnaua,sarmucha,sza,taebat,molat FROM information,employee,certificate\n"
					 ."where employee_id=information.employee_id_for and employee_id=certificate.employee_id_for and S_date <'$y-1-1';";
			}else if($m==13){//bakar det bo garanauae au employee na ka S_date ean ae sale dahatua
				$sql ="SELECT employee_id,full_name,cert_name,S_date,title,rank,grade,salary,barzkrdnaua,sarmucha,sza,molat,taebat FROM information,employee,certificate\n"
					 ."where employee_id=information.employee_id_for and employee_id=certificate.employee_id_for and S_date >'$y-12-31';";	 
			}else{
				$number = cal_days_in_month(CAL_GREGORIAN, $m,$y);
				$sql ="SELECT employee_id,full_name,cert_name,S_date,title,rank,grade,salary,barzkrdnaua,sarmucha,sza,taebat,molat FROM information,employee,certificate\n"
					 ."where employee_id=information.employee_id_for and employee_id=certificate.employee_id_for and S_date between '$y-$m-1' And '$y-$m-$number'";		 
			}
			$result =$ob->return_data($sql);	
			if (count($result) > 0) {
				$barzkrdnaua=new class_barzkrdnaua($result);//call e au class e dakat hata au employee nae kate barzkrdanuaean hatea bgarentaua
				echo json_encode($barzkrdnaua->return_output());
			}
		}else if(isset($_POST['change']) && isset($_POST['id']) ){
			$employee_id=$_POST['id'];		
			$sql = "SELECT barzkrdnaua FROM information,employee WHERE employee_id_for=employee_id and employee_id_for=$employee_id;";	 
			$result=$ob->return_data($sql);
			$barzkrdnaua=$result[0]["barzkrdnaua"];
			if($barzkrdnaua==1){
				$sql = "UPDATE information,employee SET barzkrdnaua='0' WHERE employee_id=employee_id_for and employee_id_for='$employee_id'";
				$ob->update_data($sql);
			}else if($barzkrdnaua==0){
				//do nothing
			}
		}else if(isset($_POST['remove']) && isset($_POST['id']) && isset($_POST['date'])){
			$remove_id=$_POST['id'];
			$remove_date=$_POST['date'];
			$sql = "UPDATE information,employee SET S_date='$remove_date' WHERE employee_id=employee_id_for and employee_id_for='$remove_id'";
			$ob->update_data($sql);
		}else if(isset($_POST['info']) && isset($_POST['order'])){
			$value=json_decode($_POST["info"], true);
			$employee_id=$value[0];
			$salary=$value[1];
			$new_salary=$value[2];
			$rank=$value[3];
			$new_rank=$value[4];
			$grade=$value[5];
			$new_grade=$value[6];
			$S_date=$value[7];
			$new_S_date=$value[8];
			$title=$value[9];
			$new_title=$value[10];
			$new_barz=$value[11];
			$new_sarm=$value[12];
			$service=$value[13];

			$sql = "UPDATE information,employee SET S_date='$new_S_date',salary='$new_salary',rank='$new_rank',grade='$new_grade',zh_qdam='0',barzkrdnaua='$new_barz',sarmucha='$new_sarm'\n"
				 . "WHERE employee_id_for=employee_id and employee_id_for=$employee_id;";
			$check=$ob->update_data($sql);	
			$orders=json_decode($_POST["order"], true);
			$sql="INSERT INTO service(service_type,employee_id_for) VALUES ('promotion','$employee_id');";
			$service_id=$ob->insert_data($sql);
			
			$sql="INSERT INTO promotion(ser_id_for,new_rank,old_rank,new_grade,old_grade,old_title,new_title,new_salary,old_salary,period_service)\n"
			     ." VALUES ('$service_id','$new_rank','$rank','$new_grade','$grade','$title','$new_title','$new_salary','$salary','$service')";
			$ob->insert_data($sql);	
			
			if(count($orders)>0){
				$sql="INSERT INTO orders(orderd_by,order_number,order_type,document_type,date_en,date_ku,ser_id_for,ser_type_for) VALUES (?,?,?,?,?,?,?,?);";	
				for($i=0;$i<count($orders);$i++)
					$ob->insert_prepare($sql,$orders[$i][0],$orders[$i][1],$orders[$i][2],$orders[$i][3],$orders[$i][4],$orders[$i][5],$service_id,"promotion");
			}	
			echo $service;
		}
	}
?>