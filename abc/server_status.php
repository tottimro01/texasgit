<?
  //$qSport = "";
  //$qSportId  = "";
  //$mActiveSport = "";
  $mActive = "server_status";
  $menuKey = "server_status";
  $docBodyClass = "removeLoaderOnLoad";

  $addtional_resources = array(
    array('js', 'assets/lib/socket-io/2.2.0/socket.io.js'),
  );

  $pageTitle = "เซิร์ฟเวอร์";
  require 'header.php';
?>
<style type="text/css">
.filter {
    display: inline-block;
    vertical-align: bottom;
    border-radius: 3px;
    padding: 0.15em 0.5em;
    color: #545454;
    border: 1px solid #cdcdcd;
    background: #ececec;
    margin: 2px 10px;
}
.filter.oddsTableStatus, .filter.oddsTableStatus-offline, .filter.oddsTableStatus-connecting {
  width: 44px;
  height: 23px;
  overflow: hidden;
  position: relative;
} 
.filter.oddsTableStatus::before, .filter.oddsTableStatus-offline::before, .filter.oddsTableStatus-connecting::before {
  background: url(img/connectIcon.png) no-repeat 0 0;
  content: "";
  position: absolute;
  top: -.05em;
  width: 897px;
  height: 22px;
  z-index: 1;
}

.filter.oddsTableStatus::before {
  transform: translateX(-819px);
  left: -.05em;
}

.filter.oddsTableStatus-offline {
  cursor: default;
}

.filter.oddsTableStatus-offline::before {
  transform: translateX(-857px);
  left: -.05em;
}

.filter.oddsTableStatus-offline:hover {
  background: #ececec;
}

.filter.oddsTableStatus-connecting {
  cursor: default;
}

.filter.oddsTableStatus-connecting:hover {
  background: #ececec;
}

.filter.oddsTableStatus-connecting::before {
  left: .15em;
  animation: playConnect 4s steps(21) infinite normal;
  -webkit-backface-visibility: hidden;
  -webkit-perspective: 1000;
  -webkit-transform: translateZ(0);
}
@keyframes playConnect {
  from {
    transform: translateX(0);
  }
  to {
    transform: translateX(-819px);
  }
}
</style>
<script>
  $(function(){
    var sp_arr = JSON.parse('<?=json_encode($arr_code_node);?>');
    var arr_data = [];
    var statusContainer = document.getElementById('server_status');
    var socket = io.connect(nodejsIP, { secure: true , reconnect: true});
      socket.emit('check_user_abc');
      socket.on("connect", function(){
        // showLoader(false);
        $("#connect_ico").removeClass("oddsTableStatus-offline");
        $("#connect_ico").addClass("oddsTableStatus-connecting");
      });

      socket.on("disconnect", function(){
        // console.log("disconnected");
        $("#connect_ico").removeClass("oddsTableStatus-connecting");
        $("#connect_ico").addClass("oddsTableStatus-offline");
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
            if(config_maintenance.con_service == 1){
              //var audio = new Audio('beacon.wav');
              //audio.muted = false;
              //audio.play();
              //document.getElementById("my_audio").play();
              var iframe = document.getElementById('my_audio');
              iframe.src = iframe.src;
            }
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
<iframe id="my_audio" class="audio" width="0" height="0" src="beacon.wav" frameborder="0" allow="autoplay"></iframe>
<!-- <br /> -->
<div class="py-2">
<div class="container container-alt preloader" id="server_status">
  <div class="node_success_panel">
    <div class="pt-2">
      <h5 class="d-inline-block">เซิร์ฟเวอร์ <div id="connect_ico" class="filter"></div> Socket IP : <?=$nodejs_ip;?></h5>
      <form action="process/ClearLive.php" method="post" class="formUpdateVal d-inline-block ml-3" data-onsuccess="ClearLiveCallback" data-onfail="ClearLiveCallback">
        <fieldset>
          <input type="hidden" name="zone" value="88" />
          <input type="submit" class="btn btn-sm btn-warning" value="ล้าง Live" />
        </fieldset>
      </form>
      <hr>
    </div>
    <div class="row">
      <? foreach ($arr_code_node as $k => $v) { ?>
        <div class="col-md-3">
          <div class="chk_sp_server c_<?=$v?> card mb-3 border-0" style="overflow: hidden;">
            <div class="row no-gutters">
              <div class="col-md-3 serv_ico tgOnOff d-flex align-items-center justify-content-center">
                <span class="isOn  h2"><i class="fas fa-wifi"></i></span>
                <span class="isOff h2"><i class="fas fa-exclamation-triangle"></i></span>
              </div>
              <div class="col-md-9">
                <div class="card-body p-1">
                  <div class="card-title mb-0">
                    <div class="c_name b">
                      <?=$arr_name_node[$k];?>
                    </div>
                  </div>
                  <div class="c_time small">--</div>
                </div>

                <div class="card-footer p-1">
                  <div class="row no-gutters">
                    <div class="col-8">
                      <div class="c_status_txt tgOnOff small mt-1">
                        <span class="isOff">ขาดการเชื่อมต่อ</span>
                        <span class="isOn">เชื่อมต่อปกติ</span>
                      </div>
                    </div>
                  <div class="col-4">
                  <? if($k !== 2 && $k !== 3){ ?>
                  <form action="process/ClearLive.php" method="post" class="formUpdateVal"  data-onsuccess="ClearLiveCallback" data-onfail="ClearLiveCallback">
                    <fieldset>
                      <input type="hidden" name="zone" value="<?=$arr_code_zone_node[$v];?>" />
                      <input type="submit" class="btn btn-sm small-1 p-1 btn-warning" value="ล้างLive" />
                    </fieldset>
                  </form>
                  <? } ?>
                  </div>
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
</div>
<script>
    function ClearLiveCallback(form, res){
        console.log(form, res)
    }
</script>
<?
  include 'sport_result_tmpl.html';
  require 'footer.php';
?>