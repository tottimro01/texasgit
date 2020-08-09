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
                                            <th><center> <?=$lang_lotLao[4];?> </center></th>
                                            <th><center> Max / Number </center></th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                                                                                                                    <tr>
                                                    <td width="70%">3 ตัวบน</td>
                                                    <td width="30%">
                                                        <input type="text" id="txt_la3nb" class="text-max-receive inputNumber" name="la3nb" value="0">        
                                                    </td>
                                                </tr>
                                                                                            <tr>
                                                    <td width="70%">3 ตัวโต๊ด</td>
                                                    <td width="30%">
                                                        <input type="text" id="txt_la3td" class="text-max-receive inputNumber" name="la3td" value="0">        
                                                    </td>
                                                </tr>
                                                                                            <tr>
                                                    <td width="70%">2 ตัวบน</td>
                                                    <td width="30%">
                                                        <input type="text" id="txt_la2nb" class="text-max-receive inputNumber" name="la2nb" value="0">        
                                                    </td>
                                                </tr>
                                                                                            <tr>
                                                    <td width="70%">2 ตัวโต๊ด</td>
                                                    <td width="30%">
                                                        <input type="text" id="txt_la2td" class="text-max-receive inputNumber" name="la2td" value="0">        
                                                    </td>
                                                </tr>
                                                                                            <tr>
                                                    <td width="70%">1 ตัววิ่ง</td>
                                                    <td width="30%">
                                                        <input type="text" id="txt_la1rn" class="text-max-receive inputNumber" name="la1rn" value="0">        
                                                    </td>
                                                </tr>
                                                                                            <tr>
                                                    <td width="70%">สูง-ต่ำ</td>
                                                    <td width="30%">
                                                        <input type="text" id="txt_lanou" class="text-max-receive inputNumber" name="lanou" value="0">        
                                                    </td>
                                                </tr>
                                                                                            <tr>
                                                    <td width="70%">คู่-คี่</td>
                                                    <td width="30%">
                                                        <input type="text" id="txt_lanoe" class="text-max-receive inputNumber" name="lanoe" value="0">        
                                                    </td>
                                                </tr>
                                                                                                                        </tbody>
                                    <tbody><tr>
                                            <td colspan="2" align="center">
                                                 <button type="button" class="btn btn-primary btn-sm" onclick="submit_data()">
                                                    <span class="fa fa fa-floppy-o icon-on-right bigger-110"></span>
                                                    <?=$lang_lotLao[5];?> 
                                                </button>
                                                <button type="reset" class="btn btn-danger btn-sm">
                                                    <span class="fa fa-refresh icon-on-right bigger-110"></span>
                                                    <?=$lang_lotLao[6];?>                                                </button>
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
            if(response.status_flag){
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
