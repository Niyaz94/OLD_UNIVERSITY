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
	<link rel="stylesheet" type="text/css" href="../Css/header_en_hr.css">
  
</head>



<body class="bgcolor">
		
<?php
	session_start();
	if(!isset($_SESSION["username"]) && !isset($_SESSION["password"])) {
			header("Location: ../../../login_E.php");
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
      <a class="navbar-brand" href="../../user/PHP/header_en_us.php"><span class="glyphicon glyphicon-home"></span></a>
      </div>

    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">

      <ul class="nav navbar-nav"> 
        <li><a href="empl_en_hr.php">Add new Employee</a></li>
        <li class="dropdown">
         <a class="dropdown-toggle" data-toggle="dropdown" href="language.php">Service
         <span class="caret"></span></a>
          <ul class="dropdown-menu" >
		    <li><a href="annu_en_hr.php">Annual allowance</a></li>
            <li><a href="prom_en_hr.php">Salary Promotion</a></li>
			<li><a href="serv_en_hr.php">Service Calculation</a></li>
		    <li><a href="acce_en_hr.php">Acceleration</a></li>	
			<li><a href="cert_en_hr.php">Certificate</a></li>
			<li><a href="leave_en_hr.php">Leave</a></li>
          </ul>
        </li>
		    
				
		 <li class="dropdown">
			 <a class="dropdown-toggle" data-toggle="dropdown" href="language.php">Setting
			 <span class="caret"></span></a>
			  <ul class="dropdown-menu" >
				<li><a href="sa_ta_en_hr.php">Salary Table</a></li>
				<li><a href="ce_ru_en_hr.php">Certificate Rules</a></li>
				<li><a href="rece_en_hr.php">Received Request</a></li>
				<li><a href="password.php">Password Setting</a></li>
				<li><a href="sh_ed_en_hr.php">Show and Edit</a></li>
				<li><a href="sh_or_en_hr.php">Show Orders</a></li>
			  </ul>
        </li>
		
		<li><a href="manual_en_hr.php">Manual</a></li>
		
        </ul>

      <ul class="nav navbar-nav navbar-right">
         <li class="dropdown">
         <a class="dropdown-toggle" data-toggle="dropdown" href="#" aria-haspopup="true" aria-expanded="false">
         <span class="glyphicon glyphicon-user"></span></a>
          <ul class="dropdown-menu">

              <li class="dropdown-submenu">
              <a  href="#">Language <span class="caret"></span></a>
                <ul class="dropdown-menu">
                 <li><a tabindex="-1" href="../../../English/human_resource/PHP/header_en_hr.php">English</a></li>
                 <li><a href="../../../kurdish/human_resource/PHP/header_ku_hr.php">کوردی</a></li>
                 <li><a href="../../../Arabic/human_resource/PHP/header_ar_hr.php">عربی</a></li>
                </ul> 
             </li>
            <li><a href="#">Help</a></li>
            <li><a href="../../../logout.php">log out</a></li>
          </ul>

        </li>
       </ul>
       </div>
       </div>
       </nav>
<script src="../Javascript/header_en_hr.js"></script>
</body>

</html>
