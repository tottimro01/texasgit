 <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        ตรวจบิลซ้ำ
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> หน้าแรก</a></li>
        <li><a href="#"><i class="fa fa-file-text"></i> บิล</a></li>
        <li class="active">ตรวจบิลซ้ำ</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">

      <div class="box">      
        <div class="box-header">
          <h3 class="box-title"></h3>
        </div>
        <div class="box-header">

    <!-- /.content -->
<?
/*
  $m_user=array();
  $m_name=array();
$url_file=$server_js."txt/json/member.json";  
$d_js=file_get_contents($url_file);
$d_bet = json_decode($d_js, true);
foreach($d_bet as $rs){
  $m_user[$rs[m_id]]=$rs[m_user];
  $m_name[$rs[m_id]]=$rs[m_name];
  }
*/
?>
<div class="row">
    <div class="col-md-2 col-sm-12 col-xs-12 mb-1">
      <label class="control-label text-left label-1" style="float: left; width: 80px; line-height: 30px;" for="username"> Log วันที่   </label>
        <select class="form-control" onchange="_w('?p=<?=$_GET[p];?>&d='+this.value);" style="width: calc(100% - 80px);">
        <? 
        for($xx=0;$xx<=30;$xx++)
        {
          $ddd=date("d-m-Y",mktime(date("H")+$timezone,date("i"),date("s"),date("m"),date("d")-$xx,date("Y")));
        ?>
        <option value="<?=$ddd;?>" <? if($_GET[d]==$ddd){echo'selected="selected"';}?>><?=$ddd;?></option>
      <? }?>
      </select>   
    </div>  
</div>
<p>

<style type="text/css">
.
table{border-collapse:collapse;}
.ball td{border:1px  solid #262929; height:25px;   font-family: Tahoma, Geneva, Arial, Helvetica, sans-serif; padding: 5px;}
tr.log_tb:nth-child(odd) {background-color: #f2f2f2;}
tr.log_tb:nth-child(even) {background-color: #94b3ef;}
</style>

<div class="box-body table-responsive p-0">
<table width="70%" border="0" cellspacing="0" cellpadding="5" class="ball" >
  <tr class="cw bb" >
    <td width="18%" align="center" bgcolor="#666">Date</td>
    <td width="11%" align="center" bgcolor="#666">TXT</td>
    <td width="9%" align="center" bgcolor="#666">Bill ID</td>
    <td width="13%" align="center" bgcolor="#666">IN</td>
    <td width="14%" align="center" bgcolor="#666">SUM</td>
    <td width="10%" align="center" bgcolor="#666">MID</td>
    <td width="14%" align="center" bgcolor="#666">RID</td>
    <td width="11%" align="center" bgcolor="#666">ถอน</td>
  </tr>
<?
$blast=0;
$ed=@explode("-",$_GET[d]);
$view_date="$ed[2]-$ed[1]-$ed[0] ";

  $arr_n = array();
  
$sql="select * from bom_tb_all_payment where   bap_date like '$view_date%'    and bap_in>0    order by bill_id desc,  bap_id desc limit 5000";
$re=sql_query($sql);
while($rs=sql_fetch($re)){
  $str = $rs["bap_comment"]."_".$rs["bill_id"]."_".$rs["m_id"]."_".$rs["bap_in"];
  $key_code = base64_encode($str);
  $arr_n[$key_code][] = $rs;
  
}

  //print_r($arr_n);
  foreach($arr_n as &$re){
    foreach($re as &$rs){
############1#############
      $jmb = sql_array("select * from bom_tb_member where m_id = '$rs[m_id]'");
//$url_file=$server_js."txt/json/member/".$rs[m_id].".json";  
//$d_js = file_get_contents2($url_file);
//$jmb = json_decode($d_js, true);
############1#############
?>
    
  <tr class="log_tb">
    <td align="center" <? if(count($re)>1){echo'style="background:#F90;"';}?>><?=$rs[bap_date];?></td>
    <td <? if(count($re)>1){echo'style="background:#F90;"';}?>><?=$rs[bap_comment];?><? if($rs[bap_play_type]==2 || $rs[bap_play_type]==3){ echo "Play ID : ".$rs[play_id]; } ?></td>
    <td align="center"  <? if(count($re)>1){echo'style="background:#F90;"';}?>><?=$rs[bill_id];?></td>
    <td align="right" <? if(count($re)>1){echo'style="background:#F90;"';}?>><?=number_format($rs[bap_in],2);?>&nbsp;&nbsp;</td>
    <td align="right" <? if(count($re)>1){echo'style="background:#F90;"';}?>><?=number_format($rs[bap_after],2);?>&nbsp;&nbsp;</td>
    <td align="center" <? if(count($re)>1){echo'style="background:#F90;"';}?>><?=$jmb[m_user];?>[<?=$jmb[m_id];?>]</td>
    <td align="center" <? if(count($re)>1){echo'style="background:#F90;"';}?>><?=$rs[r_id];?>
    <? if($rs["bill_id"]==$blast and $rs[d_txt]=="ATยกเลิกบิล"){
    echo "####update bom_tb_member set m_count = m_count-$rs[bap_in] where m_id = $rs[m_id]";
    } ?></td>
    <td align="center" <? if(count($re)>1){echo'style="background:#F90;"';}?>>
    <?
    //echo count($re);
    $nfile = md5($rs[bill_id]."_".$rs[bap_comment]);
$nwfile = "json_log/".$nfile.".json";
$arr_setting = json_read($nwfile);

$nclick = count($re)-$arr_setting["click"];


if(count($re)>1 and $nclick!=1){
    ?>
    <a style="color: red; text-decoration: underline; font-weight: bold;" href="log_cut.php?mid=<?=$rs[m_id];?>&billid=<?=$rs[bill_id];?>&sum=<?=$rs[bap_in];?>&dtype=<?=$rs[bap_comment];?>&nclick=<?=count($re);?>" target="_blank"><?=number_format($rs[bap_in],2);?></a>
    <? } ?>
    &nbsp;&nbsp;
    </td>
  </tr>
  
  
  
  <?
  $blast=$rs[bill_id];
   }
  
  }
  ?>
</table>
</div>



</p>

 </div>
</div>

</section>



