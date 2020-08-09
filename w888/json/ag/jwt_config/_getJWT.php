<?
	header("Content-type: application/json");     
  header("Cache-Control: no-store, no-cache, must-revalidate");       
  header("Cache-Control: post-check=0, pre-check=0", false);

  $origin = $_SERVER['HTTP_ORIGIN'];
  require_once('auth.php');
  require_once('../inc/conn.php');
  $auth = new bpAuthentication();
  if($auth->verifyHeaderOrigin($origin)===false){
    $response['msg'] = '403';
    echo json_encode($response);
    die();
  }

  $mid = $_REQUEST['mid'];
  $aud = $_REQUEST['aud'];
  $refresh = $_REQUEST['jwt_refresh'];
  if($refresh!="" && $auth->isMemberExists($mid)){
    $pl = array('mid' => $mid, 'aud' => $aud);
    $re = array('refreshToken' => $refresh);
    $response = array('status' => 1, 'token' => $auth->GetJWToken($pl, $re));
  }
  echo json_encode($response);
?>