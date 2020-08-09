<?
  $pageTitle = "หวยหุ้น ผลรางวัล";
  $mActive = "lothun_win";

  $addtional_resources = array(
    array('css', 'assets/lib/flag-icon/css/flag-icon.min.css'),
  );
  require 'header.php';
?>
<?
  if(isset($_POST['b_ok'])){
    $t3u = trim($_POST['t3u']);
    $t2u = trim($_POST['t2u']);
    $ok_idx = trim($_POST['x_id']);
    $ok_zone = trim($_POST['x_zone']);
	$up_manual = trim($_POST['ddm']);
	
      $sql="update bom_tb_lotto_ok set  up_manual='$up_manual'   where ok_id='$ok_idx'  ";
      sql_query($sql);
    
    if($t3u!="" and $t2u!=""){
      $ok = $t3u.",".$t2u;
	  	  if($_SESSION['aid']==5 or $_SESSION['aid']==19){
      $sql="update bom_tb_lotto_ok set  o_number='$ok', up_datetime=now(),up_aid='".$_SESSION['auser']."'    where ok_id='$ok_idx'  ";
      sql_query($sql);
		  }else{
      $sql="update bom_tb_lotto_ok set  o_number='$ok', up_datetime=now(),up_aid='".$_SESSION['auser']."'    where ok_id='$ok_idx' and lot_zone!=18 ";
      sql_query($sql);
			  }
    }
    header("Location: lothun.php");
  }

  $date = isset($_GET['date']) ? $_GET['date'] : date("d-m-Y");

  $arr_ok = array();
  $sql_arr=sql_query("select * from bom_tb_lotto_ok  where lot_zone<>1 and ok_date='$date'");
  while($rs_arr=sql_fetch($sql_arr)){
    $arr_ok[$rs_arr['lot_zone']][$rs_arr['lot_rob']] = $rs_arr;
  }

  $lot_zoneIndexAry[0] = [2,19];  // index ของ หวยหุ้นไทย 
  $lot_zoneIndexAry[1] = [6,7,8,16];  // index ของ รอบต่างประเทศ 
  $lot_zoneIndexAry[2] = [3,4,5,9,10,11,12,13,14,15,17];  // index ของต่างปรเทศ
  $lot_zoneIndexAry[3] = [18];  // index ของ จับยี่กี่ 

  $lot_robAry[1]= array(1=>$lot_rob[1]);
  $lot_robAry[2]= array(1=>$lot_rob[1],2=>$lot_rob[2]);
  $lot_robAry[4]= $lot_rob;
  $lot_robAry[11] = $lot_robmun;
?>
<style>
  .tb_w th,
  .tb_w td{
    padding: 2px;
  }
</style>
<script>
  var qDate = (getQueryVariable('date')!==false) ? getQueryVariable('date') : "0";
  $(function(){
    var lothunWinDatepicker = document.getElementById('lothunWinDatepicker');
    var lothunWinDatepickerButton = document.getElementById('lothunWinDatepickerButton');
    $(lothunWinDatepicker).datepicker({
      showOn: "focus",
      maxDate: "0",
      // minDate: "-10d",
      defaultDate: 0,
      dateFormat: "dd-mm-yy",
      onSelect: function(dateText){
        selectLothunWinDate();
      }
    });
    $(lothunWinDatepicker).datepicker('setDate' , qDate);

    // selectLothunWinDate();

    function selectLothunWinDate(){
      var spResDate = $(lothunWinDatepicker).datepicker('getDate');
      var dd = padNumber(spResDate.getDate());
      var mm = padNumber(spResDate.getMonth() + 1);
      var yyyy = spResDate.getFullYear();
      var lhWinDateFormatted = dd + '-' + mm + '-' + yyyy;
      window.location.href = 'lothun.php?date=' + lhWinDateFormatted;
      // var newQueryParam = createQueryVariable('date', lhWinDateFormatted);
      // console.log(newQueryParam, lhWinDateFormatted)
      // window.history.replaceState({'date': lhWinDateFormatted}, "Lothun Win " + lhWinDateFormatted, newQueryParam);
    }
  });

</script>
<div class="py-2">
  <!-- <div class="px-2">
    <div class="container">
    <div class="row"> -->
    <div class="row no-gutters">
      <div class="col-12 mb-3">
      <form action="process/sportResultData.php" method="get" class="px-1">
        <fieldset>
          <div class="form-inline">
            <input type="hidden" name="sport" value="<?=$_GET['sport_id'];?>" />
            <label for="lothunWinDatepicker"><b>ผลรางวัลวันที่:&nbsp;&nbsp;</b></label> 
            <div class="input-group input-group-sm">
              <input type="text" id="lothunWinDatepicker" name="date" class="form-control form-control-sm no-outline" />
              <div class="input-group-append">
                <button type="submit" class="input-group-text" id="lothunWinDatepickerButton" onclick="document.getElementById('lothunWinDatepicker').focus(); return false;"><img src="assets/img/ui/calendar.png" alt="Select date" /></button>
              </div>
            </div>
          </div>
        </fieldset>
      </form>
    </div> 
    <!-- </div>
    </div>
    
    <div class="row no-gutters"> -->

      <div class="col-md-3 px-1">
        <table class="table table-bordered">
          <thead>
            <tr class="bg-m-1 text-white">
              <th class="text-center">หวยหุ้นไทย</th>
            </tr>
          </thead>
          <tbody>
            <tr>
              <td class="p-0">

              <?php 
                $change_bg = "bg-success";
                foreach($lot_zoneIndexAry[0] as $key => $value){
                  $value1 = $value;
                  foreach($lot_robAry[$lot_zone_nrob[$value]] as $key => $value){    
                    $rs =  $arr_ok[$value1][$key];
                    if(count($rs)>0){
                      $timeST =  $rs['o_limit_time'];
                      $php_timestamp_date = date("d-m-Y H:i:s", $timeST);
                      $enum=explode(',',$rs['o_number']);
            
                      if($value1 != $change_bg_value){
                        if($change_bg ==  "bg-info")
                          $change_bg = "bg-success";
                        else
                          $change_bg = "bg-info";
                      }
                      $change_bg_value = $value1;
                      $tbId = $rs['ok_id']."_".$rs['lot_zone']."_".$rs['lot_rob'];
             ?>


                <form action="#" method="post" class="lothun_win_form lothun_country_<?=$arr_zone_contry[$rs['lot_zone']];?>">
                  <table class="tb_w table-borderless w-100 <?if($rs['o_status']==0){?>bg-warning<?}?>" cellpadding="0" cellspacing="0" id="<?=$tbId;?>">
                    <tr class="text-white <?=$change_bg;?>">
                      <td colspan="100%"> 
                        <div class="pl-1">


                          <span class="flag-icon flag-icon-<?=$arr_zone_contry[$rs['lot_zone']];?>"></span>
                          <strong><?=$lot_zone["th"][$value1];?><? if($lot_zone_nrob[$value1]!=1){ ?> รอบ <?=$value; }?></strong>
                          <span class="small--1">เวลา <?=$php_timestamp_date;?></span>
                          <input name="x_id" id="x_id_<?=$value1?>_<?=$key?>"  type="hidden" value="<?=$rs['ok_id'];?>" autocomplete="off" />
                          <input name="x_zone" id="x_zone<?=$value1?>_<?=$key?>"  type="hidden" value="<?=$value1;?>" autocomplete="off" />
                        </div>
                      </td>
                    </tr>
                    <tr>
                      <td><label for="t3u_<?=$value1?>_<?=$key?>" class="small m-0">3 ตัว</label></td>
                      <td>
                      <label for="t2u_<?=$value1?>_<?=$key?>" class="small m-0">2 ตัว</label>
                      <span class="small">(<?=$rs['ok_id'];?>)</span>
                      </td>
                      <td></td>
                    </tr>
                    <tr>
                      <td>
                        <div class="form-group form-group-sm mb-1">
                        <input  type="text" name="t3u" id="t3u_<?=$value1?>_<?=$key?>" value="<?=$enum[0];?>" maxlength="3" class="form-control form-control-sm no-outline inputFilter"  data-filter-add-comma="false" <?if($rs['o_active']==1){?> readonly="readonly" <?}?> autocomplete="off" />
                        </div>
                      </td>
                      <td>
                        <div class="form-group form-group-sm mb-1">
                        <input  type="text" name="t2u" id="t2u_<?=$value1?>_<?=$key?>" value="<?=$enum[1];?>" maxlength="2" class="form-control form-control-sm no-outline inputFilter"  data-filter-add-comma="false" <? if($rs['o_active']==1){?> readonly="readonly" <? }?> autocomplete="off" /> 
                        </div>
                      </td>
                      <td style="vertical-align: top;">
                        <div class="d-flex">
                          
                          <div class="form-group form-group-sm mb-1">
                          <? if($rs['o_active']==1){ ?>
                            <input type="button"  value="จ่ายแล้ว" class="btn btn-light border btn-sm" disabled="disabled" />
                          <? }else{ ?>      
                            <input type="submit" name="b_ok" id="b_ok" value="บันทึก" class="btn btn-success btn-sm"/>
                          <? } ?>
                          </div>

                          <? if($rs['o_number']!="" and $rs['o_active']==0){
                              $_wUrl = $cal_lothun_url."?id=".$rs['ok_id']."&zone=".$rs['lot_zone']."&rob=".$rs['lot_rob']."&d=".(date("d-m-Y",$rs['o_limit_time'])); 
                          ?> 
                          <div class="form-group form-group-sm mb-1 ml-1">
                            <!-- <a href="<?=$process_lotto;?>process_hun.php?id=<?=$rs['ok_id'];?>&zone=<?=$rs['lot_zone'];?>&rob=<?=$rs['lot_rob'];?>&d=<?=date("d-m-Y",$rs['o_limit_time']);?>"
                            class="btn btn-primary btn-sm border-0"
                            >คำนวน</a>-->
                            <input type="button" value="คำนวน" class="btn btn-primary btn-sm" 
                              onclick="_w('<?=$process_lotto;?>process_hun.php?id=<?=$rs['ok_id'];?>&zone=<?=$rs['lot_zone'];?>&rob=<?=$rs['lot_rob'];?>&d=<?=date("d-m-Y",$rs['o_limit_time']);?>&hashid=<?=$tbId;?>')" /> 
                          </div>
                          <? } ?>
                        </div>
                      </td>
                    </tr>
                  </table>
                </form>
              <?php 
                    }  
                  }  
                }
              ?> 
              </td>
            </tr>
          </tbody>
        </table>
      </div> 

      <div class="col-md-3 px-1">
        <table class="table table-bordered">
          <thead>
            <tr class="bg-m-1 text-white">
              <th class="text-center">รอบต่างประเทศ</th>
            </tr>
          </thead>
          <tbody>
            <tr>
              <td class="p-0">

              <?php 
                $change_bg = "bg-info";
                foreach($lot_zoneIndexAry[1] as $key => $value){
                $value1 = $value;
                  foreach ($lot_robAry[$lot_zone_nrob[$value]] as $key => $value) {  
                    $rs =  $arr_ok[$value1][$key];
                    if(count($rs)>0){
                      $timeST =  $rs['o_limit_time'];
                      $php_timestamp_date = date("d-m-Y H:i:s", $timeST);
                      $enum=explode(',',$rs['o_number']);

                      if($value1 != $change_bg_value){
                        if($change_bg ==  "bg-info")
                          $change_bg = "bg-success";
                        else
                          $change_bg = "bg-info";
                      }
                      $change_bg_value = $value1;
                      $tbId = $rs['ok_id']."_".$rs['lot_zone']."_".$rs['lot_rob'];
              ?>

                <form action="#" method="post" class="lothun_win_form lothun_country_<?=$arr_zone_contry[$rs['lot_zone']];?>">
                  <table class="tb_w table-borderless w-100 <?if($rs['o_status']==0){?>bg-warning<?}?>" cellpadding="0" cellspacing="0" id="<?=$tbId;?>">
                    <tr class="text-white <?=$change_bg;?>">
                      <td colspan="100%"> 
                        <div class="pl-1">
                          <span class="flag-icon flag-icon-<?=$arr_zone_contry[$rs['lot_zone']];?>"></span>
                          <strong><?=$lot_zone["th"][$value1];?> <? if($lot_zone_nrob[$value1]!=1){ ?> รอบ <?=$value; }?> </strong>
                          <span class="small--1">เวลา <?=$php_timestamp_date;?></span>
                          <input name="x_id" id="x_id_<?=$value1?>_<?=$key?>"  type="hidden" value="<?=$rs['ok_id'];?>" autocomplete="off" />
                          <input name="x_zone" id="x_zone<?=$value1?>_<?=$key?>"  type="hidden" value="<?=$value1;?>" autocomplete="off" />
                        </div>
                      </td>
                    </tr>
                    <tr>
                      <td><label for="t3u_<?=$value1?>_<?=$key?>" class="small mb-0">3 ตัว</label></td>
                      <td>
                      <label for="t2u_<?=$value1?>_<?=$key?>" class="small mb-0">2 ตัว</label>
                      <span class="small">(<?=$rs['ok_id'];?>)</span>
                      </td>
                      <td></td>
                    </tr>
                    <tr>
                      <td>
                        <div class="form-group form-group-sm mb-1">
                          <input  type="text" name="t3u" id="t3u_<?=$value1?>_<?=$key?>" value="<?=$enum[0];?>" maxlength="3" class="form-control form-control-sm no-outline inputFilter"  data-filter-add-comma="false" <?if($rs['o_active']==1){?> readonly="readonly" <?}?> autocomplete="off" />
                        </div>
                      </td>
                      <td>
                        <div class="form-group form-group-sm mb-1">
                          <input  type="text" name="t2u" id="t2u_<?=$value1?>_<?=$key?>" value="<?=$enum[1];?>" maxlength="2" class="form-control form-control-sm no-outline inputFilter"  data-filter-add-comma="false" <?if($rs['o_active']==1){?> readonly="readonly" <?}?> autocomplete="off" /> 
                        </div>
                      </td>
                      <td style="vertical-align: top;">
                        <div class="d-flex">
                          <div class="form-group form-group-sm mb-1">
                          <? if($rs['o_active']==1){ ?>
                            <input type="button"  value="จ่ายแล้ว" class="btn btn-light border btn-sm" disabled="disabled" />  
                          <? }else{ ?>  
                            <input type="submit" name="b_ok" id="b_ok" value="บันทึก" class="btn btn-success btn-sm" />
                          <? } ?>
                          </div>

                          <? if($rs['o_number']!="" and $rs['o_active']==0) {
                              $_wUrl = $cal_lothun_url."?id=".$rs['ok_id']."&zone=".$rs['lot_zone']."&rob=".$rs['lot_rob']."&d=".(date("d-m-Y",$rs['o_limit_time'])); 
                          ?>     
                            <div class="form-group form-group-sm mb-1 ml-1">
                                <!-- <a href="<?=$process_lotto;?>process_hun.php?id=<?=$rs['ok_id'];?>&zone=<?=$rs['lot_zone'];?>&rob=<?=$rs['lot_rob'];?>&d=<?=date("d-m-Y",$rs['o_limit_time']);?>"
                                class="btn btn-primary btn-sm border-0"
                                >คำนวน</a> -->
                              <input type="button" value="คำนวน" class="btn btn-primary btn-sm" 
                               onclick="_w('<?=$process_lotto;?>process_hun.php?id=<?=$rs['ok_id'];?>&zone=<?=$rs['lot_zone'];?>&rob=<?=$rs['lot_rob'];?>&d=<?=date("d-m-Y",$rs['o_limit_time']);?>&hashid=<?=$tbId;?>')" />
                          </div>
                          <? } ?>
                        </div>
                      </td>
                    </tr>
                  </table>
                </form>
              <?php 
                    }  
                  } 
                }
              ?>  
              </td>
            </tr>
          </tbody>
        </table>
      </div> 

      <div class="col-md-3 px-1">
        <table class="table table-bordered">
          <thead>
            <tr class="bg-m-1 text-white">
              <th class="text-center">หวยหุ้นต่างประเทศ</th>
            </tr>
          </thead>
          <tbody>
            <tr>
              <td class="p-0">

              <?php 
                $change_bg = "bg-success";
                foreach($lot_zoneIndexAry[2] as $key => $value){
                  $value1 = $value;
                  foreach($lot_robAry[$lot_zone_nrob[$value]] as $key => $value){  
                    $rs =  $arr_ok[$value1][$key];
                    if(count($rs)>0){
          
                      $timeST =  $rs['o_limit_time'];
                      $php_timestamp_date = date("d-m-Y H:i:s", $timeST);
                      $enum=explode(',',$rs['o_number']);

                      if($value1 != $change_bg_value){
                        if($change_bg ==  "bg-info")
                          $change_bg = "bg-success";
                        else
                          $change_bg = "bg-info";
                      }
                    $tbId = $rs['ok_id']."_".$rs['lot_zone']."_".$rs['lot_rob'];
              ?>

                <form action="#" method="post" class="lothun_win_form lothun_country_<?=$arr_zone_contry[$rs['lot_zone']];?>">
                  <table class="tb_w table-borderless w-100 <?if($rs['o_status']==0){?>bg-warning<?}?>" cellpadding="0" cellspacing="0" id="<?=$tbId;?>">
                    <tr class="text-white <?=$change_bg;?>">
                      <td colspan="100%"> 
                        <div class="pl-1"> 
                          <span class="flag-icon flag-icon-<?=$arr_zone_contry[$rs['lot_zone']];?>"></span>
                          <strong><?=$lot_zone["th"][$value1];?> <? if($lot_zone_nrob[$value1]!=1){ ?> รอบ <?=$value; }?> </strong> 
                          <span class="small--1">เวลา <?=$php_timestamp_date;?></span>
                          <input name="x_id" id="x_id_<?=$value1?>_<?=$key?>"  type="hidden" value="<?=$rs['ok_id'];?>" autocomplete="off" />
                          <input name="x_zone" id="x_zone<?=$value1?>_<?=$key?>"  type="hidden" value="<?=$value1;?>" autocomplete="off" />
                          </div>
                      </td>
                    </tr>
                    <tr>
                      <td>
                        <label for="t3u_<?=$value1?>_<?=$key?>" class="small mb-0">
                        <?
                          if($rs['lot_zone']==3 || $rs['lot_zone']==4){
                            echo"4ตัว";
                            $maxlength=4;
                          }else{
                            echo"3ตัว";   
                            $maxlength=3;
                          }
                        ?>
                        </label>
                      </td>
                      <td>
                      <label for="t2u_<?=$value1?>_<?=$key?>" class="small mb-0">2 ตัว</label>
                      <span class="small">(<?=$rs['ok_id'];?>)</span>
                      </td>
                      <td></td>
                    </tr>
                    <tr>
                      <td>
                        <div class="form-group form-group-sm mb-1">
                          <input  type="text" name="t3u" id="t3u_<?=$value1?>_<?=$key?>" value="<?=$enum[0];?>" maxlength="<?=$maxlength?>" class="form-control form-control-sm no-outline inputFilter"  data-filter-add-comma="false" <?if($rs['o_active']==1){?> readonly="readonly" <?}?> autocomplete="off" />
                        </div>
                      </td>
                      <td>
                        <div class="form-group form-group-sm mb-1">
                          <input  type="text" name="t2u" id="t2u_<?=$value1?>_<?=$key?>" value="<?=$enum[1];?>" maxlength="2" class="form-control form-control-sm no-outline inputFilter"  data-filter-add-comma="false" <?if($rs['o_active']==1){?> readonly="readonly" <?}?> autocomplete="off" /> 
                        </div>
                      </td>
                      <td style="vertical-align: top;">
                        <div class="d-flex">
                          <div class="form-group form-group-sm mb-1">
                          <? if($rs['o_active']==1){ ?>
                            <input type="button"  value="จ่ายแล้ว" class="btn btn-light border btn-sm" disabled="disabled"/>  
                          <? }else{ ?>  
                            <input type="submit" name="b_ok" id="b_ok" value="บันทึก" class="btn btn-success btn-sm" />
                          <? } ?>
                          </div>

                          <? if($rs['o_number']!="" and $rs['o_active']==0){ 
                              $_wUrl = $cal_lothun_url."?id=".$rs['ok_id']."&zone=".$rs['lot_zone']."&rob=".$rs['lot_rob']."&d=".(date("d-m-Y",$rs['o_limit_time']));                           
                          ?>     
                          
                            <div class="form-group form-group-sm mb-1 ml-1">
                            <!-- <a href="<?=$process_lotto;?>process_hun.php?id=<?=$rs['ok_id'];?>&zone=<?=$rs['lot_zone'];?>&rob=<?=$rs['lot_rob'];?>&d=<?=date("d-m-Y",$rs['o_limit_time']);?>"
                            class="btn btn-primary btn-sm border-0"
                            >คำนวน</a>-->
                              <input type="button" value="คำนวน" class="btn btn-primary btn-sm" 
                              onclick="_w('<?=$process_lotto;?>process_hun.php?id=<?=$rs['ok_id'];?>&zone=<?=$rs['lot_zone'];?>&rob=<?=$rs['lot_rob'];?>&d=<?=date("d-m-Y",$rs['o_limit_time']);?>&hashid=<?=$tbId;?>')" /> 
                            </div>
                        <? } ?>
                        </div>
                      </td>
                    </tr>
                  </table>
                </form>
              <?php 
                    }  
                  }
                }
              ?>  
              </td>
            </tr>
          </tbody>
        </table>
      </div> 

      <div class="col-md-3 px-1">
        <table class="table table-bordered">
          <thead>
            <tr class="bg-m-1 text-white">
              <th class="text-center">จับยี่กี่</th>
            </tr>
          </thead>
          <tbody>
            <tr>
              <td class="p-0">
              <?php 
                $change_bg = "bg-info";
                foreach($lot_zoneIndexAry[3] as $key => $value){
                  $value1 = $value;
                  $l = $lot_zone_nrob[$value];
                  for($i=1; $i<=$l;$i++){
                    $rs =  $arr_ok[$value1][$i];
                    if(count($rs)>0){
                      $timeST =  $rs['o_limit_time'];
                      $php_timestamp_date = date("d-m-Y H:i:s", $timeST);
                      $enum=explode(',',$rs['o_number']);

                      if($value1 != $change_bg_value){
                        if($change_bg ==  "bg-info")
                          $change_bg = "bg-success";
                        else
                          $change_bg = "bg-info";
                      }
                $tbId = $rs['ok_id']."_".$rs['lot_zone']."_".$rs['lot_rob'];
              ?>
                <form action="#" method="post" class="lothun_win_form lothun_country_<?=$arr_zone_contry[$rs['lot_zone']];?>">
                  <table class="tb_w table-borderless w-100 <?if($rs['o_status']==0){?>bg-warning<?}?>" cellspacing="0" cellpadding="0" id="<?=$tbId;?>">
                    <tr class="text-white <?=$change_bg;?>">
                      <td colspan="100%"> 
                        <div class="pl-1"> 
                          <span class="flag-icon flag-icon-<?=$arr_zone_contry[$rs['lot_zone']];?>"></span>
                          <strong><?=$lot_zone["th"][$value1];?> รอบ <?=$i;?> </strong>
                          <span class="small--1">เวลา <?=$php_timestamp_date;?></span>
                          <input name="x_id" id="x_id_<?=$value1?>_<?=$i?>"  type="hidden" value="<?=$rs['ok_id'];?>" autocomplete="off" />
                          <input name="x_zone" id="x_zone<?=$value1?>_<?=$i?>"  type="hidden" value="<?=$value1;?>" autocomplete="off" />
                          <input name="ddm" type="checkbox" id="ddm" value="1" <? if($rs['up_manual']==1){echo'checked="checked"';}?> />
                        </div>
                      </td>
                    </tr>
                    <tr>
                      <td><label for="t3u_<?=$value1?>_<?=$key?>" class="small mb-0">3ตัว</label></td>
                      <td>
                      <label for="t2u_<?=$value1?>_<?=$key?>" class="small mb-0">2 ตัว</label>
                      <span class="small">(<?=$rs['ok_id'];?>)</span>
                      </td>
                      <td></td>
                    </tr>
                    <tr>
                      <td>
                        <div class="form-group form-group-sm mb-1">
                          <input  type="text" name="t3u" id="t3u_<?=$value1?>_<?=$key?>" value="<?=$enum[0];?>" maxlength="3" class="form-control form-control-sm no-outline inputFilter"  data-filter-add-comma="false" <? if($rs['o_active']==1){?> readonly="readonly" <? }?> autocomplete="off" />
                        </div>
                      </td>
                      <td>
                        <div class="form-group form-group-sm mb-1">
                          <input  type="text" name="t2u" id="t2u_<?=$value1?>_<?=$key?>" value="<?=$enum[1];?>" maxlength="2" class="form-control form-control-sm no-outline inputFilter"  data-filter-add-comma="false" <? if($rs['o_active']==1){?> readonly="readonly" <? }?> autocomplete="off" /> 
                        </div>
                      </td>
                      <td style="vertical-align: top;">
                        <div class="d-flex">
                          <div class="form-group form-group-sm mb-1">
                            <? if($rs['o_active']==1){ ?>
                              <input type="button" value="จ่ายแล้ว" class="btn btn-light border btn-sm" disabled="disabled" />  
                            <? }else{ ?>  
                              <input type="submit" name="b_ok" id="b_ok" value="บันทึก" class="btn btn-success btn-sm" />
                            <? } ?>
                          </div>

                          <? if($rs['o_number']!="" and $rs['o_active']==0){ 
                              $_wUrl = $cal_lothun_url."?id=".$rs['ok_id']."&zone=".$rs['lot_zone']."&rob=".$rs['lot_rob']."&d=".(date("d-m-Y",$rs['o_limit_time']));                                                     
                          ?>     
                          <div class="form-group form-group-sm mb-1 ml-1">
                            <!-- <a href="<?=$process_lotto;?>process_hun.php?id=<?=$rs['ok_id'];?>&zone=<?=$rs['lot_zone'];?>&rob=<?=$rs['lot_rob'];?>&d=<?=date("d-m-Y",$rs['o_limit_time']);?>"
                            class="btn btn-primary btn-sm border-0"
                            >คำนวน</a> -->
                            <input type="button" value="คำนวน" class="btn btn-primary btn-sm" 
                            onclick="_w('<?=$process_lotto;?>process_hun.php?id=<?=$rs['ok_id'];?>&zone=<?=$rs['lot_zone'];?>&rob=<?=$rs['lot_rob'];?>&d=<?=date("d-m-Y",$rs['o_limit_time']);?>&hashid=<?=$tbId;?>')" />
                          </div>
                          <? } ?>
                        </div>
                      </td>
                    </tr>
                  </table>
                </form>
              <?php 
                    } 
                  }
                }
              ?>  
              </td>
            </tr>
          </tbody>
        </table>
      </div>
    </div>
  </div>
</div>


<?
  require 'footer.php';
?>