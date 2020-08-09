
<?php 
  if($_SESSION["AGlang"]==""){
    $_SESSION["AGlang"]="th";
  }
  require('../../conn.php');
  require('../../function.php');
  require('../../../lang/ag_lang.php');

  // ยอดเครดิตทีเปิดให้ agent 
  $lv = intval($_POST["session"]["r_level"])+1;
  $up_lv  = intval($_POST["session"]["r_level"])+1;

  // $sql = "select r_count as xtotal from bom_tb_agent where r_id= ".$_POST["session"]["r_id"];
  // $re4 = sql_array($sql);
  // $sql = "select sum(r_count) as xtotal from bom_tb_agent where r_agent_id like '%*".$_POST["session"]["r_id"]."*%' and r_level=$lv ";
  // $re5 = sql_array($sql);

  // $x_count2 = $re4["xtotal"] - $re5["xtotal"];
  // $sql = "select * from bom_tb_agent where  r_agent_id like '%*".$_POST["session"]["r_id"]."*%'  and   r_id='$_POST[id]' ";
  // $rex = sql_array($sql);

  // // ยอดรวมเครดิตที่โอนให้ agent
  // $x_count_agent = $re5["xtotal"];


  // // ยอดเครดิตทีเปิดให้ member 
  // $d_incre = strtotime("-7 day");
  // $sql="select sum(b_total) as btotal , sum( 
  // (ROUND(  b_sum ,10))    
  //    ) as t1 from bom_tb_football_bill_live where  r_id = '".$_POST["session"]["r_id"]."' and b_accept!=2 and b_status=5 and r_cut_bet_4=0";
  
  // $reb1=sql_array($sql);
  // $sql="select sum(b_total) as btotal , sum( 
  // (ROUND(  b_pay ,10))  
  //    ) as t1 from bom_tb_lotto_bill_live where  r_id = '".$_POST["session"]["r_id"]."' and b_accept!=0 and b_status=5";
  // $reb2=sql_array($sql);
  
  // $sql="select sum(b_total) as btotal , sum( 
  // (ROUND(  b_pay ,10))  
  //    ) as t1 from bom_tb_games_bill_play_live where  r_id = '".$_POST["session"]["r_id"]."' and b_accept!=2 and and play_status=7  and play_timestam >= $d_incre";
  // $reb4=sql_array($sql);
  
  // $sum_kank2=$reb1["t1"]+$reb2["t1"]+$reb3["t1"]+$reb4["t1"];


  // $rtype = "m_count_de";
  // $sql = "select sum($rtype) as xtotal from bom_tb_member where m_agent_id like '%*".$_POST["session"]["r_id"]."*%'  and m_level=$up_lv";
  // $re5 = sql_array($sql);
  // $sql_xx = $sql;

  // // ยอดรวมเครดิตที่โอนให้ member
  // $x_count_member = ($re5["xtotal"]);

  // // เครดิตทั้งหมดที่มี ลบกับ  เครดิตที่ให้ member และ agent
  // $x_count3 = ($re4["xtotal"]-$sum_kank2) - ($x_count_agent + $x_count_member);

  $load_session = $_POST["session"];
  include "../../../get_balance.php";


  
  $sql = "select * from bom_tb_member where m_agent_id like '%*".$_POST["session"]["r_id"]."*%' and m_id='$_POST[id]' ";
  $rex = sql_array($sql);
  $rex["m_name"] = ($rex["m_name"] != "") ? $rex["m_name"] : $lang_ag[273];
  
  


  // ลบ
  if($_POST[edType] == "r")
  {

?>
    <br>
    <div class="widget-box">
      <div class="widget-header ">
        <h4 class="widget-title lighter"><strong> <font class="blue"> <?=$rex["m_user"];?> (<?=$rex["m_name"];?>)  </font> </strong></h4>
      </div>
      <div class="widget-body">
        <form class="form-horizontal" id="" action="" method="post">
          <div class="widget-main">
            <div class="row">
              <div class="col-xs-12 col-sm-12">
                <div class="col-xs-12 col-sm-12 form-group">
                  <label class="col-xs-6 col-sm-6 control-label"><strong><?=$lang_ag[423];?>:&nbsp;</strong></label>
                  <div class="col-xs-6 col-sm-6">
                    <input type="text" id="credit" name="credit" class="col-xs-12 col-sm-12 numeric" value="<?=number_format($rex["m_count"],2);?>" readonly="true">
                  </div>
                </div>
              </div>
              <div class="col-xs-12 col-sm-12">
                <div class="col-xs-12 col-sm-12 form-group">
                  <label class="col-xs-6 col-sm-6 control-label"><strong><?=$lang_ag[530];?>:&nbsp;</strong></label>
                  <div class="col-xs-6 col-sm-6">
                    <input type="text" id="reduceCredit" name="reduceCredit" class="col-xs-12 col-sm-12 numeric" value="" onkeyup="calCredit('r',this,<?=$rex['m_count'];?>);">
                    <span class="text-danger label-sm" id="maxCredit" data-json="<?=number_format($x_count4);?>">(&lt;= <?=number_format($rex["m_count"],2);?>) </span>
                  </div>
                </div>
              </div>
              <div class="col-xs-12 col-sm-12">
                <div class="col-xs-12 col-sm-12 form-group">
                  <label class="col-xs-6 col-sm-6 control-label"><strong><?=$lang_ag[558];?>:&nbsp;</strong></label>
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
  }
  // เพิ่ม
  else if($_POST['edType'] == "i")
  {

?>
    <br>
    <div class="widget-box">
      <div class="widget-header ">
        <h4 class="widget-title lighter"><strong> <font class="blue"> <?=$rex["m_user"];?> (<?=$rex["m_name"];?>) </font> </strong></h4>
        <?php /* ?><div style="float: right; padding: 10px; color: red;"><?=number_format($re4[xtotal],2);?> </div>*/?>
      </div>
      <div class="widget-body">
        <form class="form-horizontal" id="" action="" method="post">
          <div class="widget-main">
            <div class="row">
              <div class="col-xs-12 col-sm-12">
                <div class="col-xs-12 col-sm-12 form-group">
                  <label class="col-xs-6 col-sm-6 control-label"><strong><?=$lang_ag[423];?>:&nbsp;</strong></label>
                  <div class="col-xs-6 col-sm-6">
                    <input type="text" id="credit" name="credit" class="col-xs-12 col-sm-12 numeric" value="<?=number_format($rex["m_count"],2);?>" readonly="true">
                  </div>
                </div>
              </div>
              <div class="col-xs-12 col-sm-12">
                <div class="col-xs-12 col-sm-12 form-group">
                  <label class="col-xs-6 col-sm-6 control-label"><strong><?=$lang_ag[560];?>:&nbsp;</strong></label>
                  <div class="col-xs-6 col-sm-6">
                    <input type="text" id="increaseCredit" name="increaseCredit" class="col-xs-12 col-sm-12 numeric" value="" onkeyup="calCredit('i',this,<?=$x_count3;?>);">
                    <span class="text-danger label-sm" id="maxCredit" data-json="<?=number_format($x_count4);?>">(&lt;= <?=number_format($x_count3,2);?>) </span>
                  </div>
                </div>
              </div>
              <div class="col-xs-12 col-sm-12">
                <div class="col-xs-12 col-sm-12 form-group">
                  <label class="col-xs-6 col-sm-6 control-label"><strong><?=$lang_ag[558];?>:&nbsp;</strong></label>
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