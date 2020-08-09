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
        width:100px;
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
$m_lotto_open   = explode(",", $rs["m_lotto_open"]);
$m_lotto_pay1   = explode(",", $rs["m_lotto_pay1"]);
$m_lotto_dis1   = explode(",", $rs["m_lotto_dis1"]);
$m_lotto_pay2   = explode(",", $rs["m_lotto_pay2"]);
$m_lotto_dis2   = explode(",", $rs["m_lotto_dis2"]);
$m_lotto_pay3   = explode(",", $rs["m_lotto_pay3"]);
$m_lotto_dis3   = explode(",", $rs["m_lotto_dis3"]);

$m_lotto_hun_share   = explode(",", $rs["m_lotto_hun_share"]);
$m_lotto_hun_myshare   = explode(",", $rs["m_lotto_hun_myshare"]);
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

$m_casino_share = explode(",", $rs["m_casino_share"]);
$m_casino_max   = explode(",", $rs["m_casino_max"]);

 ?> 

<div class="row pdTop">
    <div class="col-xs-12 widthTable">
        <form class="form-horizontal" id="editMember_form" action="" method="post">
            <div class="widget-box no-skin widget-color">
                <div class="widget-header widget-header-blue">
                    <h4 class="widget-title lighter"><?=$lang_memberMember[3];?></h4>
                    <div class="widget-toolbar ">
                        <button type="button" class="btn btn-success btn-xs sBtForm" onclick="saveEditMember();">
                            <i class="ace-icon fa fa-floppy-o"></i>
                            <?=$lang_memberMember[4];?> 
                        </button>
                        <button type="reset" class="btn btn-danger  btn-xs sBtForm" onclick="btn_reset();">
                            <span class="fa fa-refresh icon-on-right bigger-110"></span>
                            <?=$lang_memberMember[5];?> 
                        </button>
                        <a onclick="getMenu('userList','?page=<?=$_POST["page"];?>');" style="color:#fff;">
                            <button type="button" class="btn btn-xs btn-inverse">
                                    <i class="ace-icon fa fa-list-ul bigger-110"></i>
                                    <?=$lang_memberMember[54];?> 
                            </button>
                        </a>
                    </div>
                    <div class="widget-toolbar no-border">
                      <button type="button" class="btn btn-xs btn-white bigger btn-info btn-bold" onclick="setMaxAll();return false;">
                        <span class="normal"><?=$lang_memberMember[8];?></span>
                        <span class="mobile"><?=$lang_memberMember[59];?></span>
                      </button>
                    </div>
                </div>
                <div class="widget-body">
                    <div class="widget-main">
                        <div>
                            <div class="form-group">
                                
                                <label class="control-label col-xs-4 col-sm-2 no-padding-right" for="username"> <?=$lang_memberMember[9];?> :</label>
                                <div class="col-xs-8 col-sm-4">
                                    <div class="input-group clearfix col-xs-12">
                                        <input type="text" id="username" name="username" value="<?=$rs["m_user"];?>" placeholder="<?=$lang_memberMember[9];?>" class="inputEngNum" readonly="">

                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <input type="hidden" id="id" name="id" value="<?=$rs["m_id"];?>">
                                <label class="control-label col-xs-4 col-sm-2 no-padding-right" for="name"> <?=$lang_memberMember[12];?> :</label>
                                <div class="col-xs-8 col-sm-4">
                                    <div class="clearfix">
                                        <input type="text" name="name" id="name" value="<?=$rs["m_name"];?>" placeholder="<?=$lang_memberMember[12];?>">
                                    </div>
                                </div>
                                <label class="control-label col-xs-4 col-sm-2 no-padding-right" for="telephone"> <?=$lang_memberMember[55];?> :</label>
                                <div class="col-xs-8 col-sm-4">
                                    <div class="clearfix">
                                        <input type="tel" id="telephone" name="telephone" value="<?=$rs["m_phone"];?>" placeholder="<?=$lang_memberMember[55];?>">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="tabbable">
                            <ul class="nav nav-tabs padding-12 tab-color-blue background-blue">
                                        <li class="active">
                                            <a data-toggle="tab" href="#soccer" aria-expanded="true">
                                                <i class="menu-icon fa fa-futbol-o"></i>
                                                <h7><?=$lang_memberMember[14];?></h7>
                                            </a>
                                        </li>
                                         <li class="">
                                            <a data-toggle="tab" href="#sport" aria-expanded="false">
                                                <i class="menu-icon fa fa-futbol-o"></i>
                                                <h7><?=$lang_memberMember[15];?></h7>
                                            </a>
                                        </li>
                                        <li>
                                          <a data-toggle="tab" href="#boxing"  aria-expanded="false">
                                            <i class="menu-icon fa fa-futbol-o"></i>
                                            <h7><?=$lang_memberMember[90] ;?></h7> 
                                          </a>
                                        </li>
                                        <li class="">
                                            <a data-toggle="tab" href="#step" aria-expanded="false">
                                                <i class="menu-icon fa fa-futbol-o"></i>
                                                <h7><?=$lang_memberMember[16];?></h7>
                                            </a>
                                        </li>
                                        <li class="">
                                            <a data-toggle="tab" href="#lotto" aria-expanded="false">
                                                <i class="menu-icon fa fa-retweet"></i>
                                                <h7><?=$lang_memberMember[17];?></h7>
                                            </a>
                                        </li>
                                        <li class="">
                                            <a data-toggle="tab" href="#lottoSet" aria-expanded="false">
                                                <i class="menu-icon fa fa-line-chart"></i>
                                                <h7><?=$lang_memberMember[18];?></h7>
                                            </a>
                                        </li>
                                        <li class="">
                                            <a data-toggle="tab" href="#lottoLao" aria-expanded="false">
                                                <i class="menu-icon fa fa-line-chart"></i>
                                                <h7><?=$lang_memberMember[19];?></h7>
                                            </a>
                                        </li>
                                        <li class="">
                                            <a data-toggle="tab" href="#game" aria-expanded="false">
                                                <i class="menu-icon fa fa-gamepad"></i>
                                                <h7><?=$lang_memberMember[20];?></h7>
                                            </a>
                                        </li>
                                        <li class="">
                                            <a data-toggle="tab" href="#casino" aria-expanded="false">
                                                <i class="menu-icon fa fa-puzzle-piece"></i>
                                                <h7><?=$lang_memberMember[21];?></h7>
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
var m_casino_max = <?=json_encode($m_casino_max);?>;
var m_casino_share = <?=json_encode($m_casino_share);?>;


var html_alerts="<div class='row'><div class='col-xs-6 col-sm-4'></div><div class='col-xs-6 col-sm-4'><h1 class='text-danger'>กรุณาติดต่อตัวแทน</h1></div><div class='col-xs-6 col-sm-4'></div></div>";

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
    "lotto_pay1" : m_lotto_pay1,
    "lotto_dis1" : m_lotto_dis1,
    "lotto_pay2" : m_lotto_pay2,
    "lotto_dis2" : m_lotto_dis2,
    "lotto_pay3" : m_lotto_pay3,
    "lotto_dis3" : m_lotto_dis3,
    "m_name" : "<?=$m_name;?>",
    "r_open_agent" : "<?=$r_open[8];?>",
    "html_alerts" : html_alerts,
};

var lottoSet_ary = {
    "lotto_share_active" : m_open[9],
    "m_lotto_hun_open" : m_lotto_hun_open,
    "lotto_hun_pay1" : m_lotto_hun_pay1,
    "lotto_hun_dis1" : m_lotto_hun_dis1,
    "lotto_hun_pay2" : m_lotto_hun_pay2,
    "lotto_hun_dis2" : m_lotto_hun_dis2,
    "lotto_hun_pay3" : m_lotto_hun_pay3,
    "lotto_hun_dis3" : m_lotto_hun_dis3,
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
    "m_name" : "<?=$m_name;?>",
    "r_open_agent" : "<?=$r_open[11];?>",
    "html_alerts" : html_alerts,
};

var casino_ary = {
    "casino_active" : m_open[12],
    "rcb_maxtransfer" : m_casino_max,
    "casino_share" : m_casino_share,
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

change_set_min_pair(2,20);  

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

  function change_set_min_pair(_min_df,_max_df){

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
      data: {data_min: data_min , data_max :data_max , m_sport_step_dis:m_sport_step_dis},
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


    // function loadBoxMember(arr,type){
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

        var serializeFrm = $("form").serializeArray();
        // serializeFrm.push({name: 'bt', value: type});
        pageContentLoader("show");
        $.ajax({
            url: path_host+'memberUserList/editMemberSave.php',
            type: 'POST',
            data: serializeFrm,
            dataType: 'json',
            success: function (response) {
                // console.log(response);
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

        change_set_min_pair(2,20); 

        setTimeout(function(){ 
            $("#step .sl_com").each(function(i,e) {
                $(this).val($(this).children('option:last').val()) 
            });
        }, 300);

      break;

      case 'casino' :
       
        $( "#casino .maxLimit" ).each(function() {
          var data = $( this ).closest('.casino_Input').children('.maxtransfer').data('json')
          $( this ).val(data);
        }); 
      break;

      case 'lotto' :
     
        $( "#lotto .maxLimit" ).each(function() {
          var data = $( this ).closest('td').children('.maxtransfer').data('json')
          $( this ).val(data);
        });    

         $( "#lotto .sl_lotto_com" ).each(function() {
             $(this).val($(this).children('option:last').val())  
         });
      break;

      case 'lotto_set' :

        $( "#lottoSet .maxLimit" ).each(function() {
            var data = $( this ).closest('td').children('.maxtransfer').data('json')
            $( this ).val(data);
        });

        $( "#lottoSet .sl_lotto_set_com" ).each(function() {
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

        console.log($('#k_game_com').data('json'))
      break;
    }
  }

</script>