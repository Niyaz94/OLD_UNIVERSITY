<!DOCTYPE html>
<html lang="en">
<head>
  <title>Department</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
<style type="text/css">


.panel-heading{
  background-image: linear-gradient(to bottom,white 0%, white 100%) !important;
}

.toppad
{ margin-top:20px;
}

.color {
         background-color:#4d5f7a;
      }
 .table > tbody > tr > td  {
    border-top:0 !important;
}

.bb{
  height: 620px;
}

</style>
</head>
<?php
include("header_en_us.php");
?>
<body class="color white" >
<div class="bgcolor bb">

<div class=" container sizeee">
      <div class="row ">
        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 col-xs-offset-0 col-sm-offset-0 col-md-offset-0 col-lg-offset-0 toppad" >
          <div class="panel-heading">
            <h4 id="full_name"><b>Full Name</b></h4>
            </div>
            <br><br>
              <div class="row">
                <div class="col-md-3 col-lg-3 photo" align="center"> 
                <img alt="User photo" src="../../../image/ic_about1.png" class="img-circle img-responsive"> </div>
                
              <div class=" col-md-9 col-lg-9 "> 
                  <table class="table table-user-information"><tbody>
				  
			<?php
				if(isset($_SESSION["username"]) && isset($_SESSION["password"])){//bakar det bo auae bzane session ka check kraea
					$user=$_SESSION["username"];
					$pass=$_SESSION["password"];
					$sql = "SELECT emp_id FROM user where user_name='$user';";//id au employee dadoztaua ka daxele system kae bua
						$ob=new class_database("localhost","root","root","HR");//call class e database krdea
						$result =$ob->return_data($sql);
						if(count($result)==1){//agar result la 1 zeatr bu hech maka chunka deara 2 kas ba haman username u password e haea
							$id=$result[0]["emp_id"];
							$sql = "SELECT full_name,phone_number,email,CONCAT(current_country, ' , ', current_city,' , ', current_address) AS Address,cert_name,college_name,department_name,expert,post,salary,title,rank,grade\n"
								 . "FROM employee,department,information,certificate\n"
                                 . "WHERE department.employee_id_for=employee_id and information.employee_id_for=employee_id and certificate.employee_id_for=employee_id and employee_id=$id;";
							$output =$ob->return_data($sql);
							
							$title=array("Email : ","Phone Number : ","Address : ","Collage : ","Department : ","Certificaton : ","Expect : ","Post : ","Salary : ","Title : ","Rank : ","Grade : ");
							$out=array("email","phone_number","Address","college_name","department_name","cert_name","expert","post","salary","title","rank","grade");
							
							for($i=0;$i<count($title);$i++){
								echo "<tr>";
									echo"<td>$title[$i]</td>";
									$x=$output[0][$out[$i]];
									echo"<td>$x</td>";
								echo "</tr>";
							}
							
							$name=$output[0]["full_name"];
							echo "<script type='text/javascript'>
								$(document).ready(function(){
									$('#full_name').text('$name');
								});
								</script>";
						}
					}
				?>				  
                    	
				</tbody></table>
                  
                </div>
              </div>
              </div>
          </div>
    </div>
  </div>
</div>
</div>
</body>

</html>
