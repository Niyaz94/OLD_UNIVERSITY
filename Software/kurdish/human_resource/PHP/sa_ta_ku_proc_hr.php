<?php 
	session_start();
		if(!isset($_SESSION["username"]) && !isset($_SESSION["password"])) {
				header("Location: ../../../login.php");
	}
	include("../../../database.php");
?>
<?php 
		if ($_SERVER["REQUEST_METHOD"] == "POST") {
			if(isset($_POST["id"]) && isset($_POST["basic"]) && isset($_POST["salary"]) && isset($_POST["year"])){		
				$id=$_POST["id"];
				$basic=$_POST["basic"];
				$salary=$_POST["salary"];
				$year=$_POST["year"];			
				
				$sql="UPDATE salary_table SET basic='$basic',increase_salary='$salary',increase_year='$year' WHERE id='$id';";
				$ob=new class_database("localhost","root","","human_resources_4");
				$result=$ob->update_data($sql);
				
				$result=$ob->update_data($sql);
					if($result==true)
						echo 1;
					else if($result==false)
						echo 0;
			}
		}
?>