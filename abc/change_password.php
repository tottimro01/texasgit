<?
  $qSport = "";
  $qSportId  = "";
  $mActiveSport = "";
  $mActive = "change_password";
  $menuKey = "change_password";
  $docBodyClass = "removeLoaderOnLoad";

  $pageTitle = "เปลี่ยนรหัสผ่าน";
  require 'header.php';
?>

<div class="py-2">
<div class="container container-alt">
  <div class="pt-2">
    <h5>เปลี่ยนรหัสผ่าน</h5>
    <hr />
  </div>
  <div class="row">
    <div class="col-md-6 col-lg-4 mx-auto">
      <div>
        <form action="process/changePassword.php" method="post" class="formUpdateVal" data-onsuccess="changePasswordCallback" data-onfail="changePasswordCallback">
          <fieldset>
            <div class="form-group">
              <input type="password" name="password" class="form-control form-control-sm control-oho no-outline" placeholder="รหัสผ่าน" />
            </div>
            <div class="form-group">
              <input type="password" name="new_password" class="form-control form-control-sm control-oho no-outline" placeholder="รหัสผ่านใหม่" />
            </div>
            <div class="form-group">
              <input type="password" name="con_password" class="form-control form-control-sm control-oho no-outline" placeholder="ยืนยันรหัสผ่าน" />
            </div>
            <button type="submit" class="btn btn-sm btn-block control-oho no-outline">บันทัก</button>
          </fieldset>
        </form>
      </div>
    </div> 
    
  </div>
</div>
</div>
<script>
function changePasswordCallback(_form, _res){
    if(typeof _res.status != 'undefind' && _res.status == 1){
        _form.reset();
    }else{
        let msg = (typeof _res.msg != 'undefind') ? _res.msg : "เกิดข้อฟิดพลาดกรุณาลองใหม่อีกครั้ง"; 
        errorDialog(null, msg);
    }
}
</script>
<?
  include 'sport_result_tmpl.html';
  require 'footer.php';
?>