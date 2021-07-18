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
				$sql="DELETE FROM certificate_rule WHERE cer_id='$id';";
				$ob->delete_data($sql);
				echo $_POST["remove"];
			}else if(isset($_POST["id"]) && isset($_POST["update"])){	
					$id=$_POST["id"];
					$start_rank=$_POST["start_rank"];
					$start_grade=$_POST["start_grade"];
					$end_rank=$_POST["end_rank"];
					$end_grade=$_POST["end_grade"];
					$year=$_POST["year"];
					$month=$_POST["month"];
					$name=$_POST["name"];
				$sql="UPDATE certificate_rule SET cer_name='$name',start_rank='$start_rank',start_grade='$start_grade',end_rank='$end_rank',end_grade='$end_grade',\n"
				    ."month_period='$month',year_period='$year' where cer_id='$id';";	
				$result=$ob->update_data($sql);
				if($result==true)
					echo 1;
			}
			else if( isset($_POST["add_new"])){		
					$start_rank=$_POST["start_rank"];
					$start_grade=$_POST["start_grade"];
					$end_rank=$_POST["end_rank"];
					$end_grade=$_POST["end_grade"];
					$year=$_POST["year"];
					$month=$_POST["month"];
					$name=$_POST["name"];
					
					$sql="SELECT max(cer_id) FROM certificate_rule";
					$id=$ob->return_data($sql);
					$id=$id[0]["max(cer_id)"]+1;
					
					
					$sql="INSERT INTO certificate_rule(cer_id,cer_name,start_rank,start_grade,end_rank,end_grade,month_period, year_period)\n"
						." VALUES ('$id','$name','$start_rank','$start_grade','$end_rank','$end_grade','$month','$year')";
					$ob->insert_data($sql);
					echo $id;
			}
		}
?>