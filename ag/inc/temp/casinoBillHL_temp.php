<?php require('inc_head.php');?>

<?php 
  $view_date=_bdate();
  if($_POST['sdate']=='')
  {
    $_POST['sdate']=$view_date;
  }

  $arr_member = array();
  $sql=sql_query("select * from bom_tb_member where r_id = '".$_POST["session"]["r_id"]."' order by m_user asc");
  while($rs=sql_fetch($sql)){
    $arr_member[] = $rs;
  }

 ?>
<style type="text/css">
  @media (max-width: 990px) { 
    .form-group div,label{
      padding-top: 5px;
    }
  }
  .title {
    /*padding-top: 20px;
    padding-bottom: 10px;*/
    font-size: 12px;
    font-weight: bold;
    color: #555;
    text-align: center;
}
  .tbls {
    color: #000;
}
.gids {
    color: #06f;
}
.times {
    color: #333;
    font-size: smaller;
    font-weight: 400;
}
.betTbls {
    background-color: #060;
    border: 2px solid #fc3;
    font-size: 9px;
    font-weight: 700;
    font-family: Tahoma;
    width: 70%;
    /*max-width: 450px;*/
    height: 200px;
    margin: auto;
}
.s15 {
    height: calc(100% / 4);
    text-align: center;
    vertical-align: middle;
    display: block;
    width: calc(100% / 5);
    border-right: 1px solid #fc3;
    float: left;
    padding: 0% 0px;
    font-size: 0.55vw;
}
.s5L {
    height: calc(100% / 4);
    text-align: center;
    vertical-align: middle;
    display: block;
    width: calc(100% / 5);
    border-right: 1px solid #fc3;
    float: left;
    padding: 0% 0px;
    font-size: 0.55vw;
}
.s11HL {
    height: calc(100% / 4);
    text-align: center;
    vertical-align: middle;
    display: block;
    width: calc(100% / 5);
    border-right: 1px solid #fc3;
    float: left;
    padding: 0% 0px;
    font-size: 0.55vw;
}
.s6L {
    height: calc(100% / 4);
    text-align: center;
    vertical-align: middle;
    display: block;
    width: calc(100% / 5);
    border-right: 1px solid #fc3;
    float: left;
    padding: 0% 0px;
    font-size: 0.55vw;
}
.s62 {
    height: calc(100% / 4);
    text-align: center;
    vertical-align: middle;
    display: block;
    width: calc(100% / 5);
    float: left;
    padding: 0% 0px;
    font-size: 0.55vw;
}

.s16 {
    height: calc(100% / 4);
    text-align: center;
    vertical-align: middle;
    display: block;
    width: calc(100% / 8);
    border-top: 1px solid #fc3;
    border-right: 1px solid #fc3;
    float: left;
    padding: 0% 0px;
    font-size: 0.55vw;
}
.s1 {
    height: calc(100% / 4);
    text-align: center;
    vertical-align: middle;
    display: block;
    width: calc(100% / 6);
    border-top: 1px solid #fc3;
    border-right: 1px solid #fc3;
    float: left;
    padding: 0% 0px;
    font-size: 0.55vw;
}
.sL {
    height: calc(100% / 4);
    text-align: center;
    vertical-align: middle;
    display: block;
    width: calc(100% / 6);
    border-top: 1px solid #fc3;
    border-right: 1px solid #fc3;
    float: left;
    padding: 0% 0px;
    font-size: 0.55vw;
}
.sH {
    height: calc(100% / 4);
    text-align: center;
    vertical-align: middle;
    display: block;
    width: calc(100% / 6);
    border-top: 1px solid #fc3;
    border-right: 1px solid #fc3;
    float: left;
    padding: 0% 0px;
    font-size: 0.55vw;
}
.s6 {
    height: calc(100% / 4);
    text-align: center;
    vertical-align: middle;
    display: block;
    width: calc(100% / 6);
    border-top: 1px solid #fc3;
    border-right: 1px solid #fc3;
    float: left;
    padding: 0% 0px;
    font-size: 0.55vw;
}
.s61 {
    height: calc(100% / 4);
    text-align: center;
    vertical-align: middle;
    display: block;
    width: calc(100% / 8);
    border-top: 1px solid #fc3;
    float: left;
    padding: 0% 0px;
    font-size: 0.55vw;
}

.s25 {
    height: calc(100% / 4);
    text-align: center;
    vertical-align: middle;
    display: block;
    width: calc(100% / 6);
    border-top: 1px solid #fc3;
    border-right: 1px solid #fc3;
    float: left;
    padding: 0% 0px;
    font-size: 0.55vw;
}
.s2 {
    height: calc(100% / 4);
    text-align: center;
    vertical-align: middle;
    display: block;
    width: calc(100% / 6);
    border-top: 1px solid #fc3;
    border-right: 1px solid #fc3;
    float: left;
    padding: 0% 0px;
    font-size: 0.55vw;
}
.s3 {
    height: calc(100% / 4);
    text-align: center;
    vertical-align: middle;
    display: block;
    width: calc(100% / 6);
    border-top: 1px solid #fc3;
    border-right: 1px solid #fc3;
    float: left;
    padding: 0% 0px;
    font-size: 0.55vw;
}
.s4 {
    height: calc(100% / 4);
    text-align: center;
    vertical-align: middle;
    display: block;
    width: calc(100% / 6);
    border-top: 1px solid #fc3;
    border-right: 1px solid #fc3;
    float: left;
    padding: 0% 0px;
    font-size: 0.55vw;
}
.s5 {
    height: calc(100% / 4);
    text-align: center;
    vertical-align: middle;
    display: block;
    width: calc(100% / 6);
    border-top: 1px solid #fc3;
    border-right: 1px solid #fc3;
    float: left;
    padding: 0% 0px;
    font-size: 0.55vw;
}
.s52 {
    height: calc(100% / 4);
    text-align: center;
    vertical-align: middle;
    display: block;
    width: calc(100% / 6);
    border-top: 1px solid #fc3;
    float: left;
    padding: 0% 0px;
    font-size: 0.55vw;
}

.s456 {
    height: calc(100% / 4);
    text-align: center;
    vertical-align: middle;
    display: block;
    width: calc(100% / 5);
    border-top: 1px solid #fc3;
    border-right: 1px solid #fc3;
    float: left;
    padding: 0% 0px;
    font-size: 0.55vw;
}
.s56 {
    height: calc(100% / 4);
    text-align: center;
    vertical-align: middle;
    display: block;
    width: calc(100% / 7);
    border-top: 1px solid #fc3;
    border-right: 1px solid #fc3;
    float: left;
    padding: 0% 0px;
    font-size: 0.55vw;
}
.s36 {
    height: calc(100% / 4);
    text-align: center;
    vertical-align: middle;
    display: block;
    width: calc(100% / 6);
    border-top: 1px solid #fc3;
    border-right: 1px solid #fc3;
    float: left;
    padding: 0% 0px;
    font-size: 0.55vw;
}
.s24 {
    height: calc(100% / 4);
    text-align: center;
    vertical-align: middle;
    display: block;
    width: calc(100% / 6);
    border-top: 1px solid #fc3;
    border-right: 1px solid #fc3;
    float: left;
    padding: 0% 0px;
    font-size: 0.55vw;
}
.s35 {
    height: calc(100% / 4);
    text-align: center;
    vertical-align: middle;
    display: block;
    width: calc(100% / 6);
    border-top: 1px solid #fc3;
    border-right: 1px solid #fc3;
    float: left;
    padding: 0% 0px;
    font-size: 0.55vw;
}
.s41 {
    height: calc(100% / 4);
    text-align: center;
    vertical-align: middle;
    display: block;
    width: calc(100% / 6);
    border-top: 1px solid #fc3;
    border-right: 1px solid #fc3;
    float: left;
    padding: 0% 0px;
    font-size: 0.55vw;
}
.s123 {
    height: calc(100% / 4);
    text-align: center;
    vertical-align: middle;
    display: block;
    width: calc(100% / 5);
    border-top: 1px solid #fc3;
    float: left;
    padding: 0% 0px;
    font-size: 0.55vw;
}


.tblP {
    color: #06f;
}
.tblT {
    color: #0f0;
}
.tblB {
    color: #f30;
}
.bets {
    color: #fff;
}
.wins {
    color: #999;
}
.running {
    color: #f60;
}
.cancelled{color:#f03}
</style>

<div class="row">
  <div class="widget-box hidden-boder" id="">
    <div class="widget-header widget-header-blue widget-header-flat">
      <button type="button" class="btn btn-lg btn-yellow" style="margin-bottom: 5px;" onclick="refreshPage();">
                                  <i class="fa fa-refresh bigger-140 bg-icon" aria-hidden="true"></i> <?=$lang_ag[316];?>
                                    </button>
                                    <br>
    </div>
    <div class="widget-body">
      <div class="widget-main padding-xs">
        <? 
        $tb_no = 1;
        for($i=0;$i<5;$i++){ ?>
        <div class="row" style="padding-bottom: 20px;">
          <? //for($y=0;$y<2;$y++){ ?>
          <div class="col-xs-12">
            <div id="title<?=($tb_no-1)?>" class="title">
              <span class="tbls">"<?=$lang_ag[1684];?>" <?=$tb_no?> : </span>
              <span id="info<?=($tb_no-1)?>">Game ID # <span id="gid<?=($tb_no-1)?>" class="gids">18692676</span> at <span id="time<?=($tb_no-1)?>" class="times">2019-09-14 23:27:03</span> <span id="st<?=($tb_no-1)?>">[ <?=$lang_ag[1687];?> ]</span></span>
            </div>
            <div class="betTbls" id="betTbl<?=($tb_no-1)?>">
              <div class="s456">
                <span class="tbls456">4-5-6</span><br>
                <span class="bets" id="s456B<?=($tb_no-1)?>">0.00</span><br>
                <span class="wins" id="s456W<?=($tb_no-1)?>">( 0.00 )</span>
              </div>
              <div class="s5L">
                <span class="tbls5L">5 <?=$lang_ag[270];?></span><br>
                <span class="bets" id="s5LB<?=($tb_no-1)?>">0.00</span><br>
                <span class="wins" id="s5LW<?=($tb_no-1)?>">( 0.00 )</span>
              </div>
              <div class="s11HL">
                <span class="tbls11HL">11 <?=$lang_ag[1684];?></span><br>
                <span class="bets" id="s11HLB<?=($tb_no-1)?>">0.00</span><br>
                <span class="wins" id="s11HLW<?=($tb_no-1)?>">( 0.00 )</span>
              </div>
              <div class="s6L">
                <span class="tbls6L">6 <?=$lang_ag[270];?></span><br>
                <span class="bets" id="s6LB<?=($tb_no-1)?>">0.00</span><br>
                <span class="wins" id="s6LW<?=($tb_no-1)?>">( 0.00 )</span>
              </div>
              <div class="s123">
                <span class="tbls123">1-2-3</span><br>
                <span class="bets" id="s123B<?=($tb_no-1)?>">0.00</span><br>
                <span class="wins" id="s123W<?=($tb_no-1)?>">( 0.00 )</span>
              </div>

              <div class="s16">
                <span class="tbls16">2-3</span><br>
                <span class="bets" id="s23B<?=($tb_no-1)?>">0.00</span><br>
                <span class="wins" id="s23W<?=($tb_no-1)?>">( 0.00 )</span>
              </div>
              <div class="s16">
                <span class="tbls16">2-4</span><br>
                <span class="bets" id="s24B<?=($tb_no-1)?>">0.00</span><br>
                <span class="wins" id="s24W<?=($tb_no-1)?>">( 0.00 )</span>
              </div>
              <div class="s16">
                <span class="tbls1"><?=$lang_ag[1884];?></span><br>
                <span class="bets" id="s1B<?=($tb_no-1)?>">0.00</span><br>
                <span class="wins" id="s1W<?=($tb_no-1)?>">( 0.00 )</span>
              </div>
              <div class="s16">
                <span class="tblsL"><?=$lang_ag[270];?></span><br>
                <span class="bets" id="sLB<?=($tb_no-1)?>">0.00</span><br>
                <span class="wins" id="sLW<?=($tb_no-1)?>">( 0.00 )</span>
              </div>
              <div class="s16">
                <span class="tblsH"><?=$lang_ag[269];?></span><br>
                <span class="bets" id="sHB<?=($tb_no-1)?>">0.00</span><br>
                <span class="wins" id="sHW<?=($tb_no-1)?>">( 0.00 )</span>
              </div>
              <div class="s16">
                <span class="tbls6">6</span><br>
                <span class="bets" id="s6B<?=($tb_no-1)?>">0.00</span><br>
                <span class="wins" id="s6W<?=($tb_no-1)?>">( 0.00 )</span>
              </div>
              <div class="s16">
                <span class="tbls61">3-4</span><br>
                <span class="bets" id="s34B<?=($tb_no-1)?>">0.00</span><br>
                <span class="wins" id="s34W<?=($tb_no-1)?>">( 0.00 )</span>
              </div>
              <div class="s61">
                <span class="tbls61">3-5</span><br>
                <span class="bets" id="s35B<?=($tb_no-1)?>">0.00</span><br>
                <span class="wins" id="s35W<?=($tb_no-1)?>">( 0.00 )</span>
              </div>

              <div class="s16">
                <span class="tbls25">2-5</span><br>
                <span class="bets" id="s25B<?=($tb_no-1)?>">0.00</span><br>
                <span class="wins" id="s25W<?=($tb_no-1)?>">( 0.00 )</span>
              </div>
              <div class="s16">
                <span class="tbls25">2-6</span><br>
                <span class="bets" id="s26B<?=($tb_no-1)?>">0.00</span><br>
                <span class="wins" id="s26W<?=($tb_no-1)?>">( 0.00 )</span>
              </div>
              <div class="s16">
                <span class="tbls2">2</span><br>
                <span class="bets" id="s2B<?=($tb_no-1)?>">0.00</span><br>
                <span class="wins" id="s2W<?=($tb_no-1)?>">( 0.00 )</span>
              </div>
              <div class="s16">
                <span class="tbls3">3</span><br>
                <span class="bets" id="s3B<?=($tb_no-1)?>">0.00</span><br>
                <span class="wins" id="s3W<?=($tb_no-1)?>">( 0.00 )</span>
              </div>
              <div class="s16">
                <span class="tbls4">4</span><br>
                <span class="bets" id="s4B<?=($tb_no-1)?>">0.00</span><br>
                <span class="wins" id="s4W<?=($tb_no-1)?>">( 0.00 )</span>
              </div>
              <div class="s16">
                <span class="tbls5">5</span><br>
                <span class="bets" id="s5B<?=($tb_no-1)?>">0.00</span><br>
                <span class="wins" id="s5W<?=($tb_no-1)?>">( 0.00 )</span>
              </div>
              <div class="s16">
                <span class="tbls52">3-6</span><br>
                <span class="bets" id="s36B<?=($tb_no-1)?>">0.00</span><br>
                <span class="wins" id="s36W<?=($tb_no-1)?>">( 0.00 )</span>
              </div>
              <div class="s61">
                <span class="tbls52">4-5</span><br>
                <span class="bets" id="s45B<?=($tb_no-1)?>">0.00</span><br>
                <span class="wins" id="s45W<?=($tb_no-1)?>">( 0.00 )</span>
              </div>

              <div class="s56">
                <span class="tbls41">5-6</span><br>
                <span class="bets" id="s56B<?=($tb_no-1)?>">0.00</span><br>
                <span class="wins" id="s56W<?=($tb_no-1)?>">( 0.00 )</span>
              </div>
              <div class="s56">
                <span class="tbls456">1-2</span><br>
                <span class="bets" id="s12B<?=($tb_no-1)?>">0.00</span><br>
                <span class="wins" id="s12W<?=($tb_no-1)?>">( 0.00 )</span>
              </div>
              <div class="s56">
                <span class="tbls36">1-3</span><br>
                <span class="bets" id="s13B<?=($tb_no-1)?>">0.00</span><br>
                <span class="wins" id="s13W<?=($tb_no-1)?>">( 0.00 )</span>
              </div>
              <div class="s56">
                <span class="tbls24">1-4</span><br>
                <span class="bets" id="s14B<?=($tb_no-1)?>">0.00</span><br>
                <span class="wins" id="s14W<?=($tb_no-1)?>">( 0.00 )</span>
              </div>
              <div class="s56">
                <span class="tbls35">1-5</span><br>
                <span class="bets" id="s15B<?=($tb_no-1)?>">0.00</span><br>
                <span class="wins" id="s15W<?=($tb_no-1)?>">( 0.00 )</span>
              </div>
              <div class="s56">
                <span class="tbls41">1-6</span><br>
                <span class="bets" id="s16B<?=($tb_no-1)?>">0.00</span><br>
                <span class="wins" id="s16W<?=($tb_no-1)?>">( 0.00 )</span>
              </div>
              <div class="s56" style="border-right: none;">
                <span class="tbls41">4-6</span><br>
                <span class="bets" id="s46B<?=($tb_no-1)?>">0.00</span><br>
                <span class="wins" id="s46W<?=($tb_no-1)?>">( 0.00 )</span>
              </div>

            </div>
          </div>
        <? $tb_no++; //} ?>
        </div>
      <? } ?>
      </div>
    </div>
  </div>
</div>

<!-- datepicker -->
<link rel="stylesheet" href="assets/css/datepicker.min.css">
<link rel="stylesheet" href="assets/css/bootstrap-timepicker.min.css">
<link rel="stylesheet" href="assets/css/bootstrap-datetimepicker.min.css">
<script src="assets/js/bootstrap-datepicker.min.js"></script>
<script src="assets/js/bootstrap-timepicker.min.js"></script>
<script src="assets/js/moment.min.js"></script>
<script src="assets/js/bootstrap-datetimepicker.min.js"></script>
<script src="../../assets/js/main.js"></script>

<script type="text/javascript">  
var lang ={
      "table_type": "<?=$lang_ag[1414];?>",
      "bet_setting": "<?=$lang_ag[1688];?>",
      "player_comm": "<?=$lang_ag[1689];?>",
      "player_commission": "<?=$lang_ag[1677];?>",
      "player_pt": "<?=$lang_ag[1690];?>",
      "credit": "<?=$lang_ag[423];?>",
      "list": "<?=$lang_ag[1691];?>",
      "registration": "<?=$lang_ag[1692];?>",
      "online_player": "<?=$lang_ag[1693];?>",
      "used_credit": "<?=$lang_ag[1694];?>",
      "currency": "<?=$lang_ag[1695];?>",
      "username": "<?=$lang_ag[1396];?>",
      "login_invalid": "<?=$lang_ag[1696];?>.",
      "invalid_code": "<?=$lang_ag[1697];?>",
      "valid_code": "<?=$lang_ag[1698];?>",
      "account_summary": "<?=$lang_ag[1699];?>",
      "home_page": "<?=$lang_ag[32];?>",
      "super": "<?=$lang_ag[1700];?>",
      "master": "<?=$lang_ag[1701];?>",
      "agent": "<?=$lang_ag[1702];?>",
      "player": "<?=$lang_ag[1703];?>",
      "human_player": "<?=$lang_ag[1679];?>",
      "master_list": "<?=$lang_ag[1704];?>",
      "agent_list": "<?=$lang_ag[1705];?>",
      "player_list": "<?=$lang_ag[1706];?>",
      "master_registration": "<?=$lang_ag[1707];?>",
      "agent_registration": "<?=$lang_ag[1708];?>",
      "player_registration": "<?=$lang_ag[1709];?>",
      "master_credit": "<?=$lang_ag[1710];?>",
      "agent_credit": "<?=$lang_ag[1711];?>",
      "player_credit": "<?=$lang_ag[1712];?>",
      "master_pt_and_commission": "<?=$lang_ag[1713];?>",
      "agent_pt_and_commission": "<?=$lang_ag[1714];?>",
      "player_pt_and_commission": "<?=$lang_ag[1715];?>",
      "master_transfer_list": "<?=$$lang_ag[1716];?>",
      "agent_transfer_list": "<?=$lang_ag[1717];?>",
      "player_transfer_list": "<?=$lang_ag[1718];?>",
      "agent_transfer_history": "<?=$lang_ag[1719];?>",
      "credit_history": "<?=$lang_ag[1720];?>",
      "super_password_update": "<?=$lang_ag[1721];?>",
      "master_password_update": "<?=$lang_ag[1722];?>",
      "agent_password_update": "<?=$lang_ag[1723];?>",
      "login_fail_try_again": "<?=$lang_ag[1724];?>. <?=$lang_ag[1725];?>!",
      "alias_login_fail_try_again": "<?=$lang_ag[1726];?>. <?=$lang_ag[1725];?>!",
      "broswer_not_support_http_request": "<?=$lang_ag[1727];?> HTTP",
      "win_or_loss": "<?=$lang_ag[214];?>",
      "game_win_lose": "<?=$lang_ag[1728];?>",
      "simple": "<?=$lang_ag[420];?>",
      "detail": "<?=$lang_ag[524];?>",
      "hourly": "<?=$lang_ag[1729];?>",
      "transfer": "<?=$lang_ag[1730];?>",
      "history": "<?=$lang_ag[360];?>",
      "game": "<?=$lang_ag[1731];?>",
      "bet_history": "<?=$lang_ag[1732];?>",
      "game_history": "<?=$lang_ag[1733];?>",
      "running_bet": "<?=$lang_ag[1734];?>",
      "summary": "<?=$lang_ag[1680];?>",
      "baccarat": "<?=$lang_ag[1681];?>",
      "alias": "<?=$lang_ag[1735];?>",
      "profile": "<?=$lang_ag[1736]?>",
      "balance": "<?=$lang_ag[1737];?>",
      "message": "<?=$lang_ag[30];?>",
      "password": "<?=$lang_ag[1393];?>",
      "last_login": "<?=$lang_ag[1393];?>",
      "log_out": "<?=$lang_ag[34];?>",
      "general_information": "<?=$lang_ag[1739];?>",
      "check_id": "<?=$lang_ag[1740];?>",
      "not_available": "<?=$lang_ag[1741];?>",
      "available": "<?=$lang_ag[1742];?>",
      "first_name": "<?=$lang_ag[1743];?>",
      "last_name": "<?=$lang_ag[1744];?>",
      "phone": "<?=$lang_ag[1745];?>",
      "mobile": "<?=$lang_ag[1746];?>",
      "email": "<?=$lang_ag[1747];?>",
      "6_characters_min": "<?=$lang_ag[1748];?>",
      "max": "<?=$lang_ag[1398];?>",
      "min": "<?=$lang_ag[1397];?>",
      "tie": "<?=$lang_ag[1749];?>",
      "pair": "<?=$lang_ag[272];?>",
      "digits_max_15": "<?=$lang_ag[1750];?>",
      "game_type_information": "<?=$lang_ag[1751];?>",
      "table_bet_limit": "<?=$lang_ag[1752];?>",
      "inactive_game": "<?=$lang_ag[1753];?>",
      "position_taking": "<?=$lang_ag[1690];?>",
      "pt": "<?=$lang_ag[1754];?>",
      "commission": "<?=$lang_ag[1677];?>",
      "comm": "<?=$lang_ag[1689];?>",
      "max_pt": "<?=$lang_ag[1755];?>",
      "min_pt": "<?=$lang_ag[1756];?>",
      "please_fill_in_correct_email_format": "<?=$lang_ag[1757];?>.",
      "act": "<?=$lang_ag[1758];?>.",
      "actions": "<?=$lang_ag[1759];?>",
      "no": "<?=$lang_ag[1673];?>.",
      "number": "<?=$lang_ag[238];?>",
      "add": "<?=$lang_ag[1760];?>",
      "edit": "<?=$lang_ag[1390];?>",
      "save": "<?=$lang_ag[178];?>",
      "return": "<?=$lang_ag[1761];?>",
      "status": "<?=$lang_ag[184];?>",
      "open": "<?=$lang_ag[283];?>",
      "closed": "<?=$lang_ag[284];?>",
      "suspend": "<?=$lang_ag[1395];?>",
      "lock": "<?=$lang_ag[1762];?>",
      "last_login_ip": "<?=$lang_ag[1763];?>",
      "please_leave_this_blank_for_no_reset": "<?=$lang_ag[1764];?>",
      "no_update_was_made": "<?=$lang_ag[1765];?>.",
      "error_updating_member": "<?=$lang_ag[1766];?>.<?=$lang_ag[1767];?>.",
      "update_succesful": "<?=$lang_ag[1768];?>!",
      "no_data_found": "<?=$lang_ag[1];?>",
      "you_have_been_logged_out_due_to_multiple_login": "<?=$lang_ag[1769];?>.<?=$lang_ag[1770];?>.",
      "you_have_been_logged_out_due_to_inactivity": "<?=$lang_ag[1771];?>.<?=$lang_ag[1770];?>.",
      "add_succesful": "<?=$lang_ag[1772];?>!",
      "refresh": "<?=$lang_ag[316];?>",
      "error_updating": "<?=$lang_ag[1773];?>. <?=$lang_ag[1767];?>.",
      "choose_one": "<?=$lang_ag[257];?>",
      "cpt": "<?=$lang_ag[1774];?>",
      "company_pt": "<?=$lang_ag[1774];?>",
      "spt": "<?=$lang_ag[1775];?>",
      "super_pt": "<?=$lang_ag[1776];?>",
      "mpt": "<?=$lang_ag[1777];?>",
      "master_pt": "<?=$lang_ag[1778];?>",
      "apt": "<?=$lang_ag[1779];?>",
      "agent_pt": "<?=$lang_ag[1780];?>",
      "available_pt": "<?=$lang_ag[1781];?>",
      "error_updating_player_pt": "<?=$lang_ag[1782];?>. <?=$lang_ag[1767];?>.",
      "ccomm": "<?=$lang_ag[1783];?>",
      "company_comm": "<?=$lang_ag[1784];?>",
      "scomm": "<?=$lang_ag[1785];?>",
      "super_comm": "<?=$lang_ag[1786];?>",
      "mcomm": "<?=$lang_ag[1787];?>",
      "master_comm": "<?=$lang_ag[1788];?>",
      "acomm": "<?=$lang_ag[1789];?>",
      "agent_comm": "<?=$lang_ag[1790];?>",
      "error_updating_player_commission": "<?=$lang_ag[1791];?>. <?=$lang_ag[1767];?>.",
      "error_updating_credit": "<?=$lang_ag[1792];?>.<?=$lang_ag[1767];?>.",
      "current_week_date": "<?=$lang_ag[1793];?>",
      "previous_weeks_date": "<?=$lang_ag[1794];?>",
      "report_on_the_current_week": "<?=$lang_ag[1795];?>",
      "report_on_the_previous_week": "<?=$lang_ag[1796];?>",
      "search": "<?=$lang_ag[236];?>",
      "back": "<?=$lang_ag[716];?>",
      "yesterday": "<?=$lang_ag[787];?>",
      "this_week": "<?=$lang_ag[1797];?>",
      "last_week": "<?=$lang_ag[1798];?>",
      "back_to_upline_win_or_loss": "<?=$lang_ag[1799];?>",
      "master_name": "<?=$lang_ag[1800];?>",
      "agent_name": "<?=$lang_ag[1801];?>",
      "player_name": "<?=$lang_ag[1802];?>",
      "turnover": "<?=$lang_ag[1803];?>",
      "gross_comm": "<?=$lang_ag[1804];?>",
      "win": "<?=$lang_ag[1805];?>",
      "total": "<?=$lang_ag[197];?>",
      "pick_a_start_date": "<?=$lang_ag[1806];?>",
      "pick_an_end_date": "<?=$lang_ag[1807];?>",
      "date": "<?=$lang_ag[1401];?>",
      "info": "<?=$lang_ag[403];?>",
      "result": "<?=$lang_ag[1675];?>",
      "selection": "<?=$lang_ag[257];?>",
      "stake": "<?=$lang_ag[1808];?>",
      "please_select_start_date_and_end_date": "<?=$lang_ag[1809];?>.",
      "all": "<?=$lang_ag[174];?>",
      "player_total": "<?=$lang_ag[1810];?>",
      "company": "<?=$lang_ag[1811];?>",
      "to": "<?=$lang_ag[1812];?> ",
      "transfer_status": "<?=$lang_ag[1813];?>",
      "check_or_uncheck_all": "<?=$lang_ag[1814];?> <?=$lang_ag[174];?>",
      "scroll": "<?=$lang_ag[174];?>",
      "deposit": "<?=$lang_ag[1816];?>",
      "withdrawal": "<?=$lang_ag[1817];?>",
      "v_deposit": "<?=$lang_ag[1818];?>",
      "v_withdraw": "<?=$lang_ag[1819];?>",
      "cash_balance": "<?=$lang_ag[1820];?>",
      "total_balance": "<?=$lang_ag[1821];?>",
      "transfer_history": "<?=$lang_ag[1822];?>",
      "amount": "<?=$lang_ag[1658];?>",
      "transaction_time": "<?=$lang_ag[1823];?>",
      "banker": "<?=$lang_ag[1824];?>",
      "player_pair": "<?=$lang_ag[1825];?>",
      "banker_pair": "<?=$lang_ag[1826];?>",
      "running": "<?=$lang_ag[1734];?>",
      "complete": "<?=$lang_ag[1687];?>",
      "incomplete": "<?=$lang_ag[1827];?>",
      "cancelled": "<?=$lang_ag[1828];?>",
      "start_time": "<?=$lang_ag[1678];?>",
      "transfer_could_not_be_completed": "<?=$lang_ag[1829];?>.<?=$lang_ag[1830];?>.",
      "transfer_could_not_be_completed_clear_balance": "<?=$lang_ag[1831];?>. <?=$lang_ag[1832];?> <?=$lang_ag[1833];?>.",
      "transfer_balance_of_selected_user_could_not_be_completed": "<?=$lang_ag[1834];?>.<?=$lang_ag[1830];?>.",
      "username_already_exists": "<?=$lang_ag[1835];?>. <?=$lang_ag[1836];?>.",
      "error_updating_alias": "<?=$lang_ag[1837];?>. <?=$lang_ag[1767];?>.",
      "closed_accounts": "<?=$lang_ag[1838];?>",
      "current_password": "<?=$lang_ag[415];?>",
      "new_password": "<?=$lang_ag[416];?>",
      "confirm_new_password": "<?=$lang_ag[1839];?>",
      "reset": "<?=$lang_ag[1840];?>", 
      "update": "<?=$lang_ag[1841];?>",
      "current_password_must_be_atleast_6_characters_long": "<?=$lang_ag[415];?> <?=$lang_ag[1842];?> 6 <?=$lang_ag[1843];?>.",
      "your_new_password_must_be_atleast_6_characters_long": "<?=$lang_ag[416];?> <?=$lang_ag[1842];?> 6 <?=$lang_ag[1843];?>.",
      "new_passwords_you_entered_do_not_match": "<?=$lang_ag[1844];?>. <?=$lang_ag[1845];?>.",
      "new_password_must_be_different_from_current_password": "<?=$lang_ag[1846];?>. <?=$lang_ag[1845];?>.",
      "are_you_sure_you_want_to_logout": "<?=$lang_ag[1847];?>?",
      "yes": "<?=$lang_ag[491];?>",
      "q_no": "<?=$lang_ag[488];?>",
      "game_id": "<?=$lang_ag[1674];?>",
      "roulette": "<?=$lang_ag[1848];?>",
      "reset_password": "<?=$lang_ag[1849];?>",
      "s": "<?=$lang_ag[1850];?>",
      "m": "<?=$lang_ag[1851];?>",
      "a": "<?=$lang_ag[1852];?>",
      "c": "<?=$lang_ag[1853];?>", 
      "bet_on_player": "<?=$lang_ag[1854];?>",
      "win_on_player": "<?=$lang_ag[1855];?>",
      "bet_on_banker": "<?=$lang_ag[1856];?>",
      "win_on_banker": "<?=$lang_ag[1857];?>",
      "bet_on_tie": "<?=$lang_ag[1858];?>",
      "win_on_tie": "<?=$lang_ag[1859];?>",
      "bet_on_player_pair": "<?=$lang_ag[1860];?>",
      "win_on_player_pair": "<?=$lang_ag[1861];?>",
      "bet_on_banker_pair": "<?=$lang_ag[1862];?>",
      "win_on_banker_pair": "<?=$lang_ag[1863];?>",
      "could_not_get_pt_control": "<?=$lang_ag[1864];?>!",
      "update_auto_take_remaining_pt_succesful": "<?=$lang_ag[1865];?>!",
      "error_please_try_again_later": "<?=$lang_ag[4];?>! <?=$lang_ag[1866];?>.",
      "at": "@",
      "table": "<?=$lang_ag[1867];?>",
      "win_loss": "<?=$lang_ag[1868];?>",
      "agent_total": "<?=$lang_ag[1869];?>",
      "master_total": "<?=$lang_ag[1870];?>",
      "super_total": "<?=$lang_ag[1871];?>",
      "please_choose_a_correct_date_time_range": "<?=$lang_ag[1872];?>.",
      "update_failed_your_current_password_is_invalid": "<?=$lang_ag[1873];?>! <?=$lang_ag[1874];?>. <?=$lang_ag[1875];?>.",
      "please_select_a_date": "<?=$lang_ag[1876];?>.",
      "please_choose_all_selections": "<?=$lang_ag[1877];?>",
      "please_select_all_options": "<?=$lang_ag[1878];?>.",
      "action_by": "<?=$lang_ag[1879];?>",
      "action_to": "<?=$lang_ag[1880];?>",
      "remark": "<?=$lang_ag[313];?>",
      "last_credit": "<?=$lang_ag[1881];?>",
      "total_transfer": "<?=$lang_ag[1882];?>",
      "running_bet_summary": "<?=$lang_ag[1883];?>" <?php /* ?> <?php */ ?>
      };
                
                function toArray(_Object){
                        var _Array = new Array();
                        for(var name in _Object){
                                _Array[name] = _Object[name];
                        }
                        return _Array;
                 }
                var arr_lang   =   toArray(lang);

var errCode1 = "E401",
    errCode2 = "E402",
    usrID = "",
    role = "",
    aliID = "",
    lan = "",
    tblTy = "",
    loop = null,
    slvS = "2",
    bkuS = "3";

  $(".digits").digits();
  jQuery(function($) {

    clearInterval(lLoop);
    //datepicker plugin
    $('.date-picker').datepicker({
      autoclose: true,
      todayHighlight: true,
    }).next().on(ace.click_event, function(){
      $(this).prev().focus();
    });
   

    var parts_d ='<?=$_POST["sdate"]?>'.split(' ');
    var parts_e ='<?=$_POST["edate"]?>'.split(' ');

    $('#sdate').datepicker('setDate', parts_d[0]);
    $('#edate').datepicker('setDate', parts_e[0]);
    getSummary();
    loopSmr();
  });

function loopSmr() {
  window.clearInterval(lLoop);
    lLoop = setInterval("getSummary()", 1e4)
}

function getSummary() {
    getSummaryAj()
}

function refreshPage() {
  window.clearInterval(lLoop);
   getSummary();
    loopSmr();
}

function setSummary(e) {
    var n = e.gId.length;
    if (n > 0)
        for (var t = 0; n > t; t++) "0" == e.gId[t] || null == e.gId[t] ? (document.getElementById("info" + t).innerHTML = "[ Closed ]",document.getElementById("s5LB" + t).innerHTML = "0.00", document.getElementById("s5LW" + t).innerHTML = "( 0.00 )",document.getElementById("s11HLB" + t).innerHTML = "0.00", document.getElementById("s11HLW" + t).innerHTML = "( 0.00 )",document.getElementById("s6LB" + t).innerHTML = "0.00", document.getElementById("s6LW" + t).innerHTML = "( 0.00 )",document.getElementById("s1B" + t).innerHTML = "0.00", document.getElementById("s1W" + t).innerHTML = "( 0.00 )",document.getElementById("sLB" + t).innerHTML = "0.00", document.getElementById("sLW" + t).innerHTML = "( 0.00 )",document.getElementById("sHB" + t).innerHTML = "0.00", document.getElementById("sHW" + t).innerHTML = "( 0.00 )",document.getElementById("s6B" + t).innerHTML = "0.00", document.getElementById("s6W" + t).innerHTML = "( 0.00 )",document.getElementById("s2B" + t).innerHTML = "0.00", document.getElementById("s2W" + t).innerHTML = "( 0.00 )",document.getElementById("s3B" + t).innerHTML = "0.00", document.getElementById("s3W" + t).innerHTML = "( 0.00 )",document.getElementById("s4B" + t).innerHTML = "0.00", document.getElementById("s4W" + t).innerHTML = "( 0.00 )",document.getElementById("s5B" + t).innerHTML = "0.00", document.getElementById("s5W" + t).innerHTML = "( 0.00 )",document.getElementById("s456B" + t).innerHTML = "0.00", document.getElementById("s456W" + t).innerHTML = "( 0.00 )",document.getElementById("s123B" + t).innerHTML = "0.00", document.getElementById("s123W" + t).innerHTML = "( 0.00 )",document.getElementById("s12B" + t).innerHTML = "0.00", document.getElementById("s12W" + t).innerHTML = "( 0.00 )",document.getElementById("s13B" + t).innerHTML = "0.00", document.getElementById("s13W" + t).innerHTML = "( 0.00 )",document.getElementById("s14B" + t).innerHTML = "0.00", document.getElementById("s14W" + t).innerHTML = "( 0.00 )",document.getElementById("s15B" + t).innerHTML = "0.00", document.getElementById("s15W" + t).innerHTML = "( 0.00 )",document.getElementById("s16B" + t).innerHTML = "0.00", document.getElementById("s16W" + t).innerHTML = "( 0.00 )",document.getElementById("s23B" + t).innerHTML = "0.00", document.getElementById("s23W" + t).innerHTML = "( 0.00 )",document.getElementById("s24B" + t).innerHTML = "0.00", document.getElementById("s24W" + t).innerHTML = "( 0.00 )",document.getElementById("s25B" + t).innerHTML = "0.00", document.getElementById("s25W" + t).innerHTML = "( 0.00 )",document.getElementById("s26B" + t).innerHTML = "0.00", document.getElementById("s26W" + t).innerHTML = "( 0.00 )",document.getElementById("s34B" + t).innerHTML = "0.00", document.getElementById("s34W" + t).innerHTML = "( 0.00 )",document.getElementById("s35B" + t).innerHTML = "0.00", document.getElementById("s35W" + t).innerHTML = "( 0.00 )",document.getElementById("s36B" + t).innerHTML = "0.00", document.getElementById("s36W" + t).innerHTML = "( 0.00 )",document.getElementById("s45B" + t).innerHTML = "0.00", document.getElementById("s45W" + t).innerHTML = "( 0.00 )",document.getElementById("s46B" + t).innerHTML = "0.00", document.getElementById("s46W" + t).innerHTML = "( 0.00 )",document.getElementById("s56B" + t).innerHTML = "0.00", document.getElementById("s56W" + t).innerHTML = "( 0.00 )") : (document.getElementById("info" + t).innerHTML = 'Game ID # <span id="gid' + t + '" class="gids"></span> at <span id="time' + t + '" class="times"></span> <span id="st' + t + '"></span>', document.getElementById("gid" + t).innerHTML = e.gId[t], document.getElementById("time" + t).innerHTML = e.time[t], document.getElementById("st" + t).innerHTML = "[ " + stLt[e.st[t] - 1] + " ]",document.getElementById("s5LB" + t).innerHTML = e.s5L[t], document.getElementById("s5LW" + t).innerHTML = "( " + addCommas(e.s5L[t]) + " )",document.getElementById("s11HLB" + t).innerHTML = e.s11HL[t], document.getElementById("s11HLW" + t).innerHTML = "( " + addCommas(e.s11HL[t]) + " )",document.getElementById("s6LB" + t).innerHTML = e.s6L[t], document.getElementById("s6LW" + t).innerHTML = "( " + addCommas(e.s6L[t]) + " )",document.getElementById("s1B" + t).innerHTML = e.s1[t], document.getElementById("s1W" + t).innerHTML = "( " + addCommas(e.s1[t]) + " )",document.getElementById("sLB" + t).innerHTML = e.sL[t], document.getElementById("sLW" + t).innerHTML = "( " + addCommas(e.sL[t]) + " )",document.getElementById("sHB" + t).innerHTML = e.sH[t], document.getElementById("sHW" + t).innerHTML = "( " + addCommas(e.sH[t]) + " )",document.getElementById("s6B" + t).innerHTML = e.s6[t], document.getElementById("s6W" + t).innerHTML = "( " + addCommas(e.s6[t]) + " )",document.getElementById("s2B" + t).innerHTML = e.s2[t], document.getElementById("s2W" + t).innerHTML = "( " + addCommas(e.s2[t]) + " )",document.getElementById("s3B" + t).innerHTML = e.s3[t], document.getElementById("s3W" + t).innerHTML = "( " + addCommas(e.s3[t]) + " )",document.getElementById("s4B" + t).innerHTML = e.s4[t], document.getElementById("s4W" + t).innerHTML = "( " + addCommas(e.s4[t]) + " )",document.getElementById("s5B" + t).innerHTML = e.s5[t], document.getElementById("s5W" + t).innerHTML = "( " + addCommas(e.s5[t]) + " )",document.getElementById("s456B" + t).innerHTML = e.s456[t], document.getElementById("s456W" + t).innerHTML = "( " + addCommas(e.s456[t]) + " )",document.getElementById("s123B" + t).innerHTML = e.s123[t], document.getElementById("s123W" + t).innerHTML = "( " + addCommas(e.s123[t]) + " )",document.getElementById("s12B" + t).innerHTML = e.s12[t], document.getElementById("s12W" + t).innerHTML = "( " + addCommas(e.s12[t]) + " )",document.getElementById("s13B" + t).innerHTML = e.s13[t], document.getElementById("s13W" + t).innerHTML = "( " + addCommas(e.s13[t]) + " )",document.getElementById("s14B" + t).innerHTML = e.s14[t], document.getElementById("s14W" + t).innerHTML = "( " + addCommas(e.s14[t]) + " )",document.getElementById("s15B" + t).innerHTML = e.s15[t], document.getElementById("s15W" + t).innerHTML = "( " + addCommas(e.s15[t]) + " )",document.getElementById("s16B" + t).innerHTML = e.s16[t], document.getElementById("s16W" + t).innerHTML = "( " + addCommas(e.s16[t]) + " )",document.getElementById("s23B" + t).innerHTML = e.s23[t], document.getElementById("s23W" + t).innerHTML = "( " + addCommas(e.s23[t]) + " )",document.getElementById("s24B" + t).innerHTML = e.s24[t], document.getElementById("s24W" + t).innerHTML = "( " + addCommas(e.s24[t]) + " )",document.getElementById("s25B" + t).innerHTML = e.s25[t], document.getElementById("s25W" + t).innerHTML = "( " + addCommas(e.s25[t]) + " )",document.getElementById("s26B" + t).innerHTML = e.s26[t], document.getElementById("s26W" + t).innerHTML = "( " + addCommas(e.s26[t]) + " )",document.getElementById("s34B" + t).innerHTML = e.s34[t], document.getElementById("s34W" + t).innerHTML = "( " + addCommas(e.s34[t]) + " )",document.getElementById("s35B" + t).innerHTML = e.s35[t], document.getElementById("s35W" + t).innerHTML = "( " + addCommas(e.s35[t]) + " )",document.getElementById("s36B" + t).innerHTML = e.s36[t], document.getElementById("s36W" + t).innerHTML = "( " + addCommas(e.s36[t]) + " )",document.getElementById("s45B" + t).innerHTML = e.s45[t], document.getElementById("s45W" + t).innerHTML = "( " + addCommas(e.s45[t]) + " )",document.getElementById("s46B" + t).innerHTML = e.s46[t], document.getElementById("s46W" + t).innerHTML = "( " + addCommas(e.s46[t]) + " )",document.getElementById("s56B" + t).innerHTML = e.s56[t], document.getElementById("s56W" + t).innerHTML = "( " + addCommas(e.s56[t]) + " )")
}

function setInfo(e, n, t) {
    if (t > 0) {
        var m = n - t;
        document.getElementById(e).innerHTML = addCommas(n) + " [ " + addCommas(m) + " + <span class='clNum' title='" + lang.closed_accounts + "'>" + addCommas(t) + "</span> ]"
    } else document.getElementById(e).innerHTML = addCommas(n)
}
var stLt = ["<span class='running'>" + lang.running + "</span>", lang.complete, "<span class='running'>" + lang.incomplete + "</span>", "<span class='cancelled'>" + lang.cancelled + "</span>"],
    lLoop = null;


function getSummaryAj() {
    var e = GetXmlHttpObject();
    null != e ? (url = "dbSummaryHL.php", e.onreadystatechange = function() {
        if (4 == e.readyState && 200 == e.status) {
            var t = e.responseText;
            if (t == errCode1) sessTimeoutAj();
            else {
                var r = JSON.parse(t);
                null != r ? setSummary(r) : (setSummary(null), alert("Error from DB"))
            }
        }
    }, e.open("POST", url, !0), e.setRequestHeader("Content-type", "application/x-www-form-urlencoded"), e.send(null)) : alert(lang.broswer_not_support_http_request)
}
function GetXmlHttpObject() {
    return window.XMLHttpRequest ? new XMLHttpRequest : window.ActiveXObject ? new ActiveXObject("Microsoft.XMLHTTP") : null
}
function addCommas(e) {
    e += "", x = e.split("."), x1 = x[0], x2 = x.length > 1 ? "." + x[1] : "";
    for (var r = /(\d+)(\d{3})/; r.test(x1);) x1 = x1.replace(r, "$1,$2");
    return x1 + x2
}

function delCommas(e) {
    return e = String(e), e = e.replace(/,/g, ""), e = e.replace(/\s/g, "")
}
</script>