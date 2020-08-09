<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Document</title>
  <style>
  #maintenance_ag { text-align: center; padding:18px 0 0 90px; }
  #maintenance_ag h1 { font-size: 50px; }
  #maintenance_ag { font: 18px Helvetica, sans-serif; color: #333; }
  #maintenance_ag article { display: block; text-align: left; max-width: 650px; }
  #maintenance_ag a { color: #dc8100; text-decoration: none; }
  #maintenance_ag a:hover { color: #333; text-decoration: none; }
</style>
<script src="js/jquery.js"></script>
  <link rel="stylesheet" href="<?=$hostserver;?>/js/jquery-confirm/jquery-confirm.min.css">
<link rel="stylesheet" href="<?=$hostserver;?>/js/jquery-confirm/jquery-confirm-custom.css" />
<script src="<?=$hostserver;?>/js/jquery-confirm/jquery-confirm.min.js"></script>
</head>
<body>
  <? 
  if($_SESSION['m_name']==""){ 
    include 'mname_tmpl.php'; 
  } 
  include 'mtimezone_tmpl.php';
  ?>
  <div id="maintenance_ag">
  <article>
      <h3><?=$lang_member[58];?></h3>
      <div>
          <p><?=$lang_member[59];?></p>
          <p>&mdash; TEXAS Team</p>
      </div>
  </article>
  </div>
</body>
</html>