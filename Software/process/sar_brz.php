<!DOCTYPE html>
<html>
<body>
<?php
	class class_sar_brz{
		
		private $output=array();
		/*
			index 0 : new rank
			index 1 : new grade
			index 2 : new salary
			index 3 : new date		
		*/
		function __construct($salary,$rank,$grade,$title,$S_date,$barzkrdnaua,$sarmucha,$molat,$S_qdam){
			if($molat==true)//ئه‌گه‌ر مۆڵه‌تی بێ موچه‌یی هه‌بوو
			{
				//جارێ هیچ مه‌كه‌
			}else{//ئه‌گه‌ر مۆڵه‌تی بێ موچه‌یی نه‌بوو
				$this->FindInformation($salary,$rank,$grade,$title,$S_date,$barzkrdnaua,$sarmucha);
				$this->UpdateInformation($S_date,$molat);
				$this->output_data();
			}
		}
		public function FindInformation($salary,$rank,$grade,$title,$S_date,$barzkrdnaua,$sarmucha){
			
			$basic_1=new basic_1();

			if($barzkrdnaua==true && $sarmucha==true)//ئه‌گه‌ر به‌رزكردنه‌وه‌ و سه‌رمووچه‌ هه‌بێت.....زۆربه‌ی فه‌رمانبه‌ره‌كان
			{
				 $check=$basic_1->check_barzkrdnaua($rank,$grade);//بزانێ كاتی به‌رزكردنه‌وه‌ی هاتیه‌ یان نا			 
				 if($check==-1){//ئه‌گه‌ر گه‌یشتبووه‌ پله‌ 1 یه‌ك مه‌رته‌به‌ 11
					$this->output[0]=$rank;//پله‌ وه‌كو خۆی
					$this->output[1]=$grade;//مه‌رته‌به‌ وه‌كو خۆی
					$this->output[2]=$salary+20;// موچه‌ 20000 له‌بۆ زیاد بكه‌
				 }else if($check==0){//ئه‌گه‌ر به‌رزكردنه‌وه‌ نه‌بوو
					$this->output[0]=$rank;//پله‌ وه‌كو خۆی
					$this->output[1]=$grade+1;//مه‌رته‌به‌ + 1 یی بكه‌
					$this->output[2]=$basic_1->table_matrix(10-$rank,$grade);//موچه‌ به‌پێی پله‌ ومه‌رته‌به‌ نوێیه‌كه‌ی بدۆزه‌وه‌
				 }else if($check==1){//ئه‌گه‌ر به‌رزكردنه‌وه‌ هه‌بوو	
					$this->output[0]=$rank-1;//پله‌ی به‌رزكه‌وه‌ 
					$this->output[1]=1;//مه‌رته‌به‌ی بكه‌ یه‌ك 
					$this->output[2]=$basic_1->table_matrix(11-$rank,0);//موچه‌ به‌پێی پله‌ ومه‌رته‌به‌ نوێیه‌كه‌ی بدۆزه‌وه‌
				 }
				
			}else if($barzkrdnaua==false && $sarmucha==true){//ئه‌گه‌ر به‌رزكردنه‌وه‌ راوه‌ستابی بۆنمونه‌ حكومه‌ت پاره‌ی نه‌بی یان به‌رزبوونه‌وه‌ له‌بۆ پله‌ 1
					
					/*
						agar rank=1 or 4 ua grade=11 output dabta 1,12 ....harchanda au output halaea bas System qad nagata aera chunka katek
						dagaea 11 aua ea3ne barzkrdnauat uastaea chunka barzkrdnaua peueste ba 4 ean 5 sal haea
					*/
					$this->output[0]=$rank;//پله‌ وه‌كو خۆی
					$this->output[1]=$grade+1;//مه‌رته‌به‌ + 1 یی بكه‌
					$this->output[2]=$basic_1->table_matrix(10-$rank,$grade);//موچه‌ به‌پێی پله‌ ومه‌رته‌به‌ نوێیه‌كه‌ی بدۆزه‌وه‌
					
			}else if($barzkrdnaua==false && $sarmucha==false){// هه‌ردووك راوه‌ستابی، له‌بۆ ئه‌وانه‌ی شه‌هاده‌یان كه‌مه‌ یان له‌بۆ پله‌ 1 مه‌رته‌به‌ 11	
				$this->output[0]=$rank;//پله‌ وه‌كو خۆی
				$this->output[1]=$grade;//مه‌رته‌به‌ وه‌كو خۆی						
				if($salary >= 1148){//ئه‌گه‌ر له‌ناز خشته‌ی نه‌بوو ،پله‌ 1 مه‌رته‌به‌ 11 ئه‌وه‌ هه‌موو دارێ 20000 له‌بۆ زیاد بكه‌
					$this->output[2]=$salary+20;
				}else if($salary < 1148){//به‌پێی خشته‌ی موچه‌ هه‌مووجارێ موچه‌ی دوای خۆی بدێ
					$this->output[2]=$basic_1->table_array($salary);
				}
			}
		}
		
		
		
		public function UpdateInformation($S_date,$molat)
		{
			$date=date_create($S_date);
			if(!$molat)//مۆڵه‌تی نه‌بی
			{
				date_modify($date,"1 years");//1سال ماوه‌ی سه‌رموچه‌ی ساڵانه‌ی ببه‌ پێش
				$days=date_format($date,"d");// رۆژی سه‌رمووچه‌ی ساڵانه‌ی بگه‌رێنه‌وه‌
				if($days>1)//ئه‌گه‌ر رۆژه‌كه‌ گه‌وره‌تر بوو له‌ 1
				{
					--$days;
					date_modify($date,"-1 months");//مانگه‌كه‌ی كه‌م بكه‌
					date_modify($date,"-$days days");//رۆژه‌كه‌ بكه‌ 1
					$this->output[3]=date_format($date,"Y-m-d");
				}
			}else{//مۆڵه‌تی هه‌بی
				$this->output[3]=date_format($date,"Y-m-d");//هیچ ده‌ستكاری مه‌كه‌
			}
		}
		
		public function output_data(){
			/*echo "<pre>";
				print_r($this->output);
			echo "</pre>";*/
			return $this->output;
		}
	}

?>

</body></html>