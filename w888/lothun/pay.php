<?
$rs_mem = sql_array("select * from bom_tb_member where m_id = '$_SESSION[m_id]'");

require('arr_pay.php');

$num_bill_play = sql_num("select bill_id from  bom_tb_lotto_bill_play_live where m_id='$_SESSION[m_id]' and lot_zone <> 1  and play_status=7 and b_accept <> 0");
?>
<!-- <style>
  .btn_le {
    width:145px;
    height:20px;
    cursor:pointer; 
    margin:auto; 
    display:block;  
    line-height:10px; 
    background:#f7c63c; 
    color:#000000; 
    font-weight: bold;
  }

  .btn_le:disabled{
    background-color: #e2e2e2;
    cursor: auto;
    color: #f5f5f5;
  }
  .btn_select_pay.selected_pay{
    background-color: red;
    color: #fff;
  }
</style> -->
 <?
      $lot_pay_n_dis = sql_array("select m_lotto_hun_pay1, m_lotto_hun_pay2, m_lotto_hun_pay3, m_lotto_hun_dis1, m_lotto_hun_dis2, m_lotto_hun_dis3 from bom_tb_member where m_id = '$_SESSION[m_id]'");
      // var_dump($lot_pay_n_dis);

      $lotPay1 = explode(",", $lot_pay_n_dis['m_lotto_hun_pay1']);
      $lotPay2 = explode(",", $lot_pay_n_dis['m_lotto_hun_pay2']);
      $lotPay3 = explode(",", $lot_pay_n_dis['m_lotto_hun_pay3']);

      $lotDis1 = explode(",", $lot_pay_n_dis['m_lotto_hun_dis1']);
      $lotDis2 = explode(",", $lot_pay_n_dis['m_lotto_hun_dis2']);
      $lotDis3 = explode(",", $lot_pay_n_dis['m_lotto_hun_dis3']);

      $arrLotPayDis = array();

      foreach ($lot_type[$_SESSION['lang']][3] as $key => $value){
		 if($key!=31){
        $arrLotPayDis[$key] = array(
          'name' => $value,
          'lot_pay1' => $lotPay1[$key],
          'lot_pay2' => $lotPay2[$key],
          'lot_pay3' => $lotPay3[$key],
          'lot_dis1' => $lotDis1[$key],
          'lot_dis2' => $lotDis2[$key],
          'lot_dis3' => $lotDis3[$key],
        );
		 }# if($key!=31){
      }

      #$lotPlayRemain = $_SESSION['mnot'];
      $lotPlayRemain = 0;

      $p_open = explode(",", $rs_mem["m_lotto_hun_open"]);
    ?>

<table width="100%" border="0" align="left" cellpadding="0" cellspacing="1" class="bg_table">
  <tbody>
    <tr>
     <td align="center" class="tb_title_lotto" rowspan="2" width="25%"><?=$lang_member[160];?></td>
     <? if($p_open[1]==1){ ?>
      <td height="25" align="center" class="tb_title_lotto" colspan="2" width="25%"><?=$lang_member[619];?> A</td>
      <? } ?>
    <? if($p_open[2]==1){ ?>
      <td height="25" align="center" class="tb_title_lotto" colspan="2" width="25%"><?=$lang_member[619];?> B</td>
      <? } ?>
    <? if($p_open[3]==1){ ?>
      <td height="25" align="center" class="tb_title_lotto" colspan="2" width="25%"><?=$lang_member[619];?> C</td>
      <? } ?>
    </tr>
    <tr>
      <? if($p_open[1]==1){ ?>
      <td height="25" align="center" class="tb_title_lotto"><?=$lang_member[162];?></td>
      <td height="25" align="center" class="tb_title_lotto"><?=$lang_member[582];?></td>
       <? } ?>
    <? if($p_open[2]==1){ ?>
      <td height="25" align="center" class="tb_title_lotto"><?=$lang_member[162];?></td>
      <td height="25" align="center" class="tb_title_lotto"><?=$lang_member[582];?></td>
      <? } ?>
    <? if($p_open[3]==1){ ?>
      <td height="25" align="center" class="tb_title_lotto"><?=$lang_member[162];?></td>
      <td height="25" align="center" class="tb_title_lotto"><?=$lang_member[582];?></td>
      <? } ?>
    </tr>
    <? 
    foreach($lot_type[$_SESSION['lang']][3] as $key => $value){
    if($arr_pay_select[$_SESSION["crid4"]]["A"][$key]>0 || $arr_pay_select[$_SESSION["crid4"]]["B"][$key]>0 || $arr_pay_select[$_SESSION["crid4"]]["C"][$key]>0){
    ?>
    <tr class="tr_lot">
      <td height="18" align="center" class="subtitle2" style="padding:5px;"><?=$value?></td>
      <? if($p_open[1]==1){ ?>
      <td align="center" bgcolor="#ffffff"><?=$arr_pay_select[$_SESSION["crid4"]]["A"][$key]?></td>
      <td align="center" bgcolor="#ffffff"><?=$arr_dis_member_select[$_SESSION["crid4"]]["A"][$key]?>%</td>
       <? } ?>
    <? if($p_open[2]==1){ ?>
      <td align="center" bgcolor="#FFE070"><?=$arr_pay_select[$_SESSION["crid4"]]["B"][$key]?></td>
      <td align="center" bgcolor="#FFE070"><?=$arr_dis_member_select[$_SESSION["crid4"]]["B"][$key]?>%</td>
      <? } ?>
    <? if($p_open[3]==1){ ?>
      <td align="center" bgcolor="#ffffff"><?=$arr_pay_select[$_SESSION["crid4"]]["C"][$key]?></td>
      <td align="center" bgcolor="#ffffff"><?=$arr_dis_member_select[$_SESSION["crid4"]]["C"][$key]?>%</td>
      <? } ?>
    </tr>
    <? } } ?>

    <? foreach ($arrLotPayDis as $key => $value) { ?> 
    <tr class="tr_lot">
      <td height="18" align="center" bgcolor="#cfdeff" style="padding:5px;"><?=$value['name'];?></td>
      <? if($p_open[1]==1){ ?>
      <td align="center" bgcolor="#ffffff"><?=(is_null($value['lot_pay1']) ? "," : $value['lot_pay1']);?></td>
      <td align="center" bgcolor="#ffffff"><?=(is_null($value['lot_dis1']) ? "," : $value['lot_dis1']."%");?></td>
       <? } ?>
    <? if($p_open[2]==1){ ?>
      <td align="center" bgcolor="#ffffff"><?=(is_null($value['lot_pay2']) ? "," : $value['lot_pay2']);?></td>
      <td align="center" bgcolor="#ffffff"><?=(is_null($value['lot_dis2']) ? "," : $value['lot_dis2']."%");?></td>
      <? } ?>
    <? if($p_open[3]==1){ ?>
      <td align="center" bgcolor="#ffffff"><?=(is_null($value['lot_pay3']) ? "," : $value['lot_pay3']);?></td>
      <td align="center" bgcolor="#ffffff"><?=(is_null($value['lot_dis3']) ? "," : $value['lot_dis3']."%");?></td>
      <? } ?>
    </tr>
    <? } ?>

   
    <tr class="bg_td">
      <td height="30" align="center"></td>
      <? if($p_open[1]==1){ ?>
      <td align="right" class="txt_back11b" colspan="2">
        <? if(($num_bill_play<=0 and count($arr_pay_select)>0) or $rs_mem["m_lotto_hun_setbet"]==1){ ?>
          <button style="margin: 0 auto; display: block;" class="btn_le w100px btn_select_pay 1 <?if($rs_mem["m_lotto_hun_setbet"]==1){?> selected_pay <?}?> <? if($rs_mem["m_lotto_hun_setbet"]==1){ ?> btn_dis <? } ?>"<? if($rs_mem["m_lotto_hun_setbet"]==1 || $lotPlayRemain != 0){ ?> disabled <? } ?><? if($rs_mem["m_lotto_hun_setbet"]!=1){ ?> onclick="select_pay('A' , 1 , this);"<? } ?>><?=$lang_member[299];?><? if($rs_mem["m_lotto_hun_setbet"]==1){ ?><?=$lang_member[626];?><? } ?></button>
        <? } ?>
        </td>
         <? } ?>
    <? if($p_open[2]==1){ ?>
      <td align="right" class="txt_back11b" colspan="2">
        <? if(($num_bill_play<=0 and count($arr_pay_select)>0) or $rs_mem["m_lotto_hun_setbet"]==2){ ?>
          <button style="margin: 0 auto; display: block;" class="btn_le w100px btn_select_pay 2 <?if($rs_mem["m_lotto_hun_setbet"]==2){?> selected_pay <?}?> <? if($rs_mem["m_lotto_hun_setbet"]==2){ ?> btn_dis <? } ?>"<? if($rs_mem["m_lotto_hun_setbet"]==2 || $lotPlayRemain != 0){ ?> disabled <? } ?><? if($rs_mem["m_lotto_hun_setbet"]!=2){ ?> onclick="select_pay('B' , 2 , this);"<? } ?>><?=$lang_member[299];?><? if($rs_mem["m_lotto_hun_setbet"]==2){ ?><?=$lang_member[626];?><? } ?></button>
        <? } ?>
        </td>
        <? } ?>
    <? if($p_open[3]==1){ ?>
      <td align="right" class="txt_blue11b" colspan="2">
        <? if(($num_bill_play<=0 and count($arr_pay_select)>0) or $rs_mem["m_lotto_hun_setbet"]==3){ ?>
          <button style="margin: 0 auto; display: block;" class="btn_le w100px btn_select_pay 3 <?if($rs_mem["m_lotto_hun_setbet"]==3){?> selected_pay <?}?> <? if($rs_mem["m_lotto_hun_setbet"]==3){ ?> btn_dis <? } ?>"<? if($rs_mem["m_lotto_hun_setbet"]==3 || $lotPlayRemain != 0){ ?> disabled <? } ?><? if($rs_mem["m_lotto_hun_setbet"]!=3){ ?> onclick="select_pay('C' , 3 , this);"<? } ?>><?=$lang_member[299];?><? if($rs_mem["m_lotto_hun_setbet"]==3){ ?><?=$lang_member[626];?><? } ?></button>
        <? } ?>
      </td>
      <? } ?>
    </tr>
    
  </tbody>
</table>
<div style="clear:both;"></div>
<br>
<span style="color: red; font-size: 12px;">*<?=$lang_member[622];?></span>
<br><br>



<script>
function select_pay(packet , id_key , btn){
  if(confirm("<?=$lang_member[624];?>")==true){
      $.ajax({
        type: "POST",
        url: "lothun/select_pay.php",
        data: { "packet": packet  , "id_key": id_key },
        dataType:"json",
        cache: false, // Clear cache IE
        beforeSend: function(){
          $(".btn_le").hide();
          /*$(btn).attr("disabled" , "disabled");
          $(btn).show();
          $(btn).html("<img src='img/loding.gif' style='opacity:1; margin:auto; display:block;'>");*/
        },
        success: function(data){
          alert(data.msg);
          $(".btn_le").show();
          if(data.status==1){
            location.reload();
            parent.leftx.location.reload();
            // $('.btn_select_pay.' + data.id_key).addClass('selected_pay');
            // $('.btn_select_pay').not('.'+data.id_key).removeClass('selected_pay');
          }else if(data.status==2){
            $(".btn_le").show();
            /*$(btn).removeAttr("disabled");
            $(btn).html("เบิกเงิน");*/
          }else if(data.status==3){
            location.reload();
          }
        },
        fail: function(){
          $(".btn_le").show();
        }
      }); 
    }
}
</script>
