<!DOCTYPE html>
<html>
<head>
	<title>Promation</title>
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
	</style>
</head>
	
<body>
<?php include("header_en_hr.php"); ?>


	<div class="container-fluid">
  <div class="row content">
<br/><br/>
  <div class="col-md-1 col-md-offset-1">	
			<form role="form">
				<div class="form-group">
				  <select class="form-control btn btn-primary" id="month_list">
				    <option disabled selected value>select</option>
					<option>1</option><option>2</option><option>3</option><option>4</option><option>5</option><option>6</option><option>7</option>
					<option>8</option><option>9</option><option>10</option><option>11</option><option>12</option><option>old</option><option>new</option>
				  </select>
				</div>
			</form>
	</div>
    <div class="col-md-10 col-md-offset-1">
		
		<table id="promotion_table" class="table table-striped table-hover table-responsive">
			<col width="25%"><col width="10%"><col width="10%"><col width="15%"><col width="15%"><col width="%25">
			<thead><tr><th>Name</th><th>New Rank</th><th>New Grade</th><th>New Salary</th><th>New Annual Date</th><th>Action</th></tr></thead>
			<br/><br/>
			<tbody>
			</tbody>	
		</table>
		
	<div class="modal fade" id="remove_Modal" role="dialog" style="margin-left: auto; margin-right: auto; margin-top: 60px; ">
    <div class="modal-dialog modal-sm">
      <div class="modal-content" style="background-color: #454d60; ">  
		<div class="modal-header" style="border-color: #454d60;">
		<button type="button" class="close" data-dismiss="modal">&times;</button>
		<center><h3 style="color: white;"> Remove </h3></center></div>
        <div class="modal-body" style="border-color: #454d60;">	
			<form id="remove_form" class="form-horizontal" role="form">	
			<b>
				<div class="form-group">
					<div class="col-sm-12"> <input type="date" class="form-control text-center" id="new_annual" title="New Annual Date" data-placement="left"></div>
				</div>	  
			</b></form>
        </div>
        <div class="modal-footer" style="border-color: #454d60;">
			<button id="remove_save" type="button" class="btn btn-success btn-default pull-right" disabled><span class="glyphicon glyphicon-save"></span>Save</button>
		</div>
   </div></div></div> 
     
   <div class="modal fade" id="edit_Modal" role="dialog" style="margin-left: auto; margin-right: auto; margin-top: 60px; ">
		<div class="modal-dialog ">
		  <div class="modal-content" style="background-color: #454d60; "> 

			<div class="modal-header" style="border-color: #454d60;">
			<button type="button" class="close" data-dismiss="modal">&times;</button>
			<center><h3 style="color: white;">Change Information </h3></center></div>
			<div class="modal-body" style="border-color: #454d60;">	
					
				<form id="service_form" class="form-horizontal role="form">
				<div class="row col-md-12">
				
				<div class="form-group">
					<div id="div_new_title" class="col-md-6 has-success has-feedback">
						<input id="new_title" class="form-control" type="text" placeholder="New Title">
						<span  id="span_new_title" class="glyphicon glyphicon-ok form-control-feedback"></span>
					</div>	
					<div id="div_old_title" class="col-md-6 has-success has-feedback">
						<input id="old_title" class="form-control" type="text"  placeholder="Old Title" >
						<span  id="span_old_title" class="glyphicon glyphicon-ok form-control-feedback"></span>
					</div>
				</div>
				
				<div class="form-group">
					<div id="div_new_salary" class="col-md-6 has-success has-feedback">
						<input id="new_salary" class="form-control" type="number" placeholder="New Salary">
						<span  id="span_new_salary" class="glyphicon glyphicon-ok form-control-feedback"></span>
					</div>	
					<div id="div_old_salary" class="col-md-6 has-success has-feedback">
						<input id="old_salary" class="form-control" type="text"  placeholder="Old Salary" >
						<span  id="span_old_salary" class="glyphicon glyphicon-ok form-control-feedback"></span>
					</div>
				</div>
				
					
				<div class="form-group">
					<div id="div_new_rank" class="col-md-6 has-success has-feedback">
						<input id="new_rank" class="form-control"  type="number" placeholder="New Rank">
						<span  id="span_new_rank" class="glyphicon glyphicon-ok form-control-feedback"></span>
					</div>
					<div id="div_old_rank" class="col-md-6 has-success has-feedback">
						<input id="old_rank" class="form-control" type="number" placeholder="Old Rank" >
						<span  id="span_old_rank" class="glyphicon glyphicon-ok form-control-feedback"></span>
					</div> 
				</div>
				
				<div class="form-group">
					<div id="div_new_grade" class="col-md-6 has-success has-feedback">
						<input id="new_grade" class="form-control" type="number" placeholder="New Grade">
						<span  id="span_new_grade" class="glyphicon glyphicon-ok form-control-feedback"></span>
					</div>
					<div id="div_old_grade" class="col-md-6 has-success has-feedback">
						<input id="old_grade" class="form-control" type="number"  placeholder="Old Grade" >
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
				
				<div class="form-group">
					<div id="div_service" class="col-md-6 has-success has-feedback">
						<input id="service" class="form-control" type="text"  placeholder="Service Period" >
						<span  id="span_service" class="glyphicon glyphicon-ok form-control-feedback"></span>
					</div>
				</div>
								
				</div></form>		
			</div>
			
			<div class="modal-footer" style="border-color: #454d60;">
				<button type="button" id="edit_save" class="btn  btn-success pull-right">Save</button>
				<button type="button" id="edit_reset" class="btn btn-default pull-right">Reset</button>
				
			</div>
	   </div></div></div>


		<div class="modal fade" id="save_Modal" role="dialog" style="margin-left: auto; margin-right: auto; margin-top: auto;">
			<div class="modal-dialog modal-lg">
			  <div class="modal-content" style="background-color: #454d60; color: white; ">
			  
				<div class="modal-header" style="border-color: #454d60;">
				  <button type="button" class="close" data-dismiss="modal">&times;</button>
				  <center><h3 style="color: white;">Salary Promotion Order</h3></center></div>
				  
				
				<div id="m_body" class="modal-body" style="border-color: #454d60;" >
					<form  id="order_form" class="form-horizontal" role="form">
						 <div id="order_row" class="row col-md-12 "></div>
					</form>				
				</div>
				
				<div class="modal-footer" style="border-color: #454d60;">
                
				<button type="button" id="save_save" class="btn btn-success pull-right col-md-1" >Save</button>&nbsp;&nbsp;
				<button type="button" id="save_add" class="btn btn-info  pull-right col-md-1" >Add</button>
				<button type="button" id="save_remove"  class="btn btn-danger  pull-right col-md-1" >Remove</span></button>
				</div>		
		</div></div></div>	
    
	<div class="modal fade" id="change_Modal" role="dialog" style="margin-left: auto; margin-right: auto; margin-top: 60px; ">
    <div class="modal-dialog modal-sm">
      <div class="modal-content" style="background-color: #454d60; ">  
		<div class="modal-header" style="border-color: #454d60;">
		<button type="button" class="close" data-dismiss="modal">&times;</button>
		<center><h3 style="color: white;"> Change Promotion State </h3></center></div>
        <div class="modal-body" style="border-color: #454d60;">	
			<form id="remove_form" class="form-horizontal" role="form">	
			<b>
				<div class="form-group">
					<div class="checkbox col-sm-12"><label><input id="check_prom" type="checkbox" value="">Stop Promotion</label></div>
				</div>						
			</b></form>
        </div>
        <div class="modal-footer" style="border-color: #454d60;">
			<button id="change_save" type="button" class="btn btn-success btn-default pull-right"><span class="glyphicon glyphicon-save"></span>Save</button>
		</div>
   </div></div></div> 
	
	</div>
  </div>
</div>

	<script type="text/javascript" charset="utf8" src="../../../need/DataTables/media/js/jquery.dataTables.js"></script>
	<script src="../Javascript/validation.js"></script>
	<script src="../Javascript/prom_en_hr.js"></script>

</body>
</html>