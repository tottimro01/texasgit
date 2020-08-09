<?
  session_start();
  if(!isset($_SESSION['aid'])){
    header("Location: logout.php");
  }

  require_once 'inc/function.php';
  require_once 'inc/conn.php';
?>
<!DOCTYPE html>
<html lang="th">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title><?=$pageTitle;?></title>
  <script src="assets/lib/jquery/3.4.1/jquery.min.js"></script>
 
  <link rel="stylesheet" href="assets/css/normalize.css" />

  <script src="assets/lib/jquery-ui/1.12.1/jquery-ui.min.js"></script>
  <script src="assets/lib/jquery-ui/datepicker/i18n/datepicker-th.js"></script>
  <link rel="stylesheet" href="assets/lib/jquery-ui/1.12.1/jquery-ui.min.css" />
  <link rel="stylesheet" href="assets/lib/jquery-ui/1.12.1/jquery-ui-custom.css" />

  <script src="assets/lib/bootstrap/4.3.1/js/bootstrap.min.js"></script>
  <link rel="stylesheet" href="assets/lib/bootstrap/4.3.1/css/bootstrap.min.css" />

  <link rel="stylesheet" href="assets/lib/fontawesome/5.11.2/css/all.min.css" />

  <!-- <script src="assets/lib/socket-io/2.2.0/socket.io.js"></script> -->
  <script src="assets/lib/jsrender/1.0.4/jsrender.min.js"></script>

  <script src="assets/lib/jquery-confirm/3.3.2/jquery-confirm.min.js"></script>
  <script src="assets/lib/jquery-confirm/3.3.2/jquery-confirm-defaults.js"></script>
  <link rel="stylesheet" href="assets/lib/jquery-confirm/3.3.2/jquery-confirm.min.css" />
  <link rel="stylesheet" href="assets/lib/jquery-confirm/3.3.2/jquery-confirm-custom.css" />

  <script src="assets/lib/jquery-cookie/1.4.1/jquery.cookie.js"></script>
  
  <link rel="stylesheet" href="assets/css/style.css" />
  <link rel="stylesheet" href="assets/css/theme.css" />
  <link rel="stylesheet" href="assets/css/nav.css" />

  <script src="assets/js/index.js"></script>
  <!-- <script src="assets/js/sportControl.js"></script> -->

  <? if(isset($addtional_resources)){
      foreach($addtional_resources as $rsc_key => $rsc_value){
      switch($rsc_value[0]){
        case 'js':
          ?><script src="<?=$rsc_value[1];?>"></script><?
          break;
        case 'css':
          ?><link rel="stylesheet" href="<?=$rsc_value[1];?>" /><?
          break;
        default: break;
      }
    }
  }?>

  <script>
    var serverTimeNow = new Date(parseInt('<?=strtotime('now');?>')*1000);
    var nodejsIP = '<?=$nodejs_ip;?>';
  </script>
</head>
<body class="onPageLoad <?=$docBodyClass;?>">
  <? 
  include 'topnav.php'; 
  ?>
  
  <div> <!-- body wrapper -->
    <main> <!-- main wrapper -->