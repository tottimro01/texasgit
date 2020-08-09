
<?php 
    if($_POST["session"]["AGlang"]=="")
    {
    $_POST["session"]["AGlang"]="th";
    }


  require('../../conn.php');
  require('../../function.php');
  require('../../../lang/ag_lang.php');

    //ถ้า เข้าสู่ระบบด้วย เอเย่นสำรอง
  if($_POST["session"]["uu_use"]!=0)
  {
    $sql="select * from bom_tb_agent where  r_id  = ".$_POST["session"]["rid"]."";
    $rs = sql_array($sql);
    $main_ag = $rs["r_user"];

  }
  else
  {
    $main_ag = $_POST["session"]["r_user"];
  }

    //ดึง credit 
        //$re4["xtotal"] คือ ยอดเครดิตทั้งหมด
        //$x_count_agent คือ ยอดเครดิตที่เปิดให้ agent
        //$x_count_member คือ ยอดเครดิตที่เปิดให้ member
        //$x_count3  คือ ยอดเครดิตคงเหลือ (ยอดเครดิตทั้งหมด หักลบ เครดิตที่เปิดให้ agent และ member)

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
        $sql = "select sum(r_count) as xtotal from bom_tb_agent where r_agent_id like '%*".$_POST["session"]["r_id"]."*%' and r_level=$lv ";
        $re5 = sql_array($sql);
        // ยอดรวมเครดิตที่โอนให้ agent
        $x_count2 = $re4["xtotal"] - $re5["xtotal"];
        
        $sql = "select * from bom_tb_agent where  r_agent_id like '%*".$_POST["session"]["r_id"]."*%'  and   r_id='".$_POST["id"]."' ";
        $rex = sql_array($sql);
        
        $x_count_agent = $re5["xtotal"];
        // เครดิตทั้งหมดที่มี ลบกับ  เครดิตที่ให้ member และ agent
        $x_count3 = $re4["xtotal"] - ($x_count_agent + $x_count_member);
        
        if($x_count3 <=0 )
        {
          $x_count3=0;
        }



  $id = $_POST["id"];
  $r_agent_id = $_POST["session"]["r_agent_id"].$_POST["session"]["r_id"]."*";
  $lv = intval($_POST["session"]["r_level"])+1;

  if($_POST["dtype"] == "a")
  {
     $sql="select * from bom_tb_agent where r_id = {$id}";
     $rs = sql_array($sql);
     $user = $rs["r_user"];
  }else
  {
     $sql="select * from bom_tb_member where m_id = {$id}";
     $rs = sql_array($sql);
     $user = $rs["m_user"];
  } 



 
?>

<style>
  .form-group.copy-group .input-group
  {
      width: 90%!important;
      display: inline-flex;
  }
   @media (max-width: 990px) { 
    .form-group.copy-group div{
      padding-top: 0%!important;

    }
  }

</style>

<br>
<div class="widget-box">
    <div class="widget-header widget-header-blue widget-header-flat">
        <h4 class="widget-title lighter"><strong> <?=$lang_ag[1911];?> <font style="color:#c90000">[ <?=$user;?> ]</font> </strong></h4>
    </div>
    <div class="widget-body">
        <form class="form-horizontal" id="" action="" method="post">
            <div class="widget-main"><div class="row"><div class="col-xs-12">
                <div class="form-group copy-group">
                    <label class="col-xs-3 col-sm-4 control-label no-padding-right"><strong><?=$lang_ag[1396];?> :</strong></label>
                    <div class="col-xs-8 col-sm-5">
                        <div class="input-group">
                            <span class="input-group-addon">
                                <strong> <?=$main_ag;?> </strong>
                                <input type="hidden" name="usermain" value="mmaxPa"> 
                            </span>
                            <input type="text" id="usernameCopy" name="usernameCopy" maxlength="5" class="col-xs-12 col-sm-12 inputEngNum">
                        </div>
                        <span class="text-danger">  * </span>
                    </div>
                </div>
                <div class="form-group copy-group">
                    <label class="col-xs-3 col-sm-4 control-label no-padding-right"><strong><?=$lang_ag[1393];?> : </strong></label>
                    <div class="col-xs-8 col-sm-5">
                      <div class="input-group">
                        <input type="password" id="password" name="password" class="col-xs-12 col-sm-12">
                      </div>
                      <span class="text-danger">  * </span>
                    </div>
                </div>
                <div class="form-group copy-group">
                    <label class="col-xs-3 col-sm-4 control-label no-padding-right"><strong><?=$lang_ag[423];?> : </strong></label>
                    <div class="col-xs-8 col-sm-5">
                        <input type="text" id="credit" name="credit" class="col-xs-12 col-sm-12 numeric" value="0.00" onkeyup="calCreditMax(this,<?=$x_count3;?>);" style="width: 90%!important;"> 
                        <span class="text-danger" id="max_credit" data-json="<?=$x_count3;?>"> (Max = <?=number_format($x_count3,2);?>) </span>
                    </div>
                </div>
                <div class="form-group copy-group">
                    <label class="col-xs-3 col-sm-4 control-label no-padding-right"><strong><?=$lang_ag[405];?> : </strong></label>
                    <div class="col-xs-8 col-sm-5">
                      <div class="input-group">
                        <input type="text" id="name" name="name" class="col-xs-12 col-sm-12">
                      </div>
                      <span class="text-danger">  * </span>
                    </div>
                </div>
                <?php if($_POST["dtype"] == "M"){ ?>
                 <div class="form-group copy-group">
                  <label class='col-xs-12 col-sm-4 control-label no-padding-right'><strong><?=$lang_ag[310];?> : </strong></label>
                  <div class='col-xs-12 col-sm-5'>
                    <div class="input-group">
                      <input type='text' name='m_b_code' id='m_b_code'  maxlength='10' minlength='10' placeholder='<?=$lang_ag[227];?> 10 <?=$lang_memberMember[110];?>' style='width: 100%;'>
                    </div>
                  </div>
                </div>

                <div class="form-group copy-group">
                  <label class='col-xs-12 col-sm-4 control-label no-padding-right'><strong><?=$lang_ag[168];?> : </strong></label>
                  <div class='col-xs-12 col-sm-5'>
                    <div class="input-group">
                    <select class='form-control sl-width input-sm' name='m_b_bank' id='m_b_bank' style='width: 100%;'>
                        <option value=' ' > <?=$lang_ag[257];?> </option>  
                        <?php 
                            foreach ($arr_bank as $key => $value) {
                               
                              ?>
                              <option value='<?=$key;?>' > <?=$value;?> </option>
                              <?
                            }

                         ?>
                                
                    </select>
                  </div>
                  </div>
                </div>

                <div class="form-group copy-group">
                  <label class='col-xs-12 col-sm-4 control-label no-padding-right'><strong><?=$lang_ag[311];?> : </strong></label>
                  <div class='col-xs-12 col-sm-5'>
                    <div class="input-group">
                      <input type='text' name='m_b_name' id='m_b_name'  placeholder='' style='width: 100%;'>
                    </div>
                  </div>
                </div>

                <div class="form-group copy-group">
                  <label class='col-xs-12 col-sm-4 control-label no-padding-right'><strong><?=$lang_ag[1667];?> : </strong></label>
                  <div class='col-xs-12 col-sm-5'>
                    <div class="input-group">
                      <input type='text' id='m_b_pass' name='m_b_pass' class='input-num'  maxlength='4' placeholder='<?=$lang_ag[1669];?>' style='width: 100%;'>
                    </div>
                  </div>
                </div>
                <?php } ?>




            </div></div></div>
        </form>
    </div>
</div>
<script type="text/javascript">
    $('.numeric').autoNumeric();
</script>