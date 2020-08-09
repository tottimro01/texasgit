<? 


 if($_POST["session"]["AGlang"]=="")
  {
    $_POST["session"]["AGlang"]="th";
  }

  
  require('../conn.php');
  require('../function.php');
  require('../ag_function.php');
  require('../../lang/ag_lang.php');
  require('../../lang/function_array.php');

  // print_r($_POST);
?>

<link rel="stylesheet" href="assets/css/custom/member_detail_temp.css">

<?php 

$r_agent_id = $_POST["session"]["r_agent_id"];
$sql="select * from bom_tb_agent where  r_agent_id like '%$r_agent_id%' and r_id = ".$_POST["session"]["rid"]." and r_level=".intval($_POST["session"]["r_level"])."";
$rs = sql_array($sql);

$r_sport_step_dis   = explode(",", $rs["r_sport_step_dis"]);

$parent_r_sport_step2   = explode(",", $rs["r_sport_step2"]);
$r_name = $rs["r_user"];

$r_agent_id_level = explode("*", $_POST["session"]["r_agent_id"].$rs["r_id"]."*");
$sql = "select r_id, r_open from bom_tb_agent where r_id in (".implode(",",array_filter($r_agent_id_level)).")";

$result_level = sql_query($sql);
while($sum = sql_fetch_as($result_level)){
    $result_r_open[$sum["r_id"]] = explode(",",$sum["r_open"]);
}

$r_open = array('1'=>true,'2'=>true,'3'=>true,'4'=>true,'5'=>true,'6'=>true,'7'=>true,'8'=>true,'9'=>true,'10'=>true,'11'=>true,'12'=>true);
foreach ($result_r_open as $key => $value) {
    foreach ($value as $key_r_open => $value_r_open){
        if($key_r_open != 0){
            if($value_r_open == 1){
                if($r_open[$key_r_open] != false){
                    $r_open[$key_r_open] = true;
                }
            }
            else{
                $r_open[$key_r_open] = false;
            }
        }
    }
}

$sql="select * from bom_tb_member where  m_agent_id like '%*".$_POST["session"]["r_id"]."*%'  and   m_id='".$_POST["id"]."' ";
$rs=sql_array($sql);

$ex_m_open =  explode(",", $rs["m_open"]); 

$m_name = $rs["m_user"];
$m_nam   =  $rs["m_nam"];
$m_sport_nam_tor   = explode(",", $rs["m_sport_nam_tor"]);
$m_sport_nam_rong   = explode(",", $rs["m_sport_nam_rong"]);       
$m_sport_dis   = explode(",", $rs["m_sport_dis"]);
$m_sport_max   = explode(",", $rs["m_sport_max"]);
$m_sport_min   = explode(",", $rs["m_sport_min"]);
 
$m_sport_step_max   = explode(",", $rs["m_sport_step_max"]);
$m_sport_step_min   = explode(",", $rs["m_sport_step_min"]);
$m_sport_step_day   = explode(",", $rs["m_sport_step_day"]);
$m_sport_step_paymax   = explode(",", $rs["m_sport_step_paymax"]);
$m_sport_step2   = explode(",", $rs["m_sport_step2"]);
$m_sport_step_dis   = explode(",", $rs["m_sport_step_dis"]);

$m_sport_share   = explode(",", $rs["m_sport_share"]);
$m_sport_share_live   = explode(",", $rs["m_sport_share_live"]);

$m_sport_force   = explode(",", $rs["m_sport_force"]);
$m_sport_force_live   = explode(",", $rs["m_sport_force_live"]);

$m_lotto_share   = explode(",", $rs["m_lotto_share"]);
$m_lotto_myshare   = explode(",", $rs["m_lotto_myshare"]);
$m_lotto_max  = explode(",", $rs["m_lotto_max"]);
$m_lotto_min  = explode(",", $rs["m_lotto_min"]);
$m_lotto_open   = explode(",", $rs["m_lotto_open"]);
$m_lotto_pay1   = explode(",", $rs["m_lotto_pay1"]);
$m_lotto_dis1   = explode(",", $rs["m_lotto_dis1"]);
$m_lotto_pay2   = explode(",", $rs["m_lotto_pay2"]);
$m_lotto_dis2   = explode(",", $rs["m_lotto_dis2"]);
$m_lotto_pay3   = explode(",", $rs["m_lotto_pay3"]);
$m_lotto_dis3   = explode(",", $rs["m_lotto_dis3"]);
$bonus_m_id   = $rs["bonus_m_id"];
$m_lotto_hun_share   = explode(",", $rs["m_lotto_hun_share"]);
$m_lotto_hun_myshare   = explode(",", $rs["m_lotto_hun_myshare"]);
$m_lotto_hun_max  = explode(",", $rs["m_lotto_hun_max"]);
$m_lotto_hun_min  = explode(",", $rs["m_lotto_hun_min"]);
$m_lotto_hun_open   = explode(",", $rs["m_lotto_hun_open"]);
$m_lotto_hun_pay1   = explode(",", $rs["m_lotto_hun_pay1"]);
$m_lotto_hun_dis1   = explode(",", $rs["m_lotto_hun_dis1"]);
$m_lotto_hun_pay2   = explode(",", $rs["m_lotto_hun_pay2"]);
$m_lotto_hun_dis2   = explode(",", $rs["m_lotto_hun_dis2"]);
$m_lotto_hun_pay3   = explode(",", $rs["m_lotto_hun_pay3"]);
$m_lotto_hun_dis3   = explode(",", $rs["m_lotto_hun_dis3"]);

$m_lotto_hun_set_pay   = explode(",", $rs["m_lotto_hun_set_pay"]);
$m_lotto_hun_set_price   = explode(",", $rs["m_lotto_hun_set_price"]);

$m_games_dis   = explode(",", $rs["m_games_dis"]);
$m_games_share   = explode(",", $rs["m_games_share"]);
$m_games_myshare   = explode(",", $rs["m_games_myshare"]);
$m_games_max   = explode(",", $rs["m_games_max"]);
$m_games_min   = explode(",", $rs["m_games_min"]);

$m_casino_share = explode(",", $rs["m_casino_share"]);
$m_casino_dis   = explode(",", $rs["m_casino_dis"]);
$m_casino_max   = explode(",", $rs["m_casino_max"]);
$m_casino_min   = explode(",", $rs["m_casino_min"]);
$m_casino_open = explode(',', $rs["m_casino_open"]);

 //ดึง credit 
    //$re4["xtotal"] คือ ยอดเครดิตทั้งหมด
    //$x_count_agent คือ ยอดเครดิตที่เปิดให้ agent
    //$x_count_member คือ ยอดเครดิตที่เปิดให้ member
    //$x_count3  คือ ยอดเครดิตคงเหลือ (ยอดเครดิตทั้งหมด หักลบ เครดิตที่เปิดให้ agent และ member)
  


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

  // $sql = "select r_count as xtotal , r_type from bom_tb_agent where r_id=".$_POST["session"]["r_id"];
  // $re4 = sql_array($sql);

  // $rtype = "m_count_de";
  // $sql = "select sum($rtype) as xtotal , m_count from bom_tb_member where  r_id = '".$_POST["session"]["r_id"]."' and m_id!='".$_POST["id"]."'";
  // $re5 = sql_array($sql);

  // // ยอดรวมเครดิตที่โอนให้ member
  // $x_count_member = ($re5["xtotal"] == "") ? 0 : $re5["xtotal"];
 
  // // ยอดเครดิตทีเปิดให้ agent 
  // $lv = intval($_POST["session"]["r_level"])+1;
  // $sql = "select sum(r_count) as xtotal from bom_tb_agent where r_agent_id like '%*".$_POST["session"]["r_id"]."*%' and r_level=$lv ";
  // $re5 = sql_array($sql);
  // // ยอดรวมเครดิตที่โอนให้ agent
  // $x_count2 = $re4["xtotal"] - $re5["xtotal"];

  // $sql = "select * from bom_tb_agent where  r_agent_id like '%*".$_POST["session"]["r_id"]."*%'  and   r_id='".$_POST["id"]."' ";
  // $rex = sql_array($sql);

  // $x_count_agent = $re5["xtotal"];
  // // เครดิตทั้งหมดที่มี ลบกับ  เครดิตที่ให้ member และ agent
  // $x_count3  = ($re4["xtotal"]-$sum_kank2)-$x_count_member;

  // if($x_count3 <=0 )
  // {
  //   $x_count3=0;
  // }


  $load_session = $_POST["session"];
  $m_id = $_POST["id"];
  include "../../get_balance_reduce.php";


 ?> 

<div class="row pdTop">
    <div class="col-xs-12 widthTable">
        <form class="form-horizontal" id="editMember_form" action="" method="post">
            <div class="widget-box no-skin widget-color">
                <div class="widget-header widget-header-blue">
                    <h4 class="widget-title lighter"><?=$lang_ag[1407];?> </h4>
                    <div class="widget-toolbar ">
                        <button type="button" class="btn btn-success btn-xs sBtForm" onclick="saveEditMember();">
                            <i class="ace-icon fa fa-floppy-o"></i>
                            <?=$lang_ag[178];?> 
                        </button>
                        <button type="reset" class="btn btn-danger  btn-xs sBtForm" onclick="btn_reset();">
                            <span class="fa fa-refresh icon-on-right bigger-110"></span>
                            <?=$lang_ag[179];?> 
                        </button>
                        <a onclick="getMenu('userList','?page=<?=$_POST["page"];?>&fuser=<?=$_POST["fuser"];?>');" style="color:#fff;">
                            <button type="button" class="btn btn-xs btn-inverse">
                                    <i class="ace-icon fa fa-list-ul bigger-110"></i>
                                    <?=$lang_ag[82];?> 
                            </button>
                        </a>
                    </div>
                    <div class="widget-toolbar no-border maxall">
                      <button type="button" class="btn btn-xs btn-white bigger btn-info btn-bold" onclick="setMaxAll();return false;">
                        <span class="normal"><?=$lang_ag[800];?></span>
                        <span class="mobile"><?=$lang_ag[1398];?></span>
                      </button>
                    </div>
                </div>
                <div class="widget-body">
                    <div class="widget-main">
                        
                            <div class="form-group">
                              
                                <div class="row">
                                  <div class="col-md-6">
                                      <div class="mb-10">
                                          <label class="control-label col-xs-8 col-sm-4 no-padding-right" for="username"> <?=$lang_ag[1396];?> :</label>
                                          <div class="col-xs-8 col-sm-8">
                                              <div class="input-group clearfix col-xs-12" style="width: 100%;">
                                                  <input type="text" id="username" name="username" value="<?=$rs["m_user"];?>" placeholder="<?=$lang_ag[1396];?>" class="inputEngNum" readonly="" style="width: 100%;">

                                              </div>
                                          </div>

                                      </div>

                                      <div class="mb-10">
                                          <input type="hidden" id="id" name="id" value="<?=$rs["m_id"];?>">
                                          <label class="control-label col-xs-8 col-sm-4 no-padding-right" for="name"> <?=$lang_ag[405];?> :</label>
                                          <div class="col-xs-8 col-sm-8">
                                              <div class="clearfix">
                                                  <input type="text" name="name" id="name" value="<?=$rs["m_name"];?>" placeholder="<?=$lang_ag[405];?>" style="width: 100%;">
                                              </div>
                                          </div>
                                      </div>

                                      <div class="mb-10">
                                          <label class="control-label col-xs-8 col-sm-4 no-padding-right" for="telephone"> <?=$lang_ag[596];?> :</label>
                                          <div class="col-xs-8 col-sm-8">
                                              <div class="clearfix">
                                                  <input type="tel" id="telephone" name="telephone" value="<?=$rs["m_phone"];?>" placeholder="<?=$lang_ag[596];?>" style="width: 100%;">
                                              </div>
                                          </div>

                                      </div>

                                      <div class="mb-10"> 
                                          <label  class="control-label col-xs-8 col-sm-4 no-padding-right" for="credit"> <?=$lang_ag[423];?> :</label>
                                          <div class="col-xs-8 col-sm-8">
                                            <div class="clearfix">
                                              <input type="text" name="credit" id="credit" value="<?=number_format($rs["m_count"],2);?>" class="numeric input-num2digt" placeholder="<?=$lang_ag[423];?>" onblur="calCredit(this,<?=$x_count3;?>);" style="width: 100%;">
                                              <span class="text-danger" id="max_credit" data-json="<?=number_format($x_count3,2);?>">(<?=$lang_ag[1398];?> = <?=number_format($x_count3,2);?>) </span>
                                            </div>
                                          </div>
                                      </div>
                                  </div>



                                  <div class="col-md-6 no-padding-left">
                                      
                                     

                                      <div class="mb-10">
                                        <label class="control-label col-xs-8 col-sm-4 no-padding-right" for="telephone"> <?=$lang_ag[168];?> :</label>
                                        <div class="col-xs-8 col-sm-8">
                                            <div class="clearfix">
                                                <select class="form-control sl-width input-sm" name="m_b_bank" id="m_b_bank" style="width: 100%;">
                                                      <option value="" > <?=$lang_ag[257];?> </option>   
                                                    <?php 

                                                        foreach ($arr_bank as $key => $value) {
                                                            $slt =  ($rs["m_b_bank"] == $key) ? " selected = \"\"" : "";
                                                         ?>
                                                            <option value="<?=$key;?>" <?=$slt;?> > <?=$value;?> </option>
                                                         <?
                                                        }
                                                     ?>
                                                </select>
                                            </div>
                                        </div>
                                      </div>

                                       <div class="mb-10">
                                          <label class="control-label col-xs-8 col-sm-4 no-padding-right" for="name"> <?=$lang_ag[310];?> :</label>
                                          <div class="col-xs-8 col-sm-8">
                                              <div class="clearfix">
                                                  <input type="text" name="m_b_code" id="m_b_code" value="<?=$rs["m_b_code"];?>" maxlength="10" minlength="10" placeholder="<?=$lang_ag[227];?> 10 <?=$lang_ag[1663];?>" style="width: 100%;">
                                              </div>
                                          </div>
                                      </div>

                                      <div class="mb-10">
                                        
                                          <label class="control-label col-xs-8 col-sm-4 no-padding-right" for="name"> <?=$lang_ag[311];?> :</label>
                                          <div class="col-xs-8 col-sm-8">
                                              <div class="clearfix">
                                                  <input type="text" name="m_b_name" id="m_b_name" value="<?=$rs["m_b_name"];?>" placeholder="" style="width: 100%;">
                                              </div>
                                          </div>
                                      </div>

                                      <div class="mb-10" style="display: none;">
                                          <label class="control-label col-xs-8 col-sm-4 no-padding-right" for="telephone"> <?=$lang_ag[1667];?> :</label>
                                          <div class="col-xs-8 col-sm-8">
                                              <div class="clearfix">
                                                  <input type="text" id="m_b_pass" name="m_b_pass" class="input-num" value="<?=$rs["m_b_pass"];?>" maxlength="4" placeholder="<?=$lang_ag[1669] ;?>" style="width: 100%;">
                                              </div>
                                          </div>
                                      </div>

                                      <div class="mb-10">
                                        <label class="control-label col-xs-8 col-sm-4 no-padding-right" for="name"> <?=$lang_ag[1665];?> :</label>
                                        <div class="col-xs-8 col-sm-8">
                                             <div class="clearfix">
                                                <select class="form-control sl-width input-sm" name="bank_id" id="bank_id" style="width: 100%;">
                                                    <option value="0"> <?=$lang_ag[257];?> </option>
                                                    
                                                    <?php 

                                                        $sql = "SELECT * FROM `bom_tb_bank` WHERE  r_id = ".$_POST["session"]["rid"]."";
                                                        $re = sql_query($sql);

                                                        while ($rs1 = sql_fetch_as($re)) {
                                                           $slt =  ($rs["bank_id"] == $rs1["bank_id"]) ? " selected = \"\"" : "";
                                                          
                                                            $bank_name = $arr_bank[$rs1['bank_name']];
                                                            ?> 
                                                                <option value="<?=$rs1['bank_id'];?>" <?=$slt;?> > <?=$bank_name;?> - <?=$rs1['bank_code'];?> - <?=$rs1['bank_cname'];?>  <?php  if($rs1['bank_note'] != "") { echo " - [ ".$rs1['bank_note']." ] "; }   ?>   </option>
                                                            <?
                                                        }
                                                     ?>
                                                </select> 
                                            </div>
                                        </div>
                                      </div>

                                  </div> 
                                </div>              

                            </div>
                   

                        

                        <div class="tabbable">
                            <ul class="nav nav-tabs padding-12 tab-color-blue background-blue">
                                        <li class="active">
                                            <a data-toggle="tab" href="#soccer" aria-expanded="true">
                                                <i class="menu-icon fa fa-futbol-o"></i>
                                                <h7><?=$lang_ag[2142];?></h7>
                                            </a>
                                        </li>
                                         <li class="">
                                            <a data-toggle="tab" href="#sport" aria-expanded="false">
                                                <i class="menu-icon fa fa-futbol-o"></i>
                                                <h7><?=$lang_ag[117];?></h7>
                                            </a>
                                        </li>
                                        <li>
                                          <a data-toggle="tab" href="#boxing"  aria-expanded="false">
                                            <i class="menu-icon fa fa-futbol-o"></i>
                                            <h7><?=$lang_ag[860];?></h7> 
                                          </a>
                                        </li>
                                        <li class="">
                                            <a data-toggle="tab" href="#step" aria-expanded="false">
                                                <i class="menu-icon fa fa-futbol-o"></i>
                                                <h7><?=$lang_ag[469];?></h7>
                                            </a>
                                        </li>
                                        <li class="">
                                            <a data-toggle="tab" href="#lotto" aria-expanded="false">
                                                <i class="menu-icon fa fa-retweet"></i>
                                                <h7><?=$lang_ag[137];?></h7>
                                            </a>
                                        </li>
                                        <li class="">
                                            <a data-toggle="tab" href="#lottoSet" aria-expanded="false">
                                                <i class="menu-icon fa fa-line-chart"></i>
                                                <h7><?=$lang_ag[159];?></h7>
                                            </a>
                                        </li>
                                        <li class="">
                                            <a data-toggle="tab" href="#lottoLao" aria-expanded="false">
                                                <i class="menu-icon fa fa-line-chart"></i>
                                                <h7><?=$lang_ag[161];?></h7>
                                            </a>
                                        </li>
                                        <li class="">
                                            <a data-toggle="tab" href="#game" aria-expanded="false">
                                                <i class="menu-icon fa fa-gamepad"></i>
                                                <h7><?=$lang_ag[477];?></h7>
                                            </a>
                                        </li>
                                        <li class="">
                                            <a data-toggle="tab" href="#casino" aria-expanded="false">
                                                <i class="menu-icon fa fa-puzzle-piece"></i>
                                                <h7><?=$lang_ag[172];?></h7>
                                            </a>
                                        </li>
                            </ul>
                            <div class="tab-content">
                                <!-- Soccer -->
                                <div id="soccer" class="tab-pane fade active in">
                                       
                                </div>
                                <!-- Sport -->
                                <div id="sport" class="tab-pane fade">
                                    
                                </div>
                                <!-- boxing -->
                                <div id="boxing" class="tab-pane fade">
                                    
                                </div>
                                <!-- Step -->
                                <div id="step" class="tab-pane fade">
                                    
                                </div>
                                <!-- Casino -->
                                <div id="casino" class="tab-pane fade">
                                    
                                </div>
                                <!-- Lotto -->
                                <div id="lotto" class="tab-pane fade">
                                    
                                </div>
                                <!-- Lotto Set -->
                                <div id="lottoSet" class="tab-pane fade">
                                    
                                </div>
                                <!-- Lotto Lao -->
                                <div id="lottoLao" class="tab-pane fade">
                                    
                                </div>
                                <!-- Lottery -->
                                <div id="lottery" class="tab-pane fade">
                                    <div class="form-group">
                                        <div class="col-xs-12 col-sm-4">
                                            <label class="control-label col-xs-5 col-sm-4 no-padding-right" for="6_0_lotto_com">ค่าคอม :</label>
                                            <div class="col-xs-7 col-sm-8">
                                                <div class="clearfix input-group">
                                                    <select class="form-control input-sm" id="6_0_lotto_com" name="lottery_com">
                                                         <option value="0" selected="">0</option>
                                                    </select>
                                                    <span class="input-group-addon">%</span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- Game -->
                                <div id="game" class="tab-pane fade">
                                    <div class="form-group">
                                        <div class="col-xs-12 col-sm-4">
                                            <label class="control-label col-xs-5 col-sm-4 no-padding-right" for="game_com">ค่าคอม :</label>
                                            <div class="col-xs-7 col-sm-8">
                                                <div class="clearfix input-group">
                                                    <select class="form-control input-sm" id="game_com" name="game_com">
                                                        <option value="0.00" selected="">0.00</option>
                                                        <option value="0.05">0.05</option>
                                                        <option value="0.10">0.10</option>
                                                        <option value="0.15">0.15</option>
                                                        <option value="0.20">0.20</option>
                                                        <option value="0.25">0.25</option>
                                                        <option value="0.30">0.30</option>
                                                    </select>
                                                    <span class="input-group-addon">%</span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- ========================= -->
                            </div>
                        </div>
                    </div>
                
                </div>
            </div></form>
        
    </div>
</div>

<script src="../../assets/js/selectize.js"></script>
<script src="../../assets/js/main.js"></script>
<script type="text/javascript">      

var m_open = <?=json_encode($ex_m_open);?>;
var m_lotto_open = <?=json_encode($m_lotto_open);?>;
var m_lotto_pay1 = <?=json_encode($m_lotto_pay1);?>;
var m_lotto_dis1 = <?=json_encode($m_lotto_dis1);?>;
var m_lotto_pay2 = <?=json_encode($m_lotto_pay2);?>;
var m_lotto_dis2 = <?=json_encode($m_lotto_dis2);?>;
var m_lotto_pay3 = <?=json_encode($m_lotto_pay3);?>;
var m_lotto_dis3 = <?=json_encode($m_lotto_dis3);?>;
var bonus_m_id = "<?=$bonus_m_id;?>";

var m_lotto_hun_open = <?=json_encode($m_lotto_hun_open);?>;
var m_lotto_hun_pay1 = <?=json_encode($m_lotto_hun_pay1);?>;
var m_lotto_hun_pay1 = <?=json_encode($m_lotto_hun_pay1);?>;
var m_lotto_hun_dis1 = <?=json_encode($m_lotto_hun_dis1);?>;
var m_lotto_hun_pay2 = <?=json_encode($m_lotto_hun_pay2);?>;
var m_lotto_hun_dis2 = <?=json_encode($m_lotto_hun_dis2);?>;
var m_lotto_hun_pay3 = <?=json_encode($m_lotto_hun_pay3);?>;
var m_lotto_hun_dis3 = <?=json_encode($m_lotto_hun_dis3);?>;
var m_lotto_hun_set_pay = <?=json_encode($m_lotto_hun_set_pay);?>;
var m_lotto_hun_set_price = <?=json_encode($m_lotto_hun_set_price);?>;

var m_casino_share = <?=json_encode($m_casino_share);?>;
var m_casino_dis = <?=json_encode($m_casino_dis);?>;
var m_casino_max = <?=json_encode($m_casino_max);?>;
var m_casino_min = <?=json_encode($m_casino_min);?>;
var m_casino_open = <?=json_encode($m_casino_open);?>;

var html_alerts="<div class='row'><div class='col-xs-6 col-sm-4'></div><div class='col-xs-6 col-sm-4'><h1 class='text-danger'><?=$lang_ag[1666];?></h1></div><div class='col-xs-6 col-sm-4'></div></div>";

var soccer_ary = {
    "soccer_today_active" : m_open[1],
    "soccer_live_active" : m_open[2],
    "today_com" : "<?=$m_sport_dis[1];?>",
    "torup" : "<?=$m_sport_nam_tor[1];?>",
    "logup" : "<?=$m_sport_nam_rong[1];?>",
    "live_betmoneymax_pair" : "<?=$m_sport_max[1];?>",
    "live_fbetmoneymax_pair" : "<?=$m_sport_max[2];?>",
    "live_betmax_money" : "<?=$m_sport_max[3];?>",
    "live_fbetmax_money" : "<?=$m_sport_max[4];?>",
    "live_betmin_money" : "<?=$m_sport_min[1];?>",
    "live_fbetmin_money" : "<?=$m_sport_min[2];?>",
    "m_nam" : "<?=$m_nam;?>",
    "m_name" : "<?=$m_name;?>",
    "r_open_agent" : "<?=$r_open[1];?>",
    "html_alerts" : html_alerts,
};

var sport_ary = {
    "sport_today_active" : m_open[3],
    "sport_live_active" : m_open[4],
    "sport_com" : "<?=$m_sport_dis[2];?>",
    "sport_betmoneymax_pair" : "<?=$m_sport_max[5];?>",
    "sport_betmax_money" : "<?=$m_sport_max[6];?>",
    "sport_betmin_money" : "<?=$m_sport_min[3];?>",
    "m_name" : "<?=$m_name;?>",
    "r_open_agent" : "<?=$r_open[3];?>",
    "html_alerts" : html_alerts,
};


var boxing_ary = {
    "boxing_today_active" : m_open[5],
    "boxing_live_active" : m_open[6],
    "boxing_com" : "<?=$m_sport_dis[3];?>",
    "boxing_betmoneymax_pair" : "<?=$m_sport_max[7];?>",
    "boxing_betmax_money" : "<?=$m_sport_max[8];?>",
    "boxing_betmin_money" : "<?=$m_sport_min[4];?>",
    "m_name" : "<?=$m_name;?>",
    "r_open_agent" : "<?=$r_open[5];?>",
    "html_alerts" : html_alerts,
};

var step_ary = {
    "step_active" : m_open[7],
    "step_min_pair" : "<?=$m_sport_step2[1];?>",
    "step_max_pair" : "<?=$m_sport_step2[2];?>",
    "step_betmax_money" : "<?=$m_sport_step_max[1];?>",
    "step_betmin_money" : "<?=$m_sport_step_min[1];?>",
    "step_daymax_money" : "<?=$m_sport_step_day[1];?>",
    "step_billmax_money" : "<?=$m_sport_step_paymax[1];?>",
    "k_step_share" : "<?=$m_sport_force[3];?>",
    "m_name" : "<?=$m_name;?>",
    "r_open_agent" : "<?=$r_open[7];?>",
    "html_alerts" : html_alerts,
};

var lotto_ary = {
    "lotto_active" : m_open[8],
    "m_lotto_open" : m_lotto_open,
    "m_lotto_max" : <?=$m_lotto_max[1];?>,
    "m_lotto_min" : <?=$m_lotto_min[1];?>,
    "lotto_pay1" : m_lotto_pay1,
    "lotto_dis1" : m_lotto_dis1,
    "lotto_pay2" : m_lotto_pay2,
    "lotto_dis2" : m_lotto_dis2,
    "lotto_pay3" : m_lotto_pay3,
    "lotto_dis3" : m_lotto_dis3,
    "bonus_m_id" : bonus_m_id,
    "m_name" : "<?=$m_name;?>",
    "r_open_agent" : "<?=$r_open[8];?>",
    "html_alerts" : html_alerts,
};



var lottoSet_ary = {
    "lotto_share_active" : m_open[9],
    "m_lotto_hun_open" : m_lotto_hun_open,
    "m_lotto_hun_max" : <?=$m_lotto_hun_max[1];?>,
    "m_lotto_hun_min" : <?=$m_lotto_hun_min[1];?>,
    "lotto_hun_pay1" : m_lotto_hun_pay1,
    "lotto_hun_dis1" : m_lotto_hun_dis1,
    "lotto_hun_pay2" : m_lotto_hun_pay2,
    "lotto_hun_dis2" : m_lotto_hun_dis2,
    "lotto_hun_pay3" : m_lotto_hun_pay3,
    "lotto_hun_dis3" : m_lotto_hun_dis3,
    "bonus_m_id" : bonus_m_id,
    "lotto_share" :"<?=$m_lotto_hun_share[1];?>",
    "k_8_lotto_share" :"<?=$m_lotto_hun_myshare[1];?>",
    "m_name" : "<?=$m_name;?>",
    "r_open_agent" : "<?=$r_open[9];?>",
    "html_alerts" : html_alerts,
};

var lottoLao_ary = {
    "lotto_lao_active" : m_open[10],
    "lot_hun_set_pay" : m_lotto_hun_set_pay,
    "lot_hun_set_price" : m_lotto_hun_set_price,
    "m_name" : "<?=$m_name;?>",
    "r_open_agent" : "<?=$r_open[10];?>",
    "html_alerts" : html_alerts,
};


var game_active_ary = {
    "game_active" : m_open[11],
    "game_com" :"<?=$m_games_dis[1];?>",
    "game_max" :"<?=$m_games_max[1];?>",
    "game_min" :"<?=$m_games_min[1];?>",
    "m_name" : "<?=$m_name;?>",
    "r_open_agent" : "<?=$r_open[11];?>",
    "html_alerts" : html_alerts,
};

var casino_ary = {
    "casino_active" : m_open[12],
    "casino_share" : m_casino_share,
    "rcb_maxtransfer" : m_casino_max,
    "rcb_mintransfer" : m_casino_min,
    "casino_com":m_casino_dis,
    "casino_open" : m_casino_open,
    "m_name" : "<?=$m_name;?>",
    "r_open_agent" : "<?=$r_open[12];?>",
    "html_alerts" : html_alerts,
};



loadBoxMember(soccer_ary,'soccer');
loadBoxMember(sport_ary,'sport');
loadBoxMember(boxing_ary,'boxing');
loadBoxMember(step_ary,'step');
loadBoxMember(lotto_ary,'lotto');
loadBoxMember(lottoSet_ary,'lottoSet');
loadBoxMember(lottoLao_ary,'lottoLao');
loadBoxMember(game_active_ary,'game');
loadBoxMember(casino_ary,'casino');
  

  function changeLowerValue(e)
  {
      var thisVal = $(e).val();
      var thisIndex = $(e).attr("data-index");

       $("#step .sl_step").each(function(i,e) {
            var index = $(this).attr("data-index");
            if(parseInt(index) > parseInt(thisIndex))
            {
              $('#stepcom'+index+'').val(thisVal); 
            }
        }); 
  }

  function change_set_min_pair(_min_df,_max_df,max_trigger=false){

    var r_sport_step_dis = <?=json_encode($r_sport_step_dis);?>;
    var m_sport_step_dis = <?=json_encode($m_sport_step_dis);?>;
    var data_min = +$("#step_min_pair").val();
    var data_max = +$("#step_max_pair").val();
    var _min_df = <?=$parent_r_sport_step2[1];?>;
    var _max_df = <?=$parent_r_sport_step2[2];?>;
    
    var min_sl = ""
    for(i=_min_df; i<=(data_max-1); i++) {
      var sl = (data_min == i) ? "selected = 'selected'" : '';
      min_sl += "<option "+sl+" value="+i+">"+i+"</option>";
    }
    $('#step_min_pair').html('');
    $("#step_min_pair").append(min_sl);

    var max_sl = ""
      for(i=(data_min+1); i<=_max_df; i++) {
      var sl = (data_max == i) ? "selected = 'selected'" : '';
      max_sl += "<option "+sl+" value="+i+">"+i+"</option>";
    }
    $('#step_max_pair').html('');
    $("#step_max_pair").append(max_sl);

    $.ajax({
      url: 'inc/temp/memberUserList/create_dis_step_M.php',
      type: 'POST',
      dataType: 'html',
      data: {data_min: data_min , data_max :data_max , m_sport_step_dis:m_sport_step_dis , r_sport_step_dis:r_sport_step_dis},
    })
    .done(function(data) {
      $('#test').text('')
      $('#test').append(data);

       if(max_trigger) // ถ้าเรียกฟังชั่นมากจากปุ่มค่าสูงสุด
       {
            $("#step .sl_com").each(function(i,e) {
                 $(this).val($(this).children('option:last').val()) 
            });
       }
    })
    .fail(function() {
      console.log("error");
    })
    .always(function() {
      console.log("complete");
    });
  }


    function loadBoxMember(arr,type){


        $.ajax({
            url: path_host+'loadBox/loadBoxMember.php',
            type: 'POST',
            data: {arr:arr,type:type,flagtor:'N',mid:<?=$_POST['id'];?>},
            dataType: 'json',
            success: function (response) {
                $("#"+type).html(response.temp);
                if(type == 'step')
                {
                    change_set_min_pair(2,20);
                }
            },
            error: function (response) {
                console.log(response);
            }
        });
    }

    function btn_reset()
    {

    }

    

    function saveEditMember(type){


        if($("#m_b_code").val().length < 10 && $("#m_b_code").val().length > 0 )
        {
          errorAlert('<?=$lang_ag[1668];?>');
          return false;
        }else  if($("#m_b_pass").val().length < 4 && $("#m_b_pass").val().length > 0 )
        {
          errorAlert('<?=$lang_ag[1669];?>');
          return false;
        }

        var serializeFrm = $("form").serializeArray();
        
        pageContentLoader("show");
        $.ajax({
            url: path_host+'memberUserList/editMemberSave.php',
            type: 'POST',
            data: serializeFrm,
            dataType: 'json',
            success: function (response) {
             
                 pageContentLoader("hide");
                if(response.status){
                    $.gritter.add({
                        title: "",
                        text: '<h5><i class="fa fa-check" aria-hidden="true"></i> '+response.msg+'</h5>',
                        class_name: 'gritter-success'
                    });
                    
                }else{
                    $.gritter.add({
                        title: "",
                        text: '<h5><i class="fa fa-ban" aria-hidden="true"></i> '+response.msg+'</h5>',
                        class_name: 'gritter-error'
                    });
                    if(response.warningInput){
                       alertWrongInput(response.tab,response.id);
                    }
                }
            },
            error: function (response) {
                console.log(response);
            }
        });
    }

    function generateSL(v,tag,plus){
    var select = document.getElementById(tag.id);
    if(select.length == 1){
      if(plus){
        for(var i = 1 ; i <= v; i++){
          var opt = document.createElement('option');
          opt.value = i;
          opt.innerHTML = i;
          select.appendChild(opt);
        }
      }else{
        for(var i = v ; i >= 0; i--){
          var opt = document.createElement('option');
          opt.value = i;
          opt.innerHTML = i;
          select.appendChild(opt);
        }
      }
    }
  }
  
    function generateSL2(v,tag){
        var select = document.getElementById(tag.id);
        if(select.length == 1){
        for(var i = 0.05 ; parseFloat(i).toFixed(2) <= parseFloat(v).toFixed(2); i = i+ 0.05){
            var opt = document.createElement('option');
            opt.value = i.toFixed(2);
            opt.innerHTML = i.toFixed(2);
            select.appendChild(opt);
        }
        }
    }

    function setMaxAll(){
      var list = ['soccer','sport','boxing','step','casino','lotto','lotto_set','lotto_lao','lottery','game'];
      $.each(list,function(k,v){
        setMax(v);
      });
    }

    function setMax(game){
    switch (game){
      case 'soccer' :
        $('#today_com').val($('#today_com').children('option:last').val());
        $('#logup').val($('#k_logup').data('json'));  
        $('#torup').val($('#k_torup').data('json'));
        $('#live_betmoneymax_pair').val($('#k_live_betmoneymax_pair').data('json'));    
        $('#live_betmax_money').val($('#k_live_betmax_money').data('json'));    
        $('#live_betmin_money').val($('#k_live_betmin_money').data('json'));    
        $('#live_fbetmoneymax_pair').val($('#k_live_fbetmoneymax_pair').data('json'));    
        $('#live_fbetmax_money').val($('#k_live_fbetmax_money').data('json'));    
        $('#live_fbetmin_money').val($('#k_live_fbetmin_money').data('json'));    
      break;

      case 'sport' :
        $('#sport_com').val($('#k_sport_com').data('json'));   
        $('#sport_betmoneymax_pair').val($('#k_sport_betmoneymax_pair').data('json'));   
        $('#sport_betmax_money').val($('#k_sport_betmax_money').data('json'));   
        $('#sport_betmin_money').val($('#k_sport_betmin_money').data('json'));   
      break;
      case 'boxing' :
        $('#boxing_com').val($('#k_boxing_com').data('json'));   
        $('#boxing_betmoneymax_pair').val($('#k_boxing_betmoneymax_pair').data('json'));   
        $('#boxing_betmax_money').val($('#k_boxing_betmax_money').data('json'));   
        $('#boxing_betmin_money').val($('#k_boxing_betmin_money').data('json'));   
      break;
      case 'step' :
        $('#stepcom1').val($('#k_stepcom1').data('json'));
        $('#stepcom2').val($('#k_stepcom2').data('json')); 
        $('#stepcom3').val($('#k_stepcom3').data('json')); 
        $('#stepcom5').val($('#k_stepcom5').data('json')); 
        $('#stepcom7').val($('#k_stepcom7').data('json')); 
        $('#stepcom9').val($('#k_stepcom9').data('json')); 
        $('#stepcom11').val($('#k_stepcom11').data('json')); 
        $('#step_betmax_money').val($('#k_step_betmax_money').data('json')); 
        $('#step_betmin_money').val($('#k_step_betmin_money').data('json')); 
        $('#step_daymax_money').val($('#k_step_daymax_money').data('json')); 
        $('#step_billmax_money').val($('#k_step_billmax_money').data('json')); 
        $('#step_max_pair').val($('#k_step_max_pair').data('json')); 
        $('#step_min_pair').val($('#k_step_min_pair').data('json')); 

        var max_pair = $('#k_step_max_pair').data('json');
        var min_pair = $('#k_step_min_pair').data('json');

        var min_sl = ""
        for(i=min_pair; i<=max_pair; i++) {
           min_sl += "<option value="+i+">"+i+"</option>";
        }
        $('#step_min_pair').html('');
        $("#step_min_pair").append(min_sl);
        
        var max_sl = ""
        for(i=min_pair; i<=max_pair; i++) {
          var sl = (max_pair == i) ? "selected = 'selected'" : '';
          max_sl += "<option "+sl+" value="+i+">"+i+"</option>";
        }
        $('#step_max_pair').html('');
        $("#step_max_pair").append(max_sl);

        change_set_min_pair(2,20,true); 

      

      break;

      case 'casino' :
       
        $( "#casino .maxLimit" ).each(function() {
          var data = $( this ).closest('.casino_Input').children('.maxtransfer').data('json')
          $( this ).val(data);
        }); 
      break;

      case 'lotto' :

        $('#lotto_betmax_money').val($('#k_lotto_betmax_money').data('json')); 
        $('#lotto_betmin_money').val($('#k_lotto_betmin_money').data('json'));
        $( "#lotto .maxLimit:not([readonly=\"readonly\"]" ).each(function() {
          var data = $( this ).closest('td').children('.maxtransfer').data('json')
          $( this ).val(data);
        });    

         $( "#lotto .sl_lotto_com:not(\".block_select\")" ).each(function() {
             $(this).val($(this).children('option:last').val())  
         });
      break;

      case 'lotto_set' :

        $('#lotto_share_hun_betmax_money').val($('#k_lotto_share_hun_betmax_money').data('json')); 
        $('#lotto_share_hun_betmin_money').val($('#k_lotto_share_hun_betmin_money').data('json')); 
        $( "#lottoSet .maxLimit:not([readonly=\"readonly\"]" ).each(function() {
            var data = $( this ).closest('td').children('.maxtransfer').data('json')
            $( this ).val(data);
        });

        $( "#lottoSet .sl_lotto_set_com:not(\".block_select\")" ).each(function() {
            $(this).val($(this).children('option:last').val())
        });
      break;

      case 'lotto_lao' :
       
      $( "#lotto_lao .maxLimit" ).each(function() {
        var data = $( this ).closest('.lotto_lao_Input').children('.maxtransfer').data('json')
        $( this ).val(data);
      });   
      break;

      case 'lottery' :
        $('#6_0_lotto_com').val($('#k_6_0_lotto_com').data('json')); 
      break;

      case 'game' :
        $('#game_com').val($('#k_game_com').data('json')); 

      break;
    }
  }

function close_lotto(e,_index,type,_zone)
{

  var _this_input = $('#'+_zone+'_pay'+type+'_'+_index);
  var _this_select = $('#'+_zone+'_com'+type+'_'+_index);
  var _this_chk = $('.'+_zone+'_chk'+type);
  var _this_chk_all = $('#'+_zone+'_chk'+type+'_all');

  if($(e).is(':checked')) {

      var max_val = _this_input.closest('td').children('span').data("json");
      _this_input.val(max_val).attr("readonly",false);
      _this_select.val(_this_select.children('option:last').val());   
      _this_select.removeClass('block_select');
      $(e).closest('tr').removeClass('_disabled');

  }else {
      _this_input.val("0").attr("readonly",true);
      _this_select.val(_this_select.children('option:first').val()); 
      _this_select.addClass('block_select');
      $(e).closest('tr').addClass('_disabled');
  }

  var chk = true;
  $(_this_chk).each(function(){
       if(!$(this).prop('checked')){
          chk = false;
       }
   }); 

  $(_this_chk_all).prop("checked",chk);
}


function close_lotto_all(_class,type,_zone)
{
  var _this_chk = $('.'+_zone+'_chk'+type);

   if($(_class).is(':checked')) {
      $(_this_chk).each(function(){
          if(!$(this).prop('checked')){
              $(this).trigger("click");
          }
      }); 
  }else {
      $(_this_chk).each(function(){
          if($(this).prop('checked')){
              $(this).trigger("click");
          }
      }); 
  }

}  

function setExNam(e)
{
  let _change_red = 0; // ส่วนต่าง
  let _change_black = 0; // ส่วนต่าง
  let result = 0; // ส่วนต่าง
  let o_m_nam  = $(e).data("nam");// ค่าน้ำเก่า
  let c_m_name = $(e).val(); //  ค่าน้ำปัจจุบัน

  let black_data = parseFloat($("#nam_black").data("change")); 
  let red_data = parseFloat($("#nam_red").data("change")); 

  if(c_m_name > o_m_nam) // เพิ่ม
  {
    _change_red  = parseInt(c_m_name)-parseInt(o_m_nam);
    _change_red  =_change_red*0.01;

    result     = black_data+_change_red;
    $("#nam_red #_change").text("-"+result.toFixed(2));

    _change_black  = parseInt(o_m_nam)-parseInt(c_m_name);
    _change_black  = red_data+(_change_black*0.01);
    $("#nam_black #_change").text(_change_black.toFixed(2));         

  }else if(c_m_name < o_m_nam) {  // ลด
  
    _change_black  = parseInt(o_m_nam)-parseInt(c_m_name);
    _change_black  =_change_black*0.01;
    result     = red_data-_change_black;
    $("#nam_red #_change").text(result.toFixed(2));

    _change_red  = parseInt(c_m_name)-parseInt(o_m_nam);
    _change_red  = black_data-(_change_red*0.01);
    $("#nam_black #_change").text(_change_red.toFixed(2));
   
  }else{
      $("#nam_black #_change").text(black_data);
      $("#nam_red #_change").text("-"+red_data);
  }
}



</script>