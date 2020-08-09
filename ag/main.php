<?php 
ob_start(); if (!isset($_SESSION)) { session_start(); } 
if($_SESSION["rid"]=="" and $_SESSION["uu_id"]=="" ){@header('Location: index.php');exit();}

$cache = 00010;
// $cache = time();
if($_GET["p"]=="logout"){

	

    if($_SESSION["uu_use"]==0){
        $fo="../json/login/rid_".$_SESSION["rid"].".php";
        $fo_online = "../json/online/r/rid_".$_SESSION["rid"].".json";  
    }else{
        $fo="../json/login/ridu_".$_SESSION["u_id"].".php";
        $fo_online = "../json/online/r/ridu_".$_SESSION["uu_id"].".json";  
    }

    @unlink($fo); 
    @unlink($fo_online); 

    session_start();
    session_destroy();

    @header('Location: index.php');
    exit();
}

if($_GET["lang"]==""){
    if($_SESSION["AGlang"] == "")
    {
        $_SESSION["AGlang"]="th";
    }

}else{
    $_SESSION["AGlang"]=$_GET["lang"];
}   

require('lang/ag_lang.php');
require('inc/function.php');


if($_SESSION["uu_use"]!=0){
	$ex_u_menu_open = explode("," , $_SESSION["uu_menu"]);	
}else{
	$ex_u_menu_open  = "";	
}

?>
<!doctype html>
<html lang="en">
<head>
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
    <meta charset="utf-8" />
    <title><?=$app_title;?></title>

    <meta name="description" content="<?=$app_name;?>" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />

    <link rel="shortcut icon" href="assets/img/favicon.ico?v=<?=$cache;?>">
    <link rel="stylesheet" href="assets/css/bootstrap.min.css" />
    <link rel="stylesheet" href="assets/font-awesome/4.2.0/css/font-awesome.min.css" />
    <link rel="stylesheet" href="assets/css/jquery.gritter.min.css" />
    <link rel="stylesheet" href="assets/css/ace.min.css?v=3" />
    <link rel="stylesheet" href="assets/css/agent-style.css?v=<?=$cache;?>" />
    <link rel="stylesheet" href="assets/css/modify.css?v=<?=$cache;?>" />

<!--     <link
  rel="stylesheet"
  href="https://unpkg.com/simplebar@latest/dist/simplebar.css"
/>
<script src="https://unpkg.com/simplebar@latest/dist/simplebar.min.js"></script> -->


    <link rel="stylesheet" href="assets/plugins/simplebar/css/simplebar.css">
    <script src="assets/plugins/simplebar/js/simplebar.min.js"></script>





    <style type="text/css">
        .pointer{
        	cursor:pointer;
        }
        a{
        	cursor: pointer;
        }
        .alert {
            padding: 10px !important;
            margin-bottom: 5px !important;
            font-size: 12px !important;
        }

        @media (max-width: 992px) { 
            .nav-list
            {
                padding-top: 15px!important;
            }
        }

    </style>

    <!-- java scripts -->
    <script type="text/javascript" src="assets/js/jquery-3.2.1.min.js"></script>
    <script type="text/javascript" src="assets/js/bootstrap.min.js"></script>
    <script type="text/javascript" src="assets/js/ace-extra.min.js"></script>
    <script type="text/javascript" src="assets/js/jquery.gritter.min.js"></script>
    <script type="text/javascript" src="assets/js/jquery.countdown.min.js"></script>
    <script type="text/javascript" src="assets/js/bootbox.min.js"></script>
    <script type="text/javascript" src="assets/js/general.js?v=3"></script>

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jquery-confirm/3.3.2/jquery-confirm.min.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-confirm/3.3.2/jquery-confirm.min.js"></script>

    <script type="text/javascript">
        $.fn.digits = function(){
            return this.each(function(){

                if(Number($(this).text().replace(/,/g, "")) < 0){
                    // $(this).addClass('text-danger');
                    $(this).css('color','#cc0000');
                }
                $(this).text( $(this).text().replace(/(\d)(?=(\d\d\d)+(?!\d))/g, "$1,") );
            })
        }
        $.fn.rmNoVal = function(){
            return this.each(function(){

                if(Number($(this).text().replace(/,/g, "")) == 0){
                    $(this).text('');
                }
            })
        }

        $.fn.load = function(st){
            if(st == 'show'){
                return this.addClass('position-relative').append('<div class="widget-box-overlay"><i class="ace-icon loading-icon fa fa-spinner fa-spin fa-2x white"></i></div>');
            }else if(st == 'hide'){
                return this.removeClass('position-relative').find('div.widget-box-overlay').remove();
            }
        }

        $.ajaxPrefilter(function( options, original_Options, jqXHR ) {
            options.async = true;
        });
    </script>

</head>
<body class="no-skin">

	
    <div id="navbar" class="navbar navbar-default navbar-fixed-top">
        <script type="text/javascript">
            try{ace.settings.check('navbar' , 'fixed')}catch(e){}
        </script>

        <div class="navbar-container" id="navbar-container">
            <button type="button" class="navbar-toggle menu-toggler pull-left" id="menu-toggler" data-target="#sidebar">
                <span class="sr-only">Toggle sidebar</span>

                <span class="icon-bar"></span>

                <span class="icon-bar"></span>

                <span class="icon-bar"></span>
            </button>
			
            <div class="dropdown pull-left" id="third-menu" style="">
                <button type="button" class="navbar-toggle dropdown-toggle pull-left" data-toggle="dropdown">
                    <span class="sr-only">Toggle User</span>
                    <i class="ace-icon fa fa-cogs bigger-140 white"></i>
                </button>
                <ul class="dropdown-menu pull-left" role="menu" aria-labelledby="menu3">
                    <li role="presentation">
                        <a role="menuitem" tabindex="-1" onclick="getMenu('balance');">
                            <i class="ace-icon fa fa-eur bigger-100"></i>
                            &nbsp; <?=$lang_ag[26];?>                      
                        </a>
                    </li>
                   
                    <li role="presentation">
                        <a role="menuitem" tabindex="-1" onclick="getMenu('outStandingNew');">
                            <i class="ace-icon fa fa-clock-o bigger-100"></i>
                            &nbsp; <?=$lang_ag[27];?>                    
                        </a>
                    </li>
                    
                    <li role="presentation">
                        <a role="menuitem" tabindex="-1" onclick="getMenu('winLossMember');">
                            <i class="ace-icon fa fa-calculator bigger-100"></i>
                            &nbsp; <?=$lang_ag[28];?>                        
                        </a>
                    </li>
                    <!-- <li role="presentation">
                        <a role="menuitem" tabindex="-1" onclick="getMenu('winLossAnalysis');">
                            <i class="ace-icon fa fa-calculator bigger-100"></i>
                            &nbsp; วิเคราะห์ผลแพ้ชนะ                        </a>
                    </li> -->
                    <li role="presentation">
                        <a role="menuitem" tabindex="-1" onclick="getMenu('transfer');">
                            <i class="ace-icon fa fa-usd bigger-100"></i>
                            &nbsp; <?=$lang_ag[29];?>                        
                        </a>
                    </li>
                    <li role="presentation">
                        <a role="menuitem" tabindex="-1" onclick="getMenu('message');">
                            <i class="ace-icon fa fa-envelope bigger-100"></i>
                            &nbsp; <?=$lang_ag[30];?>                        
                        </a>
                    </li>
                    <li role="presentation">
                        <a role="menuitem" tabindex="-1" onclick="popupPersonal();">
                            <i class="ace-icon fa fa-eye bigger-100"></i>
                            &nbsp; <?=$lang_ag[31];?>                        
                        </a>
                    </li>
                </ul>
            </div>

            <div class="navbar-header pull-left">
                <a href="" class="navbar-brand">


                    <small>
                        <img src="assets/img/favicon.png?v=<?=$cache;?>" alt="" style="width: 25px;height: 25px; float: left;">    
                      
                        <div style="float: left; padding: 2px;">
                             <?=$app_name;?>  
                        </div>
                       
                    </small>
                </a>
            </div>

            <div class="dropdown pull-right" id="menu-user">
                <button type="button" class="navbar-toggle dropdown-toggle pull-right" data-toggle="dropdown">
                    <span class="sr-only">Toggle User</span>
                    <i class="ace-icon fa fa-user bigger-140 white"></i>
                </button>
                <ul class="dropdown-menu pull-right" role="menu" aria-labelledby="menu1">
                    <!-- <li role="presentation">
                        <a role="menuitem"  href="#">
                            <i class="ace-icon fa fa-user bigger-100"></i>
                            oho                        </a>
                    </li> -->
                    <li role="presentation">
                        <a role="menuitem"  href="#">
                            <i class="ace-icon fa fa-users bigger-100"></i>
                            <?=$_SESSION["r_user"];?>                           </a>
                    </li>
                    <style>
                        .dropdown-mobileuser {
                            position: relative;
                        }
                        .dropdown-mobileuser .dropdown-menu {
                            top: 0;
                            left: -102%;
                            margin-top: -1px;
                        }
                    </style>

                    <li role="presentation" class="dropdown-mobileuser">
                        <a class="a_mobileuser" tabindex="-1" href="#">
                            <!-- <i class="ace-icon fa fa-language"></i>  -->
                            <img src="assets/img/flag_icon/<?=$_SESSION["AGlang"];?>.png" alt="" style="width: 25px; height: 15px; border: 1px solid #a9a9a9a8;">
                             <?php 
                                //    $l_key = array_keys($arr_lang,"$_SESSION[AGlang]",true);
                                   $l_key = array_keys($arr_lang,$_SESSION["AGlang"],true);
                                   echo $m_lang[$l_key[0]];

                             ?>
                            <span class="caret"></span>
                        </a>
                        <ul class="dropdown-menu">

                             <?php 
                                foreach ($m_lang as $key => $value) {
                                   ?>

                                   <li>
                                        <a href="#" onclick="changeLang('<?=$arr_lang[$key];?>');">
                                            <i class="ace-icon fa fa-angle-double-right"></i>
                                                    <img src="assets/img/flag_icon/<?=$arr_lang[$key];?>.png" alt="" style="border: 1px solid #a9a9a9a8; width: 25px; height: 15px;">
                                                    <font><?=$value;?></font>
                                        </a>
                                    </li>


                                         

                                   <?
                                }

                             ?>

                    </ul>
                    </li>
                    <script>
                        $(document).ready(function(){
                          $('.dropdown-mobileuser a.a_mobileuser').on("click", function(e){
                            $(this).next('ul').toggle();
                            e.stopPropagation();
                            e.preventDefault();
                          });
                        });
                    </script>
                    <li role="presentation">
                        <!-- <a href="logout"> -->
                        <a href="?p=logout">
                            <div class="btn-group">
                                <i class="ace-icon fa fa-power-off bigger-100"></i>
                                &nbsp; <?=$lang_ag[34];?>                       </div>
                        </a>
                    </li>
                </ul>
            </div>

           
            <div class="navbar-buttons navbar-header pull-right responsive" role="navigation" id="info">
                <ul class="nav ace-nav">
                   <!--  <li class="purple" >
                        <a role="menuitem" tabindex="-1" href="#">
                            <div class="btn-group">
                                <i class="ace-icon fa fa-user bigger-140 bg-icon"></i>
                                &nbsp; oho                            </div>
                        </a>
                    </li> -->
                    <li class="green" id="s_user">
                        <a role="menuitem" tabindex="-1" href="#">
                            <div class="btn-group">
                                <i class="ace-icon fa fa-users bigger-140 bg-icon"></i>
                                &nbsp;<?=$_SESSION["r_user"];?>  &nbsp;
                            </div>
                        </a>
                    </li>
                    <li class="grey" id="drop_lang">
                        <a data-toggle="dropdown" href="#" class="dropdown-toggle">
                            <img src="assets/img/flag_icon/<?=$_SESSION["AGlang"];?>.png" alt="" style="width: 25px; height: 15px;">
                            <?php 
                                //    $l_key = array_keys($arr_lang,"$_SESSION[AGlang]",true);
                                   $l_key = array_keys($arr_lang,$_SESSION["AGlang"],true);
                                   echo $m_lang[$l_key[0]];

                             ?>
                              <i class="ace-icon fa fa-caret-down"></i>
                        </a>
                        <ul class="user-menu dropdown-menu-right dropdown-menu dropdown-yellow dropdown-caret dropdown-close">
                            <?php 
                                foreach ($m_lang as $key => $value) {
                                   ?>
                                             <li class="cur">
                                                <a tabindex="-1" onclick="changeLang('<?=$arr_lang[$key];?>');" class="pointer">

                                                    <i class="ace-icon fa fa-angle-double-right"></i>
                                                    <img src="assets/img/flag_icon/<?=$arr_lang[$key];?>.png" alt="" style="border: 1px solid #a9a9a9a8; width: 25px; height: 15px;">
                                                    <font><?=$value;?></font>
                                                </a>
                                            </li>

                                   <?
                                }

                             ?>
                        </ul>
                    </li>
                    <li class="light-blue" id="">
                        <!-- <a href="logout"> -->
                        <a href="?p=logout">
                            <div class="btn-group">
                                <i class="ace-icon fa fa-power-off bigger-140 bg-icon-red"></i>
                                &nbsp; <?=$lang_ag[34];?>               </div>
                        </a>
                    </li>
                </ul>
            </div>
        </div><!-- /.navbar-container -->
    </div>

    <div class="main-container" id="main-container">

        <script type="text/javascript">
            try{ace.settings.check('main-container' , 'fixed')}catch(e){}
        </script>

        <div id="sidebar" class="sidebar responsive sidebar-fixed sidebar-scroll space-top">
            <script type="text/javascript">
                try{ace.settings.check('sidebar' , 'fixed')}catch(e){}
            </script>

            <ul class="nav nav-list">
                <li id="main">
                    <a href="main.php" class="dropdown-toggle" onmouseover="hoverMenu(this,'mouseover')" onmouseout="hoverMenu(this,'mouseout')">
                        <!-- <i class="menu-icon fa fa-tachometer"></i> -->
                        <span class="menu-icon">
                            <img src="assets/images/icon_manu/main_manu.png?v=<?=$cache;?>" class="menu-img" data-mouseover="assets/images/icon_manu/h_main_manu.png?v=<?=$cache;?>"  data-mouseout="assets/images/icon_manu/main_manu.png?v=<?=$cache;?>"/>
                        </span>
                        <span class="menu-text"><?=$lang_ag[33];?></span>
                    </a>

                    <b class="arrow"></b>
                </li>


			<? if(empty($ex_u_menu_open) || $ex_u_menu_open[4] == 1){ ?>   	
                <li class="open" id="menuActive">
                <!-- <li class="">     -->
                    <a href="#" class="dropdown-toggle" onmouseover="hoverMenu(this,'mouseover')" onmouseout="hoverMenu(this,'mouseout')">
                        <!-- <i class="menu-icon fa fa-cogs"></i> -->
                        <span class="menu-icon">
                            <img src="assets/images/icon_manu/active_manu.png?v=<?=$cache;?>" class="menu-img" data-mouseover="assets/images/icon_manu/h_active_manu.png?v=<?=$cache;?>"  data-mouseout="assets/images/icon_manu/active_manu.png?v=<?=$cache;?>"/>
                        </span>
                        <span class="menu-text">
                            <?=$lang_ag[72];?>
                        </span>

                        <b class="arrow fa fa-angle-down"></b>
                    </a>
                    <b class="arrow"></b>
                    <ul class="submenu">
                        <li id="memberMember">
                                <a href="#" onclick="getMenu('memberMember');">
                                    <i class="menu-icon fa fa-caret-right"></i>
                                    <?=$lang_ag[75];?>  
                                </a>
                                <b class="arrow"></b>
                        </li>

                         <?php if($_SESSION["r_level"] < 8){ ?>
                        <li id="memberAgent">
                                <a href="#" onclick="getMenu('memberAgent');">
                                    <i class="menu-icon fa fa-caret-right"></i>
                                    <?=$lang_ag[78];?>                                
                                </a>
                                <b class="arrow"></b>
                        </li>
                        <?php } ?>
                        <li id="userList">
                            <a href="#" onclick="getMenu('userList');">
                                <i class="menu-icon fa fa-caret-right"></i>
                                <?=$lang_ag[82];?>                            
                                 </a>
                            <b class="arrow"></b>
                        </li>
                        <li id="memberUserStatus">
                            <a href="#" onclick="getMenu('memberUserStatus');">
                                <i class="menu-icon fa fa-caret-right"></i>
                                <?=$lang_ag[84];?>                             
                            </a>
                            <b class="arrow"></b>
                        </li>
                        <li id="ballControlStatus">
                            <a href="#" onclick="getMenu('ballControlStatus');">
                                <i class="menu-icon fa fa-caret-right"></i>
                                <?=$lang_ag[173];?>                             
                            </a>
                            <b class="arrow"></b>
                        </li>
                        <li id="memberUserKeep">
                            <a href="#" onclick="getMenu('memberUserKeep');">
                                <i class="menu-icon fa fa-caret-right"></i>
                                <?=$lang_ag[86];?>                             
                            </a>
                            <b class="arrow"></b>
                        </li>
                       <!--  <li id="memberUserReturn">
                            <a href="#" onclick="getMenu('memberUserReturn');">
                                <i class="menu-icon fa fa-caret-right"></i>
                                สมาชิกรับคืน                            </a>
                            <b class="arrow"></b>
                        </li> -->
                        <li id="userStructure">
                            <a href="#" onclick="getMenu('userStructure');">
                                <i class="menu-icon fa fa-caret-right"></i>
                                <?=$lang_ag[89];?>                             
                            </a>
                            <b class="arrow"></b>
                        </li>
                        <li id="userOnline">
                            <a href="#" onclick="getMenu('userOnline');">
                                <i class="menu-icon fa fa-caret-right"></i>
                                <?=$lang_ag[90];?>                           
                            </a>
                            <b class="arrow"></b>
                        </li>

                        <?php if($_SESSION["uu_use"]==0){ ?>
                         <li id="subAgent">
                                    <a href="#" onclick="getMenu('subAgent');">
                                        <i class="menu-icon fa fa-caret-right"></i>
                                       <?=$lang_ag[101];?>                                   
                                        </a>
                                    <b class="arrow"></b>
                         </li>
                           <?php } ?>                                                                                                 
                       <li id="changePassword">
                                <a href="#" onclick="getMenu('changePassword');">
                                    <i class="menu-icon fa fa-caret-right"></i>
                                    <?=$lang_ag[102];?>                                 
                                </a>
                                <b class="arrow"></b>
                        </li>
                        <li id="log">
                            <a href="#" onclick="getMenu('log');">
                                <i class="menu-icon fa fa-caret-right"></i>
                                <?=$lang_ag[104];?>                             
                            </a>
                            <b class="arrow"></b>
                        </li>
                    </ul>
                </li>
			<? } ?>
			
			<? if(empty($ex_u_menu_open) || $ex_u_menu_open[5] == 1){ ?> 	
                <li class="">
                    <a href="#" class="dropdown-toggle" class="dropdown-toggle" onmouseover="hoverMenu(this,'mouseover')" onmouseout="hoverMenu(this,'mouseout')">
                        <!-- <i class="menu-icon fa fa-file-text-o"></i> -->
                         <span class="menu-icon">
                            <img src="assets/images/icon_manu/report_manu.png?v=<?=$cache;?>" class="menu-img" data-mouseover="assets/images/icon_manu/h_report_manu.png?v=<?=$cache;?>"  data-mouseout="assets/images/icon_manu/report_manu.png?v=<?=$cache;?>"/>
                        </span>
                        <span class="menu-text">
                            <?=$lang_ag[108];?>  
                        </span>

                        <b class="arrow fa fa-angle-down"></b>
                    </a>

                    <b class="arrow"></b>

                    <ul class="submenu nav-hide" style="display: none;">
                        <li id="credit_history">
                            <a href="#" onclick="getMenu('credit_history')">
                                <i class="menu-icon fa fa-caret-right"></i>
                                <?=$lang_ag[112];?>                             
                            </a>

                            <b class="arrow"></b>
                        </li>
                        <li id="statement_member_detail">
                            <a href="#" onclick="getMenu('statement_member_detail');">
                                <i class="menu-icon fa fa-caret-right"></i>
                                <?=$lang_ag[115];?>                            
                            </a>

                            <b class="arrow"></b>
                        </li>
                    </ul>
                </li>
			<? } ?>
			
			<? if(empty($ex_u_menu_open) || $ex_u_menu_open[6] == 1){ ?> 
                <li class="">
                    <a href="#" class="dropdown-toggle" onmouseover="hoverMenu(this,'mouseover')" onmouseout="hoverMenu(this,'mouseout')">
                         <span class="menu-icon">
                            <img src="assets/images/icon_manu/sport_manu.png?v=<?=$cache;?>" class="menu-img" data-mouseover="assets/images/icon_manu/h_sport_manu.png?v=<?=$cache;?>"  data-mouseout="assets/images/icon_manu/sport_manu.png?v=<?=$cache;?>"/>
                        </span>
                        <span class="menu-text">
                            <!-- Today - Live - Step -->
                            <?=$lang_ag[117];?>                         </span>

                        <b class="arrow fa fa-angle-down"></b>
                    </a>

                    <b class="arrow"></b>

                    <ul class="submenu nav-hide" style="display: none;">
                        <li id="soccerSummaryToday">
                            <a href="#" onclick="getMenu('soccerSummaryToday')">
                                <i class="menu-icon fa fa-caret-right"></i>
                                <?=$lang_ag[119];?>                             
                            </a>

                            <b class="arrow"></b>
                        </li>
                        <li id="soccerSummaryStep">
                            <a href="#" onclick="getMenu('soccerSummaryStep');">
                                <i class="menu-icon fa fa-caret-right"></i>
                                <?=$lang_ag[120];?>                             
                            </a>

                            <b class="arrow"></b>
                        </li>
                        <li id="soccerWinOrLose">
                            <a href="#" onclick="getMenu('soccerWinOrLose');">
                                <i class="menu-icon fa fa-caret-right"></i>
                                <?=$lang_ag[123];?>                             
                            </a>

                            <b class="arrow"></b>
                        </li>
                        <li id="sportBill">
                            <a href="#" onclick="getMenu('sportBill');">
                                <i class="menu-icon fa fa-caret-right"></i>
                                <?=$lang_ag[127];?>                            
                            </a>

                            <b class="arrow"></b>
                        </li>
                        <li id="sportBill_ac">
                            <a href="#" onclick="getMenu('sportBill_ac');">
                                <i class="menu-icon fa fa-caret-right"></i>
                                <?=$lang_ag[1900];?>                         
                            </a>

                            <b class="arrow"></b>
                        </li>
                        <li id="betReject">
                            <a href="#" onclick="getMenu('betReject');">
                                <i class="menu-icon fa fa-caret-right"></i>
                                <?=$lang_ag[129];?>                             
                            </a>

                            <b class="arrow"></b>
                        </li>
                        <li id="robot">
                            <a href="#" onclick="getMenu('robot');">
                                <i class="menu-icon fa fa-caret-right"></i>
                                <?=$lang_ag[132];?>                            
                            </a>
                            <b class="arrow"></b>
                        </li>
                        <li id="soccerResultSoccer">
                            <a href="#" onclick="getMenu('soccerResultSoccer');">
                                <i class="menu-icon fa fa-caret-right"></i>
                                <?=$lang_ag[134];?>                             
                            </a>

                            <b class="arrow"></b>
                        </li>
                    </ul>
                </li> 
            <? } ?>      
			
			<? if(empty($ex_u_menu_open) || $ex_u_menu_open[7] == 1){ ?> 
                <li class="">
                    <a href="#" class="dropdown-toggle" class="dropdown-toggle" onmouseover="hoverMenu(this,'mouseover')" onmouseout="hoverMenu(this,'mouseout')">
                        <!-- <i class="menu-icon fa fa-puzzle-piece"></i> -->
                         <span class="menu-icon">
                            <img src="assets/images/icon_manu/casino_manu.png?v=<?=$cache;?>" class="menu-img" data-mouseover="assets/images/icon_manu/h_casino_manu.png?v=<?=$cache;?>"  data-mouseout="assets/images/icon_manu/casino_manu.png?v=<?=$cache;?>"/>
                        </span>
                        <span class="menu-text">
                            <!-- Today - Live - Step -->
                            <?=$lang_ag[172];?>                         </span>

                        <b class="arrow fa fa-angle-down"></b>
                    </a>

                    <b class="arrow"></b>

                    <ul class="submenu nav-hide" style="display: none;">

                        <li id="casinoSummaryRU">
                            <a href="#" onclick="getMenu('casinoSummary','?zone=1');">
                                <i class="menu-icon fa fa-caret-right"></i>
                                <?=$lang_ag[1680];?> <?=$lang_g["casino_share"][1];?>                         
                            </a>

                            <b class="arrow"></b>
                        </li>

                        <li id="casinoSummaryRU">
                            <a href="#" onclick="getMenu('casinoSummary','?zone=2');">
                                <i class="menu-icon fa fa-caret-right"></i>
                                <?=$lang_ag[1680];?> <?=$lang_g["casino_share"][2];?>                         
                            </a>

                            <b class="arrow"></b>
                        </li>

                        <li id="casinoSummaryRU">
                            <a href="#" onclick="getMenu('casinoSummary','?zone=3');">
                                <i class="menu-icon fa fa-caret-right"></i>
                                <?=$lang_ag[1680];?> <?=$lang_g["casino_share"][3];?>                         
                            </a>

                            <b class="arrow"></b>
                        </li>

                        <li id="casinoSummaryRU">
                            <a href="#" onclick="getMenu('casinoSummary','?zone=4');">
                                <i class="menu-icon fa fa-caret-right"></i>
                                <?=$lang_ag[1680];?> <?=$lang_g["casino_share"][4];?>                         
                            </a>
                            <b class="arrow"></b>
                        </li>

                        <li id="casinoSummaryRU">
                            <a href="#" onclick="getMenu('casinoSummary','?zone=5');">
                                <i class="menu-icon fa fa-caret-right"></i>
                                <?=$lang_ag[1680];?> <?=$lang_g["casino_share"][5];?>                         
                            </a>
                            <b class="arrow"></b>
                        </li>

                        <li id="casinoSummaryRU">
                            <a href="#" onclick="getMenu('casinoSummary','?zone=6');">
                                <i class="menu-icon fa fa-caret-right"></i>
                                <?=$lang_ag[1680];?> <?=$lang_g["casino_share"][6];?>                         
                            </a>
                            <b class="arrow"></b>
                        </li>

                        <li id="casinoSummaryRU">
                            <a href="#" onclick="getMenu('casinoSummary','?zone=7');">
                                <i class="menu-icon fa fa-caret-right"></i>
                                <?=$lang_ag[1680];?> <?=$lang_g["casino_share"][7];?>                         
                            </a>
                            <b class="arrow"></b>
                        </li>
                   
                    </ul>
                </li> 
            <? } ?>    
			
			<? if(empty($ex_u_menu_open) || $ex_u_menu_open[8] == 1){ ?> 
                <li class="">
                    <a href="#" class="dropdown-toggle" class="dropdown-toggle" onmouseover="hoverMenu(this,'mouseover')" onmouseout="hoverMenu(this,'mouseout')">
                        <span class="menu-icon">
                            <img src="assets/images/icon_manu/lotto_manu.png?v=<?=$cache;?>" class="menu-img" data-mouseover="assets/images/icon_manu/h_lotto_manu.png?v=<?=$cache;?>"  data-mouseout="assets/images/icon_manu/lotto_manu.png?v=<?=$cache;?>"/>
                        </span>
                        <span class="menu-text">
                            <?=$lang_ag[137];?>                        </span>

                        <b class="arrow fa fa-angle-down"></b>
                    </a>

                    <b class="arrow"></b>

                    <ul class="submenu">
                        <li id="lottoMaxReceive">
                                <a href="#" onclick="getMenu('lottoMaxReceive');">
                                    <i class="menu-icon fa fa-caret-right"></i>
                                    <?=$lang_ag[140];?>                                
                                </a>

                                <b class="arrow"></b>
                        </li>
                        <li id="lottoBlockNumber">
                                <a href="#" onclick="getMenu('lottoBlockNumber');">
                                    <i class="menu-icon fa fa-caret-right"></i>
                                    <?=$lang_ag[142];?>                                
                                </a>

                                <b class="arrow"></b>
                        </li>
                        <li id="lottoSummaryByUser">
                            <a href="#" onclick="getMenu('lottoSummaryByUser');">
                                <i class="menu-icon fa fa-caret-right"></i>
                                <?=$lang_ag[145];?>                             
                            </a>

                            <b class="arrow"></b>
                        </li>
                        <li id="lottoSummaryByType">
                            <a href="#" onclick="getMenu('lottoSummaryByType');">
                                <i class="menu-icon fa fa-caret-right"></i>
                                <?=$lang_ag[148];?>                            
                            </a>

                            <b class="arrow"></b>
                        </li>
                         <li id="_money">
                            <a href="#" onclick="getMenu('_money');">
                                <i class="menu-icon fa fa-caret-right"></i>
                                <?=$lang_ag[150];?>                            
                            </a>

                            <b class="arrow"></b>
                        </li>
                         <li id="ForecastListLotto">
                            <a href="#" onclick="getMenu('ForecastListLotto');">
                                <i class="menu-icon fa fa-caret-right"></i>
                                <?=$lang_ag[152];?>                            
                            </a>

                            <b class="arrow"></b>
                        </li>
                         <li id="LottoCancel">
                            <a href="#" onclick="getMenu('LottoCancel');">
                                <i class="menu-icon fa fa-caret-right"></i>
                                <?=$lang_ag[154];?>                             
                            </a>

                            <b class="arrow"></b>
                        </li>
                      <!--   <li id="LottoTang">
                            <a href="#" onclick="getMenu('LottoTang');">
                                <i class="menu-icon fa fa-caret-right"></i>
                                <?=$lang_left[32];?>                            
                            </a>

                            <b class="arrow"></b>
                        </li> -->
                    </ul>
                </li>
            <? } ?>    

			<? if(empty($ex_u_menu_open) || $ex_u_menu_open[9] == 1){ ?> 	
                <li class="">
                    <a href="#" class="dropdown-toggle" onmouseover="hoverMenu(this,'mouseover')" onmouseout="hoverMenu(this,'mouseout')">
                         <span class="menu-icon">
                            <img src="assets/images/icon_manu/lottoSet_manu.png?v=<?=$cache;?>" class="menu-img" data-mouseover="assets/images/icon_manu/h_lottoSet_manu.png?v=<?=$cache;?>"  data-mouseout="assets/images/icon_manu/lottoSet_manu.png?v=<?=$cache;?>"/>
                        </span>
                        <span class="menu-text">
                            <?=$lang_ag[159];?>                        </span>

                        <b class="arrow fa fa-angle-down"></b>
                    </a>

                    <b class="arrow"></b>

                    <ul class="submenu">
                            <li id="lottoSetMaxReceive">
                                <a href="#" onclick="getMenu('lottoSetMaxReceive');">
                                    <i class="menu-icon fa fa-caret-right"></i>
                                    <?=$lang_ag[140];?>                                
                                     </a>

                                <b class="arrow"></b>
                            </li>
                            <li id="lottoSetBlockNumber">
                                <a href="#" onclick="getMenu('lottoSetBlockNumber');">
                                    <i class="menu-icon fa fa-caret-right"></i>
                                    <?=$lang_ag[142];?>                                 
                                </a>

                                <b class="arrow"></b>
                            </li>
                                                <li id="lottoSetSummaryByUser">
                            <a href="#" onclick="getMenu('lottoSetSummaryByUser');">
                                <i class="menu-icon fa fa-caret-right"></i>
                                <?=$lang_ag[145];?>                              
                            </a>

                            <b class="arrow"></b>
                        </li>
                        <li id="lottoSetSummaryByType">
                            <a href="#" onclick="getMenu('lottoSetSummaryByType');">
                                <i class="menu-icon fa fa-caret-right"></i>
                                <?=$lang_ag[148];?>                             
                            </a>

                            <b class="arrow"></b>
                        </li>
                         <li id="_money_hun">
                            <a href="#" onclick="getMenu('_money_hun');">
                                <i class="menu-icon fa fa-caret-right"></i>
                                <?=$lang_ag[150];?>                             
                            </a>

                            <b class="arrow"></b>
                        </li>
                         <li id="LottoCancel_hun">
                            <a href="#" onclick="getMenu('LottoCancel_hun');">
                                <i class="menu-icon fa fa-caret-right"></i>
                                <?=$lang_ag[154];?>                             
                            </a>

                            <b class="arrow"></b>
                        </li>
                    </ul>
                </li>
			<? } ?> 

			<? if(empty($ex_u_menu_open) || $ex_u_menu_open[10] == 1){ ?> 	
                <li class="">
                    <a href="#" class="dropdown-toggle" onmouseover="hoverMenu(this,'mouseover')" onmouseout="hoverMenu(this,'mouseout')">
                        <span class="menu-icon">
                            <img src="assets/images/icon_manu/lottoSeries_manu.png?v=<?=$cache;?>" class="menu-img" data-mouseover="assets/images/icon_manu/h_lottoSeries_manu.png?v=<?=$cache;?>"  data-mouseout="assets/images/icon_manu/lottoSeries_manu.png?v=<?=$cache;?>"/>
                        </span>
                        <span class="menu-text">
                            <?=$lang_ag[161];?>                         </span>

                        <b class="arrow fa fa-angle-down"></b>
                    </a>

                    <b class="arrow"></b>

                    <ul class="submenu">
                        <li id="lottoLaoMaxReceive">
                                <a href="#" onclick="getMenu('lottoLaoMaxReceive');">
                                    <i class="menu-icon fa fa-caret-right"></i>
                                    <?=$lang_ag[140];?>                                
                                </a>

                                <b class="arrow"></b>
                        </li>
                        <li id="lottoLaoBlockNumber">
                                <a href="#" onclick="getMenu('lottoLaoBlockNumber');">
                                    <i class="menu-icon fa fa-caret-right"></i>
                                    <?=$lang_ag[142];?>                                
                                </a>

                                <b class="arrow"></b>
                        </li>
                        <li id="lottoLaoSummaryByUser">
                            <a href="#" onclick="getMenu('lottoLaoSummaryByUser');">
                                <i class="menu-icon fa fa-caret-right"></i>
                                <?=$lang_ag[145];?>                             
                            </a>

                            <b class="arrow"></b>
                        </li>
                        <li id="_money_hunset">
                            <a href="#" onclick="getMenu('_money_hunset');">
                                <i class="menu-icon fa fa-caret-right"></i>
                                <?=$lang_ag[150];?>                             
                            </a>

                            <b class="arrow"></b>
                        </li>
                        <li id="lottoLao_Cancel">
                            <a href="#" onclick="getMenu('lottoLao_Cancel');">
                                <i class="menu-icon fa fa-caret-right"></i>
                                <?=$lang_ag[154];?>                             
                            </a>

                            <b class="arrow"></b>
                        </li>
                       <!--  <li id="lottoLaoSummaryByType">
                            <a href="#" onclick="getMenu('lottoLaoSummaryByType');">
                                <i class="menu-icon fa fa-caret-right"></i>
                                <?=$lang_left[28];?>                            
                            </a>

                            <b class="arrow"></b>
                        </li> -->
                    </ul>
                </li>
			<? } ?> 

			<? if(empty($ex_u_menu_open) || $ex_u_menu_open[11] == 1){ ?> 
                <li class="">
                    <a href="#" class="dropdown-toggle" onmouseover="hoverMenu(this,'mouseover')" onmouseout="hoverMenu(this,'mouseout')">
                        <span class="menu-icon">
                            <img src="assets/images/icon_manu/Deposit_manu.png?v=<?=$cache;?>" class="menu-img" data-mouseover="assets/images/icon_manu/h_Deposit_manu.png?v=<?=$cache;?>"  data-mouseout="assets/images/icon_manu/Deposit_manu.png?v=<?=$cache;?>"/>
                        </span>
                        <span class="menu-text">
                            <?=$lang_ag[164];?> 

                            <span class="noti" id="transfer-noti"> 0 </span>                       
                        </span>

                        <b class="arrow fa fa-angle-down"></b>
                    </a>

                    <b class="arrow"></b>

                    <ul class="submenu">
                            <li id="cashSetting">
                                <a href="#" onclick="getMenu('cashSetting');">
                                    <i class="menu-icon fa fa-caret-right"></i>
                                    <?=$lang_ag[167];?>                                
                                </a>

                                <b class="arrow"></b>
                            </li>
                            <li id="cashBank">
                                <a href="#" onclick="getMenu('cashBank');">
                                    <i class="menu-icon fa fa-caret-right"></i>
                                    <?=$lang_ag[168];?>                                
                                </a>

                                <b class="arrow"></b>
                            </li>
                            <li id="deposit">
                                <a href="#" onclick="getMenu('deposit');">
                                    <i class="menu-icon fa fa-caret-right"></i>
                                    <?=$lang_ag[169];?>  

                                    <span class="noti" id="deposit-noti"> 0 </span>                              
                                </a>

                                <b class="arrow"></b>
                            </li>
                            <li id="withdrawal">
                                <a href="#" onclick="getMenu('withdrawal');">
                                    <i class="menu-icon fa fa-caret-right"></i>
                                    <?=$lang_ag[170];?> 

                                    <span class="noti" id="withdrawal-noti"> 0 </span>

                                </a>

                                <b class="arrow"></b>
                            </li>
                            <li id="cashReport">
                                <a href="#" onclick="getMenu('cashReport');">
                                    <i class="menu-icon fa fa-caret-right"></i>
                                    <?=$lang_ag[108];?>                           
                                 </a>
                            <b class="arrow"></b>
                        </li>
                                                <!-- <li id="agentAccept">
                            <a href="#" onclick="getMenu('agentAccept');">
                                <i class="menu-icon fa fa-caret-right"></i>
                                รายงาน ซัพเอเย่นต์                            </a>
                            <b class="arrow"></b>
                        </li>
                        <li id="userdwAccept">
                            <a href="#" onclick="getMenu('userdwAccept');">
                                <i class="menu-icon fa fa-caret-right"></i>
                                รายงาน สมาชิก                            </a>
                            <b class="arrow"></b>
                        </li>
                        <li id="reportCCM">
                            <a href="#" onclick="getMenu('reportCCM');">
                                <i class="menu-icon fa fa-caret-right"></i>
                                รายงาน ปรับเครดิตมือ                            </a>
                            <b class="arrow"></b>
                        </li>
                                                                        <li id="depositAuto">
                            <a href="#" onclick="getMenu('depositAuto');">
                                <i class="menu-icon fa fa-caret-right"></i>
                                Control Auto Deposit                            </a>
                            <b class="arrow"></b>
                        </li>
                                                                        <li id="livechatCtrl">
                            <a href="livechatCtrl" target="_blank">
                                <i class="menu-icon fa fa-caret-right"></i>
                                Control Live Chat                            </a>
                            <b class="arrow"></b>
                        </li>
                                                                        <li id="userGroupBank">
                            <a href="#" onclick="getMenu('userGroupBank');">
                                <i class="menu-icon fa fa-caret-right"></i>
                                กลุ่มสมาชิก                            </a>
                            <b class="arrow"></b>
                        </li> -->
                    </ul>
                </li>
			<? } ?> 

             <li class="">
                    <a href="#" class="dropdown-toggle" onclick="getMenu('config');"  onmouseover="hoverMenu(this,'mouseover')" onmouseout="hoverMenu(this,'mouseout')">
                        <span class="menu-icon">
                            <img src="assets/images/icon_manu/settings_manu.png?v=<?=$cache;?>" class="menu-img" data-mouseover="assets/images/icon_manu/h_settings_manu.png?v=<?=$cache;?>"  data-mouseout="assets/images/icon_manu/settings_manu.png?v=<?=$cache;?>"/>
                        </span>
                        <span class="menu-text">
                            <?=$lang_ag[2118];?>           
                        </span>   
                    </a>
            </li>

            </ul>
            <div class="sidebar-toggle sidebar-collapse" id="sidebar-collapse">
                <i class="ace-icon fa fa-angle-double-left" data-icon1="ace-icon fa fa-angle-double-left" data-icon2="ace-icon fa fa-angle-double-right"></i>
            </div>

            <script type="text/javascript">
                try{ace.settings.check('sidebar' , 'collapsed')}catch(e){}
            </script>
        </div>

        <div class="main-content">
            <div class="main-content-inner">
                <div id="m-breadcrumb">
                    <div class="breadcrumbs" id="breadcrumbs">
                        <div class="row menuSubHead" id="menu-sub">
                            <div class="col-sm-12" id="buttonHead">&nbsp;&nbsp;
                                <span class="label span-head ">
                                    <a href="#" onclick="getMenu('balance');">
                                        <i class="ace-icon fa fa-eur bigger-120"></i>
                                        <?=$lang_ag[26];?>                                    
                                    </a>
                                </span>
                                <? if(empty($ex_u_menu_open) || $ex_u_menu_open[1] == 1){ ?>
                                <span class="label span-head ">
                                    <a href="#" onclick="getMenu('outStandingNew');">
                                        <i class="fa fa-clock-o  bigger-120"></i>
                                        <?=$lang_ag[27];?>                                     
                                    </a>
                                </span>
                                <? } ?>

                                <? if(empty($ex_u_menu_open) || $ex_u_menu_open[2] == 1){ ?>
                                <span class="label span-head ">
                                        <a href="#" onclick="getMenu('winLossMember');">
                                            <i class="ace-icon fa fa-calculator bigger-120"></i>
                                            <?=$lang_ag[28];?>                                         
                                        </a>
                                </span>
                                <? } ?>
                                 

                                <? if(empty($ex_u_menu_open) || $ex_u_menu_open[3] == 1){ ?>   
                                <span class="label span-head ">
                                        <a href="#" onclick="getMenu('transfer');">
                                            <i class="ace-icon fa fa-usd bigger-120"></i>
                                            <?=$lang_ag[29];?>                                         
                                        </a>
                                </span>
                                <? } ?>

                                <span class="label span-head ">
                                    <a href="#" onclick="getMenu('message');">
                                        <i class="fa fa-envelope bigger-120"></i>
                                    </a>
                                </span>
                                <span class="label span-head ">
                                    <a href="#" onclick="popupPersonal();">
                                        <i class="fa fa-eye bigger-120 bg-icon"></i>
                                        <span class="lb_3"><?=$lang_ag[31];?> </span>
                                        <font class="numPersonal">(0)</font>
                                    </a>
                                </span>
                            </div>
                        </div>
                        <div class="row headMessage">
                            <div class="col-sm-12" id="">
                                <script type="text/javascript">
                                    try{ace.settings.check('breadcrumbs' , 'fixed')}catch(e){}
                                </script>
                                <div class="col-sm-4" id="breadcrumb">
                                    <ul class="breadcrumb">
                                        <li class="home">
                                            <a href="#" onclick="getMenu('balance');">
                                                <i class="ace-icon fa fa-home home-icon"></i>
                                                <?=$lang_ag[32];?>                                            
                                            </a>
                                        </li>
                                        <li class="active li-menu" id="btitle">
                                        	<?=$lang_ag[33];?>                                        
                                        </li>
                                        <li class="active li-submenu" id="bsubtitle" style="display: none;"></li>
                                    </ul>
                                </div>
                                <div class="col-sm-8">
                                    <marquee scorllelay="120" scrollamount="3" style="margin-top: 8px;">
                                        <label class="lighter" style="color:red;">

                                                                                        	

                                            
                                        </label>
                                    </marquee>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="page-content" id="pageContent">
                    <div style="padding-top:60px;text-align:center;width: 100%; max-width: 600px; margin: 0 auto;"><img src='assets/images/logo.png?v=<?=$cache;?>' class='img-responsive center-block' alt='<?=$app_title;?>' style='padding-top:60px'/></div>
                </div>
            </div>
        </div><!-- /.main-content -->
        <div class="footer" style="display:none;">
            <div class="footer-inner" id="showScore" ></div>
        </div>

        <a href="#" id="btn-scroll-up" class="btn-scroll-up btn btn-sm btn-inverse">
            <i class="ace-icon fa fa-angle-double-up icon-only bigger-110"></i>
        </a>
    </div><!-- /.main-container -->

    <!-- Modal Inactive-->
    <div class="modal fade" id="inactive" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" style="widhth:20%;">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            <h4 class="modal-title" id="myModalLabel"><?=$lang_ag[2143];?></h4>
          </div>
          <div class="modal-body">
            <?=$lang_ag[2144];?>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-default" data-dismiss="modal"><?=$lang_ag[284];?></button>
            <!-- <button type="button" class="btn btn-primary">Save changes</button> -->
          </div>
        </div>
      </div>
    </div>

    <!-- Modal Check User-->
    <div class="modal fade" id="chkuser" tabindex="-1" role="dialog" aria-labelledby="chkuserLabel" style="widhth:20%;">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            <h4 class="modal-title" id="myModalLabel"><?=$lang_ag[2143];?></h4>
          </div>
          <div class="modal-body">
            <?=$lang_ag[2145];?>         </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-default" data-dismiss="modal"><?=$lang_ag[284];?></button>
            <!-- <button type="button" class="btn btn-primary">Save changes</button> -->
          </div>
        </div>
      </div>
    </div>
    <div id="showModal"></div>

  <!--   <link rel="stylesheet" href="assets/css/datepicker.min.css" />
    <link rel="stylesheet" href="assets/css/bootstrap-datetimepicker.min.css" />
    <link rel="stylesheet" href="assets/css/daterangepicker.min.css" />

    <script type="text/javascript" src="assets/js/bootstrap-datepicker.min.js" async></script>
    <script type="text/javascript" src="assets/js/moment.min.js" async></script>
    <script type="text/javascript" src="assets/js/daterangepicker.min.js" async></script> -->

    <link rel="stylesheet" href="assets/plugins/bootstrap-datepicker/dist/css/bootstrap-datepicker.min.css">
    <script type="text/javascript" src="assets/js/moment.min.js" async=""></script>
    <script src="assets/plugins/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js"></script>

    <!-- inline scripts related to this page -->
    <script type="text/javascript" src="assets/js/ace-elements.min.js"></script>
    <script type="text/javascript" src="assets/js/ace.min.js"></script>
    <script type="text/javascript" src="assets/js/autoNumeric-1.5.4.js"></script>
    <script type="text/javascript" src="assets/js/agent-jquery.js"></script>
    <script type="text/javascript" src="assets/js/jquery.form-validator.min.js"></script>

    <script type="text/javascript">
        $.validate({
            modules : 'security',
        });
    </script>
    <script type="text/javascript">

    	var path_host = '';
        get_transfer_noti();

        var transferSound = '<?=$transfer_sound;?>';
        var audio6 = new Audio(transferSound);
        var audio6_playCount = 0;
        audio6.addEventListener('ended', () => {
            if(audio6_playCount < 2){
                setTimeout(displayTransferNotification, 500);
            }else{
                audio6_playCount = 0;
            }
        })

        setInterval(function(){ get_transfer_noti(); }, 10000);
        // var playTransferNotification = false;
        var countTransferNotification = {
            'deposit': 0, 'transfer': 0, 'withdraw': 0,
        }
        function get_transfer_noti()
        {
            $.ajax({
                url: 'inc/temp/transfer_noti_get_data.php',
                type: 'POST',
                dataType: 'json',
                // data: {param1: 'value1'},
            })
            .done(function(res) {
                $("#deposit-noti").hide();  
                if(res["data"]["deposit-noti"] > 0)
                {
                   $("#deposit-noti").text(res["data"]["deposit-noti"]);
                   $("#deposit-noti").show();  
                }else{
                   $("#deposit-noti").text(0); 
                } 

                $("#transfer-noti").hide();  
                if(res["data"]["transfer-noti"] > 0)
                {
                   $("#transfer-noti").text(res["data"]["transfer-noti"]);
                   $("#transfer-noti").show();  
                }else{
                   $("#transfer-noti").text(0); 
                }

                 $("#withdrawal-noti").hide();  
                if(res["data"]["withdrawal-noti"] > 0)
                {
                   $("#withdrawal-noti").text(res["data"]["withdrawal-noti"]);
                   $("#withdrawal-noti").show();  
                }else{
                   $("#withdrawal-noti").text(0); 
                } 

                if( countTransferNotification.deposit != res["data"]["deposit-noti"]     ||
                    countTransferNotification.transfer != res["data"]["transfer-noti"]   ||
                    countTransferNotification.withdraw != res["data"]["withdrawal-noti"]){
                    if(res["data"]["deposit-noti"] != 0 || res["data"]["transfer-noti"] != 0)
                     {
                         audio6.play();   
                     }
                }

                countTransferNotification.deposit = res["data"]["deposit-noti"];
                countTransferNotification.transfer = res["data"]["transfer-noti"];
                countTransferNotification.withdraw = res["data"]["withdrawal-noti"];
            })
            .fail(function() {
                console.log("error");
            })
            .always(function() {
                console.log("check transfer/withdraw notifications complete");
            });
        }

        function displayTransferNotification(){
            console.log('play ransfer notification')
            audio6.play();
            audio6_playCount++;
        }

        function pageContentLoader(type)
        {
            if(type == "show")
            {
                $('#pageContent').load('show');
                $('#pageContent').css('height','100vh');
            }else{
                $('#pageContent').load('hide');
                $('#pageContent').css('height','');
            }
        }

    	function getMenu(routes,param=""){

    
            try {
                clearInterval(lLoop);
            } catch(e) {
            }
            
            
            $('.submenu > li').removeClass('active');
            $('#pageContent').load('show');
            $('#pageContent').css('height','100vh');

                var path_url = path_host+routes+".php";
                    // path_url = (param!="") ? path_url+param : "";

                    if(param!="")
                    {
                         path_url = path_url+param;
                      
                    }

                $.ajax({
                    url: path_url,
                    type: 'POST',
                    dataType: 'json',
                    success: function (response) {

                            // console.log(response);
                            // console.log(response['temp']);
                        if(routes != '' && routes != undefined){
                            var menuId = replaceAll(routes,"/", "");
                            $('#'+menuId).addClass('active');

                        }else{
                            $('#home').addClass('active');

                        }
                       
                        $('#pageContent').load('hide');
                        $('#pageContent').css('height','');

                        $("#pageContent").html(response.temp);
                        $("#btitle").text(response.title);

                        if(response.sub_title != '' && response.sub_title != undefined){
                            $("#bsubtitle").text(response.sub_title);
                            $("#bsubtitle").show();
                        }else{
                            $("#bsubtitle").hide();
                        }
                    },
                    error: function (response) {
                        console.log(response);
                    }
                });

            if ($(window).width() < 991){ $("#sidebar").removeClass('display'); }
            if (routes != "soccerSummaryToday") { $("#showScore").html(""); }
    	}

        function popupPersonal(){
            $.ajax({
                url: path_host+"personalMessage.php",

                type: 'GET',
                dataType: 'json',
                success: function (response) {
                    // console.log(response);
                    $("#showModal").html(response.temp);
                    $("#viewLogModal").modal('show');

                },
                error: function (response) {
                    console.log(response);
                }
            });
        }
        function numPersonal(){
            $.ajax({
                url: path_host+"personalNumber.php",
                type: 'GET',
                dataType: 'json',
                success: function (response) {
                    var textNum = '('+response+')';
                    $(".numPersonal").text(textNum);
                    if(response > 0){
                        $(".numPersonal").css('color','red');
                    }
                }
            });
        }
        function changeLang(lang){

            parent.location.href='main.php?lang='+lang

            // var url = window.location.href;
            // var len = url.length;
            // var res = url.substr(len-1,1);
            // url = (res=='#'?url.substr(0,len-1):url);
            // // $.ajax({
            // //     url: path_host+"changeLang/" + lang,
            // //     type: "GET",
            // //     dataType: 'json',
            // //     success: function(res) {
            // //         if(res.status){
            // //             document.cookie = "MM8BETlang="+lang;
            // //             window.location.href = url;
            // //         }
            // //     }
            // // });
            // document.cookie = "MM8BETlang="+lang;
            // window.location.href = url;

        }

        function chkuser(){
            var getData=$.ajax({
                url:path_host+"chkuser.php",
                async:false,
                success:function(getData){
                    if(getData == 'logout'){
                        $('#chkuser').modal('show');
                        $('#chkuser').on('hidden.bs.modal', function () {
                            window.location = path_host+"logout.php";
                        });
                    }
                }
            }).responseText;
        }

        $(document).ready(function(){

            loadToken();
             setInterval(function(){                   
                  loadToken();
            },30000);


            function loadToken()
            {
                $.ajax({
                      url: 'token.php',
                      type: 'GET',
                      data: {randval: Math.random()},
                      cache: false
                  })
                  .done(function(data) {
                      // console.log("success");
                      $("#token").html(data)
                  })
                  .fail(function() {
                      // console.log("error");
                  })
                  .always(function() {
                      // console.log("complete");
                  });
            } 

            // $("#token").load('token.php');
            // var refreshId = setInterval(function() {
            //   $("#token").load('token.php?randval='+ Math.random());
            //   console.log('99999')
            // }, 10000);


            // setTimeout(function(){
                chkuser();
                numPersonal();
                $('.numeric').autoNumeric();
            // }, 5000);

            onInactive(7200000, function(){
                $('#inactive').modal('show');
                $('#inactive').on('hidden.bs.modal', function () {
                    window.location = path_host+"logout.php";
                });
            });

            function onInactive(ms, cb){
                var wait = setTimeout(cb, ms);
                document.onmousemove = document.mousedown = document.mouseup = document.onkeydown = document.onkeyup = document.focus = function(){
                    clearTimeout(wait);
                    wait = setTimeout(cb, ms);
                };
            }

            $(function(){
                setInterval(function(){
                    var getData=$.ajax({
                            url:path_host+"chkuser.php",
                            async:false,
                            success:function(getData){
                                if(getData == 'logout'){
                                    $('#chkuser').modal('show');
                                    $('#chkuser').on('hidden.bs.modal', function () {
                                        window.location = "logout.php";
                                    });
                                }
                            }
                    }).responseText;
                    numPersonal();
                },120000);
            });

            // var page = window.location.pathname.split("/")[{{ (env('APP_ENV') !='local')? 1 : 2 }}];
            // // console.log(page);
            // if(page != ''){
            //     if(page == undefined){

            //         $('#home').addClass('active');

            //     }else if(page == 'main'){

            //         $('#menuActive').addClass('open');

            //     }else{

            //         $('#'+page).addClass('active');
            //         $('#'+page).parent().parent().addClass('open');
            //     }
            // }else{
            //     $('#home').addClass('active');
            // }
            $(".date-picker").addClass('cur');

            // chang css left footer summaryToday on menu min
            var checkClass = $( "#sidebar" ).hasClass("menu-min");

            if(checkClass){

                $("#showScore").css("left","0");
            }else{

                $("#showScore").css("left","200");
            }

            $( "#sidebar-collapse" ).click(function() {

                var checkClass = $( "#sidebar" ).hasClass("menu-min");

                if(checkClass){

                    $("#showScore").css("left","+=200");
                }else{

                    $("#showScore").css("left","0");
                }
            });
            //--

        });
        

        function hoverMenu(e,slug)
        {
            var menu_img =  $(e).children('.menu-icon').children('.menu-img').data(slug);
             $(e).children('.menu-icon').children('.menu-img').attr("src",menu_img)
           
        }


    </script>
    <span id="token"></span>
</body>
</html>


