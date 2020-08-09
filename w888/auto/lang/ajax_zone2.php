<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<?php
require('conn_lang.php');


if($_POST[by]=="zone"){

if($_POST[add]=="th"){
$sql="update bom_tb_lang_zone set th='$_POST[th]'    where en='$_POST[en]'; ";
sql_query($sql);
}elseif($_POST[add]=="vn"){
$sql="update bom_tb_lang_zone set vn='$_POST[vn]'    where en='$_POST[en]'; ";	
sql_query($sql);
}elseif($_POST[add]=="mm"){
 $sql="update bom_tb_lang_zone set mm='$_POST[mm]'    where en='$_POST[en]'; ";	
 sql_query($sql);
}elseif($_POST[add]=="km"){
$sql="update bom_tb_lang_zone set km='$_POST[km]'    where en='$_POST[en]'; ";
sql_query($sql);
}elseif($_POST[add]=="la"){
$sql="update bom_tb_lang_zone set la='$_POST[la]'    where en='$_POST[en]'; ";	
sql_query($sql);
}elseif($_POST[add]=="en"){
$sql="update bom_tb_lang_zone set en='$_POST[en]'    where th='$_POST[th]'; ";	
sql_query($sql);

}elseif($_POST[add]=="all"){
$sql="update bom_tb_lang_zone set en='$_POST[en]'    where th='$_POST[th]'; ";
sql_query($sql);
$sql="update bom_tb_lang_zone set vn='$_POST[vn]'    where th='$_POST[th]'; ";
sql_query($sql);
$sql="update bom_tb_lang_zone set mm='$_POST[mm]'    where th='$_POST[th]'; ";
sql_query($sql);
$sql="update bom_tb_lang_zone set km='$_POST[km]'    where th='$_POST[th]'; ";
sql_query($sql);
$sql="update bom_tb_lang_zone set la='$_POST[la]'    where th='$_POST[th]'; ";
sql_query($sql);	

$sql="update bom_tb_data_football_single set b_zone='$_POST[en]'    where b_zone='$_POST[th]' and b_sport=2; ";
sql_query($sql);	

$sql="update bom_tb_data_football_zone set z_zone='$_POST[en]'    where z_zone='$_POST[th]' and z_sport=2; ";
sql_query($sql);	
$sql="update bom_tb_data_football_step set b_zone='$_POST[en]'    where b_zone='$_POST[th]' and b_sport=2; ";
sql_query($sql);	
	
	
}


}












if($_POST[by]=="team"){
	
	
	if($_POST[add]=="th"){
$sql="update bom_tb_lang_team set th='$_POST[th]'    where en='$_POST[en]'; ";
sql_query($sql);
}elseif($_POST[add]=="vn"){
$sql="update bom_tb_lang_team set vn='$_POST[vn]'    where en='$_POST[en]'; ";	
sql_query($sql);
}elseif($_POST[add]=="mm"){
 $sql="update bom_tb_lang_team set mm='$_POST[mm]'    where en='$_POST[en]'; ";	
 sql_query($sql);
}elseif($_POST[add]=="km"){
$sql="update bom_tb_lang_team set km='$_POST[km]'    where en='$_POST[en]'; ";
sql_query($sql);
}elseif($_POST[add]=="la"){
$sql="update bom_tb_lang_team set la='$_POST[la]'    where en='$_POST[en]'; ";	
sql_query($sql);
}elseif($_POST[add]=="en"){
$sql="update bom_tb_lang_team set en='$_POST[en]'    where th='$_POST[th]'; ";	
sql_query($sql);

}elseif($_POST[add]=="all"){
$sql="update bom_tb_lang_team set en='$_POST[en]'    where th='$_POST[th]'; ";
sql_query($sql);
$sql="update bom_tb_lang_team set vn='$_POST[vn]'    where th='$_POST[th]'; ";
sql_query($sql);
$sql="update bom_tb_lang_team set mm='$_POST[mm]'    where th='$_POST[th]'; ";
sql_query($sql);
$sql="update bom_tb_lang_team set km='$_POST[km]'    where th='$_POST[th]'; ";
sql_query($sql);
$sql="update bom_tb_lang_team set la='$_POST[la]'    where th='$_POST[th]'; ";
sql_query($sql);	

$sql="update bom_tb_data_football_single set b_name_1='$_POST[en]'    where b_name_1='$_POST[th]' and b_sport=2; ";
sql_query($sql);	
$sql="update bom_tb_data_football_single set b_name_2='$_POST[en]'    where b_name_2='$_POST[th]' and b_sport=2; ";
sql_query($sql);	

$sql="update bom_tb_data_football_step set b_name_1='$_POST[en]'    where b_name_1='$_POST[th]' and b_sport=2; ";
sql_query($sql);	
$sql="update bom_tb_data_football_step set b_name_2='$_POST[en]'    where b_name_2='$_POST[th]' and b_sport=2; ";
sql_query($sql);	

$x_th1=$_POST[th].' (ครบยก)';
$x_en1=$_POST[en].' (Fully)';

$x_th2=$_POST[th].' (ไม่ครบยก)';
$x_en2=$_POST[en].' (KnockOut)';


$sql="update bom_tb_data_football_single set b_name_1='$x_en1'    where b_name_1='$x_th1' and b_sport=2; ";
sql_query($sql);	
$sql="update bom_tb_data_football_single set b_name_2='$x_en1'    where b_name_2='$x_th1' and b_sport=2; ";
sql_query($sql);	

$sql="update bom_tb_data_football_single set b_name_1='$x_en2'    where b_name_1='$x_th2' and b_sport=2; ";
sql_query($sql);	
$sql="update bom_tb_data_football_single set b_name_2='$x_en2'    where b_name_2='$x_th2' and b_sport=2; ";
sql_query($sql);	

$sql="update bom_tb_data_football_step set b_name_1='$x_en1'    where b_name_1='$x_th1' and b_sport=2; ";
sql_query($sql);	
$sql="update bom_tb_data_football_step set b_name_2='$x_en1'    where b_name_2='$x_th1' and b_sport=2; ";
sql_query($sql);	
$sql="update bom_tb_data_football_step set b_name_1='$x_en2'    where b_name_1='$x_th2' and b_sport=2; ";
sql_query($sql);	
$sql="update bom_tb_data_football_step set b_name_2='$x_en2'    where b_name_2='$x_th2' and b_sport=2; ";
sql_query($sql);	


$x_th1=$_POST[th].' (Fully)';
$x_en1=$_POST[en].' (Fully)';

$x_th2=$_POST[th].' (KnockOut)';
$x_en2=$_POST[en].' (KnockOut)';


$sql="update bom_tb_data_football_single set b_name_1='$x_en1'    where b_name_1='$x_th1' and b_sport=2; ";
sql_query($sql);	
$sql="update bom_tb_data_football_single set b_name_2='$x_en1'    where b_name_2='$x_th1' and b_sport=2; ";
sql_query($sql);	

$sql="update bom_tb_data_football_single set b_name_1='$x_en2'    where b_name_1='$x_th2' and b_sport=2; ";
sql_query($sql);	
$sql="update bom_tb_data_football_single set b_name_2='$x_en2'    where b_name_2='$x_th2' and b_sport=2; ";
sql_query($sql);	

$sql="update bom_tb_data_football_step set b_name_1='$x_en1'    where b_name_1='$x_th1' and b_sport=2; ";
sql_query($sql);	
$sql="update bom_tb_data_football_step set b_name_2='$x_en1'    where b_name_2='$x_th1' and b_sport=2; ";
sql_query($sql);	

$sql="update bom_tb_data_football_step set b_name_1='$x_en2'    where b_name_1='$x_th2' and b_sport=2; ";
sql_query($sql);	
$sql="update bom_tb_data_football_step set b_name_2='$x_en2'    where b_name_2='$x_th2' and b_sport=2; ";
sql_query($sql);	




	
	
}

	
	
}
	
?>Save