<!DOCTYPE html>
<html lang="en">
<head>
  <title>به‌شی میلاكات</title>
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
			header("Location: ../../../login_K.php");
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
      <a class="navbar-brand" href="../../user/PHP/header_ku_us.php"><span class="glyphicon glyphicon-home"></span></a>
      </div>

    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">

      <ul class="nav navbar-nav"> 
        <li><a href="empl_ku_hr.php">زیادکردنی فەرمانبەری نوێ</a></li>
        <li class="dropdown">
         <a class="dropdown-toggle" data-toggle="dropdown" href="language.php">خزمەت
         <span class="caret"></span></a>
          <ul class="dropdown-menu" >
		    <li><a href="annu_ku_hr.php">سەرمووچەی ساڵانە</a></li>
            <li><a href="prom_ku_hr.php">بەرزکردنەوەی مووچە</a></li>
			<li><a href="serv_ku_hr.php">هەژماری ڕاژە</a></li>
		    <li><a href="acce_ku_hr.php">پێشخستن</a></li>	
			<li><a href="cert_ku_hr.php">بروانامە</a></li>
			<li><a href="leave_ku_hr.php">مۆڵەت</a></li>
          </ul>
        </li>
		    
				
		 <li class="dropdown">
			 <a class="dropdown-toggle" data-toggle="dropdown" href="language.php">ڕێکخستن
			 <span class="caret"></span></a>
			  <ul class="dropdown-menu" >
				<li><a href="sa_ta_ku_hr.php">خشتەی مووچە</a></li>
				<li><a href="ce_ru_ku_hr.php">یاساکانی بڕوانامە</a></li>
				<li><a href="rece_ku_hr.php">نامەکانی بەکارهێنەر</a></li>
				<li><a href="password.php">ڕێکخستنی وشەی نهێنی</a></li>
				<li><a href="sh_or_ku_hr.php">پیشاندانی فرمانه‌كان</a></li>
				<li><a href="sh_ed_ku_hr.php">پیشاندان و گۆڕین</a></li>
			  </ul>
        </li>

		 <li><a href="manual_ku_hr.php">نامیلکە</a></li>
        </ul>

      <ul class="nav navbar-nav navbar-right">
         <li class="dropdown">
         <a class="dropdown-toggle" data-toggle="dropdown" href="#" aria-haspopup="true" aria-expanded="false">
         <span class="glyphicon glyphicon-user"></span></a>
          <ul class="dropdown-menu">

              <li class="dropdown-submenu">
              <a  href="#">زمان<span class="caret"></span></a>
                <ul class="dropdown-menu">
                 <li><a  href="../../../English/human_resource/PHP/header_en_hr.php">English</a></li>
                 <li><a tabindex="-1" href="../../../kurdish/human_resource/PHP/header_ku_hr.php">کوردی</a></li>
                 <li><a href="../../../Arabic/human_resource/PHP/header_ar_hr.php">عربی</a></li>
                </ul> 
             </li>
            <li><a href="#">یارمەتی</a></li>
            <li><a href="../../../logout.php">چوونە دەرەوە</a></li>
          </ul>

        </li>
       </ul>
       </div>
       </div>
       </nav>
<script src="../Javascript/header_ku_hr.js"></script>
</body>

</html>
