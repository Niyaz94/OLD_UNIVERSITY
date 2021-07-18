<!DOCTYPE html>
<html>
<head>
	<title>contact us</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <script src="../../../need/jquery/jquery-1.12.0.js"></script>
  	<link rel="stylesheet" type="text/css" 	href="../../../need/DataTables/media/css/jquery.dataTables.css"> 

	<style type="text/css">
   .bb   {
            height: 820px !important;
         } 
   .color {
         background-color:#4d5f7a;
      }
      .size{
        height: 540px !important;
      }
 </style>
</head>

<body class="color white">

<?php include("header_en_us.php");?>

<div class="bb bgcolor">
<div class="container size">
<div class="row">
<div class="col-sm-10 col-sm-offset-1" >
     <br/>
	 
     <div class="col-sm-12 ">
         <div style="text-align: left;" class="col-sm-8">
			<h3>Contact us</h3>
            <p>Fill in the form below to contact us:</p><br><br>
         </div>
         <div style="text-align: right;" class="col-sm-4">
            <br><h2 class="glyphicon glyphicon-envelope" style="width: 100px"></h2>
         </div>
     </div><?php
		if(isset($_SESSION["username"]) && isset($_SESSION["password"])){
			$user=$_SESSION["username"];
			$pass=$_SESSION["password"];
			$sql = "SELECT emp_id FROM user where user_name='$user';";
			$ob=new class_database("localhost","root","root","HR");
			$result =$ob->return_data($sql);
			if(count($result)==1){
				$id=$result[0]["emp_id"];
					echo "<script>";
					echo "$(document).ready(function(){
								$('#save').click(function(){
								$('#input_id').val($id);
							});
						});";
					echo "</script>";
			}
		}
	 ?>
		<form role="form"  method="post" class="col-sm-8 col-sm-offset-2">
             <div class="form-group">
				<div id="div_subject" class="has-error has-feedback">
					<input type="text" id="subject" name="subject" placeholder="Subject..." class="form-control">
					<span  id="span_subject" class="glyphicon glyphicon-remove form-control-feedback"></span>
				</div>
			</div>
             <div class="form-group">
				<div id="div_message" class="has-error has-feedback">
					<textarea id="message" name="message" placeholder="Message..." class=" form-control" rows="8" maxlength="250"></textarea>
					<span  id="span_message" class="glyphicon glyphicon-remove form-control-feedback"></span>
				</div>
			</div>
			 <div class="form-group">
                 <input type="hidden" id="input_id" name="id" value="">
             </div>
			 
             <button id="save" type="button" class="btn btn-primary col-sm-12" disabled>Send message</button>
			 <br><br>
			 <div id="check" class="form-group "></div>
		</form>
		<br>	
      </div></div></div>
                <div class="col-sm-7 col-sm-offset-5" >
                  <h3>...or find us here:</h3> <br><br><br>
                </div>
             
              <div class="row col-sm-12 " style="text-align: center;">
                <div class="col-sm-3 ">
                  <h4 class="glyphicon glyphicon-map-marker" ></h4>
                  <p>Hawler<br>karkuk Road</p>
                </div>
                <div class="col-sm-3 " >
                   <h4 class="glyphicon glyphicon-phone"></h4>
                   <p>Phone:<br>0770 225 98 24</p>
                </div>
                <div class="col-sm-3" >
                   <h4 class="glyphicon glyphicon-envelope"></h4>
                   <p>Email:<br><a href="#">contact.Milakat@gmail.com</a></p>
                </div>
                <div class="col-sm-3" >
                   <h4 class="  glyphicon glyphicon-globe"></h4>
                   <p>Skype:<br>milakat_online</p>
                </div>
          </div>
          </div>
		  
<script>
	$(document).ready(function(){
		$("#save").click(function(){
			$.post("../PHP/cont_en_proc_us.php",
			{"id":$("#input_id").val(),"subject":$("#subject").val(),"message":$("#message").val()},
				function(data, status){	
					if( data > 1){
						$("#check").attr("class","alert alert-success form-group");
						$("#check").html("<strong>Success!</strong> your message send");
					}else{
						$("#check").attr("class","alert alert-warning form-group");
						$("#check").html("<strong>Warning!</strong> your message not send");
					}
				}
			);
		});
		found_check=[false,false];
	$('#message').blur(function(){//
		if($(this).val().length>0)
			 change_input("#div_"+$(this).attr("id"),"#span_"+$(this).attr("id"),true,0);
		else
			 change_input("#div_"+$(this).attr("id"),"#span_"+$(this).attr("id"),false,0);
	});
	$('#subject').blur(function(){//
		if($(this).val().length>0)
			 change_input("#div_"+$(this).attr("id"),"#span_"+$(this).attr("id"),true,1);
		else
			 change_input("#div_"+$(this).attr("id"),"#span_"+$(this).attr("id"),false,1);
	});
	function change_input(div,span,check,index){
		if(check==true){//ئه‌گه‌ر راست بو ئیندێكسه‌ی ده‌كاته‌ راست
			found_check[index]=true;
			$(div).attr("class","has-feedback has-success");
			$(span).attr("class","glyphicon glyphicon-ok form-control-feedback");
			check_button();
		}else{
			found_check[index]=false;//ئه‌وه‌ و ئی سه‌رێ به‌كاردێت بۆ گۆرینی نیشانه‌كان له‌كاتی راست و هه‌ڵه‌بوونی ئه‌و نرخانه‌ی كه‌ به‌كار هێنه‌ر داخیلی ده‌كات
			$(div).attr("class","has-feedback has-error");
			$(span).attr("class","glyphicon glyphicon-remove form-control-feedback");
			check_button();
		}
	}	
	function check_button(){//ئه‌گه‌ر هه‌مووی راست بێت ئه‌وه‌ ده‌توانی بتنه‌كه‌ی دابگری
		if(found_check[0]==true && found_check[1]==true)
			$("#save").prop( "disabled", false );
		else
			$("#save" ).prop( "disabled", true );
	}
	
	
	});
</script>

</body>
</html>