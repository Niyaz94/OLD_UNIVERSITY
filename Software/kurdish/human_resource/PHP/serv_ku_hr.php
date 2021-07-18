<!DOCTYPE html>
<html lang="en">
<head>
  <title>هه‌ژماری راژه‌</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" type="text/css" href="../../../CSS/design_milakat_1.css">
	<link href="../../../need/magicsuggest/magicsuggest.css" rel="stylesheet">
	<link rel="stylesheet" type="text/css" 		 href="../../../need/DataTables/media/css/jquery.dataTables.css"> 
	<script src="../../../need/jquery/jquery-1.12.0.js"></script>

	<style>
		#m_body{
			max-height: calc(100vh - 200px);
			overflow-x: auto;
			overflow-y: auto;
		}
		.table th,td{
			text-align: center;   
		}
	</style>
</head>
<body>
<?php include("header_ku_hr.php");?>
<div class="container-fluid">
  <div class="row content">
<br/><br/><br/>
		<form action="#" method="post" class="col-md-3 col-md-offset-1">
			<div class="input-group">
				<input id="search_acc"  class="form-control" name="countries[]">
				<span class="input-group-btn">
						<button id="button_ser" type="button" class="btn btn-primary"><span class="	glyphicon glyphicon-pencil"></span></button>
				</span>
			</div>	
		</form>
		<br/><br/><br/><br/>
		
		<div class="col-md-10 col-md-offset-1">
		<table id="service_table" class="table table-striped table-hover">
			<thead><tr><th>ن.ن فه‌رمانبه‌ر</th><th>ن.ك فه‌رمانبه‌ر</th><th>مووچه‌ی ن</th><th>موچه‌ی ك</th><th>پله‌ی ن</th><th>پله‌ی ك</th><th>مه‌رته‌به‌ی ن</th><th>مه‌رته‌به‌ی ك</th></tr></thead>
			<br/><br/>
			<tbody>
			</tbody>	
		</table>
		</div>
			
		<div class="modal fade" id="myModal1" role="dialog" style="margin-left: auto; margin-right: auto; margin-top: 60px; ">
		<div class="modal-dialog ">
		  <div class="modal-content" style="background-color: #454d60; "> 
			<div class="modal-header" style="border-color: #454d60;">
			<button type="button" class="close" data-dismiss="modal">&times;</button>
			<center><h3 style="color: white;">هەژماری ڕاژە</h3></center></div>
			<div class="modal-body" style="border-color: #454d60;">	
					
				<form id="service_form" class="form-horizontal role="form">
				<div class="row col-md-12">
				
				<div class="form-group">
					<div id="div_salary" class="col-md-6 has-success has-feedback">
						<input id="salary" class="form-control" type="number" placeholder="مووچەی نوێ" disabled>
						<span  id="span_salary" class="glyphicon glyphicon-ok form-control-feedback"></span>
					</div>	
					<div id="div_title" class="col-md-6 has-error has-feedback">
						<input id="title" class="form-control" type="text"  placeholder="ن.ن فه‌رمانبه‌ر" >
						<span  id="span_title" class="glyphicon glyphicon-remove form-control-feedback"></span>
					</div>
				</div>					
				<div class="form-group">
					<div id="div_rank" class="col-md-6 has-error has-feedback">
						<input id="rank" class="form-control"  type="number" placeholder="پلەی نوێ">
						<span  id="span_rank" class="glyphicon glyphicon-remove form-control-feedback"></span>
					</div>
					<div id="div_grade" class="col-md-6 has-error has-feedback">
						<input id="grade" class="form-control" type="number" placeholder="مەرتەبی نوێ" >
						<span  id="span_grade" class="glyphicon glyphicon-remove form-control-feedback"></span>
					</div> 
				</div>
				
				<div class="form-group">
					<div id="div_doaa" class="col-md-6 has-error has-feedback">
						<input id="doaa" class="form-control" type="text"  placeholder="بەرواری سەرمووچەی ساڵانەی نوێ" onfocus="(this.type='date')" data-toggle="tooltip">
						<span  id="span_doaa" class="glyphicon glyphicon-remove form-control-feedback"></span>
					</div>
					<div id="div_increasing" class="col-md-6 has-error has-feedback">
						<input id="increasing" class="form-control" type="text"  placeholder="زیادکردنی ماوە" data-toggle="tooltip">
						<span  id="span_increasing" class="glyphicon glyphicon-remove form-control-feedback"></span>
					</div>	
				</div>
				
				<div class="form-group">
					<div id="div_service_type" class="col-md-6 has-error has-feedback">
						<input id="service_type" class="form-control" type="text"  placeholder="جۆری هەژماری ڕاژە">
						<span  id="span_service_type" class="glyphicon glyphicon-remove form-control-feedback"></span>
					</div>
					<div id="div_service_period" class="col-md-6 has-error has-feedback">
						<input id="service_period" class="form-control" type="text"  placeholder="ماوە هەژماری ڕاژە" >
						<span  id="span_service_period" class="glyphicon glyphicon-remove form-control-feedback"></span>
					</div>	
				</div>
				
				<div class="form-group">
					<div id="div_from" class="col-md-6 has-error has-feedback">
						<input id="from" class="form-control" type="text"  placeholder="لە" onfocus="(this.type='date')">
						<span  id="span_from" class="glyphicon glyphicon-remove form-control-feedback"></span>
					</div>
					<div id="div_to" class="col-md-6 has-error has-feedback">
						<input id="to" class="form-control" type="text"  placeholder="بۆ" onfocus="(this.type='date')" >
						<span  id="span_to" class="glyphicon glyphicon-remove form-control-feedback"></span>
					</div>
				</div>
								
				</div></form>		
			</div>		
			<div class="modal-footer" style="border-color: #454d60;">
				<button type="button" id="continue" class="btn btn-primary btn-default pull-right" disabled>دواتر</button>
				
			</div>
	   </div></div></div>  
	   <div class="modal fade" id="error_Modal" role="dialog" style="margin-left: auto; margin-right: auto; margin-top: 60px; ">
		<div class="modal-dialog modal-sm">
		  <div class="modal-content" style="background-color: #454d60; ">  
			<div class="modal-header" style="border-color: #454d60;">
			<button type="button" class="close" data-dismiss="modal">&times;</button></div>
			<div class="modal-body" style="border-color: #454d60;">	
				<h3>ئەم فەرمانبەرە مۆڵەتی بێمووچەی وەرگرتووە ناتوانی دانەیەکی تر زیاد بکەی</h3>
			</div>
	   </div></div></div>  
		<div class="modal fade" id="myModal2" role="dialog" style="margin-left: auto; margin-right: auto; margin-top: auto;">
			<div class="modal-dialog modal-lg">
			  <div class="modal-content" style="background-color: #454d60; color: white; ">  
				<div class="modal-header" style="border-color: #454d60;">
				  <button type="button" class="close" data-dismiss="modal">&times;</button>
				  <center><h3 style="color: white;">داواکاری هەژماری ڕاژە</h3></center></div>
				<div id="m_body" class="modal-body" style="border-color: #454d60;" >
					<form id="order_form" class="form-horizontal" role="form">
						 <div id="order_row" class="row col-md-12 "></div>
					</form>				
				</div>	
				<div class="modal-footer" style="border-color: #454d60;"> 
				<button type="button" id="save" class="btn btn-success pull-right col-md-1" >خەزن</button>
				&nbsp;&nbsp;
				<button type="button" id="add" class="btn btn-info  pull-right col-md-1" >زیادکردن</button>
				<button type="button" id="remove"  class="btn btn-danger  pull-right col-md-1" >لابردن</span></button>
				<button type="button" id="previous" class="btn btn-primary  pull-right col-md-1" >پێشتر</button>
				</div>		
		</div></div></div>
    </div>
  </div>
</div>

    <script src="../../../need/magicsuggest/magicsuggest.js"></script>
	<script type="text/javascript" charset="utf8" src="../../../need/DataTables/media/js/jquery.dataTables.js"></script>
	<script src="../Javascript/serv_ku_hr.js"></script>
</body>
</html>

