<?php ob_start(); if (!isset($_SESSION)) { session_start(); } ?>
<?php 


  if($_SESSION["AGlang"]=="")
  {
    $_SESSION["AGlang"]="th";
  }
  require('../../inc/conn.php');
  require('../../inc/function.php');
  require('../../lang/ag_'.$_SESSION["AGlang"].'.php');

    $data[temp] =  " <br>
                     <div class='widget-box'>
                         <div class='widget-header widget-header-blue widget-header-flat'>
                             <h4 class='widget-title lighter'><strong> {$lang_userList[22]}  <font style='color:#c90000'>[ {$_GET[user]} ]</font> </strong></h4>
                         </div>
                         <div class='widget-body'>
                             <form class='form-horizontal' id='' action='' method='post'>
                                 <div class='widget-main'><div class='row'><div class='col-xs-12'>
                                     <div class='form-group'>
                                         <label class='col-xs-4 col-sm-3 control-label no-padding-right' for='form-field-1'><strong>{$lang_userList[64]} : </strong></label>
                                         <div class='col-xs-6 col-sm-5'>
                                             <input type='password' id='oldpass' name='oldpass' class='col-xs-12 col-sm-12 inputEngNum'>  
                                         </div>
                                     </div>
                                     <div class='form-group'>
                                         <label class='col-xs-4 col-sm-3 control-label no-padding-right' for='form-field-1'><strong>{$lang_userList[65]} : </strong></label>
                                         <div class='col-xs-6 col-sm-5'>
                                             <input type='password' id='newpass' name='newpass' class='col-xs-12 col-sm-12 inputEngNum'>
                                         </div>
                                     </div>
                                 </div></div></div>
                             </form>
                         </div>
                     </div>";

              echo  json_encode($data);      

 ?>