<?php 
if($r_level==1){
$mem_share="  ( b_myshare_1 + b_myshare_2 + b_myshare_3 + b_myshare_4 + b_myshare_5 + b_myshare_6 + b_myshare_7 + b_share_m ) ";
$keep_share=" 100 - ( b_myshare_1 + b_myshare_2 + b_myshare_3 + b_myshare_4 + b_myshare_5 + b_myshare_6 + b_myshare_7 + b_share_m ) ";

###############AF
$afm=" (  b_myshare_1 + b_myshare_2 + b_myshare_3 + b_myshare_4 + b_myshare_5 + b_myshare_6 + b_myshare_7 + b_share_m ) ";
$afsa=" 100 - ( b_myshare_1 + b_myshare_2 + b_myshare_3 + b_myshare_4 + b_myshare_5 + b_myshare_6 + b_myshare_7 + b_share_m ) ";

}elseif($r_level==2){
$mem_share=" 100 - ( b_myshare_2 + b_myshare_3 + b_myshare_4 + b_myshare_5 + b_myshare_6 + b_myshare_7 + b_share_m ) ";
$keep_share=" 100 - ( b_myshare_1 + b_myshare_2 + b_myshare_3 + b_myshare_4 + b_myshare_5 + b_myshare_6 + b_myshare_7 + b_share_m ) ";

###############AF
$afm=" ( b_myshare_1 + b_myshare_2 + b_myshare_3 + b_myshare_4 + b_myshare_5 + b_myshare_6 + b_myshare_7 + b_share_m ) ";
$afsa=" 100 - ( b_myshare_1 + b_myshare_2 + b_myshare_3 + b_myshare_4 + b_myshare_5 + b_myshare_6 + b_myshare_7 + b_share_m ) ";

}elseif($r_level==3){
$mem_share=" 100 - ( b_myshare_3 + b_myshare_4 + b_myshare_5 + b_myshare_6 + b_myshare_7 + b_share_m ) ";
$keep_share=" 100 - ( b_myshare_2 + b_myshare_3 + b_myshare_4 + b_myshare_5 + b_myshare_6 + b_myshare_7 + b_share_m ) ";

###############AF
$afm=" ( b_myshare_3 + b_myshare_4 + b_myshare_5 + b_myshare_6 + b_myshare_7 + b_share_m ) ";
$afsa=" 100 - ( b_myshare_2 + b_myshare_3 + b_myshare_4 + b_myshare_5 + b_myshare_6 + b_myshare_7 + b_share_m ) ";
	
}elseif($r_level==4){
$mem_share=" 100 - ( b_myshare_4 + b_myshare_5 + b_myshare_6 + b_myshare_7 + b_share_m ) ";
$keep_share=" 100 - ( b_myshare_3 + b_myshare_4 + b_myshare_5 + b_myshare_6 + b_myshare_7 + b_share_m ) ";

###############AF
$afm=" ( b_myshare_4 + b_myshare_5 + b_myshare_6 + b_myshare_7 + b_share_m ) ";
$afsa=" 100 - ( b_myshare_3 + b_myshare_4 + b_myshare_5 + b_myshare_6 + b_myshare_7 + b_share_m ) ";
	
}elseif($r_level==5){
$mem_share=" 100 - ( b_myshare_5 + b_myshare_6 + b_myshare_7 + b_share_m ) ";
$keep_share=" 100 - ( b_myshare_4 + b_myshare_5 + b_myshare_6 + b_myshare_7 + b_share_m ) ";

###############AF
$afm=" ( b_myshare_5 + b_myshare_6 + b_myshare_7 + b_share_m ) ";
$afsa=" 100 - ( b_myshare_4 + b_myshare_5 + b_myshare_6 + b_myshare_7 + b_share_m ) ";
	
}elseif($r_level==6){
$mem_share=" 100 - ( b_myshare_6 + b_myshare_7 + b_share_m ) ";
$keep_share=" 100 - ( b_myshare_5 + b_myshare_6 + b_myshare_7 + b_share_m ) ";

###############AF
$afm=" ( b_myshare_6 + b_myshare_7 + b_share_m ) ";
$afsa=" 100 - ( b_myshare_5 + b_myshare_6 + b_myshare_7 + b_share_m ) ";
	
}elseif($r_level==7){
$mem_share=" 100 - ( b_myshare_7 + b_share_m ) ";
$keep_share=" 100 - ( b_myshare_6 + b_myshare_7 + b_share_m ) ";

###############AF
$afm=" ( b_myshare_7 + b_share_m ) ";
$afsa=" 100 - ( b_myshare_6 + b_myshare_7 + b_share_m ) ";
	
}elseif($r_level==8){
$mem_share=" 100 - ( b_share_m ) ";
$keep_share=" 100 - ( b_myshare_7 + b_share_m ) ";

###############AF
$afm=" ( b_share_m ) ";
$afsa=" 100 - ( b_myshare_7 + b_share_m ) ";

}elseif($r_level==9){
$mem_share="  ";
$keep_share=" 100 - ( b_share_m ) ";

###############AF
$afm="  ";
$afsa=" 100 - ( b_share_m ) ";

		}

?>


