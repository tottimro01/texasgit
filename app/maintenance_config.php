<?
	session_start();
    header("Content-Type: application/json");

	$con_service = $_POST['con_service'];
    $time_service = $_POST['time_service'];

    if($con_service == ""){
        $res = array('status' => 0, 'msg' => 'ERROR 500');
        echo json_encode($res);
        die();
    }

    $configMaintenanceFile = __DIR__.'/inc/config_maintenance.php';
    $data = 
    "<?
    \$config_maintenance = array(
        'open' => ".$con_service.",
        'con_service' => ".$con_service.",
        'time_service' => '".$time_service."',
    );
    ?>";
    $put = file_put_contents($configMaintenanceFile, $data);
    if($put !== false){
        $res = array('status' => 1, 'msg' => 'Success');
    }else{
        $res = array('status' => 0, 'msg' => 'ERROR 500');
    }
 	echo json_encode($res);
?>