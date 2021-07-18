$(document).ready(function(){
	$("#department_form").hide();
	$("#Certificate_form").hide();
	$("#information_form").hide();
	$("#employee_form").show();
	var emp_json,dep_json,info_json,cer_json;

	$("#emp_id").click(function(){	
		var blood =$( "#blood option:selected" ).text();
		if(blood=="I dont know")
			blood="---";
		emp_json={
			"name":$("#name").val(),
			"email":$("#email").val(),
			"phone":$("#phone").val(),
			"gender":$("#Gender option:selected" ).val(),
			"blood":blood,
			"birthday":$("#birthinput").val(),
			"born_place":$("#born_place").val(),
			"social":$("#social_status option:selected" ).val(),
			"child":$("#no_of_children").val(),
			
			"address":$("#address").val(),
			"current_city":$("#current_city").val(),
			"current_country":$("#current_country").val(),
			"username":$("#username").val(),
			"password":$("#password").val()
		};
		emp_json=JSON.stringify(emp_json);
		
		$("#employee_form").hide();
		$("#department_form").show();
		$("#change_text").text("Department");
	});
	$("#dep_form_pre").click(function(){
		$("#department_form").hide();
		$("#employee_form").show();
		$("#change_text").text("Employee");
	});
	$("#dep_form_con").click(function(){	
		var status=$("#emp_status option:selected" ).text();
		if(status=="Continue")
			status=1;
		else if(status=="Temporary")
			status=0;	
		dep_json={
			"university":$("#univ_name").val(),
			"college":$("#coll_name").val(),
			"employment":$("#emp_date").val(),
			"wrd":$("#wrd").val(),
			"swa":$("#swa").val(),
			"Status":status,	
			"post":$("#post").val(),
			"department":$("#department").val(),
			"pow":$("#pow").val(),
			"lwb":$("#lwb").val(),
			"issueno":$("#issueno").val(),
			"ministry":$("#ministry").val(),
		};
		dep_json=JSON.stringify(dep_json);	
		$("#department_form").hide();
		$("#information_form").show();
		$("#change_text").text("Information");
	});
	$("#inf_form_pre").click(function(){
		$("#information_form").hide();
		$("#department_form").show();
		$("#change_text").text("Department");
	});
	$("#inf_form_con").click(function(){
		
		info_json={
			"salary":$("#salary").val(),
			"doaa":$("#doaa").val(),
			"title":$("#title").val(),
			"rank":$("#rank").val(),
			"grade":$("#grade").val()
		};
		info_json=JSON.stringify(info_json);	
		$("#information_form").hide();
		$("#Certificate_form").show();
		$("#change_text").text("Certificate");	
	});	
	$("#cer_form_pre").click(function(){
		$("#Certificate_form").hide();
		$("#information_form").show();
		$("#change_text").text("Information");
	});
	$("#cer_form_save").click(function(){	
		cer_json={
			"cer_name":$( "#cer_name option:selected" ).text(),
			"yoi":$("#yoi").val(),
			"place_iss":$("#place_iss").val(),
			"expert":$("#expert").val()
		};
		cer_json=JSON.stringify(cer_json);	
			$.post("../PHP/empl_en_proc_hr.php",{employee: emp_json, department: dep_json, information:info_json, certificate:cer_json},
				function(data, status){
					$("#Certificate_form").hide();
					$("#employee_form").show();
					$("#change_text").text("Employee");
				}
			);	
    });

	var found_check=[false,false];
	$('#name,#username').blur(function(){	
		check_id=$(this).attr("id");
		if(check_id=="name"){
			if($(this).val().length>0){
				change_input("#div_"+$(this).attr("id"),"#span_"+$(this).attr("id"),true,0);
			}else{
				change_input("#div_"+$(this).attr("id"),"#span_"+$(this).attr("id"),false,0);
			}				
		}else if(check_id=="username"){
			if($(this).val().length>0){
			$.post("../PHP/empl_en_proc_hr.php",{"check":"check","username":$(this).val()},
				function(data, status){
					if(data==0){
						alert("Already have this name\n Please Enter another Username");
						change_input("#div_username","#span_username",false,1);
					}else if(data==1){
						change_input("#div_username","#span_username",true,1);
						$("#password").val(randomPassword(8));
					}
				}
			);	
			}else
				change_input("#div_"+$(this).attr("id"),"#span_"+$(this).attr("id"),false,1);
		}
	});	
	function randomPassword(length) {
		var chars = "abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOP1234567890";
		var pass = "";
		for (var x = 0; x < length; x++) {
			var i = Math.floor(Math.random() * chars.length);
			pass += chars.charAt(i);
		}
		return pass;
	}
	function change_input(div,span,check,index){
		if(check==true){
			found_check[index]=true;
			$(div).attr("class"," has-feedback has-success col-md-12");
			$(span).attr("class","glyphicon glyphicon-ok form-control-feedback");
			check_button();
		}else{
			found_check[index]=false;
			$(div).attr("class"," has-feedback has-error col-md-12");
			$(span).attr("class","glyphicon glyphicon-remove form-control-feedback");
			check_button();
		}
	}	
	function check_button(){
		if(found_check[0]==true && found_check[1]==true){
			$("#emp_id").prop( "disabled", false );
		}else{
			$("#emp_id" ).prop( "disabled", true );
		}
	}

});