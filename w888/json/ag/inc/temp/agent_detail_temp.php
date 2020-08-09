<? 

if($_POST["session"]["AGlang"]=="")
  {
    $_POST["session"]["AGlang"]="th";
  }

  
  require('../conn.php');
  require('../function.php');
  require('../ag_function.php');
  require('../../lang/ag_'.$_POST["session"]["AGlang"].'.php');
  require('../../../lang/function_'.$_POST["session"]["AGlang"].'_new.php');

?>

<style type="text/css">
    .input-group {
        width:115px;
    }
    .input-group-addon {
        width: 40px;
    }
    .sl-width {
        width: 80px;
    }
    .tabbable input[type="text"] {
        width: 85px;
    }
    .col-md-4 {
        float: '' !important;
    }
    .numeric {
        height: 30px;
    }
    .label-sm {
        padding: 0px !important;
    }

    @media (max-width: 990px) { 
        .sBtForm{
          display: none;
        }
        .form-group div,label{
          padding-top: 2px;
        }
    }
    @media (min-width: 990px) {
        .sBtFormMobile{
            display: none;
        }
    }
</style>

<?php 

$r_agent_id = $_POST["session"]["r_agent_id"];
$sql="select * from bom_tb_agent where  r_agent_id like '%$r_agent_id%' and r_id = ".$_POST["session"]["rid"]." and r_level=".intval($_POST["session"]["r_level"])."";
$rs = sql_array($sql);

$parent_r_sport_step_dis = explode(",", $rs["r_sport_step_dis"]);

$parent_r_sport_step2 = explode(",", $rs["r_sport_step2"]);
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

$sql="select * from bom_tb_agent where r_id='".$_POST["id"]."' ";
$rs=sql_array($sql);
$ex_r_open =  explode(",", $rs["r_open"]);

$r_agent_id_level = explode("*", $_POST["session"]["r_agent_id"]);
$sql = "select r_id, r_open from bom_tb_agent where r_id in (".implode(",",array_filter($r_agent_id_level)).")";
$result_level = sql_query($sql);
$i=1;
while($sum = sql_fetch_as($result_level)){
    $test[$sum["r_id"]] = explode(",",$sum["r_open"]);
    $i++;
}

$r_sport_nam_tor   = explode(",", $rs["r_sport_nam_tor"]);
$r_sport_nam_rong   = explode(",", $rs["r_sport_nam_rong"]);       
$r_sport_dis   = explode(",", $rs["r_sport_dis"]);
$r_sport_max   = explode(",", $rs["r_sport_max"]);
$r_sport_min   = explode(",", $rs["r_sport_min"]);

$r_sport_step_max   = explode(",", $rs["r_sport_step_max"]);
$r_sport_step_min   = explode(",", $rs["r_sport_step_min"]);
$r_sport_step_day   = explode(",", $rs["r_sport_step_day"]);
$r_sport_step_paymax   = explode(",", $rs["r_sport_step_paymax"]);
$r_sport_step2   = explode(",", $rs["r_sport_step2"]);
$r_sport_step_dis   = explode(",", $rs["r_sport_step_dis"]);

$r_sport_share   = explode(",", $rs["r_sport_share"]);
$r_sport_share_live   = explode(",", $rs["r_sport_share_live"]);

$r_sport_force   = explode(",", $rs["r_sport_force"]);
$r_sport_force_live   = explode(",", $rs["r_sport_force_live"]);

$r_lotto_share   = explode(",", $rs["r_lotto_share"]);
$r_lotto_myshare   = explode(",", $rs["r_lotto_myshare"]);
$r_lotto_open   = explode(",", $rs["r_lotto_open"]);
$r_lotto_pay1   = explode(",", $rs["r_lotto_pay1"]);
$r_lotto_dis1   = explode(",", $rs["r_lotto_dis1"]);
$r_lotto_pay2   = explode(",", $rs["r_lotto_pay2"]);
$r_lotto_dis2   = explode(",", $rs["r_lotto_dis2"]);
$r_lotto_pay3   = explode(",", $rs["r_lotto_pay3"]);
$r_lotto_dis3   = explode(",", $rs["r_lotto_dis3"]);

$r_lotto_hun_share   = explode(",", $rs["r_lotto_hun_share"]);
$r_lotto_hun_myshare   = explode(",", $rs["r_lotto_hun_myshare"]);
$r_lotto_hun_open   = explode(",", $rs["r_lotto_hun_open"]);
$r_lotto_hun_pay1   = explode(",", $rs["r_lotto_hun_pay1"]);
$r_lotto_hun_dis1   = explode(",", $rs["r_lotto_hun_dis1"]);
$r_lotto_hun_pay2   = explode(",", $rs["r_lotto_hun_pay2"]);
$r_lotto_hun_dis2   = explode(",", $rs["r_lotto_hun_dis2"]);
$r_lotto_hun_pay3   = explode(",", $rs["r_lotto_hun_pay3"]);
$r_lotto_hun_dis3   = explode(",", $rs["r_lotto_hun_dis3"]);

$r_lotto_hun_set_share   = explode(",", $rs["r_lotto_hun_set_share"]);
$r_lotto_hun_set_myshare   = explode(",", $rs["r_lotto_hun_set_myshare"]);
$r_lotto_hun_set_pay   = explode(",", $rs["r_lotto_hun_set_pay"]);
$r_lotto_hun_set_price   = explode(",", $rs["r_lotto_hun_set_price"]);

$r_games_dis   = explode(",", $rs["r_games_dis"]);
$r_games_share   = explode(",", $rs["r_games_share"]);
$r_games_myshare   = explode(",", $rs["r_games_myshare"]);

$r_casino_share = explode(",", $rs["r_casino_share"]);
$r_casino_myshare = explode(",", $rs["r_casino_myshare"]);
$r_casino_max   = explode(",", $rs["r_casino_max"]);

require('memberUserList/get_minData.php');

?>

<div class="row pdTop">
    <div class="col-xs-12 widthTable">
        <form class="form-horizontal" id="editMember_form" action="" method="post">
            <div class="widget-box no-skin widget-color">
                <div class="widget-header widget-header-blue">
                    <h4 class="widget-title lighter"><?=$lang_memberAgent[3];?></h4> 
                    <div class="widget-toolbar "> 
                        <button type="button" class="btn btn-success btn-xs sBtForm" onclick="saveEditMember();">
                            <i class="ace-icon fa fa-floppy-o"></i>
                            <?=$lang_memberAgent[4];?> 
                        </button>
                        <button type="reset" class="btn btn-danger  btn-xs sBtForm" onclick="btn_reset();">
                            <span class="fa fa-refresh icon-on-right bigger-110"></span>
                            <?=$lang_memberAgent[5];?> 
                        </button>
                        <a onclick="getMenu('userList','?page=<?=$_POST["page"];?>');" style="color:#fff;">
                            <button type="button" class="btn btn-xs btn-inverse">
                                    <i class="ace-icon fa fa-list-ul bigger-110"></i>
                                    <?=$lang_memberAgent[62];?> 
                            </button>
                        </a>
                    </div>
                    <div class="widget-toolbar no-border">
                        <button type="button" class="btn btn-xs btn-white bigger btn-info btn-bold" onclick="setMaxAll();return false;">
                            <span class="normal">
                                <?=$lang_memberAgent[8];?>  
                            </span>
                            <span class="mobile">
                                <?=$lang_memberAgent[67];?>
                            </span>
                        </button>
                    </div>
                </div>
                <div class="widget-body">
                    <div class="widget-main">
                        <div>
                            <div class="form-group"> 
                                <label class="control-label col-xs-4 col-sm-2 no-padding-right" for="username"> <?=$lang_memberAgent[9];?> :</label>
                                <div class="col-xs-8 col-sm-4">
                                    <div class="input-group clearfix col-xs-12">
                                        <input type="text" id="username" name="username" value="<?=$rs["r_user"];?>" placeholder="<?=$lang_memberAgent[9];?>" class="inputEngNum" readonly="">
                                    </div>
                                </div>
                            </div>
                            <div class="form-group"> 
                                <label class="control-label col-xs-4 col-sm-2 no-padding-right" for="name"> <?=$lang_memberAgent[12];?> :</label>
                                <div class="col-xs-8 col-sm-4">
                                    <div class="clearfix">
                                        <input type="hidden" id="id" name="id" value="<?=$rs["r_id"];?>">
                                        <input type="text" name="name" id="name" value="<?=$rs["r_name"];?>" placeholder="<?=$lang_memberAgent[12];?>">
                                    </div>
                                </div>
                                <label class="control-label col-xs-4 col-sm-2 no-padding-right" for="telephone"> <?=$lang_memberAgent[13];?> :</label>
                                <div class="col-xs-8 col-sm-4">
                                    <div class="clearfix">
                                        <input type="tel" id="telephone" name="telephone" value="<?=$rs["r_phone"];?>" placeholder="<?=$lang_memberAgent[13];?>">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="tabbable">
                            <ul class="nav nav-tabs padding-12 tab-color-blue background-blue" id="menu-tab">
                                        <li class="active">
                                            <a data-toggle="tab" href="#soccer" aria-expanded="true">
                                                <i class="menu-icon fa fa-futbol-o"></i>
                                                <h7><?=$lang_memberAgent[15];?></h7>
                                            </a>
                                        </li>
                                         <li class="">
                                            <a data-toggle="tab" href="#sport" aria-expanded="false">
                                                <i class="menu-icon fa fa-futbol-o"></i>
                                                <h7><?=$lang_memberAgent[16];?></h7>
                                            </a>
                                        </li>
                                        <li class="">
                                            <a data-toggle="tab" href="#boxing" aria-expanded="false">
                                                <i class="menu-icon fa fa-futbol-o"></i>
                                                <h7><?=$lang_memberAgent[102];?></h7>
                                            </a>
                                        </li>
                                        <li class="">
                                            <a data-toggle="tab" href="#step" aria-expanded="false">
                                                <i class="menu-icon fa fa-futbol-o"></i>
                                                <h7><?=$lang_memberAgent[17];?></h7>
                                            </a>
                                        </li>
                                        <li class="">
                                            <a data-toggle="tab" href="#lotto" aria-expanded="false">
                                                <i class="menu-icon fa fa-retweet"></i>
                                                <h7><?=$lang_memberAgent[18];?></h7>
                                            </a>
                                        </li>
                                        <li class="">
                                            <a data-toggle="tab" href="#lottoSet" aria-expanded="false">
                                                <i class="menu-icon fa fa-line-chart"></i>
                                                <h7><?=$lang_memberAgent[19];?></h7>
                                            </a>
                                        </li>
                                        <li class="">
                                            <a data-toggle="tab" href="#lottoLao" aria-expanded="false">
                                                <i class="menu-icon fa fa-line-chart"></i>
                                                <h7><?=$lang_memberAgent[20];?></h7>
                                            </a>
                                        </li>
                                        <li class="">
                                            <a data-toggle="tab" href="#game" aria-expanded="false">
                                                <i class="menu-icon fa fa-gamepad"></i>
                                                <h7><?=$lang_memberAgent[21];?></h7>
                                            </a>
                                        </li>
                                        <li class="">
                                            <a data-toggle="tab" href="#casino" aria-expanded="false">
                                                <i class="menu-icon fa fa-puzzle-piece"></i>
                                                <h7><?=$lang_memberAgent[22];?></h7>
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

var r_open = <?=json_encode($ex_r_open);?>;

var r_lotto_pay1 = <?=json_encode($r_lotto_pay1);?>;
var r_lotto_dis1 = <?=json_encode($r_lotto_dis1);?>;
var r_lotto_pay2 = <?=json_encode($r_lotto_pay2);?>;
var r_lotto_dis2 = <?=json_encode($r_lotto_dis2);?>;
var r_lotto_pay3 = <?=json_encode($r_lotto_pay3);?>;
var r_lotto_dis3 = <?=json_encode($r_lotto_dis3);?>;
var r_lotto_open = <?=json_encode($r_lotto_open);?>;
var lotto_pay1_max = <?=json_encode($lotto_pay1_max);?>;
var lotto_dis1_max = <?=json_encode($lotto_dis1_max);?>;
var lotto_pay2_max = <?=json_encode($lotto_pay2_max);?>;
var lotto_dis2_max = <?=json_encode($lotto_dis2_max);?>;
var lotto_pay3_max = <?=json_encode($lotto_pay3_max);?>;
var lotto_dis3_max = <?=json_encode($lotto_dis3_max);?>;

var r_lotto_hun_pay1 = <?=json_encode($r_lotto_hun_pay1);?>;
var r_lotto_hun_dis1 = <?=json_encode($r_lotto_hun_dis1);?>;
var r_lotto_hun_pay2 = <?=json_encode($r_lotto_hun_pay2);?>;
var r_lotto_hun_dis2 = <?=json_encode($r_lotto_hun_dis2);?>;
var r_lotto_hun_pay3 = <?=json_encode($r_lotto_hun_pay3);?>;
var r_lotto_hun_dis3 = <?=json_encode($r_lotto_hun_dis3);?>;
var r_lotto_hun_open = <?=json_encode($r_lotto_hun_open);?>;
var lotto_hun_pay1_max = <?=json_encode($lotto_hun_pay1);?>;
var lotto_hun_dis1_max = <?=json_encode($lotto_hun_dis1);?>;
var lotto_hun_pay2_max = <?=json_encode($lotto_hun_pay2);?>;
var lotto_hun_dis2_max = <?=json_encode($lotto_hun_dis2);?>;
var lotto_hun_pay3_max = <?=json_encode($lotto_hun_pay3);?>;
var lotto_hun_dis3_max = <?=json_encode($lotto_hun_dis3);?>;

var r_lotto_hun_set_pay = <?=json_encode($r_lotto_hun_set_pay);?>;
var r_lotto_hun_set_price = <?=json_encode($r_lotto_hun_set_price);?>;
var lotto_hun_set_pay_max = <?=json_encode($lotto_hun_set_pay);?>;
var lotto_hun_set_price_max = <?=json_encode($lotto_hun_set_price);?>;

var r_casino_max = <?=json_encode($r_casino_max);?>;
var r_casino_share = <?=json_encode($r_casino_share);?>;
var r_casino_myshare = <?=json_encode($r_casino_myshare);?>;
var check_casino_max = <?=json_encode($check_r_casino_max);?>;
var check_r_casino_share = <?=json_encode($check_r_casino_share);?>;

function changeLowerValue(e)
{
    var thisVal = $(e).val();
    var thisIndex = $(e).attr("data-index");
    $("#step .sl_step").each(function(i,e) {
        var index = $(this).attr("data-index");
        if(parseInt(index) > parseInt(thisIndex))
        {
          var first = $('#stepcom'+index+' option:first').val();
          if(parseInt(thisVal) < parseInt(first) ) 
          {
            $('#stepcom'+index+'').val($('#stepcom'+index+'').children('option:first').val()); 
          }else{
            $('#stepcom'+index+'').val(thisVal); 
          }  
        }
    }); 
}

function change_set_min_pair(_min_df,_max_df){

    var r_sport_step_dis_min_ary = <?=json_encode($r_sport_step_dis_min_ary);?>;
    var r_sport_step_dis = <?=json_encode($r_sport_step_dis);?>;
    var parent_r_sport_step_dis = <?=json_encode($parent_r_sport_step_dis);?>;

    // parent_r_sport_step_dis
    var user_step_min_pair = '<?=$step_min_pair_min;?>'  // ค่าต่ำสุดของสมาชิกภายใต้  (จำนวนคู่ต่ำสุด/บิล)
    var user_step_max_pair = '<?=$step_max_pair_min;?>'  // ค่าต่ำสุดของสมาชิกภายใต้  (จำนวนคู่สูงสุด/บิล) 

    if(user_step_min_pair != "" && user_step_max_pair != "")  // กรณีที่มี ภายใต้
    {
       var data_min = +$("#step_min_pair").val();
       var data_max = +$("#step_max_pair").val();
       var min_sl = "";
       for(i=_min_df; i<=(data_max-1); i++) {
           if(i <= user_step_min_pair)
           {
             var sl = (data_min == i) ? "selected = 'selected'" : '';
             min_sl += "<option "+sl+" value="+i+">"+i+"</option>";
           }
       }

       // console.log(_min_df)
       // console.log(_max_df)

       // console.log(user_step_min_pair);

       $("#step_min_pair").attr("onchange","change_set_min_pair("+_min_df+","+_max_df+");");
       $('#step_min_pair').html('');
       $("#step_min_pair").append(min_sl);
       
       var max_sl = ""
       for(i=(data_min+1); i<=_max_df; i++) {
         if(i >= user_step_max_pair)
         {
           var sl = (data_max == i) ? "selected = 'selected'" : '';
           max_sl += "<option "+sl+" value="+i+">"+i+"</option>";
         }
       }

       $("#step_max_pair").attr("onchange","change_set_min_pair("+_min_df+","+_max_df+");");
       $('#step_max_pair').html('');
       $("#step_max_pair").append(max_sl);

    }else{  // กรณี ที่ไม่มีภายใต้
      
      var data_min = +$("#step_min_pair").val();
      var data_max = +$("#step_max_pair").val();

      var min_sl = "";
      var _min_df = <?=$parent_r_sport_step2[1];?>;
          user_step_min_pair = <?=$parent_r_sport_step2[2];?>;

        for(i= _min_df; i<=(data_max-1); i++) {
          if(i <= user_step_min_pair)
          {
            var sl = (data_min == i) ? "selected = 'selected'" : '';
            min_sl += "<option "+sl+" value="+i+">"+i+"</option>";
          }
        }
      $('#step_min_pair').html('');
      $("#step_min_pair").append(min_sl);

      var max_sl = ""
      var _max_df = <?=$parent_r_sport_step2[2];?>;
       for(i=(data_min+1); i<=_max_df; i++) {
         if(i >= user_step_max_pair)
         {
           var sl = (data_max == i) ? "selected = 'selected'" : '';
           max_sl += "<option "+sl+" value="+i+">"+i+"</option>";
         }
       }
       $('#step_max_pair').html('');
       $("#step_max_pair").append(max_sl);
    }

    $.ajax({
      url: 'inc/temp/memberUserList/create_dis_step_A.php',
      type: 'POST',
      dataType: 'html',
      data: {data_min: data_min , data_max :data_max , r_sport_step_dis:r_sport_step_dis,r_sport_step_dis_min_ary:r_sport_step_dis_min_ary,parent_r_sport_step_dis:parent_r_sport_step_dis},
    })
    .done(function(data) {
      $('#test').text('')
      $('#test').append(data);
    })
    .fail(function() {
      console.log("error");
    })
    .always(function() {
      console.log("complete");
    });
  }

  var html_alerts="<div class='row'><div class='col-xs-6 col-sm-4'></div><div class='col-xs-6 col-sm-4'><h1 class='text-danger'>กรุณาติดต่อตัวแทน</h1></div><div class='col-xs-6 col-sm-4'></div></div>";

var soccer_ary = {
    "soccer_today_active" : r_open[1],
    "soccer_live_active" : r_open[2],
    "today_share" : "<?=$r_sport_share[1];?>",
    "live_share" : "<?=$r_sport_share_live[1];?>",
    "k_today_share" : "<?=$r_sport_force[1];?>",
    "k_live_share" : "<?=$r_sport_force_live[1];?>",
    "today_com" : "<?=$r_sport_dis[1];?>",
    "torup" : "<?=$r_sport_nam_tor[1];?>",
    "logup" : "<?=$r_sport_nam_rong[1];?>",
    "live_betmoneymax_pair" : "<?=$r_sport_max[1];?>",
    "live_fbetmoneymax_pair" : "<?=$r_sport_max[2];?>",
    "live_betmax_money" : "<?=$r_sport_max[3];?>",
    "live_fbetmax_money" : "<?=$r_sport_max[4];?>",
    "live_betmin_money" : "<?=$r_sport_min[1];?>",
    "live_fbetmin_money" : "<?=$r_sport_min[2];?>",
    "r_name" : "<?=$r_name;?>",
    "today_share_max" : "<?=$today_share_max;?>",
    "live_share_max" : "<?=$live_share_max;?>",
    "today_com_max" : "<?=$today_com_max;?>",
    "torup_max" : "<?=$torup_max;?>",
    "logup_max" : "<?=$logup_max;?>",
    "live_betmoneymax_pair_max" : "<?=$live_betmoneymax_pair_max;?>",
    "live_fbetmoneymax_pair_max" : "<?=$live_fbetmoneymax_pair_max;?>",
    "live_betmax_money_max" : "<?=$live_betmax_money_max;?>",
    "live_betmin_money_max" : "<?=$live_betmin_money_max;?>",
    "live_fbetmax_money_max" : "<?=$live_fbetmax_money_max;?>",
    "live_fbetmin_money_max" : "<?=$live_fbetmin_money_max;?>",
    "r_open_agent" : "<?=$r_open[1];?>",
    "html_alerts" : html_alerts,
};

var sport_ary = {
    "sport_today_active" :r_open[3],
    "sport_live_active" : r_open[4],
    "sporttoday_share" :"<?=$r_sport_share[2];?>",
    "sportlive_share" : "<?=$r_sport_share_live[2];?>",
    "k_sporttoday_share" : "<?=$r_sport_force[2];?>",
    "k_sportlive_share" : "<?=$r_sport_force_live[2];?>",
    "sport_com" : "<?=$r_sport_dis[2];?>",
    "sport_betmoneymax_pair" : "<?=$r_sport_max[5];?>",
    "sport_betmax_money" : "<?=$r_sport_max[6];?>",
    "sport_betmin_money" : "<?=$r_sport_min[3];?>",
    "r_name" : "<?=$r_name;?>",
    "sport_com_max" : "<?=$sport_com_max;?>",
    "sporttoday_share_max" : "<?=$sporttoday_share_max;?>",
    "sportlive_share_max" : "<?=$sportlive_share_max;?>",
    "sport_betmoneymax_pair_max" : "<?=$sport_betmoneymax_pair_max;?>",
    "sport_betmax_money_max" : "<?=$sport_betmax_money_max;?>",
    "sport_betmin_money_max" : "<?=$sport_betmin_money_max;?>",
    "step_min_pair_min" : "<?=$step_min_pair_min;?>",
    "step_max_pair_min" : "<?=$step_max_pair_min;?>",
    "r_open_agent" : "<?=$r_open[3];?>",
    "html_alerts" : html_alerts,
};

var boxing_ary = {
    "boxing_today_active" :r_open[5],
    "boxing_live_active" : r_open[6],
    "boxingtoday_share" :"<?=$r_sport_share[3];?>",
    "boxinglive_share" : "<?=$r_sport_share_live[3];?>",
    "k_boxingtoday_share" : "<?=$r_sport_force[3];?>",
    "k_boxinglive_share" : "<?=$r_sport_force_live[3];?>",
    "boxing_com" : "<?=$r_sport_dis[3];?>",
    "boxing_betmoneymax_pair" : "<?=$r_sport_max[7];?>",
    "boxing_betmax_money" : "<?=$r_sport_max[8];?>",
    "boxing_betmin_money" : "<?=$r_sport_min[4];?>",
    "r_name" : "<?=$r_name;?>",
    "boxing_com_max" : "<?=$sport_com_max;?>",
    "boxingtoday_share_max" : "<?=$sporttoday_share_max;?>",
    "boxinglive_share_max" : "<?=$sportlive_share_max;?>",
    "boxing_betmoneymax_pair_max" : "<?=$boxing_betmoneymax_pair_max;?>",
    "boxing_betmax_money_max" : "<?=$boxing_betmax_money_max;?>",
    "boxing_betmin_money_max" : "<?=$boxing_betmin_money_max;?>",
    // "step_min_pair_min" : "<?=$step_min_pair_min;?>",
    // "step_max_pair_min" : "<?=$step_max_pair_min;?>",
    "r_open_agent" : "<?=$r_open[5];?>",
    "html_alerts" : html_alerts,
};

var step_ary = {
    "step_active" : r_open[7],
    "step_share" : "<?=$r_sport_share[4];?>",
    "step_min_pair" : "<?=$r_sport_step2[1];?>",
    "step_max_pair" : "<?=$r_sport_step2[2];?>",
    "step_betmax_money" : "<?=$r_sport_step_max[1];?>",
    "step_betmin_money" : "<?=$r_sport_step_min[1];?>",
    "step_daymax_money" : "<?=$r_sport_step_day[1];?>",
    "step_billmax_money" : "<?=$r_sport_step_paymax[1];?>",
    "k_step_share" : "<?=$r_sport_force[3];?>",
    "r_name" : "<?=$r_name;?>",
    "step_share_max" : "<?=$step_share_max;?>",
    "step_betmax_money_max" : "<?=$step_betmax_money_max;?>",
    "step_betmin_money_max" : "<?=$step_betmin_money_max;?>",
    "step_daymax_money_max" : "<?=$step_daymax_money_max;?>",
    "step_billmax_money_max" : "<?=$step_billmax_money_max;?>",
    "r_open_agent" : "<?=$r_open[7];?>",
    "html_alerts" : html_alerts,
};

var lotto_ary = {
  "lotto_active" : r_open[8],
  "lotto_pay1" : r_lotto_pay1,
  "lotto_dis1" : r_lotto_dis1,
  "lotto_pay2" : r_lotto_pay2,
  "lotto_dis2" : r_lotto_dis2,
  "lotto_pay3" : r_lotto_pay3,
  "lotto_dis3" : r_lotto_dis3,
  "lotto_share" :"<?=$r_lotto_share[1];?>",
  "k_7_lotto_share" :"<?=$r_lotto_myshare[1];?>",
  "r_name" : "<?=$r_name;?>",
  "lotto_share_max" : "<?=$lotto_share_max;?>",  
  "r_lotto_open" : r_lotto_open,
  "lotto_pay1_max" : lotto_pay1_max,
  "lotto_dis1_max" : lotto_dis1_max,
  "lotto_pay2_max" : lotto_pay2_max,
  "lotto_dis2_max" : lotto_dis2_max,
  "lotto_pay3_max" : lotto_pay3_max,
  "lotto_dis3_max" : lotto_dis3_max,
  "r_open_agent" : "<?=$r_open[8];?>",
  "html_alerts" : html_alerts,
};

var lottoSet_ary = {
  "lotto_share_active" : r_open[9],
  "lotto_hun_pay1" : r_lotto_hun_pay1,
  "lotto_hun_dis1" : r_lotto_hun_dis1,
  "lotto_hun_pay2" : r_lotto_hun_pay2,
  "lotto_hun_dis2" : r_lotto_hun_dis2,
  "lotto_hun_pay3" : r_lotto_hun_pay3,
  "lotto_hun_dis3" : r_lotto_hun_dis3,
  "lotto_share" :"<?=$r_lotto_hun_share[1];?>",
  "k_8_lotto_share" :"<?=$r_lotto_hun_myshare[1];?>",
  "r_name" : "<?=$r_name;?>",
  "lotto_hun_share_max" : "<?=$lotto_hun_share_max;?>",  
  "r_lotto_hun_open" : r_lotto_hun_open,
  "lotto_hun_pay1_max" : lotto_hun_pay1_max,
  "lotto_hun_dis1_max" : lotto_hun_dis1_max,
  "lotto_hun_pay2_max" : lotto_hun_pay2_max,
  "lotto_hun_dis2_max" : lotto_hun_dis2_max,
  "lotto_hun_pay3_max" : lotto_hun_pay3_max,
  "lotto_hun_dis3_max" : lotto_hun_dis3_max,
  "r_open_agent" : "<?=$r_open[9];?>",
  "html_alerts" : html_alerts,
};

var lottoLao_ary = {
  "lotto_lao_active" : r_open[10],
  "lotto_hun_set_share" :"<?=$r_lotto_hun_set_share[1];?>",
  "k_9_lotto_share" :"<?=$r_lotto_hun_set_myshare[1];?>",
  "lot_hun_set_pay" : r_lotto_hun_set_pay,
  "lot_hun_set_price" : r_lotto_hun_set_price,
  "r_name" : "<?=$r_name;?>",
  "lotto_hun_set_share_max" : "<?=$lotto_hun_set_share_max;?>",  
  "lotto_hun_set_pay_max" : lotto_hun_set_pay_max,
  "lotto_hun_set_price_max" : lotto_hun_set_price_max,
  "r_open_agent" : "<?=$r_open[10];?>",
  "html_alerts" : html_alerts,
};

var game_active_ary = {
  "game_active" : r_open[11],
  "r_name" : "<?=$r_name;?>",
  "game_share" : "<?=$r_games_share[1];?>",
  "k_game_share" :"<?=$r_games_myshare[1];?>",
  "game_com" :"<?=$r_games_dis[1];?>",
  "game_share_max" : "<?=$game_share_max;?>",
  "game_com_max" : "<?=$game_com_max;?>",
  "r_open_agent" : "<?=$r_open[11];?>",
  "html_alerts" : html_alerts,
};

var casino_ary = {
  "casino_active" : r_open[12],
  "rcb_maxtransfer" : r_casino_max,
  "casino_share" : r_casino_share,
  "casino_myshare" : r_casino_myshare,
  "r_name" : "<?=$r_name;?>",
  "check_casino_max" : check_casino_max,
  "check_r_casino_share" : check_r_casino_share,
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

    function loadBoxMember(arr,type){
        $.ajax({
            url: path_host+'loadBox/loadBoxAgent.php',
            type: 'POST',
            data: {arr:arr,type:type,flagtor:'N',rid:<?=$_POST['id'];?>},
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

        var serializeFrm = $("form").serializeArray();
         pageContentLoader("show");
        $.ajax({
            url: path_host+'memberUserList/editAgentSave.php',
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
                    // getMenu('userList','?page=<?=$_POST["page"];?>');
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

    function alertWrongInput(tab,id_iuput)
    {
      //เปิด tab ที่กรอกข้อมูลผิดพลาด
      $("[data-toggle=tab]").eq(tab).trigger('click'); 
      //กระพริบ
      $("#"+id_iuput+"").addClass('warning-bg'); 
      //หน่วงเวลา เอากระพริบออก
      setTimeout(function(){  $("#"+id_iuput+"").removeClass('warning-bg'); }, 9000);
       
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
                $('#today_share').val($('#k_today_share').data('json'));
                $('#live_share').val($('#k_live_share').data('json')); 
                $('#force_live_share').val($('#k_live_share').data('json')); 
                $('#today_com').val($('#today_com').children('option:last').val()); 
                $('#logup').val($('#k_logup').data('json'));  
                $('#torup').val($('#k_torup').data('json')); 
                $('#live_betmoneymax_pair').val($('#k_live_betmoneymax_pair').data('json'));    
                $('#live_betmax_money').val($('#k_live_betmax_money').data('json'));    
                $('#live_betmin_money').val($('#k_live_betmin_money').data('json'));    
                $('#live_fbetmoneymax_pair').val($('#k_live_fbetmoneymax_pair').data('json'));    
                $('#live_fbetmax_money').val($('#k_live_fbetmax_money').data('json'));    
                $('#live_fbetmin_money').val($('#k_live_fbetmin_money').data('json'));     
                $('#k_today_share').text(0);    
                $('#k_live_share').text(0); 
                $('#k_force_live_share').text(0);    
            break;
            case 'sport' :
                $('#sporttoday_share').val($('#k_sporttoday_share').data('json'));
                $('#sportlive_share').val($('#k_sportlive_share').data('json')); 
                $('#force_sportlive_share').val($('#k_sportlive_share').data('json')); 
                $('#sport_com').val($('#k_sport_com').data('json')); 
                $('#sport_betmoneymax_pair').val($('#k_sport_betmoneymax_pair').data('json'));   
                $('#sport_betmax_money').val($('#k_sport_betmax_money').data('json'));   
                $('#sport_betmin_money').val($('#k_sport_betmin_money').data('json'));   
                $('#k_sporttoday_share').text(0);    
                $('#k_sportlive_share').text(0); 
                $('#k_force_sportlive_share').text(0);     
            break;
            case 'boxing' :
                $('#boxingtoday_share').val($('#k_boxingtoday_share').data('json'));
                $('#boxinglive_share').val($('#k_boxinglive_share').data('json')); 
                $('#force_boxinglive_share').val($('#k_boxinglive_share').data('json')); 
                $('#boxing_com').val($('#k_boxing_com').data('json')); 
                $('#boxing_betmoneymax_pair').val($('#k_boxing_betmoneymax_pair').data('json'));   
                $('#boxing_betmax_money').val($('#k_boxing_betmax_money').data('json'));   
                $('#boxing_betmin_money').val($('#k_boxing_betmin_money').data('json'));   
                $('#k_boxingtoday_share').text(0);    
                $('#k_boxinglive_share').text(0); 
                $('#k_force_boxinglive_share').text(0);     
            break;
            case 'step' :
                $('#force_step_share').val($('#k_step_share').data('json'));
                $('#step_share').val($('#k_step_share').data('json'));
                $('#step_betmax_money').val($('#k_step_betmax_money').data('json')); 
                $('#step_betmin_money').val($('#k_step_betmin_money').data('json')); 
                $('#step_daymax_money').val($('#k_step_daymax_money').data('json')); 
                $('#step_billmax_money').val($('#k_step_billmax_money').data('json')); 
                $('#step_max_pair').val($('#k_step_max_pair').data('json')); 
                $('#step_min_pair').val($('#k_step_min_pair').data('json')); 
                $('#k_step_share').text(0); 
                $('#k_force_step_share').text(0); 

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

                change_set_min_pair(2,20); 

                setTimeout(function(){ 
                    $("#step .sl_com").each(function(i,e) {
                        $(this).val($(this).children('option:last').val()) 
                    });
                }, 300);

            break;
            case 'casino' :
                $( "#casino .maxLimit" ).each(function(i,e) {
                    var data = $( this ).closest('.casino_Input').children('.maxtransfer').data('json')
                    $( this ).val(data);
                    $('#k_casino_share'+(i+1)+'').text(0)
                });    
                $( "#casino .casino_select .sl_casino" ).each(function() {
                     var data = $(this).closest('.casino_select').children('span.sl_data').data('json')
                     $( this ).val(data);

                });    
            break;
            case 'lotto' :
                $( "#7_lotto_share").val($('#7_lotto_share > option:last').val()) 
                $( "#7_force_lotto_share").val($('#7_force_lotto_share > option:last').val()) 
                $( "#lotto .maxLimit" ).each(function() {
                    var data = $( this ).closest('td').children('.maxtransfer').data('json')
                    $( this ).val(data);
                });  
                $( "#lotto .sl_lotto_com" ).each(function() {
                    $(this).val($(this).children('option:last').val())  
                });
                $('#k_7_lotto_share').text(0); 
                $('#k_7_force_lotto_share').text(0);   
            break;
            case 'lotto_set' :
                $( "#8_lotto_share").val($('#8_lotto_share > option:last').val()) 
                $( "#8_force_lotto_share").val($('#8_force_lotto_share > option:last').val()) 
                $( "#lottoSet .maxLimit" ).each(function() {
                    var data = $( this ).closest('td').children('.maxtransfer').data('json')
                    $( this ).val(data);
                });
                $( "#lottoSet .sl_lotto_set_com" ).each(function() {
                    $(this).val($(this).children('option:last').val())
                });
                $('#k_8_lotto_share').text(0); 
                $('#k_8_force_lotto_share').text(0); 
            break;

            case 'lotto_lao' :
                $( "#9_lotto_share").val($('#9_lotto_share > option:last').val()) 
                $( "#9_force_lotto_share").val($('#9_force_lotto_share > option:last').val()) 
                $( "#lotto_lao .maxLimit" ).each(function() {
                    var data = $( this ).closest('.lotto_lao_Input').children('.maxtransfer').data('json')
                    $( this ).val(data);
                });    
                $('#k_9_lotto_share').text(0); 
                $('#k_9_force_lotto_share').text(0);    
            break;
            case 'lottery' :
                $('#6_0_lotto_com').val($('#k_6_0_lotto_com').data('json')); 
            break;
            case 'game' :
                $('#game_share').val($('#k_game_share').data('json'));
                $('#force_game_share').val($('#k_game_share').data('json'));  
                $('#game_com').val($('#k_game_com').data('json')); 
                $('#k_game_share').text(0);   
                $('#k_force_game_share').text(0);    
            break;
        }

    }


    function setKeep(id){
        var diff = 0;
        var share = $('#'+id).val();
        var keep  = $('#k_'+id).data('json'); 
        diff = keep - share;

        $('#k_'+id).text(diff);
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



    function generateSL3(v,tag){

        var select = document.getElementById(tag.id);

        if(select.length == 1){

            for(var i = 0.01; parseFloat(i).toFixed(2) <= parseFloat(v).toFixed(2); i = i+ 0.01){

                var opt = document.createElement('option');

                opt.value = i.toFixed(2);

                opt.innerHTML = i.toFixed(2);

                select.appendChild(opt);

            }

        }

    }

</script>