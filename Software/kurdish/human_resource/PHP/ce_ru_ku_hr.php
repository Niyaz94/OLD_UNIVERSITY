<!DOCTYPE html>
<html lang="en">
<head>
  <title>یاساكانی بڕوانامه‌</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  
	<link rel="stylesheet" type="text/css" href="../../../CSS/design_milakat_1.css">
	<link href="../../../need/magicsuggest/magicsuggest.css" rel="stylesheet">
	<link rel="stylesheet" type="text/css" 		 href="../../../need/DataTables/media/css/jquery.dataTables.css"> 
	<script src="../../../need/jquery/jquery-1.12.0.js"></script>
	<style>
		.table th,td{
			text-align: center;   
		}
	</style>
</head>
<body >
<?php 
	include("header_ku_hr.php");
	include("../../../database.php");
?>

<div class="container">

	<div class="row">
	<br/><br/>
	<button type="button" id="add_new" class="btn btn-primary col-md-2" >زیادکردنی بڕوانامەی نۆێ</button>
	<br/><br/><br/><br/>
	
	<?php
			$ob=new class_database("localhost","root","","human_resources_4");	
			$sql = "SELECT * FROM certificate_rule";	
			$output =$ob->return_data($sql);	
		?>		
		<table id="certificate_table" class="table table-striped table-hover" >
			<thead>	<?php
				echo "<tr class='colorheader'>";
					echo "<th>ناوی بڕوانامەی</th>";
					echo "<th>پله‌ی س</th>";
					echo "<th>مه‌رته‌به‌ی س</th>";
					echo "<th>پله‌ی ك</th>";
					echo "<th>مه‌رته‌به‌ی ك</th>";
					echo "<th>پێ.به‌.ساڵ</th>";
					echo "<th>پێ.به‌.مانگ</th>";
					echo "<th>کار</th>";
				echo "</tr>";
			?></thead>
			<tbody><?php		
				for($i=0;$i<count($output);$i++){
					$id=$output[$i]['cer_id'];
					$name=$output[$i]['cer_name'];
					$start_rank=$output[$i]['start_rank'];
					$start_grade=$output[$i]['start_grade'];
					$end_rank=$output[$i]['end_rank'];
					$end_grade=$output[$i]['end_grade'];
					$month_period=$output[$i]['month_period'];
					$year_period=$output[$i]['year_period'];

						
					echo "<tr id='tr_$id'>";
						echo"<td>$name</td>";
						echo"<td>$start_rank</td>";		
						echo"<td>$start_grade</td>";		
						echo"<td>$end_rank</td>";		
						echo"<td>$end_grade</td>";								
						echo"<td>$month_period</td>";
						echo"<td>$year_period</td>";
						echo"<td>
							<button id='update_$id' type='button' class='btn btn-success btn-sm'><span class='glyphicon glyphicon-edit'></span></button>
							<button id='remove_$id' type='button' class='btn btn-danger btn-sm'><span class='glyphicon glyphicon-remove'></span></button>
						</td>";
					echo "</tr>";
				}
			?></tbody>
			</table>
	<div class="modal fade" id="certificate_modal" role="dialog" style="margin-left: auto; margin-right: auto; margin-top: 60px; ">
    <div class="modal-dialog">
      <div class="modal-content" style="background-color: #454d60; ">  
		<div class="modal-header" style="border-color: #454d60;">
		<button type="button" class="close" data-dismiss="modal">&times;</button>
		<center><h3 style="color: white;">گۆڕینی ئەم ڕیزە</h3></center></div>
        <div class="modal-body" style="border-color: #454d60;">	
			<form id="salary_form" class="form-horizontal" role="form">	
			<b>
				 <div class="form-group">
					<div id="div_start_rank" class="col-md-6 has-error has-feedback">
						<input id="start_rank" class="form-control" type="number" placeholder="پلەی سەرەتا">
						<span  id="span_start_rank" class="glyphicon glyphicon-remove form-control-feedback"></span>
					</div>	
					<div id="div_start_grade" class="col-md-6 has-error has-feedback">
						<input id="start_grade" class="form-control" type="number"  placeholder="مەرتەبی سەرەتا" >
						<span  id="span_start_grade" class="glyphicon glyphicon-remove form-control-feedback"></span>
					</div>
				</div>
				
					
				<div class="form-group">
					<div id="div_end_rank" class="col-md-6 has-error has-feedback">
						<input id="end_rank" class="form-control"  type="number" placeholder="پلەی کۆتایی">
						<span  id="span_end_rank" class="glyphicon glyphicon-remove form-control-feedback"></span>
					</div>
					<div id="div_end_grade" class="col-md-6 has-error has-feedback">
						<input id="end_grade" class="form-control" type="number" placeholder="مەرتەبی کۆتایی" >
						<span  id="span_end_grade" class="glyphicon glyphicon-remove form-control-feedback"></span>
					</div> 
				</div>
				
				<div class="form-group">
					<div id="div_year" class="col-md-6 has-error has-feedback">
						<input id="year" class="form-control" type="number"  placeholder="پێشخستنی ماوە بە ساڵ">
						<span  id="span_year" class="glyphicon glyphicon-remove form-control-feedback"></span>
					</div>
					<div id="div_month" class="col-md-6 has-error has-feedback">
						<input id="month" class="form-control" type="number"  placeholder="پێشخستنی ماوە بە مانگ" >
						<span  id="span_month" class="glyphicon glyphicon-remove form-control-feedback"></span>
					</div>	
				</div>
				
				<div class="form-group">
					<div id="div_name" class="col-md-6 has-error has-feedback">
						<input id="name" class="form-control"  type="text" placeholder="ناوی بڕوانامەی">
						<span  id="span_name" class="glyphicon glyphicon-remove form-control-feedback"></span>
					</div>
				</div>
				 
			</b></form>
        </div>
        <div class="modal-footer" style="border-color: #454d60;"><button id="save" type="button" class="btn btn-danger pull-right" disabled><span id="span_save" class="glyphicon glyphicon-remove"></span> خەزن</button></div>
   </div></div></div>   
			
			
	</div>	
</div>

	<script type="text/javascript" charset="utf8" src="../../../need/DataTables/media/js/jquery.dataTables.js"></script>
	<script src="../Javascript/ce_ru_ku_hr.js"></script>
	<script src="../Javascript/validation.js"></script>
</body>
</html>