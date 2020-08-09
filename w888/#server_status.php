<?
  $qSport = "";
  $qSportId  = "";
  $mActiveSport = "";
  $mActive = "server_status";
  $docBodyClass = "removeLoaderOnLoad";

   $addtional_resources = array(
    array('js', 'assets/lib/socket-io/2.2.0/socket.io.js'),
  );

  $pageTitle = "Server status";
  require 'header.php';
?>
<script>
  $(function(){
    var sp_arr = JSON.parse('<?=json_encode($arr_code_node);?>');
    var arr_data = [];
    var statusContainer = document.getElementById('server_status');
    var socket = io.connect('<?=$nodejs_ip;?>', { secure: true , reconnect: true});

      socket.on("connect", function(){
        // showLoader(false);
      });

      socket.on("disconnect", function(){
        // console.log("disconnected");
      });

      socket.on('dataconnect', function (data) {
        var arr_data = JSON.parse(data)[0]
        if($(statusContainer).hasClass('preloader'))
          $(statusContainer).removeClass('preloader');

        $.each(sp_arr, function(idx, val){
          let box = $('.chk_sp_server.c_'+val);
          if(arr_data['c_'+val] == 1){
            if(!$(box).hasClass('on'))
              $(box).addClass('on');
          }
          else{
            $(box).removeClass('on');
          }

          if(arr_data['c_time_'+val] == 0){
            $(box).find('.c_time').text('-');
          }else{
            let nd = new Date(arr_data['c_time_'+val] * 1000);
            let ndt = [padNumber(nd.getDate()), padNumber(nd.getMonth()+1), padNumber(nd.getFullYear())].join("/") + " " +
            [padNumber(nd.getHours()), padNumber(nd.getMinutes()), padNumber(nd.getSeconds())].join(":")
            $(box).find('.c_time').text(ndt);
          }
        });
      });
      socket.on("error", console.error);
  });
</script>

<br />

<div class="container preloader" id="server_status">
  <div class="node_success_panel">
    <div class="row">
      <? foreach ($arr_code_node as $k => $v) { ?>
        <div class="col-md-3">
          <div class="chk_sp_server c_<?=$v?> card mb-3 border-0" style="overflow: hidden;">
            <div class="row no-gutters">
              <div class="col-md-4 serv_ico tgOnOff d-flex align-items-center justify-content-center">
                <span class="isOn  h1"><i class="fas fa-wifi"></i></span>
                <span class="isOff h1"><i class="fas fa-exclamation-triangle"></i></span>
              </div>
              <div class="col-md-8">
                <div class="card-body p-1">
                  <div class="card-title mb-0">
                    <div class="c_name b">
                      <?=$arr_name_node[$k];?>
                    </div>
                  </div>
                  <div class="c_time small">--</div>
                </div>

                <div class="card-footer p-1">
                  <div class="c_status_txt tgOnOff">
                    <span class="isOff">ขาดการเชื่อมต่อ</span>
                    <span class="isOn">เชื่อมต่อปกติ</span>
                  </div>
                </div>

              </div>
            </div>
          </div>
        </div>
      <? } ?>
    </div>
  </div>
  <div class="node_error_panel" style="display: none;">
  </div>
</div>

<?
  include 'sport_result_tmpl.html';
  require 'footer.php';
?>