<!DOCTYPE html>
<html>
<head>
	<title>سه‌رمووچه‌ی ساڵانه‌</title>
<meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
	
	<script src="../../../need/jquery/jquery-1.12.0.js"></script>
	<link rel="stylesheet" type="text/css" 		 href="../../../need/DataTables/media/css/jquery.dataTables.css">	
	<link rel="stylesheet" type="text/css" href="../../../CSS/design_milakat_1.css">
	
	<style>
			td{
				background:  rgba(112, 123, 130, 0.24) !important;
			}
			#m_body{
				max-height: calc(100vh - 200px);
				overflow-x: auto;
				overflow-y: auto;
			}
			.table th,td {
				text-align: center;   
			}
	</style>
</head>
<body>

<?php
	include("header_ku_hr.php");
?>


	<div class="container-fluid">
  <div class="row content">
  
	<br/><br/>
    <div class="col-md-2 col-md-offset-1">
	
		<form role="form">
				<div class="form-group">
				  <select class="form-control btn btn-primary" id="month_list">
				    <option disabled selected value>دیاریکردن</option>
					<option>1</option>
					<option>2</option>
					<option>3</option>
					<option>4</option>
					<option>5</option>
					<option>6</option>
					<option>7</option>
					<option>8</option>
					<option>9</option>
					<option>10</option>
					<option>11</option>
					<option>12</option>
					<option>کۆن</option>
					<option>نوێ</option>
				  </select>
				</div>
			</form>

	</div><br/><br/>
		<div class="col-md-10 col-md-offset-1">
		
		
		<table id="annual_table" class="table table-striped table-hover table-responsive">
			<col width="20%"><col width="15%"><col width="15%"><col width="15%"><col width="15%"><col width="%20">

			<thead><tr><th>ناو</th><th>پلەی نوێ</th><th>مەرتەبی نوێ</th><th>مووچه‌ی نوێ</th><th>ب.س.س.ن</th><th>کار</th></tr></thead>
			<br/><br/>
			<tbody>
			</tbody>	
		</table>
		
	<div class="modal fade" id="remove_Modal" role="dialog" style="margin-left: auto; margin-right: auto; margin-top: 60px; ">
    <div class="modal-dialog modal-sm">
      <div class="modal-content" style="background-color: #454d60; ">  
		<div class="modal-header" style="border-color: #454d60;">
		<button type="button" class="close" data-dismiss="modal">&times;</button>
		<center><h3 style="color: white;">لابردن </h3></center></div>
        <div class="modal-body" style="border-color: #454d60;">	
			<form id="remove_form" class="form-horizontal" role="form">	
			<b>
				<div class="form-group">
					<div class="col-sm-12"> <input type="date" class="form-control text-center" id="new_annual" title="برواری ساڵانەی نوێ" data-placement="left"></div>
				</div>							
			</b></form>
        </div>
        <div class="modal-footer" style="border-color: #454d60;">
			<button id="remove_save" type="button" class="btn btn-success btn-default pull-right" disabled><span class="glyphicon glyphicon-save"></span>خەزن</button>
		</div>
   </div></div></div> 
   
   <div class="modal fade" id="change_Modal" role="dialog" style="margin-left: auto; margin-right: auto; margin-top: 60px; ">
    <div class="modal-dialog modal-sm">
      <div class="modal-content" style="background-color: #454d60; ">  
		<div class="modal-header" style="border-color: #454d60;">
		<button type="button" class="close" data-dismiss="modal">&times;</button>
		<center><h3 style="color: white;"> گۆڕینی باری بەرزکردنەوە</h3></center></div>
        <div class="modal-body" style="border-color: #454d60;">	
			<form id="remove_form" class="form-horizontal" role="form">	
			<b>
				<div class="form-group">
					<div class="checkbox col-sm-12"><label><input id="check_prom" type="checkbox" value="">دەستپێکی بەرزکردنەوە</label></div>
				</div>						
			</b></form>
        </div>
        <div class="modal-footer" style="border-color: #454d60;">
			<button id="change_save" type="button" class="btn btn-success btn-default pull-right"><span class="glyphicon glyphicon-save"></span>خەزن</button>
		</div>
   </div></div></div> 
     
   <div class="modal fade" id="edit_Modal" role="dialog" style="margin-left: auto; margin-right: auto; margin-top: 60px; ">
		<div class="modal-dialog ">
		  <div class="modal-content" style="background-color: #454d60; "> 

			<div class="modal-header" style="border-color: #454d60;">
			<button type="button" class="close" data-dismiss="modal">&times;</button>
			<center><h3 style="color: white;">گۆڕینی زانیاری </h3></center></div>
			<div class="modal-body" style="border-color: #454d60;">	
					
				<form id="service_form" class="form-horizontal role="form">
				<div class="row col-md-12">
				
				<div class="form-group">
					<div id="div_new_salary" class="col-md-6 has-success has-feedback">
						<input id="new_salary" class="form-control" type="number" placeholder="مووچەی نوێ">
						<span  id="span_new_salary" class="glyphicon glyphicon-ok form-control-feedback"></span>
					</div>	
					<div id="div_old_salary" class="col-md-6 has-success has-feedback">
						<input id="old_salary" class="form-control" type="text"  placeholder="مووچەی کۆن" >
						<span  id="span_old_salary" class="glyphicon glyphicon-ok form-control-feedback"></span>
					</div>
				</div>
				
					
				<div class="form-group">
					<div id="div_new_rank" class="col-md-6 has-success has-feedback">
						<input id="new_rank" class="form-control"  type="number" placeholder="پلەی نوێ">
						<span  id="span_new_rank" class="glyphicon glyphicon-ok form-control-feedback"></span>
					</div>
					<div id="div_old_rank" class="col-md-6 has-success has-feedback">
						<input id="old_rank" class="form-control" type="number" placeholder="پلەی کۆن" >
						<span  id="span_old_rank" class="glyphicon glyphicon-ok form-control-feedback"></span>
					</div> 
				</div>
				
				<div class="form-group">
					<div id="div_new_grade" class="col-md-6 has-success has-feedback">
						<input id="new_grade" class="form-control" type="number" placeholder="مەرتەبی نوێ">
						<span  id="span_new_grade" class="glyphicon glyphicon-ok form-control-feedback"></span>
					</div>
					<div id="div_old_grade" class="col-md-6 has-success has-feedback">
						<input id="old_grade" class="form-control" type="number"  placeholder="مەرتەبی کۆن" >
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
				<button type="button" id="edit_save" class="btn  btn-success pull-right">خەزن</button>
				<button type="button" id="edit_reset" class="btn btn-default pull-right">ڕێکخستنەوە</button>
				
			</div>
	   </div></div></div>


		<div class="modal fade" id="save_Modal" role="dialog" style="margin-left: auto; margin-right: auto; margin-top: auto;">
			<div class="modal-dialog modal-lg">
			  <div class="modal-content" style="background-color: #454d60; color: white; ">
			  
				<div class="modal-header" style="border-color: #454d60;">
				  <button type="button" class="close" data-dismiss="modal">&times;</button>
				  <center><h3 style="color: white;">داواکاری سەرمووچەی ساڵانە</h3></center></div>
				  
				
				<div id="m_body" class="modal-body" style="border-color: #454d60;" >
					<form  id="order_form" class="form-horizontal" role="form">
						 <div id="order_row" class="row col-md-12 "></div>
					</form>				
				</div>
				
				<div class="modal-footer" style="border-color: #454d60;">
                
				<button type="button" id="save_save" class="btn btn-success pull-right col-md-1" >خەزن</button>&nbsp;&nbsp;
				<button type="button" id="save_add" class="btn btn-info  pull-right col-md-1" >زیادکردن</button>
				<button type="button" id="save_remove"  class="btn btn-danger  pull-right col-md-1" >لابردن</span></button>
				</div>		
		</div></div></div>



   

    </div>
  </div>
</div>


	<script type="text/javascript" charset="utf8" src="../../../need/DataTables/media/js/jquery.dataTables.js"></script>
	<script src="../Javascript/validation.js"></script>
	<script src="../Javascript/annu_ku_hr.js"></script>
	

</body>
</html>