<?php

$agid="EA003";
$secret_key = '9afdsfas1971adsfafewrfewqed7e360b6fads3b';

$api_url = 'http://ag-webgame-staging.winroad168.com/api/wsv1_0';
$back_url="http://w1.wan1991.com";


 $x_process="http://".$_SERVER['SERVER_ADDR']."/~ohoking/";

function file_get_contents2($url)
{
$context = stream_context_create(
    array(
        'http' => array(
            'max_redirects' => 101
        )
    )
);
$output=file_get_contents($url, false, $context);
    return $output;
}


function file_get_contents8($url)
{
    $ch = curl_init();  
    curl_setopt($ch,CURLOPT_URL,$url);
    curl_setopt($ch,CURLOPT_RETURNTRANSFER,true);
    $output=curl_exec($ch);
    curl_close($ch);
    return $output;
}




function _bIP()
					{
						if(getenv(HTTP_CLIENT_IP))
							{$ip_ccr=getenv(HTTP_CLIENT_IP);}
						else if(getenv(HTTP_CLIENTADDRESS))
								{$ip_ccr=getenv();}
						else if (getenv(HTTP_X_FORWARDED_FOR))
							 {$ip_ccr=getenv(HTTP_X_FORWARDED_FOR);}
						 else
							 {$ip_ccr=getenv(REMOTE_ADDR);}
						if((!$ip_ccr)||($ip_ccr=='unknow'))
					{$ip_ccr="0";}
			return $ip_ccr;}
			
			
			
	function Signature_Genarate($Params,$privateKey = false)
    {
    	if(!empty($Params['signature']))
    	{
        	unset($Params['signature']);
    	}
        ksort($Params);

        if(isset($_GET['debug']) && $_GET['debug'] ==1)
            echo implode("", $Params) . $privateKey;

   	 	$Params['signature'] = sha1(implode("", $Params) . $privateKey);
        return $Params;
    }
 ?>
