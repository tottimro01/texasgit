<?php require('inc_head.php');?>
<style type="text/css">
  @media (max-width: 990px) { 
    .form-group div,label{
      padding-top: 5px;
    }
  }
</style>
<div class="pdTop">
    <div class="widget-box col-xs-12 col-sm-8" id="loadChangePass">
        <form class="form-horizontal" id="frmChangePass" method="post">
            <div class="widget-body">
               <div class="widget-main no-padding">
                    <div class="dialogs">
                        <div class="itemdiv dialogdiv">
                            <div class="form-group">
                                <label class="col-sm-4 control-label no-padding-right" for="form-field-1"><strong> <?=$lang_ag[415];?>  : </strong></label>
                                <div class="col-sm-5">
                                    <input type="password" name="current_password" placeholder="<?=$lang_ag[415];?>" class="col-xs-12 col-sm-12">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-4 control-label no-padding-right" for="form-field-1"><strong> <?=$lang_ag[416];?> : </strong></label>
                                <div class="col-sm-5">
                                    <input type="password" name="new_password" placeholder="<?=$lang_ag[416];?>" class="col-xs-12 col-sm-12">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-4 control-label no-padding-right" for="form-field-1"><strong> <?=$lang_ag[417];?> : </strong></label>
                                <div class="col-sm-5">
                                    <input type="password" name="confirm_new_password" placeholder="<?=$lang_ag[417];?>" class="col-xs-12 col-sm-12">
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-md-offset-4 col-md-8">
                                    <button type="button" class="btn btn-primary" onclick="saveChangePass();">
                                        <span class="fa fa fa-floppy-o icon-on-right bigger-110"></span>
                                        <?=$lang_ag[178];?>                                    </button>
                                    <button type="reset" class="btn btn-danger">
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

    function saveChangePass(){

        $("#loadChangePass").load('show');

        var serializeFrm = $("form").serializeArray();

        $.ajax({
            url: path_host+'changePasswordSave.php',
            type: 'POST',
            data: serializeFrm,
            dataType: 'json',
            success: function (response) {
                // console.log(response);

                $("#loadChangePass").load('hide');

                if(response.status){
                    $.gritter.add({
                        title: "",
                        text: '<h5><i class="fa fa-check" aria-hidden="true"></i> '+response.msg+'</h5>',
                        class_name: 'gritter-success'
                    });
                    getMenu('changePassword');
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