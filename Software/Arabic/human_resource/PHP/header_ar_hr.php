<!DOCTYPE html>
<html lang="en">
<head>
  <title>Header english milakat </title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
	<link href="../../../need/bootstrap-3.3.6-dist/css/bootstrap.css" rel="stylesheet" />
	<link href="../../../need/bootstrap-3.3.6-dist/css/bootstrap-theme.css" rel="stylesheet" />
	<script src="../../../need/jquery/jquery-1.12.0.js"></script>
	<script src="../../../need/bootstrap-3.3.6-dist/js/bootstrap.min.js"></script>
	<link rel="stylesheet" type="text/css" href="../../../CSS/css1.css">
  <link rel="stylesheet" type="text/css" href="../../../CSS/css_table_data.css">
	<link rel="stylesheet" type="text/css" href="../Css/header_ku_hr.css">
  <link rel="stylesheet" type="text/css" href="../../../CSS/css_kurdish.css">
   <link href="../../../need/bootstrap-3.3.6-dist/css/bootstrap-flipped.css" rel="stylesheet" />
  <link href="../../../need/bootstrap-3.3.6-dist/css/bootstrap-rtl.css" rel="stylesheet" />
  
</head>



<body class="bgcolor">
		
<?php
	session_start();
	if(!isset($_SESSION["username"]) && !isset($_SESSION["password"])) {
			header("Location: ../../../login_A.php");
	}
?>

<nav class="navbar navbar-inverse " >

  <div class="container-fluid">

      <div class="nav navbar-header" >
       <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
          <span class="sr-only">Toggle navigation</span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
        </button>
      <a class="navbar-brand" href="../../user/PHP/header_ar_us.php"><span class="glyphicon glyphicon-home"></span></a>
      </div>

    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">

      <ul class="nav navbar-nav"> 
        <li><a href="empl_ar_hr.php">اضافة موضف جديد</a></li>
        <li class="dropdown">
         <a class="dropdown-toggle" data-toggle="dropdown" href="language.php">الخدامات
         <span class="caret"></span></a>
          <ul class="dropdown-menu" >
		    <li><a href="annu_ar_hr.php">علاوة سنوي</a></li>
            <li><a href="prom_ar_hr.php">ترفيع الراتب</a></li>
			<li><a href="serv_ar_hr.php">الحساب الخدمة</a></li>
		    <li><a href="acce_ar_hr.php">قدم شكور و تقدیر</a></li>	
			<li><a href="cert_ar_hr.php">قدم الشهادة</a></li>
			<li><a href="leave_ar_hr.php">الاجازة</a></li>
          </ul>
        </li>
		    
				
		 <li class="dropdown">
			 <a class="dropdown-toggle" data-toggle="dropdown" href="language.php">ترتیب
			 <span class="caret"></span></a>
			  <ul class="dropdown-menu" >
				<li><a href="sa_ta_ar_hr.php">جدول الراتب</a></li>
				<li><a href="ce_ru_ar_hr.php">قانون الشهادة</a></li>
				<li><a href="rece_ar_hr.php">رسالة موضف</a></li>
				<li><a href="password.php">ترتیب کلم المرور</a></li>
				<li><a href="sh_ed_ar_hr.php">یعرز و یعد للنشر</a></li>
				<li><a href="sh_or_ar_hr.php">عرض الاوامر</a></li>
			  </ul>
        </li>
		
		<li><a href="manual_ar_hr.php">الكتیب</a></li>
        </ul>

      <ul class="nav navbar-nav navbar-right">
         <li class="dropdown">
         <a class="dropdown-toggle" data-toggle="dropdown" href="#" aria-haspopup="true" aria-expanded="false">
         <span class="glyphicon glyphicon-user"></span></a>
          <ul class="dropdown-menu">

              <li class="dropdown-submenu">
              <a  href="#">اللغه<span class="caret"></span></a>
                <ul class="dropdown-menu">
                 <li><a  href="../../../English/human_resource/PHP/header_en_hr.php">English</a></li>
                 <li><a  href="../../../kurdish/human_resource/PHP/header_ku_hr.php">کوردی</a></li>
                 <li><a tabindex="-1" href="../../../Arabic/human_resource/PHP/header_ar_hr.php">عربی</a></li>
                </ul> 
             </li>
            <li><a href="#">مساعده</a></li>
            <li><a href="../../../logout.php">خروج</a></li>
          </ul>

        </li>
       </ul>
       </div>
       </div>
       </nav>
<script src="../Javascript/header_ar_hr.js"></script>
</body>

</html>
