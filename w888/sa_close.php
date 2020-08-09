<?php if (!isset($_SESSION)) { session_start(); } 
  require("lang/variable_lang.php");
// require(__DIR__."/lang/member_lang.php");
// require("/home/ohoking/domains/ohoking.com/public_html/admin_lang/export/lang_member_".$_SESSION['lang'].".php");
?>
<!-- <script language="JavaScript" type="text/javascript" src="commJS/jquery.min.js"></script> -->

<style>
  #maintenance_sa { text-align: center; padding:18px 0 0 90px; }
  #maintenance_sa h1 { font-size: 50px; }
  #maintenance_sa { font: 18px Helvetica, sans-serif; color: #333; }
  #maintenance_sa article { display: block; text-align: left; max-width: 650px; }
  #maintenance_sa a { color: #dc8100; text-decoration: none; }
  #maintenance_sa a:hover { color: #333; text-decoration: none; }
</style>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Document</title>
</head>
<body>
  <? 
  if($_SESSION['m_name']==""){ 
    include 'mname_tmpl.php'; 
  } 
  include 'mtimezone_tmpl.php';
  ?>
  <div id="maintenance_sa">
  <article>
      <h3><?=$lang_member[54];?></h3>
      <div>
          <p><?=$lang_member[55];?></p>
          <p>&mdash; TEXAS Team</p>
      </div>
  </article>
  </div>
</body>
</html>
