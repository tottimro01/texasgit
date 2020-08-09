<?php 
	$isMute = $_COOKIE['m_lotto_mute'];
	// $zone
	$rs_date=sql_array("select * from bom_tb_lotto_ok where lot_zone = $zone group by ok_date order by o_limit_time desc limit 1");

	$CloseBig = $rs_date["o_limit_time"];
	$CloseSmall = $rs_date["o_limit_time_lang"];
	$o_limit_time =  _cvf($CloseBig, 5 , $lang);

?>
<div class="d-none">
	<audio src="assets/audio/soundtang_no.mp3" id="tang_no_audio"></audio>
</div>
<input type="hidden" name="lesson" value="<?=$o_limit_time;?>" />
<input type="hidden" name="close_time" value="<?=date("H:i",$CloseSmall);?>" />
<div id="t_box">
	<div class="p-1 mb-2 text-center text-white rounded-top m_bg">
		<h6 class="m-0"><?=$head_title;?></h6>
	</div>
	<div class="d-flex mb-2">
		<div class="mr-1">
			<label for="mname" class="mb-0" style="white-space: nowrap;"><?=$lang_member[118];?>: </label>
		</div>
		<div class="mr-1">
			<input type="text" name="mname" id="mname" class="form-control form-control-sm control-sc no-outline">
		</div>
		<div class="mr-1">
			<label for="poy_num" class="mb-0" style="white-space: nowrap;"><?=$lang_member[574];?>: </label></div>
		<div class="">
			<input type="text" name="poy_num" id="poy_num" class="form-control form-control-sm control-sc no-outline">
		</div>
	</div>
	<div class="row no-gutters">
		<div class="col-5">
			<div>
				<div class="small"><span><?=$lang_member[2198];?>: </span><span class="text-primary"><?=$o_limit_time;?></span></div>
				<div class="small"><span><?=$lang_member[1436];?>: </span><span class="text-danger"><?=date("H:i",$CloseSmall);?></span></div>
			</div>
		</div>
		<div class="col-7">
			<div class="d-flex">
				<label for="mute" class="btn btn-light border-dark mb-0 mr-1 btn-tbox mute checkbox-checkmark">
					<input type="checkbox" name="mute" id="mute" class="w-0 position-absolute" <?if($isMute==1){?>checked="checked"<?}?> onchange="SetIsMuteTrigger(this);">
					<span class="checkmark">
						<span class="onUncheck"><img src="assets/img/ui/ic_volume_off.png" /></span>
						<span class="onCheck"><img src="assets/img/ui/ic_volume_on.png" /></span>
					</span>
				</label>
				
				<button class="btn btn-light mr-1 btn-tbox refresh" onclick="ResetLottoForm(this.form); return false;"><img src="assets/img/ui/ic_refresh.png" /></button>
				
				<button class="btn btn-success flex-fill"><?=$lang_member[121];?></button>
			</div>	
		</div>
	</div>
</div>

 <div id="bill-view"></div>
<div id="bill-image-template" style="width: 512px; display: none;" class="position-absolute">
</div>
<div id="bill-image" style="display: none;">
</div>
<script id="tmpl_lotto_bill" type="text/x-jsrender">
  <div class="rounded bg-white py-3 h-100">
    <div class="px-1 h-100">
      <div class="{{if output == "view"}}d-flex flex-column{{/if}} h-100">

        <div class="text-center position-relative">
          {{if output == "view"}}
          <button id="close-bill-view" onclick="ClearViewBill(); return false;">
            <img src="assets/img/ui/icon_close.png" alt="X" class="w-100" />
          </button>
          {{/if}}
          <h6 class="m-0"><?=$lang_g['lotZone'][$_SESSION["zone_hun"]] . " ID:";?> {{:result.bill_id}}</h6>
          <h6 class="m-0"><?=$lang_member[569];?> {{:result.lesson}}</h6>
          <div class="small">
            <span class="mr-5"><?=$lang_member[2129];?> {{:result.date}}</span>
            <span><?=$lang_member[303];?> {{:result.time}}</span>
          </div>
          <div class="small">
            <span class="mr-5"><?=$lang_member[118];?>: {{:result.bill_cus_name}}</span>     
            <span><?=$lang_member[574];?>: {{:result.bill_no}}</span>
          </div>
        </div>
        <hr class="m_bd_color my-1 w-100" />

        <div class="text-center small">
          <div><?=$lang_member[571];?>: {{:result.branch}}</div>
          <div><?=$lang_member[573];?>: {{:result.saler}}</div>
        </div>
        <hr class="m_bd_color my-1 w-100" />

        <div class="p-2 lotto-scroll-area {{if status == 1}}text-success{{else}}text-danger{{/if}}">
          {{:result.message}}
        </div>
        <hr class="m_bd_color my-1 w-100" />

        <div>
          <h5 class="text-right"><?=$lang_member[503];?> {{:result.total}}</h5>
          {{if output == "view"}}
          <div class="text-right">
            <button class="btn btn-sm btn-success" onclick="DownloadBill(); return false;"><i class="fas fa-download"></i> <?=$lang_member[121];?></button>
          </div>
          {{/if}}
        </div>

      </div>
    </div>
  </div>
</script>
<script id="tmpl_lotto_bill_fail" type="text/x-jsrender">
  <div class="rounded bg-white py-3 h-100">
    <div class="px-1 h-100">
      <div class="{{if output == "view"}}d-flex flex-column{{/if}} h-100">
        
        <div class="text-center position-relative">
          {{if output == "view"}}
          <button id="close-bill-view" onclick="ClearViewBill(); return false;">
            <img src="assets/img/ui/icon_close.png" alt="X" class="w-100" />
          </button>
          <br>
          <br>
          {{/if}}
        </div>

        <hr class="m_bd_color my-1 w-100" />

        <div class="p-2 lotto-scroll-area {{if status == 1}}text-success{{else}}text-danger{{/if}}">
          {{:result.message}}
        </div>

        <hr class="m_bd_color my-1 w-100" />

      </div>
    </div>
  </div>
</script>