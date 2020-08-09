<?php
if($_lv==1){
###############AF
$keep_share=" ( b_myshare_2 + b_myshare_3 + b_myshare_4 + b_myshare_5 + b_myshare_6 + b_myshare_7 + b_share_m ) ";

}elseif($_lv==2){
###############AF
$keep_share=" ( b_myshare_3 + b_myshare_4 + b_myshare_5 + b_myshare_6 + b_myshare_7 + b_share_m ) ";

}elseif($_lv==3){
###############AF
$keep_share=" ( b_myshare_4 + b_myshare_5 + b_myshare_6 + b_myshare_7 + b_share_m ) ";

}elseif($_lv==4){
###############AF
$keep_share=" ( b_myshare_5 + b_myshare_6 + b_myshare_7 + b_share_m ) ";

}elseif($_lv==5){
###############AF
$keep_share=" ( b_myshare_6 + b_myshare_7 + b_share_m ) ";

}elseif($_lv==6){
###############AF
$keep_share=" ( b_myshare_7 + b_share_m ) ";

}elseif($_lv==7){
$keep_share=" ( b_share_m ) ";

}

?>