<?
	header("Content-type: application/json");     
  header("Cache-Control: no-store, no-cache, must-revalidate");       
  header("Cache-Control: post-check=0, pre-check=0", false);

  $origin = $_SERVER['HTTP_ORIGIN'];
  require_once('auth.php');
  // require_once('../inc/conn.php');
  $auth = new bpAuthentication();

  $aud = "99";
  $phone = "888";
  $country = "999999";
  $password = "88888999";

  // if($phone!="" && $country!="" && $password!=""){
    $value = array('phone' => $phone, 'country' => $country, 'password' => $password, 'aud' => $aud);
    $response = array('status' => 1, 'token' => $auth->GetJWTRefreshToken($value));
  // }
  echo json_encode($response);
?>