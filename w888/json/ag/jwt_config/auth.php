<?
  require_once '../assets/plugins/firebase-php-jwt/JWT.php';
  require_once '../assets/plugins/firebase-php-jwt/BeforeValidException.php';
  require_once '../assets/plugins/firebase-php-jwt/ExpiredException.php';
  require_once '../assets/plugins/firebase-php-jwt/SignatureInvalidException.php';
  use \Firebase\JWT\JWT;

  /**
   * 
   */
  class bpAuthentication{

    # @string array - allowed headers origins
    private $allowOrigins = array(
      'https://bpskill.com',
      'https://m.bpskill.com', 
      'https://www.bpskill.com',
    );

    # @string - jwt config file path
    private $jwtConfigPath = 'config.jwt.json';

    # @boolean | array jwt config data
    private $jwtConfig = false;

    function __construct(){ 
      if(file_exists($this->jwtConfigPath)){
        $jwtFile = fopen($this->jwtConfigPath, 'r');
        if($jwtFile){
          $cf = fread($jwtFile, filesize($this->jwtConfigPath));
          $cf = json_decode($cf, true);
          $this->jwtConfig = $cf['setup'];
        }
        fclose($jwtFile);
      }
    }

    /**
    *
    * Verify HTTP ORIGIN
    * @param string $org - request http origin
    * @return boolean
    *
    */
    public function verifyHeaderOrigin($org){
      if(in_array($org, $this->allowOrigins)){
        return true;
      }
      return false;
    }

    /**
    *
    * Check is member exist in database
    * @param int $mid - member id
    * @return boolean
    *
    */
    public function isMemberExists($mid){
      $num = sql_num("select * from bp_member where member_id = '$mid'");
      return ($num>0) ? true : false;
    }

    public function GetJWTRefreshToken($args){
      if($this->jwtConfig!==false){
        $args['password'] = md5($args['password']);
        // $checkm = sql_array("select * from bp_member where member_phone = '{$args["phone"]}' and member_country = '{$args["country"]}' and member_password = '{$args["password"]}'");
        // if($checkm['member_id']==""){
        //   return false;
        // }

        $now = strtotime('now');
        $secret = $this->jwtConfig['secret'];
        $expiration = time() + (intval($this->jwtConfig['timeToExpire_refresh']) * 60);
        $issuer = $this->jwtConfig['issuer'];
        $audience  = $this->jwtConfig['audience']; 
        $algorithm  = $this->jwtConfig['algorithm']; 

        $payload = array();
        $payload['iat'] = $now;
        $payload['nbf'] = $now;
        $payload['exp'] = $expiration;
        $payload['iss'] = $issuer;
        $payload['aud'] = $args['aud'];
        $payload['mid'] = $checkm['member_id'];

        $jwt = JWT::encode($payload, $secret, $algorithm);
        return $jwt;
      }
      return false;
    }

    /**
    *
    * Generate and return Json Web Token
    * @param array $payload - array of custom payload parameters 
    * @return string - json web token
    *
    */
    public function GetJWToken($payload = array(), $refresh){
      if($this->jwtConfig!==false){
        if($this->VerfiyJWToken($refresh['refreshToken'], false)===false){
          return false;
        }else{
          $decoded = JWT::decode($refresh['refreshToken'], $this->jwtConfig['secret'], array($this->jwtConfig['algorithm']));
          $decoded = (array)$decoded;
          if($decoded['mid']!=$payload['mid']){
            return false;
          }
        }

        $now = strtotime('now');
        $secret = $this->jwtConfig['secret'];
        $expiration = time() + (intval($this->jwtConfig['timeToExpire']) * 60);
        $issuer = $this->jwtConfig['issuer'];
        $audience  = $this->jwtConfig['audience']; 
        $algorithm  = $this->jwtConfig['algorithm']; 

        // $payload['aud'] = $audience ;
        $payload['iat'] = $now;
        $payload['nbf'] = $now;
        $payload['exp'] = $expiration;
        $payload['iss'] = $issuer;

        $jwt = JWT::encode($payload, $secret, $algorithm);
        return $jwt;
      }
      return false;
    }

    /**
    *
    * Verfiy Json Web Token
    * @param string $token - json web token
    * @param boolean $allowGuest - allow user that not member to use services or not
    * @return boolean
    *
    */
    public function VerfiyJWToken($token, $allowGuest = false){      
      
      if($allowGuest===true){
        return true;// echo "anonymous";
      }
      
      $secret = $this->jwtConfig['secret'];
      $algorithm  = $this->jwtConfig['algorithm']; 

      try{
        JWT::$leeway = 60;
        $decoded = JWT::decode($token, $secret, array($algorithm));
        $decoded = (array)$decoded;
        if(!in_array($decoded['aud'], $this->allowOrigins)){
          // echo "aud";
          return false;
        }
        if($decoded['iss'] != $this->jwtConfig['issuer']){
          // echo "iss";
          return false;
        }
        if($allowGuest!==true && !$this->isMemberExists($decoded['mid'])){
          // echo "mid";
          return false;
        }
      }catch (Exception $e){
        #echo $e->getMessage();
        return false;
      }
      return true;
    }
  }
?>