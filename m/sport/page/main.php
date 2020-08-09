<? session_start(); ?>
<? if($_GET["cmd"]=="logout" || $_SESSION["user_name"]==""){ 
session_destroy(); echo "<meta http-equiv='refresh' content='0;URL=../index.php'>"; 
exit();
} ?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="../img/football.ico">

    <title>Sport Online</title>


    <link href="../dist/css/bootstrap.min.css?v=2015" rel="stylesheet">
    <link href="../dist/css/theme.css" rel="stylesheet">
    <link href="../dist/css/font-awesome.min.css" rel="stylesheet" type="text/css" />
    <link href="../dist/css/main.css" rel="stylesheet">
    <link rel="stylesheet" href="../plugin/validate/dist/css/bootstrapValidator.css"/>
    <style type="text/css">
	.loader {
	position: fixed;
	left: 0px;
	top: 0px;
	width: 100%;
	height: 100%;
	z-index: 9999;
	background: url('../img/FhHRx.gif') 50% 50% no-repeat rgb(255,255,255); }
	</style>  
    <script src="../dist/js/jquery.min.js"></script>
    <script src="../dist/js/bootstrap.js"></script>
    <script src="../plugin/assets/js/ie-emulation-modes-warning.js"></script>
	<script src="../dist/js/jquery.validate.min.js"></script>

<?php /*?>	<script type="text/javascript">
		$(document).ready(function() {
			var bodyHeight = $("body").height();
			var vwptHeight = $(window).height();
				if (vwptHeight > bodyHeight) {
					$("footer#colophon").css("position","fixed").css("bottom",0);
				}
				else if (vwptHeight < bodyHeight) {
					$("footer#colophon").css("position","fixed").css("bottom",0);
				}
		});
	</script><?php */?>
    
<script type="text/javascript">
$(window).load(function() {
	$(".loader").fadeOut("slow");
})
</script>
<?php /*?><script>
	$(document).ready(function(){
    // to fade in on page load
    $("body").css("display", "none");
    $("body").fadeToggle( "slow", "linear" );
    // to fade out before redirect

})
</script><?php */?>
<!--.delay("fast").fadeIn();
.show( "slow" );-->

<script type="text/javaScript">
//เติม , (คอมมา)
function dokeyup( obj )
{
  var key = event.keyCode;
  if( key != 37 & key != 39 & key != 110 )
  {
    var value = obj.value;
    var svals = value.split( "." ); //แยกทศนิยมออก
    var sval = svals[0]; //ตัวเลขจำนวนเต็ม
  
    var n = 0;
    var result = "";
    var c = "";
    for ( a = sval.length - 1; a >= 0 ; a-- )
    {
      c = sval.charAt(a);
      if ( c != ',' )
      {
        n++;
        if ( n == 4 )
        {
          result = "," + result;
          n = 1;
        };
        result = c + result;
      };
    };
  
    if ( svals[1] )
    {
      result = result + '.' + svals[1];
    };
  
    obj.value = result;
  };
};

//ให้ text รับค่าเป็นตัวเลขอย่างเดียว
function checknumber()
{
  key = event.keyCode;
  if ( key != 46 & ( key < 48 || key > 57 ) )
  {
    event.returnValue = false;
  };
};
</script>
<script type="text/javascript">
<!--
function MM_jumpMenu(targ,selObj,restore){ //v3.0
  eval(targ+".location='"+selObj.options[selObj.selectedIndex].value+"'");
  if (restore) selObj.selectedIndex=0;
}
//-->
</script>
  </head>

<body style="background-color:#000000">
  <div class="loader"></div>
<? require("../inc/conn.php"); ?>


<? 
$selectstepbills = sql_query("SELECT * FROM tb_step WHERE step_user = '$_SESSION[user_name]' AND step_status='0'");
while($objstepbills = sql_fetch($selectstepbills)){
$strCurrDate = strtotime($objstepbills["step_date"]);
$DateExpires =  date("Y-m-d H:i:s", mktime(date("H",$strCurrDate)+0, date("i",$strCurrDate)+15, date("s",$strCurrDate)+0, date("m",$strCurrDate)+0  , date("d",$strCurrDate)+0, date("Y",$strCurrDate)+0));
if($DateExpires < date("Y-m-d H:i:s")){
$deletestepbills = sql_query("DELETE FROM tb_step WHERE step_user = '$_SESSION[user_name]' AND step_id='".$objstepbills["step_id"]."'");
}
}
?>


<? 
if($_REQUEST["cmd"]=="mixparlay" && $_REQUEST["subcmd"]=="delete" ){ 
$sqldeletemix = sql_query("DELETE FROM tb_step WHERE step_id = '".$_GET["id"]."'");
}

elseif($_REQUEST["subcmd"]=="select"){ 
$sqlselectmix = sql_query("SELECT * FROM tb_step WHERE step_date = '".$_POST["date"]."'");
$rows = mysql_num_rows($sqlselectmix);
if($rows=="0"){
$sqlinsertmix = sql_query("INSERT IGNORE INTO tb_step (step_user,step_mathid,step_team,step_bet,step_odd,step_price,step_status,step_date) VALUES ('".$_SESSION["user_name"]."','".$_POST["mathid"]."','".$_POST["team"]."','".$_POST["bet"]."','".$_POST["odd"]."','".$_POST["txtPricemathdphome"].$_POST["txtPricemathfulltop"].$_POST["txtPricemathhdpaway"].$_POST["txtPricemathfulldown"]."','0','".$_POST["date"]."')"); 
}
}


elseif($_REQUEST["subcmd"]=="save"){ ?>


<script type="text/javascript"> 
	$(document).ready(function(){
		$('#bettangsuccess').modal('show');
	});
</script>


<? } ?>  
<div class="modal fade" id="bettangsuccess" tabindex="-1" role="dialog" aria-labelledby="bettangsuccessLabel" aria-hidden="true">
    <div class="modal-dialog modal-xs">
        <div class="modal-content">
            <div class="modal-header" style="background-color:#666666; color:#FFFF00">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title thaisan" id="bettangsuccessLabel">บันทึกสำเร็จ</h4>
            </div>
            <div class="modal-body" style="color:#333333">   
            	<? if($_POST["cmd"]=="today"){ ?> 
            	<div class="row">
				<div class="col-xs-3" align="center"><i class="fa fa-check-circle fa-5x" style="color:#006600"></i></div>  
                <div class="col-xs-9 thaisan"> 
                         
                ออดซ์ : <strong style="color:#006600"><?=$_POST["odd"];?> (E)</strong><br>
                
                แทง : <strong style="color:#006600"><?=$_POST["txtPricemathdphome"];?><?=$_POST["txtPricemathfulltop"];?><?=$_POST["txtPricemathhdpaway"];?><?=$_POST["txtPricemathfulldown"];?></strong> บาท | จ่าย : <strong style="color:#006600">
				<? if($_POST["txtPricemathdphome"]!=""){ echo $_POST["txtPricemathdphome"]*$_POST["odd"]; }
				elseif($_POST["txtPricemathfulltop"]!=""){ echo $_POST["txtPricemathfulltop"]*$_POST["odd"]; }
				elseif($_POST["txtPricemathhdpaway"]!=""){ echo $_POST["txtPricemathhdpaway"]*$_POST["odd"]; }
				elseif($_POST["txtPricemathfulldown"]!=""){ echo $_POST["txtPricemathfulldown"]*$_POST["odd"]; }?></strong> บาท
                <br>
                
                
                วันที่ : <strong style="color:#006600"><?=DateThaiTime($_POST["date"]);?></strong> 

                
             
                </div>
                </div>  
                <? }elseif($_POST["cmd"]=="mixparlay"){ ?> 
                
<? $sqlselectbill = sql_query("SELECT * FROM tb_step WHERE step_status = '0' AND step_user = '$_SESSION[user_name]' ORDER BY step_date DESC"); ?>          
<? $i = 1; ?>
            	<div class="row">
				<div class="col-xs-3" align="center"><i class="fa fa-check-circle fa-5x" style="color:#006600"></i></div>  
                <div class="col-xs-9 thaisan">
                 ออดซ์ : <strong style="color:#006600"><?=$_POST["odd"];?> (E)</strong><br>
                
                แทง : <strong style="color:#006600"><?=$_POST["txtPricemathdphome"];?><?=$_POST["txtPricemathfulltop"];?><?=$_POST["txtPricemathhdpaway"];?><?=$_POST["txtPricemathfulldown"];?></strong> บาท | จ่าย : <strong style="color:#006600">
				<? if($_POST["txtPricemathdphome"]!=""){ echo $_POST["txtPricemathdphome"]*$_POST["odd"]; }
				elseif($_POST["txtPricemathfulltop"]!=""){ echo $_POST["txtPricemathfulltop"]*$_POST["odd"]; }
				elseif($_POST["txtPricemathhdpaway"]!=""){ echo $_POST["txtPricemathhdpaway"]*$_POST["odd"]; }
				elseif($_POST["txtPricemathfulldown"]!=""){ echo $_POST["txtPricemathfulldown"]*$_POST["odd"]; }?></strong> บาท
                <br>
                
                
                วันที่ : <strong style="color:#006600"><?=DateThaiTime($_POST["date"]);?></strong> 
                </div>
                </div>
                <hr>
<? while($objselectbill = sql_fetch($sqlselectbill)){ ?>
<div class="row" style="background-color:#FFFFFF; color:#333333; font-size:12px" align="left">
<div class="col-xs-3">
<button class="btn btn-primary btn-block btn-xs" type="button" data-toggle="collapse" data-target="#collapseExampleE<?=$objmatch2["mat_id"];?><?=$i;?>" aria-expanded="false" aria-controls="collapseExampleE<?=$objmatch2["mat_id"];?><?=$i;?>">
สเต็ป <?=$i;?> 
</button>
</div>

<div class="col-xs-9">
แทง : <font color="#0066FF"><?=$objselectbill["step_bet"];?></font> | เมื่อ : <span style="color:#006600"><?=DateThaiTime($objselectbill["step_date"]);?></span> 
<div class="collapse" id="collapseExampleE<?=$objmatch2["mat_id"];?><?=$i;?>">
  <div class="well">
  				คู่ : <?=$objselectbill["step_team"];?><br />
    			ออดซ์ : <strong style="color:#006600"><?=$objselectbill["step_odd"];?> (E)</strong><br />
                แทง : <strong style="color:#FF0000"><?=$objselectbill["step_price"];?> <i class="fa fa-btc"></i></strong>
  </div>
</div>
</div>
</div>
<? $i++; ?>
<? } ?>
 
                <? } ?>
                
                
                
                
                        
            </div>    
        </div>
    </div>
</div>
  
<? 
$profile = sql_array("SELECT * FROM tb_user WHERE user_name	= '$_SESSION[user_name]'"); 
?> 	

    <nav>
        <ul class="list-unstyled main-menu" style="background-color:#222222">
          
          <!--Include your navigation here-->
          
          <li class="text-right"><a href="#" id="nav-close"><i class="fa fa-list white"></i></a></li>
          <li>
          <center><span class="thaisan" style="color:#FFFFFF"><strong>ข้อมูลส่วนตัว</strong></span></center>
          <span class="thaisan" style="color:#FFFFFF">เครดิต</span><span class="thaisan" style="float:right; color:#0099FF"><?=number_format($profile["user_credit"],2);?> บาท</span><br>
          <span class="thaisan" style="color:#FFFFFF">ยอดเล่นค้าง</span><span class="thaisan" style="float:right; color:#FF0000"><?=number_format($profile["user_outbl"],2);?> บาท</span><br>
          <span class="thaisan" style="color:#FFFFFF">เครดิตที่ได้รับ</span><span class="thaisan" style="float:right; color:#66CC00"><?=number_format($profile["user_rcredit"],2);?> บาท</span><br>
          
          </li>
          <li class="thaisan"><a data-toggle="modal" data-target="#news" style="cursor:pointer">ข่าวสาร <span class="icon"></span></a></li>
          <li class="thaisan"><a data-toggle="modal" data-target="#changepsw" style="cursor:pointer">เปลี่ยนรหัสผ่าน <span class="icon"></span></a></li>
          <!--<li><a href="#">Dropdown</a>
            <ul class="list-unstyled">
                <li class="sub-nav"><a href="#">Sub Menu One <span class="icon"></span></a></li>
                <li class="sub-nav"><a href="#">Sub Menu Two <span class="icon"></span></a></li>
                <li class="sub-nav"><a href="#">Sub Menu Three <span class="icon"></span></a></li>
                <li class="sub-nav"><a href="#">Sub Menu Four <span class="icon"></span></a></li>
                <li class="sub-nav"><a href="#">Sub Menu Five <span class="icon"></span></a></li>
            </ul>
          </li>-->
          <li class="thaisan"><a href="main.php?cmd=logout">ออกจากระบบ <span class="glyphicon glyphicon-log-out"></span></a></li>
        </ul>
      </nav>
          
    <div class="navbar navbar-inverse navbar-fixed-top" style="color:#000000">      
        
        <!--Include your brand here-->
       
        <!--<a class="navbar-brand" href="main.php"><span class="thaisan"><i class="fa fa-dribbble"></i> วันนี้</span></a>

        <a class="navbar-brand" href="main.php"><span class="thaisan">มิกซ์พาเลย์</span></a>

        <a class="navbar-brand" href="main.php"><span class="thaisan">ลีก</span></a>-->
        <a class="navbar-brand" style="padding:0px">
        <ul class="nav nav-tabs">

            <li style="margin-top:2px"><a href="main.php" style="background-color:#222222; text-decoration:none; border:0px; color:#FFFFFF"><strong class="thaisan"><i class="fa fa-home fa-2x" style="color:#FFFFFF"></i></strong></a></li>
    		<li style="margin-top:6px"><a data-toggle="tab" href="#today" style="background-color:#222222; text-decoration:none; border:0px; color:#FFFFFF"><strong class="thaisan"><i class="fa fa-refresh fa-spin"></i> วันนี้</span></strong></a></li>
            <li style="margin-top:6px"><a data-toggle="tab" href="#mix" style="background-color:#222222; text-decoration:none; border:0px; color:#FFFFFF"><strong class="thaisan">มิกซ์พาเลย์</strong></a></li>
            <li style="margin-top:6px"><a data-toggle="modal" data-target="#league" style="cursor:pointer; background-color:#222222; text-decoration:none; border:0px; color:#FFFFFF"><strong class="thaisan"><i class="fa fa-dribbble"></i> ลีก</strong></a></li>
  		</ul>
        </a>
		

        <div class="navbar-header pull-right">
          <a id="nav-expander" class="nav-expander fixed">
            &nbsp;<i class="fa fa-list fa-lg white"></i>
          </a>
        </div>
    </div>


<div class="container-fluid" style="margin-top:50px; color:#FFFFFF">
<div class="row">
	<div class="col-xs-4ths" style="margin-top:10px"><!--<a href="main.php?cmd=matchscore" style="text-decoration:none">--><a data-toggle="modal" data-target="#score" style="cursor:pointer; text-decoration:none"><button class="btn btn-success btn-block thaisan" style="margin-bottom:5px; background-color:#333333; border:1px solid #FFFFFF"><i class="fa fa-list-alt"></i> ผลบอล</button></a></div>
	<div class="col-xs-8ths" style="margin-top:10px"><!--<a href="main.php?cmd=mybet" style="text-decoration:none">--><a data-toggle="modal" data-target="#mybet" style="cursor:pointer; text-decoration:none"><button class="btn btn-warning btn-block thaisan" style="margin-bottom:5px; background-color:#333333; border:1px solid #FFFFFF"><i class="fa fa-btc"></i> เดิมพันของฉัน <span class="badge" style="background-color:#FF0000;color:#FFFFFF">1</span> <span class="badge" style="background-color:#0066CC; color:#FFFFFF">2</span></button></a></div>
 </div>   
 

 
<div class="row">    
    <div class="tab-content">
            	<div id="today" class="tab-pane fade <? if($_REQUEST["cmd"]=="today" || $_REQUEST["cmd"]==""){ ?>in active<? } ?>" align="center">
                	<? require("today.php"); ?>                              
                </div>
                <div id="mix" class="tab-pane fade <? if($_REQUEST["cmd"]=="mixparlay"){ ?>in active<? } ?>" align="center">
                    <? require("mixparlay.php"); ?> 
                </div>    
    </div>
</div>


</div>










<!------------------------------------------------myscore------------------------------------------------>    
<div class="modal fade" id="score" tabindex="-1" role="dialog" aria-labelledby="scoreLabel" aria-hidden="true">
	<div class="modal-dialog modal-lg">
		<div class="modal-content">

    <div class="row">
        <div class="modal-header" style="background-color:#666666">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title thaisan" style="color:#FFFF00" align="center">ผลบอล</h4>
        </div>
    </div>
    
<? $sqlmatchscore = sql_array("SELECT * FROM tb_matchscore 
INNER JOIN tb_league ON
tb_matchscore .mats_topic = tb_league.league_code 
WHERE mats_topic = 'MAT01' ORDER BY mats_time ASC");?>

<div class="row">
    <div class="col-xs-12 thaisan" align="center" style="background-color:#3b5998; color:#FFFFFF; padding-top:5px; padding-bottom:5px"><?=$sqlmatchscore["league_name"];?></div>


	<? $sqlmatchscore = sql_query("SELECT * FROM tb_matchscore WHERE mats_topic = 'MAT01' ORDER BY mats_time ASC");?>             
    <? while($objmatchscore = sql_fetch($sqlmatchscore)){ ?>
        <div class="row" style="margin:0px; padding:0px; border-bottom:1px solid #E0E0E0; color:#333333; background-color:#EFEFEF">
            <div class="col-xs-2" style="margin-top:10px"><?=substr($objmatchscore["mats_time"], 0, 5);?></div>
            <div class="col-xs-6 thaisan">
			<? if($objmatchscore["mats_team1scorea"] > $objmatchscore["mats_team2scorea"]){ ?><u><font color="#FF0000"><?=$objmatchscore["mats_teamname1"];?></font></u>
            <br />
			<?=$objmatchscore["mats_teamname2"];?>
            <? }elseif($objmatchscore["mats_team2scorea"] > $objmatchscore["mats_team1scorea"]){ ?><?=$objmatchscore["mats_teamname1"];?>
            <br />
            <u><font color="#FF0000"><?=$objmatchscore["mats_teamname2"];?></font></u>
            <? }else{ ?>
            <?=$objmatchscore["mats_teamname1"];?><br />
            <?=$objmatchscore["mats_teamname2"];?>
            <? } ?>
        	</div>

            <div class="col-xs-1" style="margin-top:10px; color:#006600">HF.</div>
            <div class="col-xs-1">
            <font color="#3b5998"><strong><?=$objmatchscore["mats_team1scoreb"];?></strong></font><br />
            <font color="#3b5998"><strong><?=$objmatchscore["mats_team2scoreb"];?></strong></font>
            </div>
            <div class="col-xs-1" style="margin-top:10px; color:#FF0000">FT.</div>
            <div class="col-xs-1">
            <font color="#3b5998"><strong><?=$objmatchscore["mats_team1scoreb"];?></strong></font><br />
            <font color="#3b5998"><strong><?=$objmatchscore["mats_team2scoreb"];?></strong></font>
            </div>
		</div>
	<? } ?>
</div>


<? $sqlmatchscore2 = sql_array("SELECT * FROM tb_match 
INNER JOIN tb_league ON
tb_match.mat_topic = tb_league.league_code 
WHERE mat_topic = 'MAT02' ORDER BY mat_time ASC");?>

<div class="row">
	<div class="col-xs-12 thaisan" align="center" style="background-color:#3b5998; color:#FFFFFF; padding-top:5px; padding-bottom:5px"><?=$sqlmatchscore2["league_name"];?></div>   
 
<? $sqlmatchscores2 = sql_query("SELECT * FROM tb_matchscore WHERE mats_topic = 'MAT02' ORDER BY mats_time ASC");?>
                
<? while($objmatchscore2 = sql_fetch($sqlmatchscores2)){ ?>

        <div class="row" style="margin:0px; padding:0px; border-bottom:1px solid #E0E0E0; color:#333333; background-color:#EFEFEF">
            <div class="col-xs-2" style="margin-top:10px"><?=substr($objmatchscore2["mats_time"], 0, 5);?></div>
            <div class="col-xs-6 thaisan">
            <? if($objmatchscore2["mats_team1scorea"] > $objmatchscore2["mats_team2scorea"]){ ?><u><font color="#FF0000"><?=$objmatchscore2["mats_teamname1"];?></font></u>
            <br />
            <?=$objmatchscore2["mats_teamname2"];?>
            <? }elseif($objmatchscore2["mats_team2scorea"] > $objmatchscore2["mats_team1scorea"]){ ?><?=$objmatchscore2["mats_teamname1"];?>
            <br />
            <u><font color="#FF0000"><?=$objmatchscore2["mats_teamname2"];?></font></u>
            <? }else{ ?>
            <?=$objmatchscore2["mats_teamname1"];?><br />
            <?=$objmatchscore2["mats_teamname2"];?>
            <? } ?>
            </div>
            <div class="col-xs-1" style="margin-top:10px; color:#006600">HF.</div>
            <div class="col-xs-1">
            <font color="#3b5998"><strong><?=$objmatchscore2["mats_team1scoreb"];?></strong></font><br />
            <font color="#3b5998"><strong><?=$objmatchscore2["mats_team2scoreb"];?></strong></font>
            </div>
            <div class="col-xs-1" style="margin-top:10px; color:#FF0000">FT.</div>
            <div class="col-xs-1">
            <font color="#3b5998"><strong><?=$objmatchscore2["mats_team1scoreb"];?></strong></font><br />
            <font color="#3b5998"><strong><?=$objmatchscore2["mats_team2scoreb"];?></strong></font>
		</div>
</div>
<? } ?>               
</div>                


		</div>
	</div>
</div>
    

<!------------------------------------------------mybet------------------------------------------------>
<div class="modal fade" id="mybet" tabindex="-1" role="dialog" aria-labelledby="mybet" aria-hidden="true">
	<div class="modal-dialog modal-lg">
		<div class="modal-content">
    
    
    <div class="row" align="center">
    
    	<div class="modal-header" style="background-color:#666666">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title thaisan" style="color:#FFFF00">เดิมพันของฉัน</h4>
        </div>


        <ul class="nav nav-tabs" style="border:0px;">
    		<li style="width:50%"><a data-toggle="tab" href="#billtang" style="background-color:#3b5998; text-decoration:none; border:0px; color:#FFFFFF"><strong class="thaisan">บิล เต็ง</span></strong></a></li>
            <li style="width:50%"><a data-toggle="tab" href="#billstep" style="background-color:#222222; text-decoration:none; border:0px; color:#FFFFFF"><strong class="thaisan">บิล สเต็ป</strong></a></li>
  		</ul>
        
		<div class="tab-content">
			<div id="billtang" class="tab-pane fade in active" align="center">
                
                
                <? for($i=1;$i<10;$i++){ ?>
                	<div class="row" style="margin:0px; padding:0px; border-bottom:1px solid #E0E0E0; color:#333333; background-color:#EFEFEF">
                    	<div class="col-xs-6 thaisan" align="left"><strong>บิลเลขที่ : 10<?=$i;?></strong> <br><strong>ออด
ซ์ 2.000 (E)</strong> <br> 
<strong>TB : 150.00</strong></div>
                        <div class="col-xs-6" align="right" style="font-size:10px; margin-top:5px"><strong>วันที่ : 1<?=$i;?>/06/2558 | 11:00 น.</strong><br>
<button type="button" class="btn btn-warning thaisan" style="border:2px solid #333333; color:#333333; background-color:#FFFF99"><strong>รอ</strong></button></div>
                    </div>
 					<div class="row" style="margin:0px; padding:0px; border-bottom:3px solid #000000;border-left:3px solid #000000;border-right:3px solid #000000; border-top:1px solid #000000; color:#333333; background-color:#DFE6FD;font-size:12px">
                    	<div class="col-xs-1" style="margin-top:15px"><strong><?=$i;?></strong></div>
                        <div class="col-xs-8" align="left">
                        <font color="#FF0000">red</font> -VS- <font color="#0066FF">blue</font><br>สกอร์ต่ำกว่า -<br>
						3*1/2 + 4 @2.00 เตะ <font color="#3b5998">[07:00]</font> ผล <font color="#FF0000">[?:?]</font>
                        </div>
                        <div class="col-xs-3 thaisan">รอผล</div>
                    </div>
                 <? } ?>   
                   
                    
				</div>
			<div id="billstep" class="tab-pane fade" align="center">2222</div>
       	</div>
   	</div>
    
		</div>
	</div>
</div>



<!------------------------------------------------league------------------------------------------------>
<div class="modal fade" id="league" tabindex="-1" role="dialog" aria-labelledby="league" aria-hidden="true">
	<div class="modal-dialog modal-lg">
		<div class="modal-content">
    
    
    		<div class="row" align="center">
    
            <div class="modal-header" style="background-color:#666666">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                        <h4 class="modal-title thaisan" style="color:#FFFF00">ลีก</h4>
            </div>


                
                <? $sqlleague = sql_query("SELECT * FROM tb_league ORDER BY league_name ASC");?>
                <? while($objleague = sql_fetch($sqlleague)){ ?>
                	<div class="row" style="margin:0px; padding:0px; border-bottom:1px solid #E0E0E0; color:#333333; background-color:#EFEFEF">
                    	<div class="col-xs-3 thaisan" align="left" style="margin-top:10px; margin-bottom:10px"><strong><?=$objleague["league_code"];?></strong></div>
                        <div class="col-xs-9 thaisan" align="left" style="margin-top:10px; margin-bottom:10px"><strong><?=$objleague["league_name"];?></strong></div>
                    </div>
                 <? } ?>   
                   
      		</div>        
    
		</div>
	</div>
</div>



<!------------------------------------------------news------------------------------------------------>
<div class="modal fade" id="news" tabindex="-1" role="dialog" aria-labelledby="news" aria-hidden="true">
	<div class="modal-dialog modal-lg">
		<div class="modal-content">
    
    
    		<div class="row" align="center">
    
            <div class="modal-header" style="background-color:#666666">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                        <h4 class="modal-title thaisan" style="color:#FFFF00">ข่าวสาร</h4>
            </div>


                
                <? $sqlnews = sql_query("SELECT * FROM tb_news ORDER BY news_date DESC");?>
                <? while($objnews = sql_fetch($sqlnews)){ ?>
                	<div class="row" style="margin:0px; padding:0px; border-bottom:1px solid #E0E0E0; color:#333333; background-color:#EFEFEF">
                    	<div class="col-xs-12 thaisan" align="left" style="margin-top:10px; margin-bottom:10px">
                        <strong><?=$objnews["news_topic"];?></strong><br />
                        <?=$objnews["news_detail"];?><br />
						<span style="float:right"><strong><?=DateThaiTime($objnews["news_date"]);?></strong></span>                     
                        </div>
                    </div>
                 <? } ?>   
                   
      		</div>        
    
		</div>
	</div>
</div>


<!------------------------------------------------change psw------------------------------------------------>
<div class="modal fade" id="changepsw" tabindex="-1" role="dialog" aria-labelledby="changepsw" aria-hidden="true">
	<div class="modal-dialog modal-lg">
		<div class="modal-content">
    
    
    		<div class="row" align="center" style="background-color:#FFFFFF">
    
            <div class="modal-header" style="background-color:#666666">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                        <h4 class="modal-title thaisan" style="color:#FFFF00">เปลี่ยนรหัสผ่าน</h4>
            </div>


                
         <form name="changepsws" method="post" id="changepsws" action="main.php?cmd=changepsw&subcmd=save">
        <div class="modal-body">
        <div class="form-group">
            <label for="oldpassword" class="control-label thaisan" style="float:left">รหัสผ่านเดิม</label>
            <input type="password" class="form-control" name="txtOldpassword" id="txtOldpassword">          
          </div>      
          
          <div class="form-group">
            <label for="newpassword" class="control-label thaisan" style="float:left">รหัสผ่านใหม่</label>
            <input type="password" class="form-control" name="txtNewpassword" id="txtNewpassword" placeholder="ความยาว รหัสผ่าน > หรือ = 6 อักขระ">                                        
          </div>    
          
          <div class="form-group">
            <label for="cnewpassword" class="control-label thaisan" style="float:left">ยืนยันรหัสผ่านใหม่</label>
            <input type="password" class="form-control" name="txtCnewpassword" id="txtCnewpassword" placeholder="ความยาว รหัสผ่าน > หรือ = 6 อักขระ">                                        
          </div> 
        </div>  
			
		<div class="modal-footer thaisan">
          <button type="button" class="btn btn-default" data-dismiss="modal">ปิด</button>
          <button type="reset" class="btn btn-primary">ล้างข้อมูล</button>
          <button type="submit" class="btn btn-primary" OnClick="JavaScript:doCallAjaxEditPasswordUser();">บันทึก</button>
      	</div>
		</form>
                   
      		</div>        
    
		</div>
	</div>
</div>
       
       
       
<script>
$(document).ready(function () {

    $('#changepsws').validate({
        rules: {
            txtOldpassword: {
                minlength: 6,
                required: true
            },
            txtNewpassword: {
                minlength: 6,
                required: true
            },
			txtCnewpassword: {
                minlength: 6,
                required: true
            }
        },
    highlight: function(element) {
        var id_attr = "#" + $( element ).attr("id") + "1";
        $(element).closest('.form-group').removeClass('has-success').addClass('has-error');
        $(id_attr).removeClass('glyphicon-ok').addClass('glyphicon-remove');         
    },
    unhighlight: function(element) {
        var id_attr = "#" + $( element ).attr("id") + "1";
        $(element).closest('.form-group').removeClass('has-error').addClass('has-success');
        $(id_attr).removeClass('glyphicon-remove').addClass('glyphicon-ok');         
        }
    });

});
</script>
       
       
       
			<script>
            $(document).ready(function(){												
           
           //Navigation Menu Slider
            $('#nav-expander').on('click',function(e){
                e.preventDefault();
                $('body').toggleClass('nav-expanded');
            });
            $('#nav-close').on('click',function(e){
                e.preventDefault();
                $('body').removeClass('nav-expanded');
            });
            
            
            // Initialize navgoco with default options
            $(".main-menu").navgoco({
                caret: '<span class="caret"></span>',
                accordion: false,
                openClass: 'open',
                save: true,
                cookie: {
                    name: 'navgoco',
                    expires: false,
                    path: '/'
                },
                slide: {
                    duration: 300,
                    easing: 'swing'
                }
            });
      
                
          });
          </script>
      
		<script type="text/javascript">
        $('#exampleModal').on('show.bs.modal', function (event) {
        })
        </script>     
        <script type="text/javascript">
        $('#editpassworduser').on('show.bs.modal', function (event) {
          var button = $(event.relatedTarget) // Button that triggered the modal
          var recipient = button.data('whatever') // Extract info from data-* attributes
          // If necessary, you could initiate an AJAX request here (and then do the updating in a callback).
          // Update the modal's content. We'll use jQuery here, but you could use a data binding library or other methods instead.
          var modal = $(this)
          modal.find('.modal-title').text('แก้ไขรหัสผ่าน ' + recipient)
          modal.find('.modal-body input').val(recipient)
        })
        </script>
    </body>
</html>


