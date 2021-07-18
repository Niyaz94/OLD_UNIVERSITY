<!DOCTYPE html>
<html lang="en">
<head>
  <title>Leave</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  
	<link rel="stylesheet" type="text/css" href="../../../CSS/design_milakat_1.css">
	<link href="../../../need/magicsuggest/magicsuggest.css" rel="stylesheet">
	<link rel="stylesheet" type="text/css" 		 href="../../../need/DataTables/media/css/jquery.dataTables.css"> 
	<script src="../../../need/jquery/jquery-1.12.0.js"></script>
</head>
<body >
<?php 
	include("header_en_hr.php");
	include("../../../database.php");
?>

<div class="container">

	<div class="row">
	<br/><br/>
	<form action="#" method="post" class="col-md-3 col-md-offset-0">
			<div class="input-group">
				<input id="search_acc"  class="form-control" name="countries[]">
				<span class="input-group-btn">
						<button id="add_new" type="button" class="btn btn-primary"><span class="	glyphicon glyphicon-pencil"></span></button>
				</span>
			</div>	
		</form>
		<br/><br/><br/>
		<br/><br/>
	
		<?php
			$ob=new class_database("localhost","root","root","HR");	
			$sql = "SELECT employee_id,full_name,year,month,day,new_annual,old_annual FROM molat,information,employee\n"
			      ."where information.employee_id_for=employee_id and molat.employee_id_for=employee_id;";	
			$output =$ob->return_data($sql);	
		?>		
		<table id="leave_table" class="table table-striped table-hover" >
			<thead>	<?php
				echo "<tr class='colorheader'>";
					echo "<th>Full Name</th>";
					echo "<th>Year</th>";
					echo "<th>Month</th>";
					echo "<th>Day</th>";
					echo "<th>From</th>";
					echo "<th>To</th>";
					echo "<th>Action</th>";
				echo "</tr>";
			?></thead>
			<tbody><?php		
				for($i=0;$i<count($output);$i++){
					$id=$output[$i]['employee_id'];
					$name=$output[$i]['full_name'];
					$year=$output[$i]['year'];
					$month=$output[$i]['month'];
					$day=$output[$i]['day'];
					$trom=$output[$i]['old_annual'];
					$to=$output[$i]['new_annual'];

						
					echo "<tr id='tr_$id'>";
						echo"<td>$name</td>";
						echo"<td>$year</td>";		
						echo"<td>$month</td>";		
						echo"<td>$day</td>";		
						echo"<td>$trom</td>";								
						echo"<td>$to</td>";
						echo"<td>
							<button id='update_$id' type='button' class='btn btn-success btn-sm'><span class='glyphicon glyphicon-edit'></span></button>
							<button id='remove_$id' type='button' class='btn btn-danger btn-sm'><span class='glyphicon glyphicon-remove'></span></button>
						</td>";
					echo "</tr>";
				}
			?></tbody>
			</table>
	<div class="modal fade" id="insert_Modal" role="dialog" style="margin-left: auto; margin-right: auto; margin-top: 60px; ">
    <div class="modal-dialog modal-sm">
      <div class="modal-content" style="background-color: #454d60; ">  
		<div class="modal-header" style="border-color: #454d60;">
		<button type="button" class="close" data-dismiss="modal">&times;</button>
		<center><h3 style="color: white;"> Insert Information </h3></center></div>
        <div class="modal-body" style="border-color: #454d60;">	
			<form id="leave_form" class="form-horizontal" role="form">	
			<b>
				 <div class="form-group">
					<div id="div_year" class="col-md-12 has-error has-feedback">
						<input id="year" class="form-control" type="number" placeholder="Year">
						<span  id="span_year" class="glyphicon glyphicon-remove form-control-feedback"></span>
					</div>	
					
				</div>	
				<div class="form-group">
					<div id="div_month" class="col-md-12 has-error has-feedback">
						<input id="month" class="form-control"  type="number" placeholder="Month">
						<span  id="span_month" class="glyphicon glyphicon-remove form-control-feedback"></span>
					</div>
				</div>
				<div class="form-group">
					<div id="div_day" class="col-md-12 has-error has-feedback">
						<input id="day" class="form-control" type="number"  placeholder="Day">
						<span  id="span_day" class="glyphicon glyphicon-remove form-control-feedback"></span>
					</div>
				</div>
			</b></form>
        </div>
        <div class="modal-footer" style="border-color: #454d60;"><button id="enter_save" type="button" class="btn btn-danger pull-right" disabled><span id="span_enter_save" class="glyphicon glyphicon-remove"></span> Save </button></div>
   </div></div></div>   
   
   <div class="modal fade" id="error_Modal" role="dialog" style="margin-left: auto; margin-right: auto; margin-top: 60px; ">
    <div class="modal-dialog modal-sm">
      <div class="modal-content" style="background-color: #454d60; ">  
		<div class="modal-header" style="border-color: #454d60;">
		<button type="button" class="close" data-dismiss="modal">&times;</button></div>
        <div class="modal-body" style="border-color: #454d60;">	
			<h3>This employee have already Leave you can not add another</h3>
        </div>
   </div></div></div>  
   
   
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
   
   <div class="modal fade" id="data_Modal" role="dialog" style="margin-left: auto; margin-right: auto; margin-top: 60px; ">
    <div class="modal-dialog modal-sm">
      <div class="modal-content" style="background-color: #454d60; ">  
		<div class="modal-header" style="border-color: #454d60;">
		<button type="button" class="close" data-dismiss="modal">&times;</button>
		<center><h3 style="color: white;"> Insert Information </h3></center></div>
        <div class="modal-body" style="border-color: #454d60;">	
			<form id="data_form" class="form-horizontal" role="form">	
			<b>
				 <div class="form-group">
				     <label class="control-label col-sm-2" for="old">From:</label>
					<div id="div_old" class="col-md-10 has-success has-feedback">
						<input id="old" class="form-control" type="Date" >
						<span  id="span_old" class="glyphicon glyphicon-ok form-control-feedback"></span>
					</div>		
				</div>	
				<div class="form-group">
				    <label class="control-label col-sm-2" for="new">To:</label>
					<div id="div_new" class="col-md-10 has-success has-feedback">
						<input id="new" class="form-control"  type="date" >
						<span  id="span_new" class="glyphicon glyphicon-ok form-control-feedback"></span>
					</div>
				</div>	
			</b></form>
        </div>
        <div class="modal-footer" style="border-color: #454d60;"><button id="data_save" type="button" class="btn btn-success pull-right" > Save </button></div>
   </div></div></div>   
			
			
	</div>	
</div>

	<script type="text/javascript" charset="utf8" src="../../../need/DataTables/media/js/jquery.dataTables.js"></script>
    <script src="../../../need/magicsuggest/magicsuggest.js"></script>
	<script src="../Javascript/leave_en_hr.js"></script>
	<script src="../Javascript/validation.js"></script>
</body>
</html>