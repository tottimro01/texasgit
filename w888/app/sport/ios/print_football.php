<?php
 @header ("Content-type: image/png");

require('../inc/conn_dd.php');

if($_GET[id]==""){$_GET[id]=1;}
$barcode=$_GET[id];

$sql="select * from bom_tb_football_bill where bill_id='$barcode' ";
$ree=sql_array($sql);



############1#############
$url_file=$server_js."txt/json/agent/".$ree[r_id].".json";	
$d_js = file_get_contents2($url_file);
$re_r = json_decode($d_js, true);

############1#############	
############1#############
$url_file=$server_js."txt/json/member/".$ree[m_id].".json";	
$d_js = file_get_contents2($url_file);
$re_m = json_decode($d_js, true);
############1#############	


$width = 380;
$numstep=$ree[b_numstep];

if($_GET["paper"]==3){
	$ww = 575;
	$ww2 = 520;
	$ww3 = 565;
	$fontSize = '32';
	$increaseY = '33';
	$row_id = 8;
	$hp=70;
	$initialX = '10';
	$initialY = '40';
	$x_rs = 7;
	$x_rs2 = 12;
	$y_rs = 10;
}else{
	$ww = 380;
	$ww2 = 270;
	$ww3 = 370;
	$fontSize = '22';
	$increaseY = '23';
	$row_id = 8;
	$hp=45;
	$initialX = '10';
	$initialY = '40';
	$x_rs = 0;
	$x_rs2 = 0;
	$y_rs = 0;
}
		
$im  = imagecreatetruecolor($ww, ($numstep*$increaseY)+$ww2);	
$black = imagecolorallocate($im, 0, 0, 0);
$white = imagecolorallocate($im, 255, 255, 255);
$red = imagecolorallocate($im, 255, 0, 0);
$green = imagecolorallocate($im, 0, 255, 0);
$purple = imagecolorallocate($im, 200, 0, 255);
$blue = imagecolorallocate($im, 64, 64, 255);
$orange = imagecolorallocate($im, 255, 100, 0);
$yellow = imagecolorallocate($im, 255, 255, 0);
$tc  = imagecolorallocate($im, 0, 0, 0);		
imagefilledrectangle($im, 0, 0, $ww, ($numstep*$increaseY)+$ww2, $white);

$font = 'font/cordia.ttf';
$font_b = 'font/cordiab.ttf';
 




$fontSize1 = $fontSize-3;
$fontSize2 = $fontSize-6;


$n_1 = 'สาขา : '.$re_r[r_name].' ['.$re_r[r_user].']';
$n_2 = 'พนักงาน : '.$re_m[m_name].' ['.$re_m[m_user].']';

 $line_1='........................................................................................................................';

$h_1 = 'รหัสบิล '.$barcode;
$h_2 = 'วันที่ '._cvf($ree[b_timestam],4);
$h_3 = 'ยอดเดิมพัน '.number_format($ree[b_total]).' บาท';

$ee=explode("+",$ree[b_code]);
for($xx=0;$xx<count($ee);$xx++){
$d[$xx][0] = $ee[$xx];	
	}


# $sql="select *,a.b_big as ab_big from bom_tb_football_bill_play a left join bom_tb_ball_list b on a.b_id=b.b_id and a.b_rob=b.b_rob   and a.b_add=b.b_add where a.bill_id='$ree[bill_id]'   group by play_id order by play_id asc";
 $sql="select * from bom_tb_football_bill_play  where bill_id='$ree[bill_id]'   group by play_id order by play_id asc";
  $re=sql_query($sql);
 $xss=0;  while($rs=sql_fetch($re)){	 
 
 
$url_file=$server_js."txt/json/score/".$rs[b_id].".json";	
$d_js=file_get_contents($url_file);
$reb = json_decode($d_js, true);
#$reb=$d_bet[$rs[b_id]];


	    if($rs[b_big]==1 and $rs[play_type]==1){
			$w1='<u class="cr"><b>[ ต่อ ] ';
			$w2='</b></u>';
			}elseif($rs[b_big]==2 and $rs[play_type]==2){
			$w1='<u class="cr"><b>[ ต่อ ] ';
			$w2='</b></u>';
			}elseif($rs[b_big]==2 and $rs[play_type]==1){
			$w1='<span class="cb">[ รอง ] ';
			$w2='</span>';
			}elseif($rs[b_big]==1 and $rs[play_type]==2){
			$w1='<span class="cb">[ รอง ] ';
			$w2='</span>';
			
			}elseif($rs[b_big]==1 and $rs[play_type]==11){
			$w1='<u class="cr"><b>[ ต่อ 1H ] ';
			$w2='</b></u>';
			}elseif($rs[b_big]==2 and $rs[play_type]==12){
			$w1='<u class="cr"><b>[ ต่อ 1H  ] ';
			$w2='</b></u>';
			}elseif($rs[b_big]==2 and $rs[play_type]==11){
			$w1='<span class="cb">[ รอง 1H ] ';
			$w2='</span>';
			}elseif($rs[b_big]==1 and $rs[play_type]==12){
			$w1='<span class="cb">[ รอง 1H ] ';
			$w2='</span>';
			
			}else{
			$w1='<span class="cb">[ รอง ] ';
			$w2='</span>';
				}	
			

			
			
		    if($rs[b_big]==1 and $rs[play_type]==1){
			$w1='ต่อ ';
			}elseif($rs[b_big]==2 and $rs[play_type]==2){
			$w1='ต่อ ';
			}elseif($rs[b_big]==2 and $rs[play_type]==1){
			$w1='รอง ';
            }elseif($rs[b_big]==1 and $rs[play_type]==2){
			$w1='รอง ';
			}elseif($rs[b_big]==1 and $rs[play_type]==11){
			$w1='ต่อ 1H ';
            }elseif($rs[b_big]==2 and $rs[play_type]==12){
			$w1='ต่อ 1H ';
			}elseif($rs[b_big]==2 and $rs[play_type]==11){
			$w1='รอง 1H ';
            }elseif($rs[b_big]==1 and $rs[play_type]==12){
			$w1='รอง 1H ';
			}else{
			$w1='รอง ';
				}	
				
			if($rs[play_type]==1){$tn="$reb[b_name_1]";}
			elseif($rs[play_type]==2){$tn="$reb[b_name_2]";} 
			elseif($rs[play_type]==3){ $w1='สูง '; $tn="$reb[b_name_1]"; } 
			elseif($rs[play_type]==4){  $w1='ต่ำ '; $tn="$reb[b_name_1]"; } 
			elseif($rs[play_type]==11){$tn="$reb[b_name_1]";}
			elseif($rs[play_type]==12){$tn="$reb[b_name_2]";} 
			elseif($rs[play_type]==13){ $w1='สูง 1H '; $tn="$reb[b_name_1]"; } 
			elseif($rs[play_type]==14){  $w1='ต่ำ 1H '; $tn="$reb[b_name_1]"; } 

$d[$xss][1] = '[ '.$rs[play_code].' ] [ '.$w1.' ] '.$tn;
$d[$xss][2] = '[ '._cg($rs[play_bet]).' ] [ '.number_format($rs[play_pay],2).' ]';

 $xss++;}


$f_1 = 'รวมสเต็ป '.$numstep;
$f_1a = 'ยอดเข้าเต็ม :  '.number_format($ree[b_total]*$ree[b_sum_pay]).'  บาท';
$f_2 = 'รหัสบิล';




/*
        $NarrowRatio = $initialX*2;
        $WideRatio = 55;
        $QuietRatio = 35;


        $nChars = (strlen($barcode)+2) * ((6 * $NarrowRatio) + (3 * $WideRatio) + ($QuietRatio));
        $Pixels = $width / $nChars;
        $NarrowBar = (int)(20 * $Pixels);
        $WideBar = (int)(55 * $Pixels);
        $QuietBar = (int)(35 * $Pixels);


        $ActualWidth = (($NarrowBar * 6) + ($WideBar*3) + $QuietBar) * (strlen ($barcode)+2);
        
        if (($NarrowBar == 0) || ($NarrowBar == $WideBar) || ($NarrowBar == $QuietBar) || ($WideBar == 0) || ($WideBar == $QuietBar) || ($QuietBar == 0))
        {
                imagestring ($im, 1, 0, 0, "Image is too small!", $black);
			   imagepng($im);
               imagedestroy($im);
                exit;
        }
        
        $CurrentBarX = (int)(($width - $ActualWidth) / 2)+0;
        $Color = $white;
        $BarcodeFull = "*".strtoupper ($barcode)."*";
        settype ($BarcodeFull, "string");
        

*/





#####################################################################
$x_c=_center($im , $fontSize,$font_b,$h_1);
imagettftext($im, $fontSize, 0,  $x_c[c]  ,$initialY , $black, $font_b , $h_1);
#####################################################################
$x_c=_center($im , $fontSize,$font,$h_2);
imagettftext($im, $fontSize, 0, $x_c[c]  , $initialY+$increaseY , $black, $font, $h_2);
#####################################################################
$x_c=_center($im , $fontSize,$font_b,$h_3);
imagettftext($im, $fontSize, 0, $x_c[c] , $initialY+($increaseY*2), $black, $font_b, $h_3);

####################สาขา#################################################
$x_c=_center($im , $fontSize,$font,$n_1);
imagettftext($im, $fontSize, 0, $x_c[c] , $initialY+($increaseY*3)  , $black, $font, $n_1);
#########################พนักงาน############################################
$x_c=_center($im , $fontSize,$font,$n_2);
imagettftext($im, $fontSize, 0, $x_c[c] , $initialY+($increaseY*4) , $black, $font, $n_2);




#####################################################################
##### เส้นรหัส
imageline($im,  $initialX , $initialY+5+($increaseY*4) , $ww3 ,  $initialY+5+($increaseY*4)  , $black);
if($numstep>$row_id){
	imageline($im,  $initialX , $initialY+7+($increaseY*6) , $ww3 ,  $initialY+7+($increaseY*6)  , $black);
}else{
imageline($im,  $initialX , $initialY+7+($increaseY*5) , $ww3 ,  $initialY+7+($increaseY*5)  , $black);
}
#####################################################################
$bantud=7;

for($xx=0;$xx<$numstep;$xx++){
# _txt($im, $fontSize, $initialX, $initialY , $increaseY , $black, $font , $line_1  , ($xx+1).'. '.$d[$xx][1] , $d[$xx][2] , $bantud++ );
	
	if($xx==0){
		$yss = 0;
	}else{
		$yss = $y_rs*$xx;
	}
	
 _txt($im, $fontSize1, $initialX, $initialY , $increaseY , $black, $font , $line_1  , $d[$xx][1] , $d[$xx][2] , $bantud++ , $yss );
	
	//imageline($im,  $initialX , $initialY+9+($increaseY*$ban_1) , $ww3 ,  $initialY+9+($increaseY*$ban_1)  , $black);
}



$bantud++;
$ban_1=$bantud++;
#####################################################################
imagettftext($im, $fontSize, 0, $initialX, ($initialY+($increaseY*$ban_1))+($y_rs*$numstep), $black, $font_b, $f_1);
$x_c=_center($im , $fontSize,$font_b,$f_1a);
imagettftext($im, $fontSize, 0, ($x_c[imgw]-($initialX*2))-$x_c[txtw]  , ($initialY+($increaseY*$ban_1))+($y_rs*$numstep), $black, $font_b, $f_1a);



#####################################################################
##### เส้น
imagettftext($im, $fontSize, 0, $initialX, ($initialY+5+($increaseY*$ban_1))+($y_rs*$numstep), $black, $font, $line_1);
imageline($im,  $initialX , ($initialY+9+($increaseY*$ban_1))+($y_rs*$numstep) , $ww3 ,  ($initialY+9+($increaseY*$ban_1))+($y_rs*$numstep)  , $black);

#####################################################################
$x_c=_center($im , $fontSize,$font,$f_2);
imagettftext($im, $fontSize, 0, $x_c[c] , ($initialY+($increaseY*(($bantud++)+0.5)))+($y_rs*$numstep), $black, $font, $f_2 );



/*
				################ ส่วนสูงบาร์โค๊ด
              $top_bar= $initialY+($increaseY*$bantud++) ;
			  $bantud++;
			   $bantud++;
			 $x_cb=_center($im , $fontSize,$font_b,$BarcodeFull);
			 imagettftext($im, $fontSize, 0,  $x_cb[c]  , $initialY+($increaseY*$bantud++) , $black, $font_b , $BarcodeFull);


        for ($i=0; $i<strlen($BarcodeFull); $i++)
        {
                $StripeCode = Code39 ($BarcodeFull[$i]);


                for ($n=0; $n < 9; $n++)
                {
                        if ($Color == $white) $Color = $black;
                        else $Color = $white;


                        switch ($StripeCode[$n])
                        {
                                case '0':
                                     imagefilledrectangle ($im, $CurrentBarX , $top_bar, $CurrentBarX+$NarrowBar , $top_bar+40  , $Color);
                                        $CurrentBarX += $NarrowBar;
                                        break;


                                case '1':
                                      imagefilledrectangle ($im, $CurrentBarX, $top_bar , $CurrentBarX+$WideBar, $top_bar+40  , $Color);
                                        $CurrentBarX += $WideBar;
                                        break;
                        }
                }


                $Color = $white;
              imagefilledrectangle ($im, $CurrentBarX , $top_bar , $CurrentBarX+$QuietBar , $top_bar+40 , $Color);
                $CurrentBarX += $QuietBar;
        }
		
		
		
		*/

###########################เส้นหนา
imagesetthickness($im, 2);
#############################รหัส





for($xx=0;$xx<$numstep;$xx++){
#############################################
if($xx<$row_id){	
$txt_xx=$d[$xx][0];
$x_c=_center_box($im , $fontSize2,$font_b, $txt_xx  );
imagettftext($im, $fontSize2, 0,  $x_c[c]+$initialX+2+($hp*$xx)+$x_rs2  ,   $initialY+($increaseY*5)    , $black, $font_b, $txt_xx   );
imagerectangle($im,  $initialX+($hp*$xx) ,   ($initialY+($increaseY*5)-15)-$x_rs   , ($hp*($xx+1))  , ( $initialY+($increaseY*5)+4 )  , $black);
}

if($xx>=$row_id){	
$txt_xx=$d[$xx][0];
$x_c=_center_box($im , $fontSize2,$font_b, $txt_xx  );
imagettftext($im, $fontSize2, 0,  $x_c[c]+$initialX+2+($hp*($xx-$row_id))+$x_rs2  ,   $initialY+($increaseY*6)    , $black, $font_b, $txt_xx   );
imagerectangle($im,  $initialX+($hp*($xx-$row_id)) ,   ($initialY+($increaseY*6)-15)-$x_rs   , ($hp*(($xx-$row_id)+1))  , ( $initialY+($increaseY*6)+4 )  , $black);
}
#############################################

}




//imagepng($im, $numstep.'.png');
imagepng($im);
imagedestroy($im);


//-----------------------------------------------------------------------------
// Returns the Code 3 of 9 value for a given ASCII character
//-----------------------------------------------------------------------------
/*
function Code39 ($Asc)
{
        switch ($Asc)
        {
                case ' ':
                        return "011000100";     
                case '$':
                        return "010101000";             
                case '%':
                        return "000101010"; 
                case '*':
                        return "010010100"; // * Start/Stop
                case '+':
                        return "010001010"; 
                case '|':
                        return "010000101"; 
                case '.':
                        return "110000100"; 
                case '/':
                        return "010100010"; 
				case '-':
						return "010000101";
                case '0':
                        return "000110100"; 
                case '1':
                        return "100100001"; 
                case '2':
                        return "001100001"; 
                case '3':
                        return "101100000"; 
                case '4':
                        return "000110001"; 
                case '5':
                        return "100110000"; 
                case '6':
                        return "001110000"; 
                case '7':
                        return "000100101"; 
                case '8':
                        return "100100100"; 
                case '9':
                        return "001100100"; 
                case 'A':
                        return "100001001"; 
                case 'B':
                        return "001001001"; 
                case 'C':
                        return "101001000";
                case 'D':
                        return "000011001";
                case 'E':
                        return "100011000";
                case 'F':
                        return "001011000";
                case 'G':
                        return "000001101";
                case 'H':
                        return "100001100";
                case 'I':
                        return "001001100";
                case 'J':
                        return "000011100";
                case 'K':
                        return "100000011";
                case 'L':
                        return "001000011";
                case 'M':
                        return "101000010";
                case 'N':
                        return "000010011";
                case 'O':
                        return "100010010";
                case 'P':
                        return "001010010";
                case 'Q':
                        return "000000111";
                case 'R':
                        return "100000110";
                case 'S':
                        return "001000110";
                case 'T':
                        return "000010110";
                case 'U':
                        return "110000001";
                case 'V':
                        return "011000001";
                case 'W':
                        return "111000000";
                case 'X':
                        return "010010001";
                case 'Y':
                        return "110010000";
                case 'Z':
                        return "011010000";
                default:
                        return "011000100"; 
        }
}

*/

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


function _center_box($im , $fontSize , $font , $h_1){
################ ตรงกลาง
$image_width = 30;   # กว้าง
$text_box = imagettfbbox($fontSize,0,$font,$h_1);
// Get your Text Width and Height
$text_width = $text_box[2]-$text_box[0];
// Calculate coordinates of the text
$x_c = ($image_width/2) - ($text_width/2);

################ ตรงกลาง
return array("c"=>$x_c);
}



function _txt($im, $fontSize, $initialX, $initialY , $increaseY , $black, $font, $line_1 , $d_1 , $d_1a , $bun , $y_rsp   ){
	
imagettftext($im, $fontSize, 0, $initialX, ($initialY+($increaseY*$bun))+$y_rsp, $black, $font, $d_1);
$x_c=_center($im , $fontSize,$font , $d_1a);
imagettftext($im, $fontSize, 0, (($x_c[imgw]-($initialX))-$x_c[txtw])    , ($initialY+($increaseY*$bun))+$y_rsp, $black, $font, $d_1a);
 imagettftext($im, $fontSize, 0, $initialX, ($initialY+5+($increaseY*$bun))+$y_rsp, $black, $font, $line_1);
 
}



###############################
function sql_query($sqlSelect){	

	global $hostname_conn;
	global $username_conn;
	global $password_conn;
	global $database_conn;

 $conn = @mysqli_connect($hostname_conn, $username_conn, $password_conn, $database_conn)or die("No connect");
 @mysqli_query("SET NAMES UTF8");


 $result =  @mysqli_query($conn, $sqlSelect);

@mysqli_close($conn);
	 
return $result;	
}
	
###############################
function sql_array($sqlSelect){	
	global $hostname_conn;
	global $username_conn;
	global $password_conn;
	global $database_conn;

 $conn = @mysqli_connect($hostname_conn, $username_conn, $password_conn, $database_conn)or die("No connect");
 @mysqli_query("SET NAMES UTF8");
 
	$result =  @mysqli_query($conn, $sqlSelect);
	$array= @mysqli_fetch_array($result); 
	
	@mysqli_close($conn);
	
	return $array;	
	}
	
###############################
function sql_num($sqlSelect){	

	global $hostname_conn;
	global $username_conn;
	global $password_conn;
	global $database_conn;

 $conn = @mysqli_connect($hostname_conn, $username_conn, $password_conn, $database_conn)or die("No connect");
 @mysqli_query("SET NAMES UTF8");
 
  
	$result = @mysqli_query($conn, $sqlSelect);
	$num=@mysqli_num_rows($result); 
	@mysqli_close($conn);
	return $num;	}
	
###############################
function sql_page($table,$id,$orderby,$Numpage){	

   $pg=$_GET[pg];
if(empty($pg)){$pg=1;}
				  
	global $hostname_conn;
	global $username_conn;
	global $password_conn;
	global $database_conn;

 $conn = @mysqli_connect($hostname_conn, $username_conn, $password_conn, $database_conn)or die("No connect");
 @mysqli_query("SET NAMES UTF8");
 
	$sql="select $id from $table";	
  
	$result =  @mysqli_query($conn,$sql);
	 $num_rows= @mysqli_num_rows($result);
	$totalpage= @ceil($num_rows/$Numpage);
	$goto=($pg-1)*$Numpage;	
	
$sql="select * from $table  order by $id $orderby LIMIT $goto,$Numpage";
$result =  @mysqli_query($conn,$sql);
@mysqli_close($conn);

	return array("page"=>$totalpage,"num"=>$num_rows,"re"=>$result);	
		}
	

###############################
function sql_fetch($result){	
	$rs = @mysqli_fetch_array($result);
	return $rs;	
	}

###############################
function sql_free($result){	
	@mysqli_free_result($result);
	}	

	
	function _cvf($strDate, $mode){
	$month_key = array("01", "02", "03", "04", "05", "06", "07", "08", "09", "10", "11", "12"); 
	$month_full = array("มกราคม", "กุมภาพันธ์", "มีนาคม", "เมษายน", "พฤษภาคม", "มิถุนายน", "กรกฎาคม", "สิงหาคม", "กันยายน", "ตุลาคม", "พฤศจิกายน", "ธันวาคม");

	$strDate=date("Y-m-d H:i:s",$strDate); // รูปแบบ Y-m-d H:i:s
	$dYear = substr($strDate,0,4);	
	$dMonth = substr($strDate,5,2);
	$dDay = substr($strDate,8,2);
	$dTime = substr($strDate,11,5); 
	$dsecon=substr($strDate,17,2); 
	
	if($dYear < 2550){ $dYear += 543; }
	
	switch($mode){
		case '4':			// 12 สิงหาคม พ.ศ. 2550 เวลา 12.30
			$thMonth = array_combine($month_key, $month_full);  
			$new_date = $dDay." ".$thMonth[$dMonth]." ".$dYear ." เวลา ".$dTime ;
		break;

	}	
	
	return $new_date;
}
		
		function _cg($val){
/*
	if($val=="0.5"){return "½";}
    elseif($val=="0.5+1"){return "½+1";}
	 elseif($val=="1+1.5"){return "1+1½";}
	  elseif($val=="1.5"){return "1½";}
	   elseif($val=="1.5+2"){return "1½+2";}
	    elseif($val=="2+2.5"){return "2+2½";}
		 elseif($val=="2.5"){return "2½";}
		  elseif($val=="2.5+3"){return "2½+3";}
		   elseif($val=="3+3.5"){return "3+3½";}
		     elseif($val=="3.5"){return "3½";}
			   elseif($val=="3.5+4"){return "3½+4";}
	  elseif($val=="4.5"){return "4½";}
	   elseif($val=="4.5+5"){return "4½+5";}
	    elseif($val=="5+5.5"){return "5+5½";}
	  elseif($val=="5.5"){return "5½";}
	   elseif($val=="5.5+6"){return "5½+6";}
	    elseif($val=="6+6.5"){return "6+6½";}
	  elseif($val=="6.5"){return "6½";}
	   elseif($val=="6.5+7"){return "6½+7";}
	    elseif($val=="7+7.5"){return "7+7½";}
	  elseif($val=="7.5"){return "7½";}
	   elseif($val=="7.5+8"){return "7½+8";}
	    elseif($val=="8+8.5"){return "8+8½";}
	  elseif($val=="8.5"){return "8½";}
	   elseif($val=="8.5+9"){return "8½+9";}
	    elseif($val=="9+9.5"){return "9+9½";}
	  elseif($val=="9.5"){return "9½";}
	   elseif($val=="9.5+10"){return "9½+10";}
	    elseif($val=="10+10.5"){return "10+10½";}
		
		   elseif($val=="1.0"){return "1";}
		    elseif($val=="2.0"){return "2";}
			 elseif($val=="3.0"){return "3";}
			  elseif($val=="4.0"){return "4";}
			   elseif($val=="5.0"){return "5";}
			    elseif($val=="6.0"){return "6";}
				 elseif($val=="7.0"){return "7";}
				  elseif($val=="8.0"){return "8";}
				   elseif($val=="9.0"){return "9";}
				    elseif($val=="10.0"){return "10";}

		   
		   
	else{return $val;}
	*/
	return $val;
	}	



			function file_get_contents2($url)
{
$context = stream_context_create(
    array(
        'http' => array(
            'max_redirects' => 101
        )
    )
);
$output=file_get_contents($url, false, $context);
    return $output;
}
?>