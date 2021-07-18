<!DOCTYPE html>
<html lang="en">
<head>
  <title>Bootstrap Example</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1"> 
	<script src="../../../need/jquery/jquery-1.12.0.js"></script>
  	<link rel="stylesheet" type="text/css" 		 href="../../../need/DataTables/media/css/jquery.dataTables.css"> 
 <script type="text/javascript">
	$(document).ready(function(){
    $('input').tooltip();
});
</script>
<style type="text/css">
	label
{
  margin-bottom: 35px !important;
}
input[type="search"] {
	border-radius: 5px;

	}
.dataTables_info , .dataTables_paginate
{
   margin-top: 15px !important;
}
th{
	background-color: #454d60 !important;
}
.table-hover{
	background-color: #dcdfe1 !important;
}
</style>
</head>
<body>
	<?php include("header_ar_us.php");?>

<div class="container-fluid">
<div class="row content">
	<div class="col-sm-10 col-sm-offset-1">
	
	<table id="annual_table" class="table table-striped table-hover">
		<thead><tr><th>اسم</th><th>نوع خدمة</th><th>مدة خدمة</th><th> مدة تطویل</th><th>من التاريخ</th><th>الی التاريخ</th><th>عمل</th></tr></thead>
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
							$sql = "SELECT ser_cal_id,full_name,service_cal_period,service_cal_type,increasing_period,from_date,to_date\n"
								  ."FROM employee,service,service_calculation\n"
								  ."WHERE employee_id=employee_id_for and ser_id_for=service_id and employee_id='$id';";
							$output =$ob->return_data($sql);
							//hamu zanera eakane nau query ka la table kae dabne
							for($i=0;$i<count($output);$i++){
									$ser_cal_id=$output[$i]['ser_cal_id'];
									$full_name=$output[$i]['full_name'];
									$period=$output[$i]['service_cal_period'];
									$type=$output[$i]['service_cal_type'];
									$increasing=$output[$i]['increasing_period'];
									$from=$output[$i]['from_date'];
									$to=$output[$i]['to_date'];

								    echo "<tr>";
									echo"<td>$full_name</td>";
									echo"<td>$type</td>";
									echo"<td>$period</td>";
									echo"<td>$increasing</td>";
									echo"<td>$from</td>";
									echo"<td>$to</td>";
									echo"<td><button id='button_$ser_cal_id' type='button' class='btn btn-default'><span class='glyphicon glyphicon-th-list'></span></button></td>";
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
					<div class="col-sm-6"> <input type="text" class="form-control text-center" id="new_title" title="عنوان الوضيفي الجديد" readonly data-placement="left"></div>
					<div class="col-sm-6"> <input type="text" class="form-control text-center" id="old_title" title="عنوان الوضيفي القديم" readonly  data-placement="left"></div>
				</div>	  
				<div class="form-group">
					<div class="col-sm-6"> <input type="text" class="form-control text-center" id="new_salary" title="الراتب الجديد" readonly data-placement="left"></div>
					<div class="col-sm-6"> <input type="text" class="form-control text-center" id="old_salary" title="الراتب القديم" readonly data-placement="left"></div>
				</div>  
				<div class="form-group">
					<div class="col-sm-6"> <input type="text" class="form-control text-center" id="new_rank" title="مرتبه الجديد" readonly data-placement="left"></div>
					<div class="col-sm-6"> <input type="text" class="form-control text-center" id="old_rank" title="مرتبه القديم" readonly data-placement="left"></div>
				</div>  
				<div class="form-group">
					<div class="col-sm-6"> <input type="text" class="form-control text-center" id="new_grade" title="درجة الجديد" readonly data-placement="left"></div>
					<div class="col-sm-6"> <input type="text" class="form-control text-center" id="old_grade" title="درجة القديم" readonly data-placement="left"></div>	
				</div>  
				<div class="form-group">
					<div class="col-sm-6"> <input type="text" class="form-control text-center" id="new_annual_date" title="التاريخ السنوات الجديد" readonly data-placement="left"></div>
					<div class="col-sm-6"> <input type="text" class="form-control text-center" id="old_annual_date" title="التاريخ السنوات القديم" readonly data-placement="left"></div>
				</div>	
			</b></form>
        </div>
        <div class="modal-footer" style="border-color: #454d60;"><button type="submit" class="btn btn-danger btn-default pull-right" data-dismiss="modal"><span class="glyphicon glyphicon-remove"></span>الغاء</button></div>
   </div></div></div>   
</div></div>
						 									  
</div>
	<script type="text/javascript" charset="utf8" src="../../../need/DataTables/media/js/jquery.dataTables.js"></script>
  	<script src="../Javascript/serv_ar_us.js"></script>
</body></html>