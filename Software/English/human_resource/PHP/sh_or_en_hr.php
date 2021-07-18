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
<?php include("header_en_hr.php");?>
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

			<thead><tr><th>Full Name</th><th>Service Type</th><th>Action</th></tr></thead>
			<br/><br/>
			<tbody>
			</tbody>	
		</table>
				
<div class="modal modal-lg fade" id="annual_Modal" role="dialog" style="margin-left: auto; margin-right: auto; margin-top: 60px; ">
    <div class="modal-dialog">
      <div class="modal-content" style="background-color: #454d60; ">  
		<div class="modal-header" style="border-color: #454d60;"><center><h3 style="color: white;"> All Information </h3></center></div>
        <div class="modal-body" style="border-color: #454d60;">	
			<form class="form-horizontal" role="form">	
			<b>
				<div class="form-group">	
					<div class="col-sm-6"> <input type="text" class="form-control text-center" id="annual_rank" title="Rank" readonly data-placement="top"></div>
					<div class="col-sm-6"> <input type="text" class="form-control text-center" id="annual_title" title="Title" readonly  data-placement="top"></div>
				</div>
				<div class="form-group">
					<div class="col-sm-6"> <input type="text" class="form-control text-center" id="annual_new_grade" title="New Grade" readonly data-placement="top"></div>
					<div class="col-sm-6"> <input type="text" class="form-control text-center" id="annual_old_grade" title="Old Grade" readonly  data-placement="top"></div>
				</div>
				<div class="form-group">
					<div class="col-sm-6"> <input type="text" class="form-control text-center" id="annual_new_salary" title="New Salary" readonly data-placement="top"></div>
					<div class="col-sm-6"> <input type="text" class="form-control text-center" id="annual_old_salary" title="Old Salary" readonly  data-placement="top"></div>
				</div>	  
				<div class="form-group">
					<div class="col-sm-6"> <input type="text" class="form-control text-center" id="annual_date" title="Annual Date" readonly data-placement="top"></div>
					<div class="col-sm-6"> <input type="text" class="form-control text-center" id="annual_qdam" title="Acceleration Number" readonly data-placement="top"></div>
				</div>  
			</b></form>
        </div>
        <div class="modal-footer" style="border-color: #454d60;"><button type="submit" class="btn btn-danger btn-default pull-right" data-dismiss="modal"><span class="glyphicon glyphicon-remove"></span> Cancel</button></div>
   </div></div></div>   
</div></div></div>

<div class="modal modal-lg fade" id="promotion_Modal" role="dialog" style="margin-left: auto; margin-right: auto; margin-top: 60px; ">
    <div class="modal-dialog">
      <div class="modal-content" style="background-color: #454d60; ">  
		<div class="modal-header" style="border-color: #454d60;"><center><h3 style="color: white;"> All Information </h3></center></div>
        <div class="modal-body" style="border-color: #454d60;">	
			<form class="form-horizontal" role="form">	
			<b>
				<div class="form-group">
					<div class="col-sm-6"> <input type="text" class="form-control text-center" id="pro_new_rank" title="New Rank" readonly data-placement="top"></div>
					<div class="col-sm-6"> <input type="text" class="form-control text-center" id="pro_old_rank" title="Old Rank" readonly  data-placement="top"></div>
				</div>	  
				<div class="form-group">
					<div class="col-sm-6"> <input type="text" class="form-control text-center" id="pro_new_grade" title="New Grade" readonly data-placement="top"></div>
					<div class="col-sm-6"> <input type="text" class="form-control text-center" id="pro_old_grade" title="Old Grade" readonly data-placement="top"></div>
				</div>  
				<div class="form-group">
					<div class="col-sm-6"> <input type="text" class="form-control text-center" id="pro_new_title" title="New Title" readonly data-placement="top"></div>
					<div class="col-sm-6"> <input type="text" class="form-control text-center" id="pro_old_title" title="Old Title" readonly  data-placement="top"></div>
				</div>	  
				<div class="form-group">
					<div class="col-sm-6"> <input type="text" class="form-control text-center" id="pro_new_salary" title="New Salary" readonly data-placement="top"></div>
					<div class="col-sm-6"> <input type="text" class="form-control text-center" id="pro_old_salary" title="Old Salary" readonly data-placement="top"></div>
				</div> 
				<div class="form-group">
					<div class="col-sm-12"> <input type="text" class="form-control text-center" id="pro_period_service" title="Period Service" readonly data-placement="left"></div>
				</div> 				
			</b></form>
        </div>
        <div class="modal-footer" style="border-color: #454d60;"><button type="submit" class="btn btn-danger btn-default pull-right" data-dismiss="modal"><span class="glyphicon glyphicon-remove"></span> Cancel</button></div>
   </div></div></div>   
</div></div></div>


<div class="modal modal-lg fade" id="service_Modal" role="dialog" style="margin-left: auto; margin-right: auto; margin-top: 60px; ">
    <div class="modal-dialog modal-lg">
      <div class="modal-content" style="background-color: #454d60; ">  
		<div class="modal-header" style="border-color: #454d60;"><center><h3 style="color: white;"> All Information </h3></center></div>
        <div class="modal-body" style="border-color: #454d60;">	
			<form class="form-horizontal" role="form">	
			<b>	
				<div class="form-group">
					<div class="col-sm-4"> <input type="text" class="form-control text-center" id="serv_service_cal_type" title="service Calculation Type" readonly data-placement="left"></div>
					<div class="col-sm-4"> <input type="text" class="form-control text-center" id="serv_service_cal_period" title="service Calculation Period" readonly  data-placement="right"></div>
					<div class="col-sm-4"> <input type="text" class="form-control text-center" id="serv_increasing_period" title="Increasing Period" readonly data-placement="left"></div>
				</div>	  	 
				<div class="form-group">
					<div class="col-sm-4"> <input type="text" class="form-control text-center" id="serv_new_rank" title="New Rank" readonly data-placement="left"></div>
					<div class="col-sm-4"> <input type="text" class="form-control text-center" id="serv_new_grade" title="New Grade" readonly data-placement="left"></div>
					<div class="col-sm-4"> <input type="text" class="form-control text-center" id="serv_new_salary" title="New Salary" readonly data-placement="right"></div>
				</div>  
				<div class="form-group">
					<div class="col-sm-4"> <input type="text" class="form-control text-center" id="serv_old_rank" title="Old Rank" readonly data-placement="right"></div>					
					<div class="col-sm-4"> <input type="text" class="form-control text-center" id="serv_old_grade" title="Old Grade" readonly data-placement="right"></div>	
					<div class="col-sm-4"> <input type="text" class="form-control text-center" id="serv_old_salary" title="Old Salary" readonly data-placement="left"></div>
				</div>  		
				<div class="form-group">
					<div class="col-sm-4"> <input type="text" class="form-control text-center" id="serv_from_date" title="From Date" readonly data-placement="left"></div>
					<div class="col-sm-4"> <input type="text" class="form-control text-center" id="serv_new_title" title="New Title" readonly data-placement="left"></div>
					<div class="col-sm-4"> <input type="text" class="form-control text-center" id="serv_new_annual_date" title="New Annual Date" readonly data-placement="left"></div>
				</div>  
				<div class="form-group">
					<div class="col-sm-4"> <input type="text" class="form-control text-center" id="serv_to_date" title="To Date" readonly data-placement="right"></div>
					<div class="col-sm-4"> <input type="text" class="form-control text-center" id="serv_old_title" title="Old Title" readonly data-placement="right"></div>	
					<div class="col-sm-4"> <input type="text" class="form-control text-center" id="serv_old_annual_date" title="Old Annual Date" readonly data-placement="right"></div>
				</div>		
			</b></form>
        </div>
        <div class="modal-footer" style="border-color: #454d60;"><button type="submit" class="btn btn-danger btn-default pull-right" data-dismiss="modal"><span class="glyphicon glyphicon-remove"></span> Cancel</button></div>
   </div></div></div>   

<div class="modal modal-lg fade" id="certificate_Modal" role="dialog" style="margin-left: auto; margin-right: auto; margin-top: 60px; ">
    <div class="modal-dialog">
      <div class="modal-content" style="background-color: #454d60; ">  
		<div class="modal-header" style="border-color: #454d60;"><center><h3 style="color: white;"> All Information </h3></center></div>
        <div class="modal-body" style="border-color: #454d60;">	
			<form class="form-horizontal" role="form">	
			<b>
				<div class="form-group">
					<div class="col-sm-6"> <input type="text" class="form-control text-center" id="cert_new_rank" title="New Rank" readonly data-placement="top"></div>
					<div class="col-sm-6"> <input type="text" class="form-control text-center" id="cert_old_rank" title="Old Rank" readonly  data-placement="top"></div>
				</div>	  
				<div class="form-group">
					<div class="col-sm-6"> <input type="text" class="form-control text-center" id="cert_new_grade" title="New Grade" readonly data-placement="top"></div>
					<div class="col-sm-6"> <input type="text" class="form-control text-center" id="cert_old_grade" title="Old Grade" readonly data-placement="top"></div>
				</div>  
				<div class="form-group">
					<div class="col-sm-6"> <input type="text" class="form-control text-center" id="cert_new_title" title="New Title" readonly data-placement="top"></div>
					<div class="col-sm-6"> <input type="text" class="form-control text-center" id="cert_old_title" title="Old Title" readonly  data-placement="top"></div>
				</div>	  
				<div class="form-group">
					<div class="col-sm-6"> <input type="text" class="form-control text-center" id="cert_new_salary" title="New Salary" readonly data-placement="top"></div>
					<div class="col-sm-6"> <input type="text" class="form-control text-center" id="cert_old_salary" title="Old Salary" readonly data-placement="top"></div>
				</div>
				<div class="form-group">
					<div class="col-sm-6"> <input type="text" class="form-control text-center" id="cert_new_annual_date" title="New Annual Date" readonly data-placement="top"></div>
					<div class="col-sm-6"> <input type="text" class="form-control text-center" id="cert_old_annual_date" title="Old Annual Date" readonly data-placement="top"></div>
				</div>				
				<div class="form-group">
					<div class="col-sm-12"> <input type="text" class="form-control text-center" id="cert_acceleration_period" title="Acceleration Period" readonly data-placement="left"></div>
				</div> 				
			</b></form>
        </div>
        <div class="modal-footer" style="border-color: #454d60;"><button type="submit" class="btn btn-danger btn-default pull-right" data-dismiss="modal"><span class="glyphicon glyphicon-remove"></span> Cancel</button></div>
   </div></div></div>   
</div></div></div>	

<div class="modal fade" id="thanks_Modal" role="dialog" style="margin-left: auto; margin-right: auto; margin-top: 60px; ">
    <div class="modal-dialog modal-sm">
      <div class="modal-content" style="background-color: #454d60; ">  
		<div class="modal-header" style="border-color: #454d60;"><center><h3 style="color: white;"> All Information </h3></center></div>
        <div class="modal-body" style="border-color: #454d60;">	
			<form class="form-horizontal" role="form">	
			<b>
				<div class="form-group">
					<div class="col-sm-12"> <input type="text" class="form-control text-center" id="thanks_date" title="New Rank" readonly data-placement="top"></div>
				</div>	  					
			</b></form>
        </div>
        <div class="modal-footer" style="border-color: #454d60;"><button type="submit" class="btn btn-danger btn-default pull-right" data-dismiss="modal"><span class="glyphicon glyphicon-remove"></span> Cancel</button></div>
   </div></div></div>   
</div></div></div>		
		
    </div>
  </div>
</div>
	<script type="text/javascript" charset="utf8" src="../../../need/DataTables/media/js/jquery.dataTables.js"></script>
    <script src="../../../need/magicsuggest/magicsuggest.js"></script>
	<script src="../Javascript/sh_or_en_hr.js"></script>
</body>
</html>