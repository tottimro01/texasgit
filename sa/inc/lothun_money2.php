<?php 

$nview=$_SESSION[rlevel];
$rview=$nview+1;


if($_GET['rob']==""){
	$_GET['rob']=1;
	}
$zone=$_GET['zone'];
$rob=$_GET['rob'];
$date=$_GET['d'];
$sql="select * from bom_tb_lotto_ok where lot_zone='$zone' and lot_rob='$rob' and ok_date='$date' order by ok_id desc limit 1";
$re_ok=sql_array($sql);

$ok_id=$re_ok['ok_id'];
$o_active=$re_ok['o_active'];
if($o_active==0){
	$tb="bom_tb_lotto_bill_play_live";
	}else{
	$tb="bom_tb_lotto_bill_play";	
	}

$mset=$_GET['mset'];
$title_set = "";
if($mset!=""){
$tmset=" and b_setbet='$mset'";
if($mset==1){
  $title_set = "<h3>ข้อมูลการเล่นแบบ A</h3>";
}else if($mset==2){
  $title_set = "<h3>ข้อมูลการเล่นแบบ B</h3>";
}else if($mset==3){
  $title_set = "<h3>ข้อมูลการเล่นแบบ C</h3>";
}

}
  
$r_user=array();
$r_name=array();
$r_level=array();

$sql="select * from bom_tb_agent  where   r_level=1 ";
$re=sql_query($sql);
while($rs=sql_fetch($re)){
  $r_user[$rs[r_id]]=$rs[r_user];
  $r_name[$rs[r_id]]=$rs[r_name];
  $r_level[$rs[r_id]]=$rs[r_level];

}

   
$m_user=array();
$m_name=array();
#$m_count=array();
$sql="select * from bom_tb_member where  1 ";
$re=sql_query($sql);
while($rs=sql_fetch($re)){
  $m_user[$rs[m_id]]=$rs[m_user];
  $m_name[$rs[m_id]]=$rs[m_name];

}

?>

<style>
	
th {
    text-align: center;
}

.xsboku
{
	height: 50px;
}

</style>
<section class="content-header">
  <h1>
    สรุปรวม 
    <small><?=$title_set?></small>
  </h1>
  <ol class="breadcrumb">
    <li><a href="#"><i class="fa fa-dashboard"></i> หน้าแรก</a></li>
    <li><a href="#"><i class="fa fa-dashboard"></i> หวย</a></li>
    <li class="active">สรุปรวม</li>
  </ol>
</section>

<!-- Main content -->
<section class="content">
  <div class="row">
    <div class="col-md-12">
      <div class="box">
        <div class="box-header">
          <h3 class="box-title">รายละเอียด</h3>
        </div>

        <div class="box-body">
          
              <table class="table table-bordered table-hover">
                 <thead>
                   <tr>
                     <th class="vaign_m">รหัสบิล</th>
                     <th class="vaign_m">ซุปเปอร์</th>
                     <th class="vaign_m">เมมเบอร์</th>
                     <th class="vaign_m">วันที่ซื้อ</th>
                     <th class="vaign_m">งวด</th>
                     <th class="vaign_m">ประเภท</th>
                     <th class="vaign_m">หมายเลข</th>
                     <th class="vaign_m">จำนวนเงินที่เล่น</th>
                     <th class="vaign_m">ถือสู้</th>
                     <th class="vaign_m">คาดเดาเสีย</th>
                   </tr>
                 </thead>
                 <tbody>
<?

$ss1=array(); $ss2=array(); $ss3=array(); $ss4=array();$ss5=array();$ss6=array();$ss7=array();$ss8=array();$ss9=array();$ss10=array();
$ss11=array();
#$timew=" where (b_date='$_GET[d]') and b_accept=1 and play_number='$_GET[number]' and lot_type='$_GET[type]' ";
#$re=sql_page("bom_tb_lotto_bill_play   $timew   ","b_total","desc",5000);
$sql="select 
   *, 
 (
       ROUND(  (b_total)*(( 100-(b_share_m+b_myshare_1+b_myshare_2+b_myshare_3+b_myshare_4+b_myshare_5+b_myshare_6+b_myshare_7))/100) ,10)
   ) as r1
    from $tb where      b_accept=1     and play_number='$_GET[number]' and lot_type='$_GET[type]' and ok_id='$ok_id' $tmset  order by b_total desc, lot_type asc , play_number asc ";
 
$re=sql_query($sql);

while($rs=sql_fetch($re)){
 /* $ex_loti = explode("," , $rs["lot_i"]);
   foreach ($ex_loti as &$value) {
    $value = substr($value , 1);
    if($value==""){
      continue;
    }
  */
$sum10a=($rs[r1]);
$exr=@explode("*",$rs[r_agent_id]);
$rid=$exr[1];
  ?>
                  <tr>
                    <td  class="text-center"><?=$rs[play_id];?></td>
                    <td   class="text-center"><?=$r_user[$rid];?></td>
                    <td   class="text-center"><?=$m_user[$rs[m_id]];?></td>
                    <td align="center"   class="text-center"><?=$rs[play_datenow];?></td>
                    <td align="center"   class="text-center"><?=$rs[b_date];?></td>
                    <td align="center"   class="text-center"><span class="text-center">
                   <?=$lot_type["th"][$zone][$rs[lot_type]];?> 
                    </span></td>
                    <td align="center"  class="text-center ">
                      <span class="text-center">
                        <?=_dt($rs[play_number]);?>
                      </span>
                    </td>
                    <td align="right"  class="text-right  bgc4">
                    <?
                        $xx1= $rs[b_total];
                        echo _cbn($xx1,2);
                        $ss1[]=$xx1;
                    ?>
                    </td>
                    <td align="right"  class="text-right  bgc5">
                    <?
                        $xx2=($sum10a);
                        echo _cbn($xx2,2);
                        $ss2[]=$xx2;
                    ?>
                    </td>
                    <td align="right"  class="text-right  bgc3">
                    <?
                        $xx3=(-$sum10a)*$rs[play_br_pay_1];
                        echo _cbn($xx3,2);
                        $ss3[]=$xx3;
                     ?>
                    </td>
                </tr>
<? $xx++;}?>

                </tbody>
                 <tfoot>
                    <tr>
                       <td  class="text-center" >&nbsp;</td>
                       <td  class="text-right">&nbsp;</td>
                       <td  class="text-right">&nbsp;</td>
                       <td  class="text-right">&nbsp;</td>
                       <td  class="text-center">&nbsp;</td>
                       <td  class="text-center">&nbsp;</td>
                       <td align="center" class="text-center bgc1"><span class="text-center bgc1"><b>รวม : </b></span></td>
                       <td align="right"  class="text-right bgc4"><?=_cbn(@array_sum($ss1),2);?></td>
                       <td align="right"  class="text-right bgc5"><?=_cbn(@array_sum($ss2),2);?></td>
                       <td align="right"  class="text-right bgc3"><?=_cbn(@array_sum($ss3),2);?></td>
                    </tr>
                </tfoot>
               </table>

        </div>
      </div>
    </div>
  </div>  
</section>
<!-- /.content -->

