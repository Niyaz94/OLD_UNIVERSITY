<?php
	include("basic_1.php");
	class class_sarmucha{
		private $output=array();
		
		function __construct($result)
		{
			$basic_1=new basic_1();
			
			for($i=0,$j=0;$i<count($result);++$i){//aua naue hamu farman barakane au mangae tedaea($result)
			
				//ئه‌گه‌ر مؤڵه‌تی نه‌بی ، پله‌ی تایبه‌ت نه‌بی ، سزا نه‌درابی
				if($result[$i]["sza"]!=1 && $result[$i]["taebat"]!=1 && $result[$i]["molat"]!=1){
					if($result[$i]["barzkrdnaua"]==1 && $result[$i]["sarmucha"]==1){
						 $check=$basic_1->check_barzkrdnaua($result[$i]["rank"],$result[$i]["grade"]);
						 if($check==0 || $check==-1){
							$result[$i]["new_rank"]=$result[$i]["rank"];
							$result[$i]["new_grade"]=$result[$i]["grade"]+1;
							$result[$i]["new_salary"]=$basic_1->table_matrix($result[$i]["rank"],$result[$i]["new_grade"]);
							$result[$i]["new_S_date"]=$this->UpdateInformation($result[$i]["S_date"]);
							$result[$i]["new_barz"]=$basic_1->check_rank($result[$i]["employee_id"],$result[$i]["rank"],$result[$i]["cert_name"]);
						 	$result[$i]["new_sarm"]=$basic_1->check_grade($result[$i]["employee_id"],$result[$i]["rank"],$result[$i]["new_grade"],$result[$i]["cert_name"]);
							$this->output[$j++]=$result[$i];
						 }
					}else if($result[$i]["barzkrdnaua"]==0 && $result[$i]["sarmucha"]==1){
							$result[$i]["new_rank"]=$result[$i]["rank"];
							$result[$i]["new_grade"]=$result[$i]["grade"]+1;
							$result[$i]["new_salary"]=$basic_1->table_matrix($result[$i]["rank"],$result[$i]["new_grade"]);
							$result[$i]["new_S_date"]=$this->UpdateInformation($result[$i]["S_date"]);
							$result[$i]["new_barz"]=$basic_1->check_rank($result[$i]["employee_id"],$result[$i]["rank"],$result[$i]["cert_name"]);
						 	$result[$i]["new_sarm"]=$basic_1->check_grade($result[$i]["employee_id"],$result[$i]["rank"],$result[$i]["new_grade"],$result[$i]["cert_name"]);
							$this->output[$j++]=$result[$i];
					}else if($result[$i]["barzkrdnaua"]==0 && $result[$i]["sarmucha"]==0){	
							$result[$i]["new_rank"]=$result[$i]["rank"];
							$result[$i]["new_grade"]=$result[$i]["grade"];
							$result[$i]["new_S_date"]=$this->UpdateInformation($result[$i]["S_date"]);
							$result[$i]["new_salary"]=$basic_1->end_salary($result[$i]["salary"],$result[$i]["rank"],$result[$i]["grade"]);
							$result[$i]["new_barz"]=$basic_1->check_rank($result[$i]["employee_id"],$result[$i]["rank"],$result[$i]["cert_name"]);
						 	$result[$i]["new_sarm"]=$basic_1->check_grade($result[$i]["employee_id"],$result[$i]["rank"],$result[$i]["new_grade"],$result[$i]["cert_name"]);
							$this->output[$j++]=$result[$i];
					}
				}//agar molate nabe , sza nadrabe , plae taebat be
				else if($result[$i]["sza"]!=1 && $result[$i]["taebat"]==1 && $result[$i]["molat"]!=1){
					$special=$basic_1->return_table_special();
					
					for($m=0;$m<count($special);$m++){
						for($n=1;$n<count($special[0])-2;$n++){
							if($special[$m][$n]==$result[$i]["salary"]){
								if($result[$i]["grade"]==$special[0][count($special[0])-1]){
									if($result[$i]["rank"]==$special[count($special)-1][0]){
										$result[$i]["new_rank"]=$result[$i]["rank"];
										$result[$i]["new_grade"]=$result[$i]["grade"];
										$result[$i]["new_salary"]=$result[$i]["salary"]+$special[$m][count($special[0])-2];
										$result[$i]["new_S_date"]=$this->UpdateInformation($result[$i]["S_date"]);
										$result[$i]["new_barz"]=$result[$i]["barzkrdnaua"];
										$result[$i]["new_sarm"]=$result[$i]["sarmucha"];
									}else{
										$result[$i]["new_rank"]=$special[$m+1][0];
										$result[$i]["new_grade"]=1;
										$result[$i]["new_salary"]=$special[$m+1][1];
										$result[$i]["new_S_date"]=$this->UpdateInformation($result[$i]["S_date"]);
										$result[$i]["new_barz"]=$result[$i]["barzkrdnaua"];
										$result[$i]["new_sarm"]=$result[$i]["sarmucha"];
									}				
								}else{
									$result[$i]["new_rank"]=$result[$i]["rank"];
									$result[$i]["new_grade"]=$result[$i]["grade"]+1;
									$result[$i]["new_salary"]=$special[$m][$n+1];
									$result[$i]["new_S_date"]=$this->UpdateInformation($result[$i]["S_date"]);
									$result[$i]["new_barz"]=$result[$i]["barzkrdnaua"];
									$result[$i]["new_sarm"]=$result[$i]["sarmucha"];
								}
							}
						}
					}
					$this->output[$j++]=$result[$i];		
				}
			}	
			
		}
		function return_output(){
			return $this->output;
		}
		
		public static function check_Annual($rank,$grade){
			$basic=new basic_1();
			return $basic->check_barzkrdnaua($rank,$grade);	
		}
		

		public function UpdateInformation($S_date){
			$date=date_create($S_date);
			
				date_modify($date,"1 years");//1سال ماوه‌ی سه‌رموچه‌ی ساڵانه‌ی ببه‌ پێش
				$days=date_format($date,"d");// رۆژی سه‌رمووچه‌ی ساڵانه‌ی بگه‌رێنه‌وه‌
				if($days>1)//ئه‌گه‌ر رۆژه‌كه‌ گه‌وره‌تر بوو له‌ 1
				{
					--$days;
					date_modify($date,"-1 months");//مانگه‌كه‌ی كه‌م بكه‌
					date_modify($date,"-$days days");//رۆژه‌كه‌ بكه‌ 1
				}
			return date_format($date,"Y-m-d");
		}
	}
?>