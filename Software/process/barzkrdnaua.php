<?php
	include("basic_1.php");
	class class_barzkrdnaua{	
		private $output=array();
		function __construct($result)
		{
			$basic_1=new basic_1();
			for($i=0,$j=0;$i<count($result);++$i)//aua naue hamu farman barakane au mangae tedaea($result)
				if($result[$i]["sza"]!=1 && $result[$i]["taebat"]!=1 && $result[$i]["molat"]!=1)// agar au shtanae nabu
					if($result[$i]["barzkrdnaua"]==1 && $result[$i]["sarmucha"]==1){// agar kate sarmuche hatbu
						 $check=$basic_1->check_barzkrdnaua($result[$i]["rank"],$result[$i]["grade"]);
						 if($check==1){//agar barz krdnauae habu zanearea nueakan bduzaua
							$result[$i]["new_title"]=$result[$i]["title"];
							$result[$i]["new_rank"]=$result[$i]["rank"]-1;
							$result[$i]["new_grade"]=1;
							$result[$i]["new_salary"]=$basic_1->table_matrix($result[$i]["new_rank"],$result[$i]["new_grade"]);
							$result[$i]["new_S_date"]=$this->UpdateInformation($result[$i]["S_date"]);
							$result[$i]["new_barz"]=$basic_1->check_rank($result[$i]["employee_id"],$result[$i]["rank"],$result[$i]["cert_name"]);
						 	$result[$i]["new_sarm"]=$basic_1->check_grade($result[$i]["employee_id"],$result[$i]["rank"],$result[$i]["new_grade"],$result[$i]["cert_name"]);
							$this->output[$j++]=$result[$i];
						 }
					}			
		}
		function return_output(){//labo return e data bakardet
			return $this->output;
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