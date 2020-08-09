<?
if($_GET['Market']=='l' && $_GET['Sport']=='1' && $_GET['RT']=='W' && $_GET['Game']==0 && $_GET['Combo']=='3' && $_GET['key']=='lodds' && $_GET['Page']=='AllSingleOdds'){
?>
<script type='text/javascript'>parent.SingleLastSport='1';</script><script type='text/javascript'>parent.NowTime='03/12/2019 00:58:07'; parent.arr_League=new Array('0');parent.IsSaveLeague=false;</script><script type='text/javascript'>
window.setTimeout("parent.updateDate(2)",10);</script>
<script type='text/javascript'>
var N1l=[];

window.setTimeout("parent.ShowBetList('W','03/12/2019 00:45:18','1l',N1l)",10);
</script><script type='text/javascript'>parent.CloseOddsTr_L(true,false);</script><script> parent.REFRESH_INTERVAL_L=20000; parent.REFRESH_INTERVAL_D=90000; parent.REFRESH_INTERVAL=90000 ; </script>
<?
}elseif($_GET['Market']=='d' && $_GET['Sport']=='1' && $_GET['RT']=='W' && $_GET['Game']==0 && $_GET['Combo']=='3' && $_GET['key']=='dodds' && $_GET['Page']=='AllSingleOdds' && $_GET['PageType']=='F'){
?>
<script type='text/javascript'>parent.haveOutgight=false;</script><script type='text/javascript'>parent.SingleLastSport='1';</script><script type='text/javascript'>parent.NowTime='03/12/2019 00:58:13'; parent.arr_League=new Array('0');parent.IsSaveLeague=false;</script><script type='text/javascript'>
window.setTimeout("parent.updateDate(2)",10);</script>
<script type='text/javascript'>
var N1t=[];
N1t[0]=['0129080071','29080071','011004','1','1837','ยูฟ่า แชมเปี้ยนส์ลีก','ยูเวนตุส','อัตเลตีโก มาดริด','201903121559','1','1','0','<font color=red>LIVE</font> 04:00AM','0','1','0','','False','0','0','0','0','0','0','0','75','True','False','3','False','True','0','184304583','0.5-1','0.93','-0.99','h','184304576','2-2.5','0.95','0.95','184304570','1.69','3.65','5.50','184304561','0-0.5','0.90','1.00','h','184304557','0.5-1','0.74','-0.84','184304529','2.38','2.10','5.50'];
N1t[1]=['','29080071','','2','','','','','','','','','','0','','','','False','0','0','0','0','0','0','0','75','True','False','1','False','True','0','184393191','0.5','0.70','-0.76','h','184393194','2.5','-0.80','0.70','','','','','184393202','0.5','-0.71','0.61','h','184393203','1.0','-0.85','0.75','','','',''];
N1t[2]=['','29080071','','3','','','','','','','','','','0','','','','False','0','0','0','0','0','0','0','75','True','False','1','False','True','0','187197284','1.0','-0.75','0.69','h','187197288','2.0','0.69','-0.79','','','','','','','','','','','','','','','','',''];

window.setTimeout("parent.ShowBetList('W','03/12/2019 00:58:07','1t',N1t)",10);

var N=new Array(0);
window.setTimeout("parent.showOutrightOddsDisplay('W','03/12/2019 00:08:45','')",10);
</script><script> parent.REFRESH_INTERVAL_L=20000; parent.REFRESH_INTERVAL_D=90000; parent.REFRESH_INTERVAL=90000 ; </script>
<?}?>

<?
$arr_League = explode(",", $_GET['SelectLeague']);
?>
<script>parent.arr_League=<? echo json_encode($arr_League); ?>;</script>