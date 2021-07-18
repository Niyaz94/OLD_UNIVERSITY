$(document).ready(function (){			
	var found_check=[true,true];	
	$('#username').on("keyup",function(){//له‌بۆ ته‌ماشاكردنی ناونیشان
		if(/^([A-Za-z ]+|[\u0600-\u06FF ]+)$/.test($(this).val()))
			 change_input("#div_"+$(this).attr("id"),"#span_"+$(this).attr("id"),true,0);
		else
			 change_input("#div_"+$(this).attr("id"),"#span_"+$(this).attr("id"),false,0);
	});		
	$('#password1').on("keyup",function(){//له‌بۆ ته‌ماشاكردنی ناونیشان
		if(/^([A-Za-z 0-9]{8,}|[\u0600-\u06FF 0-9]{8,})$/.test($(this).val()))
			 change_input("#div_"+$(this).attr("id"),"#span_"+$(this).attr("id"),true,1);
		else
			 change_input("#div_"+$(this).attr("id"),"#span_"+$(this).attr("id"),false,1);
	});
	function change_input(div,span,check,index){
		if(check==true){//ئه‌گه‌ر راست بو ئیندێكسه‌ی ده‌كاته‌ راست
			found_check[index]=true;
			$(div).attr("class","has-feedback has-success input-group input-group-lg");
			$(span).attr("class","glyphicon glyphicon-ok form-control-feedback");
			check_button();
		}else{
			found_check[index]=false;//ئه‌وه‌ و ئی سه‌رێ به‌كاردێت بۆ گۆرینی نیشانه‌كان له‌كاتی راست و هه‌ڵه‌بوونی ئه‌و نرخانه‌ی كه‌ به‌كار هێنه‌ر داخیلی ده‌كات
			$(div).attr("class","has-feedback has-error input-group input-group-lg");
			$(span).attr("class","glyphicon glyphicon-remove form-control-feedback");
			check_button();
		}
	}	
	function check_button(){//ئه‌گه‌ر هه‌مووی راست بێت ئه‌وه‌ ده‌توانی بتنه‌كه‌ی دابگری
		var index=(window.location.href).slice(-5,-4).toUpperCase();;//bakardet bo deare krdne auae (kurdi,arabi,english)
		if(found_check[0]==true && found_check[1]==true ){
			$.post("login_proc.php",
			{"username":$("#username").val(),"password":$("#password1").val(),"index":index},
				function(data, status){
					//alert(data);
					$("#loginbt").attr("href",data);
					$("#loginbt").attr("class","btn btn-success col-md-12 col-lg-12 col-sm-12 col-xs-12");
				}
			);	
		}
	}	
});