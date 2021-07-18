<!DOCTYPE html>
<html lang="en">
<head>
  <title>سه‌ره‌تا</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link href="../../../need/bootstrap-3.3.6-dist/css/bootstrap.css" rel="stylesheet" />
  <link href="../../../need/bootstrap-3.3.6-dist/css/bootstrap-theme.css" rel="stylesheet" />
   <link href="../../../need/bootstrap-3.3.6-dist/css/bootstrap-flipped.css" rel="stylesheet" />
  <link href="../../../need/bootstrap-3.3.6-dist/css/bootstrap-rtl.css" rel="stylesheet" />

  <script src="../../../need/jquery/jquery-1.12.0.js"></script>
  <script src="../../../need/bootstrap-3.3.6-dist/js/bootstrap.min.js"></script>

  <link rel="stylesheet" type="text/css" href="../../../CSS/css1.css">
  <link rel="stylesheet" type="text/css" href="../Css/header_ku_us.css">
  <link rel="stylesheet" type="text/css" href="../../../CSS/css_kurdish.css">
  
</head>
<body style="background-color: #4c5c77;">

<?php
  include("slide_k.php");
  include("../../../database.php");
?>

<nav class="navbar navbar-inverse" >

  <div class="container-fluid">
    <div class="nav navbar-header" >
       <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
          <span class="sr-only">Toggle navigation</span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
        </button>
         <a class="navbar-brand" href="header_ku_us.php">
         <span class="glyphicon glyphicon-home"></span></a>
    </div>
  
  <?php 
      if(isset($_SESSION["username"]) && isset($_SESSION["password"])){
        $name=$_SESSION["username"];
        $pass=$_SESSION["password"];
        
        $sql = "SELECT level FROM user where user_name='$name';";
        $ob=new class_database("localhost","root","root","HR");
        $result =$ob->return_data($sql);
          if(count($result)==1){
            $x=$result[0]['level'];
            if($x=="admin"){
              echo "<script type='text/javascript'>
                $(document).ready(function(){
                  $('#hr').show();
                  $('#hr').attr('href','../../human_resource/PHP/header_ku_hr.php');
                });
              </script>";
            }else if($x=="user"){
              echo "<script type='text/javascript'>
                $(document).ready(function(){
                  $('#hr').hide();
                  $('#hr').attr('href','#');
                });
                </script>";
            }else{
              unset($_SESSION["username"]);
              unset($_SESSION["password"]);
              header("Location: ../../../login.php");
            }
          }
      }
  
  
  ?>

   <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">

      <ul class="nav navbar-nav"> 


      <li><a href="empl_ku_us.php">زانیاریەکانت</a></li>

      <li class="dropdown">
         <a class="dropdown-toggle" data-toggle="dropdown" href="language.php">خزمەت
         <span class="caret"></span></a>
          <ul class="dropdown-menu" >
            <li><a href="serv_ku_us.php">هەژماری ڕاژە</a></li>
            <li><a href="ac_ac_ku_us.php">پێشخستنی سوپاس و پێزانین</a></li>
      <li><a href="ac_ce_ku_us.php">پێشخستنی بڕوانامە</a></li> 
            <li><a href="prom_ku_us.php">بەرزکردنەوەی مووچە</a></li>
            <li><a href="annu_ku_us.php">سەرمووچەی ساڵانە</a></li>
          </ul>
        </li>

    <li><a href="table_ku_us.php">خشتەی مووچە</a></li>
        <li><a  id="hr" href="">بەشی HR</a></li>
      </ul>

<ul class="nav navbar-nav navbar-right">
         <li class="dropdown">
         <a class="dropdown-toggle" data-toggle="dropdown" href="language.php" aria-haspopup="true" aria-expanded="false">
         <span class="glyphicon glyphicon-user"></span></a>
          <ul class="dropdown-menu">

              <li class="dropdown-submenu">
              <a  href="#">زمان <span class="caret"></span></a>
                <ul class="dropdown-menu">
                 <li><a href="../../../English/user/PHP/header_en_us.php">English</a></li>
                <li><a href="header_ku_us.php">کوردی</a></li>
                <li><a href="../../../Arabic/user/PHP/header_ar_us.php">عربی</a></li> 
                </ul> 
             </li>
            <li><a href="password.php">ژمارەی نهێنی</a></li>
            <li><a href="#">دەربارەی ئێمە</a></li>
            <li><a href="cont_ku_us.php">پەیوەندیمان پێوە بکە</a></li>
            <li><a href="../../../logout.php">چوونەدەرەوە</a></li>
          </ul>

        </li>
        </ul>
        </ul>
      </ul></div>
      </div>
</nav>

<script src="../Javascript/header_ku_us.js" ></script>
</body>
</html>

