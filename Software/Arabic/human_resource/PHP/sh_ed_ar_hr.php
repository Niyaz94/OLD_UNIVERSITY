<!DOCTYPE html>
<html lang="en">
<head>
  <title>Show and Edit</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
	<script src="../../../need/jquery/jquery-1.12.0.js"></script>
	<link rel="stylesheet" type="text/css" href="../../../CSS/design_milakat_1.css">
	<link rel="stylesheet" type="text/css" 		 href="../../../need/DataTables/media/css/jquery.dataTables.css">
	<link href="../../../need/magicsuggest/magicsuggest.css" rel="stylesheet">
	<link rel="stylesheet" type="text/css" href="../../../CSS/css_table_data.css">
  <script type="text/javascript">
	$(document).ready(function(){
		$('input').tooltip();
	});
   </script>
	<style type="text/css">
		label
		{
		  margin-bottom: 35px !important;
		}
		input[type="search"] {
			border-radius: 5px;

			}
		.dataTables_info , .dataTables_paginate
		{
		   margin-top: 15px !important;
		}
		th{
			background-color: #454d60 !important;
		}
		.table-hover{
			background-color: #dcdfe1 !important;
		}
	</style>
</head>
<body>
<?php 
	include("header_ar_hr.php");
	include("../../../database.php");
?>

<div class="container-fluid">							  
<div class="col-sm-10 col-sm-offset-1">
	
	<table id="promotion_table" class="table table-striped table-hover">
		<thead><tr><th>&nbsp;&nbsp;الاسم الكامل</th><th>&nbsp;&nbsp;عنوان وظيفی</th><th>&nbsp;&nbsp;مرتبة</th><th>&nbsp;&nbsp;درجة</th><th>&nbsp;&nbsp;راتب</th><th>&nbsp;&nbsp;تاريخ السنوي</th><th>&nbsp;&nbsp;عمل</th></tr></thead>
		<br/><br/>
		<b>
		<tbody>	
		<?php
				$ob=new class_database("localhost","root","","human_resources_4");
				$sql ="SELECT employee_id,full_name,title,rank,grade,salary,S_date FROM information,employee WHERE employee_id_for=employee_id";
				$output =$ob->return_data($sql);
				//hamu zanera eakane nau query ka la table kae dabne
				for($i=0;$i<count($output);$i++){
						$id=$output[$i]['employee_id'];
						$full_name=$output[$i]['full_name'];
						$rank=$output[$i]['rank'];
						$grade=$output[$i]['grade'];
						$title=$output[$i]['title'];
						$salary=$output[$i]['salary'];
						$doaa=$output[$i]['S_date'];

						echo "<tr>";
						echo"<td>$full_name</td>";
						echo"<td>$title</td>";
						echo"<td>$rank</td>";
						echo"<td>$grade</td>";
						echo"<td>$salary</td>";
						echo"<td>$doaa</td>";
						echo"<td>
								<button id='button_$id' type='button' class='btn btn-default btn-sm'><span class='glyphicon glyphicon-user'></span></button>
								<button id='remove_$id' type='button' class='btn btn-danger btn-sm'><span class='glyphicon glyphicon-trash'></span></button>
							</td>";
						echo "</tr>";
				}						  
		?>	

		</tbody></b>
	</table>
		
<div class="modal modal-lg fade" id="myModal" role="dialog" style="margin-left: auto; margin-right: auto; margin-top: 60px; ">
    <div class="modal-dialog modal-lg">
      <div class="modal-content" style="background-color: #454d60; "> 
		<div class="modal-header" style="border-color: #454d60;"><button type="button" class="close" data-dismiss="modal">&times;</button></div>	  
        <div class="modal-body" style="border-color: #454d60;">	
			<form class="form-horizontal" role="form">	
			<b>
				<div class="form-group">
					<div class="col-sm-12"> <h3 class="form-control-static text-center" style="color: white;">معلومات شخصية</h3><br/></div>
				</div>	 
				<div class="form-group">
					<div class="col-sm-3"> <input type="text" class="form-control text-center" id="full_name" title="الاسم الكامل" data-placement="top"></div>
					<div class="col-sm-3"> 
						<select class="form-control" id="blood_group" style="text-align: center; text-align-last: center;">
							<option value="A+" >A+</option>
							<option value="A-" >A-</option>
							<option value="B+" >B+</option>
							<option value="B-" >B-</option>
							<option value="O+" >O+</option>
							<option value="O-" >O-</option>
							<option value="AB+" >AB+</option>
							<option value="AB-" >AB-</option>
							<option value="---">لا اعرف</option>
						</select>
					</div>
					<div class="col-sm-3"> <input type="text" class="form-control text-center" id="current_country" title="البلد الحالي" data-placement="top"></div>
					<div class="col-sm-3"> 
							<select id="gender" class="form-control text-center" style="text-align: center; text-align-last: center;">
									<option value="1" >ذكر</option>
									<option value="0" >إناثا</option>
							</select>
					</div>
				</div>	   
				<div class="form-group">
					<div class="col-sm-3"> <input type="text" class="form-control text-center" id="current_city" title="المدينة الحالية"  data-placement="top"></div>
					<div class="col-sm-3"> 
						<select class="form-control" id="social_status" style="text-align: center; text-align-last: center;">
							<option value="1" >زوجت</option>
							<option value="0" >غير مرتبطة</option>
						</select>
					</div>
					<div class="col-sm-3"> <input type="text" class="form-control text-center" id="current_address" title="العنوان الحالي"  data-placement="top"></div>
					<div class="col-sm-3"> <input type="text" class="form-control text-center" id="number_of_children" title="عدد الاطفال"  data-placement="top"></div>
				</div>    
				<div class="form-group">
					<div class="col-sm-3"> <input type="date" class="form-control text-center" id="birthday" title="میلاد"  data-placement="top"></div>
					<div class="col-sm-3"> <input type="text" class="form-control text-center" id="born_place" title="مكان الولادة"  data-placement="top"></div>
					<div class="col-sm-3"> <input type="text" class="form-control text-center" id="email" title="البريد الإلكتروني"  data-placement="top"></div>
					<div class="col-sm-3"> <input type="text" class="form-control text-center" id="phone_number" title="رقم الهاتف"  data-placement="top"></div>
				</div>
	
				<div class="form-group">
					<div class="col-sm-12"> <h3 class="form-control-static text-center" style="color: white;"> معلومات القسم</h3><br/></div>
				</div>	 
				<div class="form-group">
					<div class="col-sm-3"> <input type="text" class="form-control text-center" id="university_name" title="اسم الجامعة" data-placement="top"></div>
					<div class="col-sm-3"> <input type="text" class="form-control text-center" id="college_name" title="اسم الكلية"  data-placement="top"></div>
					<div class="col-sm-3"> <input type="text" class="form-control text-center" id="post" title="بريد" data-placement="top"></div>
					<div class="col-sm-3"> <input type="text" class="form-control text-center" id="department_name" title="اسم القسم" data-placement="top"></div>
				</div>	   
				<div class="form-group">
					<div class="col-sm-3"> 
						<select id="employment_status" class="form-control text-center" style="text-align: center; text-align-last: center;">
									<option value="1" >استمر</option>
									<option value="0" >مؤقت</option>
						</select>
					</div>
					<div class="col-sm-3"> <input type="date" class="form-control text-center" id="employment_date" title="تاريخ التوظيف"  data-placement="top"></div>
					<div class="col-sm-3"> <input type="date" class="form-control text-center" id="start_work_date" title="بدء تاريخ العمل"  data-placement="top"></div>
					<div class="col-sm-3"> <input type="date" class="form-control text-center" id="work_resume_date" title="تاريخ استئناف العمل"  data-placement="top"></div>
				</div>    
				<div class="form-group">
					<div class="col-sm-4"> <input type="text" class="form-control text-center" id="place_work" title="مكان العمل"  data-placement="top"></div>
					<div class="col-sm-4"> <input type="text" class="form-control text-center" id="expert" title="خبير"  data-placement="right"></div>
					<div class="col-sm-4"> <input type="text" class="form-control text-center" id="leave_work_balance" title="اترك رصيد العمل"  data-placement="right"></div>
				</div>
				<div class="form-group">
					<div class="col-sm-6"> <input type="text" class="form-control text-center" id="approval_ministry" title="وزارة الموافقة"  data-placement="left"></div>
					<div class="col-sm-6"> <input type="text" class="form-control text-center" id="issue_number" title="ژرقم الإصدار" data-placement="top"></div>
				</div>
				

				
				<div class="form-group">
					<div class="col-sm-12"> <h3 class="form-control-static text-center" style="color: white;">شهادة الموظف</h3><br/></div>
				</div>	 
				<div class="form-group">
					<div class="col-sm-4"> <input type="text" class="form-control text-center" id="cert_name" title="اسم الشهادة" data-placement="top" readonly></div>
					<div class="col-sm-4"> <input type="text" class="form-control text-center" id="place_of_issue" title="مكان صدوره"  data-placement="top" readonly></div>
					<div class="col-sm-4"> <input type="text" class="form-control text-center" id="date_of_issue" title="به‌رتاريخ المسألة" data-placement="top" readonly></div>
				</div>	
				
				<div class="form-group">
					<div class="col-sm-12"> <h3 class="form-control-static text-center" style="color: white;">دخول الموظف</h3><br/></div>
				</div>	 
				<div class="form-group">
					<div class="col-sm-6"> <input type="text" class="form-control text-center" id="username" title="اسم المستخدم" data-placement="top" readonly></div>
					<div class="col-sm-6"> <input type="text" class="form-control text-center" id="password" title="كلمه السر"  data-placement="top" readonly></div>
				</div>	

				<div class="form-group">
					<div class="col-sm-12"> <h3 class="form-control-static text-center" style="color: white;">معلومات الراتب</h3><br/></div>
				</div>	 
				<div class="form-group">
					<div class="col-sm-3"> <input type="text" class="form-control text-center" id="salary" title="راتب" data-placement="top"></div>
					<div class="col-sm-3"> <input type="text" class="form-control text-center" id="title" title="عنوان"  data-placement="top"></div>
					<div class="col-sm-3"> <input type="text" class="form-control text-center" id="rank" title="مرتبة" data-placement="top"></div>
					<div class="col-sm-3"> <input type="text" class="form-control text-center" id="grade" title="درجة" data-placement="top"></div>
				</div>	   
				<div class="form-group">
					<div class="col-sm-3"> <input type="text" class="form-control text-center" id="S_date" title="التاريخ السنوي"  data-placement="top"></div>
					<div class="col-sm-3"> 
							<select id="barzkrdnaua" class="form-control text-center" style="text-align: center; text-align-last: center;">
									<option value="1" >يكون الترويج</option>
									<option value="0" >لا تعزيز</option>
							</select>
					</div>
					<div class="col-sm-3"> 
							<select id="sarmucha" class="form-control text-center" style="text-align: center; text-align-last: center;">
									<option value="1" >لديها بدل سنوي</option>
									<option value="0" >لا بدل سنوي</option>
							</select>
					</div>
					<div class="col-sm-3"> <input type="text" class="form-control text-center" id="zh_qdam" title="رقم التسارع"  data-placement="top"></div>
				</div>    
				<div class="form-group">
					<div class="col-sm-3"> 
							<select id="taebat" class="form-control text-center" style="text-align: center; text-align-last: center;">
									<option value="1" >في الرتبة الخاصة</option>
									<option value="0" >لا الرتبة الخاصة</option>
							</select>
					</div>
					<div class="col-sm-3"> <input type="text" class="form-control text-center" id="molat" title="مۆڵه‌ت" data-placement="top" readonly></div>
					<div class="col-sm-3">
							<select id="sza" class="form-control text-center" style="text-align: center; text-align-last: center;">
									<option value="1" >يكون العقوبة</option>
									<option value="0" >لا العقوبة</option>
							</select>
					</div>
				</div>
			</b></form>
        </div>
        <div class="modal-footer" style="border-color: #454d60;"><button type="button" class="btn btn-success pull-right" id="save_information"><span class="glyphicon glyphicon-ok"></span> حفظ</button></div>
   </div></div></div>   
</div></div>

	<script type="text/javascript" charset="utf8" src="../../../need/DataTables/media/js/jquery.dataTables.js"></script>
  	<script src="../Javascript/sh_ed_ar_hr.js"></script>
	
</body>
</html>