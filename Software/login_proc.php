 <?php
			session_start();
			include("database.php");
			include("validation.php");
			
			if ($_SERVER["REQUEST_METHOD"] == "POST") {
			   if(isset($_POST["username"]) && isset($_POST["password"]) && isset($_POST["index"])){
				   $validation=new class_validation();
				   $index=$validation->test_input($_POST["index"]);
					$name_err=true;$pass_err=true;
					if (empty($_POST["username"])) {
						$name_err =false;
					}else{
						$username=$validation->test_input($_POST["username"]);
						$name_err =$validation->validate_name($username);
					}
					if (empty($_POST["password"])) {
						$pass_err =false;
					} else {
						$password=$validation->test_input($_POST["password"]);
						$pass_err =$validation->validate_password($password);
					}
					if($name_err==true && $pass_err==true){
						$ob=new class_database("localhost","root","root","HR");
					
						$sql = "SELECT user_name,password FROM user where user_name='$username';";
						$result =$ob->return_data($sql);
						if(count($result)==1){	
						
							$_SESSION["username"]=$result[0]["user_name"];
							
							if (password_verify($password,$result[0]["password"])){
								$_SESSION["password"]=$password;
							}else if($result[0]["password"]==$password){
								$_SESSION["password"]=$password;
							}	
							if(isset($_SESSION["username"]) && isset($_SESSION["password"])) {
								$user=$_SESSION["username"];
								$pass=$_SESSION["password"];
								$sql = "SELECT first_time FROM user where user_name='$user';";
								$result =$ob->return_data($sql);	
								if(count($result)==1 && $result[0]["first_time"]=="0"){
									if($index=="E")
										echo "English/user/PHP/password.php";
									else if($index=="K")
										echo "kurdish/user/PHP/password.php";
									else if($index=="A")
										echo "Arabic/user/PHP/password.php";
								}else if(count($result)==1 && $result[0]["first_time"]=="1"){
									if($index=="E")
										echo "English/user/PHP/header_en_us.php";
									else if($index=="K")
										echo "kurdish/user/PHP/header_ku_us.php";
									else if($index=="A")
										echo "Arabic/user/PHP/header_ar_us.php";
								}
								
							}
							
						}	
					}	
				
			  }		
			}  
	  ?>