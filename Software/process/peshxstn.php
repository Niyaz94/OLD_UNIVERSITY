<?php
	class class_peshxstn_supas{	
		private $new_result;
		function __construct($result){	
			for($i=0,$j=0;$i<count($result);$i++){	
				$date=date_create($result[$i]["S_date"]);
				if($result[$i]["molat"]!=1 && $result[$i]["sza"]!=1){//مۆڵه‌تی نه‌بی و سزا نه‌درابی
					if($result[$i]["zh_qdam"]>=0 && $result[$i]["zh_qdam"]<3){//ئه‌گه‌ر كه‌متر له‌ 3 قده‌می هه‌بی
							date_modify($date,"-1 months");//سه‌رمووچه‌ی ساڵانه‌ی مانگه‌ك بینه‌ پێش
							$result[$i]["new_S_date"]=date_format($date,"Y-m-d");
							$result[$i]["new_zh_qdam"]=$result[$i]["zh_qdam"]+1;
					}else{
						$result[$i]["new_S_date"]=date_format($date,"Y-m-d");//هیچ ده‌ستكاری مه‌كه‌
						$result[$i]["new_zh_qdam"]=$result[$i]["zh_qdam"];
					}
					$this->new_result[$j++]=$result[$i];
				}
			}	
		}
		public function return_data(){
			return $this->new_result;
		}	
	}
?>