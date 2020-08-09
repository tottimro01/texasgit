<?php   
  ob_start();
  if (!isset($_SESSION)){ 
    session_start(); 
  } 

  if(($_SESSION['m_id'] == '') || (!isset($_SESSION['m_id']))){
    exit();
  }

  require('inc/conn.php');
  require('inc/function.php');
  require("lang/variable_lang.php");
  require("lang/function_array.php");

  /*$url_op=$json_path."/json/sport.json"; 
  $op_js=file_get_contents2($url_op);
  $jsop = json_decode($op_js, true);*/
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title><?=$app_title;?></title>
  <link rel="stylesheet" type="text/css" href="css/style.css?v=<?=$cache_css;?>">
  <link href="template/maxbet/public/css/M_LeftAllInOne.css" rel="stylesheet" type="text/css" />
  <link href="template/maxbet/public/css/oddsFamily.css" rel="stylesheet" type="text/css" />
  <script type="text/javascript" src="commJS/jquery.min.js"></script>
  <script language="JavaScript" type="text/javascript" src="commJS/M_Util.js?v=<?=$cache_js;?>"></script>
  <script language="JavaScript" type="text/javascript" src="commJS/M_LeftFrame.js?v=<?=$cache_js;?>"></script>
  <script src="js/sport_script.js?v=<?=$cache_js;?>"></script>
  <script type="text/javascript">
    var userlang='th';
    var OddsKeepREFRESH = 10000;
    var RES_KeepOdds = '<?=$lang_member[916];?>';
    var RES_FncOddsChangeMsg = "";
    var RES_FncIndexChangeMsg = "";
    var RES_yousuretobetmesg = '<?=$lang_member[917];?>';
    var RES_yousuretobetmesg1 = "Your previous bet is still processing, are you sure you want to bet ?";
    var RES_morethan2 = '<?=$lang_member[918];?>';
    var RES_lowermin = '<?=$lang_member[919];?>';
    var RES_highermax = '<?=$lang_member[920];?>';
    var RES_oddsover200000 = "Payout odds have exceeded Max Odds (200,000). Please make adjustments to the selection before placing bet.";
    var RES_Open_Multi = false;
    var RES_Open_Multi_Parlay = true;
    var RES_Add_To_Parlay = '<?=$lang_member[921];?>';
    var RES_Cancel_From_Parlay = '<?=$lang_member[922];?>';
    //-- casino --
    var RngSingleLobbyWebURL = "http://ohoking.com/SingleLobbyWebPortal/account/index?o=";
    var CasinoWebURL = "http://ohoking.com";
    var LiveCasinoWebURL = "http://ohoking.com";
    var BingoWebURL = "http://ohoking.com"; 

    var SizeX = "1024";
    var SizeY = "706";
    var winLobby;
    var winLiveLobby;
    var winBingoLobby;
    var FavCnt = "9999";
  </script>
  <style>
    .show_blink{
    border-radius: 2px;
        /*background-color: red !important;*/
        -webkit-animation: blink_ball 1s infinite;  /* Safari 4+ */
        -moz-animation: blink_ball 1s infinite;  /* Fx 5+ */
        -o-animation: blink_ball 1s infinite;  /* Opera 12+ */
        animation: blink_ball 1s infinite;  /* IE 10+, Fx 29+ */
    }
    @-webkit-keyframes blink_ball {
      0%, 49% {
        background-color: #ffaf8c;
      }
      50%, 100% {
        background-color: none;
      }
    }
    .left_conf{
      width: 185px;
    }
    .left_cell_bg1{
      background-color: #eeeceb;
    }
    .left_cell_border1{
      /*border: 1px solid #b6b6b6;*/
      border: 1px solid #003289;
    }
    .left_cell_border2{
      border: 1px solid #fff;
    }
    .left_acc_container{
      box-sizing: border-box;
      margin: 5px auto;
    }
    .left_acc_container *{
      box-sizing: border-box;
    }
    .left_acc_header{
      padding: 7px 5px;
      border: 1px solid #b6b6b6;
      background-color: #eeeceb;
      /*border-radius: 3px 3px 0px 0px;*/
      display: block;
    }
    .left_acc_container.LeftAlt .left_acc_header{
      padding: 5px 5px;
      background-color: #988141;
      color: #fff;
      /*border: 1px solid #917c3f;*/

      background-color: #003289;
      border: 1px solid #111929;
    }
    .left_acc_container.LeftAlt .left_acc_header.asBtn{
      cursor: pointer;
    }
    .left_acc_container.LeftAlt .left_acc_header.asBtn:hover{
      /*background-color: #003289;*/
    }
    .left_acc_header .left_menu_btns{
      float: right;
      display: inline;
    }
    .left_acc_header .left_menu_btns .leftBtn{
      width: 15px;
      height: 15px;
      border: 1px solid #b6b6b6;
      /*background-color: #fff;*/
      border-radius: 2px;
      cursor: pointer;
      padding: 0;
      display: inline-block;
      vertical-align: top;
    }
    .left_acc_header .left_menu_btns .leftBtn:hover{
      background-color: #cdb05c;
      border-color: #cdb05c;
    }
    .left_acc_header .left_menu_btns .leftBtn input{
      opacity: 0;
      width: 0;
      margin: 0;
      position: absolute;
    }
    .left_acc_header .left_menu_btns .leftBtn.btnArrow{
      background-image: url(template/maxbet/public/images/layout/icon_UI02.png);
      background-position: -130px -1px;
      background-repeat: no-repeat;
    }
    .left_acc_header .left_menu_btns .leftBtn.btnArrow:hover{
      background-position: -130px -18px;
    }
    .left_acc_container.collapsed .left_acc_header .left_menu_btns .leftBtn.btnArrow{
      background-position: -113px -1px;
    }
    .left_acc_container.collapsed .left_acc_header .left_menu_btns .leftBtn.btnArrow:hover{
      background-position: -113px -18px;
    }
    .left_acc_header .left_menu_btns .leftBtn.btnRefresh{
      /*background-image: url(template/maxbet/public/images/layout/icon_UI01.png);
      background-position: -1px -1px;
      background-repeat: no-repeat;*/

      background-repeat: no-repeat;
      /*background-position: center!important;*/
      background-image: url(img/refresh2.png);
    }
    .left_acc_container:not(.onRefresh) .left_acc_header .left_menu_btns .leftBtn.btnRefresh:hover{
      /*background-position: -1px -19px;*/
    }
    .left_acc_container.onRefresh .left_acc_header .left_menu_btns .leftBtn.btnRefresh{
      background-image: url(template/maxbet/public/images/layout/icon_RefreshWait.gif);
      background-repeat: no-repeat;
      background-position: center!important;
      background-size: 100%;
      background-color: #eee!important;
      /*background-image: url(img/refresh2.png);*/

    }
    .left_acc_container.LeftAlt .left_acc_header .left_menu_btns .leftBtn.btnRefresh{
      /*background-position: -1px -19px;*/
      background-color: transparent;
      border-color: transparent;
    }
    .left_acc_container.LeftAlt .left_acc_header .left_menu_btns .leftBtn{
      /*background-color: #5b4d27;*/
      /*border: 1px solid #5b4d27;*/
      border: none;
    }
    .left_acc_container.LeftAlt .left_acc_header .left_menu_btns .leftBtn:hover{
      /*background-color: #766432;
      border-color: #766432;*/
      background-color: #2d6bd6;
    }
    .left_acc_header .left_menu_btns .leftBtn.btnShowSportMenu{
      background-image: url(template/maxbet/public/images/layout/icon_UI02.png);
      background-position: -129px -17px;
      background-repeat: no-repeat;
    }
    .left_acc_container.collapsed .left_acc_header .left_menu_btns .leftBtn.btnShowSportMenu{
      background-position: -112px -17px;
    }
    .left_acc_header .left_menu_btns .leftBtn.btnShowSportFav{
      background-image: url(template/maxbet/public/images/layout/icon_UI02.png);
      background-position: -1px -52px;
      background-repeat: no-repeat;
    }
    .left_acc_container .left_acc_body{}
    .left_acc_body .nickname_row{
      padding: 0 4px 6px 4px;
    }
    .left_acc_body .nickname_row hr{
      margin-top: 0;
      border-top-color: #cccccc;
    }
    .left_acc_body .left_acc_stats table{
      border-collapse: collapse;
      width: 100%;
    }
    .left_acc_body .left_acc_stats table tr td{
      padding: 4px 4px;
      border: 1px solid #fff;
    }
    .left_acc_body .left_acc_stats table tr td:nth-child(1){
      background-color: #eeeceb;
      color: #6d6d6d;
    }
    .left_acc_body .left_acc_stats table tr td:nth-child(2){
      background-color: #fafafa;
      color: #000;
    }
    .left_acc_body .icon-credit, 
    .left_acc_body .icon-cash{
      background-image: url(template/maxbet/public/images/layout/icon_cash.png);
      background-repeat: no-repeat;
      background-position: 0px 0px;
      height: 20px;
      width: 20px;
      display: inline-block;
    }
    .left_acc_body .icon-cash{
      background-position: 0px -20px;
    }
    .left_acc_container.collapsed .hideOnCollapsed{
      display: none;
    }
    .left_acc_container .showOnCollapsed{
      display: none;
    }
    .left_acc_container.collapsed .showOnCollapsed{
      display: block;
    }
    .left_acc_container.collapsed .showOnCollapsed.dis-inline{
      display: inline;
    }
    .cr{
      color: red;
    }
    .sport_menu_tab td{
      /*border: 1px solid #b29337;*/
      border: 1px solid #111929;
      border-top: 0;
      border-bottom: 0;
    }
    .sport_menu_tab .sport_selector{
      display: block;
      padding: 6px 0;
      /*background-color: #bda14f;*/
      background-color: #003289;
      color: #fff;
      font-weight: bold;
      position: relative;
      overflow: hidden;
      cursor: pointer;
    }
    .sport_menu_tab .sport_selector input{
      opacity: 0;
      width: 0;
      position: absolute;
    }
    .sport_menu_tab .sport_selector input:checked ~ span{
      color: yellow;
    }
    .sport_menu_tab .sport_selector input:checked ~ .sport_indicator{
      position: absolute;
      width: 6px;
      height: 6px;
      background: #d6dde5;
      transform: rotateZ(45deg);
      left: 50%;
      margin-left: -3px;
      bottom: -3px;
    }
    /*sport items*/
    .sport_menu_list{
      display: none;
    }
    .sport_menu_list,
    .sport_menu_list li,
    .sport_menu_list .sport_menu_item,
    .sport_menu_list .sport_menu_item li{
		  list-style: none;
    	padding: 0px;
    	margin: 0;
    }
    .sport_menu_list > li {
    	/*border-bottom: 1px solid #fff;*/
      border-bottom: 1px solid #d6e5ff;
    }
    .sport_menu_list .sport_menu_item_header{
    	padding: 6px 6px;
    	background-color: #fff;
    	/*color: #022352;*/
      color: #003289;
    	font-size: 12px;
      font-family: "Arial", "Tahoma", "pmingliu", "新細明體";
    	font-weight: bold;
    	display: block;
    	cursor: pointer;
    }
    .sport_menu_list .sport_menu_item_header .sport_icon img{
    	width: 14px;
		  height: 14px;
		  margin-right: 3px;
    }
    .sport_menu_list .sport_menu_item_header .sport_name{
		  vertical-align: top;
    }
    .sport_menu_list .sport_menu_item_header .sport_menu_collapse_arrow{
    	width: 14px;
      height: 14px;
      display: inline-block;
      background-image: url(template/maxbet/public/images/layout/L_menuBg.png);
      background-repeat: no-repeat;
      background-position: -1px -6px;
    }
    .sport_menu_list .checkboxSportItem:checked ~ .sport_menu_item_header .sport_menu_collapse_arrow{
		  background-position: -1px -157px;
    }
    .sport_menu_list .checkboxSportItem{
      opacity: 0;
      width: 0;
      position: absolute;
    }
    .sport_menu_list .checkboxSportItem:checked ~ .sport_menu_item_header{
    	/*color: #ff5a09;*/
      color: #0a59e4;
    } 
    .sport_menu_list .checkboxSportItem:checked ~ .sport_menu_item{
		  display: block;
    } 
    .sport_menu_list .sport_menu_item{
    	display: none;
    	background-color: #fff;
    	box-shadow: inset 0px 11px 4px -10px #CCC, inset 0px -11px 4px -10px #CCC; 
    }
    .sport_menu_list .sport_menu_item > li .sport_menu_item_selector{
    	cursor: pointer;
    	padding: 5px 6px 5px 10px;
      font-size: 12px;
      font-family: "Arial", "Tahoma", "pmingliu", "新細明體";
      display: block;
    }
    .sport_menu_list .sport_menu_item > li .sport_menu_item_selector input{
    	position: absolute;
    	width: 0;
    	width: 0;
    	opacity: 0;
    }
    .sport_menu_list .sport_menu_item > li .sport_menu_item_selector:hover > span:not(.total),
  	.sport_menu_list .sport_menu_item > li .sport_menu_item_selector input:checked ~ span{
    	color: #0a5ae3;
    	font-weight: bold;
    }
    .sport_menu_list  .total{
    	color: #f00;
		  float: right;
  	}
    .sport_menu_list  .total > .live_badge{
      background-color: #fa9544;
      color: #fff!important;
      border-radius: 2px;
      font-size: 10px;
      font-weight: normal;
      padding: 1px 3px;
      margin-right: 4px;
    }
    .sport_menu_list  .total > .live_badge:before{
      content: "Live";
    }
    .leftControlBtn{
    	text-align: center;
      background-color: #f8f8f8;
      border: 1px solid #c7c7c7;
      font-size: 11px;
      border-radius: 2px;
      white-space: nowrap;
      padding: 2px 3px;
      text-overflow: ellipsis;
      overflow: hidden;
      cursor: pointer;
      display: inline-block;
    }
    .leftControlBtn:hover{
      background-color: #2d6bd6;
      border-color: #111929;
      color: #fff;
    }
    .BetWaitListContainer{
    	margin: 0 4px 4px 4px;
    }
    .BetWaitListContainer > div{
      padding: 3px;
    }
    .BetWaitListContainer .BetWaitListHeader{
      font-weight: bold;
      cursor: pointer;
    }
    .BetWaitListContainer .chkCollapseBetWaitList:checked + .BetWaitListHeader,
    .BetWaitListContainer .BetWaitListHeader:hover{
      color: #ff5a09;
    }
    .BetWaitListContainer .BetWaitListHeader:before{
    	content: "";
    	width: 14px;
      height: 14px;
      display: inline-block;
      background-image: url(template/maxbet/public/images/layout/L_menuBg.png);
      background-repeat: no-repeat;
      background-position: -1px -6px;
    }
    .BetWaitListContainer .BetWaitListHeader > span{
    	vertical-align: top;
    }
    .BetWaitListContainer .chkCollapseBetWaitList{
     	opacity: 0;
     	width: 0;
     	position: absolute;
    }
    .BetWaitListContainer .chkCollapseBetWaitList:checked + .BetWaitListHeader:before{
    	background-position: -1px -157px;
    }
    .BetWaitListContainer #BetWaitListTable .BetWaitListDetailsRow{
    display: none;
    }
    .BetWaitListContainer .chkCollapseBetWaitList:checked ~ #BetWaitListTable .BetWaitListDetailsRow{
    	display: table-row;
    }
    .BetWaitListContainer #BetWaitListTable .BetWaitListDetails hr{
      border-top-color: #cccccc;
    }
    .chkboxButton input{
      position: absolute;
      width: 0;
      opacity: 0;
    }
    .chkboxButton .markActive{
    	display: none;
    }
    .chkboxButton .markInactive{
      display: inline;
    }
    .chkboxButton input:checked ~ .markActive{
    	display: inline;
    }
    .chkboxButton input:checked ~ .markInactive{
      display: none;
    }
    .n_loader{
      display: inline-block;
      width: 10px;
      height: 10px;
      border: 1px solid #d6e5ff;
      border-bottom-color: #0958e0;
      border-radius: 50px;
      -moz-animation: n_loader_spin .7s infinite linear;
      -webkit-animation: n_loader_spin .7s infinite linear;
      animation: n_loader_spin .7s infinite linear;
    }
    @-moz-keyframes n_loader_spin {
      from { -moz-transform: rotate(0deg); }
      to { -moz-transform: rotate(360deg); }
    }
    @-webkit-keyframes n_loader_spin {
      from { -webkit-transform: rotate(0deg); }
      to { -webkit-transform: rotate(360deg); }
    }
    @keyframes n_loader_spin {
      from {transform:rotate(0deg);}
      to {transform:rotate(360deg);}
    }
  </style>
</head>
<body style="margin: 0;">
  <?
    include 'left_account.php';
  ?>

<!--   <div class="left_acc_container left_conf" id="left_account">
    user info 
    <div class="left_acc_header" style="border-bottom: 0;">
      <div style="margin-bottom: 3px;">
        <b class="Tcolor01"><?=$_SESSION['m_user'];?></b>
        <div class="left_menu_btns">
          <label class="leftBtn btnArrow" for="chkCollapseLeft">
            <input type="checkbox" class="chkLeftCollapsed" id="chkCollapseLeft" data-collapse-id="left_account" />
          </label>
          <button class="leftBtn btnRefresh" id="refreshLeftAcc"></button>
        </div>
      </div>
      <div class="showOnCollapsed">
        <?if($_SESSION['m_user_set']!=""){?>
          <b class="member_nickname Tcolor01"><?=$_SESSION['m_user_set'];?></b>
        <?}else{?>
          <b class="member_nickname Tcolor01"><?=$lang_member[98];?></b>
        <?}?>
      </div>
    </div>
 

    
    user credit 
    <div class="left_acc_body left_cell_border1 hideOnCollapsed" style="border-top: 0;">
      <div class="left_cell_bg1">
        <div class="nickname_row hideOnCollapsed">
        <hr />
          <table cellspacing="0" cellpadding="0" width="100%;">
            <tr>
              <td><b><?=$lang_member[93];?></b></td>
              <td align="right">
                <?if($_SESSION['m_user_set']!=""){?>
                  <b id="txt_nickname" class="member_nickname Tcolor01"><?=$_SESSION['m_user_set'];?></b>
                <?}else{?>
                  <b id="txt_nickname" class="member_nickname Tcolor01"><?=$lang_member[98];?></b>
                <?}?>
              </td>
            </tr>
          </table>
        </div>
        <div class="left_acc_stats">
          <table cellspacing="0" cellpadding="0">
            <colgroup><col style="width: 60%;"><col></colgroup>
            <tr>
              <td><span><?=$lang_member[95];?></span></td>
              <td align="right"><span class="betcre_text"></span></td>
            </tr>
            <tr>
              <td><span><?=$lang_member[53];?></span></td>
              <td align="right"><span class="in_credit_text"></span></td>
            </tr>
            <tr>
              <td><span><?=$lang_member[94];?></span></td>
              <td align="right"><span class="win_credit_text"></span></td>
            </tr>
            <tr>
              <td><span><?=$lang_member[97];?></span></td>
              <td align="right"><span class="cre_text"></span></td>
            </tr>
            <tr>
              <td colspan="2"><span><?=$lang_member[99];?></span></td>
            </tr>
            <tr>
              <td style="display: none;"></td>
              <td colspan="2" align="right"><span class="lastlogin_text"></span></td>
            </tr>
            <tr>
              <td colspan="2"><span><?=$lang_member[100];?></span></td>
            </tr>
            <tr>
              <td style="display: none;"></td>
              <td colspan="2" align="right"><span class="betdate_text"></span></td>
            </tr>
          </table>
        </div>
      </div>
    </div>

    user credit mini 
    <div class="left_acc_body left_cell_border1 showOnCollapsed" style="border-top: 0;">
      <div class="left_cell_bg1">
        <div class="left_acc_stats">
          <table cellspacing="0" cellpadding="0">
            <colgroup><col style="width: 25%;"><col></colgroup>
            <tr>
              <td align="center"><span class="icon-credit" title="<?=$lang_member[925];?>"></span></td>
              <td align="right"><b><span class="currency_text"></span>&nbsp;<span class="betcre_text"></span></b></td>
            </tr>
            <tr>
              <td align="center"><span class="icon-cash" title="<?=$lang_member[94]?>"></span></td>
              <td align="right"><b><span class="currency_text"></span>&nbsp;<span class="win_credit_text"></span></b></td>
            </tr>
          </table>
        </div>
      </div>
    </div>
  </div> -->



  <!-- <div class="left_acc_container LeftAlt left_conf">
    <label class="left_acc_header asBtn" for="showSportFav">
      <div>
        <div class="left_menu_btns" style="float: none;">
          <span class="leftBtn btnShowSportFav" for="showSportFav">
            <input type="checkbox" id="showSportFav" />  
          </span>
          <span>
            <span>&nbsp;<b><?=$lang_left[18]?>โปรด</b></span>
          </span>
        </div>
      </div>
    </label>
  </div> -->
  
  <!-- left sport menu -->
  <div class="left_acc_container LeftAlt left_conf" id="left_sport_menu">
    <label class="left_acc_header asBtn" for="showSportMenu">
      <div>
        <div class="left_menu_btns" style="float: none;">
          <span class="leftBtn btnShowSportMenu">
            <input type="checkbox" class="chkLeftCollapsed" id="showSportMenu" data-collapse-id="left_sport_menu" />  
          </span>
          <span >
            <span class="hideOnCollapsed">&nbsp;<b><?=$lang_member[927];?></b></span>
            <span class="showOnCollapsed dis-inline">&nbsp;<b><?=$lang_member[928];?></b></span>
          </span>
        </div>
      </div>
    </label>
    <div class="left_acc_body left_cell_border1 left_cell_bg1 hideOnCollapsed" style="border-top: 0;">
        <div class="sport_menu_tab">
          <table cellpadding="0" cellspacing="0" width="100%" style="border-collapse: collapse;">
            <tr>
              <td align="center" width="50%">
                <label class="sport_selector">
                  <input type="radio" name="sp_mn_rdo" id="chkMarket_t" value="t" />  
                  <span><?=$lang_member[887]?></span>
                  <span class="sport_indicator"></span>
                </label>
              </td>
              <td align="center">
                <label class="sport_selector">
                  <input type="radio" name="sp_mn_rdo" id="chkMarket_l" value="l" />  
                  <span><?=$lang_member[772]?></span>
                  <span class="sport_indicator"></span>
                </label>
              </td>
            </tr>
          </table>
        </div>
        
        <div>
        	<div>
        		<div>
        			<ul class="sport_menu_list sport_t">


                <? foreach ($arr_sp_zone as $key => $value) { ?>

                <li id="box_menu_<?=$arr_key_zone[$key]?>" class="<?=$key;?>">
                  <input type="radio" name="sport_collapse" id="sport_t_<?=$arr_key_zone[$key]?>" class="checkboxSportItem" value="<?=$key?>" /> 
                  <label for="sport_t_<?=$arr_key_zone[$key]?>" class="sport_menu_item_header">
                    <span class="sport_icon">
                      <img src="template/sportsicon/<?=$arr_key_zone[$key]?>.png" alt="">
                    </span>
                    <span class="sport_name"><?=$sport_type[$key]?></span>
                    <span class="total"><span class="live_badge" id="<?=$arr_key_zone[$key]?>_t_l" style="display: none;"></span><span id="<?=$arr_key_zone[$key]?>_t_n"><span class="n_loader"></span></span></span>
                  </label>
                  <ul class="sport_menu_item">
                    <li id="menu_<?=$arr_key_zone[$key]?>_hdc_ou_t">
                      <label class="sport_menu_item_selector">
                        <input type="radio" name="sport_rdo" value="main_sport_new.php?vvw=&zone=<?=$key?>&page_show=1&token=<?=$_SESSION['m_token'];?>" />
                        <span><?=$lang_member[1020]?></span>
                        <span class="total"><span class="live_badge" id="<?=$arr_key_zone[$key]?>_hdc_ou_t_l" style="display: none;"></span><span id="<?=$arr_key_zone[$key]?>_hdc_ou_t_n"><span class="n_loader"></span></span></span>
                      </label>
                    </li>
                    <li id="menu_<?=$arr_key_zone[$key]?>_1x2_t">
                      <label class="sport_menu_item_selector">
                        <input type="radio" name="sport_rdo" value="main_sport_new.php?vvw=&zone=<?=$key?>&page_show=2&token=<?=$_SESSION['m_token'];?>" />
                        <span><?=$lang_member[1023]?></span>
                        <span class="total"><span class="live_badge" id="<?=$arr_key_zone[$key]?>_1x2_t_l" style="display: none;"></span><span id="<?=$arr_key_zone[$key]?>_1x2_t_n"><span class="n_loader"></span></span></span>
                      </label>
                    </li>
                    <li id="menu_<?=$arr_key_zone[$key]?>_oe_t">
                      <label class="sport_menu_item_selector">
                        <input type="radio" name="sport_rdo" value="main_sport_new.php?vvw=&zone=<?=$key?>&page_show=3&token=<?=$_SESSION['m_token'];?>" />
                        <span><?=$lang_member[1022]?></span>
                        <span class="total"><span class="live_badge" id="<?=$arr_key_zone[$key]?>_oe_t_l" style="display: none;"></span><span id="<?=$arr_key_zone[$key]?>_oe_t_n"><span class="n_loader"></span></span></span>
                      </label>
                    </li>
                    <li id="menu_<?=$arr_key_zone[$key]?>_step_t">
                      <label class="sport_menu_item_selector">
                        <input type="radio" name="sport_rdo" value="main_sport_step.php?vvw=&page_show=1&sp=<?=$key?>&live=&token=<?=$_SESSION['m_token'];?>" />
                        <span><?=$lang_member[767]?></span>
                        <span class="total"><span class="live_badge" id="<?=$arr_key_zone[$key]?>_step_t_l" style="display: none;"></span><span id="<?=$arr_key_zone[$key]?>_step_t_n"><span class="n_loader"></span></span></span>
                      </label>
                    </li>
                  </ul>
                </li>

              <? } ?>

                <li id="box_menu_step">
                  <input type="radio" name="sport_collapse" id="sport_t_mix_parley" class="checkboxSportItem" value="mix_parley" />  
                  <label for="sport_t_mix_parley" class="sport_menu_item_header">
                    <span class="sport_icon">
                          <img src="template/sportsicon/mix_parley.png" alt="">
                        </span>
                    <span class="sport_name"><?=$lang_member[767]?></span>
                    <span class="total"><span class="live_badge" id="step_t_l" style="display: none;"></span><span id="step_t_n"><span class="n_loader"></span></span></span>
                  </label>
                  <div class="sport_menu_item">
                        <input type="radio" name="sport_rdo" value="main_sport_step.php?vvw=&page_show=1&sp=&token=<?=$_SESSION['m_token'];?>" style="display: none;" />
                  </div>
                </li>
        			</ul>

              <ul class="sport_menu_list sport_l">
                 <? foreach ($arr_sp_zone as $key => $value) { ?>

                  <li id="box_menu_<?=$arr_key_zone[$key]?>_l">
                  <input type="radio" name="sport_collapse" id="sport_l_<?=$arr_key_zone[$key]?>" class="checkboxSportItem" value="<?=$key?>" />  
                  <label for="sport_l_<?=$arr_key_zone[$key]?>" class="sport_menu_item_header">
                    <span class="sport_icon">
                      <img src="template/sportsicon/<?=$arr_key_zone[$key]?>.png" alt="">
                    </span>
                    <span class="sport_name"><?=$sport_type[$key]?></span>
                    <span class="total"><span class="live_badge" id="<?=$arr_key_zone[$key]?>_l_l" style="display: none;"></span><span id="<?=$arr_key_zone[$key]?>_l_n"><span class="n_loader"></span></span></span>
                  </label>
                  <ul class="sport_menu_item">
                    <li>
                      <label class="sport_menu_item_selector">
                        <input type="radio" name="sport_rdo" value="main_sport_new.php?vvw=&zone=<?=$key?>&page_show=1&live=1&token=<?=$_SESSION['m_token'];?>" />
                        <span><?=$lang_member[1020]?></span>
                        <span class="total"><span class="live_badge" id="<?=$arr_key_zone[$key]?>_hdc_ou_l_l" style="display: none;"></span><span id="<?=$arr_key_zone[$key]?>_hdc_ou_l_n"><span class="n_loader"></span></span></span>
                      </label>
                    </li>
                    <li>
                      <label class="sport_menu_item_selector">
                        <input type="radio" name="sport_rdo" value="main_sport_new.php?vvw=&zone=<?=$key?>&page_show=2&live=1&token=<?=$_SESSION['m_token'];?>" />
                        <span><?=$lang_member[1023]?></span>
                        <span class="total"><span class="live_badge" id="<?=$arr_key_zone[$key]?>_1x2_l_l" style="display: none;"></span><span id="<?=$arr_key_zone[$key]?>_1x2_l_n"><span class="n_loader"></span></span></span>
                      </label>
                    </li>
                    <li>
                      <label class="sport_menu_item_selector">
                        <input type="radio" name="sport_rdo" value="main_sport_new.php?vvw=&zone=<?=$key?>&page_show=3&live=1&token=<?=$_SESSION['m_token'];?>" />
                        <span><?=$lang_member[1022]?></span>
                        <span class="total"><span class="live_badge" id="<?=$arr_key_zone[$key]?>_oe_l_l" style="display: none;"></span><span id="<?=$arr_key_zone[$key]?>_oe_l_n"><span class="n_loader"></span></span></span>
                      </label>
                    </li>
                    <li>
                      <label class="sport_menu_item_selector">
                        <input type="radio" name="sport_rdo" value="main_sport_step.php?vvw=&page_show=1&sp=<?=$key?>&live=1&token=<?=$_SESSION['m_token'];?>" />
                        <span><?=$lang_member[767]?></span>
                        <span class="total"><span class="live_badge" id="<?=$arr_key_zone[$key]?>_step_l_l" style="display: none;"></span><span id="<?=$arr_key_zone[$key]?>_step_l_n"><span class="n_loader"></span></span></span>
                      </label>
                    </li>
                  </ul>
                </li>

                 <? } ?>
                <li id="box_menu_step_l">
                  <input type="radio" name="sport_collapse" id="sport_l_mix_parley" class="checkboxSportItem" value="mix_parley" />  
                  <label for="sport_l_mix_parley" class="sport_menu_item_header">
                    <span class="sport_icon">
                          <img src="template/sportsicon/mix_parley.png" alt="">
                        </span>
                    <span class="sport_name"><?=$lang_member[767]?></span>
                    <span class="total"><span class="live_badge" id="step_l_l" style="display: none;"></span><span id="step_l_n"><span class="n_loader"></span></span></span>
                  </label>
                  <div class="sport_menu_item">
                    <input type="radio" name="sport_rdo" value="main_sport_step.php?vvw=&page_show=1&sp=&live=1&token=<?=$_SESSION['m_token'];?>" style="display: none;" />
                  </div>
                </li>
              </ul>

        		</div>
        	</div>
        </div>
    </div>
  </div>

  <!-- wait and cancel -->
  <div class="left_acc_container LeftAlt left_conf" id="left_wait_bet_list">
    <div class="left_acc_header">
      <div>
        <div class="left_menu_btns" style="float: none;">
          <label class="leftBtn btnShowSportMenu" for="showWaitBetList">
            <input type="checkbox" class="chkLeftCollapsed" id="showWaitBetList" data-collapse-id="left_wait_bet_list" />  
          </label>
          <label for="showWaitBetList" style="cursor: pointer;">
            <!-- <span>&nbsp;<b><?=$lang_member[951];?></b></span>   -->
            <span>&nbsp;<b id="BetWaitListTitle"><?=$lang_member[951];?></b></span>  
          </label>
        </div>

        <div class="left_menu_btns">
          <button class="leftBtn btnRefresh" id="refreshBetWaitList"></button>
        </div>

      </div>
    </div>
    <div class="left_acc_body left_cell_border1 left_cell_bg1 hideOnCollapsed" style="border-top: 0;">
      <div class="left_cell_border2">
        <table cellpadding="0" cellspacing="4" width="100%" style="table-layout: fixed;">
          <tr>
            <td>
            	<!-- <button class="leftControlBtn" style="width: 100%;"><?=$lang_left[18]?> (<?=$lang_left[19]?>)</button> -->
            	<label class="leftControlBtn chkboxButton" style="width: 65%;">
            		<input type="checkbox" id="chkDisplayWaitBetList" />
            		<span class="markInactive"><?=$lang_member[708]?> (<?=$lang_member[940]?>)</span>
            		<span class="markActive"><?=$lang_member[352]?></span>
            	</label>
              <span style="float: right;padding: 0px;font-weight: bold;color: rgb(255, 106, 0);display: block;font-size: 12px;margin-top: 3px;" id="wb_count">Time:5</span>
            </td>
          </tr>
        </table>
        <div id="BetWaitList" style="display: block;">
        </div>
      </div>
    </div>
  </div>
  <div id="BettingModeContainer" class="TabBox" style="display: none;">
    <table width="100%" border="0" cellpadding="0" cellspacing="0">
      <tbody>
        <tr>
          <td id="div_menu_single" class="R_menu_R current" title="<?=$lang_member[537]?>"><span class="icon-arrow"></span><a><span class="subTitle_tang"><?=$lang_member[537]?></span></a></td>
        </tr>
      </tbody>
    </table>
  </div>

  <div id="BetProcessContainer" style="display: none;"></div>

  <div id="MessageAlertContainer" style="display:none;">
    <div class="leftBoxbody">
      <div class="boxbg">
      <div class="tips box">
        <div class="content info"></div>
      </div>
      </div>
    </div>
    <div class="leftBoxFoot"></div>
    <div class="Backmenu"><span class="icon-arrow"></span><a href="javascript:ReloadWaitingBetListx('yes','no','1');"><?=$lang_member[923];?></a></div>
  </div>
  
  <!--BEGIN MessageDisplay-->  
  <div id="MessageDisplayContainer" style="display:none">
    <div class="leftBoxTitle"><span class="icon-arrow"></span><span id="spSubTitle" class="titleTxt"></span></div>
    <div class="leftBoxbody">
      <div class="boxbg reSet errorlogon" style="width:auto"> <span id="spTitle"></span> <em id="spContent"></em> </div>
    </div>
    <div class="leftBoxFoot"></div>
    <div class="Backmenu"><span class="icon-arrow"></span><a href="javascript:ReloadWaitingBetListx('yes','no','1');"><?=$lang_member[923];?></a></div>
    <iframe name="ifmMessageDisplay" id="ifmMessageDisplay" src="" style="display:none"></iframe>
    <form name="fomMessageDisplay" action ="MessageDisplay_Data.php"  method="post"  target="ifmMessageDisplay" style="display:none">
      <input type="hidden" id="msg_type" name="msg_type" value="" />
      <input type="hidden" id="msg_u_title" name="msg_u_title" value="" />
      <input type="hidden" id="msg_u_msg" name="msg_u_msg" value="" />
    </form>
  </div>
  <!--END Message Display-->
  <div id="PageLoadCompleted"></div>

  <div id="sp2">
  <?php  include "left_agent_contact.php"; ?>
  </div>


  <script>
    var old_arr_data = [];
    var arr_blink = [];

    var fload = 1;

<? foreach ($arr_sp_zone as $key => $value) { ?>
    var arr_<?=$arr_key_zone[$key]?>_hdc_ou = [];
    var arr_<?=$arr_key_zone[$key]?>_hdc_ou_live = [];
    var arr_<?=$arr_key_zone[$key]?>_1x2 = [];
    var arr_<?=$arr_key_zone[$key]?>_1x2_live = [];
    var arr_<?=$arr_key_zone[$key]?>_oe = [];
    var arr_<?=$arr_key_zone[$key]?>_oe_live = [];
    var arr_<?=$arr_key_zone[$key]?>_step = [];
    var arr_<?=$arr_key_zone[$key]?>_step_live = [];
<? } ?>

    var arr_send_n_step = {};

    setInterval(function () {
      try{
        parent.rightx.set_n_step(arr_send_n_step);
      }catch(err){
        // console.log(err)
      }
    }, 1000);

    setInterval(function () {
      //console.log(arr_blink);
        show_blink();
    }, 1000);


  function data_menu(mdata){

    var time_stam = parseInt(Date.now() / 1000);
    if (JSON.stringify(mdata) != JSON.stringify(old_arr_data)){
      old_arr_data = mdata;
      var data_ball = [];

      <? foreach ($arr_sp_zone as $key => $value) { ?>
      arr_<?=$arr_key_zone[$key]?>_hdc_ou = [];
      arr_<?=$arr_key_zone[$key]?>_hdc_ou_live = [];
      arr_<?=$arr_key_zone[$key]?>_1x2 = [];
      arr_<?=$arr_key_zone[$key]?>_1x2_live = [];
      arr_<?=$arr_key_zone[$key]?>_oe = [];
      arr_<?=$arr_key_zone[$key]?>_oe_live = [];
      arr_<?=$arr_key_zone[$key]?>_step = [];
      arr_<?=$arr_key_zone[$key]?>_step_live = [];
      <? } ?>


      var db = 0;
      for(var k in mdata){
        var db_in = {};
        for(var kk in mdata[k]){
          db_in[kk] = mdata[k][kk];
        }
        data_ball[db] = db_in;
        db++;
      }

      for (var k in data_ball) {
        <? foreach ($arr_sp_zone as $key => $value) { ?>
      //ราคาต่อรองสูงต่ำก่อนเวลา
      if(data_ball[k]["b_live"]==0 && data_ball[k]["b_date_play"] >= time_stam && data_ball[k]["b_zone_id"]!=null && data_ball[k]["b_active"]==1 && data_ball[k]["b_zone"]==<?=$key?>){
        if((data_ball[k]["b_hdc"]!="" && data_ball[k]["b_hdc_1"]!="" && data_ball[k]["b_hdc_2"]!="") || (data_ball[k]["b_goal"]!="" && data_ball[k]["b_goal_1"]!="" && data_ball[k]["b_goal_2"]!="") || (data_ball[k]["b_1x2_1"]>0 && data_ball[k]["b_1x2_2"]>0) || (data_ball[k]["b_1h_hdc"]!="" && data_ball[k]["b_1h_hdc_1"]!="" && data_ball[k]["b_1h_hdc_2"]!="") || (data_ball[k]["b_1h_goal"]!="" && data_ball[k]["b_1h_goal_1"]!="" && data_ball[k]["b_1h_goal_2"]!="") || (data_ball[k]["b_1h_1x2_1"]>0 && data_ball[k]["b_1h_1x2_2"]>0)){
          var a = arr_<?=$arr_key_zone[$key]?>_hdc_ou.indexOf(data_ball[k]["b_id"]);
          if(a<0){
            arr_<?=$arr_key_zone[$key]?>_hdc_ou.push(data_ball[k]["b_id"]);
          }
        }
      }
      //ราคาต่อรองสูงต่ำสด
      if((data_ball[k]["b_live"]==1 || data_ball[k]["b_live"]==2 || data_ball[k]["b_live"]==3) && data_ball[k]["b_zone"]==<?=$key?> && data_ball[k]["b_zone_id"]!=null){
        /*if((data_ball[k]["b_hdc"]!="" && data_ball[k]["b_hdc_1"]!="" && data_ball[k]["b_hdc_2"]!="") || (data_ball[k]["b_goal"]!="" && data_ball[k]["b_goal_1"]!="" && data_ball[k]["b_goal_2"]!="") || (data_ball[k]["b_1x2_1"]>0 && data_ball[k]["b_1x2_2"]>0) || (data_ball[k]["b_1h_hdc"]!="" && data_ball[k]["b_1h_hdc_1"]!="" && data_ball[k]["b_1h_hdc_2"]!="") || (data_ball[k]["b_1h_goal"]!="" && data_ball[k]["b_1h_goal_1"]!="" && data_ball[k]["b_1h_goal_2"]!="") || (data_ball[k]["b_1h_1x2_1"]>0 && data_ball[k]["b_1h_1x2_2"]>0)){*/
          var a = arr_<?=$arr_key_zone[$key]?>_hdc_ou_live.indexOf(data_ball[k]["b_id"]);
          if(a<0){
            arr_<?=$arr_key_zone[$key]?>_hdc_ou_live.push(data_ball[k]["b_id"]);
          }
        //}
      }

      //ราคาพูล 1x2 ก่อนเวลา
      if(data_ball[k]["b_live"]==0 && data_ball[k]["b_date_play"] >= time_stam && data_ball[k]["b_zone_id"]!=null && data_ball[k]["b_active"]==1 && data_ball[k]["b_zone"]==<?=$key?>){
        if((data_ball[k]["b_1x2_1"]>0 && data_ball[k]["b_1x2_2"]>0) || (data_ball[k]["b_1h_1x2_1"]>0 && data_ball[k]["b_1h_1x2_2"]>0)){
          var a = arr_<?=$arr_key_zone[$key]?>_1x2.indexOf(data_ball[k]["b_id"]);
          if(a<0){
            arr_<?=$arr_key_zone[$key]?>_1x2.push(data_ball[k]["b_id"]);
          }
        }
      }
      //ราคาพูล 1x2 สด
      if((data_ball[k]["b_live"]==1 || data_ball[k]["b_live"]==2 || data_ball[k]["b_live"]==3) && data_ball[k]["b_zone"]==<?=$key?> && data_ball[k]["b_zone_id"]!=null){
        /*if((data_ball[k]["b_1x2_1"]>0 && data_ball[k]["b_1x2_x"]>0 && data_ball[k]["b_1x2_2"]>0) || (data_ball[k]["b_1h_1x2_1"]>0 && data_ball[k]["b_1h_1x2_x"]>0 && data_ball[k]["b_1h_1x2_2"]>0)){*/
          var a = arr_<?=$arr_key_zone[$key]?>_1x2_live.indexOf(data_ball[k]["b_id"]);
          if(a<0){
            arr_<?=$arr_key_zone[$key]?>_1x2_live.push(data_ball[k]["b_id"]);
          }
        //}
      }

      //คี่/คู่ก่อนเวลา
      if(data_ball[k]["b_live"]==0 && data_ball[k]["b_date_play"] >= time_stam && data_ball[k]["b_zone_id"]!=null && data_ball[k]["b_active"]==1 && data_ball[k]["b_zone"]==<?=$key?>){
        if((data_ball[k]["b_odd"]>0 && data_ball[k]["b_even"]>0) || (data_ball[k]["b_1h_odd"]>0 && data_ball[k]["b_1h_even"]>0)){
          var a = arr_<?=$arr_key_zone[$key]?>_oe.indexOf(data_ball[k]["b_id"]);
          if(a<0){
            arr_<?=$arr_key_zone[$key]?>_oe.push(data_ball[k]["b_id"]);
          } 
        }
      }
      //คี่/คู่สด
      if((data_ball[k]["b_live"]==1 || data_ball[k]["b_live"]==2 || data_ball[k]["b_live"]==3) && data_ball[k]["b_zone"]==<?=$key?> && data_ball[k]["b_zone_id"]!=null){
        //if((data_ball[k]["b_odd"]>0 && data_ball[k]["b_even"]>0) || (data_ball[k]["b_1h_odd"]>0 && data_ball[k]["b_1h_even"]>0)){
          var a = arr_<?=$arr_key_zone[$key]?>_oe_live.indexOf(data_ball[k]["b_id"]);
          if(a<0){
            arr_<?=$arr_key_zone[$key]?>_oe_live.push(data_ball[k]["b_id"]);
          }
        //}
      }

      //บอลชุดก่อนเวลา
      if(data_ball[k]["b_live"]==0 && data_ball[k]["b_date_play"] >= time_stam && data_ball[k]["b_zone_id"]!=null && data_ball[k]["b_active"]==1 && data_ball[k]["b_zone"]==<?=$key?> && data_ball[k]["b_step"]==2){
        if((data_ball[k]["b_hdc"]!="" && data_ball[k]["b_hdc_step1"]!="" && data_ball[k]["b_hdc_step2"]!="") || (data_ball[k]["b_goal"]!="" && data_ball[k]["b_goal_step1"]!="" && data_ball[k]["b_goal_step2"]!="") || (data_ball[k]["b_1x2_step1"]>0 && data_ball[k]["b_1x2_step2"]>0) || (data_ball[k]["b_1h_hdc"]!="" && data_ball[k]["b_1h_hdc_step1"]!="" && data_ball[k]["b_1h_hdc_step2"]!="") || (data_ball[k]["b_1h_goal"]!="" && data_ball[k]["b_1h_goal_step1"]!="" && data_ball[k]["b_1h_goal_step2"]!="") || (data_ball[k]["b_1h_1x2_step1"]>0 && data_ball[k]["b_1h_1x2_step2"]>0)){
          var a = arr_<?=$arr_key_zone[$key]?>_step.indexOf(data_ball[k]["b_id"]);
          if(a<0){
            arr_<?=$arr_key_zone[$key]?>_step.push(data_ball[k]["b_id"]);
          }
        }
      }
      //บอลชุดสด
      if((data_ball[k]["b_live"]==1 || data_ball[k]["b_live"]==2 || data_ball[k]["b_live"]==3) && data_ball[k]["b_zone"]==<?=$key?> && data_ball[k]["b_step"]==2 && data_ball[k]["b_zone_id"]!=null){
        //if((data_ball[k]["b_hdc"]!="" && data_ball[k]["b_hdc_1"]!="" && data_ball[k]["b_hdc_2"]!="") || (data_ball[k]["b_goal"]!="" && data_ball[k]["b_goal_1"]!="" && data_ball[k]["b_goal_2"]!="") || (data_ball[k]["b_1x2_1"]>0 && data_ball[k]["b_1x2_2"]>0) || (data_ball[k]["b_1h_hdc"]!="" && data_ball[k]["b_1h_hdc_1"]!="" && data_ball[k]["b_1h_hdc_2"]!="") || (data_ball[k]["b_1h_goal"]!="" && data_ball[k]["b_1h_goal_1"]!="" && data_ball[k]["b_1h_goal_2"]!="") || (data_ball[k]["b_1h_1x2_1"]>0 && data_ball[k]["b_1h_1x2_2"]>0)){
          var a = arr_<?=$arr_key_zone[$key]?>_step_live.indexOf(data_ball[k]["b_id"]);
          if(a<0){
            arr_<?=$arr_key_zone[$key]?>_step_live.push(data_ball[k]["b_id"]);
          }
        //}
      }
      <? } ?> 
    } 


    <? foreach ($arr_sp_zone as $key => $value) { ?>

    var n_all_<?=$arr_key_zone[$key]?> = arr_<?=$arr_key_zone[$key]?>_hdc_ou.length+arr_<?=$arr_key_zone[$key]?>_hdc_ou_live.length+arr_<?=$arr_key_zone[$key]?>_1x2.length+arr_<?=$arr_key_zone[$key]?>_1x2_live.length+arr_<?=$arr_key_zone[$key]?>_oe.length+arr_<?=$arr_key_zone[$key]?>_oe_live.length+arr_<?=$arr_key_zone[$key]?>_step.length+arr_<?=$arr_key_zone[$key]?>_step_live.length;
    if(n_all_<?=$arr_key_zone[$key]?>>0){
      $("#box_menu_<?=$arr_key_zone[$key]?>").show();
      $("#<?=$arr_key_zone[$key]?>_t_n").html(addCommas(n_all_<?=$arr_key_zone[$key]?>));
    }else{
      $("#box_menu_<?=$arr_key_zone[$key]?>").hide();
      $("#<?=$arr_key_zone[$key]?>_t_n").html("");
    }

    if(arr_<?=$arr_key_zone[$key]?>_hdc_ou_live.length>0 || arr_<?=$arr_key_zone[$key]?>_1x2_live.length>0 || arr_<?=$arr_key_zone[$key]?>_oe_live.length>0 || arr_<?=$arr_key_zone[$key]?>_step_live.length>0){
      $("#<?=$arr_key_zone[$key]?>_t_l").show();
    }else{
      $("#<?=$arr_key_zone[$key]?>_t_l").hide();
    }

    if(arr_<?=$arr_key_zone[$key]?>_hdc_ou.length+arr_<?=$arr_key_zone[$key]?>_hdc_ou_live.length>0){
      $("#menu_<?=$arr_key_zone[$key]?>_hdc_ou_t").show();
      $("#<?=$arr_key_zone[$key]?>_hdc_ou_t_n").html(addCommas(arr_<?=$arr_key_zone[$key]?>_hdc_ou.length+arr_<?=$arr_key_zone[$key]?>_hdc_ou_live.length));
    }else{
      $("#menu_<?=$arr_key_zone[$key]?>_hdc_ou_t").hide();
      $("#<?=$arr_key_zone[$key]?>_hdc_ou_t_n").html("");
    }
    if(arr_<?=$arr_key_zone[$key]?>_hdc_ou_live.length>0){
      $("#<?=$arr_key_zone[$key]?>_hdc_ou_t_l").show();
    }else{
      $("#<?=$arr_key_zone[$key]?>_hdc_ou_t_l").hide();
    }

    if(arr_<?=$arr_key_zone[$key]?>_1x2.length+arr_<?=$arr_key_zone[$key]?>_1x2_live.length>0){
      $("#menu_<?=$arr_key_zone[$key]?>_1x2_t").show();
      $("#<?=$arr_key_zone[$key]?>_1x2_t_n").html(addCommas(arr_<?=$arr_key_zone[$key]?>_1x2.length+arr_<?=$arr_key_zone[$key]?>_1x2_live.length));
    }else{
      $("#menu_<?=$arr_key_zone[$key]?>_1x2_t").hide();
      $("#<?=$arr_key_zone[$key]?>_1x2_t_n").html("");
    }
    if(arr_<?=$arr_key_zone[$key]?>_1x2_live.length>0){
      $("#<?=$arr_key_zone[$key]?>_1x2_t_l").show();
    }else{
      $("#<?=$arr_key_zone[$key]?>_1x2_t_l").hide();
    }

    if(arr_<?=$arr_key_zone[$key]?>_oe.length+arr_<?=$arr_key_zone[$key]?>_oe_live.length>0){
      $("#menu_<?=$arr_key_zone[$key]?>_oe_t").show();
      $("#<?=$arr_key_zone[$key]?>_oe_t_n").html(addCommas(arr_<?=$arr_key_zone[$key]?>_oe.length+arr_<?=$arr_key_zone[$key]?>_oe_live.length));
    }else{
      $("#menu_<?=$arr_key_zone[$key]?>_oe_t").hide();
      $("#<?=$arr_key_zone[$key]?>_oe_t_n").html("");
    }
    if(arr_<?=$arr_key_zone[$key]?>_oe_live.length>0){
      $("#<?=$arr_key_zone[$key]?>_oe_t_l").show();
    }else{
      $("#<?=$arr_key_zone[$key]?>_oe_t_l").hide();
    }

    if(arr_<?=$arr_key_zone[$key]?>_step.length+arr_<?=$arr_key_zone[$key]?>_step_live.length>0){
      $("#menu_<?=$arr_key_zone[$key]?>_step_t").show();
      $("#<?=$arr_key_zone[$key]?>_step_t_n").html(addCommas(arr_<?=$arr_key_zone[$key]?>_step.length+arr_<?=$arr_key_zone[$key]?>_step_live.length));
    }else{
      $("#menu_<?=$arr_key_zone[$key]?>_step_t").hide();
      $("#<?=$arr_key_zone[$key]?>_step_t_n").html("");
    }
    if(arr_<?=$arr_key_zone[$key]?>_step_live.length>0){
      $("#<?=$arr_key_zone[$key]?>_step_t_l").show();
    }else{
      $("#<?=$arr_key_zone[$key]?>_step_t_l").hide();
    }
  <? } ?>
    

    // display step number
    var n_all_step = <? foreach ($arr_sp_zone as $key => $value) { ?>arr_<?=$arr_key_zone[$key]?>_step.length+arr_<?=$arr_key_zone[$key]?>_step_live.length+<? } ?>0;
    if(n_all_step>0){
      $("#box_menu_step").show();
      $("#step_t_n").html(addCommas(n_all_step));
    }else{
      $("#box_menu_step").hide();
      $("#step_t_n").html("");
      //autoSelectSportMenu('t', 'mix_parley');
    }
    var n_all_step_live = <? foreach ($arr_sp_zone as $key => $value) { ?>arr_<?=$arr_key_zone[$key]?>_step_live.length+<? } ?>0;
    if(n_all_step_live>0){
      $("#step_t_l").show();
      $("#step_l_l").show();

      $("#box_menu_step_l").show();
      $("#step_l_n").html(addCommas(n_all_step_live));

    }else{
      $("#step_t_l").hide();
      $("#step_l_l").hide();

      $("#box_menu_step_l").hide();
      $("#step_l_n").html("");
    }

    if(fload==1){
      //autoSelectSportMenu('t');
      fload = 0;
    }
    

    <? foreach ($arr_sp_zone as $key => $value) { ?>

    var n_all_<?=$arr_key_zone[$key]?>_live = arr_<?=$arr_key_zone[$key]?>_hdc_ou_live.length+arr_<?=$arr_key_zone[$key]?>_1x2_live.length+arr_<?=$arr_key_zone[$key]?>_oe_live.length+arr_<?=$arr_key_zone[$key]?>_step_live.length;
    if(n_all_<?=$arr_key_zone[$key]?>_live>0){
      $("#box_menu_<?=$arr_key_zone[$key]?>_l").show();
      $("#<?=$arr_key_zone[$key]?>_l_n").html(addCommas(n_all_<?=$arr_key_zone[$key]?>_live));
    }else{
      $("#box_menu_<?=$arr_key_zone[$key]?>_l").hide();
      $("#<?=$arr_key_zone[$key]?>_l_n").html("");
      //autoSelectSportMenu('t', '<?=$arr_key_zone[$key]?>');
    }

    if(arr_<?=$arr_key_zone[$key]?>_hdc_ou_live.length>0 || arr_<?=$arr_key_zone[$key]?>_1x2_live.length>0 || arr_<?=$arr_key_zone[$key]?>_oe_live.length>0 || arr_<?=$arr_key_zone[$key]?>_step_live.length>0){
      $("#<?=$arr_key_zone[$key]?>_l_l").show();
    }else{
      $("#<?=$arr_key_zone[$key]?>_l_l").hide();
    }

    if(arr_<?=$arr_key_zone[$key]?>_hdc_ou_live.length>0){
      $("#menu_<?=$arr_key_zone[$key]?>_hdc_ou_l").show();
      $("#<?=$arr_key_zone[$key]?>_hdc_ou_l_n").html(addCommas(arr_<?=$arr_key_zone[$key]?>_hdc_ou_live.length));
    }else{
      $("#menu_<?=$arr_key_zone[$key]?>_hdc_ou_l").hide();
      $("#<?=$arr_key_zone[$key]?>_hdc_ou_l_n").html("");
    }
    if(arr_<?=$arr_key_zone[$key]?>_hdc_ou_live.length>0){
      $("#<?=$arr_key_zone[$key]?>_hdc_ou_l_l").show();
    }else{
      $("#<?=$arr_key_zone[$key]?>_hdc_ou_l_l").hide();
    }

    if(arr_<?=$arr_key_zone[$key]?>_1x2_live.length>0){
      $("#menu_<?=$arr_key_zone[$key]?>_1x2_l").show();
      $("#<?=$arr_key_zone[$key]?>_1x2_l_n").html(addCommas(arr_<?=$arr_key_zone[$key]?>_1x2_live.length));
    }else{
      $("#menu_<?=$arr_key_zone[$key]?>_1x2_l").hide();
      $("#<?=$arr_key_zone[$key]?>_1x2_l_n").html("");
    }
    if(arr_<?=$arr_key_zone[$key]?>_1x2_live.length>0){
      $("#<?=$arr_key_zone[$key]?>_1x2_l_l").show();
    }else{
      $("#<?=$arr_key_zone[$key]?>_1x2_l_l").hide();
    }

    if(arr_<?=$arr_key_zone[$key]?>_oe_live.length>0){
      $("#menu_<?=$arr_key_zone[$key]?>_oe_l").show();
      $("#<?=$arr_key_zone[$key]?>_oe_l_n").html(addCommas(arr_<?=$arr_key_zone[$key]?>_oe_live.length));
    }else{
      $("#menu_<?=$arr_key_zone[$key]?>_oe_l").hide();
      $("#<?=$arr_key_zone[$key]?>_oe_l_n").html("");
    }
    if(arr_<?=$arr_key_zone[$key]?>_oe_live.length>0){
      $("#<?=$arr_key_zone[$key]?>_oe_l_l").show();
    }else{
      $("#<?=$arr_key_zone[$key]?>_oe_l_l").hide();
    }

    if(arr_<?=$arr_key_zone[$key]?>_step_live.length>0){
      $("#menu_<?=$arr_key_zone[$key]?>_step_l").show();
      $("#<?=$arr_key_zone[$key]?>_step_l_n").html(addCommas(arr_<?=$arr_key_zone[$key]?>_step_live.length));
    }else{
      $("#menu_<?=$arr_key_zone[$key]?>_step_l").hide();
      $("#<?=$arr_key_zone[$key]?>_step_l_n").html("");
    }
    if(arr_<?=$arr_key_zone[$key]?>_step_live.length>0){
      $("#<?=$arr_key_zone[$key]?>_step_l_l").show();
    }else{
      $("#<?=$arr_key_zone[$key]?>_step_l_l").hide();
    }
  <? } ?>


    try{
      arr_send_n_step = {};
      
      if(sportMarket == 't'){

        <? foreach ($arr_sp_zone as $key => $value) { ?>
        arr_send_n_step["<?=$key?>"] = arr_<?=$arr_key_zone[$key]?>_step.length+arr_<?=$arr_key_zone[$key]?>_step_live.length;
        <? } ?>
      }else if(sportMarket == 'l'){
        <? foreach ($arr_sp_zone as $key => $value) { ?>
        arr_send_n_step[<?=$key?>] = arr_<?=$arr_key_zone[$key]?>_step_live.length;
        <? } ?>
      }
    }catch(err){
    // console.log(err)
    }
   } 
}

    function addCommas(nStr){
      nStr += '';
      x = nStr.split('.');
      x1 = x[0];
      x2 = x.length > 1 ? '.' + x[1] : '';
      var rgx = /(\d+)(\d{3})/;
      while (rgx.test(x1)) {
        x1 = x1.replace(rgx, '$1' + ',' + '$2');
      }
      return x1 + x2;
    }

    // function loadLeftAccountDataCallback(_button){
    //   $('#left_account').addClass('onRefresh');
    //   if(_button !== void 0)
    //     $(_button).attr('disabled', 'disabled');
      
    //   loadLeftAccountData().then(function(res){
    //     $('#left_account').removeClass('onRefresh');
    //     if(_button !== void 0)          
    //       $(_button).removeAttr('disabled');

    //     $('.in_credit_text').html(res.incre);
    //     $('.win_credit_text').html(res.wincre);
    //     $('.betdate_text').html(res.betdate);
    //     $('.lastlogin_text').html(res.lastlogindate);
    //     $('.betcre_text').html(res.betcre);
    //     $('.cre_text').html(res.cre);
    //     $('.currency_text').html(res.currency);
    //   }, function(error){
    //     $('#left_account').removeClass('onRefresh');
    //     if(_button !== void 0)          
    //       $(_button).removeAttr('disabled');
    //   });
    // }
      
    // function loadLeftAccountData(){
    //   var $def = $.Deferred();
    //   $.ajax({
    //     url: 'inc/get_credit.php',
    //     type: 'GET',
    //     dataType: 'json',
    //     cache: false,
    //     data: {accountUpdate: 'left_account'}
    //   })
    //   .done(function(response){
    //     $def.resolve(response);
    //   })
    //   .fail(function(xhr, status, error) {
    //     $def.reject(error);
    //   })
    //   return $def.promise();
    // }
    
    var sportMarket = "t";
    $(document).ready(function($){



      wbl('waitlist', {IsFromWaitingBtn: "yes"}).then(function(res){ 
            $('#BetWaitList').html(res); 
            $("#chkDisplayWaitBetList").parents('.left_acc_container').removeClass('onRefresh');
          }, );
          $('#BetWaitListTitle').text('<?=$lang_member[951]?>');     

      // loadLeftAccountDataCallback();
      $(document).on('change', '.chkLeftCollapsed', function(event){
        event.preventDefault();
        var cid = '#' + $(this).data('collapse-id');
        //console.log(cid);
        if($(this).is(':checked')){
          $(cid).addClass('collapsed');
        }else{
          $(cid).removeClass('collapsed');
        }
      });

      // var onRefresh = null;
      // $(document).on('click', '#refreshLeftAcc', function(event){
      //   event.preventDefault();
      //   loadLeftAccountDataCallback(this);
      // });

      $(document).on('change', 'input[name="sport_collapse"]', function(event){
        event.preventDefault();
        var $self = this;
        var $itemsParent = $($self).siblings('.sport_menu_item').get(0);
        var $sportItems = $($itemsParent).find('input[name="sport_rdo"]');
        $($sportItems[0]).prop('checked', true);
        $($sportItems[0]).trigger('change');
      });

      $(document).on('change', 'input[name="sport_rdo"]', function(event){
        event.preventDefault();
        var $self = this;
        var $sport = $($self).val();
        //console.log($sport);
        parent.rightx.location.href=$sport;
      });

      // change market
      $(document).on('change', 'input[name="sp_mn_rdo"]', function(event){
        event.preventDefault();
        var $self = this;
        var $spType = $('input[name="sp_mn_rdo"]:checked').val();
        // hide the others market
        $('.sport_menu_list').not('.sport_' + $spType).hide();
        $('.sport_menu_list.sport_' + $spType).show();
        // auto select 1st sport
        //console.log($spType);
        autoSelectSportMenu($spType);
        // set market
        sportMarket = $spType;
      });

      $('input[name="sp_mn_rdo"][value="'+sportMarket+'"]').prop('checked', true);
      $('input[name="sp_mn_rdo"][value="'+sportMarket+'"]').trigger('change');

      $(document).on('change', '#chkDisplayWaitBetList', function(event){
      	event.preventDefault();
      	var $self = this;

      	if($($self).is(':checked')){
          wbl('betlist').then(function(res){ 
            $('#BetWaitList').html(res); 
            $($self).parents('.left_acc_container').removeClass('onRefresh');
          }, );
          $('#BetWaitListTitle').text('<?=$lang_member[708]?><?=$lang_member[940]?>');
      	}else{
          wbl('waitlist', {IsFromWaitingBtn: "yes"}).then(function(res){ 
            $('#BetWaitList').html(res); 
            $($self).parents('.left_acc_container').removeClass('onRefresh');
          }, );
          $('#BetWaitListTitle').text('<?=$lang_member[951]?>');
      	}
      });

      $(document).on('click', '#refreshBetWaitList', function(event){
        event.preventDefault();

        clearInterval(ttt_wb);
        $("#wb_count").html("<img src=\"template/maxbet/public/images/layout/icon_RefreshWait.gif\" alt=\"\">");

        $(this).parents('.left_acc_container').addClass('onRefresh');
        $('#chkDisplayWaitBetList').trigger('change');
      });
    });
    var first_page = 5;
    function autoSelectSportMenu($market, $sport){

      if(typeof $sport == 'undefined'){
        var $sportLi = $('.sport_menu_list.sport_' + $market).children('li:visible').children('input[name="sport_collapse"]').get(first_page);
        //console.log($('.sport_menu_list.sport_' + $market).children('li:visible').children('input[name="sport_collapse"]'));
        if(!$($sportLi).is(':checked')){
          $($sportLi).prop('checked', 'checked');
          $($sportLi).trigger('change');
        }
      }else{
        if($('#sport_'+$market+'_'+$sport).is(':checked') && $market == sportMarket){
          var $sportLi = $('.sport_menu_list.sport_' + $market).children('li:visible').children('input[name="sport_collapse"]').get(0);
          if(!$($sportLi).is(':checked')){
            $($sportLi).prop('checked', 'checked');
            $($sportLi).trigger('change');
          }
        }
      } 
      first_page = 0; 
    }

    // load bet list or wait bet list

    var ttt_wb;

    function cccwb(){
      $(".chkboxButton").css('width' , '100%');
      $("#wb_count").hide();
    }

    function wbl(t, d){
      d = d == void 0 ? {} : d; 
      var $def = $.Deferred();
      if(t == 'betlist'){
        $.ajax({
          url: 'BetListMini_data.php',
          type: 'get',
          dataType: 'html',
          data: d,
        })
        .done(function(res){
          $def.resolve('<div class="BetWaitListContainer">' + res + '</div>');
          $(".chkboxButton").css('width' , '100%');
          $("#wb_count").hide();
          clearInterval(ttt_wb);
          $("#wb_count").html("<img src=\"template/maxbet/public/images/layout/icon_RefreshWait.gif\" alt=\"\">");
        })
        .fail(function(){});
      }else if(t == 'waitlist'){
        $.ajax({
          url: 'WaitingBets_Data2.php',
          type: 'get',
          dataType: 'html', 
          data: d,
        })
        .done(function(res){
          $def.resolve('<div class="BetWaitListContainer">' + res + '</div>');
        })
        .fail(function(){});
      }
      return $def.promise();
    }

    function DoBetProcessX(e, t, a, r, d , Odds_type , b , i){
      $.ajax({
        type: "POST",
        url: "SportBusket.php",
        data: { "e": e , "t": t , "a": a , "r": r , "d": d , "Odds_type":Odds_type , "b":b, "i":i  },
        cache: false,   // Clear cache IE
        beforeSend: function(){
          $(".subTitle_tang").html("<?=$lang_member[537]?>");
          odd_old = r;
          clearInterval(ttt_wb);
        },
         success: function(data){
          $("#left_sport_menu").hide();
          $("#left_wait_bet_list").hide();
          $("#BettingModeContainer").show();
          $("#BetProcessContainer").html(data);
          $("#BetProcessContainer").show();
          $("#BPstake").focus();
        }
      });
    }

    function DoBetProcessX_step(a, Odds_type){
      $.ajax({
        type: "POST",
        url: "SportBusket_step.php",
        data: { "a": a , "Odds_type":Odds_type },
        cache: false,   // Clear cache IE
        beforeSend: function(){
          $(".subTitle_tang").html("<?=$lang_member[767]?>");
          clearInterval(ttt_wb);
        },
         success: function(data){
          $("#left_sport_menu").hide();
          $("#left_wait_bet_list").hide();
          $("#BettingModeContainer").show();
          $("#BetProcessContainer").html(data);
          $("#BetProcessContainer").show();
          $("#BPstake").focus();
        }
      });
    }

    var odd_old = 0;

    function change_odd(o , i , blink_data , newD , t , bt){

      if(bt==2){
        $("."+blink_data.id).addClass("show_blink");
        $("."+i).html(o);
        if(o<0){
          $("."+i).removeClass("UdrDogOddsClassBetProcess");
          $("."+i).addClass("FavOddsClassBetProcess");
        }else{
          $("."+i).removeClass("FavOddsClassBetProcess");
          $("."+i).addClass("UdrDogOddsClassBetProcess");
        }

        if(t==1){
          $("#sbBetKindValue_"+newD["b_id"]).html(newD["b_hdc"]);
        }else if(t==2){
          $("#sbBetKindValue_"+newD["b_id"]).html(newD["b_goal"]);
        }else if(t==5){
          $("#sbBetKindValue_"+newD["b_id"]).html(newD["b_1h_hdc"]);
        }else if(t==6){
          $("#sbBetKindValue_"+newD["b_id"]).html(newD["b_1h_goal"]);
        }

        if(newD["b_live"]!=0){
          $("#spScoreValue_"+newD["b_id"]).html("["+newD["b_run_score_full"].replace(/\s/g, '')+"]");        
        }

        var oddx = document.getElementsByClassName("oddxx");
        var ix;
        var new_odd = 1;
        for (ix = 0; ix < oddx.length; ix++) {
          new_odd = new_odd*parseFloat($(oddx[ix]).html());
        }

        $("#bodds").html(formatMoney(new_odd , 2));

        arr_blink.push(blink_data);

        payOutOnKU(document.getElementById('BPstake'));
      }else{
        $("."+blink_data.id).addClass("show_blink");
        $("."+i).html(o);

        if(o<0){
          $("."+i).removeClass("UdrDogOddsClassBetProcess");
          $("."+i).addClass("FavOddsClassBetProcess");
        }else{
          $("."+i).removeClass("FavOddsClassBetProcess");
          $("."+i).addClass("UdrDogOddsClassBetProcess");
        }

        if(t==1){
          $("#sbBetKindValue").html(newD["b_hdc"]);
        }else if(t==2){
          $("#sbBetKindValue").html(newD["b_goal"]);
        }else if(t==5){
          $("#sbBetKindValue").html(newD["b_1h_hdc"]);
        }else if(t==6){
          $("#sbBetKindValue").html(newD["b_1h_goal"]);
        }

        if(newD["b_live"]!=0){
          $("#spScoreValue").html("["+newD["b_run_score_full"].replace(/\s/g, '')+"]");        
        }

        if(odd_old!=o){
          
          $("#oc_1").html(odd_old);
          $("#oc_2").html(o);

          $("#BPOddsChangeAlert").show();

          odd_old = o;
        }

        arr_blink.push(blink_data);

        payOutOnKU(document.getElementById('BPstake'));
      }
    }

    function ReloadWaitingBetListx(a,b,c){
      $("#left_sport_menu").show();
      $("#left_wait_bet_list").show();
      $("#BettingModeContainer").hide();
      $("#BetProcessContainer").hide();
      $("#MessageAlertContainer").hide();

      parent.rightx.del_all();

      $("#refreshBetWaitList").trigger("click");
    }
    function go_del_all(){
      parent.rightx.del_all();
    }

    function triggerEvent(el, type){
      ReloadWaitingBetListx('yes','no','1');
      $(el).trigger(type);
    }

    function unselectSportMenu(){
      $('input[name="sport_collapse"]').prop('checked', false);
      $('input[name="sport_rdo"]').prop('checked', false);
    }
    function print_bill(bid){
      MM_openBrWindow('bill_p.php?id='+bid,'','scrollbars=yes,resizable=yes,width=350,height=400')
    }
    function MM_openBrWindow(theURL,winName,features) { //v2.0
      window.open(theURL,winName,features);
    }
  </script>
</body>
</html>