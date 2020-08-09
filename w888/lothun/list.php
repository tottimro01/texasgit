<?
function checkSelectLot($index){
  if($_POST[lot_.$index]==1 or  
    ($_POST[lot_1]=="" and $_POST[lot_2]=="" and 
    $_POST[lot_3]=="" and $_POST[lot_4]=="" and 
    $_POST[lot_5]=="" and $_POST[lot_6]=="" and 
    $_POST[lot_7]=="" and $_POST[lot_8]=="" and 
    $_POST[lot_9]=="" and $_POST[lot_10]=="" and 
    $_POST[lot_11]=="" and $_POST[lot_12]=="" and 
    $_POST[lot_13]=="" and $_POST[lot_14]=="" and 
    $_POST[lot_15]=="" and $_POST[lot_16]=="" and 
    $_POST[lot_17]=="" and $_POST[lot_18]=="" and 
    $_POST[lot_19]=="" and $_POST[lot_20]=="" and 
    $_POST[lot_21]=="" and $_POST[lot_22]=="" and 
    $_POST[lot_23]=="" and $_POST[lot_24]=="" and
    $_POST[lot_25]=="" and $_POST[lot_26]=="" and
    $_POST[lot_27]=="" and $_POST[lot_28]=="" and
    $_POST[lot_29]=="" and $_POST[lot_30]=="" and
    $_POST[lot_31]=="" and $_POST[lot_32]=="" and
    $_POST[lot_33]=="" and $_POST[lot_34]=="" and
    $_POST[lot_35]=="")){
    return true;
  }
  return false;
}

##########################################ลบบิลซ้ำ
/*$arr_d = [];
$arr_dx = [];
$sql="select * from  bom_tb_lotto_bill_play";  
$re=sql_query($sql);
while($rs=sql_fetch($re)){
  $arr_d[$rs["play_id"]] = $rs["play_id"];
}
 
$sql="select * from  bom_tb_lotto_bill_play_live";  
$re=sql_query($sql);
while($rs=sql_fetch($re)){
  if($arr_d[$rs["play_id"]]!=""){
    $arr_dx[$rs["play_id"]] = $rs["play_id"];
    $del = "delete from bom_tb_lotto_bill_play_live where play_id = $rs[play_id]";
    $red=sql_query($del);
  }
}*/
###########################################
//echo $_SESSION["zone_hun"]."###".$_SESSION["rob_hun"]."###".$_SESSION["name_hun"]."###".$_POST["lot_rob"];
//echo "<br>";
if($_SESSION[zone_hun]=="" || $_SESSION[zone_hun]==0){
  $_SESSION[zone_hun] = 2;
}else{
  if($_POST["lot_type"]!=""){
    $_SESSION[zone_hun] = $_POST["lot_type"];
  }
}

if($_POST["lot_rob"]!=""){
  $_SESSION[rob_hun] = $_POST["lot_rob"];
}

if($_SESSION[zone_hun]==18){
  $name_rob = " ".$lang_member[688]." ".($_SESSION[rob_hun]>0 ? $_SESSION[rob_hun] : "1");
}else if($_SESSION[zone_hun]==19){
  $name_rob = " ".$lang_member[643]." ".$lot_robmun[($_SESSION[rob_hun]>0 ? $_SESSION[rob_hun] : 1)];
}else{
  if($lot_zone_bet[$_SESSION[zone_hun]]>1){
    $name_rob = $lang_g['lotrob'][($_SESSION[rob_hun]>0 ? $_SESSION[rob_hun] : 1)];
  }else{
    $name_rob = "";
  }
}

$_SESSION["name_hun"] = $lang_g['lotZone'][$_SESSION[zone_hun]].$name_rob;

$zone = $_SESSION[zone_hun];
$rob = $_SESSION[rob_hun];
$d = $_POST[period];

if($zone=="" || $zone=="0"){
  $q_zone = "";
}else{
  $q_zone = " and lot_zone = '$zone'";
}

if($rob==""  || $rob=="0"){
  $q_rob = "";
}else{
  $q_rob = " and lot_rob = '$rob'";
}

if($d==""){
  $rs_d=sql_array("select * from bom_tb_lotto_ok where 1 $q_zone $q_rob order by ok_id desc limit 1");
  $d = $rs_d["ok_date"];
}


if($_POST[qqname]!=""){
  $qqname=" and  b_name='$_POST[qqname]'";
}
if($_POST[qqno]!=""){
  $qqno=" and  b_no='$_POST[qqno]'";
}
if($_POST[qq]!=""){
  $qq=" and  bill_id='$_POST[qq]'";
}

$n_il = 0;
for($il=1;$il<=35;$il++){
  if($_POST["lot_".$il]==1){
    $n_il = 1;
  }
}

if($n_il==0){
  for($il=1;$il<=35;$il++){
    $_POST["lot_".$il] = 1;
  }
}

//echo $_SESSION["zone_hun"]."###".$_SESSION["rob_hun"]."###".$_SESSION["name_hun"];

?>

<table width="100%" border="0" cellpadding="5" cellspacing="1" class="txt_back11n bg_table ">
  <tbody>
    <tr class="txt_org12n">
      <td height="25" colspan="11" align="center" bgcolor="#FFFFFF" class="txt_back12ntitle">
      
      
      <form id="InputForm2" name="InputForm2" method="post" action="main_lothun.php?tlot=<?=$_GET[tlot]?>&last=<?=$_GET[last];?>&vvw=<?=$_GET[vvw]?>" style="display:inline">
      
          <table width="100%" border="0" cellspacing="1" cellpadding="0" class="txt_back12ntitle oho_tb no_cell_border">
            <tbody>
              <tr>
                <td align="center"><table width="100%" border="0" cellpadding="5" cellspacing="0" class="txt_back12ntitle">
                    <tbody>
                      <tr>
                        <td width="">
       <ul id="utitle">
      <? if($_GET["dun"]!=""){ ?>
      <li>
        <div class="sele" onClick="window.location.href='main_dun.php?last=<?=$_GET[last];?>&vvw='+fw;"><span><?=$lang_member[492] ;?></span> <img src="img/bg_m.png" class="img_active"></div>
      </li>
      <? } ?>
    </ul>
    </td>
    <td width="" align="left"><?=$lang_member[160];?> : </td>
    <td width="" align="left" class="cbu bb">
		<select name="lot_type" id="lot_type" class="txt_back12n" onChange="$('#lot_rob').val('0');$('#period').html('');$('.chk_t').prop('checked', false);$('#InputForm2').submit();">

                            <?
							

foreach($arr_zone  as $key => $val ){
	if($key!=1){
							?>
                            <option value="<?=$key?>" <? if($key==$zone){ ?>selected<? } ?>><?=$lang_g['lotZone'][$key]?></option>
                            <? } } ?>	
                            </select></td>
						  
						  <? if($lot_zone_bet[$zone]>1){ ?>
						  
						  <td width="" align="right"><?=$lang_member[643];?> : </td>
                        <td width="73" align="left" class="cbu bb">
							
							
							
							<select name="lot_rob" id="lot_rob" class="txt_back12n" onChange="$('#InputForm2').submit();">
		<option value="0" <? if($rob=="0"){ ?>selected <? } ?>><?=$lang_member[304];?></option>
                            <?
							

for($i=1;$i<=$lot_zone_bet[$zone];$i++){

							?>
                            <option value="<?=$i?>" <? if($i==$rob){ ?>selected<? } ?>>
								<? if($zone==18){ 
									echo $i;
								}else if($zone==19){
									echo $lot_robmun[$i];
								}else{
									echo $lang_g['lotrob'][$i];
								}
							?>
								</option>
                            <? }  ?>	
                            </select>
							
							
							
							
						  </td>
						  <? } ?>
						  
                        <td width="" align="right"><?=$lang_member[146];?> :  
                        
                        </td>
                        <td width=""><select name="period" id="period" class="txt_back12n" onChange="$('#InputForm2').submit();">
                            <?

//$zone=$_GET[lot_type];
#$rob=1;
echo $sql="select * from bom_tb_lotto_ok where 1 $q_zone $q_rob group by ok_date  order by ok_id desc limit 16";
$re=sql_query($sql);
while($rs=sql_fetch($re)){
							?>
                            <option value="<?=$rs['ok_date']?>" <? if($rs['ok_date']==$d){ ?>selected<? } ?>><?=$rs['ok_date']?></option>
                            <? } ?>	
                            </select>

              </td>
                        <? if($_SESSION['m_print_slip']==1){?>
                          <td>
                            <?=$lang_member[607];?> : 
                          </td>
                          <td>
                            <input name="qq" type="text" value="<?=$_POST[qq];?>" size="8" maxlength="10" id="qq" />
                          </td>
                        <? }?>
                          
						  
                        <td width="" align="left"><input type="submit" value=" <?=$lang_member[293];?> " class="btn_le" name="btns" style="min-width:60px;height:20px;cursor:pointer; margin-top:0px; margin-bottom:0px; line-height:10px;"></td>
                        <?
                         $chkTypeArr = array(); 

						foreach ($lot_type[$_SESSION['lang']][$zone] as $xx => $value){
                          if(checkSelectLot($xx)){
                            $chkTypeArr[] = $xx;
                          }
                          $chkTypeParam = implode(",", $chkTypeArr);
                        }
                        ?>
           
                        <td width="" align="right"><span class="txt_blue12ntitle" style="cursor:pointer" onclick="_o('print_lotto_hun.php?d=<?=$d;?>&zone_send=<?=$zone;?>&rob_send=<?=$rob;?>&r=<?=$rob;?>&clot=<?=$chkTypeParam;?>');"><u><?=$lang_member[436];?></u></span></td>
                      </tr>
						<tr><td colspan="11" align="center">
						<?=$lang_member[495]?> :
                        <input name="qqname" type="text" value="<?=$_POST[qqname];?>" id="qqname" style="width: 70px;" />
                        <?=$lang_member[496]?> :
                        <input name="qqno" type="text" value="<?=$_POST[qqno];?>" id="qqno" style="width: 30px;" />
						</td></tr>
                    </tbody>
                  </table></td>
              </tr>
              <tr>
                  <td>
                  <? 
//print_r($lot_type);
				
				foreach ($lot_type[$_SESSION['lang']][$_SESSION["zone_hun"]] as $xx => $value){
					  ?>

                      <div class="c_lot"> 
                     <input name="lot_<?=$xx;?>" class="chk_t" type="checkbox" id="lot_<?=$xx;?>" value="1"  <? if(checkSelectLot($xx)){echo'checked="checked"';}?>>&nbsp;
                      <?=$lot_type[$_SESSION['lang']][$_SESSION["zone_hun"]][$xx];?>
                      </div>

                      
					<? 
          }
					  ?>
               
                  
                  </td>
                </tr>
            </tbody>
          </table>
          <input type="hidden" name="pg" id="pg">
        </form>
        

        </td>
    </tr>
    <tr align="center" class="tb_title_lotto">
      <td width="10%"><?=$lang_member[466];?></td>
      <td width="18%" height="25"><?=$lang_member[407];?></td>
      <td width="4%"><?=$lang_member[643];?></td>
      <td width="13%"><?=$lang_member[160];?></td>
      <td width="11%"><?=$lang_member[381];?></td>
      <td width="11%"><?=$lang_member[300];?></td>
      <td width="11%"><?=$lang_member[610];?></td>
      <td width="11%"><?=$lang_member[470];?></td>
      <td width="11%"><?=$lang_member[611];?></td>
    </tr>
    
    <? 
$x=1;	
$sum1=array();
$sum2=array();
$sum3=array();
$sum4=array();
	
	?>
    
    <?
$sql="select * from  bom_tb_lotto_bill_play_live where m_id='".$_SESSION['m_id']."' and b_date='$d'  and b_accept=1 $q_zone $q_rob $qq $qqname $qqno  order by play_id desc ";	
$re=sql_query($sql);
while($rs=sql_fetch($re)){
	
	if(
  ($_POST[lot_1]==1 and $rs["lot_type"]==1) or 
  ($_POST[lot_2]==1 and $rs["lot_type"]==2) or 
  ($_POST[lot_3]==1 and $rs["lot_type"]==3) or 
  ($_POST[lot_4]==1 and $rs["lot_type"]==4) or 
  ($_POST[lot_5]==1 and $rs["lot_type"]==5) or 
  ($_POST[lot_6]==1 and $rs["lot_type"]==6) or 
  ($_POST[lot_7]==1 and $rs["lot_type"]==7) or 
  ($_POST[lot_8]==1 and $rs["lot_type"]==8) or 
  ($_POST[lot_9]==1 and $rs["lot_type"]==9) or 
  ($_POST[lot_10]==1 and $rs["lot_type"]==10) or 
  ($_POST[lot_11]==1 and $rs["lot_type"]==11) or 
  ($_POST[lot_12]==1 and $rs["lot_type"]==12) or 
  ($_POST[lot_13]==1 and $rs["lot_type"]==13) or 
  ($_POST[lot_14]==1 and $rs["lot_type"]==14) or 
  ($_POST[lot_15]==1 and $rs["lot_type"]==15) or
  ($_POST[lot_16]==1 and $rs["lot_type"]==16) or 
  ($_POST[lot_17]==1 and $rs["lot_type"]==17) or 
  ($_POST[lot_18]==1 and $rs["lot_type"]==18) or 
  ($_POST[lot_19]==1 and $rs["lot_type"]==19) or 
  ($_POST[lot_20]==1 and $rs["lot_type"]==20) or 
  ($_POST[lot_21]==1 and $rs["lot_type"]==21) or 
  ($_POST[lot_22]==1 and $rs["lot_type"]==22) or 
  ($_POST[lot_23]==1 and $rs["lot_type"]==23) or 
  ($_POST[lot_24]==1 and $rs["lot_type"]==24) or 
  ($_POST[lot_25]==1 and $rs["lot_type"]==25) or 
  ($_POST[lot_26]==1 and $rs["lot_type"]==26) or 
  ($_POST[lot_27]==1 and $rs["lot_type"]==27) or 
  ($_POST[lot_28]==1 and $rs["lot_type"]==28) or 
  ($_POST[lot_29]==1 and $rs["lot_type"]==29) or 
  ($_POST[lot_30]==1 and $rs["lot_type"]==30) or 
  ($_POST[lot_31]==1 and $rs["lot_type"]==31) or 
  ($_POST[lot_32]==1 and $rs["lot_type"]==32) or 
  ($_POST[lot_33]==1 and $rs["lot_type"]==33) or 
  ($_POST[lot_34]==1 and $rs["lot_type"]==34) or 
  ($_POST[lot_35]==1 and $rs["lot_type"]==35) or 
  ($_POST[period]=="")){


$sum1[]=-$rs["b_total"];

$sum2[]=$rs["b_total"]-$rs["b_pay"];
$sum3[]=$rs["b_bonus"];
$sum4[]=(-$rs["b_pay"])+$rs["b_bonus"];
	
	?>
                  <tr align="center" class="tr_lot" >
                  <td><?=$rs[play_id]?></td>
                    <td><?=date("d/m/Y H:i:s" , $rs["play_timestam"]);?></td>
                    <td><?=$rs["lot_rob"]?></td>
      <td><?=$lot_type[$_SESSION['lang']][$_SESSION["zone_hun"]][$rs["lot_type"]]?></td>
      <td><?=_dt($rs["play_number"])?></td>
      <td align="right"><?=_cbp(-$rs["b_total"],2)?></td>
      

      
      <td align="right"><?=_cbp($rs["b_total"]-$rs["b_pay"],2)?></td>
        <td align="right"><?=_cbp($rs["b_bonus"],2)?></td>
      <td align="right"><?=_cbp((-$rs["b_pay"])+$rs["b_bonus"],2)?></td>
      
                  </tr>
                  <? $x++; }} ?>
                  
                  
                  
 <?
$sql="select * from  bom_tb_lotto_bill_play where m_id='".$_SESSION['m_id']."' and b_date='$d'  and b_accept=1 $q_zone $q_rob $qq  $qqname $qqno  order by play_id desc ";	
$re=sql_query($sql);
while($rs=sql_fetch($re)){
	
  if(
  ($_POST[lot_1]==1 and $rs["lot_type"]==1) or 
  ($_POST[lot_2]==1 and $rs["lot_type"]==2) or 
  ($_POST[lot_3]==1 and $rs["lot_type"]==3) or 
  ($_POST[lot_4]==1 and $rs["lot_type"]==4) or 
  ($_POST[lot_5]==1 and $rs["lot_type"]==5) or 
  ($_POST[lot_6]==1 and $rs["lot_type"]==6) or 
  ($_POST[lot_7]==1 and $rs["lot_type"]==7) or 
  ($_POST[lot_8]==1 and $rs["lot_type"]==8) or 
  ($_POST[lot_9]==1 and $rs["lot_type"]==9) or 
  ($_POST[lot_10]==1 and $rs["lot_type"]==10) or 
  ($_POST[lot_11]==1 and $rs["lot_type"]==11) or 
  ($_POST[lot_12]==1 and $rs["lot_type"]==12) or 
  ($_POST[lot_13]==1 and $rs["lot_type"]==13) or 
  ($_POST[lot_14]==1 and $rs["lot_type"]==14) or 
  ($_POST[lot_15]==1 and $rs["lot_type"]==15) or
  ($_POST[lot_16]==1 and $rs["lot_type"]==16) or 
  ($_POST[lot_17]==1 and $rs["lot_type"]==17) or 
  ($_POST[lot_18]==1 and $rs["lot_type"]==18) or 
  ($_POST[lot_19]==1 and $rs["lot_type"]==19) or 
  ($_POST[lot_20]==1 and $rs["lot_type"]==20) or 
  ($_POST[lot_21]==1 and $rs["lot_type"]==21) or 
  ($_POST[lot_22]==1 and $rs["lot_type"]==22) or 
  ($_POST[lot_23]==1 and $rs["lot_type"]==23) or 
  ($_POST[lot_24]==1 and $rs["lot_type"]==24) or 
  ($_POST[lot_25]==1 and $rs["lot_type"]==25) or 
  ($_POST[lot_26]==1 and $rs["lot_type"]==26) or 
  ($_POST[lot_27]==1 and $rs["lot_type"]==27) or 
  ($_POST[lot_28]==1 and $rs["lot_type"]==28) or 
  ($_POST[lot_29]==1 and $rs["lot_type"]==29) or 
  ($_POST[lot_30]==1 and $rs["lot_type"]==30) or 
  ($_POST[lot_31]==1 and $rs["lot_type"]==31) or 
  ($_POST[lot_32]==1 and $rs["lot_type"]==32) or 
  ($_POST[lot_33]==1 and $rs["lot_type"]==33) or 
  ($_POST[lot_34]==1 and $rs["lot_type"]==34) or 
  ($_POST[lot_35]==1 and $rs["lot_type"]==35) or 
  ($_POST[period]=="")){

$sum1[]=-$rs["b_total"];

$sum2[]=$rs["b_total"]-$rs["b_pay"];
$sum3[]=$rs["b_bonus"];
$sum4[]=(-$rs["b_pay"])+$rs["b_bonus"];
	
	?>
                  <tr align="center" class="tr_lot" >
                  <td><?=$rs[play_id]?></td>
                    <td><?=date("d/m/Y H:i:s" , $rs["play_timestam"]);?></td>
                    <td><?=$rs["lot_rob"]?></td>
      <td><?=$lot_type[$_SESSION['lang']][$_SESSION["zone_hun"]][$rs["lot_type"]]?></td>
      <td><?=_dt($rs["play_number"])?></td>
      <td align="right"><?=_cbp(-$rs["b_total"],2)?></td>
      

      
      <td align="right"><?=_cbp($rs["b_total"]-$rs["b_pay"],2)?></td>
        <td align="right"><?=_cbp($rs["b_bonus"],2)?></td>
      <td align="right"><?=_cbp((-$rs["b_pay"])+$rs["b_bonus"],2)?></td>
      
                  </tr>
                  <? $x++; } } ?>
    
    <tr class="bg_td" style="font-size: 12px;">
      <td height="18" colspan="5" align="center"><?=$lang_member[611];?></td>
      <td align="right" class="txt_back11b"><?=_cbn(@array_sum($sum1),2)?></td>
      <td align="right" class="txt_back11b"><?=_cbn(@array_sum($sum2),2)?></td>
      <td align="right" class="txt_blue11b"><?=_cbn(@array_sum($sum3),2)?></td>
      <td align="right" class="txt_blue11b"><?=_cbn(@array_sum($sum4),2)?></td>
    </tr>
  </tbody>
</table>