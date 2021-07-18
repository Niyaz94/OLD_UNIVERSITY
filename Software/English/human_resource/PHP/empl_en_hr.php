<!DOCTYPE html>
<html lang="en">
<head>
      <title>Employee</title>
      <meta charset="utf-8">
      <meta name="viewport" content="width=device-width, initial-scale=1">
	  <script src="../../../need/jquery/jquery-1.12.0.js"></script>
</head>
<body class="bgcolor">

<?php include("header_en_hr.php");?>

  <div class="container size">
<center><h3 class="white"><br><strong id="change_text"> Employee</strong> </h3></center>

<br><br>

  <form id="employee_form" class="form-horizontal" role="form"><div class="row col-md-10 col-md-offset-1">	
	<div class="col-md-6"><div class="col-md-offset-0">
	<div class="form-group"><div id="div_name" class="col-md-12 has-error has-feedback">
		<input id="name" class="form-control" type="text" placeholder="Full name">
		<span  id="span_name" class="glyphicon glyphicon-remove form-control-feedback"></span>
	</div></div>
    <div class="form-group"><div class="col-md-12">
    <input id="email" class="form-control"  type="text"  placeholder="Email"></div></div>
    <div class="form-group"><div class="col-md-12">
    <input id="phone" class="form-control" type="text" placeholder="Phone Number " ></div></div>
    <div class="form-group"><div class="col-md-12">
		<select id="Gender" class="form-control"  >
				<option value="1">Female</option>
				<option selected value="0">Male</option>
		</select>
	</div></div>
    <div class="form-group"><div class="col-md-12"><select id="blood" class="form-control" >
    <option>A+</option><option>A-</option><option>B+</option><option>B-</option><option>O+</option><option>O-</option>
    <option>AB+</option><option>AB-</option><option>I dont know</option></select></div></div>
    <div class="form-group"><div class="col-md-12">
    <input placeholder="Date of Birthday" class="form-control" id="birthinput" type="text" onfocus="(this.type='date')"></div></div>
	<div class="form-group"><div class="col-md-12">
	<input class="form-control" id="born_place" type="text" placeholder="Born Place" ></div></div>
    <div class="form-group"><div class="col-md-12"><select class="form-control" id="social_status" >
	<option selected value="0">Single</option><option value="1">Married</option></select></div></div>
    <div class="form-group"><div class="col-md-12">
    <input class="form-control" id="no_of_children" type="number" placeholder="Number of Children" ></div></div>
   </div></div>

   <div class=" col-md-6"><div class="col-md-offset-0"></div>
   <div class="form-group">
   <img src="../../../image/ic_about.png"  alt=" your Photo" class="col-md-8 col-md-offset-2 img-rounded" id="photo" ></div>
   <div class="form-group"><div class="col-md-12">
   <input class="form-control" id="address" type="text" placeholder="Address " ></div></div>
   <div class="form-group"><div class="col-md-12">
   <input class="form-control" id="current_city" type="text" placeholder="Current City" ></div></div>
   <div class="form-group"><div class="col-md-12">
   <input class="form-control" id="current_country" type="text"  placeholder="Current Country"></div></div>
   <div class="form-group"><div id="div_username" class="col-md-12 has-error has-feedback">
		<input class="form-control" id="username" type="text" placeholder="UserName">
		<span  id="span_username" class="glyphicon glyphicon-remove form-control-feedback"></span>
	</div></div>
   <div class="form-group"><div class="col-md-12">
   <input class="form-control" id="password" type="text" placeholder="Password" disabled></div></div>
   <br/><div class="form-group">
   <button type="button" id="emp_id" name="Next" class="form-control btn btn-primary" disabled>Continue</button></div></div>
</div></form>

<form id="department_form" class="form-horizontal" role="form"><div class="row col-md-10 col-md-offset-1">
    <div class="col-md-6"><div class="col-md-offset-0">
    <div class="form-group"><div class="col-md-12">
    <input class="form-control" id="univ_name" type="text" placeholder="University Name "></div></div>
    <div class="form-group"><div class="col-md-12">
    <input class="form-control"  id="coll_name" type="text"  placeholder="College/Institute Name "></div></div>
    <div class="form-group"><div class="col-md-12">
    <input class="form-control" id="emp_date"  placeholder="Employment Date" type="text" onfocus="(this.type='date')"></div></div>
	<div class="form-group"><div class="col-md-12">
    <input class="form-control" id="swa" placeholder="Start Working at" type="text" onfocus="(this.type='date')"></div></div>
	
    <div class="form-group"><div class="col-md-12">
    <input class="form-control" id="wrd" placeholder="Work Resume Date " type="text" onfocus="(this.type='date')"></div></div>
	
	<div class="form-group"><div class="col-md-12"><select class="form-control" id="emp_status" >
    <option selected>Continue</option><option>Temporary</option></select></div></div>
    
	</div></div>
	
    <div class=" col-md-6">
	<div class="form-group"><div class="col-md-12">
    <input class="form-control" id="post" type="text" placeholder="Post" ></div></div>
    <div class="form-group"><div class="col-md-12">
    <input class="form-control" id="department" type="text" placeholder="Department" ></div></div>
    <div class="form-group"><div class="col-md-12">
    <input class="form-control" id="pow" type="text"  placeholder="place of work "></div></div>
    <div class="form-group"><div class="col-md-12">
    <input class="form-control" id="lwb" type="number" placeholder="Leave work Balance" ></div></div>
    <div class="form-group"><div class="col-md-12">
    <input class="form-control" id="issueno" type="text" placeholder="Issue Number " ></div></div>
    <div class="form-group"><div class="col-md-12">
    <input class="form-control" id="ministry" type="text" placeholder="Approval Ministry" ></div></div><br/>
    <div class="form-group"><button id="dep_form_pre" type="button"  name="previous"   class="btn btn-primary col-md-5 col-md-offset-0 ">Previous</button>
    <div class="col-md-7 "><button  id="dep_form_con" type="button"  name="Next"       class=" form-control btn btn-primary ">Continue</button></div></div>
</div></div></form>

<form id="information_form" class="form-horizontal" role="form"><div class="row col-md-12 col-md-offset-3"><center>
    <div class="form-group"><div class="col-md-6"><input class="form-control" id="salary" type="number" placeholder="Salary"></div></div>			
    <div class="form-group"><div class="col-md-6"><input class="form-control" id="doaa" type="text"  placeholder="Date of Annual allowance" onfocus="(this.type='date')"></div></div>
    <div class="form-group"><div class="col-md-6"><input class="form-control" id="title" type="text"  placeholder="Title" ></div></div>
    <div class="form-group"><div class="col-md-6"><input class="form-control" id="rank" type="number" placeholder="Rank" ></div></div>
    <div class="form-group"><div class="col-md-6"><input class="form-control" id="grade" type="number" placeholder="Grade" ></div></div>
	
    <div class="form-group"><button id="inf_form_pre" type="button"  name="previous"   class="btn btn-primary  col-md-3 col-md-offset-0">Previous</button> 
    <div class="col-md-3 "><button  id="inf_form_con" type="button"  name="Next"       class=" form-control btn btn-primary ">Continue</button></div></div>  
</center></div></form>

<?php 
	include("../../../database.php");
	$ob=new class_database("localhost","root","root","HR");
?>

<form id="Certificate_form" class="form-horizontal" role="form">
  <div class="row col-md-12 col-md-offset-3"><center>
  <div class="form-group"><div class="col-md-6">
			<select id="cer_name" class="form-control" >
					<option disabled selected value> -- select an option -- </option>
					<?php
						$sql="SELECT cer_name FROM certificate_rule";
						$result=$ob->return_data($sql);
						for($i=0;$i<count($result);++$i){
							$val=$result[$i]['cer_name'];
							echo "<option>$val</option>";
						}
					?>	
			</select>
  </div></div>
  <div class="form-group"><div class="col-md-6"><input class="form-control" id="yoi" type="text"  placeholder="Year of Issue"></div></div>
  <div class="form-group"><div class="col-md-6"><input class="form-control" id="place_iss" type="text"  placeholder="Place of Issue  " ></div></div>
  <div class="form-group"><div class="col-md-6"><input class="form-control" id="expert" type="text" placeholder="Expert" ></div></div>
  <div class="form-group">
  <div class="form-group"><button id="cer_form_pre" type="button"  name="previous"   class="btn btn-primary col-md-3 col-md-offset-0 ">Previous</button>
 <div class="col-md-3 "><button  id="cer_form_save" type="button"  name="Next"       class=" form-control btn btn-primary ">Save</button></div></div>
</center></div></form>



</div>
</div>
<script src="../Javascript/empl_en_hr.js"></script>
</body></html>
