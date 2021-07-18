<!DOCTYPE html>
<html lang="en">
<head>
  <title>Bootstrap Example</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1"> 
	<script src="../../../need/jquery/jquery-1.12.0.js"></script>
  	<link rel="stylesheet" type="text/css" 		 href="../../../need/DataTables/media/css/jquery.dataTables.css"> 
     <link rel="stylesheet" type="text/css" 		 href="../../../CSS/css_table_data.css">

<script type="text/javascript">
	$(document).ready(function(){
    $('input').tooltip();
});
</script>

</head>
<body style="background-color: #4c5c77;">
	<?php 
		include("header_ar_us.php");
	?>
<div class="container-fluid bgcolor">	

<div class="row content">
	<div class="col-sm-10 col-sm-offset-1">
	
	<table id="annual_table" class="table table-striped table-hover">
		<thead><tr><th>اسم</th><th>مرتبه</th><th>درجة القديم</th><th>درجة الجديد</th><th>التاريخ السنوات</th><th>عمل</th></tr></thead>
		<br/><br/>
		<b>
		<tbody>	
		<?php
				if(isset($_SESSION["username"]) && isset($_SESSION["password"])){//bakar det bo auae bzane session ka check kraea
					$user=$_SESSION["username"];
					$pass=$_SESSION["password"];
					$sql = "SELECT emp_id FROM user where user_name='$user';";//id au employee dadoztaua ka daxele system kae bua
						$ob=new class_database("localhost","root","","human_resources_4");//call class e database krdea
						$result =$ob->return_data($sql);
						if(count($result)==1){//agar result la 1 zeatr bu hech maka chunka deara 2 kas ba haman username u password e haea
							$id=$result[0]["emp_id"];	
							$sql = "SELECT service_id,full_name,rank,old_grade,new_grade,annual_date\n"
								  ."FROM employee,service,annual_allowance\n"
                                  ."WHERE employee_id_for=employee_id and service_id=ser_id_for and employee_id='$id';";
							$output =$ob->return_data($sql);
							//hamu zanera eakane nau query ka la table kae dabne
							for($i=0;$i<count($output);$i++){
									$ser_id=$output[$i]['service_id'];
									$full_name=$output[$i]['full_name'];
									$rank=$output[$i]['rank'];
									$old_gradw=$output[$i]['old_grade'];
									$new_grade=$output[$i]['new_grade'];
									$doaa=$output[$i]['annual_date'];

								    echo "<tr>";
									echo"<td>$full_name</td>";
									echo"<td>$rank</td>";
									echo"<td>$old_gradw</td>";
									echo"<td>$new_grade</td>";
									echo"<td>$doaa</td>";
									echo"<td><button id='button_$ser_id' type='button' class='btn btn-default'><span class='glyphicon glyphicon-th-list'></span></button></td>";
								    echo "</tr>";
							}						  
						}
				}
		?>	

		</tbody></b>
	</table>
		
	<div class="modal modal-lg fade" id="myModal" role="dialog" style="margin-left: auto; margin-right: auto; margin-top: 60px; ">
    <div class="modal-dialog">
      <div class="modal-content" style="background-color: #454d60; ">  
		<div class="modal-header" style="border-color: #454d60;"><center><h3 style="color: white;"> جمع المعلومات</h3></center></div>
        <div class="modal-body" style="border-color: #454d60;">	
			<form class="form-horizontal" role="form">	
			<b>
				<div class="form-group">
					<div class="col-sm-6"> <input type="text" class="form-control text-center" id="new_salary" title="راتب الجديد" readonly data-placement="left"></div>
					<div class="col-sm-6"> <input type="text" class="form-control text-center" id="old_salary" title="راتب القديم" readonly  data-placement="left"></div>
				</div>	  
				<div class="form-group">
					<div class="col-sm-6"> <input type="text" class="form-control text-center" id="title" title="عنوان الوضيفي" readonly data-placement="left"></div>
					<div class="col-sm-6"> <input type="text" class="form-control text-center" id="qdam" title="رقم قدم" readonly data-placement="left"></div>
				</div>  
			</b></form>
        </div>
        <div class="modal-footer" style="border-color: #454d60;"><button type="submit" class="btn btn-danger btn-default pull-right" data-dismiss="modal"><span class="glyphicon glyphicon-remove"></span>الغاء</button></div>
   </div></div></div>   
</div></div></div>
	<script type="text/javascript" charset="utf8" src="../../../need/DataTables/media/js/jquery.dataTables.js"></script>
  	<script src="../Javascript/annu_ar_us.js"></script>
</body>
</html>