<!DOCTYPE html>
<html lang="en">
<head>
  <title>خشته‌ی مووچه‌</title>
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
	<br/><br/><br/>
	<?php
			$ob=new class_database("localhost","root","","human_resources_4");	
			$sql = "SELECT * FROM salary_table";	
			$output =$ob->return_data($sql);
			$max=$output[0]["grade"];
			for($i=0; $i<count($output);++$i)
				if($max<$output[$i]["grade"])
				  $max=$output[$i]["grade"];
		?>		
		<table id="salary_table" class="table table-striped table-hover" >
			<thead>	<?php
				echo "<tr class='colorheader'>";
				echo "<th>&nbsp;&nbsp;پلە</th>";
				for($i=0;$i<$max;$i++){
					$ff=$i+1;
						echo "<th>ساڵ $ff</th>";
					}
				echo "<th>ساڵانە</th>";
				echo "<th>بەرزکردنەوە</th>";
				echo "<th>کار</th>";
				echo "</tr>";
			?></thead>
			<tbody><?php
				for($i=0;$i<count($output);$i++){
					$id=$output[$i]['id'];
					$basic=$output[$i]['basic'];
					$rank=$output[$i]['rank'];
					$grade=$output[$i]['grade'];
					$increase_salary=$output[$i]['increase_salary'];
					$increase_year=$output[$i]['increase_year'];
					if($increase_year==-1){
						$increase_year=0;
						$rank="Special ".$rank;
					}
						
					echo "<tr id='tr_$id'>";
					echo"<td>$rank</td>";		
					for($j=0;$j<$grade;$j++){
						echo "<td>$basic</td>";
						$basic+=$increase_salary;
					}	
					echo"<td>$increase_salary</td>";
					echo"<td>$increase_year</td>";
					echo"<td>
							<button id='update_$id' type='button' class='btn btn-success btn-sm'><span class='glyphicon glyphicon-edit'></span></button>
					</td>";
					echo "</tr>";
				}
			?></tbody>
			</table>
	<div class="modal fade" id="myModal" role="dialog" style="margin-left: auto; margin-right: auto; margin-top: 60px; ">
    <div class="modal-dialog">
      <div class="modal-content" style="background-color: #454d60; ">  
		<div class="modal-header" style="border-color: #454d60;">
		<button type="button" class="close" data-dismiss="modal">&times;</button>
		<center><h3 style="color: white;">گۆڕینی ئەم ڕیزە</h3></center></div>
        <div class="modal-body" style="border-color: #454d60;">	
			<form id="salary_form" class="form-horizontal" role="form">	
			<b>
				 <div class="form-group">
					<div id="div_basic" class="col-md-offset-3 col-md-6 has-error has-feedback">
						<input type="number" class="form-control text-center" id="basic" placeholder="مووچه‌ی بنه‌ره‌تی" title="مووچەی ئەسڵی" placeholder="مووچەی ئەسڵی" data-placement="left">
						<span  id="span_basic" class="glyphicon glyphicon-remove form-control-feedback"></span>
					</div>
				</div>	
				<div class="form-group">
					<div id="div_salary_increase" class="col-md-offset-3 col-md-6 has-error has-feedback offset">
						<input type="number" class="form-control text-center" id="salary_increase" title="زیاد بوونی مووچە" placeholder="زیاد بوونی مووچە" data-placement="left">
						<span  id="span_salary_increase" class="glyphicon glyphicon-remove form-control-feedback"></span>
					</div>
				</div>
				<div class="form-group">
					 <div id="div_rank_year" class="col-md-offset-3 col-md-6 has-error has-feedback">
						<input type="number" class="form-control text-center" id="rank_year" title="ماوه‌ی به‌رزبونه‌وه‌"  placeholder="ماوه‌ی به‌رزبونه‌وه‌" data-placement="right">
						<span  id="span_rank_year" class="glyphicon glyphicon-remove form-control-feedback"></span>
					</div>
				</div> 
				 
			</b></form>
        </div>
        <div class="modal-footer" style="border-color: #454d60;"><button id="save" type="button" class="btn btn-danger pull-right" disabled><span id="span_save" class="glyphicon glyphicon-remove"></span> خەزن</button></div>
   </div></div></div>   
			
			
	</div>	
</div>
	<script type="text/javascript" charset="utf8" src="../../../need/DataTables/media/js/jquery.dataTables.js"></script>
	<script src="../Javascript/sa_ta_ku_hr.js"></script>
</body>
</html>