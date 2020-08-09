<?php 

$nview=$_SESSION[rlevel];
$rview=$nview+1;

/*
$lot_type["th"]= array(1 =>"3บน", 2 =>"3ล่าง", 3 =>"3โต๊ด", 4 =>"2บน", 5 =>"2ล่าง", 6 =>"วิ่งบน", 7 =>"วิ่งล่าง"
, 8 =>"1ตัวบน สูง-ต่ำ" , 9 =>"2ตัวบน สูง-ต่ำ", 10 =>"3ตัวบน สูง-ต่ำ", 11 =>"2ตัวล่าง สูง-ต่ำ", 12 =>"คี่-คู่", 13 =>"2ใน3(2โต๊ด)", 14 =>"3ใน4", 15 =>"3ใน5", 16 =>"3ตัวหัวบน", 17 =>"3ล่างหัว", 18 =>"2ตัวหัวบน", 19 =>"วิ่งหัวบน", 20 =>"3 โต๊ดหัวบน", 21 =>"ปักหลักหน่วย", 22 =>"ปักหลักสิบ", 23 =>"ปักหลักร้อย";
*/

$zone=1;
$rob=1;
$date=$_GET['d'];
if($date!=""){
$dd=" and ok_date='$date'";
}

$sql="select * from bom_tb_lotto_ok where lot_zone='$zone' and lot_rob='$rob' $dd order by ok_id desc limit 1";
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
          
            <table width="100%" cellspacing="0" id="tablelist" class="table table-bordered table-hover">
              <thead >
               <tr  >
                    <th width="7%" class="text-center"> รหัสบิล </th>
                    <th width="10%" class="text-center"> <?=$x_level[1];?> </th>
                    <th width="8%" class="text-center"><?=$x_level[5];?>  <a href="main.php?p=lotto_money2&g_p=lotto&d=<?=$_GET[d];?>&number=<?=$_GET[number];?>&type=<?=$_GET[type];?>&bingo=&asc=1">▲</a></th>
                    <th width="15%" class="text-center"> วันที่ซื้อ  <a href="main.php?p=lotto_money2&g_p=lotto&d=<?=$_GET[d];?>&number=<?=$_GET[number];?>&type=<?=$_GET[type];?>&bingo=&asc=2">▲</a></th>
                    <th width="9%" class="text-center"> งวด </th>
                    <th width="9%" class="text-center"> ประเภท</th>
                    <th width="8%" class="text-center">หมายเลข</th>
                    <th width="12%" class="text-center">จำนวนเงินที่เล่น <a href="main.php?p=lotto_money2&g_p=lotto&d=<?=$_GET[d];?>&number=<?=$_GET[number];?>&type=<?=$_GET[type];?>&bingo=&asc=3">▲</a></th>
                    <th width="11%" class="text-center">ถือสู้</th>
                    <th width="11%" class="text-center">คาดเดาเสีย</th>
                  </tr>
                </thead>
<?php           

$ss1=array(); $ss2=array(); $ss3=array(); $ss4=array();$ss5=array();$ss6=array();$ss7=array();$ss8=array();$ss9=array();$ss10=array();
$ss11=array();
#$timew=" where (b_date='$_GET[d]') and b_accept=1 and play_number='$_GET[number]' and lot_type='$_GET[type]' ";
#$re=sql_page("bom_tb_lotto_bill_play_live   $timew   ","b_total","desc",5000);
if($_GET[asc]==1){
  $asc=" m_id asc, ";
  }elseif($_GET[asc]==2){
    $asc=" play_timestam desc, ";
  }else{
    $asc=" b_total desc, ";
  }


$sql="select 
   *, 
  (
        ROUND(  (b_total)*(( 100-(b_share_m+b_myshare_1+b_myshare_2+b_myshare_3+b_myshare_4+b_myshare_5+b_myshare_6+b_myshare_7))/100) ,10)
   ) as r1
    from $tb where      b_accept=1     and play_number='$_GET[number]' and lot_type='$_GET[type]' and ok_id='$ok_id' $tmset   order by $asc  lot_type asc , play_number asc ";
$re=sql_query($sql);

while($rs=sql_fetch($re)){
$sum10a=($rs[r1]);
$exr=@explode("*",$rs[r_agent_id]);
$rid=$exr[1];
  ?>
                <tr>
                    <td class="text-center"><?=$rs[play_id];?></td>
                    <td class="text-center"><?=$r_user[$rid];?></td>
                    <td class="text-center"><?=$m_user[$rs[m_id]];?></td>
                    <td align="center" class="text-center"><?=$rs[play_datenow];?></td>
                    <td align="center" class="text-center"><?=$rs[b_date];?></td>
                    <td align="center" class="text-center"><span class="text-center">
                      <?=$lot_type["th"][1][$rs[lot_type]];?>
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
                      <td  class="text-center " >&nbsp;</td>
                      <td  class="text-right ">&nbsp;</td>
                      <td  class="text-right ">&nbsp;</td>
                      <td  class="text-right  ">&nbsp;</td>
                      <td  class="text-center  ">&nbsp;</td>
                      <td  class="text-center  ">&nbsp;</td>
                      <td  class="text-center  bgc1"><span class="text-center bgc1">รวม : </span></td>
                      <td align="right"  class="text-right   bgc4"><?=_cbn(@array_sum($ss1),2);?></td>
                      <td align="right"  class="text-right   bgc5"><?=_cbn(@array_sum($ss2),2);?></td>
                      <td align="right"  class="text-right   bgc3"><?=_cbn(@array_sum($ss3),2);?></td>
                    </tr>
                </tfoot>
               </table>

        </div>
      </div>
    </div>
  </div>  
</section>
<!-- /.content -->

