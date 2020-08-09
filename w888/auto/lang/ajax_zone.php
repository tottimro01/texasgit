<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<?php
require('conn_lang.php');

$_POST[en]=trim($_POST[en]);
$_POST[th]=trim($_POST[th]);
$_POST[vn]=trim($_POST[vn]);
$_POST[mm]=trim($_POST[mm]);
$_POST[km]=trim($_POST[km]);
$_POST[la]=trim($_POST[la]);
$_POST[en]=trim($_POST[en]);


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
	
$sql="update bom_tb_lang_zone set th='$_POST[th]'    where en='$_POST[en]'; ";
sql_query($sql);
$sql="update bom_tb_lang_zone set vn='$_POST[vn]'    where en='$_POST[en]'; ";
sql_query($sql);
$sql="update bom_tb_lang_zone set mm='$_POST[mm]'    where en='$_POST[en]'; ";
sql_query($sql);
$sql="update bom_tb_lang_zone set km='$_POST[km]'    where en='$_POST[en]'; ";
sql_query($sql);
$sql="update bom_tb_lang_zone set la='$_POST[la]'    where en='$_POST[en]'; ";
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
$sql="update bom_tb_lang_team set th='$_POST[th]'    where en='$_POST[en]'; ";
sql_query($sql);
$sql="update bom_tb_lang_team set vn='$_POST[vn]'    where en='$_POST[en]'; ";
sql_query($sql);
$sql="update bom_tb_lang_team set mm='$_POST[mm]'    where en='$_POST[en]'; ";
sql_query($sql);
$sql="update bom_tb_lang_team set km='$_POST[km]'    where en='$_POST[en]'; ";
sql_query($sql);
$sql="update bom_tb_lang_team set la='$_POST[la]'    where en='$_POST[en]'; ";
sql_query($sql);	
	
	
}

	
	
}
	
?>