<? 
		$sql = "INSERT IGNORE INTO bom_tb_data_sport_today
					 (						
b_id , b_add , b_date , b_zone_id , b_asc , b_zone , b_name_1 , b_name_2 , b_date_play , b_big , 
b_view , b_bet , b_accept , b_percent_hdc , b_hdc , b_hdc_1 , b_hdc_2 , 
b_view_goal , b_percent_goal , b_goal , b_goal_1 , b_goal_2 , 

b_1h_view , b_1h_bet , b_1h_accept , b_1h_percent_hdc , b_1h_hdc , b_1h_hdc_1 , b_1h_hdc_2 , 
b_1h_view_goal , b_1h_percent_goal , b_1h_goal , b_1h_goal_1 , b_1h_goal_2 , 

b_1x2_view , b_1x2_bet , b_1x2_accept , b_1x2_1 , b_1x2_x , b_1x2_2 , 
b_1h_1x2_1 , b_1h_1x2_x , b_1h_1x2_2 , 

b_static , 
b_sport 
					 ) 
		              value(  '$idbet' ,  '$add' ,  '$view_date' ,   '$asc' ,  '$asc' ,  '$zone_en' ,  '$name_1_en' ,   '$name_2_en' ,  '$b_date_play' , '$big' ,
									 '$view' ,	 '$bet' ,  '$accept' ,  '$per1' ,    '$hdc' , '$bet_1_1' ,  '$bet_1_2' ,
											 '$view' , '$per2' , '$gold' ,  '$bet_2_1' , '$bet_2_2' ,  
											 
											  '$view' ,	 '$bet' ,  '$accept' ,  '$per3' ,    '$hdc_h' , '$bet_3_1' ,  '$bet_3_2' ,
											   '$view' , '$per4' , '$gold_h' ,  '$bet_4_1' , '$bet_4_2' ,  
											   
											     '$view' ,	 '$bet' ,  '$accept' ,  '$bet6_1' ,    '$bet6_x' , '$bet6_2' ,  
													     '$bet66_1' ,   '$bet66_x' ,   '$bet66_2' , 
														 
														   '$idbet' ,   '$zoneX' 
					    )";
					echo $sql."<hr>";
		    sql_query($sql);
			
			
			
		$sql = "INSERT IGNORE INTO bom_tb_data_sport_end
					 (						
b_id , b_add , b_date , b_zone_id , b_asc , b_zone , b_name_1 , b_name_2 , b_date_play , b_big , 
b_view , b_bet , b_accept , b_percent_hdc , b_hdc , b_hdc_1 , b_hdc_2 , 
b_view_goal , b_percent_goal , b_goal , b_goal_1 , b_goal_2 , 

b_1h_view , b_1h_bet , b_1h_accept , b_1h_percent_hdc , b_1h_hdc , b_1h_hdc_1 , b_1h_hdc_2 , 
b_1h_view_goal , b_1h_percent_goal , b_1h_goal , b_1h_goal_1 , b_1h_goal_2 , 

b_1x2_view , b_1x2_bet , b_1x2_accept , b_1x2_1 , b_1x2_x , b_1x2_2 , 
b_1h_1x2_1 , b_1h_1x2_x , b_1h_1x2_2 , 

b_static , 
b_sport 
					 ) 
		              value(  '$idbet' ,  '$add' ,  '$view_date' ,   '$asc' ,  '$asc' ,  '$zone_en' ,  '$name_1_en' ,   '$name_2_en' ,  '$b_date_play' , '$big' ,
									 '$view' ,	 '$bet' ,  '$accept' ,  '$per1' ,    '$hdc' , '$bet_1_1' ,  '$bet_1_2' ,
											 '$view' , '$per2' , '$gold' ,  '$bet_2_1' , '$bet_2_2' ,  
											 
											  '$view' ,	 '$bet' ,  '$accept' ,  '$per3' ,    '$hdc_h' , '$bet_3_1' ,  '$bet_3_2' ,
											   '$view' , '$per4' , '$gold_h' ,  '$bet_4_1' , '$bet_4_2' ,  
											   
											     '$view' ,	 '$bet' ,  '$accept' ,  '$bet6_1' ,    '$bet6_x' , '$bet6_2' ,  
													     '$bet66_1' ,   '$bet66_x' ,   '$bet66_2' , 
														 
														   '$idbet' ,   '$zoneX' 
					    )";
					echo $sql."<hr>";
		    sql_query($sql);			
			
			
			
	$b_date_time=date("Y-m-d H:i:s",$b_date_play );		
	$sql = "INSERT IGNORE INTO bom_tb_data_football_result
					 (						
b_id ,  b_date ,  b_date_play ,  b_date_time ,  b_zone_id ,  
b_zone ,  b_name_1 ,  b_name_2 ,  
b_sport 
					 ) 
		              value(  '$idbet' ,  '$view_date'  ,  '$b_date_play' , '$b_date_time'  ,  '$asc' ,  '$zone_en' ,  '$name_1_en' ,   '$name_2_en' ,   '$zoneX' 
					    )";
				#	echo"<hr>";
		    sql_query($sql);
			
	
	##########################Lang
		$sql = "INSERT IGNORE INTO bom_tb_lang_team ( en ,xupdate,lang_sport , maxbet_id )  value(  '$name_1_en' ,  '$view_date'  ,   '$zoneX'  ,  '$idbet'   )";
		 sql_query($sql);
		$sql = "INSERT IGNORE INTO bom_tb_lang_team ( en ,xupdate,lang_sport  , maxbet_id  )  value(  '$name_2_en' ,  '$view_date'  ,   '$zoneX'  ,  '$idbet'   )";
		 sql_query($sql);
		$sql = "INSERT IGNORE INTO bom_tb_lang_zone ( en ,xupdate,lang_sport   , maxbet_id )  value(  '$zone_en' ,  '$view_date'  ,   '$zoneX' ,  '$idbet'    )";
		 sql_query($sql);
			
   $sql = "update bom_tb_lang_team set xupdate='$view_date',lang_sport='$zoneX', maxbet_id='$idbet'  where   en='$name_1_en' ";
  sql_query($sql);
   $sql = "update bom_tb_lang_team set xupdate='$view_date',lang_sport='$zoneX', maxbet_id='$idbet'    where   en='$name_2_en'  ";
  sql_query($sql);
  
   $sql = "update bom_tb_lang_zone set xupdate='$view_date',lang_sport='$zoneX', maxbet_id='$idbet'    where   en='$zone_en'  ";
  sql_query($sql);
?>