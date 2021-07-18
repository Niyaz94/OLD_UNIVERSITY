<!DOCTYPE html>
<html lang="en">
<head>
  <title>خشته‌ی مووچه‌</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  
	<link rel="stylesheet" type="text/css" href="../../../CSS/design_milakat_1.css">
	<link href="../../../need/magicsuggest/magicsuggest.css" rel="stylesheet">
	<link rel="stylesheet" type="text/css" 		 href="../../../need/DataTables/media/css/jquery.dataTables.css"> 
	<link rel="stylesheet" type="text/css" 		 href="../../../CSS/css_table_data.css">
	<script src="../../../need/jquery/jquery-1.12.0.js"></script>
</head>
<body class="color">
<?php 
	include("header_ku_us.php");
?>

<div class="container ">

	<div class="row">
	<?php
			$ob=new class_database("localhost","root","root","HR");	
			$sql = "SELECT * FROM salary_table";	
			$output =$ob->return_data($sql);	
			$max=$output[0]["grade"];
			for($i=0; $i<count($output);++$i)
				if($max<$output[$i]["grade"])
				  $max=$output[$i]["grade"];
		?>		
		<table id="salary_table" class="table table-striped table-hover" >
			<thead>	<?php
				echo "<tr>";
				echo "<th>پلە</th>";
				for($i=0;$i<$max;$i++){
					$ff=$i+1;
						echo "<th>ساڵی $ff</th>";
					}
				echo "<th>ساڵانە</th>";
				echo "<th>بەرزکردنەوە</th>";
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
					echo "</tr>";
				}
			?></tbody>
			</table>
	
			
	</div>	
</div>
	<script type="text/javascript" charset="utf8" src="../../../need/DataTables/media/js/jquery.dataTables.js"></script>
<script>
	$(document).ready(function (){	
	   $("#salary_table").DataTable({
		"language": {
			"sProcessing":    "Procesando...",
			"sLengthMenu":    "پیشاندانی _MENU_ داخلکراو",
			"sZeroRecords":   "No se encontraron resultados",
			"sEmptyTable":    "هیچ زانیاریەک بەردەست نیە لە خشتەکە",
			"sInfo":          "پیشاندانی داخلکراوەکان لە _START_ تا _END_ لە کۆی  _TOTAL_ داخلکراو",
			"sInfoEmpty":     "پیشاندانی 0 تا 0 لە 0 داخلکراو",
			"sInfoFiltered":  "(filtrado de un total de _MAX_ registros)",
			"sInfoPostFix":   "",
			"sSearch":        " گه‌ران ",
			"sUrl":           "",
			"sInfoThousands":  ",",
			"sLoadingRecords": "Cargando...",
			"oPaginate": {
				"sNext":    "دواتر",
				"sPrevious": "پێشتر"
			}
		}
    });
});
</script>
</body>
</html>