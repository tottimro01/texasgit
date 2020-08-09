<?
session_start();
require('../inc/conn.php');
require('../inc/function.php');

require("../lang/variable_lang.php");
require("../lang/function_array.php");

$betset_type = $_GET['betset'];

$rs_mem = sql_array("select * from bom_tb_member where m_id = '$_SESSION[m_id]'");

require('arr_pay.php');

$num_bill_play = sql_num("select bill_id from  bom_tb_lotto_bill_play_live where m_id='$_SESSION[m_id]' and lot_zone = 1  and play_status=7 and b_accept <> 0");
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
    	$lot_pay_n_dis = sql_array("select m_lotto_pay1, m_lotto_pay2, m_lotto_pay3, m_lotto_dis1, m_lotto_dis2, m_lotto_dis3 from bom_tb_member where m_id = '$_SESSION[m_id]'");
    	// var_dump($lot_pay_n_dis);

    	$lotPay1 = explode(",", $lot_pay_n_dis['m_lotto_pay1']);
    	$lotPay2 = explode(",", $lot_pay_n_dis['m_lotto_pay2']);
    	$lotPay3 = explode(",", $lot_pay_n_dis['m_lotto_pay3']);

    	$lotDis1 = explode(",", $lot_pay_n_dis['m_lotto_dis1']);
    	$lotDis2 = explode(",", $lot_pay_n_dis['m_lotto_dis2']);
    	$lotDis3 = explode(",", $lot_pay_n_dis['m_lotto_dis3']);

    	$arrLotPayDis = array();

    	foreach ($lot_type[$_SESSION['lang']][1] as $key => $value){
    		$arrLotPayDis[$key] = array(
    			'name' => $value,
    			'lot_pay1' => $lotPay1[$key],
    			'lot_pay2' => $lotPay2[$key],
    			'lot_pay3' => $lotPay3[$key],
    			'lot_dis1' => $lotDis1[$key],
    			'lot_dis2' => $lotDis2[$key],
    			'lot_dis3' => $lotDis3[$key],
    		);
    	}

      $lotPlayRemain = 0;
      $p_open = explode(",", $rs_mem["m_lotto_open"]);
    ?>

<table width="100%" border="0" align="left" cellpadding="0" cellspacing="1" class="bg_table">
  <tbody>
    <tr>
     <td align="center" class="tb_title_lotto" rowspan="2" width="25%"><?=$lang_member[160];?></td>
     <? if($p_open[1]==1 && $betset_type == 1){ ?>
      <td height="25" align="center" class="tb_title_lotto" colspan="2" width="25%"><?=$lang_member[619];?> A</td>
    <? } ?>
    <? if($p_open[2]==1 && $betset_type == 2){ ?>
      <td height="25" align="center" class="tb_title_lotto" colspan="2" width="25%"><?=$lang_member[619];?> B</td>
    <? } ?>
    <? if($p_open[3]==1 && $betset_type == 3){ ?>
      <td height="25" align="center" class="tb_title_lotto" colspan="2" width="25%"><?=$lang_member[619];?> C</td>
    <? } ?>
    </tr>
    <tr>
      <? if($p_open[1]==1  && $betset_type == 1){ ?>
      <td height="25" align="center" class="tb_title_lotto"><?=$lang_member[162];?></td>
      <td height="25" align="center" class="tb_title_lotto"><?=$lang_member[582];?></td>
      <? } ?>
    <? if($p_open[2]==1  && $betset_type == 2){ ?>
      <td height="25" align="center" class="tb_title_lotto"><?=$lang_member[162];?></td>
      <td height="25" align="center" class="tb_title_lotto"><?=$lang_member[582];?></td>
       <? } ?>
    <? if($p_open[3]==1  && $betset_type == 3){ ?>
      <td height="25" align="center" class="tb_title_lotto"><?=$lang_member[162];?></td>
      <td height="25" align="center" class="tb_title_lotto"><?=$lang_member[582];?></td>
      <? } ?>
    </tr>
    <? 
	  foreach($lot_type[$_SESSION['lang']][1] as $key => $value){
	  if($arr_pay_select[$_SESSION["crid4"]]["A"][$key]>0 || $arr_pay_select[$_SESSION["crid4"]]["B"][$key]>0 || $arr_pay_select[$_SESSION["crid4"]]["C"][$key]>0){
	  ?>
    <tr class="tr_lot">
      <td height="18" align="center" class="subtitle2" style="padding:5px;"><?=$value?></td>
      <? if($p_open[1]==1  && $betset_type == 1){ ?>
      <td align="center" bgcolor="#ffffff"><?=$arr_pay_select[$_SESSION["crid4"]]["A"][$key]?></td>
      <td align="center" bgcolor="#ffffff"><?=$arr_dis_member_select[$_SESSION["crid4"]]["A"][$key]?>%</td>
      <? } ?>
    <? if($p_open[2]==1  && $betset_type == 2){ ?>
      <td align="center" bgcolor="#FFE070"><?=$arr_pay_select[$_SESSION["crid4"]]["B"][$key]?></td>
      <td align="center" bgcolor="#FFE070"><?=$arr_dis_member_select[$_SESSION["crid4"]]["B"][$key]?>%</td>
       <? } ?>
    <? if($p_open[3]==1  && $betset_type == 3){ ?>
      <td align="center" bgcolor="#ffffff"><?=$arr_pay_select[$_SESSION["crid4"]]["C"][$key]?></td>
      <td align="center" bgcolor="#ffffff"><?=$arr_dis_member_select[$_SESSION["crid4"]]["C"][$key]?>%</td>
      <? } ?>
    </tr>
    <? } } ?>

    <? foreach ($arrLotPayDis as $key => $value) { ?> 
    <tr class="tr_lot">
      <td height="18" align="center" bgcolor="#cfdeff" style="padding:5px;"><?=$value['name'];?></td>
       <? if($p_open[1]==1  && $betset_type == 1){ ?>
      <td align="center" bgcolor="#ffffff"><?=(is_null($value['lot_pay1']) ? "," : $value['lot_pay1']);?></td>
      <td align="center" bgcolor="#ffffff"><?=(is_null($value['lot_dis1']) ? "," : $value['lot_dis1']."%");?></td>
      <? } ?>
    <? if($p_open[2]==1  && $betset_type == 2){ ?>
      <td align="center" bgcolor="#ffffff"><?=(is_null($value['lot_pay2']) ? "," : $value['lot_pay2']);?></td>
      <td align="center" bgcolor="#ffffff"><?=(is_null($value['lot_dis2']) ? "," : $value['lot_dis2']."%");?></td>
      <? } ?>
    <? if($p_open[3]==1  && $betset_type == 3){ ?>
      <td align="center" bgcolor="#ffffff"><?=(is_null($value['lot_pay3']) ? "," : $value['lot_pay3']);?></td>
      <td align="center" bgcolor="#ffffff"><?=(is_null($value['lot_dis3']) ? "," : $value['lot_dis3']."%");?></td>
       <? } ?>
    </tr>
    <? } ?>

   
    
    
  </tbody>
</table>

