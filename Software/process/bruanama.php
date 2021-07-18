<?php
include("basic_1.php");
class class_bruanama{
	private $output;
	function __construct($result_info,$old_cert,$new_cert){
		if($result_info["molat"]==0){//agar molate nabe
			//bas lau 7alata aesh bka ka au shahadae ka badastr henaea la he xoe barztr bet....bo nmuna master haea user shahade nauande la bo daxel dakat lau 7alata peuest nakat aesh bkat
			if($old_cert["start_rank"]>$new_cert["start_rank"] || ($old_cert["start_rank"]==$new_cert["start_rank"] && $old_cert["start_grade"]<$new_cert["start_grade"])){	
				$this->output=$this->check_cert($result_info,$new_cert);
			}	
		}
	}
	public function check_cert($result_info,$new_cert){	
		$basic_1=new basic_1();
			//ئه‌گه‌ر پله‌ی بڕوانامه‌كه‌ی بچوكتربوو
			if($result_info["rank"]>$new_cert["start_rank"] || ($result_info["rank"]==$new_cert["start_rank"] && $result_info["grade"]<$new_cert["start_grade"])){	
				$result_info["new_title"]=$result_info["title"];
				$result_info["new_rank"]=$new_cert["start_rank"];
				$result_info["new_grade"]=$new_cert["start_grade"];
				$result_info["new_salary"]=$basic_1->table_matrix($result_info["new_rank"],$result_info["new_grade"]);
				$result_info["new_doaa"]=$result_info["S_date"];
				$result_info["new_barz"]=$basic_1->check_rank($result_info["employee_id"],$result_info["new_rank"],$result_info["cert_name"]);
				$result_info["new_sarm"]=$basic_1->check_grade($result_info["employee_id"],$result_info["new_rank"],$result_info["new_grade"],$result_info["cert_name"]);
			}else{//ئه‌گه‌ر پله‌ی خۆی بچوكتربوو
					$result_info["new_title"]=$result_info["title"];
					$result_info["new_rank"]=$result_info["rank"];
					if($new_cert["year_period"]>0){//agar qdam salak ean zeatr be <<< bas ba sal uardagre >>>
						$result_info["new_grade"]=$result_info["grade"]+$new_cert["year_period"];
						//agar pash uargrtne qdam martabae la 11 barztr bu <<<za7mata rubdat>>>
						if($result_info["new_grade"]>11){
							$result_info["new_grade"]=1;
							$result_info["new_rank"]=$result_info["rank"]-1;
						}	
					}else{
						$result_info["new_grade"]=$result_info["grade"];
					}
					//bakardet bo gorene sarmuchae salana
					if($new_cert["month_period"]>0){
						$result_info["new_doaa"]=$this->UpdateDate($result_info["S_date"],$new_cert["month_period"]);
					}else{
						$result_info["new_doaa"]=$result_info["S_date"];
					}
					$result_info["new_salary"]=$basic_1->table_matrix($result_info["new_rank"],$result_info["new_grade"]);
					$result_info["new_barz"]=$basic_1->check_rank($result_info["employee_id"],$result_info["new_rank"],$result_info["cert_name"]);
					$result_info["new_sarm"]=$basic_1->check_grade($result_info["employee_id"],$result_info["new_rank"],$result_info["new_grade"],$result_info["cert_name"]);
			}
		return $result_info;
	}	
	public function UpdateDate($S_date,$month){
		$date=date_create($S_date);		
		date_modify($date,"-$month months");//1سال ماوه‌ی سه‌رموچه‌ی ساڵانه‌ی ببه‌ پێش
		$days=date_format($date,"d");// رۆژی سه‌رمووچه‌ی ساڵانه‌ی بگه‌رێنه‌وه‌
		if($days>1)//ئه‌گه‌ر رۆژه‌كه‌ گه‌وره‌تر بوو له‌ 1
		{
			--$days;
			date_modify($date,"-1 months");//مانگه‌كه‌ی كه‌م بكه‌
			date_modify($date,"-$days days");//رۆژه‌كه‌ بكه‌ 1
		}
		return date_format($date,"Y-m-d");
	}
	public function return_data(){
		return $this->output;
	}
}
?>