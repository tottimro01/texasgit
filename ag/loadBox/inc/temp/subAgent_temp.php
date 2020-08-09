<?php require('inc_head.php');?>

<style type="text/css">
  @media (max-width: 990px) { 
    .form-group div,label{
      padding-top: 5px;
    }
  }
</style>
<div class="row">
    <div class="widget-box hidden-boder" id="loadSubAgent">
        <div class="widget-header widget-header-blue widget-header-flat" style="display:none;">
            <h4 class="widget-title lighter"><strong> <?=$lang_ag[101];?></strong></h4>
        </div>
        <div class="widget-body">
            <div class="widget-main padding-xs">
                <div class="row">
                    <div class="col-xs-12">
                        <form class="form-horizontal" id="frmSubAgent" action="" method="post">
                            <div class="form-group">
                                <label class="col-xs-3 col-sm-1 control-label no-padding-right"> <?=$lang_ag[326];?> </label>
                                <div class="col-xs-9 col-sm-2">
                                    <div class="input-group">
                                        <input type="text" id="username" name="username" placeholder="Username" class="col-xs-12 col-sm-12">
                                        <span class="input-group-addon">
                                            <strong> @<?=$_POST["session"]["r_user"];?></strong>
                                            <input type="hidden" name="usermain" value="@<?=$_POST["session"]["r_user"];?>">
                                        </span>
                                        
                                    </div>
                                </div>
                                <label class="col-xs-3 col-sm-1 control-label no-padding-right"> <?=$lang_ag[1393];?> </label>
                                <div class="col-xs-9 col-sm-2">
                                    <input type="password" id="password" name="password" placeholder="Password" class="col-xs-12 col-sm-8">
                                    &nbsp;<i class="fa fa-pencil-square-o fa-2x" id="iconEditPass" onclick="$('#password').prop('disabled',false);" style="display:none;"></i>
                                </div>
                                <label class="col-xs-3 col-sm-1 control-label"> <?=$lang_ag[405];?> </label>
                                <div class="col-xs-9 col-sm-2">
                                    <input type="text" id="name" name="name" placeholder="Name" class="col-xs-12 col-sm-10">
                                </div>
                                <label class="col-xs-3 col-sm-1 control-label "> <?=$lang_ag[313];?> </label>
                                <div class="col-xs-9 col-sm-2">
                                    <input type="text" id="remark" name="remark" placeholder="Remark" class="col-xs-12 col-sm-12">
                                    <input type="hidden" id="sub_id" name="sub_id" value="">
                                </div>
                                
                            </div>
                            <div class="form-group">
                                <label class="col-xs-3 col-sm-1 control-label no-padding-right"> <?=$lang_ag[184];?> </label>
                                <div class="col-xs-9 col-sm-1">
                                    <select class="form-control col-xs-6 col-sm-6 input-sm" id="status" name="status">
                                        <option value="1" selected=""><?=$lang_ag[420];?></option>
                                        <option value="0" ><?=$lang_ag[422];?></option>
                                    </select>
                                </div>
                                <?
                                $arr_sub_open = array(1=>$lang_ag[27] , $lang_ag[28] , $lang_ag[29] , $lang_ag[72] , $lang_ag[108] , $lang_ag[117] , $lang_ag[172] , $lang_ag[137] , $lang_ag[159] , $lang_ag[161] , $lang_ag[164]);
                                ?>
                                <div class="col-xs-12 col-sm-9">
                                    <? foreach ($arr_sub_open as $key => $value) { ?>
                                    <label style="margin-right: 5px;">
                                        <input name="ckOpen_<?=$key?>" id="ckOpen_<?=$key?>" class="ace ace-checkbox-2" type="checkbox" value="Y">
                                        <span class="lbl"> <?=$value;?> </span>

                                    </label>
                                <? } ?>
                                  
                                    </label>
                                    <button type="button" name="btsave" value="save" id="bt_submit" class="btn btn-success btn-minier" onclick="saveSubAgent('save');">
                                        <i class="ace-icon fa fa-floppy-o bigger-150"></i>
                                        <?=$lang_ag[178];?>                                    </button>
                                    <button type="button" name="btdel" value="del" class="btn btn-minier btn-danger " onclick="saveSubAgent('del');">
                                        <i class="ace-icon fa fa-trash-o bigger-150"></i>
                                        <?=$lang_ag[180];?>                                    </button>

                                     <button type="button" name="btdel" value="del" class="btn btn-minier btn-primary " onclick="getMenu('subAgent');">
                                        <i class="ace-icon fa fa-refresh bigger-150"></i>
                                        <?=$lang_ag[316];?>                                    </button>    
                                </div>

                              
                            </div>


                        </form>

                        <div class="clearfix">
                            <div class="pull-right tableTools-container"></div>
                        </div>
                       
                        <div class="table-responsive">
                            <table id="dynamic-table" class="table table-striped table-bordered table-hover">
                                <thead>
                                    <tr>
                                        <th class="center"><?=$lang_ag[326];?> </th>
                                        <th><?=$lang_ag[405];?></th>
                                        <th><?=$lang_ag[184];?></th>
                                        <? foreach ($arr_sub_open as $key => $value) { ?>
                                        <th><?=$value;?></th>
                                    <? } ?>
                                     
                                        <th><?=$lang_ag[313];?></th>
                                        <th><?=$lang_ag[440];?></th>
                                    </tr>
                                </thead>

                                <tbody>     
                                <?php 

                                    $rowPerPage = 10;
                                    $sql="SELECT * FROM `bom_tb_agent_use` where r_id = '".$_POST["session"]["r_id"]."'";
                                    $num_row = sql_num($sql);   

                                    $rowPerPage = $rowPerPage;
                                    $page       = ($_POST["thisPage"]=='') ? 1 : $_POST["thisPage"];
                                    $start      = ($page-1)*$rowPerPage;

                                    $pagi_data["numrow"] =  $num_row;
                                    $pagi_data["rowPerPage"] =  $rowPerPage;
                                    $pagi_data["total_page"] = ceil($num_row/$rowPerPage); 
                                    $pagi_data["active_page"] = intval($page);
                                    $pagi_data["start_page"]  = $start; 

                                     $sql="SELECT * FROM `bom_tb_agent_use` where r_id = '".$_POST["session"]["r_id"]."' LIMIT {$start} , {$rowPerPage}";     
                                     $re=sql_query($sql); 

                                     $c = 0;
                                     while($rs=sql_fetch_as($re)){
                                        $c++;
                                            // เช็ค ผู้ช่วย ออนไลน์
                                            $fo_online = "../../../json/online/r/ridu_".$rs["u_id"].".json"; 
                                            if(file_exists($fo_online)){
                                                $online_class = "label-success";
                                                $dis_fn = "disConnectSubAgent('{$rs["u_user"]}','{$rs["u_id"]}',this);";
                                            }else{
                                                $online_class = ""; 
                                                $dis_fn = ""; 
                                            }

                                            $rs["u_name"] = ($rs["u_name"] != "") ? $rs["u_name"] : $lang_ag[273];
                                        ?>
                                             <tr onclick="editSubAgent(this,<?=$rs['u_id'];?>);" class="cur">
                                                <td align="center" id="tdUsername" width="15%"><?=$rs["u_user"];?></td>
                                                <td align="center" id="tdName" width="15%"><?=$rs["u_name"];?></td>
                                                <td align="center" id="tdActive" data-value="<?=$rs["u_active"];?>">

                                                    <span class="label <?=($rs["u_active"] == 1) ? "label-info" : "label-grey";?>" style="width:60px;"><?=($rs["u_active"] == 1) ? $lang_ag[420] : $lang_ag[422];?></span>
                                                </td>
                                                <? 

                                                $ex_open = explode("," , $rs["u_menu"]);

                                                foreach ($arr_sub_open as $key => $value) { ?>
                                                <td align="center" id="tdOpen_<?=$key?>"><?
                                                if($ex_open[$key]==1){ echo "Y"; }else{ echo "N"; }
                                                ?></td>
                                            <? } ?>
                                              
                                                <td align="left" id="tdRemark"></td>
                                                <td align="center"> 
                                                    <span class="label <?=$online_class;?>" style="cursor:pointer;" onclick="<?=$dis_fn;?>">DIS</span>
                                                </td>
                                            </tr>
                                        <?
                                     } 

                                     if($c == 0)
                                     {
                                        ?>
                                            <tr class="cur">
                                                <td colspan="100%" style="text-align: center;"> <?=$lang_ag[1];?> </td>
                                            </tr>
                                        <?
                                     }  
                                 ?>

                              
                                </tbody>
                            </table>

                         

                                <div id="pagination">
                                    <nav aria-label="Page navigation" id="pagi_nav" data-page="<?=$_POST['thisPage'];?>">
                                        <ul class="pagination">
                                            <?php 

                                            if($pagi_data["total_page"] > 1)
                                            {
                                                $Previous_page =  ($pagi_data["active_page"]-1);
                                                $Previous_page = ($Previous_page < 1) ? 1 : $Previous_page;    
                                             ?>
                                            <li class="page-item">
                                                <a class="page-link" href="#" aria-label="Previous" onclick="getMenu('subAgent','?page=<?=$Previous_page;?>');">
                                                    <span aria-hidden="true">«</span><span class="sr-only">Previous</span>
                                                </a>
                                            </li>
                                            <? } ?>
                                            <?php for($i=1; $i<=$pagi_data["total_page"];$i++ ) {
                                                $active = ($i == $pagi_data["active_page"]) ? "active" : "";
                                                ?>
                                                     <li class="page-item <?=$active;?>"><a class="page-link" href="#" onclick="getMenu('subAgent','?page=<?=$i;?>');"><?=$i;?></a></li>
                                                <?
                                            }?>
                                                

                                        
                                            <?php 
                                            if($pagi_data["total_page"] > 1)
                                            {
                                                $Next_page = ($pagi_data["active_page"]+1);
                                                $Next_page = ($Next_page > $pagi_data["total_page"]) ? $pagi_data["total_page"] : $Next_page;   
                                             ?>
                                            <li class="page-item"><a class="page-link" href="#" aria-label="Next" onclick="getMenu('subAgent','?page=<?=$Next_page;?>');">
                                                <span aria-hidden="true">»</span><span class="sr-only">Next</span></a>
                                            </li>
                                            <? } ?>
                                        </ul>
                                    </nav>
                                </div>

                        </div>
                    </div>
                </div>

                <hr>
            </div>
        </div>
    </div>
</div>

<script type="text/javascript">

    function saveSubAgent(type){
        pageContentLoader("show");
        var serializeFrm = $("form").serializeArray();
        serializeFrm.push({name: 'bt', value: type});
        $.ajax({
            url: path_host+'saveSubAgent.php',
            type: 'POST',
            data: serializeFrm,
            dataType: 'json',
            success: function (response) {
                pageContentLoader("hide");
                if(response.status){
                    $.gritter.add({
                        title: "",
                        text: '<h5><i class="fa fa-check" aria-hidden="true"></i> '+response.msg+'</h5>',
                        class_name: 'gritter-success'
                    });
                    // getMenu('subAgent');
                    var thisPage = $("#pagi_nav").attr("data-page");
                    getMenu('subAgent','?page='+thisPage+'');
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

    function editSubAgent(now,id) {

        var spTdUser = $(now).find('#tdUsername').text().split('@');
        $('#username').val(spTdUser[0]);
        $('#username').prop('disabled', true);
        
        $('#name').val($(now).find('#tdName').text());
        $('#remark').val($(now).find('#tdRemark').text());
        $("#status").val($(now).find('#tdActive').data('value'));

        $("#password").prop('disabled', true);
        $("#iconEditPass").show();
        <? foreach ($arr_sub_open as $key => $value) { ?>
        $('#ckOpen_<?=$key?>').prop("checked",($(now).find('#tdOpen_<?=$key?>').text()=='Y')? true : false);
        <? } ?>

        $("#bt_submit").attr('onclick','saveSubAgent(\'edit\');');
        $("#sub_id").val(id)

    }

    function disConnectSubAgent(username,uid,e){

        bootbox.dialog({
            message: "<strong>["+username+"]</strong> <?=$lang_ag[17];?>",
            buttons: {
                confirm:{
                            label: "<?=$lang_ag[178];?>",
                            className: "btn-primary btn-sm",
                            callback: function(result) {

                                if(result){

                                    
                                    $.ajax({
                                        url: 'subAgent/disconnect.php',
                                        data: { uid : uid},
                                        type: 'POST',
                                        dataType: 'json',
                                        success: function (response) {
                                            // console.log(response);

                                            if(response.status =='success'){
                                                dialogSuccess(response.msg);
                                                getMenu('subAgent');
                                            }else{
                                                dialogError(response.msg);
                                            }
                                        },
                                        error: function (response) {
                                            console.log(response);
                                        }
                                    });
                                }
                            }
                        },
                cancel: {
                            label: "<?=$lang_ag[256];?>",
                            className: "btn-sm",
                        }
            }
        });
    }

</script>