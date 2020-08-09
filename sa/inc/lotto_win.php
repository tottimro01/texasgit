<?php 
  if($_GET['d'] ==""){
    $_GET['d'] = $view_date;
  }

  // SUBMIT Process
 /* if(isset($_POST['submit'])){


    header("Location: main.php?p=".$_GET['p']."&g_p=".$_GET['g_p']."&d=".$_GET['d']);
  }*/


  if(isset($_POST[b_ok])){
      $_POST[t3u]=trim($_POST[t3u]);
      $_POST[t2d]=trim($_POST[t2d]);
      $_POST[t3d1]=trim($_POST[t3d1]);
      $_POST[t3d2]=trim($_POST[t3d2]);
      $_POST[t3d3]=trim($_POST[t3d3]);
      $_POST[t3d4]=trim($_POST[t3d4]);

     $ok="$_POST[t3u],$_POST[t2d],$_POST[t3d1],$_POST[t3d2],$_POST[t3d3],$_POST[t3d4]";
  $sql="update bom_tb_lotto_ok set  o_number='$ok'  where ok_id='$_POST[x_id]' ";
  sql_query($sql);


#$sql="TRUNCATE TABLE  bom_tb_lotto_lock_rid";
#sql_query($sql);

  }





?>
 <!-- Content Header (Page header) -->
<section class="content-header">
  <h1>ผลรางวัล</h1>
  <ol class="breadcrumb">
    <li><a href="#"><i class="fa fa-dashboard"></i> หน้าแรก</a></li>
    <li><a href="#"><i class="fa fa-bar-chart"></i> หวย</a></li>
    <li class="active"> ผลรางวัล </li>
  </ol>
</section>

<!-- Main content -->
<section class="content">
  <div class="box">
    <div class="box-header">
      <div class="row">
        <div class="col-md-10">
          <h5>ผลรางวัล</h5>
        </div> 
      </div>
    </div>

    <div>
        <table class="table table-bordered">
          <colgroup>
            <col width="22%" />
            <col width="22%" />
            <col width="22%" />
            <col width="22%" />
            <col width="12%" />
          </colgroup>
          <thead>
            <tr class="bg-blue-gradient">
              <th class="text-center">No.</th>
              <th class="text-center">ผลรางวัล</th>
              <th class="text-center">วันที่ / ปิดรับ</th>
            </tr>
          </thead>
          <tbody>
             <?
 $x=1;
$re=sql_page("bom_tb_lotto_ok  where lot_zone=1  ","ok_id","desc",50);
while($rs=sql_fetch($re[re])){
  
$enum=explode(',',$rs[o_number]);
  ?>   
            <tr class="text-center">
              <td><?=$rs[ok_id]?></td>
              <td class="text-left">


                <? if($x==1){?>

                <form action="" method="post">

                <div class="col-md-12" style="padding-top: 10px;">

                  <? if($rs[o_active]==1){?>      
                    <input type="button"  value="จ่ายแล้ว" class="bt"   style="float:left; color:#a4a4a4;" disabled="disabled"/>  
                <? }else{?>  
                
                <? if($time_stam>$rs[o_limit_time]){?>
                  <? if($rs[o_active]==1){?>      
                    <input type="button"  value="จ่ายแนะนำ" class="bt"   style="float:left; background:#F90; margin:5px;"  onclick="_w('<?=$x_process;?>mlm_.php?id=<?=$rs[ok_id];?>&d=<?=date("d-m-Y",$rs[o_limit_time])?>');"/>
                  <? }?>
                <? }?>
                
                
                <? if($rs[o_number]!=""){?>   
                    <span class="cr" style="float:left;">ตรวจผลก่อนกด ให้ดี</span><br> 
                    <input type="button"  value="คำนวน" class="bt"   style="float:left; background:#0C0; margin:5px;"  onclick="lotto_win_calc('<?=$rs[ok_id];?>','<?=date("d-m-Y",$rs[o_limit_time])?>')//_w('<?=$x_process;?>process.php?id=<?=$rs[ok_id];?>&d=<?=date("d-m-Y",$rs[o_limit_time])?>');"/>

                <? }?>
                    <input type="submit" name="b_ok" id="b_ok" value="บันทึก" class="bt"   style="float:left;  margin:5px;"/>
                <? }?>



                </div>

                <div class="col-md-12" style="padding-top: 10px;">

                  <input name="x_id" id="x_id"  type="hidden" value="<?=$rs[ok_id];?>" />
                  <label for="" style="min-width: 80px;"> &nbsp; 6 ตัว  </label>
                  <input name="t3u" type="text" id="t3u" value="<?=$enum[0];?>" size="10" maxlength="6" onKeyDown="return numberonly(event,this)" class="ta txt"  <?  if($rs[o_active]==1){echo'readonly="readonly"';}?>/>

                
                </div>
            
                <div class="col-md-12" style="padding-top: 10px;">   
                <label for="" style="min-width: 80px;"> &nbsp; 2ล่าง </label>    
               
                <input name="t2d" type="text" id="t2d" value="<?=$enum[1];?>" size="6" maxlength="2" onKeyDown="return numberonly(event,this)" class="ta txt"  <?  if($rs[o_active]==1){echo'readonly="readonly"';}?>/> 
                </div>
                <div class="col-md-12" style="padding-top: 10px;">
               
                <label for="" style="min-width: 80px;"> &nbsp; 3ล่างหน้า </label>   
                <input name="t3d1" type="text" id="t3d1" value="<?=$enum[2];?>" size="2" maxlength="3" onKeyDown="return numberonly(event,this)" class="ta txt"  <?  if($rs[o_active]==1){echo'readonly="readonly"';}?>/> 
                , 
                <input name="t3d2" type="text" id="t3d2" value="<?=$enum[3];?>" size="2" maxlength="3" onKeyDown="return numberonly(event,this)" class="ta txt"  <?  if($rs[o_active]==1){echo'readonly="readonly"';}?>/>
                </div>
                <div class="col-md-12" style="padding-top: 10px;">
                  <label for="" style="min-width: 80px;"> &nbsp;3ล่าง&nbsp; </label>
               
                <input name="t3d3" type="text" id="t3d3" value="<?=$enum[4];?>" size="2" maxlength="3" onKeyDown="return numberonly(event,this)" class="ta txt" <?  if($rs[o_active]==1){echo'readonly="readonly"';}?> />
                ,
               <input name="t3d4" type="text" id="t3d4" value="<?=$enum[5];?>" size="2" maxlength="3" onKeyDown="return numberonly(event,this)" class="ta txt"  <?  if($rs[o_active]==1){echo'readonly="readonly"';}?>/>
              </div>
          </form>
<? }else{?>


6ตัว : <span class="text-blue"><?=$enum[0];?></span>   ,   2ล่าง: <span class="text-blue"><?=$enum[1];?></span>  ,   3ล่างหน้า: <span class="text-blue"><?=$enum[2];?></span> , <span class="text-blue"><?=$enum[3];?></span>  3ล่าง <span class="text-blue"><?=$enum[4];?></span> , <span class="text-blue"><?=$enum[5];?></span>

<? }?>

               
              </td>
              <td><?=date("d-m-Y@H.i",$rs[o_limit_time])?></td>
            </tr>

             <? $x++;} ?>
           
          </tbody>
        </table>
    </div>

  </div>
</section>
<script>


  function lotto_win_calc(id,d)
  {
    $.ajax({
      url: 'inc/lotto_win_calc.php',
      type: 'POST',
      dataType: 'json',
      data: {
          id: id,
          d: d,
        },
    })
    .done(function(res) {
      // console.log("success");
      alert(res.msg)
    })
    .fail(function() {
      console.log("error");
    })
    .always(function() {
      console.log("complete");
    });
    
  }

</script>