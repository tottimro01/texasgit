<?
session_start();
// require('lang/member_lang.php');
  require("lang/variable_lang.php");

if($_GET['IsFromWaitingBtn']=='yes'){?>
<script>
<!--
var data='<div align="center">' + '<?=$lang_member[957];?>' + '</div><div align="center" id="lastrefresh" style="display: none">{{lbl_countDown}} : <span id="lastrefresh_time"></span></div><div align="center" id="checkStatus" style="display: none">{{lbl_checkStatus}}</div>   ';
parent.loadWaitingBetList();
parent.refreshAccountInfo('mini');
//-->
</script>
<?}else{?>
<script>
<!--
var data='<div align="center">No Void Bet</div><div align="center" id="lastrefresh" style="display: none">{{lbl_countDown}} : <span id="lastrefresh_time"></span></div><div align="center" id="checkStatus" style="display: none">{{lbl_checkStatus}}</div>   ';
parent.loadVoidTicket();
//-->
</script>
<?}?>
