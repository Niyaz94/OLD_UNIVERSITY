<!DOCTYPE html>
<html>
<head>
	<title>Acceleration</title>
<meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  	<script src="../../../need/jquery/jquery-1.12.0.js"></script>
	<link rel="stylesheet" type="text/css" href="../../../CSS/design_milakat_1.css">
	<link rel="stylesheet" type="text/css" 		 href="../../../need/DataTables/media/css/jquery.dataTables.css">
	<link href="../../../need/magicsuggest/magicsuggest.css" rel="stylesheet">

	
	<style>
		.custom, .custom input {
			color: blue;
			background: #ECEEFF !important;
			border-radius: 0 !important;
		}
	</style>
</head>
<body>

<?php 
	include("header_ar_hr.php");
	include("../../../database.php");
	$ob=new class_database("localhost","root","","human_resources_4");
?>

	<div class="container-fluid">
	<div class="row ">
			<br/><br/><br/>

	<div class="col-sm-8 col-sm-offset-1">
	
		<form class="form form-horizontal" action="#" method="post">
			<div class="form-group">
				<div class="col-md-2"><select id="certificate" class="form-control "  >
				<option disabled selected value> تحديد </option>
					<?php
						$sql="SELECT cer_name FROM certificate_rule";
						$result=$ob->return_data($sql);
						for($i=1;$i<count($result);++$i){
							$val=$result[$i]['cer_name'];
							echo "<option>$val</option>";
						}
					?>	
				</select></div>
				<div class="col-md-4"><input  id="search_acc"  class="form-control" name="countries[]"></div>
				<div class="col-md-1"><button id="button_acc"  type="button" class="btn btn-primary "><span class="	glyphicon glyphicon-pencil"></span></button></div>
			</div>
		</form>
	</div>
	<br/><br/><br/>	
	<div class="col-sm-10 col-sm-offset-1">
		<table id="certificate_table" class="table table-striped table-hover table-responsive">
			<col width="20%"><col width="10%"><col width="15%"><col width="15%"><col width="20%"><col width="%20">
			<thead><tr><th>&nbsp;&nbsp;اسم</th><th>&nbsp;&nbsp;رتبة جديدة</th><th>&nbsp;&nbsp;درجة جديدة</th><th>&nbsp;&nbsp;راتب جديدة</th><th>&nbsp;&nbsp;التاريخ السنوي الجديد</th><th>&nbsp;&nbsp;عمل</th></tr></thead>
			<br/><br/>
			<tbody>
			</tbody>	
		</table>
    </div>
	
	<div class="modal fade" id="save_Modal" role="dialog" style="margin-left: auto; margin-right: auto; margin-top: auto;">
			<div class="modal-dialog modal-lg">
			  <div class="modal-content" style="background-color: #454d60; color: white; ">
			  
				<div class="modal-header" style="border-color: #454d60;">
				  <button type="button" class="close" data-dismiss="modal">&times;</button>
				  <center><h3 style="color: white;">طلب علاوة السنوي</h3></center></div>
				  
				
				<div id="m_body" class="modal-body" style="border-color: #454d60;" >
					<form  id="order_form" class="form-horizontal" role="form">
						 <div id="order_row" class="row col-md-12 "></div>
					</form>				
				</div>
				
				<div class="modal-footer" style="border-color: #454d60;">
                
				<button type="button" id="save_save" class="btn btn-success pull-right col-md-1" >حفظ</button>&nbsp;&nbsp;
				<button type="button" id="save_add" class="btn btn-info  pull-right col-md-1" >إضافة</button>
				<button type="button" id="save_remove"  class="btn btn-danger  pull-right col-md-1" >إزالة</span></button>
				</div>		
		</div></div></div>
		
		<div class="modal fade" id="edit_Modal" role="dialog" style="margin-left: auto; margin-right: auto; margin-top: 60px; ">
		<div class="modal-dialog ">
		  <div class="modal-content" style="background-color: #454d60; "> 

			<div class="modal-header" style="border-color: #454d60;">
			<button type="button" class="close" data-dismiss="modal">&times;</button>
			<center><h3 style="color: white;">تغيير المعلومات </h3></center></div>
			<div class="modal-body" style="border-color: #454d60;">	
					
				<form id="service_form" class="form-horizontal role="form">
				<div class="row col-md-12">
				
				<div class="form-group">
					<div id="div_new_title" class="col-md-6 has-success has-feedback">
						<input id="new_title" class="form-control" type="text" placeholder="عنوان وضیفی جديد">
						<span  id="span_new_title" class="glyphicon glyphicon-ok form-control-feedback"></span>
					</div>	
					<div id="div_old_title" class="col-md-6 has-success has-feedback">
						<input id="old_title" class="form-control" type="text"  placeholder="عنوان وضیفی القديم" >
						<span  id="span_old_title" class="glyphicon glyphicon-ok form-control-feedback"></span>
					</div>
				</div>
				
				<div class="form-group">
					<div id="div_new_salary" class="col-md-6 has-success has-feedback">
						<input id="new_salary" class="form-control" type="number" placeholder="راتب جديدة">
						<span  id="span_new_salary" class="glyphicon glyphicon-ok form-control-feedback"></span>
					</div>	
					<div id="div_old_salary" class="col-md-6 has-success has-feedback">
						<input id="old_salary" class="form-control" type="text"  placeholder="راتب القديم" >
						<span  id="span_old_salary" class="glyphicon glyphicon-ok form-control-feedback"></span>
					</div>
				</div>
				
					
				<div class="form-group">
					<div id="div_new_rank" class="col-md-6 has-success has-feedback">
						<input id="new_rank" class="form-control"  type="number" placeholder="رتبة جديدة">
						<span  id="span_new_rank" class="glyphicon glyphicon-ok form-control-feedback"></span>
					</div>
					<div id="div_old_rank" class="col-md-6 has-success has-feedback">
						<input id="old_rank" class="form-control" type="number" placeholder="رتبة القديم" >
						<span  id="span_old_rank" class="glyphicon glyphicon-ok form-control-feedback"></span>
					</div> 
				</div>
				
				<div class="form-group">
					<div id="div_new_grade" class="col-md-6 has-success has-feedback">
						<input id="new_grade" class="form-control" type="number" placeholder="درجة جديدة">
						<span  id="span_new_grade" class="glyphicon glyphicon-ok form-control-feedback"></span>
					</div>
					<div id="div_old_grade" class="col-md-6 has-success has-feedback">
						<input id="old_grade" class="form-control" type="number"  placeholder="درجة القديم" >
						<span  id="span_old_grade" class="glyphicon glyphicon-ok form-control-feedback"></span>
					</div>	
				</div>
				
				<div class="form-group">
					<div id="div_new_annual_date" class="col-md-6 has-success has-feedback">
						<input id="new_annual_date" class="form-control" type="date">
						<span  id="span_new_annual_date" class="glyphicon glyphicon-ok form-control-feedback"></span>
					</div>
					<div id="div_old_annual_date" class="col-md-6 has-success has-feedback">
						<input id="old_annual_date" class="form-control" type="date" >
						<span  id="span_old_annual_date" class="glyphicon glyphicon-ok form-control-feedback"></span>
					</div>
				</div>
								
				</div></form>		
			</div>
			
			<div class="modal-footer" style="border-color: #454d60;">
				<button type="button" id="edit_save" class="btn  btn-success pull-right">حفظ</button>
				<button type="button" id="edit_reset" class="btn btn-default pull-right">إعادة تعيين</button>
				
			</div>
	   </div></div></div>
	
  </div>
</div>

    <script src="../../../need/magicsuggest/magicsuggest.js"></script>
	<script type="text/javascript" charset="utf8" src="../../../need/DataTables/media/js/jquery.dataTables.js"></script>
	<script src="../Javascript/validation.js"></script>
	<script src="../Javascript/cert_ar_hr.js"></script>


</body>
</html>