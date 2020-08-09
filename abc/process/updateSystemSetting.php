<?
    session_start();
    header("Content-Type: application/json");
    require_once '../inc/conn.php';
    require_once '../inc/function.php';

    $update = $_POST['update'];

    if($_SESSION['aid'] == ""){
      $res = array('status' => 0, 'msg' => 'ERROR 403');
      echo json_encode($res);
      die();
    }

    $res = array('status' => 1);

    if($update == 'maintenance') // Update Maintenance
    {
        $con_service = $_POST['con_service'];
        $time_service = $_POST['time_service'];
        if($con_service == ""){
            $res = array('status' => 0, 'msg' => 'ERROR 500');
            echo json_encode($res);
            die();
        }

        // update self
        $configMaintenanceFile = __DIR__.'/../../inc/config_maintenance.php';
        $data = 
        "<?
        \$config_maintenance = array(
            'open' => ".$con_service.",
            'con_service' => ".$con_service.",
            'time_service' => '".$time_service."',
        );
        ?>";
        file_put_contents($configMaintenanceFile, $data);
        // update self

        // update www
        $postdata = http_build_query(
            array(
                'con_service' => $con_service,
                'time_service' => $time_service,
            )
        );

        $opts = array('http' =>
            array(
                'method'  => 'POST',
                'header'  => 'Content-Type: application/x-www-form-urlencoded',
                'content' => $postdata
            )
        );

        $context  = stream_context_create($opts);
        $resultWWW = file_get_contents('http://w888.texasbetx.com/maintenance_config.php', false, $context);
        $resultWWW = json_decode($resultWWW, true);
        // update www


        // update app
        $postdata = http_build_query(
            array(
                'con_service' => $con_service,
                'time_service' => $time_service,
            )
        );

        $opts = array('http' =>
            array(
                'method'  => 'POST',
                'header'  => 'Content-Type: application/x-www-form-urlencoded',
                'content' => $postdata
            )
        );

        $context  = stream_context_create($opts);
        $resultWWW = file_get_contents('http://app.texasbetx.com/maintenance_config.php', false, $context);
        $resultWWW = json_decode($resultWWW, true);
        // update app

        // $jsonFile = "../json/maintenance.json";
        // $data = json_encode(array('open' => intval($con_service), 'con_service' => intval($con_service),'time_service' => $time_service));
        // file_put_contents($jsonFile, $data);
        $sql = "update bom_tb_config set con_service = '$con_service', time_service = '$time_service'";
        $updateRes = sql_query($sql);
        //$res['log'] = $resultWWW;
    }
    else{
        $res = array('status' => 0);
    }
  
    if($res['status'] == 1){
        $res['result'] = $updateRes;
    }
    echo json_encode($res)
?>