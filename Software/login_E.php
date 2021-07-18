<!DOCTYPE html>
<html lang="en">
<head>
  <title>Login</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
	<link href="need/bootstrap-3.3.6-dist/css/bootstrap.css" rel="stylesheet" />
	<link href="need/bootstrap-3.3.6-dist/css/bootstrap-theme.css" rel="stylesheet" />
	<script src="./need/jquery/jquery-1.12.0.js"></script>
	<script src="./need/bootstrap-3.3.6-dist/js/bootstrap.min.js"></script>
	<link rel="stylesheet" type="text/css" href="./CSS/css1.css">
  <style type="text/css">
    a:hover  { 
         color: white !important;      
     };
	
  </style>
</head>
<body id="photologin">
<br/><br/><br/><br/>
<div class="form-inline">
<div class="white col-lg-3 col-lg-offset-9 col-md-3 col-md-offset-9 col-sm-4 col-sm-offset-8 col-xs-8 col-xs-offset-5">
<b>
  <a href="login_E.php" class=" btn ">English</a>
  -
  <a href="login_k.php" class=" btn ">کوردی</a>
  -
  <a href="login_A.php" class=" btn ">عربي</a>
</b>
</div>
</div>
<br/><br/><br/><br/>
<div class="container"  >
    <form role="form" method="post">
      <div class="col-md-5 col-md-offset-3 col-sm-6 col-sm-offset-3 col-lg-5   col-lg-offset-3 col-xs-12 col-xs-offset-0">  
      
        <div id="div_username" class="input-group input-group-lg has-feedback has-success">
			<span  id="span_username" class="right-addon glyphicon glyphicon-ok form-control-feedback"></span>
			<input type="text" id="username" name="username" class="form-control " placeholder="Username" data-toggle="tooltip">
			<span class="input-group-addon"><div class="glyphicon glyphicon-user"></div></span>
        </div>
		
		<br/><br/>
		
        <div id="div_password1" class="input-group input-group-lg has-feedback has-success">
		   <span  id="span_password1" class="glyphicon glyphicon-ok form-control-feedback"></span>
          <input id="password1" type="password" name="password" class="form-control"  placeholder="Password" data-toggle="tooltip" >
          <span class="input-group-addon"><div class="glyphicon glyphicon-lock"></div></span>  
        </div>
		
	   <br/>
		
		<br/>
		
		<a  id="loginbt" class="btn btn-success col-md-12 col-lg-12 col-sm-12 col-xs-12"><div>Login</div></a>	
  </div>
  </form>
	 
</div>		
<script src="login.js"></script>
</body>
</html>
