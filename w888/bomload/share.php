<?php ob_start(); if (!isset($_SESSION)) { session_start(); } ?>
<?php
require('../inc/conn.php');
require('../inc/function.php');



##################JSON Lotto Config
$sql="select * from bom_tb_member where  1 order by m_id asc ";
$re=sql_query($sql);
while($rem=sql_fetch($re)){




######################################################
	$exf1=@explode(',',$rem[m_lotto_force_super]);
	$exf2=@explode(',',$rem[m_lotto_force_senior]);
	$exf3=@explode(',',$rem[m_lotto_force_master]);
	$exf4=@explode(',',$rem[m_lotto_force_agent]);
	
	
	$exs1=@explode(',',$rem[m_lotto_myshare_super]);
	$exs2=@explode(',',$rem[m_lotto_myshare_senior]);
	$exs3=@explode(',',$rem[m_lotto_myshare_master]);
	$exs4=@explode(',',$rem[m_lotto_myshare_agent]);
	
	
for($xx=1;$xx<=count($lot_type["th"]);$xx++){
	
############################Agent
if($exf4[$xx]>=$exs4[$xx]){
	$my4[$xx]=intval($exf4[$xx]);
	}else{
	$my4[$xx]=intval($exs4[$xx]);	
		}
		
	###########################Master	
if($exf3[$xx]>=($exs3[$xx]+$my4[$xx])){
	
		$my3[$xx]=intval($exf3[$xx]-($my4[$xx]));	
	
	}else{
		
	$my3[$xx]=intval($exs3[$xx]);	
	
		}	
		
		###########################Senoir
if($exf2[$xx]>=($exs2[$xx]+$my3[$xx]+$my4[$xx])){
	
		$my2[$xx]=intval($exf2[$xx]-($my3[$xx]+$my4[$xx]));	
	
	}else{
		
	$my2[$xx]=intval($exs2[$xx]);	
	
		}		
		
		
				###########################Senoir
if($exf1[$xx]>=($exs1[$xx]+$my2[$xx]+$my3[$xx]+$my4[$xx])){
	
		$my1[$xx]=intval($exf1[$xx]-($my2[$xx]+$my3[$xx]+$my4[$xx]));	
	
	}else{
		
	$my1[$xx]=intval($exs1[$xx]);	
	
		}		
#		16-03-2016
#  ,		b_myshare_3='".$my3[$xx]."',	 b_share_m='".$my4[$xx]."' 		
$sql=" update bom_tb_lotto_bill_play set  b_myshare_1='".$my1[$xx]."',	b_myshare_2='".$my2[$xx]."'   where m_id='$rem[m_id]' and 	lot_type=$xx and b_date='$_GET[d]'";		
	sql_query($sql);
	echo $sql.'<br>';
	}#for($xx=1;$xx<=count($lot_type["th"]);$xx++){


}
?>