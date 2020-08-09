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
    $_POST[lot_23]=="" and $_POST[lot_24]=="")){
    return true;
  }
  return false;
}


if($_GET[d]!=""){
$view_date=$_GET[d];
}elseif($_POST[period]==""){
$view_date=$re_ok[ok_date];
}else{
$view_date=$_POST[period];
	}
	
$_POST[qq]=trim($_POST[qq]);
?>
<table width="100%" border="0" cellpadding="5" cellspacing="1" class="txt_back11n bg_table no_cell_border">
  <tbody>
    <tr class="txt_org12n">
      <td height="25" colspan="8" align="center" bgcolor="#FFFFFF" class="txt_back12ntitle">
      
      
      <form id="InputForm2" name="InputForm2" method="post" action="main_lotto.php?tlot=<?=$_GET[tlot]?>&last=<?=$_GET[last];?>&vvw=<?=$_GET[vvw]?>&v=<?=$_GET[v]?>" style="display:inline">
      
          <table width="100%" border="0" cellspacing="1" cellpadding="0" class="txt_back12ntitle">
            <tbody>
              <tr>
                <td align="center"><table width="96%" border="0" cellpadding="5" cellspacing="0" class="txt_back12ntitle">
                    <tbody>
                      <tr>
                        <td width="185">
       <ul id="utitle">
      <? if($_GET["dun"]!=""){ ?>
      <li>
        <div class="sele" onClick="window.location.href='main_dun.php?last=<?=$_GET[last];?>&vvw='+fw;"><span><?=$lang_member[492];?></span> <img src="img/bg_m.png" class="img_active"></div>
      </li>
      <? } ?>
    </ul>
    </td>
                        <td width="417" align="right">
                        <? if($_SESSION['m_print_slip']==1){?>
						<?=$lang_member[607];?> :
                        <input name="qq" type="text" value="<?=$_POST[qq];?>" size="2" maxlength="10" id="qq" />
						<? }?>
						<?=$lang_member[146];?> : </td>
                        <td width="166"><select name="period" id="period" class="txt_back12n">
<?
$zone=1;
$rob=1;
$sql="select * from bom_tb_lotto_ok where lot_zone=$zone and lot_rob=$rob order by ok_id desc limit 16";
$re=sql_query($sql);
while($rs=sql_fetch($re)){
							?>
                            <option value="<?=$rs['ok_date']?>" <? if($rs['ok_date']==$view_date){ ?>selected<? } ?>><?=$rs['ok_date']?></option>
                            <? } ?>	
                            </select>
                          </td>
                          <td width="675" align="right">
						<?=$lang_member[495]?> :
                        <input name="qqname" type="text" value="<?=$_POST[qqname];?>" id="qqname" style="width: 70px;" />
                        <?=$lang_member[496]?> :
                        <input name="qqno" type="text" value="<?=$_POST[qqno];?>" id="qqno" style="width: 30px;" />
						</td>
                        <td width="173" align="left"><input type="submit" value=" <?=$lang_member[293];?> " class="btn_le" name="btns" style="min-width:60px;height:20px;cursor:pointer; margin-top:0px; margin-bottom:0px; line-height:10px;"></td>
                        <?
                         $chkTypeArr = array(); 
                        for($xx=1;$xx<=count($lot_type[$_SESSION['lang']][1]);$xx++){
                          if(checkSelectLot($xx)){
                            $chkTypeArr[] = $xx;
                          }
                          $chkTypeParam = implode(",", $chkTypeArr);
                        }
                        ?>
                        <td width="260" align="right"><span class="txt_blue12ntitle" style="cursor:pointer" onclick="_o('print_lotto<?=$_GET[v];?>.php?d=<?=$view_date;?>&clot=<?=$chkTypeParam;?>');"><u><?=$lang_member[436];?></u></span></td>
                      </tr>
                    </tbody>
                  </table></td>
              </tr>
              <tr>
                  <td>
                  <? 
				  // for($xx=1;$xx<=count($lot_type[$_SESSION['lang']][1]);$xx++){
            foreach ($lot_type[$_SESSION['lang']][1] as $xx => $value) {
       
					  ?>
                     <div class="c_lot"> 
                     <!-- <input name="lot_<?=$xx;?>" type="checkbox" id="lot_<?=$xx;?>" value="1"  <? if($_POST[lot_.$xx]==1 or  ($_POST[lot_1]=="" and $_POST[lot_2]=="" and $_POST[lot_3]=="" and $_POST[lot_4]=="" and $_POST[lot_5]=="" and $_POST[lot_6]=="" and $_POST[lot_7]=="" and $_POST[lot_8]=="" and $_POST[lot_9]=="" and $_POST[lot_10]=="" and $_POST[lot_11]=="" and $_POST[lot_12]=="" and $_POST[lot_13]=="" and $_POST[lot_14]=="" and $_POST[lot_15]=="" and $_POST[lot_16]=="" and $_POST[lot_17]=="" and $_POST[lot_18]=="" and $_POST[lot_19]=="" and $_POST[lot_20]=="" and $_POST[lot_21]=="" and $_POST[lot_22]=="" and $_POST[lot_23]=="" and $_POST[lot_24]=="") ){echo'checked="checked"';}?>>&nbsp;
                      <?=$lot_type[$_SESSION['lang']][1][$xx];?> -->
                      <input name="lot_<?=$xx;?>" type="checkbox" id="lot_<?=$xx;?>" value="1"  <? if(checkSelectLot($xx)){echo'checked="checked"';}?>>&nbsp;
                      <?=$lot_type[$_SESSION['lang']][1][$xx];?>
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
        
<span style="float:right;">
<input value=" <?=$lang_member[519]?> " class="btn_le" type="button" style="min-width:100px;height:20px;cursor:pointer; margin-top:0px; margin-bottom:0px; line-height:10px;" onClick="window.location.href='main_lotto.php?tlot=list&vvw=0&d=<?=$view_date;?>'" >
<input value=" <?=$lang_member[520]?> " class="btn_le" type="button" style="min-width:100px;height:20px;cursor:pointer; margin-top:0px; margin-bottom:0px; line-height:10px;"  onClick="window.location.href='main_lotto.php?tlot=list&vvw=0&v=1&d=<?=$view_date;?>'">
<input value=" <?=$lang_member[522]?> " class="btn_le" type="button" style="min-width:100px;height:20px;cursor:pointer; margin-top:0px; margin-bottom:0px; line-height:10px;"   onClick="window.location.href='main_lotto.php?tlot=list&vvw=0&v=2&d=<?=$view_date;?>'">
 <? if($_SESSION['m1']['m_lotto_convert']==1){?>
<input value=" <?=$lang_member[523]?> " class="btn_le" type="button" style="min-width:100px;height:20px;cursor:pointer; margin-top:0px; margin-bottom:0px; line-height:10px;" onClick="window.location.href='main_lotto.php?tlot=list&vvw=0&v=3&d=<?=$view_date;?>'" >
<? }?>
</span>
        
        </td>
    </tr>
  </tbody>
</table>   
 <?
       include("lotto/list_".$_GET[v].".php");
 ?>
 


<?
$arr_qname = "";
$sql_list_qqname="select * from  bom_tb_lotto_bill_live where m_id='".$_SESSION['m_id']."' and lot_zone = 1 and b_date='$view_date' and b_accept=1 and b_name<>'' group by b_name";	
$numqqname=sql_num($sql_list_qqname);
if($numqqname==0){
	$sql_list_qqname="select * from  bom_tb_lotto_bill where m_id='".$_SESSION['m_id']."' and lot_zone = 1 and b_date='$view_date'  and b_accept=1 and b_name<>'' group by b_name";	
}
$reqqname=sql_query($sql_list_qqname);
while($rsqqname=sql_fetch($reqqname)){
	if($arr_qname==""){
		$arr_qname = "'".$rsqqname["b_name"]."'";
	}else{
		$arr_qname .= ","."'".$rsqqname["b_name"]."'";
	}
}

$arr_qno = "";
$sql_list_qqno="select * from  bom_tb_lotto_bill_live where m_id='".$_SESSION['m_id']."' and lot_zone = 1 and b_date='$view_date' and b_accept=1 and b_no<>'' group by b_no";	
$numqqno=sql_num($sql_list_qqno);
if($numqqno==0){
	$sql_list_qqno="select * from  bom_tb_lotto_bill where m_id='".$_SESSION['m_id']."' and lot_zone = 1 and b_date='$view_date'  and b_accept=1 and b_no<>'' group by b_no";	
}
$reqqno=sql_query($sql_list_qqno);
while($rsqqno=sql_fetch($reqqno)){
	if($arr_qno==""){
		$arr_qno = "'".$rsqqno["b_no"]."'";
	}else{
		$arr_qno .= ","."'".$rsqqno["b_no"]."'";
	}
}
?>
<script>
 $( function() {
	 <? if($arr_qname!=""){ ?>
    var availableTags = [<?=$arr_qname?>];
    $( "#qqname" ).autocomplete({
      source: availableTags
    });
	 <? } ?>
	 
	 <? if($arr_qno!=""){ ?>
    var availableTags2 = [<?=$arr_qno?>];
    $( "#qqno" ).autocomplete({
      source: availableTags2
    });
	 <? } ?>
 });
  </script>


