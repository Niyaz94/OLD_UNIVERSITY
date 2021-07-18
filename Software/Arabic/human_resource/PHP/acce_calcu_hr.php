<?php

	class class_peshxstn_supas{
		
		private $output=array();
		/*
			index 0 : به‌رواری سه‌رمووچه‌ی ساڵانه‌
			index 1 : ژماره‌ی پێشحستن	
		*/
		
		function __construct($result)
		{	
			for($i=0;$i<count($result);$i++){
				$this->FindNewDate($result[$i]["S_date"],$result[$i]["zh_qdam"],$result[$i]["molat"]);
			}	
		}
		
		public function FindNewDate($S_date,$S_qdam,$molat){
			$row=array();
			$date=date_create($S_date);
			if(!$molat){//مۆڵه‌تی نه‌بی
				if($S_qdam>=0 && $S_qdam<3)//ئه‌گه‌ر كه‌متر له‌ 3 قده‌می هه‌بی
				{
						date_modify($date,"-1 months");//سه‌رمووچه‌ی ساڵانه‌ی مانگه‌ك بینه‌ پێش
						$row[0]=date_format($date,"Y-m-d");
						$row[1]=(++$S_qdam);
				}else{
					$row[0]=date_format($date,"Y-m-d");//هیچ ده‌ستكاری مه‌كه‌
					$row[1]=$S_qdam;
				}
			}else{//مۆڵه‌تی هه‌بی
				$row[0]=date_format($date,"Y-m-d");//هیچ ده‌ستكاری مه‌كه‌
				$row[1]=$S_qdam;
			}
			$this->output[]=$row;
		}
			
		
		public function output_data(){
			return $this->output;
		}
	
	}

?>