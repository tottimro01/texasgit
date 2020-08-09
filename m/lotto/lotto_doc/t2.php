<?
    $totalRows = 20;
    $head_title = $lang_member[2348] . " - " . $lang_g['lotZone'][$_SESSION["zone_hun"]]." ".$lang_member[688]." ".$_SESSION["rob_hun"];
?>
<style>
  .lotto-table-sizing > tbody > tr > td:not(:first-child){
    width: 22%;
  }
</style>
<script>
  // function manageFormData(form){

  //   var row_length = form.totalRows.value;
  //   var input_html = '<div id="hiddehForm">';
  //   for(var i=1; i<=row_length; i++)
  //   {
  //     var num = form['num_'+i].value.replace(/[^0-9\.]/g, '');
  //     var up = form['2_up_'+i].value.replace(/[^0-9\.]/g, '');
  //     var down = form['2_down_'+i].value.replace(/[^0-9\.]/g, '');
  //     var toot = form['2_toot_'+i].value.replace(/[^0-9\.]/g, '');

  //     if(num != "")
  //     {
  //       var val = num+","+up+","+toot+","+down;
  //       input_html +="<input type=\"hidden\" name=\"lotto[]\" value=\""+val+"\">";
  //     }
  //   }

  //   input_html+="<div>";
  //   $(form).find('fieldset').append(input_html);
  // }
  // function SaveSuccess(form, data){
  //   console.log(data);
  // }

  // function SaveFail(form, error){
  //   console.log(error);
  // }

  // function removeHiddenInput(form)
  // {
  //   $(form).find('fieldset').children('#hiddehForm').remove();
  // }
</script>
<div class="container-fluid h-100">
  <div class="row h-100">
    <div class="col-md-6 col-lg-4 mx-auto border rounded p-1 h-100">
      <div class="h-100">
        <form class="h-100 auto-form" action="process/<?=($zone!=1) ? "lothun" : "lotto";?>/save_lotto.php" method="post" data-onsuccess="SaveLottoSuccess" data-onfail="SaveLottoFail" data-onbegin="manageFormData" data-oninit="addLoadingTask" data-oncomplete="subtractLoadingTask,removeHiddenInput" data-lottype="t2">
          <fieldset class="h-100">
            <input type="hidden" name="totalRows" value="<?=$totalRows;?>">
            <input type="hidden" name="tlot" value="3">
            <input type="hidden" name="zone" value="<?=$zone;?>">
            <input type="hidden" name="rob" value="<?=$rob;?>">
            <div class="d-flex flex-column h-100">
              <?
                include 't_box.php';
              ?>
              <div>
                <div class="mt-2">
                  <table class="w-100 lotto-table-sizing" cellpadding="2" cellspacing="0">
                    <tbody>
                    <tr>
                      <td></td>
                      <td><button class="btn btn-light border px-0 w-100 btn-cross-num" data-cross-num-ref="1"><?=$lang_member[492];?></button></td>
                      <td><button class="btn btn-light border px-0 w-100 btn-copy-num tg-1" data-copy-num-ref="1"><?=$lang_member[371];?></button></td>
                      <td><button class="btn btn-light border px-0 w-100 btn-copy-num tg-2" data-copy-num-ref="2"><?=$lang_member[371];?></button></td>
                      <td><button class="btn btn-light border px-0 w-100 btn-copy-num tg-3" data-copy-num-ref="3"><?=$lang_member[371];?></button></td>
                    </tr>
                    <tr class="small">
                      <td>
                        <div class="m_bg px-1 py-2 text-white text-center"><?=$lang_member[492];?></div>
                      </td>
                      <td>
                        <div class="m_bg px-1 py-2 text-white text-center">
                          <label for="num" class="m-0"><?=$lang_member[381];?></label>
                        </div>
                      </td>
                      <td>
                        <div class="m_bg px-1 py-2 text-white text-center">
                          <input type="checkbox" name="2_up" id="2_up" class="chk-activator" data-chk-target="tg-1" checked="checked" />
                          <label for="2_up" class="m-0"><?=$lang_member[2201];?></label>
                        </div>
                      </td>
                      <td>
                        <div class="m_bg px-1 py-2 text-white text-center">
                          <input type="checkbox" name="2_down" id="2_down" class="chk-activator" data-chk-target="tg-2" checked="checked" />
                          <label for="2_down" class="m-0"><?=$lang_member[2203];?></label>
                        </div>
                      </td>
                      <td>
                        <div class="m_bg px-1 py-2 text-white text-center">
                          <input type="checkbox" name="2_toot" id="2_toot" class="chk-activator" data-chk-target="tg-3" checked="checked" />
                          <label for="2_toot" class="m-0"><?=$lang_member[2202];?></label>
                        </div>
                      </td>
                    </tr>
                    </tbody>
                  </table>
                </div>
              </div>
              <div class="lotto-scroll-area">
                <div>
                  <div>
                    <table class="w-100 lotto-table-sizing" cellpadding="2" cellspacing="0">
                      <tbody>
                      <? 
                        for ($i=1; $i < $totalRows+1; $i++) { 
                          $chkId = "chk_$i";
                          $numId = "num_$i";
                          $_n1Id = "2_up_$i";
                          $_n2Id = "2_down_$i";
                          $_n3Id = "2_toot_$i";
                      ?>
                      <tr>
                        <td>
                          <table class="w-100" style="table-layout: fixed;">
                            <tr>
                              <td><?=sprintf('%02d', $i).".";?></td>
                              <td>
                                <label for="<?=$chkId;?>" class="mb-0 ml-1">
                                  <input type="checkbox" name="<?=$chkId;?>" class="chk-turn" data-row-num="<?=$i;?>">
                                </label>
                              </td>
                            </tr>
                          </table>
                        </td>
                        <td>
                          <div class="d-flex">
                            <input type="text" class="form-control control-sc no-outline px-0 text-center inputFilter cross-num-1 lotnum" name="<?=$numId;?>" id="<?=$numId;?>" data-filter-type="numeric" data-filter-add-comma="false" maxlength="2" data-disnum="true" />
                            <span class="mt-1">=</span>
                          </div>
                        </td>
                        <td>
                          <div><input type="text" class="form-control control-sc no-outline px-0 text-center inputFilter copy-num-1 tg-1 <?=$_n1Id;?>" name="<?=$_n1Id;?>" id="<?=$_n1Id;?>" data-filter-type="integer" /></div>
                        </td>
                        <td>
                          <div><input type="text" class="form-control control-sc no-outline px-0 text-center inputFilter copy-num-2 tg-2 <?=$_n2Id;?>" name="<?=$_n2Id;?>" id="<?=$_n2Id;?>" data-filter-type="integer" /></div>
                        </td>
                        <td>
                          <div><input type="text" class="form-control control-sc no-outline px-0 text-center inputFilter copy-num-3 tg-3 <?=$_n3Id;?>" name="<?=$_n3Id;?>" id="<?=$_n3Id;?>" data-filter-type="integer" /></div>
                        </td>
                      </tr>
                      <? } ?>
                      </tbody>
                    </table>
                  </div>
                </div>
              </div>
            </div>  
          </fieldset>
        </form>
      </div>
    </div>
  </div>
</div>