<?
  $pageTitle = "หวย ผลรางวัล";
  $mActive = "lotto_win";
  require 'header.php';
?>
<?
 
  if(isset($_POST['b_ok'])){
    $_POST['t3u']=trim($_POST['t3u']);
    $_POST['t2d']=trim($_POST['t2d']);
    $_POST['t3d1']=trim($_POST['t3d1']);
    $_POST['t3d2']=trim($_POST['t3d2']);
    $_POST['t3d3']=trim($_POST['t3d3']);
    $_POST['t3d4']=trim($_POST['t3d4']);
    $ok="$_POST[t3u],$_POST[t2d],$_POST[t3d1],$_POST[t3d2],$_POST[t3d3],$_POST[t3d4]";
    $sql="update bom_tb_lotto_ok set  o_number='$ok'  where ok_id='$_POST[x_id]' ";
    sql_query($sql);
  }


?>
<div class="py-2">
  <div class="px-2">
    
    <div>
      <table class="table table-bordered">
        <colgroup>
          <col width="15%" />
          <col width="50%" />
          <col width="20%" />
          <col width="15%" />
        </colgroup>
        <thead>
          <tr class="bg-m-1 text-white">
            <th class="text-center">No.</th>
            <th class="text-center">ผลรางวัล</th>
            <th class="text-center">วันที่ / ปิดรับ</th>
            <th class="text-center">วันที่ / ปิดล่าง</th>
          </tr>
        </thead>
        <tbody>
          <?
            $x=1;
            $re=sql_page("bom_tb_lotto_ok  where lot_zone=1  ","ok_id","desc",50);
            while($rs=sql_fetch($re['re'])){
              $enum=explode(',',$rs['o_number']);
          ?>   
            <tr class="text-center">
              <td><?=$rs['ok_id']?></td>
              <td class="text-left">
                <? if($x==1){ ?>
                  <form action="" method="post">
                   

              <div class="text-right" style="float: right;">
                
                <? if($rs['o_active']==1){ ?>      
                    <input type="button"  value="จ่ายแล้ว" class="btn btn-sm btn-light border ml-1" style="float:right;" disabled="disabled" />  
                <? }else{ ?>  

                  <? if($rs['o_number']!=""){ ?>
                    <div>
                      <span class="text-danger">ตรวจผลก่อนกด ให้ดี</span>
                    </div>
                  <? } ?>
                
                  <? 
                    if($time_stam>$rs['o_limit_time']){
                      if($rs['o_active']==1){ 
                        $_wUrl = $x_process."mlm_.php?id=".$rs['ok_id']."&d=".(date("d-m-Y",$rs['o_limit_time']));                                                     
                  ?>      
                  <!--<input type="button" value="จ่ายแนะนำ" class="btn btn-sm btn-warning ml-1" style="float:right;" 
                   onclick="_w('<?=$process_lotto;?>process_mlm.php?id=<?=$rs['ok_id'];?>&d=<?=date("d-m-Y",$rs['o_limit_time']);?>')" /> -->
                  <? 
                      }
                    } 
                  ?>
                  
                  <input type="submit" name="b_ok" id="b_ok" value="บันทึก" class="btn btn-sm btn-success ml-1" />

                  <? if($rs['o_number']!=""){ 
                    $_wUrl = $cal_lotto_url."?id=".$rs['ok_id']."&d=".(date("d-m-Y",$rs['o_limit_time']));                                                     
                  ?>
                  <input type="button"  value="คำนวน" class="btn btn-sm btn-primary ml-1" 
                  onclick="_w('<?=$process_lotto;?>process.php?id=<?=$rs['ok_id'];?>&d=<?=date("d-m-Y",$rs['o_limit_time']);?>')" />
                  <? } ?>
                  
                <? } ?>
              </div>
                
                <input name="x_id" id="x_id"  type="hidden" value="<?=$rs['ok_id'];?>" />
                
                <label for="t3u">6 ตัว</label> 
                <input name="t3u" type="text" id="t3u" value="<?=$enum[0];?>" autocomplete="off" size="10" maxlength="6" class="inputFilter form-control-sm no-outline" data-filter-type="numeric" data-filter-add-comma="false" <? if($rs['o_active']==1){?> readonly="readonly" <? }?> />

                <br>
                <label for="t2d">2 ล่าง</label>
                <input name="t2d" type="text" id="t2d" value="<?=$enum[1];?>" autocomplete="off" size="10" maxlength="2" class="inputFilter form-control-sm no-outline" data-filter-type="numeric" data-filter-add-comma="false" <? if($rs['o_active']==1){?> readonly="readonly" <? }?> /> 
                <br>
                <label for="t3d1">3 ล่างหน้า</label>
                <input name="t3d1" type="text" id="t3d1" value="<?=$enum[2];?>" autocomplete="off" size="5" maxlength="3" class="inputFilter form-control-sm no-outline" data-filter-type="numeric" data-filter-add-comma="false" <? if($rs['o_active']==1){?> readonly="readonly" <? }?> /> 
                , 
                <input name="t3d2" type="text" id="t3d2" value="<?=$enum[3];?>" autocomplete="off" size="5" maxlength="3" class="inputFilter form-control-sm no-outline" data-filter-type="numeric" data-filter-add-comma="false" <? if($rs['o_active']==1){?> readonly="readonly" <? }?> />

                <label for="t3d3">3 ล่าง</label>
                <input name="t3d3" type="text" id="t3d3" value="<?=$enum[4];?>" autocomplete="off" size="5" maxlength="3" class="inputFilter form-control-sm no-outline" data-filter-type="numeric" data-filter-add-comma="false" <? if($rs['o_active']==1){?> readonly="readonly" <? }?> />
                ,
                <input name="t3d4" type="text" id="t3d4" value="<?=$enum[5];?>" autocomplete="off" size="5" maxlength="3" class="inputFilter form-control-sm no-outline" data-filter-type="numeric" data-filter-add-comma="false" <? if($rs['o_active']==1){?> readonly="readonly" <? }?> />

                </form>
              <? }else{ #$x==1 ?>
                6ตัว : <span class="text-primary"><?=$enum[0];?></span>, 
                2 ล่าง: <span class="text-primary"><?=$enum[1];?></span>, 
                3 ล่างหน้า: <span class="text-primary"><?=$enum[2];?></span>, <span class="text-primary"><?=$enum[3];?></span>  
                3 ล่าง <span class="text-primary"><?=$enum[4];?></span>, <span class="text-primary"><?=$enum[5];?></span>
              <? } ?>
               
              </td>
              <td><?=date("d-m-Y@H.i", $rs['o_limit_time'])?></td>
              <td><?=date("H.i", $rs['o_limit_time_lang'])?></td>
            </tr>

             <? $x++; } ?>
           
          </tbody>
        </table>
    </div>

  </div>
</div>
<?
  require 'footer.php';
?>