<?php 

    require('inc_head.php');
?>

<div class="row">
    <div class="widget-box hidden-boder">
        <div class="widget-header widget-header-blue widget-header-flat hidden ">
            <h4 class="widget-title lighter"><strong> Max Receive Lotto </strong></h4>
        </div>
        <div class="widget-body" id="maxReceive">
            <div class="widget-main">
                <div class="row">
                    <div>
                        <form class="form-horizontal" id="maxReceive_form" method="post">
                            <div class="table-responsive col-xs-6">
                                <footer>
                                        </footer><table class="table  table-bordered table-hover text-center">
                                    <thead>
                                        <tr>
                                            <th><center> <?=$lang_lot[4];?> </center></th>
                                            <th><center> Max / Number </center></th>
                                        </tr>
                                    </thead>
                                    <tbody>

                                        <?php 
                                            foreach ($lot_typeArry as $key => $value) {
                                                
                                                   ?>
                                                     <tr>
                                                        <td width="70%"><?=$value;?></td>
                                                        <td width="30%">
                                                            <input type="text" id="tlot_max_<?=$key;?>" name="tlot_max_<?=$key;?>" class="text-max-receive inputNumber" value="0">        
                                                        </td>
                                                    </tr>
                                                   <? 
                                                
                                            }
                                         ?>
                                      
                                    </tbody>
                                    <tbody>
                                        <tr>
                                            <td colspan="2" align="center">
                                                 <button type="button" class="btn btn-primary btn-sm" onclick="submit_data()">
                                                    <span class="fa fa fa-floppy-o icon-on-right bigger-110"></span>
                                                    <?=$lang_lot[5];?> 
                                                </button>
                                                <button type="reset" class="btn btn-danger btn-sm">
                                                    <span class="fa fa-refresh icon-on-right bigger-110"></span>
                                                    <?=$lang_lot[6];?>                                                </button>
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
        $("#maxReceive").load('show');
    });

    function submit_data( type ){
        var aData = {};
        var x = $("form").serializeArray();
        $.each(x, function(i, field){
            aData[ field.name ] = field.value;
        });

        $.post("lottoMaxReceiveSave.php", aData, function( res ){
            var response = jQuery.parseJSON( res );
            if(response.status_flag){
                $.gritter.add({
                    title: "",
                    text: '<h5><i class="fa fa-check" aria-hidden="true"></i> '+response.msg+'</h5>',
                    class_name: 'gritter-success'                    
                });
                getMenu('lottoMaxReceive');
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
