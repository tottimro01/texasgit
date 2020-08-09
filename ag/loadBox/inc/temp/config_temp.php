<?
 if($_POST["session"]["AGlang"]=="")
 {
   $_POST["session"]["AGlang"]="th";
 }
require('../conn.php');
require('../function.php');
require('../../lang/ag_lang.php');

$rs_cset = sql_array("select * from bom_tb_agent where r_id = '".$_POST["session"]["r_id"]."'");

$sql="select * from bom_tb_agent where r_id = '".$_POST["session"]["r_id"]."' ";
$re=sql_array($sql);

?>
<style type="text/css">
  @media (max-width: 990px) { 
    .form-group div,label{
      padding-top: 5px;
    }
  }
</style>
<div class="pdTop">
    <div class="widget-box col-sm-12" id="loadSetting">
        
            <div class="">
                <h4 class="widget-title lighter smaller">
                    &nbsp;&nbsp;
                    <strong> <?=$lang_ag[2118];?> </strong>
                  
                </h4>
            </div>
            <div class="widget-body">
               <div class="widget-main no-padding">
                    <div class="dialogs">

                      
                      <form class="form-horizontal" id="main_form" name="main_form" action="" method="post"> 
                        <div class="itemdiv dialogdiv">

                            <div class="row">
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label class="col-xs-4 col-sm-4 control-label no-padding-right" for="form-field-1"><strong> 
                                          <?=$lang_ag[2113];?> :  </strong></label>
                                        <div class="col-xs-8 col-sm-5">
                                            <input type="text" id="tlogo" name="tlogo" value="<?=$re["r_mes_logo"];?>" class="col-xs-12 col-sm-12" placeholder="https://uppic.cc/logo.jpg">
                                            <span><?=$lang_ag[2114];?> 80px  <a href="https://uppic.cc/" target="blank">[<?=$lang_ag[2115];?>]</a> </span>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label class="col-xs-4 col-sm-4 control-label no-padding-right"  for="form-field-1"><strong> 
                                         <?=$lang_ag[2116];?> : </strong></label>
                                        <div class="col-xs-8 col-sm-5">
                                            <input type="text" id="tname" name="tname" value="<?=$re["r_mes_name"];?>" class="col-xs-12 col-sm-12">
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label class="col-xs-4 col-sm-4 control-label no-padding-right" for="form-field-1"><strong> 
                                         <?=$lang_ag[2117];?> : </strong></label>
                                        <div class="col-xs-8 col-sm-5">
                                            <input type="text" id="ttxt" name="ttxt" value="<?=$re["r_mes_bin"];?>" class="col-xs-12 col-sm-12">
                                        </div>
                                    </div>
                                </div>

                                <div class="col-sm-6">
                                    <img src="assets/img/slip.jpg" alt="">
                                </div>

                                <div class="col-sm-12">
                                    <div class="form-group">
                                        <div class="col-md-offset-4 col-md-8">
                                            <button type="button" class="btn btn-primary" onclick="set_config();">
                                                <span class="fa fa fa-floppy-o icon-on-right bigger-110"></span>
                                                <?=$lang_cashSetting[14];?> 
                                            </button>
                                            
                                        </div>
                                    </div>
                                </div>

                            </div>
                        </div>
                        </form>
                    </div>
                </div>
            </div><!-- end widget-body -->
      
    </div>
</div>
<script type="text/javascript">


  function set_config()
  {
    $("#loadSetting").load('show');
    var serializeFrm = $("#main_form").serializeArray();

    $.ajax({
            url: path_host+'set_config.php',
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
                    getMenu('config');
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

    // function cashSettingSave(type){

    //     $("#loadSetting").load('show');

    //     var serializeFrm = $("form").serializeArray();

    //     $.ajax({
    //         url: path_host+'cashSettingSave.php',
    //         type: 'POST',
    //         data: serializeFrm,
    //         dataType: 'json',
    //         success: function (response) {
    //             // console.log(response);
    //             $("#loadSetting").load('hide');
                
    //             if(response.status){
    //                 $.gritter.add({
    //                     title: "",
    //                     text: '<h5><i class="fa fa-check" aria-hidden="true"></i> '+response.msg+'</h5>',
    //                     class_name: 'gritter-success'
    //                 });
    //                 getMenu('cashSetting');
    //             }else{
    //                 $.gritter.add({
    //                     title: "",
    //                     text: '<h5><i class="fa fa-ban" aria-hidden="true"></i> '+response.msg+'</h5>',
    //                     class_name: 'gritter-error'
    //                 });
    //             }
                
    //         },
    //         error: function (response) {
    //             console.log(response);
    //         }
    //     });
    // }

</script>