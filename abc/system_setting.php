<?
  $qSport = '';
  $qPage  = '';
  $qSportId  = '';
  $mActiveSport = '';
  $menuKey = 'system_setting';
  $docBodyClass = "removeLoaderOnLoad";

  $addtional_resources = array(

  );

  $pageTitle = "ควบคุมระบบ";
  require 'header.php';

  $sql = "select con_service, time_service from bom_tb_config where con_id = 1";
  $config = sql_array($sql);
?>
<div class="py-2">
  <div class="container container-alt">
    <div class="pt-2">
      <h5>ควบคุมระบบ</h5>
      <hr>
    </div>
  </div> 
  <br>
  <div class="container container-alt">
    <div class="">
      <!-- <div class="col-md-4"> -->
      <div class="card-deck">
        <div class="card shadow-sm col-md-4">
        <div class="card-body px-3">
        <form action="process/updateSystemSetting.php" method="post" class="formUpdateVal">
          <fieldset>
            <input type="hidden" name="update" value="maintenance" />
            <div>
              <h6>ปิดปรับปรุงระบบ</h6>
              <div class="small mb-2">
                <div class="chk-item rdo mr-2">
                  <input type="radio" name="con_service" id="chkMaintenance_off" value="1" <?if($config['con_service']==1){?> checked="checked" <?}?> />
                  <label for="chkMaintenance_off" class="checkmark ml-1">เปิดปกติ</label>
                </div>

                <div class="chk-item rdo">
                  <input type="radio" name="con_service" id="chkMaintenance_on" value="0" <?if($config['con_service']==0){?> checked="checked" <?}?> />
                  <label for="chkMaintenance_on" class="checkmark ml-1">ปิด</label>
                </div>
              </div>

              <div class="form-inline">
                <input type="text" name="time_service" class="form-control form-control-sm no-outline control-oho mr-1" placeholder="ตัวอย่าง 10.00 - 12.00" value="<?=$config['time_service'];?>" />
                <input type="submit" name="submit" class="btn btn-success btn-sm" value="บันทึก" />
              </div>
            </div>
          </fieldset>
        </form>
        </div>
        </div>
      <!-- </div>
      <div class="col-md-4"> -->
        <div class="card shadow-sm col-md-4">
          <div class="card-body px-3">
            <fieldset>
              <div>
                <h6>เปิด-ปิด Node</h6>
                <div class="form-inline">
                  <input type="button" name="btn_open" class="btn btn-success btn-sm mr-1" value="เปิด" onclick="open_node(1)" />
                  <input type="button" name="btn_open" class="btn btn-danger btn-sm" value="ปิด" onclick="open_node(0)" />
                  <script type="text/javascript">
                    function open_node(val){
                      $.ajax({
                          type: "POST",
                          url: "process/check/open_node.php",
                          data: { 'val': val },
                          cache: false,   // Clear cache IE
                          beforeSend: function(){
                              showLoader(true);
                          },
                          success: function(data){
                             alert(data.msg);
                             showLoader(false);
                          }
                      }); 
                    }
                  </script>
                </div>
              </div>
            </fieldset>
          </div>
        </div>
      </div>
    </div>
    
  </div>
</div>
<? require 'footer.php'; ?>