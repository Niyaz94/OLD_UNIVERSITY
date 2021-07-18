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
	include("header_en_hr.php");
	include("../../../database.php");
?>

<div class="container-fluid">							  
<div class="col-sm-10 col-sm-offset-1">
	
	<table id="promotion_table" class="table table-striped table-hover">
		<thead><tr><th>Full Name</th><th>Title</th><th>Rank</th><th>Grade</th><th>Salary</th><th>Annual Date</th><th>Action</th></tr></thead>
		<br/><br/>
		<b>
		<tbody>	
		<?php
				$ob=new class_database("localhost","root","root","HR");
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
					<div class="col-sm-12"> <h3 class="form-control-static text-center" style="color: white;">Personal Information</h3><br/></div>
				</div>	 
				<div class="form-group">
					<div class="col-sm-3"> <input type="text" class="form-control text-center" id="full_name" title="Full Name" data-placement="top"></div>
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
							<option value="---">I dont know</option>
						</select>
					</div>
					<div class="col-sm-3"> <input type="text" class="form-control text-center" id="current_country" title="Current Country" data-placement="left"></div>
					<div class="col-sm-3"> 
							<select id="gender" class="form-control text-center" style="text-align: center; text-align-last: center;">
									<option value="1" >Female</option>
									<option value="0" >Male</option>
							</select>
					</div>
				</div>	   
				<div class="form-group">
					<div class="col-sm-3"> <input type="text" class="form-control text-center" id="current_city" title="Current City"  data-placement="top"></div>
					<div class="col-sm-3"> 
						<select class="form-control" id="social_status" style="text-align: center; text-align-last: center;">
							<option value="1" >Married</option>
							<option value="0" >Single</option>
						</select>
					</div>
					<div class="col-sm-3"> <input type="text" class="form-control text-center" id="current_address" title="Current Address"  data-placement="left"></div>
					<div class="col-sm-3"> <input type="text" class="form-control text-center" id="number_of_children" title="Number Of Children"  data-placement="top"></div>
				</div>    
				<div class="form-group">
					<div class="col-sm-3"> <input type="date" class="form-control text-center" id="birthday" title="Birthday"  data-placement="top"></div>
					<div class="col-sm-3"> <input type="text" class="form-control text-center" id="born_place" title="Born Place"  data-placement="right"></div>
					<div class="col-sm-3"> <input type="text" class="form-control text-center" id="email" title="Email"  data-placement="left"></div>
					<div class="col-sm-3"> <input type="text" class="form-control text-center" id="phone_number" title="Phone Number"  data-placement="top"></div>
				</div>
	
	
				<div class="form-group">
					<div class="col-sm-12"> <h3 class="form-control-static text-center" style="color: white;">Department Information</h3><br/></div>
				</div>	 
				<div class="form-group">
					<div class="col-sm-3"> <input type="text" class="form-control text-center" id="university_name" title="University Name" data-placement="top"></div>
					<div class="col-sm-3"> <input type="text" class="form-control text-center" id="college_name" title="College Name"  data-placement="right"></div>
					<div class="col-sm-3"> <input type="text" class="form-control text-center" id="post" title="Post" data-placement="left"></div>
					<div class="col-sm-3"> <input type="text" class="form-control text-center" id="department_name" title="Department Name" data-placement="top"></div>
				</div>	   
				<div class="form-group">
					<div class="col-sm-3"> 
						<select id="employment_status" class="form-control text-center" style="text-align: center; text-align-last: center;">
									<option value="1" >Continue</option>
									<option value="0" >Temporary</option>
						</select>
					</div>
					<div class="col-sm-3"> <input type="date" class="form-control text-center" id="employment_date" title="Employment Date"  data-placement="right"></div>
					<div class="col-sm-3"> <input type="date" class="form-control text-center" id="start_work_date" title="Start Work Date"  data-placement="left"></div>
					<div class="col-sm-3"> <input type="date" class="form-control text-center" id="work_resume_date" title="Work Resume Date"  data-placement="top"></div>
				</div>    
				<div class="form-group">
					<div class="col-sm-4"> <input type="text" class="form-control text-center" id="place_work" title="Place Work"  data-placement="top"></div>
					<div class="col-sm-4"> <input type="text" class="form-control text-center" id="expert" title="Expert"  data-placement="right"></div>
					<div class="col-sm-4"> <input type="text" class="form-control text-center" id="leave_work_balance" title="Leave Work Balance"  data-placement="right"></div>
				</div>
				<div class="form-group">
					<div class="col-sm-6"> <input type="text" class="form-control text-center" id="approval_ministry" title="Approval Ministry"  data-placement="left"></div>
					<div class="col-sm-6"> <input type="text" class="form-control text-center" id="issue_number" title="Issue_Number" data-placement="top"></div>
				</div>
				

				
				<div class="form-group">
					<div class="col-sm-12"> <h3 class="form-control-static text-center" style="color: white;">Employee Certificate</h3><br/></div>
				</div>	 
				<div class="form-group">
					<div class="col-sm-4"> <input type="text" class="form-control text-center" id="cert_name" title="Certificate Name" data-placement="top" readonly></div>
					<div class="col-sm-4"> <input type="text" class="form-control text-center" id="place_of_issue" title="Place Of Issue"  data-placement="top" readonly></div>
					<div class="col-sm-4"> <input type="text" class="form-control text-center" id="date_of_issue" title="Date Of Issue" data-placement="top" readonly></div>
				</div>	
				
				<div class="form-group">
					<div class="col-sm-12"> <h3 class="form-control-static text-center" style="color: white;">Employee Login</h3><br/></div>
				</div>	 
				<div class="form-group">
					<div class="col-sm-6"> <input type="text" class="form-control text-center" id="username" title="UserName" data-placement="top" readonly></div>
					<div class="col-sm-6"> <input type="text" class="form-control text-center" id="password" title="Password"  data-placement="top" readonly></div>
				</div>	

				<div class="form-group">
					<div class="col-sm-12"> <h3 class="form-control-static text-center" style="color: white;">Salary Information</h3><br/></div>
				</div>	 
				<div class="form-group">
					<div class="col-sm-3"> <input type="text" class="form-control text-center" id="salary" title="Salary" data-placement="top"></div>
					<div class="col-sm-3"> <input type="text" class="form-control text-center" id="title" title="Title"  data-placement="top"></div>
					<div class="col-sm-3"> <input type="text" class="form-control text-center" id="rank" title="Rank" data-placement="top"></div>
					<div class="col-sm-3"> <input type="text" class="form-control text-center" id="grade" title="Grade" data-placement="top"></div>
				</div>	   
				<div class="form-group">
					<div class="col-sm-3"> <input type="text" class="form-control text-center" id="S_date" title="Annual Date"  data-placement="top"></div>
					<div class="col-sm-3"> 
							<select id="barzkrdnaua" class="form-control text-center" style="text-align: center; text-align-last: center;">
									<option value="1" >Have Promotion</option>
									<option value="0" >No Promotion</option>
							</select>
					</div>
					<div class="col-sm-3"> 
							<select id="sarmucha" class="form-control text-center" style="text-align: center; text-align-last: center;">
									<option value="1" >Have Annual Allowance</option>
									<option value="0" >No Annual Allowance</option>
							</select>
					</div>
					<div class="col-sm-3"> <input type="text" class="form-control text-center" id="zh_qdam" title="Acceleration Number"  data-placement="top"></div>
				</div>    
				<div class="form-group">
					<div class="col-sm-3"> 
							<select id="taebat" class="form-control text-center" style="text-align: center; text-align-last: center;">
									<option value="1" >In Special Rank</option>
									<option value="0" >No Special Rank</option>
							</select>
					</div>
					<div class="col-sm-3"> <input type="text" class="form-control text-center" id="molat" title="Leave" data-placement="top" readonly></div>
					<div class="col-sm-3">
							<select id="sza" class="form-control text-center" style="text-align: center; text-align-last: center;">
									<option value="1" >Have Punishment</option>
									<option value="0" >No Punishment</option>
							</select>
					</div>
				</div>
			</b></form>
        </div>
        <div class="modal-footer" style="border-color: #454d60;"><button type="button" class="btn btn-success pull-right" id="save_information"><span class="glyphicon glyphicon-ok"></span> Save</button></div>
   </div></div></div>   
</div></div>

	<script type="text/javascript" charset="utf8" src="../../../need/DataTables/media/js/jquery.dataTables.js"></script>
  	<script src="../Javascript/sh_ed_en_hr.js"></script>
	
</body>
</html>