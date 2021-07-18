<!DOCTYPE html>
<html>
<head>
	<title>Acceleration</title>
<meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" type="text/css" href="../../../CSS/design_milakat_1.css">
	<link rel="stylesheet" type="text/css" 		 href="../../../need/DataTables/media/css/jquery.dataTables.css">
	<link href="../../../need/magicsuggest/magicsuggest.css" rel="stylesheet">

	
	<style>
		.custom, .custom input {
			color: blue;
			background: #ECEEFF !important;
			border-radius: 0 !important;
		}
		iframe {
			display: block;
			height: calc(100vh - 30px);
		}

	</style>
</head>
<body>


<?php include("header_ar_hr.php");?>

	<div class="container-fluid">
  <div class="row content">
  
		<div class="col-sm-3 sidenav">	
			<br/>
			<button id="salary_table" type="button" class="col-sm-12 btn btn-info">جدول المرتبات</button>
			<br/>
			<button id="password" type="button" class="col-sm-12 btn btn-info">كلمه السر</button>
			<br/><br/>
			<button id="button1" type="button" class="col-sm-12 btn btn-info">سنوية</button>
			<br/>
		
		</div>

		<div class="col-sm-9">
					<iframe id="frameDemo" class="col-sm-12" style="border:none;"></iframe>
		</div>
  </div>
</div>


	<script src="../../../need/jquery/jquery-1.12.0.js"></script>
	<script>
		$(document).ready(function (){
			$("#password").click(function(){
				$( "#frameDemo" ).attr( "src", "../../setting/PHP/password.php" );
			});
			
			$("#salary_table").click(function(){
				$( "#frameDemo" ).attr( "src", "../../setting/PHP/salary_table.php" );
			});
			
			
		});			
	</script>

</body>
</html>