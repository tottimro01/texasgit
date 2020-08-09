<?
  $addtional_resources = array(
    array('js', 'assets/lib/socket-io/2.2.0/socket.io.js'),
    array('js', 'assets/js/sportControl.js'),
    array('css', 'assets/lib/bootstrap-select/1.13.12/bootstrap-select.min.css'),
    array('js', 'assets/lib/bootstrap-select/1.13.12/bootstrap-select.min.js'),
  );
  
  require_once 'inc/function.php';
  $pageTitle = $arr_sp[$_GET['sport_id']]['sp_name'] . " - 1X2 STEP";
  $mActive = "1x2_step";
  require 'header.php';
?>
<script>
  var sportZone = '<?=$qSportId;?>';
  var sportPage = '1x2_oe';
  var sportMarket = 't';
  var sportStep = true;
</script>
<?
  include 'sidenav.php'; 
?>
<div class="py-2">
  <!-- <div class="container">
    <div class="row">
      <div class="col-md-12 mb-3" method="get">
        <form action="#" method="get">
          <fieldset>
            <div class="form-inline">
              <input type="hidden" name="sport" value="<?=$_GET['sport_id'];?>" />
              <label for="qSportDatepicker"><b>วันที่:&nbsp;&nbsp;</b></label> 
              <div class="input-group input-group-sm">
                <input type="text" id="qSportDatepicker" name="date" class="form-control form-control-sm no-outline" />
                <div class="input-group-append">
                  <button type="submit" class="input-group-text control-oho" id="qSportDatepickerButton" onclick="document.getElementById('qSportDatepicker').focus(); return false;"><img src="assets/img/ui/calendar.png" alt="Select date" /></button>
                </div>
              </div>
            </div>
          </fieldset>
        </form>
      </div> 
    </div>
  </div> -->
  <div id="sportContainer">
    <div id="sportContainer_head"></div>
    <div id="sportContainer_body"></div>
    <div id="emptyWarning" style="display: none;"></div>
  </div>
</div>
<?
  require 'footer.php';
?>