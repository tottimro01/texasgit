<?php
    if($_SESSION["AGlang"]==""){
        $_SESSION["AGlang"]="th";
    }
  require('../../conn.php');
  require('../../function.php');
  require('../../ag_function.php');

  require('../../../lang/ag_'.$_POST["session"]["AGlang"].'.php');

 

  // ลบ
  if($_POST["edType"] == "r")
  {

    // ยอดเครดิตทีเปิดให้ member 
  $d_incre = strtotime("-7 day");
  $sql = "select sum(b_total) as btotal from bom_tb_football_bill where  m_agent_id like '%*".$_POST["id"]."*%'  and r_cut_bet_4=0";
  $reb1 = sql_array($sql);
  $sql = "select sum(b_total) as btotal from bom_tb_lotto_bill_live where  m_agent_id like '%*".$_POST["id"]."*%' and b_status=5";
  $reb2 = sql_array($sql);
  $sql = "select sum(b_total) as btotal from bom_tb_lotto_hun_bill where  m_agent_id like '%*".$_POST["id"]."*%' and play_timestam >= $d_incre";
  $reb3 = sql_array($sql);
  $sql = "select sum(b_total) as btotal from bom_tb_games_bill_play where  m_agent_id like '%*".$_POST["id"]."*%' and play_timestam >= $d_incre";
  $reb4 = sql_array($sql);
  $sum_kank2 = $reb1["btotal"] + $reb2["btotal"] + $reb3["btotal"] + $reb4["btotal"];

  $sql = "select r_count as xtotal , r_type from bom_tb_agent where r_id=".$_POST["id"];
  $re4 = sql_array($sql);

  $rtype = "m_count";
  $sql = "select sum($rtype) as xtotal from bom_tb_member where  m_agent_id like '%*".$_POST["id"]."*%'";
  $re5 = sql_array($sql);

  // ยอดรวมเครดิตที่โอนให้ member
  $x_count_member = ($re5["xtotal"] + $sum_kank2);


  // ยอดเครดิตทีเปิดให้ agent 
  $lv = intval($_POST["session"]["r_level"])+2;

  $sql="select sum(r_count) as xtotal from bom_tb_agent where   r_agent_id like '%*".$_POST["id"]."*%' and r_level=$lv  ";
  $re3=sql_array($sql);

  $sql = "select * from bom_tb_agent where  r_agent_id like '%*".$_POST["session"]["r_id"]."*%'  and   r_id='".$_POST["id"]."' ";
  $rex = sql_array($sql);

  $x_count=$rex["r_count"]-($x_count_member+$re3["xtotal"]);
  $rex["r_name"] = ($rex["r_name"] != "") ? $rex["r_name"] : $lang_userList[15];


?>
    <br>
    <div class="widget-box">
      <div class="widget-header ">
        <h4 class="widget-title lighter"><strong> <font class="blue"> <?=$rex["r_user"];?> (<?=$rex["r_name"];?>) </font> </strong></h4>
      </div>
      <div class="widget-body">
        <form class="form-horizontal" id="" action="" method="post">
          <div class="widget-main">
            <div class="row">
              <div class="col-xs-12 col-sm-12">
                <div class="col-xs-12 col-sm-12 form-group">
                  <label class="col-xs-6 col-sm-6 control-label"><strong><?=$lang_userList[17];?>:&nbsp;</strong></label>
                  <div class="col-xs-6 col-sm-6">
                    <input type="text" id="credit" name="credit" class="col-xs-12 col-sm-12 numeric" value="<?=number_format($rex[r_count],2);?>" 			readonly="true">
                  </div>
                </div>
              </div>
                          <div class="col-xs-12 col-sm-12">
			                        <div class="col-xs-12 col-sm-12 form-group">
			                            <label class="col-xs-6 col-sm-6 control-label"><strong><?=$lang_userList[33];?>:&nbsp;</strong></label>
			                            <div class="col-xs-6 col-sm-6">
			                                <input type="text" id="reduceCredit" name="reduceCredit" class="col-xs-12 col-sm-12 numeric" value="" onkeyup="calCredit('r',this,<?=$x_count;?>)">
			                                <span class="text-danger label-sm" id="maxCredit" data-json="<?=number_format($x_count,2);?>">(&lt;= <?=number_format($x_count,2);?>) </span> 
			                            </div>
			                        </div>  
			                    </div>
			                                        <div class="col-xs-12 col-sm-12">
			                        <div class="col-xs-12 col-sm-12 form-group">
			                            <label class="col-xs-6 col-sm-6 control-label"><strong><?=$lang_userList[34];?>:&nbsp;</strong></label>
			                            <div class="col-xs-6 col-sm-6">
			                                <input type="text" id="newCredit" name="newCredit" class="col-xs-12 col-sm-12 numeric" value="" 			readonly="true">
			                            </div>
			                        </div>
			                    </div>
			                </div>
			            </div>
			        </form>
			    </div>
			</div>
			
			<script type="text/javascript">
			  $('.numeric').autoNumeric();
			</script>

	<?

}else if($_POST["edType"] == "i")  // เพิ่ม
{
	

 // ยอดเครดิตทีเปิดให้ member 
  $d_incre = strtotime("-7 day");
  $sql = "select sum(b_total) as btotal from bom_tb_football_bill where  m_agent_id like '%*".$_POST["session"]["r_id"]."*%'  and r_cut_bet_4=0";
  $reb1 = sql_array($sql);
  $sql = "select sum(b_total) as btotal from bom_tb_lotto_bill_live where  m_agent_id like '%*".$_POST["session"]["r_id"]."*%' and b_status=5";
  $reb2 = sql_array($sql);
  $sql = "select sum(b_total) as btotal from bom_tb_lotto_hun_bill where  m_agent_id like '%*".$_POST["session"]["r_id"]."*%' and play_timestam >= $d_incre";
  $reb3 = sql_array($sql);
  $sql = "select sum(b_total) as btotal from bom_tb_games_bill_play where  m_agent_id like '%*".$_POST["session"]["r_id"]."*%' and play_timestam >= $d_incre";
  $reb4 = sql_array($sql);
  $sum_kank2 = $reb1["btotal"] + $reb2["btotal"] + $reb3["btotal"] + $reb4["btotal"];

  $sql = "select r_count as xtotal , r_type from bom_tb_agent where r_id=".$_POST["session"]["r_id"];
  $re4 = sql_array($sql);

  $rtype = "m_count";
  $sql = "select sum($rtype) as xtotal from bom_tb_member where  m_agent_id like '%*".$_POST["session"]["r_id"]."*%'";
  $re5 = sql_array($sql);

  // ยอดรวมเครดิตที่โอนให้ member
  $x_count_member = ($re5["xtotal"] + $sum_kank2);

  // ยอดเครดิตทีเปิดให้ agent 
  $lv = intval($_POST["session"]["r_level"])+1;

  // $sql="select r_count as xtotal from bom_tb_agent where   r_id= {$_POST[session][r_id]} ";
  // $re4=sql_array($sql);

  $sql = "select sum(r_count) as xtotal from bom_tb_agent where r_agent_id like '%*".$_POST["session"]["r_id"]."*%' and r_level=$lv ";
  $re5 = sql_array($sql);
  // ยอดรวมเครดิตที่โอนให้ agent
  $x_count2 = $re4["xtotal"] - $re5["xtotal"];

  $sql = "select * from bom_tb_agent where  r_agent_id like '%*".$_POST["session"]["r_id"]."*%'  and   r_id='".$_POST["id"]."' ";
  $rex = sql_array($sql);

  // $x_count3=$x_count2+($rex[r_count]-$sum_kank2);

  $x_count_agent = $re5["xtotal"];
  // เครดิตทั้งหมดที่มี ลบกับ  เครดิตที่ให้ member และ agent
  $x_count3 = $re4["xtotal"] - ($x_count_agent + $x_count_member);

  if($x_count3 <=0 )
  {
    $x_count3=0;
  }



  $rex["r_name"] = ($rex["r_name"] != "") ? $rex["r_name"] : $lang_userList[15];

?>

<br>
<div class="widget-box">
    <div class="widget-header ">
        <h4 class="widget-title lighter"><strong> <font class="blue">  <?=$rex["r_user"];?> (<?=$rex["r_name"];?>)</font> </strong></h4>
        <?php /* ?><div style="float: right; padding: 10px; color: red;"><?=number_format($re4[xtotal],2);?> </div>*/?>
    </div>
    <div class="widget-body">
        <form class="form-horizontal" id="" action="" method="post">
            <div class="widget-main">
                <div class="row">
                    <div class="col-xs-12 col-sm-12">
                        <div class="col-xs-12 col-sm-12 form-group">
                            <label class="col-xs-6 col-sm-6 control-label"><strong><?=$lang_userList[17];?>:&nbsp;</strong></label>
                            <div class="col-xs-6 col-sm-6">
                                <input type="text" id="credit" name="credit" class="col-xs-12 col-sm-12 numeric" value="<?=number_format($rex["r_count"],2);?>" readonly="true">
                            </div>
                        </div>
                    </div>
                    <div class="col-xs-12 col-sm-12">
                        <div class="col-xs-12 col-sm-12 form-group">
                            <label class="col-xs-6 col-sm-6 control-label"><strong><?=$lang_userList[35];?>:&nbsp;</strong></label>
                            <div class="col-xs-6 col-sm-6">
                                <input type="text" id="increaseCredit" name="increaseCredit" class="col-xs-12 col-sm-12 numeric" value="" onkeyup="calCredit('i',this,<?=$x_count3;?>);">
								<span class="text-danger label-sm" id="maxCredit" data-json="<?=number_format($x_count3);?>">(&lt;= <?=number_format($x_count3,2);?>) </span>
                                
                            </div>
                        </div>
                    </div>
                    <div class="col-xs-12 col-sm-12">
                        <div class="col-xs-12 col-sm-12 form-group">
                            <label class="col-xs-6 col-sm-6 control-label"><strong><?=$lang_userList[34];?>:&nbsp;</strong></label>
                            <div class="col-xs-6 col-sm-6">
                                <input type="text" id="newCredit" name="newCredit" class="col-xs-12 col-sm-12 numeric" value="" readonly="true">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>
</div>

<script type="text/javascript">
  $('.numeric').autoNumeric();
</script>
	<?
}

 ?>