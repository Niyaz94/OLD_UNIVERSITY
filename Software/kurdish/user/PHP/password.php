<!DOCTYPE html>
<html lang="en">
<head>
      <title>ژماره‌ی نهێنی</title>
      <meta charset="utf-8">
      <meta name="viewport" content="width=device-width, initial-scale=1">
	  <script src="../../../need/jquery/jquery-1.12.0.js"></script>
	  
 
<?php 
		include("header_ku_us.php");
?>



<body class="color white" >
<div class="bgcolor bb ">

  <div class="container size22 ">
<center><h3 class="white"><br><strong id="change_text" >تكايە ژمارەى نهينى بگۆڕە كاتێك يەكەم جار داخڵ دەبيت</strong> </h3></center>

<br><br>

<form class="form-horizontal" role="form" method="post" action="#">
  <div class="row col-md-12 col-md-offset-3 col-xs-6"><center>
  <div class="form-group"><div id="div_username" class="col-md-6 has-error has-feedback">
		<input class="form-control" id="username" name="username" type="text" placeholder="ناوى بەكارهێنەر">
		<span  id="span_username" class="glyphicon glyphicon-remove form-control-feedback"></span>
	</div></div>
    <div class="form-group"><div id="div_password" class="col-md-6 has-error has-feedback">
		<input class="form-control" id="password" name="password" type="text" placeholder="وشەى نهێني">
		<span  id="span_password" class="glyphicon glyphicon-remove form-control-feedback"></span>
	</div></div>
  <div class="form-group"><button id="button_save" type="button" class="btn btn-primary col-md-6" disabled>خەزن کردن</button></div>
</center></div></form>
<?php 

	if($_SERVER["REQUEST_METHOD"]=="POST"){
		if(isset($_POST["username"]) && isset($_POST["password"])){
			$new_user=$_POST["username"];
			$new_pass=password_hash($_POST["password"],PASSWORD_DEFAULT);
			
			$old_user=$_SESSION["username"];
			$old_pass=$_SESSION["password"];
	
			$sql = "UPDATE user set first_time=1,user_name='$new_user',password='$new_pass'\n"
				  ." where user_name='$old_user';";
			$ob=new class_database("localhost","root","root","HR");
			$result =$ob->update_data($sql);
			if($result==true){
				$_SESSION["username"]=$new_user;
				$_SESSION["password"]=$new_pass;
			}
			
		}
	}
		
?>
</div>
</div>
<script type="text/javascript">
$(document).ready(function (){			
	$("#button_save").click(function(){
		if($("#username").val().length>0 && $("#password").val().length>=8){
			$.post("password_proc.php",{"username":$("#username").val(),"password":$("#password").val()},
				function(data, status){
					alert(data);
				}
			);
		}
		$("#username").val("");
		$("#password").val("");
		
	});
		var found_check=[false,false];
	$('#password,#username').blur(function(){	
		check_id=$(this).attr("id");
		if(check_id=="password"){
			if($(this).val().length>=8){
				change_input("#div_"+$(this).attr("id"),"#span_"+$(this).attr("id"),true,0);
			}else{
				change_input("#div_"+$(this).attr("id"),"#span_"+$(this).attr("id"),false,0);
			}				
		}else if(check_id=="username"){
			if($(this).val().length>0){
				var usernmae="<?php echo $_SESSION["username"]; ?>";
				if(usernmae!=$(this).val()){//agar user username ke daxel krd = nabu ba auae aestae aua dache bzane hech username k bau nauae haea
					$.post("password_proc.php",{"check":"check","username":$(this).val()},
						function(data, status){
							if(data==0){
								alert("ئه‌و ناوه‌ هه‌یه‌\n تكایه‌ ناوێكی تر داخیل بكه‌");
								change_input("#div_username","#span_username",false,1);
							}else if(data==1)
								change_input("#div_username","#span_username",true,1);
						}
					);
				}else//agar user haman username xoe daxel krdaua aua kesha nea
					change_input("#div_username","#span_username",true,1);
			}else
				change_input("#div_"+$(this).attr("id"),"#span_"+$(this).attr("id"),false,1);
		}
	});	
	function change_input(div,span,check,index){
		if(check==true){
			found_check[index]=true;
			$(div).attr("class"," has-feedback has-success col-md-6");
			$(span).attr("class","glyphicon glyphicon-ok form-control-feedback");
			check_button();
		}else{
			found_check[index]=false;
			$(div).attr("class"," has-feedback has-error col-md-6");
			$(span).attr("class","glyphicon glyphicon-remove form-control-feedback");
			check_button();
		}
	}	
	function check_button(){
		if(found_check[0]==true && found_check[1]==true){
			$("#button_save").prop( "disabled", false );
		}else{
			$("#button_save" ).prop( "disabled", true );
		}
	}
});
</script>
</body></html>
