<!DOCTYPE html>
<html lang="en">
<head>
      <title>موضف</title>
      <meta charset="utf-8">
      <meta name="viewport" content="width=device-width, initial-scale=1">
	  <script src="../../../need/jquery/jquery-1.12.0.js"></script>
</head>
<body class="bgcolor">

<?php include("header_ar_hr.php");?>

  <div class="container size">
<center><h3 class="white"><br><strong id="change_text">موضف</strong> </h3></center>

<br><br>

  <form id="employee_form" class="form-horizontal" role="form"><div class="row col-md-10 col-md-offset-1">	
	<div class="col-md-6"><div class="col-md-offset-0">
	<div class="form-group"><div id="div_name" class="col-md-12 has-error has-feedback">
		<input id="name" class="form-control" type="text" placeholder="اسم الثلاثي">
		<span  id="span_name" class="glyphicon glyphicon-remove form-control-feedback"></span>
	</div></div>
    <div class="form-group"><div class="col-md-12">
    <input id="email" class="form-control"  type="text"  placeholder="بريد اليكتروني"></div></div>
    <div class="form-group"><div class="col-md-12">
    <input id="phone" class="form-control" type="text" placeholder="رقم الهاتف" ></div></div>
	
	<div class="form-group"><div class="col-md-12">
		<select id="Gender" class="form-control"  >
				<option value="1">انثى</option>
				<option selected value="0">ذكر</option>
		</select>
	</div></div>
	
    <div class="form-group"><div class="col-md-12"><select id="blood" class="form-control" >
    <option>A+</option><option>A-</option><option>B+</option><option>B-</option><option>O+</option><option>O-</option>
    <option>AB+</option><option>AB-</option><option>لا آدری</option></select></div></div>
    <div class="form-group"><div class="col-md-12">
    <input placeholder="تاريخ الولادة" class="form-control" id="birthinput" type="text" onfocus="(this.type='date')"></div></div>
	<div class="form-group"><div class="col-md-12">
	<input class="form-control" id="born_place" type="text" placeholder="مكان الولادة" ></div></div>
	
	<div class="form-group"><div class="col-md-12"><select class="form-control" id="social_status" >
	<option selected value="0">غير متزوج</option><option value="1">متزوج</option></select></div></div>
	
    <div class="form-group"><div class="col-md-12">
    <input class="form-control" id="no_of_children" type="number" placeholder="عدد الاطفال" ></div></div>
   </div></div>

   <div class=" col-md-6"><div class="col-md-offset-0"></div>
   <div class="form-group">
   <img src="../../../image/ic_about.png"  alt=" your Photo" class="col-md-8 col-md-offset-2 img-rounded" id="photo" ></div>
   <div class="form-group"><div class="col-md-12">
   <input class="form-control" id="address" type="text" placeholder="عنوان" ></div></div>
   <div class="form-group"><div class="col-md-12">
   <input class="form-control" id="current_city" type="text" placeholder="المدينة الحالية" ></div></div>
   <div class="form-group"><div class="col-md-12">
   <input class="form-control" id="current_country" type="text"  placeholder="البلد الحالي"></div></div>
   
   
   <div class="form-group"><div id="div_username" class="col-md-12 has-error has-feedback">
		<input class="form-control" id="username" type="text" placeholder="اسم المستخدم">
		<span  id="span_username" class="glyphicon glyphicon-remove form-control-feedback"></span>
	</div></div>
   <div class="form-group"><div class="col-md-12">
   <input class="form-control" id="password" type="text" placeholder="كلمة مرور / كلمة السر" disabled></div></div>
   <br/><div class="form-group">
   <button type="button" id="emp_id" name="Next" class="form-control btn btn-primary" disabled>التالي</button></div></div>
   
   
</div></form>

<form id="department_form" class="form-horizontal" role="form"><div class="row col-md-10 col-md-offset-1">
    <div class="col-md-6"><div class="col-md-offset-0">
    <div class="form-group"><div class="col-md-12">
    <input class="form-control" id="univ_name" type="text" placeholder="اسم الجامعة"></div></div>
    <div class="form-group"><div class="col-md-12">
    <input class="form-control"  id="coll_name" type="text"  placeholder="اسم الكلية /المعهد "></div></div>
    <div class="form-group"><div class="col-md-12">
    <input class="form-control" id="emp_date"  placeholder="تاريخ التوضيف" type="text" onfocus="(this.type='date')"></div></div>
	<div class="form-group"><div class="col-md-12">
    <input class="form-control" id="swa" placeholder="بدایة عمل من" type="text" onfocus="(this.type='date')"></div></div>
	
    <div class="form-group"><div class="col-md-12">
    <input class="form-control" id="wrd" placeholder="تاريخ رجوع" type="text" onfocus="(this.type='date')"></div></div>
	
	<div class="form-group"><div class="col-md-12"><select class="form-control" id="emp_status" >
    <option selected>استمر</option><option>مؤقت</option></select></div></div>  
	</div></div>
	
    <div class=" col-md-6">
	<div class="form-group"><div class="col-md-12">
    <input class="form-control" id="post" type="text" placeholder="منصب" ></div></div>
    <div class="form-group"><div class="col-md-12">
    <input class="form-control" id="department" type="text" placeholder="قسم" ></div></div>
    <div class="form-group"><div class="col-md-12">
    <input class="form-control" id="pow" type="text"  placeholder="مكان العمل"></div></div>
    <div class="form-group"><div class="col-md-12">
    <input class="form-control" id="lwb" type="number" placeholder="توازن ترك العمل" ></div></div>
    <div class="form-group"><div class="col-md-12">
    <input class="form-control" id="issueno" type="text" placeholder="رقم الاصدار" ></div></div>
    <div class="form-group"><div class="col-md-12">
    <input class="form-control" id="ministry" type="text" placeholder="موافقه وزارة المالية" ></div></div><br/>
    <div class="form-group"><button id="dep_form_pre" type="button"  name="previous"   class="btn btn-primary col-md-5 col-md-offset-0 ">قبل</button>
    <div class="col-md-7 "><button  id="dep_form_con" type="button"  name="Next"       class=" form-control btn btn-primary ">التالي</button></div></div>
</div></div></form>

<form id="information_form" class="form-horizontal" role="form"><div class="row col-md-12 col-md-offset-3"><center>
    <div class="form-group"><div class="col-md-6"><input class="form-control" id="salary" type="number" placeholder="الراتب"></div></div>			
    <div class="form-group"><div class="col-md-6"><input class="form-control" id="doaa" type="text"  placeholder="تاريخ علاوة السنوي" onfocus="(this.type='date')"></div></div>
    <div class="form-group"><div class="col-md-6"><input class="form-control" id="title" type="text"  placeholder="عنوان" ></div></div>
    <div class="form-group"><div class="col-md-6"><input class="form-control" id="rank" type="number" placeholder="مەرتەب" ></div></div>
    <div class="form-group"><div class="col-md-6"><input class="form-control" id="grade" type="number" placeholder="درجه" ></div></div>
	
    <div class="form-group"><button id="inf_form_pre" type="button"  name="previous"   class="btn btn-primary  col-md-3 col-md-offset-0">قبل</button> 
    <div class="col-md-3 "><button  id="inf_form_con" type="button"  name="Next"       class=" form-control btn btn-primary ">التالي</button></div></div>  
</center></div></form>

<?php 
	include("../../../database.php");
	$ob=new class_database("localhost","root","","human_resources_4");
?>

<form id="Certificate_form" class="form-horizontal" role="form">
  <div class="row col-md-12 col-md-offset-3"><center>
  <div class="form-group"><div class="col-md-6">
			<select id="cer_name" class="form-control" >
					<option disabled selected value> شهادة </option>
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
  <div class="form-group"><div class="col-md-6"><input class="form-control" id="yoi" type="text"  placeholder="سنة الاصدار"></div></div>
  <div class="form-group"><div class="col-md-6"><input class="form-control" id="place_iss" type="text"  placeholder="سابق –حفض" ></div></div>
  <div class="form-group"><div class="col-md-6"><input class="form-control" id="expert" type="text" placeholder="خبیر" ></div></div>
  <div class="form-group">
  <div class="form-group"><button id="cer_form_pre" type="button"  name="previous"   class="btn btn-primary col-md-3 col-md-offset-0 ">قبل</button>
 <div class="col-md-3 "><button  id="cer_form_save" type="button"  name="Next"       class=" form-control btn btn-primary ">خزن</button></div></div>
</center></div></form>



</div>
</div>
<script src="../Javascript/empl_ar_hr.js"></script>
</body></html>
