<?php require('inc_head.php');?>

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
                    <strong> <?=$lang_cashSetting[3];?></strong>
                    <label class="widget-toolbar no-border">
                        <input name="show_member" id="show_member" class="ace ace-switch ace-switch-6" type="checkbox" value="Y">
                        <span class="lbl">&nbsp;&nbsp;</span>
                    </label>
                </h4>
            </div>
            <div class="widget-body">
               <div class="widget-main no-padding">
                    <div class="dialogs">
                        <div class="itemdiv dialogdiv">
                            <div class="form-group">
                                <label class="col-xs-4 col-sm-4 control-label no-padding-right" for="form-field-1"><strong> <?=$lang_cashSetting[4];?> : </strong></label>
                                <div class="col-xs-8 col-sm-5">
                                    <select class="form-control col-xs-12 col-sm-12" id="deposit_open" name="deposit_open">
                                        <option value="Y"><?=$lang_cashSetting[5];?></option>
                                        <option value="N"><?=$lang_cashSetting[6];?></option>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-xs-4 col-sm-4 control-label no-padding-right" for="form-field-1"><strong><?=$lang_cashSetting[7];?> : </strong></label>
                                <div class="col-xs-8 col-sm-5">
                                    <input type="text" id="deposit_min" name="deposit_min" placeholder="minimum" class="col-xs-12 col-sm-12 numeric" value="0.00">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-xs-4 col-sm-4 control-label no-padding-right" for="form-field-1"><strong> <?=$lang_cashSetting[8];?> : </strong></label>
                                <div class="col-xs-8 col-sm-5">
                                    <input type="text" id="deposit_max" name="deposit_max" placeholder="maximum" class="col-xs-12 col-sm-12 numeric" value="0.00">
                                </div>
                            </div>
                            <hr>
                            <div class="form-group">
                                <label class="col-xs-4 col-sm-4 control-label no-padding-right" for="form-field-1"><strong> <?=$lang_cashSetting[10];?> : </strong></label>
                                <div class="col-xs-8 col-sm-5">
                                    <select class="form-control col-xs-12 col-sm-12" id="withdrawal_open" name="withdrawal_open">
                                        <option value="Y"><?=$lang_cashSetting[5];?></option>
                                        <option value="N"><?=$lang_cashSetting[6];?></option>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-xs-4 col-sm-4 control-label no-padding-right" for="form-field-1"><strong> <?=$lang_cashSetting[11];?> : </strong></label>
                                <div class="col-xs-8 col-sm-5">
                                    <input type="text" id="withdrawal_count" name="withdrawal_count" placeholder="minimum" class="col-xs-12 col-sm-12" value="0">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-xs-4 col-sm-4 control-label no-padding-right" for="form-field-1"><strong> <?=$lang_cashSetting[12];?> : </strong></label>
                                <div class="col-xs-8 col-sm-5">
                                    <input type="text" id="withdrawal_min" name="withdrawal_min" placeholder="maximum" class="col-xs-12 col-sm-12 numeric" value="0.00">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-xs-4 col-sm-4 control-label no-padding-right" for="form-field-1"><strong> <?=$lang_cashSetting[13];?> : </strong></label>
                                <div class="col-xs-8 col-sm-5">
                                    <input type="text" id="withdrawal_max" name="withdrawal_max" placeholder="maximum" class="col-xs-12 col-sm-12 numeric" value="0.00">
                                </div>
                            </div><hr>
                                                      <div class="form-group">
                                <div class="col-md-offset-4 col-md-8">
                                    <button type="button" class="btn btn-primary" onclick="cashSettingSave();">
                                        <span class="fa fa fa-floppy-o icon-on-right bigger-110"></span>
                                        <?=$lang_cashSetting[14];?>                                    </button>
                                    <button type="reset" class="btn btn-danger ">
                                        <span class="fa fa-refresh icon-on-right bigger-110"></span>
                                        <?=$lang_cashSetting[15];?>                                    </button>
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