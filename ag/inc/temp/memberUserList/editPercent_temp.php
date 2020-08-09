<?php
  if($_POST["session"]["AGlang"]=="")
  {
    $_POST["session"]["AGlang"]="th";
  }

  require('../../conn.php');
  require('../../function.php');
  require('../../../lang/ag_lang.php');

// เอเย่นต์บังคับสู้
$sql="select * from bom_tb_agent where  r_id='".$_POST["session"]["r_id"]."' ";
$rs=sql_array($sql);

$agent_share = [];
$ex_r_sport_share = explode(",", $rs["r_sport_share"]);
$ex_r_sport_share_live = explode(",", $rs["r_sport_share_live"]);
$ex_r_lotto_share = explode(",", $rs["r_lotto_share"]);
$ex_r_lotto_hun_share = explode(",", $rs["r_lotto_hun_share"]);
$ex_r_lotto_hun_set_share = explode(",", $rs["r_lotto_hun_set_share"]);
$ex_r_games_share = explode(",", $rs["r_games_share"]);
$ex_r_casino_share = explode(",", $rs["r_casino_share"]);

$agent_share[1] = $ex_r_sport_share[1];
$agent_share[2] = $ex_r_sport_share_live[1];
$agent_share[3] = $ex_r_sport_share[2];
$agent_share[4] = $ex_r_sport_share_live[2];
$agent_share[5] = $ex_r_sport_share[3];
$agent_share[6] = $ex_r_sport_share_live[3];
$agent_share[7] = $ex_r_sport_share[4];
$agent_share[8] = $ex_r_lotto_share[1];
$agent_share[9] = $ex_r_lotto_hun_share[1];
$agent_share[10] = $ex_r_lotto_hun_set_share[1];
$agent_share[11] = $ex_r_games_share[1];

foreach ($ex_r_casino_share as $key => $value) {
   if($key > 0){ $agent_share[]=$value; }
}



//   แบ่งหุ้น   

$r_id  = sql_escape_str($_POST['r_id']);

$sql="select * from bom_tb_agent where  r_agent_id like '%*".$_POST["session"]["r_id"]."*%'  and   r_id='".$r_id."' ";
$rex=sql_array($sql);

$child_agent_share = [];
$ex_r_sport_share = explode(",", $rex["r_sport_share"]);
$ex_r_sport_share_live = explode(",", $rex["r_sport_share_live"]);
$ex_r_lotto_share = explode(",", $rex["r_lotto_share"]);
$ex_r_lotto_hun_share = explode(",", $rex["r_lotto_hun_share"]);
$ex_r_lotto_hun_set_share = explode(",", $rex["r_lotto_hun_set_share"]);
$ex_r_games_share = explode(",", $rex["r_games_share"]);
$ex_r_casino_share = explode(",", $rex["r_casino_share"]);

$child_agent_share[1] = $ex_r_sport_share[1];
$child_agent_share[2] = $ex_r_sport_share_live[1];
$child_agent_share[3] = $ex_r_sport_share[2];
$child_agent_share[4] = $ex_r_sport_share_live[2];
$child_agent_share[5] = $ex_r_sport_share[3];
$child_agent_share[6] = $ex_r_sport_share_live[3];
$child_agent_share[7] = $ex_r_sport_share[4];
$child_agent_share[8] = $ex_r_lotto_share[1];
$child_agent_share[9] = $ex_r_lotto_hun_share[1];
$child_agent_share[10] = $ex_r_lotto_hun_set_share[1];
$child_agent_share[11] = $ex_r_games_share[1];

foreach ($ex_r_casino_share as $key => $value) {
   if($key > 0){ $child_agent_share[]=$value; }
}


// ปัจจุบันเก็บ 

$ex_r_sport_myshare =@explode(",",$rex['r_sport_myshare']);
$ex_r_sport_myshare_live =@explode(",",$rex['r_sport_myshare_live']);
$ex_r_lotto_myshare =@explode(",",$rex['r_lotto_myshare']);
$ex_r_lotto_hun_myshare =@explode(",",$rex['r_lotto_hun_myshare']);
$ex_r_lotto_hun_set_myshare =@explode(",",$rex['r_lotto_hun_set_myshare']);
$ex_r_games_myshare =@explode(",",$rex['r_games_myshare']);
$ex_r_casino_myshare =@explode(",",$rex['r_casino_myshare']);

$child_agent_myshare[1] =  $ex_r_sport_myshare[1];
$child_agent_myshare[2] =  $ex_r_sport_myshare_live[1];
$child_agent_myshare[3] =  $ex_r_sport_myshare[2];
$child_agent_myshare[4] =  $ex_r_sport_myshare_live[2];
$child_agent_myshare[5] =  $ex_r_sport_myshare[3];
$child_agent_myshare[6] =  $ex_r_sport_myshare_live[3];
$child_agent_myshare[7] =  $ex_r_sport_myshare[4];
$child_agent_myshare[8] =  $ex_r_lotto_myshare[1];
$child_agent_myshare[9] =  $ex_r_lotto_hun_myshare[1];
$child_agent_myshare[10] = $ex_r_lotto_hun_set_myshare[1];
$child_agent_myshare[11] = $ex_r_games_myshare[1];

foreach ($ex_r_casino_myshare as $key => $value) {
   if($key > 0){ $child_agent_myshare[]=$value; }
}


// บังคับสู้
$ex_r_sport_force =@explode(",",$rex['r_sport_force']);
$ex_r_sport_force_live =@explode(",",$rex['r_sport_force_live']);
$ex_r_lotto_force =@explode(",",$rex['r_lotto_force']);
$ex_r_lotto_hun_force =@explode(",",$rex['r_lotto_hun_force']);
$ex_r_lotto_hun_set_force =@explode(",",$rex['r_lotto_hun_set_force']);
$ex_r_games_force =@explode(",",$rex['r_games_force']);
$ex_r_casino_force =@explode(",",$rex['r_casino_force']);

$child_agent_force[1] =  $ex_r_sport_force[1];
$child_agent_force[2] =  $ex_r_sport_force_live[1];
$child_agent_force[3] =  $ex_r_sport_force[2];
$child_agent_force[4] =  $ex_r_sport_force_live[2];
$child_agent_force[5] =  $ex_r_sport_force[3];
$child_agent_force[6] =  $ex_r_sport_force_live[3];
$child_agent_force[7] =  $ex_r_sport_force[4];
$child_agent_force[8] =  $ex_r_lotto_force[1];
$child_agent_force[9] =  $ex_r_lotto_hun_force[1];
$child_agent_force[10] = $ex_r_lotto_hun_set_force[1];
$child_agent_force[11] = $ex_r_games_force[1];

foreach ($ex_r_casino_force as $key => $value) {
   if($key > 0){ $child_agent_force[]=$value; }
}


// get min Data
$r_agent_id = $rex['r_agent_id'];
$r_level_under= intval($rex['r_level'])+1;
$r_agent_id_under = $r_agent_id.$r_id."*";

$sql="select * from bom_tb_agent where r_agent_id like '%".$r_agent_id_under."%' and r_level='$r_level_under'";
$reA=sql_query($sql);

$check_r_sport_share_max = array(); 
$check_r_sport_share_live_max = array(); 
$check_r_lotto_share = array(); 
$check_r_lotto_hun_share = array();
$check_r_lotto_hun_set_share = array(); 
$check_r_games_share = array();
$check_r_casino_share = array(); 

while($rss=sql_fetch($reA)){
  $exd=@explode(",",$rss['r_sport_share']);
  foreach ($exd as $key => $value) {
     if($key > 0){    
          $check_r_sport_share_max[$key][] = $value;
     }
  }

  $exd=@explode(",",$rss['r_sport_share_live']);
  foreach ($exd as $key => $value) {
     if($key > 0){    
          $check_r_sport_share_live_max[$key][] = $value;
     }
  }

  $exd=@explode(",",$rss['r_lotto_share']);
  foreach ($exd as $key => $value) {
     if($key > 0){    
          $check_r_lotto_share[$key][] = $value;
     }
  }

  $exd=@explode(",",$rss['r_lotto_hun_share']);
  foreach ($exd as $key => $value) {
     if($key > 0){    
          $check_r_lotto_hun_share[$key][] = $value;
     }
  }
        
  $exd=@explode(",",$rss['r_lotto_hun_set_share']);
  foreach ($exd as $key => $value) {
     if($key > 0){    
          $check_r_lotto_hun_set_share[$key][] = $value;
     }
  }
        
  $exd=@explode(",",$rss['r_games_share']);
  foreach ($exd as $key => $value) {
     if($key > 0){    
          $check_r_games_share[$key][] = $value;
     }
  }
        
  $exd=@explode(",",$rss['r_casino_share']);
  foreach ($exd as $key => $value) {
     if($key > 0){    
          $check_r_casino_share[$key][] = $value;
     }
  }                        
}

$check_r_casino_share = (empty($check_r_casino_share)) ?  array(0,0,0,0) : $check_r_casino_share;

$min_share[1] = (max($check_r_sport_share_max[1])===null) ? 0 : max($check_r_sport_share_max[1]);
$min_share[2] = (max($check_r_sport_share_live_max[1])===null) ? 0 : max($check_r_sport_share_live_max[1]);
$min_share[3] = (max($check_r_sport_share_max[2])===null) ? 0 : max($check_r_sport_share_max[2]);
$min_share[4] = (max($check_r_sport_share_live_max[2])===null) ? 0 : max($check_r_sport_share_live_max[2]);
$min_share[5] = (max($check_r_sport_share_max[3])===null) ? 0 : max($check_r_sport_share_max[3]);
$min_share[6] = (max($check_r_sport_share_live_max[3])===null) ? 0 : max($check_r_sport_share_live_max[3]);
$min_share[7] = (max($check_r_sport_share_max[4])===null) ? 0 : max($check_r_sport_share_max[4]);
$min_share[8] = (max($check_r_lotto_share[1])===null) ? 0 : max($check_r_lotto_share[1]);
$min_share[9] = (max($check_r_lotto_hun_share[1])===null) ? 0 : max($check_r_lotto_hun_share[1]);
$min_share[10] = (max($check_r_lotto_hun_set_share[1])===null) ? 0 : max($check_r_lotto_hun_set_share[1]);
$min_share[11] = (max($check_r_games_share[1])===null) ? 0 : max($check_r_games_share[1]);

foreach ($check_r_casino_share as $key => $value) {
  $min_share[] = (max($value)===null) ? 0 : max($value);
}

?>
<div class="row">

<style>
.head_table{
    -webkit-box-sizing: content-box;
    -moz-box-sizing: content-box;
    box-sizing: content-box;
    position: relative;
    min-height: 38px;
    background: #f7f7f7;
    background-image: -webkit-linear-gradient(top,#fff 0,#eee 100%);
    background-image: -o-linear-gradient(top,#fff 0,#eee 100%);
    background-image: linear-gradient(to bottom,#fff 0,#eee 100%);
    background-repeat: repeat-x;
    filter: progid:DXImageTransform.Microsoft.gradient(startColorstr='#ffffffff', endColorstr='#ffeeeeee', GradientType=0);
    color: #0062b6;
    border-bottom: 1px solid #DDD;
    padding-left: 12px;
    height: 40px;
    border: 1px solid #CCC;
    padding-top: 10px;
    font-size: 15px;
}

@media (max-width: 748px) { 
  .head_table
  {
    display: inline-table;
    width: 100%;
    box-sizing: border-box;
  }

  .head_table .pull-right
  {
    clear: both;
    float: left!important;
    margin-bottom: 10px;
    margin-top: 5px;
  }
}

</style>
    <div class="widget-box hidden-boder">
        <div class="widget-header  hidden">
            <h4 class="widget-title lighter"><strong> <?=$lang_ag[562];?> </strong></h4>
            <div class="widget-toolbar hidden">
                <a href="#" data-action="reload" id="relodUKeep"> </a>
            </div>
        </div>
        <div class="widget-body" id="loadEditPercent">
            <div class="widget-main">
                <div class="row">
                    <div class="col-xs-12">   
                        <div class="clearfix">
                            <div class="pull-right tableTools-container"></div>
                        </div>
                        <div class="head_table">
                            <?=$lang_ag[562];?> [ <?=$rex["r_user"];?> ]
                            <div id="" class="pull-right">
                                <button class="btn btn-xs btn-inverse" onclick="searchEditPercent('f4v5e5o4n31474');">
                                    <i class="ace-icon fa fa-refresh bigger-110"></i>
                                    <?=$lang_ag[316];?>                                </button>
                                <a onclick="getMenu('userList');" style="color:#fff;">
                                    <button class="btn btn-xs btn-inverse">
                                            <i class="ace-icon fa fa-list-ul bigger-110"></i>
                                            <?=$lang_ag[82];?>                                   </button>
                                </a>
                                &nbsp;&nbsp;
                            </div>
                        </div>

                        <form class="form-horizontal" id="frmEditPersent" name="frmEditPersent" action="" method="post">
                            <div class="table-responsive">
                                <!-- id="tbEditPercent" -->
                                <table id="" class="table table-striped table-bordered table-hover">
                                    <thead>
                                        <tr>
                                            <th class="center"><?=$lang_ag[205];?> </th>
                                            <!-- <th class="center"><?=$lang_ag[565];?></th> -->
                                            <th>&nbsp;&nbsp;<?=$lang_ag[567];?>&nbsp;&nbsp;&nbsp;</th>
                                            <th><?=$lang_ag[570];?></th>
                                            <th class="text-danger"><?=$lang_ag[572];?></th>
                                            <!-- <th class="text-danger"><?=$lang_ag[575];?></th> -->
                                        </tr>
                                    </thead>

                                    <tbody>
                                    <?php 

                                        foreach ($lang_g["list_share"] as $key => $value) {
                                           ?>

                                              <tr>
                                                  <td align="left" style="vertical-align: middle;"><?=$value;?>:</td>
                                                  <!-- <td align="center" style="vertical-align: middle;"><?=$agent_share[$key];?></td> -->
                                                  <td>
                                                      <select class="form-control col-xs-12 col-sm-2  input-sm" id="setup<?=$key;?>_share" name="setup<?=$key;?>_share" onchange="calAferKeep(this,'<?=$agent_share[$key];?>');">
                                                          <?php 
                                                              $slt = $child_agent_share[$key];
                                                              for($i = $min_share[$key]; $i<= $agent_share[$key]; $i++)
                                                              {
                                                                  $sl = ($i == $slt) ? "selected=\"\"" : "";
                                                                  ?>
                                                                      <option value="<?=$i;?>" <?=$sl;?> > <?=$i;?>  </option> 
                                                                  <?php
                                                              }
                                                           ?>                      
                                                      </select>
                                                  </td>
                                                  <td align="center" style="vertical-align: middle;"><span id="currentKeep"><?=$child_agent_myshare[$key];?> </span> %</td>
                                                  <td align="center" style="vertical-align: middle;" class="text-danger">
                                                    <span id="afterKeep"><?=$child_agent_myshare[$key];?> </span> %
                                                    <!-- <input type="hidden" id="setup<?=$key;?>_myshare" class="ip_myshare" name="setup<?=$key;?>_myshare" value="<?=$child_agent_myshare[$key];?>"> -->
                                                  </td>
                                                 <?php /* ?><td>
                                                      <select class="form-control col-xs-12 col-sm-2 input-sm" id="setup<?=$key;?>_fshare" name="setup<?=$key;?>_fshare">
                                                            <?php 
                                                              $slt = $child_agent_force[$key];
                                                              for($i = 0; $i<= $child_agent_share[$key]; $i++)
                                                              {
                                                                  $sl = ($i == $slt) ? "selected=\"\"" : "";
                                                                  ?>
                                                                      <option value="<?=$i;?>" <?=$sl;?> > <?=$i;?>  </option> 
                                                                  <?php
                                                              }
                                                           ?>   
                                                      </select>      
                                                  </td> */?>
                                              </tr>

                                           <?
                                        }
                                     ?>
  


</tbody>
                                </table>
                            </div>
                            <div class="form-group">
                                <div class="col-md-offset-4 col-md-8">
                                    <button type="button" class="btn btn-primary " onclick="editPercentSave();">
                                        <span class="fa fa fa-floppy-o icon-on-right bigger-110"></span>
                                        <?=$lang_ag[178];?>                                    </button>
                                    <button type="reset" class="btn btn-danger ">
                                        <span class="fa fa-refresh icon-on-right bigger-110"></span>
                                        <?=$lang_ag[179];?>                                    </button>
                                    <input type="hidden" name="id" value="<?=$rex["r_id"];?>">
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
                <div class="form-group"><br>
                    <strong><?=$lang_ag[313];?> :</strong> <?=$lang_ag[593]." ".$rex["r_user"]." ".$lang_ag[681];?> <br>
                </div>

                <hr>
            </div>
        </div>
    </div>
</div>

<script type="text/javascript">

    // $("form").submit(function(){
    //     $("#loadEditPercent").load('show');
    // });

    function editPercentSave(){

        var serializeFrm = $("form").serializeArray();

        $.ajax({
            url: path_host+'memberUserList/editPercentSave.php',
            type: 'POST',
            data: serializeFrm,
            dataType: 'json',
            success: function (response) {
                // console.log(response);
                if(response.status){
                    $.gritter.add({
                        title: "",
                        text: '<h5><i class="fa fa-check" aria-hidden="true"></i> '+response.msg+'</h5>',
                        class_name: 'gritter-success'
                    });

                    getMenu('memberUserList/editPercent','?rid=<?=$rex["r_id"];?>');

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

    function searchEditPercent(user=""){

        // $("#loadEditPercent").load('show');

        getMenu('memberUserList/editPercent','?rid=<?=$rex["r_id"];?>');

    }
    function calAferKeep(now,maxval){
        var valnow = $(now).val();
        $(now).closest("tr").find("span#afterKeep").text(parseFloat(maxval)-parseFloat(valnow));
        // $(now).closest("tr").find(".ip_myshare").val(parseFloat(maxval)-parseFloat(valnow));

        let forceVal = $(now).closest("tr").find('td:last select').val();
        $(now).closest("tr").find('td:last select option').remove();
        for (var i = 0; i <= valnow; i++) {
            $(now).closest("tr").find('td:last select').append($('<option>', {value: i,text: i}));
        }
        forceVal = (forceVal > (i-1)) ? 0 : forceVal;
        $(now).closest("tr").find('td:last select').val(forceVal);   
    }


</script>
