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
	<link rel="stylesheet" type="text/css" href="../../../CSS/css_table_data.css">


	<style>
		.custom, .custom input {
			color: blue;
			background: #ECEEFF !important;
			border-radius: 0 !important;
		}
		td{
			background:  rgba(112, 123, 130, 0.24) !important;
		}
		#m_body{
			max-height: calc(100vh - 200px);
			overflow-x: auto;
			overflow-y: auto;
		}
	</style>
</head>
<?php include("header_ar_hr.php");?>
<body class="bgcolor " >

	<div class="container-fluid ">
  <div class="row content ">
<br/><br/><br/>
		<form action="#" method="post" class="col-md-3 col-md-offset-1">
			<div class="input-group">
				<input id="search_acc"  class="form-control" name="countries[]">
				<span class="input-group-btn">
						<button id="button_acc" class="btn btn-primary" type="button"><span class="	glyphicon glyphicon-pencil"></span></button>
				</span>
			</div>
		</form>
		<br/><br/>
		<div class="col-md-10 col-md-offset-1">
		<br/><br/>
		<table id="accelerarion_table" class='table table-bordered table-hover text-center table-responsive'>
			<col width="20%"><col width="20%"><col width="20%"><col width="20%"><col width="20%"><col width="%25">

			<thead><tr><th>&nbsp;&nbsp;اسم</th><th>&nbsp;&nbsp;تاريخ علاوة القديم</th><th>&nbsp;&nbsp;تاريخ بدل الجديد</th><th>&nbsp;&nbsp;عدد تقدیم</th><th>&nbsp;&nbsp;عمل</th></tr></thead>
			<br/><br/>
			<tbody>
			</tbody>	
		</table>
		
		
		 <div class="modal fade" id="check_Modal" role="dialog" style="margin-left: auto; margin-right: auto; margin-top: 60px; ">
			<div class="modal-dialog modal-sm">
			  <div class="modal-content" style="background-color: #454d60; ">  
				<div class="modal-header" style="border-color: #454d60;">
				<button type="button" class="close" data-dismiss="modal">&times;</button>
				<center><h3 style="color: white;">التاریخ السنوي</h3></center></div>
				<div class="modal-body" style="border-color: #454d60;">	
					<form id="remove_form" class="form-horizontal" role="form">	
					<b>
						<div class="form-group">
							<div class="checkbox col-sm-12"><label><input id="check_prom" type="checkbox" value="">تغيير التاريخ السنوي</label></div>
						</div>						
					</b></form>
				</div>
				<div class="modal-footer" style="border-color: #454d60;">
					<button id="check_save" type="button" class="btn btn-success btn-default pull-right"><span class="glyphicon glyphicon-save"></span>حفظ</button>
				</div>
		   </div></div></div> 
		   
		   
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
		
		
    </div>
  </div>
</div>

	<script type="text/javascript" charset="utf8" src="../../../need/DataTables/media/js/jquery.dataTables.js"></script>
    <script src="../../../need/magicsuggest/magicsuggest.js"></script>
	<script src="../Javascript/acce_ar_hr.js"></script>



</body>
</html>