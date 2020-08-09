<?php require('inc_head.php');?>
<style type="text/css">
  @media (max-width: 990px) { 
    .form-group div,label{
      padding-top: 5px;
    }
  }
</style>
<div class="row">
  <div class="widget-box hidden-boder" id="loadLang">
    <div class="widget-header widget-header-blue widget-header-flat" style="display:none;">
      <h4 class="widget-title lighter"><strong> xxx </strong></h4>
    </div>
    <div class="widget-body">
      <div class="widget-main">
        <div class="row">
          <div class="col-xs-12 widthTable">
            <form class="form-horizontal" id="frmSubAgent" action="" method="post">
              <div class="form-group">
                <label class="col-xs-3 col-sm-1 control-label">en</label>
                <div class="col-xs-9 col-sm-2">
                  <input type="text" id="en" name="en" placeholder="en" class="col-xs-12 col-sm-10">
                </div>
                <label class="col-xs-3 col-sm-1 control-label"> th </label>
                <div class="col-xs-9 col-sm-2">
                  <input type="text" id="th" name="th" placeholder="th" class="col-xs-12 col-sm-10">
                </div>
                <label class="col-xs-3 col-sm-1 control-label">jp</label>
                <div class="col-xs-9 col-sm-2">
                  <input type="text" id="jp" name="jp" placeholder="jp" class="col-xs-12 col-sm-10">
                </div>
                <label class="col-xs-3 col-sm-1 control-label">ko</label>
                <div class="col-xs-9 col-sm-2">
                  <input type="text" id="ko" name="ko" placeholder="ko" class="col-xs-12 col-sm-10">
                </div>
                <label class="col-xs-3 col-sm-1 control-label">cn</label>
                <div class="col-xs-9 col-sm-2">
                  <input type="text" id="cn" name="cn" placeholder="cn" class="col-xs-12 col-sm-10">
                </div>
                <label class="col-xs-3 col-sm-1 control-label">vn</label>
                <div class="col-xs-9 col-sm-2">
                  <input type="text" id="vn" name="vn" placeholder="vn" class="col-xs-12 col-sm-10">
                </div>
                <label class="col-xs-3 col-sm-1 control-label">id</label>
                <div class="col-xs-9 col-sm-2">
                  <input type="text" id="id" name="id" placeholder="id" class="col-xs-12 col-sm-10">
                </div>
                <label class="col-xs-3 col-sm-1 control-label">mm</label>
                <div class="col-xs-9 col-sm-2">
                  <input type="text" id="mm" name="mm" placeholder="mm" class="col-xs-12 col-sm-10">
                </div>
                <label class="col-xs-3 col-sm-1 control-label">km</label>
                <div class="col-xs-9 col-sm-2">
                  <input type="text" id="km" name="km" placeholder="km" class="col-xs-12 col-sm-10">
                </div>
                <label class="col-xs-3 col-sm-1 control-label">la</label>
                <div class="col-xs-9 col-sm-2">
                  <input type="text" id="la" name="la" placeholder="la" class="col-xs-12 col-sm-10">
                </div>
                <input type="hidden" id="lang_id" name="lang_id" value="">
              </div>

            <div class="form-group">
              <button type="button" name="bt_submit" value="save" id="bt_submit" class="btn btn-success btn-minier" onclick="saveLang('edit');">
                <i class="ace-icon fa fa-floppy-o bigger-150"></i>
                <?=$lang_subAgent[18];?>
              </button>
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
                <th class="center">en</th>
                <th>th</th>
                <th>jp</th>
                <th>ko</th>
                <th>cn</th>
                <th>vn</th>
                <th>id</th>
                <th>mm</th>
                <th>km</th>
                <th>la</th>
              </tr>
            </thead>
            <tbody>     
              <?php 
                $rowPerPage = 10;
                $sql="SELECT * FROM `bom_tb_lang_page`";
                $num_row = sql_num($sql);   
                $rowPerPage = $rowPerPage;
                $page       = ($_POST["thisPage"]=='') ? 1 : $_POST["thisPage"];
                $start      = ($page-1)*$rowPerPage;
                $pagi_data["numrow"] =  $num_row;
                $pagi_data["rowPerPage"] =  $rowPerPage;
                $pagi_data["total_page"] = ceil($num_row/$rowPerPage); 
                $pagi_data["active_page"] = intval($page);
                $pagi_data["start_page"]  = $start; 

                $sql="SELECT * FROM `bom_tb_lang_page` LIMIT {$start} , {$rowPerPage}";     
                $re=sql_query($sql); 
                while($rs=sql_fetch_as($re)){

              ?>

              <tr onclick="editChangeLang(this,<?=$rs['lang_id'];?>);" class="cur">
                <td id="tdEn"><?=$rs["en"];?></td>
                <td id="tdTh"><?=$rs["th"];?></td>
                <td id="tdJp"><?=$rs["jp"];?></td>
                <td id="tdKo"><?=$rs["ko"];?></td>
                <td id="tdCn"><?=$rs["cn"];?></td>
                <td id="tdVn"><?=$rs["vn"];?></td>
                <td id="tdId"><?=$rs["id"];?></td>
                <td id="tdMm"><?=$rs["mm"];?></td>
                <td id="tdKm"><?=$rs["km"];?></td>
                <td id="tdLa"><?=$rs["la"];?></td>
              </tr>
              <? } ?>

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
                  <a class="page-link" href="#" aria-label="Previous" onclick="getMenu('changeLang','?page=<?=$Previous_page;?>');">
                    <span aria-hidden="true">«</span><span class="sr-only">Previous</span>
                  </a>
                </li>
                <? } ?>
                <?php
                  for($i=1; $i<=$pagi_data["total_page"];$i++ )
                  {
                    $active = ($i == $pagi_data["active_page"]) ? "active" : "";
                ?>
                  <li class="page-item <?=$active;?>"><a class="page-link" href="#" onclick="getMenu('changeLang','?page=<?=$i;?>');"><?=$i;?></a></li>
                <? } ?>

                <?php 
                  if($pagi_data["total_page"] > 1)
                  {
                    $Next_page = ($pagi_data["active_page"]+1);
                    $Next_page = ($Next_page > $pagi_data["total_page"]) ? $pagi_data["total_page"] : $Next_page;   

                ?>

                <li class="page-item"><a class="page-link" href="#" aria-label="Next" onclick="getMenu('changeLang','?page=<?=$Next_page;?>');">
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

<script type="text/javascript">

  function saveLang(type){
    var serializeFrm = $("form").serializeArray();
    serializeFrm.push({name: 'bt', value: type});
    $.ajax({
      url: path_host+'saveLang.php',
      type: 'POST',
      data: serializeFrm,
      dataType: 'json',
      success: function (response) {

        if(response.status){
          $.gritter.add({
            title: "",
            text: '<h5><i class="fa fa-check" aria-hidden="true"></i> '+response.msg+'</h5>',
            class_name: 'gritter-success'
          });
          var thisPage = $("#pagi_nav").attr("data-page");
          getMenu('changeLang','?page='+thisPage+'');

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


  function editChangeLang(now,id) {  
    $('#en').val($(now).find('#tdEn').text());
    $('#th').val($(now).find('#tdTh').text());
    $('#jp').val($(now).find('#tdJp').text());
    $('#ko').val($(now).find('#tdKo').text());
    $('#cn').val($(now).find('#tdCn').text());
    $('#vn').val($(now).find('#tdVn').text());
    $('#id').val($(now).find('#tdId').text());
    $('#mm').val($(now).find('#tdMm').text());
    $('#km').val($(now).find('#tdKm').text());
    $('#la').val($(now).find('#tdLa').text());
    $("#bt_submit").attr('onclick','saveLang(\'edit\');');
    $("#lang_id").val(id)
  }

</script>