<?
    $head_title = $lang_member[564] . " - " . $lang_g['lotZone'][$_SESSION["zone_hun"]]." ".$lang_member[688]." ".$_SESSION["rob_hun"];
?>
<style>
  .lotto-table-sizing{
    table-layout: fixed;
  }
  .lotto-table-sizing > tbody > tr > td{
    /*width: 50%;*/
  }
</style>

<?php 
// echo $zone;

$rpay=array(); 
$rdis=array(); 

if($zone == 1)
{
  if($_SESSION['m1']['m_lotto_setbet']==1){
    $rpay[]=@explode(',',$_SESSION['ardata'][$rid]['r_lotto_pay1']); 
    $rdis[]=@explode(',',$_SESSION['ardata'][$rid]['r_lotto_dis1']); 
  }elseif($_SESSION['m1']['m_lotto_setbet']==2){
    $rpay[]=@explode(',',$_SESSION['ardata'][$rid]['r_lotto_pay2']); 
    $rdis[]=@explode(',',$_SESSION['ardata'][$rid]['r_lotto_dis2']); 
  }else{
    $rpay[]=@explode(',',$_SESSION['ardata'][$rid]['r_lotto_pay3']); 
    $rdis[]=@explode(',',$_SESSION['ardata'][$rid]['r_lotto_dis3']); 
  }

}else{
  if($_SESSION['m1']['m_lotto_hun_setbet']==1){
    $rpay[]=@explode(',',$_SESSION['ardata'][$rid]['r_lotto_hun_pay1']); 
    $rdis[]=@explode(',',$_SESSION['ardata'][$rid]['r_lotto_hun_dis1']); 
  }elseif($_SESSION['m1']['m_lotto_hun_setbet']==2){
    $rpay[]=@explode(',',$_SESSION['ardata'][$rid]['r_lotto_hun_pay2']); 
    $rdis[]=@explode(',',$_SESSION['ardata'][$rid]['r_lotto_hun_dis2']); 
  }else{
    $rpay[]=@explode(',',$_SESSION['ardata'][$rid]['r_lotto_hun_pay3']); 
    $rdis[]=@explode(',',$_SESSION['ardata'][$rid]['r_lotto_hun_dis3']); 
  }
}


$chkOpen = $rpay[0];
// print_r($chkOpen);

?>

<div class="container-fluid h-100">
  <div class="row h-100">
    <div class="col-md-6 col-lg-4 mx-auto border rounded p-1 h-100">
      <div class="h-100">
        <form class="h-100 auto-form" action="process/<?=($zone!=1) ? "lothun" : "lotto";?>/save_lotto_extra.php" method="post" data-onsuccess="SaveLottoSuccess" data-onfail="SaveLottoFail" data-onbegin="manageFormData" data-oninit="addLoadingTask" data-oncomplete="subtractLoadingTask,removeHiddenInput" data-lottype="extra">
          <fieldset class="h-100">
            <input type="hidden" name="tlot" value="extra">
            <input type="hidden" name="zone" value="<?=$zone;?>">
            <input type="hidden" name="rob" value="<?=$rob;?>">
            <div class="d-flex flex-column h-100">
              <?
                include 't_box.php';
              ?>
              <div>
                <div class="row no-gutters mt-2">
                  <div class="col-3">
                    <label class="checkbox-checkmark my-0 d-flex justify-content-center">
                      <input type="radio" name="select_s" value="1" class="hideInput rdo_select_s" checked="checked" />
                      <span class="checkmark">
                        <span class="onCheck d_block"></span>
                        <span class="onUncheck d_block"></span>
                      </span>
                      <span class="ml-2"><?=$lang_member[1348];?></span>
                    </label>
                  </div>
                  <div class="col-3">
                    <label class="checkbox-checkmark my-0 d-flex justify-content-center">
                      <input type="radio" name="select_s" value="2" class="hideInput rdo_select_s" />
                      <span class="checkmark">
                        <span class="onCheck d_block"></span>
                        <span class="onUncheck d_block"></span>
                      </span>
                      <span class="ml-2"><?=$lang_member[1346];?></span>
                    </label>
                  </div>
                  <div class="col-3">
                    <label class="checkbox-checkmark my-0 d-flex justify-content-center">
                      <input type="radio" name="select_s" value="3" class="hideInput rdo_select_s" />
                      <span class="checkmark">
                        <span class="onCheck d_block"></span>
                        <span class="onUncheck d_block"></span>
                      </span>
                      <span class="ml-2"><?=$lang_member[604];?></span>
                    </label>
                  </div>
                  <div class="col-3">
                    <label class="checkbox-checkmark my-0 d-flex justify-content-center">
                      <input type="radio" name="select_s" value="4" class="hideInput rdo_select_s" />
                      <span class="checkmark">
                        <span class="onCheck d_block"></span>
                        <span class="onUncheck d_block"></span>
                      </span>
                      <span class="ml-2"><?=$lang_member[2204];?></span>
                    </label>
                  </div>
                </div>
                <div class="mt-2">
                  <table class="w-100 lotto-table-sizing s_s h_1" cellpadding="2" cellspacing="0">  <!-- 3 ใน 5 -->
                    <tbody>
                    <tr>
                      <td></td>
                      <td><button class="btn btn-light border px-0 w-100 btn-copy-num" data-copy-num-ref="s1"><?=$lang_member[371];?></button></td>
                    </tr>
                    <tr class="small">
                      <td>
                        <div class="m_bg px-1 py-2 text-white text-center"><?=$lang_member[381];?></div>
                      </td>
                      <td>
                        <div class="m_bg px-1 py-2 text-white text-center"><?=$lang_member[1655];?></div>
                      </td>
                    </tr>
                    </tbody>
                  </table>
                  <table class="w-100 lotto-table-sizing s_s h_2" cellpadding="2" cellspacing="0">  <!-- 3 ใน 4 -->
                    <tbody>
                    <tr>
                      <td></td>
                      <td><button class="btn btn-light border px-0 w-100 btn-copy-num" data-copy-num-ref="s2"><?=$lang_member[371];?></button></td>
                    </tr>
                    <tr class="small">
                      <td>
                        <div class="m_bg px-1 py-2 text-white text-center"><?=$lang_member[381];?></div>
                      </td>
                      <td>
                        <div class="m_bg px-1 py-2 text-white text-center"><?=$lang_member[1655];?></div>
                      </td>
                    </tr>
                    </tbody>
                  </table>
                  <table class="w-100 lotto-table-sizing s_s h_3" cellpadding="2" cellspacing="0">  <!-- 19 หาง -->
                    <tbody>
                    <tr>
                      <td></td>
                      <td><button class="btn btn-light border px-0 w-100 btn-copy-num" data-copy-num-ref="s3-1"><?=$lang_member[371];?></button></td>
                      <td><button class="btn btn-light border px-0 w-100 btn-copy-num" data-copy-num-ref="s3-2"><?=$lang_member[371];?></button></td>
                    </tr>
                    <tr class="small">
                      <td>
                        <div class="m_bg px-1 py-2 text-white text-center"><?=$lang_member[381];?></div>
                      </td>
                      <td>
                        <div class="m_bg px-1 py-2 text-white text-center"><?=$lang_member[448];?></div>
                      </td>
                      <td>
                        <div class="m_bg px-1 py-2 text-white text-center"><?=$lang_member[450];?></div>
                      </td>
                    </tr>
                    </tbody>
                  </table>
                  <!-- <table class="w-100 lotto-table-sizing s_s h_4" cellpadding="2" cellspacing="0">   อื่นๆ 
                    <tbody>
                    <tr>
                      <td></td>
                      <td><button class="btn btn-light border px-0 w-100"><?=$lang_member[371];?></button></td>
                    </tr>
                    <tr>
                      <td>
                        <div class="m_bg px-1 py-2 text-white text-center"><?=$lang_member[381];?></div>
                      </td>
                      <td>
                        <div class="m_bg px-1 py-2 text-white text-center"><?=$lang_member[1655];?></div>
                      </td>
                    </tr>
                    </tbody>
                  </table> -->
                </div>
              </div>
              <div style="display: none;" class="s_s lotto-scroll-area" id="s_1"> <!-- 3 ใน 5 -->
                <div>
                  <div>
                    <table class="w-100 lotto-table-sizing" cellpadding="2" cellspacing="0">
                      <tbody>
                      <? 
                        for ($i=1; $i < 10+1; $i++) { 
                          $chkId = "s1_chk_$i";
                          $numId = "s1_num_$i";
                          $_n1Id = "s1_price_$i";
                      ?>
                      <tr>
                        <td>
                          <table class="w-100" style="table-layout: fixed;">
                            <tr>
                              <td class="w-25"><?=sprintf('%02d', $i).".";?></td>
                              <td>
                              	<?if($chkOpen[15] != ""){?>
                                	<input type="text" class="form-control control-sc no-outline px-0 text-center inputFilter" name="<?=$numId;?>" id="<?=$numId;?>" data-filter-type="numeric" data-filter-add-comma="false" maxlength="5"/>
                                <?}else{?>
                                	<input type="text" class="form-control control-sc no-outline px-0 text-center" disabled="disabled" />
                                <?}?>
                              </td>
                            </tr>
                          </table>
                        </td>
                        <td>
                          <div class="d-flex">
                          	<?if($chkOpen[15] != ""){?>
                            	<input type="text" class="form-control control-sc no-outline px-0 text-center inputFilter copy-num-s1" name="<?=$_n1Id;?>" id="<?=$_n1Id;?>" data-filter-type="integer" />
                            <?}else{?>
                                <input type="text" class="form-control control-sc no-outline px-0 text-center" disabled="disabled" />
							              <?}?>
                          </div>
                        </td>
                      </tr>
                      <? } ?>
                      </tbody>
                    </table>
                  </div>
                </div>
              </div>
              <div style="display: none;" class="s_s lotto-scroll-area" id="s_2"> <!-- 3 ใน 4 -->
                <div>
                  <div>
                    <table class="w-100 lotto-table-sizing" cellpadding="2" cellspacing="0">
                      <tbody>
                      <? 
                        for ($i=1; $i < 10+1; $i++) { 
                          $chkId = "s2_chk_$i";
                          $numId = "s2_num_$i";
                          $_n1Id = "s2_price_$i";
                      ?>
                      <tr>
                        <td>
                          <table class="w-100" style="table-layout: fixed;">
                            <tr>
                              <td class="w-25"><?=sprintf('%02d', $i).".";?></td>
                              <td>
                              	<?if($chkOpen[14] != ""){?>
                                	<input type="text" class="form-control control-sc no-outline px-0 text-center inputFilter" name="<?=$numId;?>" id="<?=$numId;?>" data-filter-type="numeric" data-filter-add-comma="false"  maxlength="5"/>
                                <?}else{?>
                                	<input type="text" class="form-control control-sc no-outline px-0 text-center" disabled="disabled" />
								                <?}?>
                              </td>
                            </tr>
                          </table>
                        </td>
                        <td>
                          <div class="d-flex">
                            <?if($chkOpen[14] != ""){?>
                            	<input type="text" class="form-control control-sc no-outline px-0 text-center inputFilter copy-num-s2" name="<?=$_n1Id;?>" id="<?=$_n1Id;?>" data-filter-type="integer" />
                            <?}else{?>
                                <input type="text" class="form-control control-sc no-outline px-0 text-center" disabled="disabled" />
							             <?}?>
                          </div>
                        </td>
                      </tr>
                      <? } ?>
                      </tbody>
                    </table>
                  </div>
                </div>
              </div>
              <div style="display: none;" class="s_s lotto-scroll-area" id="s_3"> <!-- 19 หาง -->
                <div>
                  <div>
                    <table class="w-100 lotto-table-sizing" cellpadding="2" cellspacing="0">
                      <tbody>
                      <? 
                        for ($i=1; $i < 10+1; $i++) { 
                          $chkId = "s3_chk_$i";
                          $numId = "s3_num_$i";
                          $_n1Id = "s3_top_$i";
                          $_n2Id = "s3_down_$i";
                      ?>
                      <tr>
                        <td>
                          <table class="w-100" style="table-layout: fixed;">
                            <tr>
                              <td class="w-25"><?=sprintf('%02d', $i).".";?></td>
                              <td>
                                <input type="text" class="form-control control-sc no-outline px-0 text-center inputFilter" name="<?=$numId;?>" id="<?=$numId;?>" data-filter-type="numeric" data-filter-add-comma="false"  maxlength="1"/>
                              </td>
                            </tr>
                          </table>
                        </td>
                        <td>
                          <div class="d-flex">
                            <input type="text" class="form-control control-sc no-outline px-0 text-center inputFilter copy-num-s3-1" name="<?=$_n1Id;?>" id="<?=$_n1Id;?>" data-filter-type="numeric" />
                          </div>
                        </td>
                        <td>
                          <div class="d-flex">
                            <input type="text" class="form-control control-sc no-outline px-0 text-center inputFilter copy-num-s3-2" name="<?=$_n2Id;?>" id="<?=$_n2Id;?>" data-filter-type="numeric" />
                          </div>
                        </td>
                      </tr>
                      <? } ?>
                      </tbody>
                    </table>
                  </div>
                </div>
              </div>
              <div style="display: none;" class="s_s lotto-scroll-area" id="s_4"> <!-- อื่นๆ -->
              	<?if($chkOpen[0] != ""){?>
                <div>
                  <div class="m_bg text-white p-1 small"><div class="m-0"><?=$lang_member[618];?></div></div> <!-- 6 กลับ -->
                  <table class="w-100 lotto-table-sizing" cellpadding="2" cellspacing="0">
                    <tbody>
                      <tr>
                        <td>
                          <label for="6turn_num" class="d-block text-center mb-0"><?=$lang_member[381];?></label>
                          <input type="text" class="form-control control-sc no-outline px-0 text-center inputFilter" data-filter-type="numeric" data-filter-add-comma="false" name="6turn_num" id="6turn_num" maxlength="3" />
                        </td>
                        <td>
                          <label for="6turn_top" class="d-block text-center mb-0"><?=$lang_member[448];?></label>
                          <?if($chkOpen[1] != ""){?>
                          <input type="text" class="form-control control-sc no-outline px-0 text-center inputFilter" data-filter-type="numeric" name="6turn_top" id="6turn_top" />
                          <?}else{?>
                            <input type="text" class="form-control control-sc no-outline px-0 text-center" disabled="disabled" />
                          <?}?>
                        </td>
                        <td>
                          <label for="6turn_down" class="d-block text-center mb-0"><?=$lang_member[450];?></label>
                          <?if($chkOpen[2] != ""){?>
                          <input type="text" class="form-control control-sc no-outline px-0 text-center inputFilter" data-filter-type="numeric" name="6turn_down" id="6turn_down" />
                          <?}else{?>
                            <input type="text" class="form-control control-sc no-outline px-0 text-center" disabled="disabled" />
                          <?}?>
                        </td>
                        <td>
                          <label for="6turn_front" class="d-block text-center mb-0"><?=$lang_member[533];?></label>
                          <?if($chkOpen[16] != ""){?>
                          <input type="text" class="form-control control-sc no-outline px-0 text-center inputFilter" data-filter-type="numeric" name="6turn_front" id="6turn_front" />
                          <?}else{?>
                            <input type="text" class="form-control control-sc no-outline px-0 text-center" disabled="disabled" />
						              <?}?>
                        </td>
                      </tr>
                    </tbody>
                  </table>
                </div>
                <?}?>

                <?if($chkOpen[0] != ""){?>
                <div>
                  <table class="w-100">
                    <tbody>
                      <tr>
                        <td class="w-50"> <!-- เลขพี่น้อง -->
                          <div class="m_bg text-white p-1 small"><div class="m-0"><?=$lang_member[540];?></div></div>
                          <table class="w-100 lotto-table-sizing" cellpadding="2" cellspacing="0">
                            <tbody>
                              <tr>
                                <td>
                                  <label for="nearby_top" class="d-block text-center mb-0"><?=$lang_member[448];?></label>
                                  <input type="text" class="form-control control-sc no-outline px-0 text-center inputFilter" data-filter-type="numeric" name="nearby_top" id="nearby_top" />
                                </td>
                                <td>
                                  <label for="nearby_down" class="d-block text-center mb-0"><?=$lang_member[450];?></label>
                                  <input type="text" class="form-control control-sc no-outline px-0 text-center inputFilter" data-filter-type="numeric" name="nearby_down" id="nearby_down" />
                                </td>
                              </tr>
                            </tbody>
                          </table>
                        </td>
                        <td class="w-50"> <!-- เลขเบิ้ล -->
                          <div class="m_bg text-white p-1 small"><div class="m-0"><?=$lang_member[541];?></div></div>
                          <table class="w-100 lotto-table-sizing" cellpadding="2" cellspacing="0">
                            <tbody>
                              <tr>
                                <td>
                                  <label for="double_top" class="d-block text-center mb-0"><?=$lang_member[448];?></label>
                                  <input type="text" class="form-control control-sc no-outline px-0 text-center inputFilter" data-filter-type="numeric" name="double_top" id="double_top" />
                                </td>
                                <td>
                                  <label for="double_down" class="d-block text-center mb-0"><?=$lang_member[450];?></label>
                                  <input type="text" class="form-control control-sc no-outline px-0 text-center inputFilter" data-filter-type="numeric" name="double_down" id="double_down" />
                                </td>
                              </tr>
                            </tbody>
                          </table>
                        </td>
                      </tr>
                    </tbody>
                  </table>
                </div>
                <?}?>
				
				<?if($chkOpen[8] != ""){?>
                <div> <!-- 1ตัวบน สูง-ต่ำ -->
                  <div class="m_bg text-white p-1 small"><div class="m-0"><?=$lang_member[2205];?></div></div>
                  <table class="w-100 lotto-table-sizing" cellpadding="2" cellspacing="0">
                    <tbody>
                      <tr>
                        <td>
                          <label class="checkbox-checkmark my-0 d-flex">
                            <input type="radio" name="1fud" value="1" class="hideInput rdo_select_s" checked="checked" />
                            <span class="checkmark">
                              <span class="onCheck d_block"></span>
                              <span class="onUncheck d_block"></span>
                            </span>
                            <span class="ml-2"><?=$lang_member[314];?></span>
                          </label>
                        </td>
                        <td>
                          <label class="checkbox-checkmark my-0 d-flex">
                            <input type="radio" name="1fud" value="2" class="hideInput rdo_select_s" />
                            <span class="checkmark">
                              <span class="onCheck d_block"></span>
                              <span class="onUncheck d_block"></span>
                            </span>
                            <span class="ml-2"><?=$lang_member[312];?></span>
                          </label>
                        </td>
                        <td>
                          <input type="text" class="form-control control-sc no-outline px-0 text-center inputFilter" data-filter-type="numeric" name="1fud_num" id="1fud_num" />
                        </td>
                      </tr>
                    </tbody>
                  </table>
                </div>
                <?}?>

                <?if($chkOpen[9] != ""){?>
                <div> <!-- 2ตัวบน สูง-ต่ำ -->
                  <div class="m_bg text-white p-1 small"><div class="m-0"><?=$lang_member[2206];?></div></div>
                  <table class="w-100 lotto-table-sizing" cellpadding="2" cellspacing="0">
                    <tbody>
                      <tr>
                        <td>
                          <label class="checkbox-checkmark my-0 d-flex">
                            <input type="radio" name="2fud" value="1" class="hideInput rdo_select_s" checked="checked" />
                            <span class="checkmark">
                              <span class="onCheck d_block"></span>
                              <span class="onUncheck d_block"></span>
                            </span>
                            <span class="ml-2"><?=$lang_member[314];?></span>
                          </label>
                        </td>
                        <td>
                          <label class="checkbox-checkmark my-0 d-flex">
                            <input type="radio" name="2fud" value="2" class="hideInput rdo_select_s" />
                            <span class="checkmark">
                              <span class="onCheck d_block"></span>
                              <span class="onUncheck d_block"></span>
                            </span>
                            <span class="ml-2"><?=$lang_member[312];?></span>
                          </label>
                        </td>
                        <td>
                          <input type="text" class="form-control control-sc no-outline px-0 text-center inputFilter" data-filter-type="numeric" name="2fud_num" id="2fud_num" />
                        </td>
                      </tr>
                    </tbody>
                  </table>
                </div>
                <?}?>

                <?if($chkOpen[10] != ""){?>
                <div> <!-- 3ตัวบน สูง-ต่ำ -->
                  <div class="m_bg text-white p-1 small"><div class="m-0"><?=$lang_member[2207];?></div></div>
                  <table class="w-100 lotto-table-sizing" cellpadding="2" cellspacing="0">
                    <tbody>
                      <tr>
                        <td>
                          <label class="checkbox-checkmark my-0 d-flex">
                            <input type="radio" name="3fud" value="1" class="hideInput rdo_select_s" checked="checked" />
                            <span class="checkmark">
                              <span class="onCheck d_block"></span>
                              <span class="onUncheck d_block"></span>
                            </span>
                            <span class="ml-2"><?=$lang_member[314];?></span>
                          </label>
                        </td>
                        <td>
                          <label class="checkbox-checkmark my-0 d-flex">
                            <input type="radio" name="3fud" value="2" class="hideInput rdo_select_s" />
                            <span class="checkmark">
                              <span class="onCheck d_block"></span>
                              <span class="onUncheck d_block"></span>
                            </span>
                            <span class="ml-2"><?=$lang_member[312];?></span>
                          </label>
                        </td>
                        <td>
                          <input type="text" class="form-control control-sc no-outline px-0 text-center inputFilter" data-filter-type="numeric" name="3fud_num" id="3fud_num" />
                        </td>
                      </tr>
                    </tbody>
                  </table>
                </div>
                <?}?>

				<?if($chkOpen[11] != ""){?>
                <div> <!-- 2ตัวล่าง สูง-ต่ำ -->
                  <div class="m_bg text-white p-1 small"><div class="m-0"><?=$lang_member[2208];?></div></div>
                  <table class="w-100 lotto-table-sizing" cellpadding="2" cellspacing="0">
                    <tbody>
                      <tr>
                        <td>
                          <label class="checkbox-checkmark my-0 d-flex">
                            <input type="radio" name="2dud" value="1" class="hideInput rdo_select_s" checked="checked" />
                            <span class="checkmark">
                              <span class="onCheck d_block"></span>
                              <span class="onUncheck d_block"></span>
                            </span>
                            <span class="ml-2"><?=$lang_member[314];?></span>
                          </label>
                        </td>
                        <td>
                          <label class="checkbox-checkmark my-0 d-flex">
                            <input type="radio" name="2dud" value="2" class="hideInput rdo_select_s" />
                            <span class="checkmark">
                              <span class="onCheck d_block"></span>
                              <span class="onUncheck d_block"></span>
                            </span>
                            <span class="ml-2"><?=$lang_member[312];?></span>
                          </label>
                        </td>
                        <td>
                          <input type="text" class="form-control control-sc no-outline px-0 text-center inputFilter" data-filter-type="numeric" name="2dud_num" id="2dud_num" />
                        </td>
                      </tr>
                    </tbody>
                  </table>
                </div>
                <?}?>

                <?if($chkOpen[12] != ""){?>
                <div> <!-- คู่คี่ -->
                  <div class="m_bg text-white p-1 small"><div class="m-0"><?=$lang_member[2209];?></div></div>
                  <table class="w-100 lotto-table-sizing" cellpadding="2" cellspacing="0">
                    <tbody>
                      <tr>
                        <td>
                          <label class="checkbox-checkmark my-0 d-flex">
                            <input type="radio" name="oe" value="1" class="hideInput rdo_select_s" checked="checked" />
                            <span class="checkmark">
                              <span class="onCheck d_block"></span>
                              <span class="onUncheck d_block"></span>
                            </span>
                            <span class="ml-2"><?=$lang_member[453];?></span>
                          </label>
                        </td>
                        <td>
                          <label class="checkbox-checkmark my-0 d-flex">
                            <input type="radio" name="oe" value="2" class="hideInput rdo_select_s" />
                            <span class="checkmark">
                              <span class="onCheck d_block"></span>
                              <span class="onUncheck d_block"></span>
                            </span>
                            <span class="ml-2"><?=$lang_member[459];?></span>
                          </label>
                        </td>
                        <td>
                          <input type="text" class="form-control control-sc no-outline px-0 text-center inputFilter" data-filter-type="numeric" name="oe_num" id="oe_num" />
                        </td>
                      </tr>
                    </tbody>
                  </table>
                </div>
                <?}?>

                 <?if($chkOpen[21] != "" || $chkOpen[22] != "" || $chkOpen[23] != ""){?>
                 	<!-- เลขปักหลัก * เช็ครวมก่อน ค่อยเช็คแยก -->
                <div>
                  <div class="m_bg text-white p-1 small"><div class="m-0"><?=$lang_member[484];?></div></div>
                  <table class="w-100 lotto-table-sizing" cellpadding="2" cellspacing="0">
                  	<?if($chkOpen[21] != ""){?>
                    <tbody>
                      <tr>
                        <td>
                          <div class="text-right"><?=$lang_member[1354];?>:</div>
                        </td>
                        <td>
                          <select name="digit_one" id="digit_one" class="custom-select">
                            <option value="-1">-</option>
                            <? for ($i=0; $i < 10; $i++) { ?>
                            <option value="<?=$i;?>"><?=$i;?></option>
                            <? } ?>
                          </select>
                        </td>
                        <td>
                          <input type="text" class="form-control control-sc no-outline px-0 text-center inputFilter" data-filter-type="numeric" name="digit_one_num" id="digit_one_num" />
                        </td>
                      </tr>
                    </tbody>
                    <?}?>
                    <?if($chkOpen[22] != ""){?>
                    <tbody>
                      <tr>
                        <td>
                          <div class="text-right"><?=$lang_member[1355];?>:</div>
                        </td>
                        <td>
                          <select name="digit_two" id="digit_two" class="custom-select">
                            <option value="-1">-</option>
                            <? for ($i=0; $i < 10; $i++) { ?>
                            <option value="<?=$i;?>"><?=$i;?></option>
                            <? } ?>
                          </select>
                        </td>
                        <td>
                          <input type="text" class="form-control control-sc no-outline px-0 text-center inputFilter" data-filter-type="numeric" name="digit_two_num" id="digit_two_num" />
                        </td>
                      </tr>
                    </tbody>
                    <?}?>
                    <?if($chkOpen[23] != ""){?>
                    <tbody>
                      <tr>
                        <td>
                          <div class="text-right"><?=$lang_member[1356];?>:</div>
                        </td>
                        <td>
                          <select name="digit_three" id="digit_three" class="custom-select">
                            <option value="-1">-</option>
                            <? for ($i=0; $i < 10; $i++) { ?>
                            <option value="<?=$i;?>"><?=$i;?></option>
                            <? } ?>
                          </select>
                        </td>
                        <td>
                          <input type="text" class="form-control control-sc no-outline px-0 text-center inputFilter" data-filter-type="numeric" name="digit_three_num" id="digit_three_num" />
                        </td>
                      </tr>
                    </tbody>
                    <?}?>
                  </table>
                </div>
                <?}?>

              </div>
            </div>  
          </fieldset>
        </form>
      </div>
    </div>
  </div>
</div>
<script>
  $(document).off('change', 'input[name="select_s"]');
  $(document).off('reset', '#form_save_lot');

  $(document).on('change', 'input[name="select_s"]', function(event){
    event.preventDefault();
    var s = $('input[name="select_s"]:checked').val();
    $('.s_s').hide();
    $('#s_'+s+',.s_s.h_'+s).show();
  });
  $(document).on('reset', '#form_save_lot', function(event) {
    setTimeout(function(){
      $('input[name="select_s"]').first().trigger('change');
    }, 0)
  });
  $('input[name="select_s"]').first().trigger('change');
</script>
