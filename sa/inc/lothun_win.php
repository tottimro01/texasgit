<?php 
  if($_GET['d'] ==""){
    $_GET['d'] = $view_date;
  }

  // SUBMIT Process
  if(isset($_POST[b_ok])){

    $t3u = trim($_POST[t3u]);
    $t2u = trim($_POST[t2u]);
    
    $ok_idx = trim($_POST[x_id]);
    $ok_zone = trim($_POST[x_zone]);
    
    if($t3u!="" and $t2u!=""){
      $ok = $t3u.",".$t2u;
      $sql="update bom_tb_lotto_ok set  o_number='$ok'  where ok_id='$ok_idx' ";
      sql_query($sql);
    }


    header("Location: main.php?p=".$_GET['p']."&g_p=".$_GET['g_p']."&d=".$_GET['d']);
  }

  if($_GET[d]==""){
  $_GET[d]=_bdate();
  }


$arr_ok = array();
$sql_arr=sql_query("select * from bom_tb_lotto_ok  where lot_zone<>1 and ok_date='$_GET[d]'");
while($rs_arr=sql_fetch($sql_arr)){
  $arr_ok[$rs_arr[lot_zone]][$rs_arr[lot_rob]] = $rs_arr;
}

$lot_zoneIndexAry[0] = [2,19];  // index ของ หวยหุ้นไทย 
  $lot_zoneIndexAry[1] = [6,7,8,16];  // index ของ รอบต่างประเทศ 
  $lot_zoneIndexAry[2] = [3,4,5,9,10,11,12,13,14,15,17];  // index ของต่างปรเทศ
  $lot_zoneIndexAry[3] = [18];  // index ของ จับยี่กี่ 

  // $lot_robAry[1]=[$lot_rob[1]];
  // $lot_robAry[2]=[$lot_rob[1],$lot_rob[2]];
  // $lot_robAry[4]=$lot_rob;
  // $lot_robAry[11]=["11:58" , "12:58" , "13:58" , "14:58" , "15:58" , "16:58" , "17:58" , "18:58" , "19:58" ,"20:58" ,"21:58"];

  $lot_robAry[1]= array(1=>$lot_rob[1]);
  $lot_robAry[2]= array(1=>$lot_rob[1],2=>$lot_rob[2]);
  $lot_robAry[4]= $lot_rob;
  $lot_robAry[11] = $lot_robmun;
?>

<style>
  
.bg-info {
    background-color: #17a2b8!important;
    color: #fff;
}

.bg-success {
    background-color: #28a745!important;
    color: #fff;
}

table.tb_w
{
  border: 1px solid #eaeaea;
}

</style>
 <!-- Content Header (Page header) -->
<section class="content-header">
  <h1>ผลรางวัล</h1>
  <ol class="breadcrumb">
    <li><a href="#"><i class="fa fa-dashboard"></i> หน้าแรก</a></li>
    <li><a href="#"><i class="fa fa-line-chart"></i> หวยหุ้น</a></li>
    <li class="active"> ผลรางวัล </li>
  </ol>
</section>

<!-- Main content -->
<section class="content">
  <div class="box">
    <div class="box-header">
      <div class="row">
        <div class="col-md-10">
          <div class="col-sm-12 col-md-3">
            <div class="form-group">
              <label>ผลรางวัลวันที่:</label>
              <div class="input-group date">
                <div class="input-group-addon">
                  <i class="fa fa-calendar"></i>
                </div>
                <form action="" method="GET" id="sch_form">
                <input type="hidden" name="p" value="<?=$_GET['p'];?>">
                <input type="hidden" name="g_p" value="<?=$_GET['g_p'];?>">
                <input type="text" class="form-control pull-right datepicker" name="d" id="d" value="<?=$_GET['d'];?>" autocomplete="off" onchange="change_date($(this).val());" />
                </form>
              </div>
            </div>
          </div>
        </div> 
      </div>
    </div>
    <div class="row row-no-gutters">
      <div class="col-md-3" style="padding: 5px;">
        <table class="table table-bordered">
          <thead>
            <tr class="bg-blue-gradient">
              <th class="text-center">หวยหุ้นไทย</th>
            </tr>
          </thead>
          <tbody>
            <tr>
              <td  style="padding: 0;">
                  <?php 
        foreach ( $lot_zoneIndexAry[0] as $key => $value) {

          $value1 = $value;
           foreach ($lot_robAry[$lot_zone_nrob[$value]] as $key => $value) {    

        
       $rs =  $arr_ok[$value1][$key];
         
         if(count($rs)>0){
          
           $timeST =  $rs['o_limit_time'];
           $php_timestamp_date = date("d-m-Y H:i:s", $timeST);
           // echo "".$php_timestamp_date.""; 
           
           $enum=explode(',',$rs[o_number]);

          if($value1 != $change_bg_value){
            if($change_bg ==  "bg-info")
              $change_bg = "bg-success";
            else
              $change_bg = "bg-info";
          }
          $change_bg_value = $value1;
                                        
   ?>

                <form action="#" method="post">
                  <style type="text/css">.tb_w td{padding: 2px;}</style>
                  <table class="tb_w" width="100%">
                    <tr class="<?=$change_bg;?>">
                      <td colspan="4"> 
                        <span class="flag-icon flag-icon-<?=$arr_zone_contry[$rs['lot_zone']];?>"></span>
                        <strong><?=$lot_zone["th"][$value1];?><? if($lot_zone_nrob[$value1]!=1){ ?> รอบ <?=$value; }?> </strong>
                               เวลา <?=$php_timestamp_date;?> 
                  
                          <input name="x_id" id="x_id_<?=$value1?>_<?=$key?>"  type="hidden" value="<?=$rs[ok_id];?>" />
                          <input name="x_zone" id="x_zone<?=$value1?>_<?=$key?>"  type="hidden" value="<?=$value1;?>" />
                  
                      </td>
                    </tr>
                    <tr>
                      <td><label for="t3u_<?=$value1?>_<?=$key?>" class="small">3 ตัว</label></td>
                      <td>
                        <label for="t2u_<?=$value1?>_<?=$key?>" class="small">2 ตัว</label>
                        <span class="small">(<?=$rs['ok_id'];?>)</span>
                      </td>
                      <td></td>
                      <td></td>
                    </tr>
                    <tr>
                      <td>
                        <div class="form-group form-group-sm margin-bottom-none">

                          <input required type="text" name="t3u" id="t3u_<?=$value1?>_<?=$key?>" value="<?=$enum[0];?>" size="10" onKeyDown="return numberonly(event,this)"  maxlength="3" class="ta form-control"  style="width: 94%" <?  if($rs[o_active]==1){echo'readonly="readonly"';}?>/>

                        </div>
                      </td>
                      <td>
                        <div class="form-group form-group-sm margin-bottom-none">

                          <input required type="text" name="t2u" id="t2u_<?=$value1?>_<?=$key?>" value="<?=$enum[1];?>" size="10" onKeyDown="return numberonly(event,this)"  maxlength="2" class="ta form-control"  style="width: 94%" <?  if($rs[o_active]==1){echo'readonly="readonly"';}?>/> 
                        </div>
                      </td>
                      <td style="vertical-align: top;">
                        <div class="form-group form-group-sm margin-bottom-none">

                          <? if($rs[o_active]==1){?>
          
                            <input type="button"  value="จ่ายแล้ว" class="btn btn-light btn-sm"   style="width: 90%; float:right;  margin:5px; " disabled="disabled"/>  
                                  <? }else{?>  
                            
                            <input type="submit" name="b_ok" id="b_ok" value="บันทึก" class="btn btn-success btn-sm"   style="width: 90%; float:right;  margin:5px;"/>
                            
                            <? }?>
                        </div>
                      </td>
                      <td style="vertical-align: top;">

                        <div class="form-group form-group-sm margin-bottom-none"> 
                        <? if($rs[o_number]!="" and $rs[o_active]==0){?>     
                                 <input type="button" value="คำนวน" class="btn btn-success btn-sm"   style="width: 90%; background:#0C0; float:right;  margin:5px;" onclick="lothun_win_calc(<?=$rs[ok_id];?>,<?=$rs['lot_zone'];?>,<?=$rs['lot_rob'];?>,<?=date("d-m-Y",$rs[o_limit_time])?>) //_w('<?=$x_process;?>process_hun_<?=$rs['lot_zone'];?>.php?id=<?=$rs[ok_id];?>&zone=<?=$rs['lot_zone'];?>&rob=<?=$rs['lot_rob'];?>&d=<?=date("d-m-Y",$rs[o_limit_time])?>');"/>
                        <? }?>
                        </div>
                      </td>
                    </tr>
                  </table>
                  
                  
                </form>


 <?php 
       }  }
     }
    ?> 

              </td>
            </tr>
          </tbody>
        </table>
      </div> 
      <div class="col-md-3" style="padding: 5px;">
        <table class="table table-bordered">
          <thead>
            <tr class="bg-blue-gradient">
              <th class="text-center">รอบต่างประเทศ</th>
            </tr>
          </thead>
          <tbody>
            <tr>
              <td  style="padding: 0;">

                <?php 
        $change_bg = "bg-info";        
        foreach ( $lot_zoneIndexAry[1] as $key => $value) {

          $value1 = $value;
           foreach ($lot_robAry[$lot_zone_nrob[$value]] as $key => $value) {  

           $rs =  $arr_ok[$value1][$key];
           if(count($rs)>0){
           $timeST =  $rs['o_limit_time'];
           $php_timestamp_date = date("d-m-Y H:i:s", $timeST);
           // echo "".$php_timestamp_date.""; 
         $enum=explode(',',$rs[o_number]);

          if($value1 != $change_bg_value){
            if($change_bg ==  "bg-info")
              $change_bg = "bg-success";
            else
              $change_bg = "bg-info";
          }
          $change_bg_value = $value1;

   ?>


                <form action="#" method="post">
                  <style type="text/css">.tb_w td{padding: 2px;}</style>
                  <table class="tb_w" width="100%">
                    <tr class="<?=$change_bg;?>">
                      <td colspan="4"> 
                        <span class="flag-icon flag-icon-<?=$arr_zone_contry[$rs['lot_zone']];?>"></span>
                        <strong><?=$lot_zone["th"][$value1];?> <? if($lot_zone_nrob[$value1]!=1){ ?> รอบ <?=$value; }?> </strong> เวลา 
                        <?=$php_timestamp_date;?>
                        <input name="x_id" id="x_id_<?=$value1?>_<?=$key?>"  type="hidden" value="<?=$rs[ok_id];?>" />
                        <input name="x_zone" id="x_zone<?=$value1?>_<?=$key?>"  type="hidden" value="<?=$value1;?>" />
                      </td>
                    </tr>
                    <tr>
                      <td><label for="t3u_<?=$value1?>_<?=$key?>" class="small">3 ตัว</label></td>
                      <td>
                        <label for="t2u_<?=$value1?>_<?=$key?>" class="small">2 ตัว</label>
                        <span class="small">(<?=$rs['ok_id'];?>)</span>
                      </td>
                      <td></td>
                      <td></td>
                    </tr>
                    <tr>
                      <td>
                        <div class="form-group form-group-sm margin-bottom-none">

                          <input required type="text" name="t3u" id="t3u_<?=$value1?>_<?=$key?>" value="<?=$enum[0];?>" size="10" onKeyDown="return numberonly(event,this)"  maxlength="3" class="ta form-control"  style="width: 94%" <?  if($rs[o_active]==1){echo'readonly="readonly"';}?>/>

                        </div>
                      </td>
                      <td>
                        <div class="form-group form-group-sm margin-bottom-none">

                          <input required type="text" name="t2u" id="t2u_<?=$value1?>_<?=$key?>" value="<?=$enum[1];?>" size="10" onKeyDown="return numberonly(event,this)"  maxlength="2" class="ta form-control"  style="width: 94%" <?  if($rs[o_active]==1){echo'readonly="readonly"';}?>/> 

                        </div>
                      </td>
                      <td style="vertical-align: top;">
                        <div class="form-group form-group-sm margin-bottom-none">

                          <? if($rs[o_active]==1){?>
          
                            <input type="button"  value="จ่ายแล้ว" class="btn btn-light btn-sm"   style="width: 90%; float:right;  margin:5px; " disabled="disabled"/>  
                                  <? }else{?>  
                            
                            <input type="submit" name="b_ok" id="b_ok" value="บันทึก" class="btn btn-success btn-sm"   style="width: 90%; float:right;  margin:5px;"/>
                            
                            <? }?>
                        </div>
                      </td>
                      <td style="vertical-align: top;">

                        <div class="form-group form-group-sm margin-bottom-none">
                        <? if($rs[o_number]!="" and $rs[o_active]==0){?>     
                                 <input type="button" value="คำนวน" class="btn btn-success btn-sm"   style="width: 90%; background:#0C0; float:right;  margin:5px;" onclick="lothun_win_calc(<?=$rs[ok_id];?>,<?=$rs['lot_zone'];?>,<?=$rs['lot_rob'];?>,<?=date("d-m-Y",$rs[o_limit_time])?>) //_w('<?=$x_process;?>process_hun_<?=$rs['lot_zone'];?>.php?id=<?=$rs[ok_id];?>&zone=<?=$rs['lot_zone'];?>&rob=<?=$rs['lot_rob'];?>&d=<?=date("d-m-Y",$rs[o_limit_time])?>');"/>
                        <? }?>
                        </div>
                      </td>
                    </tr>
                  </table>
                  
                  
                </form>


                <?php 
       }  }
     }
    ?>  
              </td>
            </tr>
          </tbody>
        </table>
      </div> 
      <div class="col-md-3" style="padding: 5px;">
        <table class="table table-bordered">
          <thead>
            <tr class="bg-blue-gradient">
              <th class="text-center">หวยหุ้นต่างประเทศ</th>
            </tr>
          </thead>
          <tbody>
            <tr>
              <td  style="padding: 0;">

<?php 
        $change_bg = "bg-success";
        foreach ( $lot_zoneIndexAry[2] as $key => $value) {

          $value1 = $value;
           foreach ($lot_robAry[$lot_zone_nrob[$value]] as $key => $value) {  

           $rs =  $arr_ok[$value1][$key];
         
          if(count($rs)>0){
          
           $timeST =  $rs['o_limit_time'];
           $php_timestamp_date = date("d-m-Y H:i:s", $timeST);
           // echo "".$php_timestamp_date.""; 
          $enum=explode(',',$rs[o_number]);

          if($value1 != $change_bg_value){
            if($change_bg ==  "bg-info")
              $change_bg = "bg-success";
            else
              $change_bg = "bg-info";
          }

   ?>

                <form action="#" method="post">
                  <style type="text/css">.tb_w td{padding: 2px;}</style>
                  <table class="tb_w" width="100%">
                    <tr class="<?=$change_bg;?>">
                      <td colspan="4"> 
                        <span class="flag-icon flag-icon-<?=$arr_zone_contry[$rs['lot_zone']];?>"></span>
                        <strong><?=$lot_zone["th"][$value1];?> <? if($lot_zone_nrob[$value1]!=1){ ?> รอบ <?=$value; }?> </strong> 
                        เวลา <?=$php_timestamp_date;?>
                        <input name="x_id" id="x_id_<?=$value1?>_<?=$key?>"  type="hidden" value="<?=$rs[ok_id];?>" />
                        <input name="x_zone" id="x_zone<?=$value1?>_<?=$key?>"  type="hidden" value="<?=$value1;?>" />
                      </td>
                    </tr>
                    <tr>
                      <td><label for="t3u_<?=$value1?>_<?=$key?>" class="small"><?
         if($rs['lot_zone']==3 || $rs['lot_zone']==4){
           echo"4ตัว";
           $maxlength=4;
           }else{
          echo"3ตัว";   
           $maxlength=3;
             }
         ?></label></td>
                      <td>
                        <label for="t2u_<?=$value1?>_<?=$key?>" class="small">2 ตัว</label>
                        <span class="small">(<?=$rs['ok_id'];?>)</span>

                      </td>
                      <td></td>
                      <td></td>
                    </tr>
                    <tr>
                      <td>
                        <div class="form-group form-group-sm margin-bottom-none">

                          <input required type="text" name="t3u" id="t3u_<?=$value1?>_<?=$key?>" value="<?=$enum[0];?>" size="10" onKeyDown="return numberonly(event,this)"  maxlength="<?=$maxlength?>" class="ta form-control"  style="width: 94%" <?  if($rs[o_active]==1){echo'readonly="readonly"';}?>/>

                        </div>
                      </td>
                      <td>
                        <div class="form-group form-group-sm margin-bottom-none">

                          <input required type="text" name="t2u" id="t2u_<?=$value1?>_<?=$key?>" value="<?=$enum[1];?>" size="10" onKeyDown="return numberonly(event,this)"  maxlength="2" class="ta form-control"  style="width: 94%" <?  if($rs[o_active]==1){echo'readonly="readonly"';}?>/> 

                        </div>
                      </td>
                      <td style="vertical-align: top;">
                        <div class="form-group form-group-sm margin-bottom-none">

                          <? if($rs[o_active]==1){?>
          
                            <input type="button"  value="จ่ายแล้ว" class="btn btn-light btn-sm"   style="width: 90%; float:right;  margin:5px; " disabled="disabled"/>  
                                  <? }else{?>  
                            
                            <input type="submit" name="b_ok" id="b_ok" value="บันทึก" class="btn btn-success btn-sm"   style="width: 90%; float:right;  margin:5px;"/>
                            
                            <? }?>
                        </div>
                      </td>
                      <td style="vertical-align: top;">

                        <div class="form-group form-group-sm margin-bottom-none">
                        <? if($rs[o_number]!="" and $rs[o_active]==0){?>     
                                 <input type="button" value="คำนวน" class="btn btn-success btn-sm"   style="width: 90%; background:#0C0; float:right;  margin:5px;" onclick="lothun_win_calc(<?=$rs[ok_id];?>,<?=$rs['lot_zone'];?>,<?=$rs['lot_rob'];?>,<?=date("d-m-Y",$rs[o_limit_time])?>) //_w('<?=$x_process;?>process_hun_<?=$rs['lot_zone'];?>.php?id=<?=$rs[ok_id];?>&zone=<?=$rs['lot_zone'];?>&rob=<?=$rs['lot_rob'];?>&d=<?=date("d-m-Y",$rs[o_limit_time])?>');"/>
                        <? }?>
                        </div>
                      </td>
                    </tr>
                  </table>
                  
                  
                </form>


                    <?php 
       }  }
     }
    ?>  
              </td>
            </tr>
          </tbody>
        </table>
      </div> 
      <div class="col-md-3" style="padding: 5px;">
        <table class="table table-bordered">
          <thead>
            <tr class="bg-blue-gradient">
              <th class="text-center">จับยี่กี่</th>
            </tr>
          </thead>
          <tbody>
            <tr>
              <td  style="padding: 0;">

                 <?php 
         $change_bg = "bg-info";        
        foreach ( $lot_zoneIndexAry[3] as $key => $value) {

          $value1 = $value;

          $l = $lot_zone_nrob[$value];

          for($i=1; $i<=$l;$i++)
          {
           $rs =  $arr_ok[$value1][$i];
        
         if(count($rs)>0){
          
           $timeST =  $rs['o_limit_time'];
           $php_timestamp_date = date("d-m-Y H:i:s", $timeST);
           // echo "".$php_timestamp_date."";    
           $enum=explode(',',$rs[o_number]);

           if($value1 != $change_bg_value){
             if($change_bg ==  "bg-info")
               $change_bg = "bg-success";
             else
               $change_bg = "bg-info";
           }
   ?>


               <form action="#" method="post">
                  <style type="text/css">.tb_w td{padding: 2px;}</style>
                  <table class="tb_w" width="100%">
                    <tr class="<?=$change_bg;?>">
                      <td colspan="4"> 
                        <span class="flag-icon flag-icon-<?=$arr_zone_contry[$rs['lot_zone']];?>"></span>
                        <strong><?=$lot_zone["th"][$value1];?> รอบ <?=$i;?> </strong> เวลา <?=$php_timestamp_date;?>
                      </td>
                      <input name="x_id" id="x_id_<?=$value1?>_<?=$i?>"  type="hidden" value="<?=$rs[ok_id];?>" />
                      <input name="x_zone" id="x_zone<?=$value1?>_<?=$i?>"  type="hidden" value="<?=$value1;?>" />
                  
                      </td>
                    </tr>
                    <tr>
                      <td><label for="t3u_<?=$value1?>_<?=$key?>" class="small">3ตัว</label></td>
                      <td>
                          <label for="t2u_<?=$value1?>_<?=$key?>" class="small">2 ตัว</label>
                          <span class="small">(<?=$rs['ok_id'];?>)</span>
                      </td>
                      <td></td>
                      <td></td>
                    </tr>
                    <tr>
                      <td>
                        <div class="form-group form-group-sm margin-bottom-none">

                          <input required type="text" name="t3u" id="t3u_<?=$value1?>_<?=$key?>" value="<?=$enum[0];?>" size="10" onKeyDown="return numberonly(event,this)"  maxlength="3" class="ta form-control"  style="width: 94%" <?  if($rs[o_active]==1){echo'readonly="readonly"';}?>/>

                        </div>
                      </td>
                      <td>
                        <div class="form-group form-group-sm margin-bottom-none">

                          <input required type="text" name="t2u" id="t2u_<?=$value1?>_<?=$key?>" value="<?=$enum[1];?>" size="10" onKeyDown="return numberonly(event,this)"  maxlength="2" class="ta form-control"  style="width: 94%" <?  if($rs[o_active]==1){echo'readonly="readonly"';}?>/> 

                        </div>
                      </td>
                      <td style="vertical-align: top;">
                        <div class="form-group form-group-sm margin-bottom-none">

                          <? if($rs[o_active]==1){?>
          
                            <input type="button"  value="จ่ายแล้ว" class="btn btn-light btn-sm"   style="width: 90%; float:right;  margin:5px; " disabled="disabled"/>  
                                  <? }else{?>  
                            
                            <input type="submit" name="b_ok" id="b_ok" value="บันทึก" class="btn btn-success btn-sm"   style="width: 90%; float:right;  margin:5px;"/>
                            
                            <? }?>
                        </div>
                      </td>
                      <td style="vertical-align: top;">

                        <div class="form-group form-group-sm margin-bottom-none">
                        <? if($rs[o_number]!="" and $rs[o_active]==0){?>     
                                 <input type="button" value="คำนวน" class="btn btn-success btn-sm"   style="width: 90%; background:#0C0; float:right;  margin:5px;" onclick="lothun_win_calc(<?=$rs[ok_id];?>,<?=$rs['lot_zone'];?>,<?=$rs['lot_rob'];?>,<?=date("d-m-Y",$rs[o_limit_time])?>) //_w('<?=$x_process;?>process_hun_<?=$rs['lot_zone'];?>.php?id=<?=$rs[ok_id];?>&zone=<?=$rs['lot_zone'];?>&rob=<?=$rs['lot_rob'];?>&d=<?=date("d-m-Y",$rs[o_limit_time])?>');"/>
                        <? }?>
                        </div>
                      </td>
                    </tr>
                  </table>
                  
                  
                </form>


  <?php 
        
       } }
     }
    ?>  
                
              </td>
            </tr>
          </tbody>
        </table>
      </div> 
    </div>
  </div>
</section>
<script>
  $(".datepicker").datepicker({
    autoclose: true,
    format: 'dd-mm-yyyy',
    endDate: new Date(),
  });


 function change_date(date)
 {
   $("#sch_form").submit();
 }


function lothun_win_calc(id,zone,rob,d)
  {
    $.ajax({
      url: 'inc/lothun_win_calc.php',
      type: 'POST',
      dataType: 'json',
      data: {
          id: id,
          zone: zone,
          rob: rob,
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