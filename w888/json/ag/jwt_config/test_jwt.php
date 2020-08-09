<?php 

  require_once '../assets/plugins/firebase-php-jwt/JWT.php';
  require_once '../assets/plugins/firebase-php-jwt/BeforeValidException.php';
  require_once '../assets/plugins/firebase-php-jwt/ExpiredException.php';
  require_once '../assets/plugins/firebase-php-jwt/SignatureInvalidException.php';
  use \Firebase\JWT\JWT;

  $key = "example_key";
  $token = array(
      "iss" => "http://ag.ohoking.com",
      "aud" => "http://example.com",
      "iat" => 1356999524,
      "nbf" => 1357000000
  );

 $jwt = JWT::encode($token, $key);
 $decoded = JWT::decode($jwt, $key, array('HS256'));
 echo "<br>";
 print_r($decoded);
 echo "<br>";
 
 ?>