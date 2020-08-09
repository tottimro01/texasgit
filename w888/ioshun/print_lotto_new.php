<?php
@header ("Content-type: image/png");

require('../inc/conn.php');
require('../inc/function.php');
require("../lang/th.php");


$lot_txt= array(1 =>"หวยหุ้น","สาขา","ผู้ขาย","รหัส","รอบ","วันที่","ยอดรวม","บาท","รหัสบิล","เวลา","หวยหุ้น"); 
$lot_rob= array(1 =>"เช้า","เที่ยง","บ่าย","เย็น"); 


$font = 'font/cordia.ttf';
$font_b = 'font/cordiab.ttf';
 
$initialX = '10';
$initialY = '40';
$increaseY = '31';
$fontSize = '28';
$fontSize_1 = $fontSize-5;



if($_GET[id]==""){$_GET[id]=1;}
$bill_id=$_GET[id];
 
 
$sql="select * from bom_tb_lotto_hun_bill where bill_id='$bill_id' ";
$ree=sql_array($sql);


$c_num=array();
 $xss=0;
$sql="select * from  bom_tb_lotto_hun_bill_play  where bill_id='$ree[bill_id]'   and b_accept=1     order by play_id asc";
$re=sql_query($sql);
while($rs=sql_fetch($re)){	 
	$ex_loti = explode("," , $rs["lot_i"]);
   foreach ($ex_loti as &$value) {

if($value==""){
   		continue;
   	}
   	
    $value = substr($value , 1);

 #######################################

$kkk=""; 

 ####################################### 

$d[$xss][0] =_dt($rs[play_number]);

#$d[$xss][1] = '['.$lot_type[$rs[lot_type]].'] '.$lot_zone[$rs[lot_zone]].' '.$kkk;
$d[$xss][1] = '[i'.$value.'] ['.$lot_type["th"][$rs[lot_type]].'] '.$kkk;
$d[$xss][2] = number_format($rs[b_total]);
$c_num[]=$xss;
 $xss++; } }

$abig=explode("*",$ree[r_agent_id]);

$sql="select * from bom_tb_agent where r_id='$abig[4]'";
$re_r=sql_array($sql);
	 
$sql="select *  from bom_tb_member where m_id='$ree[m_id]'";
$re_m=sql_array($sql);

$sql="select *  from bom_tb_lotto_hun_ok where ok_id='$ree[ok_id]' ";
$re_b=sql_array($sql);

$numstep=count($c_num);


//$im     = imagecreatefrompng("bg_lot/bg-$numstep.png");	
$im  = imagecreatetruecolor(380, ($numstep*31)+320);		
//$bgc = imagecolorallocate($im, 255, 255, 255);

$black = imagecolorallocate($im, 0, 0, 0);
$white = imagecolorallocate($im, 255, 255, 255);
$red = imagecolorallocate($im, 255, 0, 0);
$green = imagecolorallocate($im, 0, 255, 0);
$purple = imagecolorallocate($im, 200, 0, 255);
$blue = imagecolorallocate($im, 64, 64, 255);
$orange = imagecolorallocate($im, 255, 100, 0);
$yellow = imagecolorallocate($im, 255, 255, 0);

$tc  = imagecolorallocate($im, 0, 0, 0);



// imageinterlace ($im, 1);


imagefilledrectangle($im, 0, 0, 380, ($numstep*31)+320, $white);


 #'.$lot_txt[1].'

$n_1 =$lot_txt[2].' : '.$re_r[r_name].' ['.$re_r[r_user].']';
$n_2 =$lot_txt[3].' : '.$re_m[m_name].' ['.$re_m[m_user].']';

 $line_1='.........................................................................';

$h_1 = $lot_txt[1].' '.$arr_zone[$ree[lot_zone]].' '.$lot_txt[4].' '.$bill_id;
$h_2 = _cvf($re_b[o_limit_time],5).' '.$lot_txt[5].''.$lot_rob[$ree[lot_rob]];
$h_3 = $lot_txt[6].' '._cvf($ree[b_timestam],4);


#$f_1a = 'ส่วนลด : '.number_format(0);  ຍອດສ່ຽງ
$f_1a = '';
$f_1b = $lot_txt[7].' : '.number_format($ree[b_total]).' '.$lot_txt[8];
#$f_1c = 'รวมจ่าย : '.number_format($ree[b_total]);
$f_1c = '';
#$f_1e = 'ผู้ซื้อ : '.$ree[b_name];
$f_1e = '';
$f_2 = $lot_txt[9];





#####################################################################
$x_c=_center($im , $fontSize,$font_b,$h_1);
imagettftext($im, $fontSize, 0,  $x_c[c]  , $initialY, $black, $font_b , $h_1);
#####################################################################
$x_c=_center($im , $fontSize,$font_b,$h_2);
imagettftext($im, $fontSize, 0, $x_c[c]  , $initialY+$increaseY, $black, $font_b, $h_2);
#####################################################################
$x_c=_center($im , $fontSize_1,$font,$h_3);
imagettftext($im, $fontSize_1, 0, $x_c[c] , $initialY+($increaseY*2), $black, $font, $h_3);

############################# เส้นรหัส#########################################
imageline($im,  $initialX , $initialY+5+($increaseY*2) , 370 ,  $initialY+5+($increaseY*2)  , $black);


####################สาขา#################################################
$x_c=_center($im , $fontSize,$font,$n_1);
imagettftext($im, $fontSize, 0, $x_c[c] , $initialY+($increaseY*3)  , $black, $font, $n_1);
#########################พนักงาน############################################
$x_c=_center($im , $fontSize,$font,$n_2);
imagettftext($im, $fontSize, 0, $x_c[c] , $initialY+($increaseY*4) , $black, $font, $n_2);


############################# เส้นรหัส#########################################
imageline($im,  $initialX , $initialY+5+($increaseY*4) , 370 ,  $initialY+5+($increaseY*4)  , $black);


#####################################################################
$bantud=5;

for($xx=0;$xx<count($c_num);$xx++){
 _txt($im, $fontSize, $initialX, $initialY , $increaseY , $black, $font , $font_b , $line_1 , $d[$xx][0] , $d[$xx][1] , $d[$xx][2] , $bantud++ );
}



$bantud++;
$ban_3=$bantud++;
#####################################################################
imagettftext($im, $fontSize, 0, $initialX, $initialY+($increaseY*$ban_3), $black, $font_b, $f_1a);

$x_c=_center($im , $fontSize,$font_b,$f_1b);
imagettftext($im, $fontSize, 0, ($x_c[imgw]-($initialX*2))-$x_c[txtw]  , $initialY+($increaseY*$ban_3), $black, $font_b, $f_1b);

$ban_1=$bantud++;
$x_c=_center($im , $fontSize,$font_b,$f_1c);
imagettftext($im, $fontSize, 0, ($x_c[imgw]-($initialX*2))-$x_c[txtw]  , $initialY+($increaseY*$ban_1), $black, $font_b, $f_1c);
########################ผู้ซื้อ
imagettftext($im, $fontSize_1, 0, $initialX, $initialY+($increaseY*$ban_1), $black, $font, $f_1e);

#####################################################################
##### เส้น
imagettftext($im, $fontSize, 0, $initialX, $initialY+5+($increaseY*$ban_1), $black, $font, $line_1);
imageline($im,  $initialX , $initialY+11+($increaseY*$ban_1) , 370 ,  $initialY+11+($increaseY*$ban_1)  , $black);

#####################################################################
$x_c=_center($im , $fontSize_1,$font,$f_2);
imagettftext($im, $fontSize_1, 0, $x_c[c] , $initialY+($increaseY*(($bantud++)+0.5)), $black, $font, $f_2 );




# imagepng($im, $numstep.'.png');
imagepng($im);
imagedestroy($im);




function _center($im , $fontSize , $font , $h_1){
################ ตรงกลาง
$image_width = imagesx($im);   # กว้าง
$image_height = imagesy($im); # ยาว
$text_box = imagettfbbox($fontSize,0,$font,$h_1);
// Get your Text Width and Height
$text_width = $text_box[2]-$text_box[0];
$text_height = $text_box[3]-$text_box[1];
// Calculate coordinates of the text
$x_c = ($image_width/2) - ($text_width/2);
$y_c = ($image_height/2) - ($text_height/2);
################ ตรงกลาง
return array("c"=>$x_c, "imgw"=>$image_width   , "txtw"=>$text_width );
}





function _txt($im, $fontSize, $initialX, $initialY , $increaseY , $black, $font, $font_b, $line_1 , $d_1a , $d_1b , $d_1c , $bun   ){
	
imagettftext($im, $fontSize, 0, $initialX, $initialY+($increaseY*$bun), $black, $font_b, '*'.$d_1a.'*');

imagettftext($im, $fontSize, 0, $initialX+60, $initialY+($increaseY*$bun), $black, $font, $d_1b);

$x_c=_center($im , $fontSize,$font_b , '--'.$d_1c.'--');
imagettftext($im, $fontSize, 0, ($x_c[imgw]-($initialX))-$x_c[txtw]    , $initialY+($increaseY*$bun), $black, $font_b, '--'.$d_1c.'--');
 imagettftext($im, $fontSize, 0, $initialX, $initialY+5+($increaseY*$bun), $black, $font, $line_1);
 
}
?>