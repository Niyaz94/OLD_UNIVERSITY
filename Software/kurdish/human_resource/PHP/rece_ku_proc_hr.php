<?php 
	session_start();
		if(!isset($_SESSION["username"]) && !isset($_SESSION["password"])) {
				header("Location: ../../../login.php");
	}
	include("../../../database.php");
?>
<?php 
		if ($_SERVER["REQUEST_METHOD"] == "POST") {
			$ob=new class_database("localhost","root","","human_resources_4");
			header('Content-Type: application/json');

			if(isset($_POST["id"]) && isset($_POST["remove"])){
				$id=$_POST["id"];			
				$sql="DELETE FROM message WHERE message_id='$id';";
				$ob->delete_data($sql);		
			}else if(isset($_POST["id"]) && isset($_POST["seen"])){
				$id=$_POST["id"];
				$sql="SELECT content FROM message WHERE message_id='$id';";
				$result=$ob->return_data($sql);
				if(count($result)>0)
					echo json_encode($result[0]);
			}
		}
?>