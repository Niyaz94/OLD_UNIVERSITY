<?php 
	session_start();
		if(!isset($_SESSION["username"]) && !isset($_SESSION["password"])) {
				header("Location: ../../../login.php");
	}
	include("../../../database.php");
?>
<?php 
		if ($_SERVER["REQUEST_METHOD"] == "POST") {
			if( isset($_POST["id"])  && isset($_POST["level"])){
				
				$level=$_POST["level"];
				$id=$_POST["id"];
				
				$ob=new class_database("localhost","root","","human_resources_4");
				
				$sql="select level from user where emp_id='$id';";
				$old_level=$ob->return_data($sql);
				
				if($old_level[0]["level"]!=$level){
					
					$sql="UPDATE user SET level='$level' WHERE emp_id='$id';";
					$ob->update_data($sql);
					
					if($level=="admin"){
						header('Content-Type: application/json');
						
						$sql ="SELECT employee_id,full_name,user_name,level FROM user,employee WHERE employee_id=emp_id and employee_id='$id';";
						$result=$ob->return_data($sql);
						
						echo json_encode($result[0]); 
					}else if($level=="user"){
						echo 0;//delete old row
					}	
				}else{
					echo -1;
				}
				
				
				
				
			}
		}
?>