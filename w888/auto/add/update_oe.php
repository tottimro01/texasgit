<? 
		$sql = "update bom_tb_data_sport_today set 
		b_big='$big' , 
       b_percent_hdc='$per1' , b_hdc= '$hdc' , b_hdc_1='$bet_1_1' , b_hdc_2='$bet_1_2' 
where b_id= '$idbet'  and  b_add	= '$add' and b_sport= '$zoneX'  and b_auto_hdc=1
 ";
 sql_query($sql);
 
 		$sql = "update bom_tb_data_sport_today set 
       b_percent_goal='$per2' , b_goal='$gold' , b_goal_1='$bet_2_1' , b_goal_2='$bet_2_2'  , 
where b_id= '$idbet'  and  b_add	= '$add' and b_sport= '$zoneX'  and b_auto_goal=1
 ";
 sql_query($sql);
 
 		$sql = "update bom_tb_data_sport_today set 
b_1h_percent_hdc= '$per3' ,  b_1h_hdc= '$hdc_h' , b_1h_hdc_1= '$bet_3_1' , b_1h_hdc_2='$bet_3_2' 
where b_id= '$idbet'  and  b_add	= '$add' and b_sport= '$zoneX'  and b_1h_auto_hdc=1
 ";
 sql_query($sql);
 
  		$sql = "update bom_tb_data_sport_today set 
 b_1h_percent_goal='$per4' , b_1h_goal='$gold_h' , b_1h_goal_1=  '$bet_4_1', b_1h_goal_2= '$bet_4_2' , 
where b_id= '$idbet'  and  b_add	= '$add' and b_sport= '$zoneX'  and b_1h_auto_goal=1
 ";
 sql_query($sql);
 
   		$sql = "update bom_tb_data_sport_today set 
 b_1x2_1= '$bet6_1' , b_1x2_x='$bet6_x' , b_1x2_2='$bet6_2' , 
where b_id= '$idbet'  and  b_add	= '$add' and b_sport= '$zoneX'  and b_auto_1x2=1
 ";
 sql_query($sql);
 
   		$sql = "update bom_tb_data_sport_today set 
b_1h_1x2_1= '$bet66_1' , b_1h_1x2_x='$bet66_x' , b_1h_1x2_2= '$bet66_2' 
where b_id= '$idbet'  and  b_add	= '$add' and b_sport= '$zoneX'  and b_1h_auto_1x2=1
 ";
 sql_query($sql);


		
		
  		$sql = "update bom_tb_data_sport_today set 
b_percent_oe='$per5' , 	b_odds='$bet7[odd]' , 	 b_even='$bet7[even]' , 	 b_1h_odds='$bet8[odd]' , 	 b_1h_even='$bet8[even]'
where b_id= '$idbet'  and  b_add	= '$add' and b_sport= '$zoneX'  and b_auto_oe=1
 ";
echo $sql."<hr>";
sql_query($sql);

	

?>