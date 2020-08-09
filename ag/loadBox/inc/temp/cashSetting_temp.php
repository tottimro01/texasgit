<?
 if($_POST["session"]["AGlang"]=="")
 {
   $_POST["session"]["AGlang"]="th";
 }
require('../conn.php');
require('../function.php');
require('../../lang/ag_lang.php');

$rs_cset = sql_array("select * from bom_tb_agent where r_id = '".$_POST["session"]["r_id"]."'");
?>
<style type="text/css">
  @media (max-width: 990px) { 
    .form-group div,label{
      padding-top: 5px;
    }
  }
</style>
<div class="pdTop">
    <div class="widget-box col-sm-8" id="loadSetting">
        <form class="form-horizontal" id="frmSetting" name="frmSetting" action="" method="post">
            <div class="">
                <h4 class="widget-title lighter smaller">
                    &nbsp;&nbsp;
                    <strong> <?=$lang_ag[281];?></strong>
                    <label class="widget-toolbar no-border">
                        <input name="show_member" id="show_member" class="ace ace-switch ace-switch-6" type="checkbox" value="Y"<? if($rs_cset["r_open_transfer"]==1){ ?> checked="checked"<? } ?>>
                        <span class="lbl">&nbsp;&nbsp;</span>
                    </label>
                </h4>
            </div>
            <div class="widget-body">
               <div class="widget-main no-padding">
                    <div class="dialogs">
                        <div class="itemdiv dialogdiv">
                            <div class="form-group">
                                <label class="col-xs-4 col-sm-4 control-label no-padding-right" for="form-field-1"><strong> <?=$lang_ag[282];?> : </strong></label>
                                <div class="col-xs-8 col-sm-5">
                                    <select class="form-control col-xs-12 col-sm-12" id="deposit_open" name="deposit_open">
                                        <option value="Y"<? if($rs_cset["r_m_deposit_open"]==1){ ?> selected="selected"<? } ?>><?=$lang_ag[283];?></option>
                                        <option value="N"<? if($rs_cset["r_m_deposit_open"]==0){ ?> selected="selected"<? } ?>><?=$lang_ag[284];?></option>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-xs-4 col-sm-4 control-label no-padding-right" for="form-field-1"><strong><?=$lang_ag[285];?> : </strong></label>
                                <div class="col-xs-8 col-sm-5">
                                    <input type="text" id="deposit_min" name="deposit_min" placeholder="minimum" class="col-xs-12 col-sm-12 numeric" value="<?=number_format($rs_cset["r_m_deposit_min"] , 2)?>">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-xs-4 col-sm-4 control-label no-padding-right" for="form-field-1"><strong> <?=$lang_ag[286];?> : </strong></label>
                                <div class="col-xs-8 col-sm-5">
                                    <input type="text" id="deposit_max" name="deposit_max" placeholder="maximum" class="col-xs-12 col-sm-12 numeric" value="<?=number_format($rs_cset["r_m_deposit_max"] , 2)?>">
                                </div>
                            </div>
                            <hr>
                            <div class="form-group">
                                <label class="col-xs-4 col-sm-4 control-label no-padding-right" for="form-field-1"><strong> <?=$lang_ag[288];?> : </strong></label>
                                <div class="col-xs-8 col-sm-5">
                                    <select class="form-control col-xs-12 col-sm-12" id="withdrawal_open" name="withdrawal_open">
                                        <option value="Y"<? if($rs_cset["r_m_withdraw_open"]==1){ ?> selected="selected"<? } ?>><?=$lang_ag[283];?></option>
                                        <option value="N"<? if($rs_cset["r_m_withdraw_open"]==0){ ?> selected="selected"<? } ?>><?=$lang_ag[284];?></option>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-xs-4 col-sm-4 control-label no-padding-right" for="form-field-1"><strong> <?=$lang_ag[289];?> : </strong></label>
                                <div class="col-xs-8 col-sm-5">
                                    <input type="text" id="withdrawal_count" name="withdrawal_count" placeholder="minimum" class="col-xs-12 col-sm-12" value="<?=number_format($rs_cset["r_m_withdraw_num"])?>">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-xs-4 col-sm-4 control-label no-padding-right" for="form-field-1"><strong> <?=$lang_ag[290];?> : </strong></label>
                                <div class="col-xs-8 col-sm-5">
                                    <input type="text" id="withdrawal_min" name="withdrawal_min" placeholder="maximum" class="col-xs-12 col-sm-12 numeric" value="<?=number_format($rs_cset["r_m_withdraw_min"] , 2)?>">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-xs-4 col-sm-4 control-label no-padding-right" for="form-field-1"><strong> <?=$lang_ag[291];?> : </strong></label>
                                <div class="col-xs-8 col-sm-5">
                                    <input type="text" id="withdrawal_max" name="withdrawal_max" placeholder="maximum" class="col-xs-12 col-sm-12 numeric" value="<?=number_format($rs_cset["r_m_withdraw_max"] , 2)?>">
                                </div>
                            </div><hr>
                                                      <div class="form-group">
                                <div class="col-md-offset-4 col-md-8">
                                    <button type="button" class="btn btn-primary" onclick="cashSettingSave();">
                                        <span class="fa fa fa-floppy-o icon-on-right bigger-110"></span>
                                        <?=$lang_ag[178];?>                                    </button>
                                    <button type="reset" class="btn btn-danger ">
                                        <span class="fa fa-refresh icon-on-right bigger-110"></span>
                                        <?=$lang_ag[179];?>                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div><!-- end widget-body -->
        </form>
    </div>
</div>
<script type="text/javascript">

    function cashSettingSave(type){

        $("#loadSetting").load('show');

        var serializeFrm = $("form").serializeArray();

        $.ajax({
            url: path_host+'cashSettingSave.php',
            type: 'POST',
            data: serializeFrm,
            dataType: 'json',
            success: function (response) {
                // console.log(response);
                $("#loadSetting").load('hide');
                
                if(response.status){
                    $.gritter.add({
                        title: "",
                        text: '<h5><i class="fa fa-check" aria-hidden="true"></i> '+response.msg+'</h5>',
                        class_name: 'gritter-success'
                    });
                    getMenu('cashSetting');
                }else{
                    $.gritter.add({
                        title: "",
                        text: '<h5><i class="fa fa-ban" aria-hidden="true"></i> '+response.msg+'</h5>',
                        class_name: 'gritter-error'
                    });
                }
                
            },
            error: function (response) {
                console.log(response);
            }
        });
    }

</script>