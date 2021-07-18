<!DOCTYPE html>
<html lang="en">
<head>
  <title>پیشاندان و گۆرین</title>
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
		.table th,td{
			text-align: center;   
		}
	</style>
  
</head>
<body>
<?php 
	include("header_ku_hr.php");
	include("../../../database.php");
?>

<div class="container-fluid">							  
<div class="col-sm-10 col-sm-offset-1">
	
	<table id="promotion_table" class="table table-striped table-hover">
		<thead><tr><th>ناوی ته‌واو</th><th>ناونیشانی فەرمانبەری</th><th>پلە</th><th>مەرتەبە</th><th>مووچە</th><th>ب.س.س</th><th>کار</th></tr></thead>
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
					<div class="col-sm-12"> <h3 class="form-control-static text-center" style="color: white;">زانیاری كه‌سی</h3><br/></div>
				</div>	 
				<div class="form-group">
					<div class="col-sm-3"> <input type="text" class="form-control text-center" id="full_name" title="ناوی ته‌واو" data-placement="top"></div>
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
							<option value="---">نازانم</option>
						</select>
					</div>
					<div class="col-sm-3"> <input type="text" class="form-control text-center" id="current_country" title="ئه‌و وڵاته‌ی كه‌ ئێستا لێی ده‌ژی" data-placement="top"></div>
					<div class="col-sm-3"> 
							<select id="gender" class="form-control text-center" style="text-align: center; text-align-last: center;">
									<option value="1" >نێر</option>
									<option value="0" >مێ</option>
							</select>
					</div>
				</div>	   
				<div class="form-group">
					<div class="col-sm-3"> <input type="text" class="form-control text-center" id="current_city" title="ئه‌و شاره‌ی كه‌ ئێستا لێی ده‌ژی"  data-placement="top"></div>
					<div class="col-sm-3"> 
						<select class="form-control" id="social_status" style="text-align: center; text-align-last: center;">
							<option value="1" >هاوسه‌رگیری نه‌كردووه‌</option>
							<option value="0" >هاوسه‌رگیری كردووه‌</option>
						</select>
					</div>
					<div class="col-sm-3"> <input type="text" class="form-control text-center" id="current_address" title="ناونیشانی ئێستا"  data-placement="top"></div>
					<div class="col-sm-3"> <input type="text" class="form-control text-center" id="number_of_children" title="ژماره‌ی منداڵ"  data-placement="top"></div>
				</div>    
				<div class="form-group">
					<div class="col-sm-3"> <input type="date" class="form-control text-center" id="birthday" title="رێكه‌وتی له‌دایكبوون"  data-placement="top"></div>
					<div class="col-sm-3"> <input type="text" class="form-control text-center" id="born_place" title="شوێنی له‌ دایكبوون"  data-placement="top"></div>
					<div class="col-sm-3"> <input type="text" class="form-control text-center" id="email" title="ئیمێڵ"  data-placement="top"></div>
					<div class="col-sm-3"> <input type="text" class="form-control text-center" id="phone_number" title="ژماره‌ی ته‌له‌فۆن"  data-placement="top"></div>
				</div>
	
				<div class="form-group">
					<div class="col-sm-12"> <h3 class="form-control-static text-center" style="color: white;"> زانیاریه‌كانی به‌ش</h3><br/></div>
				</div>	 
				<div class="form-group">
					<div class="col-sm-3"> <input type="text" class="form-control text-center" id="university_name" title="ناوی زانكۆ" data-placement="top"></div>
					<div class="col-sm-3"> <input type="text" class="form-control text-center" id="college_name" title="ناوی كۆلێژ"  data-placement="top"></div>
					<div class="col-sm-3"> <input type="text" class="form-control text-center" id="post" title="پۆست" data-placement="top"></div>
					<div class="col-sm-3"> <input type="text" class="form-control text-center" id="department_name" title="ناوی به‌ش" data-placement="top"></div>
				</div>	   
				<div class="form-group">
					<div class="col-sm-3"> 
						<select id="employment_status" class="form-control text-center" style="text-align: center; text-align-last: center;">
									<option value="1" >به‌رده‌وام</option>
									<option value="0" >كاتی</option>
						</select>
					</div>
					<div class="col-sm-3"> <input type="date" class="form-control text-center" id="employment_date" title="رێكه‌وتی دامه‌زراندن"  data-placement="top"></div>
					<div class="col-sm-3"> <input type="date" class="form-control text-center" id="start_work_date" title="به‌رواری یه‌كه‌م ده‌ستبه‌كاربوون"  data-placement="top"></div>
					<div class="col-sm-3"> <input type="date" class="form-control text-center" id="work_resume_date" title="به‌رواری گه‌رانه‌وه‌"  data-placement="top"></div>
				</div>    
				<div class="form-group">
					<div class="col-sm-4"> <input type="text" class="form-control text-center" id="place_work" title="شوێنی كاركردن"  data-placement="top"></div>
					<div class="col-sm-4"> <input type="text" class="form-control text-center" id="expert" title="پسپۆری"  data-placement="right"></div>
					<div class="col-sm-4"> <input type="text" class="form-control text-center" id="leave_work_balance" title="رصیدی مۆڵه‌تی پێشوو"  data-placement="right"></div>
				</div>
				<div class="form-group">
					<div class="col-sm-6"> <input type="text" class="form-control text-center" id="approval_ministry" title="ره‌زامه‌ندی وه‌زاره‌تی دارایی"  data-placement="left"></div>
					<div class="col-sm-6"> <input type="text" class="form-control text-center" id="issue_number" title="ژماره‌ی فرمانی وه‌زاری" data-placement="top"></div>
				</div>
				

				
				<div class="form-group">
					<div class="col-sm-12"> <h3 class="form-control-static text-center" style="color: white;">بڕوانامه‌ی فه‌رمانبه‌ر</h3><br/></div>
				</div>	 
				<div class="form-group">
					<div class="col-sm-4"> <input type="text" class="form-control text-center" id="cert_name" title="ناوی بڕوانامه‌" data-placement="top" readonly></div>
					<div class="col-sm-4"> <input type="text" class="form-control text-center" id="place_of_issue" title="شوێنی ده‌رچوون"  data-placement="top" readonly></div>
					<div class="col-sm-4"> <input type="text" class="form-control text-center" id="date_of_issue" title="به‌رواری ده‌رچوون" data-placement="top" readonly></div>
				</div>	
				
				<div class="form-group">
					<div class="col-sm-12"> <h3 class="form-control-static text-center" style="color: white;">چونه‌ژووره‌وه‌ی فه‌رمانبه‌ر</h3><br/></div>
				</div>	 
				<div class="form-group">
					<div class="col-sm-6"> <input type="text" class="form-control text-center" id="username" title="ناوی به‌كارهێنه‌ر" data-placement="top" readonly></div>
					<div class="col-sm-6"> <input type="text" class="form-control text-center" id="password" title="ژماره‌ی نهێنی"  data-placement="top" readonly></div>
				</div>	

				<div class="form-group">
					<div class="col-sm-12"> <h3 class="form-control-static text-center" style="color: white;">زانیاری مووچه‌</h3><br/></div>
				</div>	 
				<div class="form-group">
					<div class="col-sm-3"> <input type="text" class="form-control text-center" id="salary" title="مووچه‌" data-placement="top"></div>
					<div class="col-sm-3"> <input type="text" class="form-control text-center" id="title" title="ناونیشان"  data-placement="top"></div>
					<div class="col-sm-3"> <input type="text" class="form-control text-center" id="rank" title="پله‌" data-placement="top"></div>
					<div class="col-sm-3"> <input type="text" class="form-control text-center" id="grade" title="مه‌رته‌به‌" data-placement="top"></div>
				</div>	   
				<div class="form-group">
					<div class="col-sm-3"> <input type="text" class="form-control text-center" id="S_date" title="Annual Date"  data-placement="top"></div>
					<div class="col-sm-3"> 
							<select id="barzkrdnaua" class="form-control text-center" style="text-align: center; text-align-last: center;">
									<option value="1" >به‌رزكردنه‌وه‌ی هه‌یه‌</option>
									<option value="0" >به‌رزكردنه‌وه‌ی نیه‌</option>
							</select>
					</div>
					<div class="col-sm-3"> 
							<select id="sarmucha" class="form-control text-center" style="text-align: center; text-align-last: center;">
									<option value="1" >سه‌رمووچه‌ی ساڵانه‌ی نیه‌</option>
									<option value="0" >سه‌رمووچه‌ی ساڵانه‌ی هه‌یه‌</option>
							</select>
					</div>
					<div class="col-sm-3"> <input type="text" class="form-control text-center" id="zh_qdam" title="ژماره‌ی پێشخستنی سوپاس وپێزانین"  data-placement="top"></div>
				</div>    
				<div class="form-group">
					<div class="col-sm-3"> 
							<select id="taebat" class="form-control text-center" style="text-align: center; text-align-last: center;">
									<option value="1" >پله‌ی تایبه‌ت</option>
									<option value="0" >پله‌ی ئاسایی</option>
							</select>
					</div>
					<div class="col-sm-3"> <input type="text" class="form-control text-center" id="molat" title="مۆڵه‌ت" data-placement="top" readonly></div>
					<div class="col-sm-3">
							<select id="sza" class="form-control text-center" style="text-align: center; text-align-last: center;">
									<option value="1" >سزای هه‌یه‌</option>
									<option value="0" >سزای نیه‌</option>
							</select>
					</div>
				</div>
			</b></form>
        </div>
        <div class="modal-footer" style="border-color: #454d60;"><button type="button" class="btn btn-success pull-right" id="save_information"><span class="glyphicon glyphicon-ok"></span> خه‌زن كردن</button></div>
   </div></div></div>   
</div></div>

	<script type="text/javascript" charset="utf8" src="../../../need/DataTables/media/js/jquery.dataTables.js"></script>
  	<script src="../Javascript/sh_ed_ku_hr.js"></script>
	
</body>
</html>