<?php ob_start(); if (!isset($_SESSION)) { session_start(); } ?>
<?php 

  if($_SESSION["AGlang"]==""){
      $_SESSION["AGlang"]="th";
  }
  require('inc/conn.php');
  require('inc/function.php');
  require('lang/ag_lang.php');



  $arr_lg = [];
  $arr_ball = [];

  $sql=sql_query("select * from bom_tb_football_bill_play_live where r_id = '".$_SESSION["rid"]."' and b_numstep = 1");
  while($rs=sql_fetch($sql)){
  	$rs_ball = sql_array_sp("select * from bom_tb_ball_list where b_id = '$rs[b_id]'");
  	$arr_lg[$rs_ball["b_zone_id"]] = ($rs_ball["b_zone_th"]!="" ? $rs_ball["b_zone_th"] : $rs_ball["b_zone_en"]);

  	$arr_data["ball"] = $rs_ball;
  	$arr_data["bet"] = $rs;

  	$arr_ball[$rs_ball["b_zone_id"]][$rs["b_id"]]["ball"] = $rs_ball;
  	if($rs["play_type"]==1 || $rs["play_type"]==2){
	  	$arr_ball[$rs_ball["b_zone_id"]][$rs["b_id"]]["bet_hdc"] = $arr_ball[$rs_ball["b_zone_id"]][$rs["b_id"]]["bet_hdc"]+$rs["b_total"];
	}else if($rs["play_type"]==3 || $rs["play_type"]==4){
		$arr_ball[$rs_ball["b_zone_id"]][$rs["b_id"]]["bet_goal"] = $arr_ball[$rs_ball["b_zone_id"]][$rs["b_id"]]["bet_goal"]+$rs["b_total"];
	}else if($rs["play_type"]==11 || $rs["play_type"]==12){
		$arr_ball[$rs_ball["b_zone_id"]][$rs["b_id"]]["bet_1h_hdc"] = $arr_ball[$rs_ball["b_zone_id"]][$rs["b_id"]]["bet_1h_hdc"]+$rs["b_total"];
	}else if($rs["play_type"]==13 || $rs["play_type"]==14){
		$arr_ball[$rs_ball["b_zone_id"]][$rs["b_id"]]["bet_1h_goal"] = $arr_ball[$rs_ball["b_zone_id"]][$rs["b_id"]]["bet_1h_goal"]+$rs["b_total"];
	}
  }
  $list = "";
  foreach ($arr_lg as $key => $value) {
  	$list .= "<tr><td colspan='6' bgcolor='#F0F0F0'>&nbsp;&nbsp;<strong>".$value."</strong></td></tr>";
  	foreach ($arr_ball[$key] as $keyx => $valuex) {
  		$rs_ball = $valuex["ball"];
  		$list .= "<tr data-value='{'league':'".$value."','thome':'".($rs_ball["b_name_1_th"]!="" ? $rs_ball["b_name_1_th"] : $rs_ball["b_name_1_en"])."','taway':'".($rs_ball["b_name_2_th"]!="" ? $rs_ball["b_name_2_th"] : $rs_ball["b_name_2_en"])." ','bill_type':'T','score':'0:0','matchid':'".$keyx."'}'> 	  <td align='center'> ".date("H:s" , $rs_ball["b_date_play"])." </td> 
					<td align='left'>    
							<font ".($rs_ball["b_big"]==1 ? "color='#cc0000'" : "").">".($rs_ball["b_name_1_th"]!="" ? $rs_ball["b_name_1_th"] : $rs_ball["b_name_1_en"])."</font> <strong>-vs-</strong> <font ".($rs_ball["b_big"]==2 ? "color='#cc0000'" : "").">".($rs_ball["b_name_2_th"]!="" ? $rs_ball["b_name_2_th"] : $rs_ball["b_name_2_en"])." </font> 
					</td>
					<td align='right' class='digits1 cur' ".($valuex["bet_hdc"]>0 ? "style='color:#cc0000'" : "")." onclick=\"showScore(this,'HDP','F');\">".number_format($valuex["bet_hdc"])."</td>
					<td align='right' class='digits1 cur' ".($valuex["bet_goal"]>0 ? "style='color:#cc0000'" : "")." onclick=\"showScore(this,'OU','F');\">".number_format($valuex["bet_goal"])."</td> 
					<td align='right' class='digits1 cur' ".($valuex["bet_1h_hdc"]>0 ? "style='color:#cc0000'" : "")." onclick=\"showScore(this,'HDP','H');\">".number_format($valuex["bet_1h_hdc"])."</td>
					<td align='right' class='digits1 cur' ".($valuex["bet_1h_goal"]>0 ? "style='color:#cc0000'" : "")." onclick=\"showScore(this,'OU','H');\">".number_format($valuex["bet_1h_goal"])."</td>
				</tr>";
  	}
  }

/*$list = 		"<tr>                
					<td colspan='6' bgcolor='#F0F0F0'>&nbsp;&nbsp;<strong>อินเตอร์เนชั่นแนล ฟุตบอล แชมเปี้ยนชิพ (จีน)</strong></td>
				</tr>  

				<tr data-value='{'league':'อินเตอร์เนชั่นแนล ฟุตบอล แชมเปี้ยนชิพ (จีน)','thome':'จีน','taway':'อุซเบกิสถาน ','bill_type':'T','score':'0:0','matchid':'29578787'}'> 	  <td align='center'> 14:30 </td> 
					<td align='left'>    
							<font>จีน</font> <strong>-vs-</strong> <font color='#cc0000' >อุซเบกิสถาน  </font> 
					</td>
					<td align='right' class='digits1 cur'  onclick=\"showScore(this,'HDP','F');\"></td>
					<td align='right' class='digits1 cur' style='color:#cc0000' onclick=\"showScore(this,'OU','F');\">-2,610</td> 
					<td align='right' class='digits1 cur'  onclick=\"showScore(this,'HDP','H');\"></td>
					<td align='right' class='digits1 cur'  onclick=\"showScore(this,'OU','H');\"></td>
				</tr>


				<tr> 
					<td colspan='6' bgcolor='#F0F0F0'>&nbsp;&nbsp;<strong>ยูฟ่า ยูโร 2020 รอบคัดเลือก</strong></td>
				</tr>                
					ยูฟ่า ยูโร 2020 รอบคัดเลือก        
				<tr data-value='{'league':'ยูฟ่า ยูโร 2020 รอบคัดเลือก','thome':'มอนเตเนโกร','taway':'อังกฤษ','bill_type':'T','score':'0:0','matchid':'29550658'}'>            
					<td align='center'> 02:45 </td>
					<td align='left'> 
						<font>มอนเตเนโกร</font> <strong>-vs-</strong> <font color='#cc0000' >อังกฤษ </font>
					</td>
					<td align='right' class='digits1 cur' style='color:#cc0000' onclick=\"showScore(this,'HDP','F');\">87</td>
					<td align='right' class='digits1 cur'  onclick=\"showScore(this,'OU','F');\"></td> 
					<td align='right' class='digits1 cur'  onclick=\"showScore(this,'HDP','H');\"></td>
					<td align='right' class='digits1 cur'  onclick=\"showScore(this,'OU','H');\"></td> 
				</tr> 
				<script type='text/javascript'> 
		
				function nFormatSoccer(num){  
					 num = num.toString();        
					 var re = /(-?\d+)(\d{3})/;        
					 while (re.test(num)){            
					 	num = num.replace(re, '$1,$2');        
					 	}       
					  return num;    
				}    // $('.digits').digits();
		        $('.digits1').each(function() {
		        	var valNum = textToNum($(this).text()); 
		        	if(valNum < 0){ $(this).text(nFormatSoccer(Math.abs(valNum)));        
		        	}    
		        });
		        </script>";*/

		        $list .= "<script type='text/javascript'> 
		
				function nFormatSoccer(num){  
					 num = num.toString();        
					 var re = /(-?\d+)(\d{3})/;        
					 while (re.test(num)){            
					 	num = num.replace(re, '$1,$2');        
					 	}       
					  return num;    
				}    // $('.digits').digits();
		        $('.digits1').each(function() {
		        	var valNum = textToNum($(this).text()); 
		        	if(valNum < 0){ $(this).text(nFormatSoccer(Math.abs(valNum)));        
		        	}    
		        });
		        </script>";

$data = array(
    'status' => true,
    'list' => $list,
);


echo json_encode($data);

 ?>