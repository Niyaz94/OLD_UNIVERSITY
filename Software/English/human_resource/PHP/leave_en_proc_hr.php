<?php 
	session_start();
		if(!isset($_SESSION["username"]) && !isset($_SESSION["password"])) {
				header("Location: ../../../login.php");
	}
	include("../../../database.php");
?>
<?php 
		if ($_SERVER["REQUEST_METHOD"] == "POST") {
			$ob=new class_database("localhost","root","root","HR");

			if(isset($_POST["id"]) && isset($_POST["remove"])){
				$id=$_POST["id"];
				$new=$_POST["date"];

				$sql="UPDATE information SET S_date='$new',molat='0' WHERE employee_id_for='$id';";
				$ob->update_data($sql);
				
				$sql="DELETE FROM molat WHERE employee_id_for='$id';";
				$ob->delete_data($sql);
				echo $_POST["remove"];
			}else if(isset($_POST["id"]) && isset($_POST["check"])){
					header('Content-Type: application/json');
					$id=$_POST["id"];
					$sql="select molat,S_date FROM information where employee_id_for=$id;";
					$result=$ob->return_data($sql);						
					if(count($result)>0 && $result[0]["molat"]==1){	
						echo 1;
					}else{
						$year=$_POST["year"];
						$month=$_POST["month"];
						$day=$_POST["day"];	
						$date["type"]=0;
						$date["old"]=$result[0]["S_date"];	
						$date1=date_create($date["old"]);
						if(0 <= $month && $month < 12 && 0 <= $year && $year<= 10){
							date_modify($date1,"+$month months");
							date_modify($date1,"+$year years");
							date_modify($date1,"+$day days");
						}
						$date["new"]=date_format($date1,"Y-m-d");
						echo json_encode($date);
					}	
			}else if(isset($_POST["id"]) && isset($_POST["check_update"])){
					header('Content-Type: application/json');
					$id=$_POST["id"];
					$sql="select old_annual FROM molat where employee_id_for=$id;";
					$result=$ob->return_data($sql);						
					
						$year=$_POST["year"];
						$month=$_POST["month"];
						$day=$_POST["day"];	
						
						$date["old"]=$result[0]["old_annual"];	
						$date1=date_create($date["old"]);
						if(0 <= $month && $month < 12 && 0 <= $year && $year<= 10 && 0 <= $day && $day<= 31){
							date_modify($date1,"+$month months");
							date_modify($date1,"+$year years");
							date_modify($date1,"+$day days");
						}
						$date["new"]=date_format($date1,"Y-m-d");
						echo json_encode($date);
			}else if(isset($_POST["user_id"]) && isset($_POST["insert"])){
					header('Content-Type: application/json');
					$sql="SELECT max(molat_id) FROM molat";
					$id=$ob->return_data($sql);
					$id=$id[0]["max(molat_id)"]+1;
					$user_id=$_POST["user_id"];
					$new=$_POST["new"];
					$old=$_POST["old"];
					$year=$_POST["year"];
					$month=$_POST["month"];
					$day=$_POST["day"];
					$sql="INSERT INTO molat(molat_id,year,month,day,new_annual,old_annual,employee_id_for) VALUES\n"
					    ."('$id','$year','$month','$day','$new','$old','$user_id')";
					$ob->insert_data($sql);	
					$sql="UPDATE information SET S_date='$new',molat='1' WHERE employee_id_for='$user_id';";
					$ob->update_data($sql);
					$sql="SELECT full_name FROM employee WHERE employee_id='$user_id';";
					$result=$ob->return_data($sql);							
					echo json_encode($result[0]);
			}else if(isset($_POST["id"]) && isset($_POST["update"])){
				
					$id=$_POST["id"];
					$new=$_POST["new"];
					$old=$_POST["old"];
					$year=$_POST["year"];
					$month=$_POST["month"];
					$day=$_POST["day"];
					
					$sql="UPDATE molat SET year='$year',month='$month',day='$day',new_annual='$new',old_annual='$old' WHERE employee_id_for='$id';";
					$result=$ob->update_data($sql);
					if($result==true)
						echo 1;
					else if($result==false)
						echo 0;
			}
		}
?>