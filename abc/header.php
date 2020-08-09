<?
    session_start();
    if(!isset($_SESSION['aid'])){
        header("Location: logout.php");
    }

    require_once 'inc/function.php';
    require_once 'inc/conn.php';
    $pageTitle = $app_title;
?>
<!DOCTYPE html>
<html lang="th">
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
    <link rel="stylesheet" href="assets/lib/jquery-ui/1.12.1/jquery-ui.min.css" />
    <link rel="stylesheet" href="assets/lib/jquery-ui/1.12.1/jquery-ui-custom.css" />

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
    <link rel="stylesheet" href="assets/lib/jquery-confirm/3.3.2/jquery-confirm-custom.css" />


    <!--data table-->
   <!--  <script src="assets/lib/datatables.net/js/jquery.dataTables.min.js"></script>
    <script src="assets/lib/datatables.net-bs/js/dataTables.bootstrap.min.js"></script>
    <link rel="stylesheet" href="assets/lib/datatables.net-bs/css/dataTables.bootstrap.min.css" /> -->

    <link rel="stylesheet" type="text/css" href="assets/lib/DataTables/datatables.min.css"/>
    <script type="text/javascript" src="assets/lib/DataTables/datatables.min.js"></script>

    <!-- Toastr.js -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css" />

    <!-- JQuery Cookie -->
    <script src="assets/lib/jquery-cookie/1.4.1/jquery.cookie.js"></script>
    
    <link rel="stylesheet" href="assets/css/style.css" />
    <link rel="stylesheet" href="assets/css/theme.css" />
    <link rel="stylesheet" href="assets/css/nav.css?v=1" />

    <script src="assets/js/index.js"></script>

    <? if(isset($addtional_resources)){
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
        const config_maintenance = (<?=json_encode($config_maintenance);?>);
        const bDate = "<?=_bdate();?>";
        var serverTimeNow = new Date(parseInt('<?=strtotime('now');?>')*1000);
        const nodejsIP = '<?=$nodejs_ip;?>';
        var totalBillVAR = (typeof $.cookie('total_bill_var')=='undefined') ? 0 : parseInt($.cookie('total_bill_var'), 10);
        var checkBillVARXHR = null;
        var pendingNoticeBillVAR = false;

        $(document).ready(function(){
            const audioBillVAR = document.getElementById("audioBillVAR"); 
            checkBillVAR();

            var refreshId = setInterval(function(){
        	    $("#read_lotto").load('process/read_lotto.php');
            }, (60*1000));

            var refreshIdVAR = setInterval(function(){
                checkBillVAR();
            }, (5*1000));

            var pendingNoticeVAR = setInterval(function(){
                if(pendingNoticeBillVAR){
                    noticeBillVAR();
                }
            }, (1*1000));
        });

        function checkBillVAR(){
            if(checkBillVARXHR !== null)
                checkBillVARXHR.abort();

            var $def = $.Deferred();
            checkBillVARXHR = $.ajax({
                type: "get",
                url: "process/read_bill_var.php",
                dataType: "json",
            })
            .done(function(res){
                if(res.status == 1){
                    $def.resolve(res.result);
                    if(res.result.total_bill > 0){
                        $('#noti_bill_var').show();
                        $('#noti_bill_var').html(res.result.total_bill);
                        if(res.result.total_bill != totalBillVAR){
                            noticeBillVAR();
                        }
                    }else{
                        $('#noti_bill_var').hide();
                    }
                    totalBillVAR = res.result.total_bill;
                    $.cookie('total_bill_var', totalBillVAR);
                }
                else{
                    $def.reject('ERROR');
                }
            })
            .fail(function(){
                $def.reject('ERROR');
            });
            return $def.promise();
        }
        function noticeBillVAR(){
            var promiseAudioBillVAR = audioBillVAR.play();
            if (promiseAudioBillVAR !== undefined) {
                promiseAudioBillVAR.then(_ => {
                    // ถ้าเล่นเสียงแ้งเตือนไม่ได้ ให้ pending ไว้ จนกว่าจะเล่นได้
                    pendingNoticeBillVAR = false;
                }).catch(error => {
                    pendingNoticeBillVAR = true;
                });
            }
        }
        window.onload = function(){
            if(document.body.classList.contains('removeLoaderOnLoad')){
                setTimeout(() => { showLoader(false); }, 500);
            }
        }
    </script>
</head>
<body class="onPageLoad <?=$docBodyClass;?>">
    <? 
        include 'topnav.php'; 
    ?>
    <div> <!-- body wrapper -->
        <main> <!-- main wrapper -->
            <div id="read_lotto"></div>
            <div id="read_bill_var">
                <audio id="audioBillVAR">
                    <source src="sound/noti.mp4" type="audio/mpeg">
                </audio>
            </div>

            