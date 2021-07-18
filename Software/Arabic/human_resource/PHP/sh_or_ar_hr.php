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

			<thead><tr><th>&nbsp;&nbsp;الاسم الكامل</th><th>&nbsp;&nbsp;نوع الخدمة</th><th>&nbsp;&nbsp;عمل</th></tr></thead>
			<br/><br/>
			<tbody>
			</tbody>	
		</table>
				
<div class="modal modal-lg fade" id="annual_Modal" role="dialog" style="margin-left: auto; margin-right: auto; margin-top: 60px; ">
    <div class="modal-dialog">
      <div class="modal-content" style="background-color: #454d60; ">  
		<div class="modal-header" style="border-color: #454d60;"><center><h3 style="color: white;">كل المعلومات</h3></center></div>
        <div class="modal-body" style="border-color: #454d60;">	
			<form class="form-horizontal" role="form">	
			<b>
				<div class="form-group">	
					<div class="col-sm-6"> <input type="text" class="form-control text-center" id="annual_rank" title="مرتبة" readonly data-placement="top"></div>
					<div class="col-sm-6"> <input type="text" class="form-control text-center" id="annual_title" title="عنوان" readonly  data-placement="top"></div>
				</div>
				<div class="form-group">
					<div class="col-sm-6"> <input type="text" class="form-control text-center" id="annual_new_grade" title="الصف الجديد" readonly data-placement="top"></div>
					<div class="col-sm-6"> <input type="text" class="form-control text-center" id="annual_old_grade" title="الصف القديم" readonly  data-placement="top"></div>
				</div>
				<div class="form-group">
					<div class="col-sm-6"> <input type="text" class="form-control text-center" id="annual_new_salary" title="الراتب الجديد" readonly data-placement="top"></div>
					<div class="col-sm-6"> <input type="text" class="form-control text-center" id="annual_old_salary" title="الراتب القديم" readonly  data-placement="top"></div>
				</div>	  
				<div class="form-group">
					<div class="col-sm-6"> <input type="text" class="form-control text-center" id="annual_date" title="التاريخ السنوي" readonly data-placement="top"></div>
					<div class="col-sm-6"> <input type="text" class="form-control text-center" id="annual_qdam" title="رقم التسارع" readonly data-placement="top"></div>
				</div>  
			</b></form>
        </div>
        <div class="modal-footer" style="border-color: #454d60;"><button type="submit" class="btn btn-danger btn-default pull-right" data-dismiss="modal"><span class="glyphicon glyphicon-remove"></span>إلغاء</button></div>
   </div></div></div>   
</div></div></div>

<div class="modal modal-lg fade" id="promotion_Modal" role="dialog" style="margin-left: auto; margin-right: auto; margin-top: 60px; ">
    <div class="modal-dialog">
      <div class="modal-content" style="background-color: #454d60; ">  
		<div class="modal-header" style="border-color: #454d60;"><center><h3 style="color: white;">كل المعلومات</h3></center></div>
        <div class="modal-body" style="border-color: #454d60;">	
			<form class="form-horizontal" role="form">	
			<b>
				<div class="form-group">
					<div class="col-sm-6"> <input type="text" class="form-control text-center" id="pro_new_rank" title="الرتبة الجديدة" readonly data-placement="top"></div>
					<div class="col-sm-6"> <input type="text" class="form-control text-center" id="pro_old_rank" title="الرتبة القديمة" readonly  data-placement="top"></div>
				</div>	  
				<div class="form-group">
					<div class="col-sm-6"> <input type="text" class="form-control text-center" id="pro_new_grade" title="الصف الجديد" readonly data-placement="top"></div>
					<div class="col-sm-6"> <input type="text" class="form-control text-center" id="pro_old_grade" title="الصف القديم" readonly data-placement="top"></div>
				</div>  
				<div class="form-group">
					<div class="col-sm-6"> <input type="text" class="form-control text-center" id="pro_new_title" title="عنوان جديد" readonly data-placement="top"></div>
					<div class="col-sm-6"> <input type="text" class="form-control text-center" id="pro_old_title" title="العنوان القديم" readonly  data-placement="top"></div>
				</div>	  
				<div class="form-group">
					<div class="col-sm-6"> <input type="text" class="form-control text-center" id="pro_new_salary" title="الراتب الجديد" readonly data-placement="top"></div>
					<div class="col-sm-6"> <input type="text" class="form-control text-center" id="pro_old_salary" title="الراتب القديم" readonly data-placement="top"></div>
				</div> 
				<div class="form-group">
					<div class="col-sm-12"> <input type="text" class="form-control text-center" id="pro_period_service" title="فترة الخدمة" readonly data-placement="left"></div>
				</div> 				
			</b></form>
        </div>
        <div class="modal-footer" style="border-color: #454d60;"><button type="submit" class="btn btn-danger btn-default pull-right" data-dismiss="modal"><span class="glyphicon glyphicon-remove"></span>إلغاء</button></div>
   </div></div></div>   
</div></div></div>


<div class="modal modal-lg fade" id="service_Modal" role="dialog" style="margin-left: auto; margin-right: auto; margin-top: 60px; ">
    <div class="modal-dialog modal-lg">
      <div class="modal-content" style="background-color: #454d60; ">  
		<div class="modal-header" style="border-color: #454d60;"><center><h3 style="color: white;">كل المعلومات</h3></center></div>
        <div class="modal-body" style="border-color: #454d60;">	
			<form class="form-horizontal" role="form">	
			<b>	
				<div class="form-group">
					<div class="col-sm-4"> <input type="text" class="form-control text-center" id="serv_service_cal_type" title="الخدمة نوع الحساب" readonly data-placement="left"></div>
					<div class="col-sm-4"> <input type="text" class="form-control text-center" id="serv_service_cal_period" title="خدمة فترة الحساب" readonly  data-placement="right"></div>
					<div class="col-sm-4"> <input type="text" class="form-control text-center" id="serv_increasing_period" title="زيادة الفترة" readonly data-placement="left"></div>
				</div>	  	 
				<div class="form-group">
					<div class="col-sm-4"> <input type="text" class="form-control text-center" id="serv_new_rank" title="الرتبة الجديدة" readonly data-placement="left"></div>
					<div class="col-sm-4"> <input type="text" class="form-control text-center" id="serv_new_grade" title="الصف الجديد" readonly data-placement="left"></div>
					<div class="col-sm-4"> <input type="text" class="form-control text-center" id="serv_new_salary" title="الراتب الجديد" readonly data-placement="right"></div>
				</div>  
				<div class="form-group">
					<div class="col-sm-4"> <input type="text" class="form-control text-center" id="serv_old_rank" title="الرتبة القديمة" readonly data-placement="right"></div>					
					<div class="col-sm-4"> <input type="text" class="form-control text-center" id="serv_old_grade" title="الصف القديم" readonly data-placement="right"></div>	
					<div class="col-sm-4"> <input type="text" class="form-control text-center" id="serv_old_salary" title="الراتب القديم" readonly data-placement="left"></div>
				</div>  		
				<div class="form-group">
					<div class="col-sm-4"> <input type="text" class="form-control text-center" id="serv_from_date" title="من التاريخ" readonly data-placement="left"></div>
					<div class="col-sm-4"> <input type="text" class="form-control text-center" id="serv_new_title" title="عنوان جديد" readonly data-placement="left"></div>
					<div class="col-sm-4"> <input type="text" class="form-control text-center" id="serv_new_annual_date" title="التاريخ السنوي الجديد" readonly data-placement="left"></div>
				</div>  
				<div class="form-group">
					<div class="col-sm-4"> <input type="text" class="form-control text-center" id="serv_to_date" title=" في موعد" readonly data-placement="right"></div>
					<div class="col-sm-4"> <input type="text" class="form-control text-center" id="serv_old_title" title="العنوان القديم" readonly data-placement="right"></div>	
					<div class="col-sm-4"> <input type="text" class="form-control text-center" id="serv_old_annual_date" title="التاريخ السنوي القديم" readonly data-placement="right"></div>
				</div>		
			</b></form>
        </div>
        <div class="modal-footer" style="border-color: #454d60;"><button type="submit" class="btn btn-danger btn-default pull-right" data-dismiss="modal"><span class="glyphicon glyphicon-remove"></span> إلغاء</button></div>
   </div></div></div>   

<div class="modal modal-lg fade" id="certificate_Modal" role="dialog" style="margin-left: auto; margin-right: auto; margin-top: 60px; ">
    <div class="modal-dialog">
      <div class="modal-content" style="background-color: #454d60; ">  
		<div class="modal-header" style="border-color: #454d60;"><center><h3 style="color: white;">كل المعلومات</h3></center></div>
        <div class="modal-body" style="border-color: #454d60;">	
			<form class="form-horizontal" role="form">	
			<b>
				<div class="form-group">
					<div class="col-sm-6"> <input type="text" class="form-control text-center" id="cert_new_rank" title="الرتبة الجديدة" readonly data-placement="top"></div>
					<div class="col-sm-6"> <input type="text" class="form-control text-center" id="cert_old_rank" title="الرتبة القديمة" readonly  data-placement="top"></div>
				</div>	  
				<div class="form-group">
					<div class="col-sm-6"> <input type="text" class="form-control text-center" id="cert_new_grade" title="الصف الجديد" readonly data-placement="top"></div>
					<div class="col-sm-6"> <input type="text" class="form-control text-center" id="cert_old_grade" title="الصف القديم" readonly data-placement="top"></div>
				</div>  
				<div class="form-group">
					<div class="col-sm-6"> <input type="text" class="form-control text-center" id="cert_new_title" title="عنوان جديد" readonly data-placement="top"></div>
					<div class="col-sm-6"> <input type="text" class="form-control text-center" id="cert_old_title" title="العنوان القديم" readonly  data-placement="top"></div>
				</div>	  
				<div class="form-group">
					<div class="col-sm-6"> <input type="text" class="form-control text-center" id="cert_new_salary" title="الراتب الجديد" readonly data-placement="top"></div>
					<div class="col-sm-6"> <input type="text" class="form-control text-center" id="cert_old_salary" title="الراتب القديم" readonly data-placement="top"></div>
				</div>
				<div class="form-group">
					<div class="col-sm-6"> <input type="text" class="form-control text-center" id="cert_new_annual_date" title="التاريخ السنوي الجديد" readonly data-placement="top"></div>
					<div class="col-sm-6"> <input type="text" class="form-control text-center" id="cert_old_annual_date" title="التاريخ السنوي القديم" readonly data-placement="top"></div>
				</div>				
				<div class="form-group">
					<div class="col-sm-12"> <input type="text" class="form-control text-center" id="cert_acceleration_period" title="فترة التسارع" readonly data-placement="left"></div>
				</div> 				
			</b></form>
        </div>
        <div class="modal-footer" style="border-color: #454d60;"><button type="submit" class="btn btn-danger btn-default pull-right" data-dismiss="modal"><span class="glyphicon glyphicon-remove"></span>إلغاء</button></div>
   </div></div></div>   
</div></div></div>	

<div class="modal fade" id="thanks_Modal" role="dialog" style="margin-left: auto; margin-right: auto; margin-top: 60px; ">
    <div class="modal-dialog modal-sm">
      <div class="modal-content" style="background-color: #454d60; ">  
		<div class="modal-header" style="border-color: #454d60;"><center><h3 style="color: white;"> كل المعلومات </h3></center></div>
        <div class="modal-body" style="border-color: #454d60;">	
			<form class="form-horizontal" role="form">	
			<b>
				<div class="form-group">
					<div class="col-sm-12"> <input type="text" class="form-control text-center" id="thanks_date" title="الرتبة الجديدة" readonly data-placement="top"></div>
				</div>	  					
			</b></form>
        </div>
        <div class="modal-footer" style="border-color: #454d60;"><button type="submit" class="btn btn-danger btn-default pull-right" data-dismiss="modal"><span class="glyphicon glyphicon-remove"></span> إلغاء</button></div>
   </div></div></div>   
</div></div></div>		
		
    </div>
  </div>
</div>
	<script type="text/javascript" charset="utf8" src="../../../need/DataTables/media/js/jquery.dataTables.js"></script>
    <script src="../../../need/magicsuggest/magicsuggest.js"></script>
	<script src="../Javascript/sh_or_ar_hr.js"></script>
</body>
</html>