<?php 

    require('inc_head.php');

    if(empty($_POST["data"]["l_zone"]))
    {
        $_POST["data"]["l_zone"] = 2;
    }

    $sql = "SELECT `r_lotto_hun_over` , `r_lotto_hun_over_".$_POST["data"]["l_zone"]."` FROM `bom_tb_agent` WHERE `r_id` = ".$_POST["session"]['r_id']."";
    $rs= sql_array($sql);
    $ex_over = explode(",", $rs['r_lotto_hun_over_'.$_POST["data"]["l_zone"]]);

?>


<div class="row">
    <div class="widget-box hidden-boder">
        <div class="widget-header widget-header-blue widget-header-flat hidden">
            <h4 class="widget-title lighter"><strong>  </strong></h4>
        </div>
        <div class="widget-body" id="maxReceive">
            <div class="widget-main">
                <div class="row">
                    <div>
                         <?php 
                            $lot_zone = $lot_zone[$_POST["session"]["AGlang"]]["zone"];
                         ?>
                        <form class="form-horizontal" id="" method="post">
                            <div class="col-xs-12 col-md-12">
                            <div class="form-group" style="padding:5px 15px; width: 100%;">   
                                    <div class="mobile-padding input-box button-box" style="float: left;     width: 100%;">                              
                                    <label class="control-label text-left label-1"  style="min-width: 80px;" for="l_zone"><?=$lang_ag[1657];?> : </label>
                                    <select class="input-sm lot_sl" style="height:30px; min-width: 100px;" id="l_zone" name="l_zone" onchange="reload_form(this);">
                                        <?php foreach ($lot_zone as $key => $value) {
                                          if($key != 1)
                                          {
                                            $slt = ($_POST["data"]["l_zone"] == $key) ? "selected" : "";
                                            ?>
                                               <option value="<?=$key;?>" <?=$slt;?> > <?=$value;?></option>
                                            <?
                                          }  
                                        } ?>

                                    </select>

                                
                                    </div>   
                                   
                            </div>
                            </div>
                        
                            <div class="table-responsive col-xs-6">
                                <footer>
                                        </footer><table class="table  table-bordered table-hover text-center">
                                    <thead>
                                        <tr>
                                            <th><center> <?=$lang_ag[177];?> </center></th>
                                            <th><center> Max / Number </center></th>
                                        </tr>
                                    </thead>
                                    <tbody id="append_point">

                                         <?php 
                                            
                                            foreach ($lotHun_typeArry as $key => $value) {
                                                if($key != 31)
                                                {
                                                    $val = ($ex_over[$key]!="") ? number_format($ex_over[$key]) : 0;
                                                   ?>
                                                     <tr>
                                                        <td width="70%"><?=$value;?> </td>
                                                        <td width="30%">
                                                            <input type="text" id="tlot_max_<?=$key;?>" name="tlot_max_<?=$key;?>" class="text-max-receive input-num2digt " value="<?=$val;?>">       
                                                        </td>
                                                    </tr>
                                                   <? 
                                                 }  
                                                
                                            }
                                         ?>

                                     </tbody>
                                    <tbody>
                                        <tr>
                                            <td colspan="2" align="center">
                                                <label class="inline" style="margin-right: 10px;">
                                                        <div id="soccer_live_active">
                                                            <input type="checkbox" class="ace" name="change_all" id="change_all">
                                                            <span class="lbl"> <?=$lang_ag[2164];?> </span>
                                                        </div>
                                                </label>    
                                                <button type="button" class="btn btn-primary btn-sm" onclick="submit_data()">
                                                    <span class="fa fa fa-floppy-o icon-on-right bigger-110"></span>
                                                    <?=$lang_ag[178];?> 
                                                </button>
                                                <button type="reset" class="btn btn-danger btn-sm">
                                                    <span class="fa fa-refresh icon-on-right bigger-110"></span>
                                                    <?=$lang_ag[179];?>
                                                </button>
                                            </td>
                                        </tr>
                                    
                                </tbody>
                            </table>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<script type="text/javascript">

    $("form").submit(function(){
        // $("#maxReceive").load('show');
    });

    function submit_data( type ){

        $("#maxReceive").load('show');
        var aData = {};
        var x = $("form").serializeArray();
        $.each(x, function(i, field){
            aData[ field.name ] = field.value;

        });

        $.post("lottoSetMaxReceiveSave.php", aData, function( res ){
            var response = jQuery.parseJSON( res );
            if(response.status){
                $.gritter.add({
                    title: "",
                    text: '<h5><i class="fa fa-check" aria-hidden="true"></i> '+response.msg+'</h5>',
                    class_name: 'gritter-success'                    
                });
                getMenu('lottoSetMaxReceive','?l_zone='+response.l_zone);

            }else{
                $.gritter.add({
                    title: "",
                    text: '<h5><i class="fa fa-ban" aria-hidden="true"></i> '+response.msg+'</h5>',
                    class_name: 'gritter-error'
                });
            }
        });
    }

    function reload_form(e)
    {
        var val = $(e).val()
        getMenu('lottoSetMaxReceive','?l_zone='+val);
   
    }
</script>
