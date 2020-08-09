<?php require('inc_head.php');?>
<div class="row">
    <div class="widget-box hidden-boder">
        <div class="widget-header widget-header-blue widget-header-flat hidden">
            <h4 class="widget-title lighter"><strong> Max Receive Lotto Lao </strong></h4>
        </div>
        <div class="widget-body" id="maxReceive">
            <div class="widget-main">
                <div class="row">
                    <div>
                        <form class="form-horizontal" id="" method="post">
                            <div class="table-responsive col-xs-6">
                                <footer>
                                        </footer><table class="table  table-bordered table-hover text-center">
                                    <thead>
                                        <tr>
                                            <th><center> <?=$lang_ag[177];?> </center></th>
                                            <th><center> Max / Number </center></th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                             <?php 

                                            if(empty($_POST["data"]["l_zone"]))
                                            {
                                                $_POST["data"]["l_zone"] = 3;
                                            } 

                                            $sql = "SELECT `r_lotto_hun_over` , `r_lotto_hun_over_".$_POST["data"]["l_zone"]."` FROM `bom_tb_agent` WHERE `r_id` = ".$_POST["session"]['r_id']."";
                                            $rs= sql_array($sql);
                                            $ex_over = explode(",", $rs['r_lotto_hun_over_'.$_POST["data"]["l_zone"]]);
                                            
                                            foreach ($lotHun_typeArry as $key => $value) {
                                                if($key == 31)
                                                {
                                                  $val = ($ex_over[$key]!="") ? number_format($ex_over[$key]) : 0;
                                                   ?>
                                                     <tr>
                                                        <td width="70%"><?=$value;?></td>
                                                        <td width="30%">
                                                            <input type="text" id="tlot_max_<?=$key;?>" name="tlot_max_<?=$key;?>" class="text-max-receive input-num2digt " value="<?=$val;?>">       
                                                        </td>
                                                    </tr>
                                                   <? 
                                                 }  
                                                
                                            }
                                         ?>
                                                                                            
                                    </tbody>
                                    <tbody><tr>
                                            <td colspan="2" align="center">
                                                 <button type="button" class="btn btn-primary btn-sm" onclick="submit_data()">
                                                    <span class="fa fa fa-floppy-o icon-on-right bigger-110"></span>
                                                    <?=$lang_ag[178];?> 
                                                </button>
                                                <button type="reset" class="btn btn-danger btn-sm">
                                                    <span class="fa fa-refresh icon-on-right bigger-110"></span>
                                                    <?=$lang_ag[179];?>                                                </button>
                                            </td>
                                        </tr>
                                    
                                </tbody></table>
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
        $("#maxReceive").load('show');
    });

    function submit_data( type ){
        var aData = {};
        var x = $("form").serializeArray();
        $.each(x, function(i, field){
            aData[ field.name ] = field.value;
        });

        $.post("lottoLaoMaxReceiveSave.php", aData, function( res ){
            var response = jQuery.parseJSON( res );
            if(response.status){
                $.gritter.add({
                    title: "",
                    text: '<h5><i class="fa fa-check" aria-hidden="true"></i> '+response.msg+'</h5>',
                    class_name: 'gritter-success'                    
                });
                getMenu('lottoLaoMaxReceive');
            }else{
                $.gritter.add({
                    title: "",
                    text: '<h5><i class="fa fa-ban" aria-hidden="true"></i> '+response.msg+'</h5>',
                    class_name: 'gritter-error'
                });
            }
        });
    }
</script>
