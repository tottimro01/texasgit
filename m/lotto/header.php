<?
    session_start();
    if(!isset($_SESSION['m_id'])){
        header("Location: logout.php");
        exit();
    }

    require_once 'inc/lang.php';
    require_once 'inc/rsc.php';
    require_once 'inc/function.php';
    require_once 'inc/conn.php';
    $pageTitle = $app_title;
?>
<!DOCTYPE html>
<html lang="<?=$lang;?>" class="h-100">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?=$pageTitle;?></title>
    <link rel="shortcut icon" href="favicon.ico?v=000001" type="image/x-icon">

    <!-- JQuery -->
    <script src="assets/lib/jquery/3.4.1/jquery.min.js"></script>
    
    <!-- Normalize.css -->
    <link rel="stylesheet" href="assets/css/normalize.css" />

    <!-- JQuery UI -->
    <script src="assets/lib/jquery-ui/1.12.1/jquery-ui.min.js"></script>
    <script src="assets/lib/jquery-ui/datepicker/i18n/datepicker-th.js"></script>
    <link rel="stylesheet" href="assets/lib/jquery-ui/1.12.1/jquery-ui.min.css?v=1001" />
    <link rel="stylesheet" href="assets/lib/jquery-ui/1.12.1/jquery-ui-custom.css?v=1001" />

    <!-- Bootstrap -->
    <script src="assets/lib/bootstrap/4.3.1/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="assets/lib/bootstrap/4.3.1/css/bootstrap.min.css" />

    <!-- Font awesome -->
    <link rel="stylesheet" href="assets/lib/fontawesome/5.11.2/css/all.min.css" />

   <!-- JSRender -->
    <script src="assets/lib/jsrender/1.0.4/jsrender.min.js"></script>

    <!-- JQuery-Confirm -->
    <script src="assets/lib/jquery-confirm/3.3.2/jquery-confirm.min.js"></script>
    <script src="assets/lib/jquery-confirm/3.3.2/jquery-confirm-defaults.js"></script>
    <link rel="stylesheet" href="assets/lib/jquery-confirm/3.3.2/jquery-confirm.min.css" />
    <link rel="stylesheet" href="assets/lib/jquery-confirm/3.3.2/jquery-confirm-custom.css<?=$cache_css;?>" />
    
    <!-- Bootstrap datepicker -->
    <!-- <script src="assets/lib/bootstrap-datepicker/1.9.0/js/bootstrap-datepicker.min.js"></script>
    <script src="assets/lib/bootstrap-datepicker/1.9.0/locales/bootstrap-datepicker.<?=$lang;?>.min.js"></script>
    <link rel="stylesheet" href="assets/lib/bootstrap-datepicker/1.9.0/css/bootstrap-datepicker.min.css" /> -->

    <!-- Toastr.js -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css" />

    <!-- Html2Canvas -->
    <script src="assets/lib/html2canvas/1.0.0/html2canvas.min.js"></script>

    <!-- simplebar.js -->
    <!-- <link rel="stylesheet" href="assets/lib/simplebar/css/simplebar.css">
    <script src="assets/lib/simplebar/js/simplebar.min.js"></script>
 -->
    <!-- JQuery Cookie -->
    <script src="assets/lib/jquery-cookie/1.4.1/jquery.cookie.js"></script>
    
    <link href="assets/css/theme.css?v=<?=$cache_css;?>" rel="stylesheet">
    <!-- <link href="assets/css/main.css?v=<?=$cache;?>" rel="stylesheet"> -->
    <link rel="stylesheet" href="assets/css/style.css<?=$cache_css;?>" />
    <script src="assets/js/index.js<?=$cache_js;?>"></script>
    <script src="assets/js/main.js<?=$cache_js;?>"></script>
    <script src="assets/js/form.js<?=$cache_js;?>"></script>
    <script src="assets/js/lotto.js<?=$cache_js;?>"></script>

    <? 
    if(isset($addtional_resources)){
        foreach($addtional_resources as $rsc_key => $rsc_value){
            switch($rsc_value[0]){
                case 'js':
                    ?><script src="<?=$rsc_value[1];?>"></script><?
                    break;
                case 'css':
                    ?><link rel="stylesheet" href="<?=$rsc_value[1];?>" /><?
                    break;
                default: 
                    break;
            }
        }
        $config_maintenance = getMaintenance();
    }?>

    <script>
        // meesage
        var LNG_ERROR = '<?=$lang_member[67];?>';
        var LNG_ERROR_PROCESSING = '<?=$lang_member[2339];?>';
        var LNG_SAVE_SUCCESSFULLY = '<?=$lang_member[88];?>';
        var LNG_CLOSE = '<?=$lang_member[612];?>';
        var LNG_PLEASE_FILL_DATA = '<?=$lang_member[439];?>';

        const config_maintenance = (<?=json_encode($config_maintenance);?>);
        const bDate = "<?=_bdate();?>";
        var serverTimeNow = new Date(parseInt('<?=strtotime('now');?>')*1000);
        
        window.onload = function(){
            if(document.body.classList.contains('removeLoaderOnLoad')){
                setTimeout(() => { subtractLoadingTask(); }, 500);
            }
        }
    </script>
</head>
<body class="h-100 overflow-hidden onPageLoad <?=$docBodyClass;?>">
    <? 
        include 'topnav.php';         
    ?>

    <div class="h-100"> <!-- body wrapper -->
        <main class="h-100"> <!-- main wrapper -->
            